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
 * This file contains the definition for the library class for texto submission plugin
 *
 * This class provides all the functionality for the new sesiontarea module.
 *
 * @package sesiontareasubmission_texto
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
// File area for online text submission sesiontareament.
define('SESIONTAREASUBMISSION_ONLINETEXT_FILEAREA', 'submissions_texto');

/**
 * library class for texto submission plugin extending submission plugin base class
 *
 * @package sesiontareasubmission_texto
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class sesiontarea_submission_texto extends sesiontarea_submission_plugin {

    /**
     * Get the name of the online text submission plugin
     * @return string
     */
    public function get_name() {
        return get_string('texto', 'sesiontareasubmission_texto');
    }


    /**
     * Get texto submission information from the database
     *
     * @param  int $submissionid
     * @return mixed
     */
    private function get_texto_submission($submissionid) {
        global $DB;

        return $DB->get_record('sesiontareasubmission_texto', array('submission'=>$submissionid));
    }

    /**
     * Add form elements for settings
     *
     * @param mixed $submission can be null
     * @param MoodleQuickForm $mform
     * @param stdClass $data
     * @return true if elements were added to the form
     */
    public function get_form_elements($submission, MoodleQuickForm $mform, stdClass $data) {
        $elements = array();

        $editoroptions = $this->get_edit_options();
        $submissionid = $submission ? $submission->id : 0;

        if (!isset($data->texto)) {
            $data->texto = '';
        }
        if (!isset($data->textoformat)) {
            $data->textoformat = editors_get_preferred_format();
        }

        if ($submission) {
            $textosubmission = $this->get_texto_submission($submission->id);
            if ($textosubmission) {
                $data->texto = $textosubmission->texto;
                $data->textoformat = $textosubmission->onlineformat;
            }

        }

        $data = file_prepare_standard_editor($data,
                                             'texto',
                                             $editoroptions,
                                             $this->sesiontareament->get_context(),
                                             'sesiontareasubmission_texto',
                                             SESIONTAREASUBMISSION_ONLINETEXT_FILEAREA,
                                             $submissionid);
        $mform->addElement('editor', 'texto_editor', html_writer::tag('span', $this->get_name(),
            array('class' => 'accesshide')), null, $editoroptions);

        return true;
    }

    /**
     * Editor format options
     *
     * @return array
     */
    private function get_edit_options() {
         $editoroptions = array(
           'noclean' => false,
           'maxfiles' => EDITOR_UNLIMITED_FILES,
           'maxbytes' => $this->sesiontareament->get_course()->maxbytes,
           'context' => $this->sesiontareament->get_context(),
           'return_types' => FILE_INTERNAL | FILE_EXTERNAL
        );
        return $editoroptions;
    }

    /**
     * Save data to the database and trigger plagiarism plugin,
     * if enabled, to scan the uploaded content via events trigger
     *
     * @param stdClass $submission
     * @param stdClass $data
     * @return bool
     */
    public function save(stdClass $submission, stdClass $data) {
        global $USER, $DB;

        $editoroptions = $this->get_edit_options();

        $data = file_postupdate_standard_editor($data,
                                                'texto',
                                                $editoroptions,
                                                $this->sesiontareament->get_context(),
                                                'sesiontareasubmission_texto',
                                                SESIONTAREASUBMISSION_ONLINETEXT_FILEAREA,
                                                $submission->id);

        $textosubmission = $this->get_texto_submission($submission->id);

        $text = format_text($data->texto,
                            $data->texto_editor['format'],
                            array('context'=>$this->sesiontareament->get_context()));

        $fs = get_file_storage();

        $files = $fs->get_area_files($this->sesiontareament->get_context()->id,
                                     'sesiontareasubmission_texto',
                                     SESIONTAREASUBMISSION_ONLINETEXT_FILEAREA,
                                     $submission->id,
                                     'id',
                                     false);

        // Let Moodle know that an assessable content was uploaded (eg for plagiarism detection).
        $eventdata = new stdClass();
        $eventdata->modulename = 'sesiontarea';
        $eventdata->cmid = $this->sesiontareament->get_course_module()->id;
        $eventdata->itemid = $submission->id;
        $eventdata->courseid = $this->sesiontareament->get_course()->id;
        $eventdata->userid = $USER->id;
        $eventdata->content = trim($text);

        if ($files) {
            $eventdata->pathnamehashes = array_keys($files);
        }
        events_trigger('assessable_content_uploaded', $eventdata);

        if ($textosubmission) {

            $textosubmission->texto = $data->texto;
            $textosubmission->onlineformat = $data->texto_editor['format'];

            return $DB->update_record('sesiontareasubmission_texto', $textosubmission);
        } else {

            $textosubmission = new stdClass();
            $textosubmission->texto = $data->texto;
            $textosubmission->onlineformat = $data->texto_editor['format'];

            $textosubmission->submission = $submission->id;
            $textosubmission->sesiontareament = $this->sesiontareament->get_instance()->id;
            return $DB->insert_record('sesiontareasubmission_texto', $textosubmission) > 0;
        }
    }

    /**
     * Return a list of the text fields that can be imported/exported by this plugin
     *
     * @return array An array of field names and descriptions. (name=>description, ...)
     */
    public function get_editor_fields() {
        return array('texto' => get_string('pluginname', 'sesiontareasubmission_comments'));
    }

    /**
     * Get the saved text content from the editor
     *
     * @param string $name
     * @param int $submissionid
     * @return string
     */
    public function get_editor_text($name, $submissionid) {
        if ($name == 'texto') {
            $textosubmission = $this->get_texto_submission($submissionid);
            if ($textosubmission) {
                return $textosubmission->texto;
            }
        }

        return '';
    }

    /**
     * Get the content format for the editor
     *
     * @param string $name
     * @param int $submissionid
     * @return int
     */
    public function get_editor_format($name, $submissionid) {
        if ($name == 'texto') {
            $textosubmission = $this->get_texto_submission($submissionid);
            if ($textosubmission) {
                return $textosubmission->onlineformat;
            }
        }

        return 0;
    }


     /**
      * Display texto word count in the submission status table
      *
      * @param stdClass $submission
      * @param bool $showviewlink - If the summary has been truncated set this to true
      * @return string
      */
    public function view_summary(stdClass $submission, & $showviewlink) {
        global $CFG;

        $textosubmission = $this->get_texto_submission($submission->id);
        // Always show the view link.
        $showviewlink = true;

        if ($textosubmission) {
            $text = $this->sesiontareament->render_editor_content(SESIONTAREASUBMISSION_ONLINETEXT_FILEAREA,
                                                             $textosubmission->submission,
                                                             $this->get_type(),
                                                             'texto',
                                                             'sesiontareasubmission_texto');

            $shorttext = shorten_text($text, 140);
            $plagiarismlinks = '';

            if (!empty($CFG->enableplagiarism)) {
                require_once($CFG->libdir . '/plagiarismlib.php');

                $plagiarismlinks .= plagiarism_get_links(array('userid' => $submission->userid,
                    'content' => trim($text),
                    'cmid' => $this->sesiontareament->get_course_module()->id,
                    'course' => $this->sesiontareament->get_course()->id,
                    'sesiontareament' => $submission->sesiontareament));
            }
            if ($text != $shorttext) {
                $wordcount = get_string('numwords', 'sesiontareasubmission_texto', count_words($text));

                return $shorttext . $plagiarismlinks . $wordcount;
            } else {
                return $shorttext . $plagiarismlinks;
            }
        }
        return '';
    }

    /**
     * Produce a list of files suitable for export that represent this submission.
     *
     * @param stdClass $submission - For this is the submission data
     * @param stdClass $user - This is the user record for this submission
     * @return array - return an array of files indexed by filename
     */
    public function get_files(stdClass $submission, stdClass $user) {
        global $DB;

        $files = array();
        $textosubmission = $this->get_texto_submission($submission->id);

        if ($textosubmission) {
            $finaltext = $this->sesiontareament->download_rewrite_pluginfile_urls($textosubmission->texto, $user, $this);
            $formattedtext = format_text($finaltext,
                                         $textosubmission->onlineformat,
                                         array('context'=>$this->sesiontareament->get_context()));
            $submissioncontent = '<html><body>'. $formattedtext . '</body></html>';

            $filename = get_string('textofilename', 'sesiontareasubmission_texto');
            $files[$filename] = array($submissioncontent);

            $fs = get_file_storage();

            $fsfiles = $fs->get_area_files($this->sesiontareament->get_context()->id,
                                           'sesiontareasubmission_texto',
                                           SESIONTAREASUBMISSION_ONLINETEXT_FILEAREA,
                                           $submission->id,
                                           'timemodified',
                                           false);

            foreach ($fsfiles as $file) {
                $files[$file->get_filename()] = $file;
            }
        }

        return $files;
    }

    /**
     * Display the saved text content from the editor in the view table
     *
     * @param stdClass $submission
     * @return string
     */
    public function view(stdClass $submission) {
        $result = '';

        $textosubmission = $this->get_texto_submission($submission->id);

        if ($textosubmission) {

            // Render for portfolio API.
            $result .= $this->sesiontareament->render_editor_content(SESIONTAREASUBMISSION_ONLINETEXT_FILEAREA,
                                                                $textosubmission->submission,
                                                                $this->get_type(),
                                                                'texto',
                                                                'sesiontareasubmission_texto');

        }

        return $result;
    }

    /**
     * Return true if this plugin can upgrade an old Moodle 2.2 sesiontareament of this type and version.
     *
     * @param string $type old sesiontareament subtype
     * @param int $version old sesiontareament version
     * @return bool True if upgrade is possible
     */
    public function can_upgrade($type, $version) {
        if ($type == 'online' && $version >= 2011112900) {
            return true;
        }
        return false;
    }


    /**
     * Upgrade the settings from the old sesiontareament to the new plugin based one
     *
     * @param context $oldcontext - the database for the old sesiontareament context
     * @param stdClass $oldsesiontareament - the database for the old sesiontareament instance
     * @param string $log record log events here
     * @return bool Was it a success?
     */
    public function upgrade_settings(context $oldcontext, stdClass $oldsesiontareament, & $log) {
        // No settings to upgrade.
        return true;
    }

    /**
     * Upgrade the submission from the old sesiontareament to the new one
     *
     * @param context $oldcontext - the database for the old sesiontareament context
     * @param stdClass $oldsesiontareament The data record for the old sesiontareament
     * @param stdClass $oldsubmission The data record for the old submission
     * @param stdClass $submission The data record for the new submission
     * @param string $log Record upgrade messages in the log
     * @return bool true or false - false will trigger a rollback
     */
    public function upgrade(context $oldcontext,
                            stdClass $oldsesiontareament,
                            stdClass $oldsubmission,
                            stdClass $submission,
                            & $log) {
        global $DB;

        $textosubmission = new stdClass();
        $textosubmission->texto = $oldsubmission->data1;
        $textosubmission->onlineformat = $oldsubmission->data2;

        $textosubmission->submission = $submission->id;
        $textosubmission->sesiontareament = $this->sesiontareament->get_instance()->id;

        if ($textosubmission->texto === null) {
            $textosubmission->texto = '';
        }

        if ($textosubmission->onlineformat === null) {
            $textosubmission->onlineformat = editors_get_preferred_format();
        }

        if (!$DB->insert_record('sesiontareasubmission_texto', $textosubmission) > 0) {
            $log .= get_string('couldnotconvertsubmission', 'mod_sesiontarea', $submission->userid);
            return false;
        }

        // Now copy the area files.
        $this->sesiontareament->copy_area_files_for_upgrade($oldcontext->id,
                                                        'mod_sesiontareament',
                                                        'submission',
                                                        $oldsubmission->id,
                                                        $this->sesiontareament->get_context()->id,
                                                        'sesiontareasubmission_texto',
                                                        SESIONTAREASUBMISSION_ONLINETEXT_FILEAREA,
                                                        $submission->id);
        return true;
    }

    /**
     * Formatting for log info
     *
     * @param stdClass $submission The new submission
     * @return string
     */
    public function format_for_log(stdClass $submission) {
        // Format the info for each submission plugin (will be logged).
        $textosubmission = $this->get_texto_submission($submission->id);
        $textologinfo = '';
        $text = format_text($textosubmission->texto,
                            $textosubmission->onlineformat,
                            array('context'=>$this->sesiontareament->get_context()));
        $textologinfo .= get_string('numwordsforlog',
                                         'sesiontareasubmission_texto',
                                         count_words($text));

        return $textologinfo;
    }

    /**
     * The sesiontareament has been deleted - cleanup
     *
     * @return bool
     */
    public function delete_instance() {
        global $DB;
        $DB->delete_records('sesiontareasubmission_texto',
                            array('sesiontareament'=>$this->sesiontareament->get_instance()->id));

        return true;
    }

    /**
     * No text is set for this plugin
     *
     * @param stdClass $submission
     * @return bool
     */
    public function is_empty(stdClass $submission) {
        $textosubmission = $this->get_texto_submission($submission->id);

        return empty($textosubmission->texto);
    }

    /**
     * Get file areas returns a list of areas this plugin stores files
     * @return array - An array of fileareas (keys) and descriptions (values)
     */
    public function get_file_areas() {
        return array(SESIONTAREASUBMISSION_ONLINETEXT_FILEAREA=>$this->get_name());
    }

    /**
     * Copy the student's submission from a previous submission. Used when a student opts to base their resubmission
     * on the last submission.
     * @param stdClass $sourcesubmission
     * @param stdClass $destsubmission
     */
    public function copy_submission(stdClass $sourcesubmission, stdClass $destsubmission) {
        global $DB;

        // Copy the files across (attached via the text editor).
        $contextid = $this->sesiontareament->get_context()->id;
        $fs = get_file_storage();
        $files = $fs->get_area_files($contextid, 'sesiontareasubmission_texto',
                                     SESIONTAREASUBMISSION_ONLINETEXT_FILEAREA, $sourcesubmission->id, 'id', false);
        foreach ($files as $file) {
            $fieldupdates = array('itemid' => $destsubmission->id);
            $fs->create_file_from_storedfile($fieldupdates, $file);
        }

        // Copy the sesiontareasubmission_texto record.
        $textosubmission = $this->get_texto_submission($sourcesubmission->id);
        if ($textosubmission) {
            unset($textosubmission->id);
            $textosubmission->submission = $destsubmission->id;
            $DB->insert_record('sesiontareasubmission_texto', $textosubmission);
        }
        return true;
    }
}


