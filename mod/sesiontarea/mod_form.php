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
 * This file contains the forms to create and edit an instance of this module
 *
 * @package   mod_sesiontarea
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die('Direct access to this script is forbidden.');

require_once($CFG->dirroot.'/course/moodleform_mod.php');
require_once($CFG->libdir . '/itse/lib.php');
require_once($CFG->dirroot . '/mod/sesiontarea/locallib.php');
require_once($CFG->dirroot . '/mod/assign/locallib.php');

/**
 * Assignment settings form.
 *
 * @package   mod_sesiontarea
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mod_sesiontarea_mod_form extends mod_sesionpadre_mod_form {

    /**
     * Called to define this moodle form
     *
     * @return void
     */
    public function definition() {
        global $CFG, $DB, $PAGE;
        $mform = $this->_form;

        parent::definition();
        
        $this->_form->addElement('header', 'general_intro', get_string('general_intro', 'sesionclase'));
        $this->add_intro_editor(true, get_string('description', 'sesiontarea'));

        $ctx = null;
        if ($this->current && $this->current->coursemodule) {
            $cm = get_coursemodule_from_instance('sesiontarea', $this->current->id, 0, false, MUST_EXIST);
            $ctx = context_module::instance($cm->id);
        }
        $sesiontareament = new sesiontarea($ctx, null, null);
        if ($this->current && $this->current->course) {
            if (!$ctx) {
                $ctx = context_course::instance($this->current->course);
            }
            $course = $DB->get_record('course', array('id'=>$this->current->course), '*', MUST_EXIST);
            $sesiontareament->set_course($course);
        }

        $config = get_config('sesiontarea');

        $mform->addElement('header', 'availability', get_string('availability', 'sesiontarea'));
        $mform->setExpanded('availability', true);

        $name = get_string('allowsubmissionsfromdate', 'sesiontarea');
        $options = array('optional'=>true);
        $mform->addElement('date_time_selector', 'allowsubmissionsfromdate', $name, $options);
        $mform->addHelpButton('allowsubmissionsfromdate', 'allowsubmissionsfromdate', 'sesiontarea');
        $mform->setDefault('allowsubmissionsfromdate', time());

        $name = get_string('duedate', 'sesiontarea');
        $mform->addElement('date_time_selector', 'duedate', $name, array('optional'=>true));
        $mform->addHelpButton('duedate', 'duedate', 'sesiontarea');
        $mform->setDefault('duedate', time()+7*24*3600);

        $name = get_string('cutoffdate', 'sesiontarea');
        $mform->addElement('date_time_selector', 'cutoffdate', $name, array('optional'=>true));
        $mform->addHelpButton('cutoffdate', 'cutoffdate', 'sesiontarea');

        $name = get_string('alwaysshowdescription', 'sesiontarea');
        $mform->addElement('checkbox', 'alwaysshowdescription', $name);
        $mform->addHelpButton('alwaysshowdescription', 'alwaysshowdescription', 'sesiontarea');
        $mform->setDefault('alwaysshowdescription', 1);
        $mform->disabledIf('alwaysshowdescription', 'allowsubmissionsfromdate[enabled]', 'notchecked');

        $sesiontareament->add_all_plugin_settings($mform);

        $mform->addElement('header', 'submissionsettings', get_string('submissionsettings', 'sesiontarea'));

        $name = get_string('submissiondrafts', 'sesiontarea');
        $mform->addElement('selectyesno', 'submissiondrafts', $name);
        $mform->addHelpButton('submissiondrafts', 'submissiondrafts', 'sesiontarea');
        $mform->setDefault('submissiondrafts', 0);

        if (empty($config->submissionstatement)) {
            $mform->addElement('hidden', 'requiresubmissionstatement', 0);
        } else if (empty($config->requiresubmissionstatement)) {
            $name = get_string('requiresubmissionstatement', 'sesiontarea');
            $mform->addElement('selectyesno', 'requiresubmissionstatement', $name);
            $mform->setDefault('requiresubmissionstatement', 0);
            $mform->addHelpButton('requiresubmissionstatement',
                                  'requiresubmissionstatementsesiontareament',
                                  'sesiontarea');
        } else {
            $mform->addElement('hidden', 'requiresubmissionstatement', 1);
        }
        $mform->setType('requiresubmissionstatement', PARAM_BOOL);

        $options = array(
            SESIONTAREA_ATTEMPT_REOPEN_METHOD_NONE => get_string('attemptreopenmethod_none', 'mod_sesiontarea'),
            SESIONTAREA_ATTEMPT_REOPEN_METHOD_MANUAL => get_string('attemptreopenmethod_manual', 'mod_sesiontarea'),
            SESIONTAREA_ATTEMPT_REOPEN_METHOD_UNTILPASS => get_string('attemptreopenmethod_untilpass', 'mod_sesiontarea')
        );
        $mform->addElement('select', 'attemptreopenmethod', get_string('attemptreopenmethod', 'mod_sesiontarea'), $options);
        $mform->setDefault('attemptreopenmethod', SESIONTAREA_ATTEMPT_REOPEN_METHOD_NONE);
        $mform->addHelpButton('attemptreopenmethod', 'attemptreopenmethod', 'mod_sesiontarea');

        $options = array(SESIONTAREA_UNLIMITED_ATTEMPTS => get_string('unlimitedattempts', 'mod_sesiontarea'));
        $options += array_combine(range(1, 30), range(1, 30));
        $mform->addElement('select', 'maxattempts', get_string('maxattempts', 'mod_sesiontarea'), $options);
        $mform->addHelpButton('maxattempts', 'maxattempts', 'sesiontarea');
        $mform->setDefault('maxattempts', -1);
        $mform->disabledIf('maxattempts', 'attemptreopenmethod', 'eq', SESIONTAREA_ATTEMPT_REOPEN_METHOD_NONE);

        $mform->addElement('header', 'groupsubmissionsettings', get_string('groupsubmissionsettings', 'sesiontarea'));

        $name = get_string('teamsubmission', 'sesiontarea');
        $mform->addElement('selectyesno', 'teamsubmission', $name);
        $mform->addHelpButton('teamsubmission', 'teamsubmission', 'sesiontarea');
        $mform->setDefault('teamsubmission', 0);

        $name = get_string('requireallteammemberssubmit', 'sesiontarea');
        $mform->addElement('selectyesno', 'requireallteammemberssubmit', $name);
        $mform->addHelpButton('requireallteammemberssubmit', 'requireallteammemberssubmit', 'sesiontarea');
        $mform->setDefault('requireallteammemberssubmit', 0);
        $mform->disabledIf('requireallteammemberssubmit', 'teamsubmission', 'eq', 0);
        $mform->disabledIf('requireallteammemberssubmit', 'submissiondrafts', 'eq', 0);

        $groupings = groups_get_all_groupings($sesiontareament->get_course()->id);
        $options = array();
        $options[0] = get_string('none');
        foreach ($groupings as $grouping) {
            $options[$grouping->id] = $grouping->name;
        }

        $name = get_string('teamsubmissiongroupingid', 'sesiontarea');
        $mform->addElement('select', 'teamsubmissiongroupingid', $name, $options);
        $mform->addHelpButton('teamsubmissiongroupingid', 'teamsubmissiongroupingid', 'sesiontarea');
        $mform->setDefault('teamsubmissiongroupingid', 0);
        $mform->disabledIf('teamsubmissiongroupingid', 'teamsubmission', 'eq', 0);

        $mform->addElement('header', 'notifications', get_string('notifications', 'sesiontarea'));

        $name = get_string('sendnotifications', 'sesiontarea');
        $mform->addElement('selectyesno', 'sendnotifications', $name);
        $mform->addHelpButton('sendnotifications', 'sendnotifications', 'sesiontarea');
        $mform->setDefault('sendnotifications', 1);

        $name = get_string('sendlatenotifications', 'sesiontarea');
        $mform->addElement('selectyesno', 'sendlatenotifications', $name);
        $mform->addHelpButton('sendlatenotifications', 'sendlatenotifications', 'sesiontarea');
        $mform->setDefault('sendlatenotifications', 1);
        $mform->disabledIf('sendlatenotifications', 'sendnotifications', 'eq', 1);

        // Plagiarism enabling form.
        if (!empty($CFG->enableplagiarism)) {
            require_once($CFG->libdir . '/plagiarismlib.php');
            plagiarism_get_form_elements_module($mform, $ctx->get_course_context(), 'mod_sesiontarea');
        }

        $this->standard_grading_coursemodule_elements();
        $name = get_string('blindmarking', 'sesiontarea');
        $mform->addElement('selectyesno', 'blindmarking', $name);
        $mform->addHelpButton('blindmarking', 'blindmarking', 'sesiontarea');
        $mform->setDefault('blindmarking', 0);
        if ($sesiontareament->has_submissions_or_grades() ) {
            $mform->freeze('blindmarking');
        }

        $this->standard_coursemodule_elements();

        $this->add_action_buttons();

        // Add warning popup/noscript tag, if grades are changed by user.
        $hasgrade = false;
        if (!empty($this->_instance)) {
            $hasgrade = $DB->record_exists_select('sesiontarea_grades',
                                                  'sesiontareament = ? AND grade <> -1',
                                                  array($this->_instance));
        }

        if ($mform->elementExists('grade') && $hasgrade) {
            $module = array(
                'name' => 'mod_sesiontarea',
                'fullpath' => '/mod/sesiontarea/module.js',
                'requires' => array('node', 'event'),
                'strings' => array(array('changegradewarning', 'mod_sesiontarea'))
                );
            $PAGE->requires->js_init_call('M.mod_sesiontarea.init_grade_change', null, false, $module);

            // Add noscript tag in case.
            $noscriptwarning = $mform->createElement('static',
                                                     'warning',
                                                     null,
                                                     html_writer::tag('noscript',
                                                     get_string('changegradewarning', 'mod_sesiontarea')));
            $mform->insertElementBefore($noscriptwarning, 'grade');
        }
    }

    /**
     * Perform minimal validation on the settings form
     * @param array $data
     * @param array $files
     */
    public function validation($data, $files) {
        $errors = parent::validation($data, $files);

        if ($data['allowsubmissionsfromdate'] && $data['duedate']) {
            if ($data['allowsubmissionsfromdate'] > $data['duedate']) {
                $errors['duedate'] = get_string('duedatevalidation', 'sesiontarea');
            }
        }
        if ($data['duedate'] && $data['cutoffdate']) {
            if ($data['duedate'] > $data['cutoffdate']) {
                $errors['cutoffdate'] = get_string('cutoffdatevalidation', 'sesiontarea');
            }
        }
        if ($data['allowsubmissionsfromdate'] && $data['cutoffdate']) {
            if ($data['allowsubmissionsfromdate'] > $data['cutoffdate']) {
                $errors['cutoffdate'] = get_string('cutoffdatefromdatevalidation', 'sesiontarea');
            }
        }

        return $errors;
    }

    /**
     * Any data processing needed before the form is displayed
     * (needed to set up draft areas for editor and filemanager elements)
     * @param array $defaultvalues
     */
    public function data_preprocessing(&$defaultvalues) {
        global $DB;

        $ctx = null;
        if ($this->current && $this->current->coursemodule) {
            $cm = get_coursemodule_from_instance('sesiontarea', $this->current->id, 0, false, MUST_EXIST);
            $ctx = context_module::instance($cm->id);
        }
        $sesiontareament = new sesiontarea($ctx, null, null);
        if ($this->current && $this->current->course) {
            if (!$ctx) {
                $ctx = context_course::instance($this->current->course);
            }
            $course = $DB->get_record('course', array('id'=>$this->current->course), '*', MUST_EXIST);
            $sesiontareament->set_course($course);
        }
        $sesiontareament->plugin_data_preprocessing($defaultvalues);
    }

    public function add_completion_rules() {
        $mform =& $this->_form;

        $mform->addElement('checkbox', 'completionsubmit', '', get_string('completionsubmit', 'sesiontarea'));
        return array('completionsubmit');
    }

    public function completion_rule_enabled($data) {
        return !empty($data['completionsubmit']);
    }

}
