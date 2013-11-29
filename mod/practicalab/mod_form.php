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
 * @package   mod_practicalab
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die('Direct access to this script is forbidden.');

require_once($CFG->dirroot.'/course/moodleform_mod.php');
require_once($CFG->libdir . '/itse/lib.php');
require_once($CFG->dirroot . '/mod/practicalab/locallib.php');

/**
 * Assignment settings form.
 *
 * @package   mod_practicalab
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mod_practicalab_mod_form extends mod_sesionpadre_mod_form {

    /**
     * Called to define this moodle form
     *
     * @return void
     */
    public function definition() {
        global $CFG, $DB, $PAGE;
        $mform = $this->_form;

        parent::definition();
        
        $this->_form->addElement('header', 'general_intro', get_string('general_intro', 'practicalab'));
        $this->add_intro_editor(true, get_string('description', 'practicalab'));

        $ctx = null;
        if ($this->current && $this->current->coursemodule) {
            $cm = get_coursemodule_from_instance('practicalab', $this->current->id, 0, false, MUST_EXIST);
            $ctx = context_module::instance($cm->id);
        }
        $practicalabment = new practicalab($ctx, null, null);
        if ($this->current && $this->current->course) {
            if (!$ctx) {
                $ctx = context_course::instance($this->current->course);
            }
            $course = $DB->get_record('course', array('id'=>$this->current->course), '*', MUST_EXIST);
            $practicalabment->set_course($course);
        }

        $config = get_config('practicalab');

        $mform->addElement('header', 'availability', get_string('availability', 'practicalab'));
        $mform->setExpanded('availability', true);

        $name = get_string('allowsubmissionsfromdate', 'practicalab');
        $options = array('optional'=>true);
        $mform->addElement('date_time_selector', 'allowsubmissionsfromdate', $name, $options);
        $mform->addHelpButton('allowsubmissionsfromdate', 'allowsubmissionsfromdate', 'practicalab');
        $mform->setDefault('allowsubmissionsfromdate', time());

        $name = get_string('duedate', 'practicalab');
        $mform->addElement('date_time_selector', 'duedate', $name, array('optional'=>true));
        $mform->addHelpButton('duedate', 'duedate', 'practicalab');
        $mform->setDefault('duedate', time()+7*24*3600);

        $name = get_string('cutoffdate', 'practicalab');
        $mform->addElement('date_time_selector', 'cutoffdate', $name, array('optional'=>true));
        $mform->addHelpButton('cutoffdate', 'cutoffdate', 'practicalab');

        $name = get_string('alwaysshowdescription', 'practicalab');
        $mform->addElement('checkbox', 'alwaysshowdescription', $name);
        $mform->addHelpButton('alwaysshowdescription', 'alwaysshowdescription', 'practicalab');
        $mform->setDefault('alwaysshowdescription', 1);
        $mform->disabledIf('alwaysshowdescription', 'allowsubmissionsfromdate[enabled]', 'notchecked');

        $practicalabment->add_all_plugin_settings($mform);

        $mform->addElement('header', 'submissionsettings', get_string('submissionsettings', 'practicalab'));

        $name = get_string('submissiondrafts', 'practicalab');
        $mform->addElement('selectyesno', 'submissiondrafts', $name);
        $mform->addHelpButton('submissiondrafts', 'submissiondrafts', 'practicalab');
        $mform->setDefault('submissiondrafts', 0);

        if (empty($config->submissionstatement)) {
            $mform->addElement('hidden', 'requiresubmissionstatement', 0);
        } else if (empty($config->requiresubmissionstatement)) {
            $name = get_string('requiresubmissionstatement', 'practicalab');
            $mform->addElement('selectyesno', 'requiresubmissionstatement', $name);
            $mform->setDefault('requiresubmissionstatement', 0);
            $mform->addHelpButton('requiresubmissionstatement',
                                  'requiresubmissionstatementpracticalabment',
                                  'practicalab');
        } else {
            $mform->addElement('hidden', 'requiresubmissionstatement', 1);
        }
        $mform->setType('requiresubmissionstatement', PARAM_BOOL);

        $options = array(
            PRACTICALAB_ATTEMPT_REOPEN_METHOD_NONE => get_string('attemptreopenmethod_none', 'mod_practicalab'),
            PRACTICALAB_ATTEMPT_REOPEN_METHOD_MANUAL => get_string('attemptreopenmethod_manual', 'mod_practicalab'),
            PRACTICALAB_ATTEMPT_REOPEN_METHOD_UNTILPASS => get_string('attemptreopenmethod_untilpass', 'mod_practicalab')
        );
        $mform->addElement('select', 'attemptreopenmethod', get_string('attemptreopenmethod', 'mod_practicalab'), $options);
        $mform->setDefault('attemptreopenmethod', PRACTICALAB_ATTEMPT_REOPEN_METHOD_NONE);
        $mform->addHelpButton('attemptreopenmethod', 'attemptreopenmethod', 'mod_practicalab');

        $options = array(PRACTICALAB_UNLIMITED_ATTEMPTS => get_string('unlimitedattempts', 'mod_practicalab'));
        $options += array_combine(range(1, 30), range(1, 30));
        $mform->addElement('select', 'maxattempts', get_string('maxattempts', 'mod_practicalab'), $options);
        $mform->addHelpButton('maxattempts', 'maxattempts', 'practicalab');
        $mform->setDefault('maxattempts', -1);
        $mform->disabledIf('maxattempts', 'attemptreopenmethod', 'eq', PRACTICALAB_ATTEMPT_REOPEN_METHOD_NONE);

        $mform->addElement('header', 'groupsubmissionsettings', get_string('groupsubmissionsettings', 'practicalab'));

        $name = get_string('teamsubmission', 'practicalab');
        $mform->addElement('selectyesno', 'teamsubmission', $name);
        $mform->addHelpButton('teamsubmission', 'teamsubmission', 'practicalab');
        $mform->setDefault('teamsubmission', 0);

        $name = get_string('requireallteammemberssubmit', 'practicalab');
        $mform->addElement('selectyesno', 'requireallteammemberssubmit', $name);
        $mform->addHelpButton('requireallteammemberssubmit', 'requireallteammemberssubmit', 'practicalab');
        $mform->setDefault('requireallteammemberssubmit', 0);
        $mform->disabledIf('requireallteammemberssubmit', 'teamsubmission', 'eq', 0);
        $mform->disabledIf('requireallteammemberssubmit', 'submissiondrafts', 'eq', 0);

        $groupings = groups_get_all_groupings($practicalabment->get_course()->id);
        $options = array();
        $options[0] = get_string('none');
        foreach ($groupings as $grouping) {
            $options[$grouping->id] = $grouping->name;
        }

        $name = get_string('teamsubmissiongroupingid', 'practicalab');
        $mform->addElement('select', 'teamsubmissiongroupingid', $name, $options);
        $mform->addHelpButton('teamsubmissiongroupingid', 'teamsubmissiongroupingid', 'practicalab');
        $mform->setDefault('teamsubmissiongroupingid', 0);
        $mform->disabledIf('teamsubmissiongroupingid', 'teamsubmission', 'eq', 0);

        $mform->addElement('header', 'notifications', get_string('notifications', 'practicalab'));

        $name = get_string('sendnotifications', 'practicalab');
        $mform->addElement('selectyesno', 'sendnotifications', $name);
        $mform->addHelpButton('sendnotifications', 'sendnotifications', 'practicalab');
        $mform->setDefault('sendnotifications', 1);

        $name = get_string('sendlatenotifications', 'practicalab');
        $mform->addElement('selectyesno', 'sendlatenotifications', $name);
        $mform->addHelpButton('sendlatenotifications', 'sendlatenotifications', 'practicalab');
        $mform->setDefault('sendlatenotifications', 1);
        $mform->disabledIf('sendlatenotifications', 'sendnotifications', 'eq', 1);

        // Plagiarism enabling form.
        if (!empty($CFG->enableplagiarism)) {
            require_once($CFG->libdir . '/plagiarismlib.php');
            plagiarism_get_form_elements_module($mform, $ctx->get_course_context(), 'mod_practicalab');
        }

        $this->standard_grading_coursemodule_elements();
        $name = get_string('blindmarking', 'practicalab');
        $mform->addElement('selectyesno', 'blindmarking', $name);
        $mform->addHelpButton('blindmarking', 'blindmarking', 'practicalab');
        $mform->setDefault('blindmarking', 0);
        if ($practicalabment->has_submissions_or_grades() ) {
            $mform->freeze('blindmarking');
        }

        $this->standard_coursemodule_elements();

        $this->add_action_buttons();

        // Add warning popup/noscript tag, if grades are changed by user.
        $hasgrade = false;
        if (!empty($this->_instance)) {
            $hasgrade = $DB->record_exists_select('practicalab_grades',
                                                  'practicalabment = ? AND grade <> -1',
                                                  array($this->_instance));
        }

        if ($mform->elementExists('grade') && $hasgrade) {
            $module = array(
                'name' => 'mod_practicalab',
                'fullpath' => '/mod/practicalab/module.js',
                'requires' => array('node', 'event'),
                'strings' => array(array('changegradewarning', 'mod_practicalab'))
                );
            $PAGE->requires->js_init_call('M.mod_practicalab.init_grade_change', null, false, $module);

            // Add noscript tag in case.
            $noscriptwarning = $mform->createElement('static',
                                                     'warning',
                                                     null,
                                                     html_writer::tag('noscript',
                                                     get_string('changegradewarning', 'mod_practicalab')));
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
                $errors['duedate'] = get_string('duedatevalidation', 'practicalab');
            }
        }
        if ($data['duedate'] && $data['cutoffdate']) {
            if ($data['duedate'] > $data['cutoffdate']) {
                $errors['cutoffdate'] = get_string('cutoffdatevalidation', 'practicalab');
            }
        }
        if ($data['allowsubmissionsfromdate'] && $data['cutoffdate']) {
            if ($data['allowsubmissionsfromdate'] > $data['cutoffdate']) {
                $errors['cutoffdate'] = get_string('cutoffdatefromdatevalidation', 'practicalab');
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
            $cm = get_coursemodule_from_instance('practicalab', $this->current->id, 0, false, MUST_EXIST);
            $ctx = context_module::instance($cm->id);
        }
        $practicalabment = new practicalab($ctx, null, null);
        if ($this->current && $this->current->course) {
            if (!$ctx) {
                $ctx = context_course::instance($this->current->course);
            }
            $course = $DB->get_record('course', array('id'=>$this->current->course), '*', MUST_EXIST);
            $practicalabment->set_course($course);
        }
        $practicalabment->plugin_data_preprocessing($defaultvalues);
    }

    public function add_completion_rules() {
        $mform =& $this->_form;

        $mform->addElement('checkbox', 'completionsubmit', '', get_string('completionsubmit', 'practicalab'));
        return array('completionsubmit');
    }

    public function completion_rule_enabled($data) {
        return !empty($data['completionsubmit']);
    }

}
