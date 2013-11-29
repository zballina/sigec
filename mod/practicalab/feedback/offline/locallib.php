<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This file contains the definition for the library class for file feedback plugin
 *
 *
 * @package   practicalabfeedback_offline
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/grade/grading/lib.php');

/**
 * library class for file feedback plugin extending feedback plugin base class
 *
 * @package   practicalabfeedback_offline
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class practicalab_feedback_offline extends practicalab_feedback_plugin {

    /**
     * Get the name of the file feedback plugin
     * @return string
     */
    public function get_name() {
        return get_string('pluginname', 'practicalabfeedback_offline');
    }

    /**
     * Get form elements for grading form
     *
     * @param stdClass $grade
     * @param MoodleQuickForm $mform
     * @param stdClass $data
     * @return bool true if elements were added to the form
     */
    public function get_form_elements($grade, MoodleQuickForm $mform, stdClass $data) {
        return false;
    }

    /**
     * Return true if there are no feedback files
     * @param stdClass $grade
     */
    public function is_empty(stdClass $grade) {
        return true;
    }

    /**
     * Loop through uploaded grades and update the grades for this practicalabment
     *
     * @param int $draftid - The unique draft item id for this import
     * @param int $importid - The unique import ID for this csv import operation
     * @param bool $ignoremodified - Ignore the last modified date when checking fields
     * @return string - The html response
     */
    public function process_import_grades($draftid, $importid, $ignoremodified) {
        global $USER, $DB;

        require_sesskey();
        require_capability('mod/practicalab:grade', $this->practicalabment->get_context());

        $gradeimporter = new practicalabfeedback_offline_grade_importer($importid, $this->practicalabment);

        $context = get_context_instance(CONTEXT_USER, $USER->id);
        $fs = get_file_storage();
        if (!$files = $fs->get_area_files($context->id, 'user', 'draft', $draftid, 'id DESC', false)) {
            redirect(new moodle_url('view.php',
                                array('id'=>$this->practicalabment->get_course_module()->id,
                                      'action'=>'grading')));
            return;
        }
        $file = reset($files);

        $csvdata = $file->get_content();

        if ($csvdata) {
            $gradeimporter->parsecsv($csvdata);
        }
        if (!$gradeimporter->init()) {
            $thisurl = new moodle_url('/mod/practicalab/view.php', array('action'=>'viewpluginpage',
                                                                     'pluginsubtype'=>'practicalabfeedback',
                                                                     'plugin'=>'offline',
                                                                     'pluginaction'=>'uploadgrades',
                                                                     'id'=>$practicalabment->get_course_module()->id));
            print_error('invalidgradeimport', 'practicalabfeedback_offline', $thisurl);
            return;
        }
        // Does this practicalabment use a scale?
        $scaleoptions = null;
        if ($this->practicalabment->get_instance()->grade < 0) {
            $scale = $DB->get_record('scale', array('id'=>-($this->practicalabment->get_instance()->grade)));
            if ($scale) {
                $scaleoptions = explode(',', $scale->scale);
            }
        }
        // We may need to upgrade the gradebook comments after this update.
        $adminconfig = $this->practicalabment->get_admin_config();
        $gradebookplugin = $adminconfig->feedback_plugin_for_gradebook;

        $updatecount = 0;
        while ($record = $gradeimporter->next()) {
            $user = $record->user;
            $modified = $record->modified;
            $userdesc = fullname($user);
            $usergrade = $this->practicalabment->get_user_grade($user->id, false);

            if (!empty($scaleoptions)) {
                // This is a scale - we need to convert any grades to indexes in the scale.
                $scaleindex = array_search($record->grade, $scaleoptions);
                if ($scaleindex !== false) {
                    $record->grade = $scaleindex + 1;
                } else {
                    $record->grade = '';
                }
            } else {
                $record->grade = unformat_float($record->grade);
            }

            // Note: Do not count the seconds when comparing modified dates.
            $skip = false;
            $stalemodificationdate = ($usergrade && $usergrade->timemodified > ($modified + 60));

            if ($usergrade && $usergrade->grade == $record->grade) {
                // Skip - grade not modified.
                $skip = true;
            } else if (!isset($record->grade) || $record->grade === '' || $record->grade < 0) {
                // Skip - grade has no value.
                $skip = true;
            } else if (!$ignoremodified && $stalemodificationdate) {
                // Skip - grade has been modified.
                $skip = true;
            } else if ($this->practicalabment->grading_disabled($record->user->id)) {
                // Skip grade is locked.
                $skip = true;
            } else if (($this->practicalabment->get_instance()->grade > -1) &&
                      (($record->grade < 0) || ($record->grade > $this->practicalabment->get_instance()->grade))) {
                // Out of range.
                $skip = true;
            }

            if (!$skip) {
                $grade = $this->practicalabment->get_user_grade($record->user->id, true);

                $grade->grade = $record->grade;
                $grade->grader = $USER->id;
                if ($this->practicalabment->update_grade($grade)) {
                    $this->practicalabment->notify_grade_modified($grade);
                    $this->practicalabment->add_to_log('grade submission', $this->practicalabment->format_grade_for_log($grade));
                    $updatecount += 1;
                }
            }

            if ($ignoremodified || !$stalemodificationdate) {
                foreach ($record->feedback as $feedback) {
                    $plugin = $feedback['plugin'];
                    $field = $feedback['field'];
                    $newvalue = $feedback['value'];
                    $description = $feedback['description'];
                    $oldvalue = '';
                    if ($usergrade) {
                        $oldvalue = $plugin->get_editor_text($field, $usergrade->id);
                        if (empty($oldvalue)) {
                            $oldvalue = '';
                        }
                    }
                    if ($newvalue != $oldvalue) {
                        $updatecount += 1;
                        $grade = $this->practicalabment->get_user_grade($record->user->id, true);
                        $this->practicalabment->notify_grade_modified($grade);
                        if ($plugin->set_editor_text($field, $newvalue, $grade->id)) {
                            $logdesc = get_string('feedbackupdate', 'practicalabfeedback_offline',
                                                  array('field'=>$description,
                                                        'student'=>$userdesc,
                                                        'text'=>$newvalue));

                            $this->practicalabment->add_to_log('save grading feedback', $logdesc);
                        }

                        // If this is the gradebook comments plugin - post an update to the gradebook.
                        if (($plugin->get_subtype() . '_' . $plugin->get_type()) == $gradebookplugin) {
                            $grade->feedbacktext = $plugin->text_for_gradebook($grade);
                            $grade->feedbackformat = $plugin->format_for_gradebook($grade);
                            $this->practicalabment->update_grade($grade);
                        }
                    }
                }
            }
        }
        $gradeimporter->close(true);

        $renderer = $this->practicalabment->get_renderer();
        $o = '';

        $o .= $renderer->render(new practicalab_header($this->practicalabment->get_instance(),
                                                  $this->practicalabment->get_context(),
                                                  false,
                                                  $this->practicalabment->get_course_module()->id,
                                                  get_string('importgrades', 'practicalabfeedback_offline')));
        $o .= $renderer->box(get_string('updatedgrades', 'practicalabfeedback_offline', $updatecount));
        $url = new moodle_url('view.php',
                              array('id'=>$this->practicalabment->get_course_module()->id,
                                    'action'=>'grading'));
        $o .= $renderer->continue_button($url);
        $o .= $renderer->render_footer();
        return $o;
    }

    /**
     * Display upload grades form
     *
     * @return string The response html
     */
    public function upload_grades() {
        global $CFG, $USER;

        require_capability('mod/practicalab:grade', $this->practicalabment->get_context());
        require_once($CFG->dirroot . '/mod/practicalab/feedback/offline/uploadgradesform.php');
        require_once($CFG->dirroot . '/mod/practicalab/feedback/offline/importgradesform.php');
        require_once($CFG->dirroot . '/mod/practicalab/feedback/offline/importgradeslib.php');
        require_once($CFG->libdir . '/csvlib.class.php');

        $mform = new practicalabfeedback_offline_upload_grades_form(null,
                                                              array('context'=>$this->practicalabment->get_context(),
                                                                    'cm'=>$this->practicalabment->get_course_module()->id));

        $o = '';

        $confirm = optional_param('confirm', 0, PARAM_BOOL);
        $renderer = $this->practicalabment->get_renderer();

        if ($mform->is_cancelled()) {
            redirect(new moodle_url('view.php',
                                    array('id'=>$this->practicalabment->get_course_module()->id,
                                          'action'=>'grading')));
            return;
        } else if (($data = $mform->get_data()) &&
                   ($csvdata = $mform->get_file_content('gradesfile'))) {

            $importid = csv_import_reader::get_new_iid('practicalabfeedback_offline');
            $gradeimporter = new practicalabfeedback_offline_grade_importer($importid, $this->practicalabment);
            // File exists and was valid.
            $ignoremodified = !empty($data->ignoremodified);

            $draftid = $data->gradesfile;

            // Preview import.

            $mform = new practicalabfeedback_offline_import_grades_form(null, array('practicalabment'=>$this->practicalabment,
                                                                       'csvdata'=>$csvdata,
                                                                       'ignoremodified'=>$ignoremodified,
                                                                       'gradeimporter'=>$gradeimporter,
                                                                       'draftid'=>$draftid));

            $o .= $renderer->render(new practicalab_header($this->practicalabment->get_instance(),
                                                            $this->practicalabment->get_context(),
                                                            false,
                                                            $this->practicalabment->get_course_module()->id,
                                                            get_string('confirmimport', 'practicalabfeedback_offline')));
            $o .= $renderer->render(new practicalab_form('confirmimport', $mform));
            $o .= $renderer->render_footer();
        } else if ($confirm) {

            $importid = optional_param('importid', 0, PARAM_INT);
            $draftid = optional_param('draftid', 0, PARAM_INT);
            $ignoremodified = optional_param('ignoremodified', 0, PARAM_BOOL);
            $gradeimporter = new practicalabfeedback_offline_grade_importer($importid, $this->practicalabment);
            $mform = new practicalabfeedback_offline_import_grades_form(null, array('practicalabment'=>$this->practicalabment,
                                                                       'csvdata'=>'',
                                                                       'ignoremodified'=>$ignoremodified,
                                                                       'gradeimporter'=>$gradeimporter,
                                                                       'draftid'=>$draftid));
            if ($mform->is_cancelled()) {
                redirect(new moodle_url('view.php',
                                        array('id'=>$this->practicalabment->get_course_module()->id,
                                              'action'=>'grading')));
                return;
            }

            $o .= $this->process_import_grades($draftid, $importid, $ignoremodified);
        } else {

            $o .= $renderer->render(new practicalab_header($this->practicalabment->get_instance(),
                                                            $this->practicalabment->get_context(),
                                                            false,
                                                            $this->practicalabment->get_course_module()->id,
                                                            get_string('uploadgrades', 'practicalabfeedback_offline')));
            $o .= $renderer->render(new practicalab_form('batchuploadfiles', $mform));
            $o .= $renderer->render_footer();
        }

        return $o;
    }

    /**
     * Download a marking worksheet
     *
     * @return string The response html
     */
    public function download_grades() {
        global $CFG;

        require_capability('mod/practicalab:grade', $this->practicalabment->get_context());
        require_once($CFG->dirroot . '/mod/practicalab/gradingtable.php');

        $groupmode = groups_get_activity_groupmode($this->practicalabment->get_course_module());
        // All users.
        $groupid = 0;
        $groupname = '';
        if ($groupmode) {
            $groupid = groups_get_activity_group($this->practicalabment->get_course_module(), true);
            $groupname = groups_get_group_name($groupid) . '-';
        }
        $filename = clean_filename(get_string('offlinegradingworksheet', 'practicalabfeedback_offline') . '-' .
                                   $this->practicalabment->get_course()->shortname . '-' .
                                   $this->practicalabment->get_instance()->name . '-' .
                                   $groupname .
                                   $this->practicalabment->get_course_module()->id);

        $table = new practicalab_grading_table($this->practicalabment, 0, '', 0, false, $filename);

        $table->out(0, false);
        return;
    }

    /**
     * Print a sub page in this plugin
     *
     * @param string $action - The plugin action
     * @return string The response html
     */
    public function view_page($action) {
        if ($action == 'downloadgrades') {
            return $this->download_grades();
        } else if ($action == 'uploadgrades') {
            return $this->upload_grades();
        }

        return '';
    }

    /**
     * Return a list of the grading actions performed by this plugin
     * This plugin supports upload zip
     *
     * @return array The list of grading actions
     */
    public function get_grading_actions() {
        return array('uploadgrades'=>get_string('uploadgrades', 'practicalabfeedback_offline'),
                    'downloadgrades'=>get_string('downloadgrades', 'practicalabfeedback_offline'));
    }

    /**
     * Override the default is_enabled to disable this plugin if advanced grading is active
     *
     * @return bool
     */
    public function is_enabled() {
        $gradingmanager = get_grading_manager($this->practicalabment->get_context(), 'mod_practicalab', 'submissions');
        $controller = $gradingmanager->get_active_controller();
        $active = !empty($controller);

        if ($active) {
            return false;
        }
        return parent::is_enabled();
    }

    /**
     * Do not show this plugin in the grading table or on the front page
     *
     * @return bool
     */
    public function has_user_summary() {
        return false;
    }

}
