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
 * Unit tests for (some of) mod/practicalab/locallib.php.
 *
 * @package    mod_practicalab
 * @category   phpunit
 * @copyright  1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/mod/practicalab/locallib.php');
require_once($CFG->dirroot . '/mod/practicalab/upgradelib.php');
require_once($CFG->dirroot . '/mod/practicalab/tests/base_test.php');

/**
 * Unit tests for (some of) mod/practicalab/locallib.php.
 *
 * @copyright  1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mod_practicalab_locallib_testcase extends mod_practicalab_base_testcase {

    public function test_return_links() {
        global $PAGE;
        $this->setUser($this->editingteachers[0]);
        $returnaction = 'RETURNACTION';
        $returnparams = array('param'=>'1');
        $practicalab = $this->create_instance();
        $PAGE->set_url(new moodle_url('/mod/practicalab/view.php', array('id' => $practicalab->get_course_module()->id)));
        $practicalab->register_return_link($returnaction, $returnparams);
        $this->assertEquals($returnaction, $practicalab->get_return_action());
        $this->assertEquals($returnparams, $practicalab->get_return_params());
    }

    public function test_get_feedback_plugins() {
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance();
        $installedplugins = array_keys(get_plugin_list('practicalabfeedback'));

        foreach ($practicalab->get_feedback_plugins() as $plugin) {
            $this->assertContains($plugin->get_type(), $installedplugins, 'Feedback plugin not in list of installed plugins');
        }
    }

    public function test_get_submission_plugins() {
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance();
        $installedplugins = array_keys(get_plugin_list('practicalabsubmission'));

        foreach ($practicalab->get_submission_plugins() as $plugin) {
            $this->assertContains($plugin->get_type(), $installedplugins, 'Submission plugin not in list of installed plugins');
        }
    }

    public function test_is_blind_marking() {
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance(array('blindmarking'=>1));
        $this->assertEquals(true, $practicalab->is_blind_marking());

        // Test cannot see student names.
        $gradingtable = new practicalab_grading_table($practicalab, 1, '', 0, true);
        $output = $practicalab->get_renderer()->render($gradingtable);
        $this->assertEquals(true, strpos($output, get_string('hiddenuser', 'practicalab')));

        // Test students cannot reveal identities.
        $nopermission = false;
        $this->setUser($this->students[0]);
        $this->setExpectedException('required_capability_exception');
        $practicalab->testable_process_reveal_identities();

        // Test teachers cannot reveal identities.
        $nopermission = false;
        $this->setUser($this->teachers[0]);
        $this->setExpectedException('required_capability_exception');
        $practicalab->testable_process_reveal_identities();

        // Test sesskey is required.
        $this->setUser($this->editingteachers[0]);
        $this->setExpectedException('moodle_exception');
        $practicalab->testable_process_reveal_identities();

        // Test editingteacher can reveal identities if sesskey is ignored.
        $this->editingteachers[0]->ignoresesskey = true;
        $this->setUser($this->editingteachers[0]);
        $practicalab->testable_process_reveal_identities();
        $this->assertEquals(false, $practicalab->is_blind_marking());

        // Test student names are visible.
        $gradingtable = new practicalab_grading_table($practicalab, 1, '', 0, true);
        $output = $practicalab->get_renderer()->render($gradingtable);
        $this->assertEquals(false, strpos($output, get_string('hiddenuser', 'practicalab')));

        // Set this back to default.
        $this->editingteachers[0]->ignoresesskey = false;
    }

    public function test_show_intro() {
        // Test whether we are showing the intro at the correct times.
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance(array('alwaysshowdescription'=>1));

        $this->assertEquals(true, $practicalab->testable_show_intro());

        $tomorrow = time() + (24*60*60);

        $practicalab = $this->create_instance(array('alwaysshowdescription'=>0,
                                               'allowsubmissionsfromdate'=>$tomorrow));
        $this->assertEquals(false, $practicalab->testable_show_intro());
        $yesterday = time() - (24*60*60);
        $practicalab = $this->create_instance(array('alwaysshowdescription'=>0,
                                               'allowsubmissionsfromdate'=>$yesterday));
        $this->assertEquals(true, $practicalab->testable_show_intro());
    }

    public function test_has_submissions_or_grades() {
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance(array('practicalabsubmission_texto_enabled'=>1));

        $instance = $practicalab->get_instance();

        // Should start empty.
        $this->assertEquals(false, $practicalab->has_submissions_or_grades());

        // Simulate a submission.
        $this->setUser($this->students[0]);
        $submission = $practicalab->get_user_submission($this->students[0]->id, true);
        $data = new stdClass();
        $data->texto_editor = array('itemid'=>file_get_unused_draft_itemid(),
                                         'text'=>'Submission text',
                                         'format'=>FORMAT_MOODLE);
        $plugin = $practicalab->get_submission_plugin_by_type('texto');
        $plugin->save($submission, $data);

        // Now test again.
        $this->assertEquals(true, $practicalab->has_submissions_or_grades());
        // Set this back to default.
        $this->students[0]->ignoresesskey = false;
    }

    public function test_delete_grades() {
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance();

        // Simulate adding a grade.
        $this->setUser($this->teachers[0]);
        $data = new stdClass();
        $data->grade = '50.0';
        $practicalab->testable_apply_grade_to_user($data, $this->students[0]->id, 0);

        // Now see if the data is in the gradebook.
        $gradinginfo = grade_get_grades($this->course->id,
                                        'mod',
                                        'practicalab',
                                        $practicalab->get_instance()->id);

        $this->assertNotEquals(0, count($gradinginfo->items));

        $practicalab->testable_delete_grades();
        $gradinginfo = grade_get_grades($this->course->id,
                                        'mod',
                                        'practicalab',
                                        $practicalab->get_instance()->id);

        $this->assertEquals(0, count($gradinginfo->items));
    }

    public function test_delete_instance() {
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance(array('practicalabsubmission_texto_enabled'=>1));

        // Simulate adding a grade.
        $this->setUser($this->teachers[0]);
        $data = new stdClass();
        $data->grade = '50.0';
        $practicalab->testable_apply_grade_to_user($data, $this->students[0]->id, 0);

        // Simulate a submission.
        $this->setUser($this->students[0]);
        $submission = $practicalab->get_user_submission($this->students[0]->id, true);
        $data = new stdClass();
        $data->texto_editor = array('itemid'=>file_get_unused_draft_itemid(),
                                         'text'=>'Submission text',
                                         'format'=>FORMAT_MOODLE);
        $plugin = $practicalab->get_submission_plugin_by_type('texto');
        $plugin->save($submission, $data);

        // Now try and delete.
        $this->assertEquals(true, $practicalab->delete_instance());
    }

    public function test_reset_userdata() {
        global $DB;

        $now = time();
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance(array('practicalabsubmission_texto_enabled'=>1,
                                               'duedate'=>$now));

        // Simulate adding a grade.
        $this->setUser($this->teachers[0]);
        $data = new stdClass();
        $data->grade = '50.0';
        $practicalab->testable_apply_grade_to_user($data, $this->students[0]->id, 0);

        // Simulate a submission.
        $this->setUser($this->students[0]);
        $submission = $practicalab->get_user_submission($this->students[0]->id, true);
        $data = new stdClass();
        $data->texto_editor = array('itemid'=>file_get_unused_draft_itemid(),
                                         'text'=>'Submission text',
                                         'format'=>FORMAT_MOODLE);
        $plugin = $practicalab->get_submission_plugin_by_type('texto');
        $plugin->save($submission, $data);

        $this->assertEquals(true, $practicalab->has_submissions_or_grades());
        // Now try and reset.
        $data = new stdClass();
        $data->reset_practicalab_submissions = 1;
        $data->reset_gradebook_grades = 1;
        $data->courseid = $this->course->id;
        $data->timeshift = 24*60*60;
        $this->setUser($this->editingteachers[0]);
        $practicalab->reset_userdata($data);
        $this->assertEquals(false, $practicalab->has_submissions_or_grades());

        // Reload the instance data.
        $instance = $DB->get_record('practicalab', array('id'=>$practicalab->get_instance()->id));
        $this->assertEquals($now + 24*60*60, $instance->duedate);
    }

    public function test_plugin_settings() {
        global $DB;

        $now = time();
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance(array('practicalabsubmission_file_enabled'=>1,
                                               'practicalabsubmission_file_maxfiles'=>12,
                                               'practicalabsubmission_file_maxsizebytes'=>10));

        $plugin = $practicalab->get_submission_plugin_by_type('file');
        $this->assertEquals('12', $plugin->get_config('maxfilesubmissions'));
    }

    public function test_update_calendar() {
        global $DB;

        $now = time();
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance(array('duedate'=>$now));

        // See if there is an event in the calendar.
        $params = array('modulename'=>'practicalab', 'instance'=>$practicalab->get_instance()->id);
        $id = $DB->get_field('event', 'id', $params);

        $this->assertEquals(false, empty($id));
    }

    public function test_update_instance() {
        global $DB;

        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance(array('practicalabsubmission_texto_enabled'=>1));

        $now = time();
        $instance = $practicalab->get_instance();
        $instance->duedate = $now;
        $instance->instance = $instance->id;
        $instance->practicalabsubmission_texto_enabled = 1;

        $practicalab->update_instance($instance);

        $instance = $DB->get_record('practicalab', array('id'=>$practicalab->get_instance()->id));
        $this->assertEquals($now, $instance->duedate);
    }

    public function test_list_participants() {
        $this->create_extra_users();
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance(array('grade'=>100));

        $this->assertEquals(self::DEFAULT_STUDENT_COUNT + self::EXTRA_STUDENT_COUNT, count($practicalab->list_participants(null, true)));
    }

    public function test_count_teams() {
        $this->create_extra_users();
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance(array('teamsubmission'=>1));

        $this->assertEquals(self::GROUP_COUNT + 1, $practicalab->count_teams());
    }

    public function test_count_submissions() {
        $this->create_extra_users();
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance(array('practicalabsubmission_texto_enabled'=>1));

        // Simulate a submission.
        $this->setUser($this->extrastudents[0]);
        $submission = $practicalab->get_user_submission($this->extrastudents[0]->id, true);
        // Leave this one as DRAFT.
        $data = new stdClass();
        $data->texto_editor = array('itemid'=>file_get_unused_draft_itemid(),
                                         'text'=>'Submission text',
                                         'format'=>FORMAT_MOODLE);
        $plugin = $practicalab->get_submission_plugin_by_type('texto');
        $plugin->save($submission, $data);

        // Simulate adding a grade.
        $this->setUser($this->teachers[0]);
        $data = new stdClass();
        $data->grade = '50.0';
        $practicalab->testable_apply_grade_to_user($data, $this->extrastudents[0]->id, 0);

        // Simulate a submission.
        $this->setUser($this->extrastudents[1]);
        $submission = $practicalab->get_user_submission($this->extrastudents[1]->id, true);
        $submission->status = PRACTICALAB_SUBMISSION_STATUS_SUBMITTED;
        $practicalab->testable_update_submission($submission, $this->extrastudents[1]->id, true, false);
        $data = new stdClass();
        $data->texto_editor = array('itemid'=>file_get_unused_draft_itemid(),
                                         'text'=>'Submission text',
                                         'format'=>FORMAT_MOODLE);
        $plugin = $practicalab->get_submission_plugin_by_type('texto');
        $plugin->save($submission, $data);

        // Simulate a submission.
        $this->setUser($this->extrastudents[2]);
        $submission = $practicalab->get_user_submission($this->extrastudents[2]->id, true);
        $submission->status = PRACTICALAB_SUBMISSION_STATUS_SUBMITTED;
        $practicalab->testable_update_submission($submission, $this->extrastudents[2]->id, true, false);
        $data = new stdClass();
        $data->texto_editor = array('itemid'=>file_get_unused_draft_itemid(),
                                         'text'=>'Submission text',
                                         'format'=>FORMAT_MOODLE);
        $plugin = $practicalab->get_submission_plugin_by_type('texto');
        $plugin->save($submission, $data);

        // Simulate a submission.
        $this->setUser($this->extrastudents[3]);
        $submission = $practicalab->get_user_submission($this->extrastudents[3]->id, true);
        $submission->status = PRACTICALAB_SUBMISSION_STATUS_SUBMITTED;
        $practicalab->testable_update_submission($submission, $this->extrastudents[3]->id, true, false);
        $data = new stdClass();
        $data->texto_editor = array('itemid'=>file_get_unused_draft_itemid(),
                                         'text'=>'Submission text',
                                         'format'=>FORMAT_MOODLE);
        $plugin = $practicalab->get_submission_plugin_by_type('texto');
        $plugin->save($submission, $data);

        // Simulate adding a grade.
        $this->setUser($this->teachers[0]);
        $data = new stdClass();
        $data->grade = '50.0';
        $practicalab->testable_apply_grade_to_user($data, $this->extrastudents[3]->id, 0);

        $this->assertEquals(2, $practicalab->count_grades());
        $this->assertEquals(4, $practicalab->count_submissions());
        $this->assertEquals(2, $practicalab->count_submissions_need_grading());
        $this->assertEquals(3, $practicalab->count_submissions_with_status(PRACTICALAB_SUBMISSION_STATUS_SUBMITTED));
        $this->assertEquals(1, $practicalab->count_submissions_with_status(PRACTICALAB_SUBMISSION_STATUS_DRAFT));
    }

    public function test_get_grading_userid_list() {
        $this->create_extra_users();
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance();

        $users = $practicalab->testable_get_grading_userid_list();
        $this->assertEquals(self::DEFAULT_STUDENT_COUNT + self::EXTRA_STUDENT_COUNT, count($users));
    }

    public function test_cron() {
        // First run cron so there are no messages waiting to be sent (from other tests).
        cron_setup_user();
        practicalab::cron();

        // Now create an practicalabment and add some feedback.
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance();

        // Simulate adding a grade.
        $this->setUser($this->teachers[0]);
        $data = new stdClass();
        $data->grade = '50.0';
        $practicalab->testable_apply_grade_to_user($data, $this->students[0]->id, 0);

        // Now run cron and see that one message was sent.
        $this->preventResetByRollback();
        $sink = $this->redirectMessages();
        cron_setup_user();
        $this->expectOutputRegex('/Done processing 1 practicalabment submissions/');
        practicalab::cron();

        $messages = $sink->get_messages();
        $this->assertEquals(1, count($messages));
        $this->assertEquals(1, $messages[0]->notification);
        $this->assertEquals($practicalab->get_instance()->name, $messages[0]->contexturlname);
    }

    public function test_is_graded() {
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance();

        // Simulate adding a grade.
        $this->setUser($this->teachers[0]);
        $data = new stdClass();
        $data->grade = '50.0';
        $practicalab->testable_apply_grade_to_user($data, $this->students[0]->id, 0);

        $this->assertEquals(true, $practicalab->testable_is_graded($this->students[0]->id));
        $this->assertEquals(false, $practicalab->testable_is_graded($this->students[1]->id));
    }

    public function test_can_view_submission() {
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance();

        $this->setUser($this->students[0]);
        $this->assertEquals(true, $practicalab->can_view_submission($this->students[0]->id));
        $this->assertEquals(false, $practicalab->can_view_submission($this->students[1]->id));
        $this->assertEquals(false, $practicalab->can_view_submission($this->teachers[0]->id));
        $this->setUser($this->teachers[0]);
        $this->assertEquals(true, $practicalab->can_view_submission($this->students[0]->id));
        $this->assertEquals(true, $practicalab->can_view_submission($this->students[1]->id));
        $this->assertEquals(true, $practicalab->can_view_submission($this->teachers[0]->id));
        $this->setUser($this->editingteachers[0]);
        $this->assertEquals(true, $practicalab->can_view_submission($this->students[0]->id));
        $this->assertEquals(true, $practicalab->can_view_submission($this->students[1]->id));
        $this->assertEquals(true, $practicalab->can_view_submission($this->teachers[0]->id));
    }


    public function test_update_submission() {
        $this->create_extra_users();
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance();

        $this->setUser($this->extrastudents[0]);
        $now = time();
        $submission = $practicalab->get_user_submission($this->extrastudents[0]->id, true);
        $practicalab->testable_update_submission($submission, $this->extrastudents[0]->id, true, false);

        $this->setUser($this->teachers[0]);
        // Verify the gradebook update.
        $gradinginfo = grade_get_grades($this->course->id,
                                        'mod',
                                        'practicalab',
                                        $practicalab->get_instance()->id,
                                        $this->extrastudents[0]->id);

        $this->assertEquals($this->extrastudents[0]->id,
                            $gradinginfo->items[0]->grades[$this->extrastudents[0]->id]->usermodified);

        // Now verify group practicalabments.
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance(array('teamsubmission'=>1));

        $this->setUser($this->extrastudents[0]);
        $now = time();
        $submission = $practicalab->get_group_submission($this->extrastudents[0]->id, 0, true);
        $practicalab->testable_update_submission($submission, $this->extrastudents[0]->id, true, true);

        // Check that at least 2 members of the submission group had their submission updated.

        $this->setUser($this->editingteachers[0]);
        $gradinginfo = grade_get_grades($this->course->id,
                                        'mod',
                                        'practicalab',
                                        $practicalab->get_instance()->id,
                                        $this->extrastudents[0]->id);

        $this->assertEquals($this->extrastudents[0]->id,
                            $gradinginfo->items[0]->grades[$this->extrastudents[0]->id]->usermodified);

        $gradinginfo = grade_get_grades($this->course->id,
                                        'mod',
                                        'practicalab',
                                        $practicalab->get_instance()->id,
                                        $this->extrastudents[self::GROUP_COUNT]->id);

        $this->assertEquals($this->extrastudents[self::GROUP_COUNT]->id,
                            $gradinginfo->items[0]->grades[$this->extrastudents[self::GROUP_COUNT]->id]->usermodified);

        // Now verify blind marking.
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance(array('blindmarking'=>1));

        $this->setUser($this->extrastudents[0]);
        $now = time();
        $submission = $practicalab->get_user_submission($this->extrastudents[0]->id, true);
        $practicalab->testable_update_submission($submission, $this->extrastudents[0]->id, true, false);

        $this->setUser($this->editingteachers[0]);
        $gradinginfo = grade_get_grades($this->course->id,
                                        'mod',
                                        'practicalab',
                                        $practicalab->get_instance()->id,
                                        $this->extrastudents[0]->id);

        $this->assertEquals(null, $gradinginfo->items[0]->grades[$this->extrastudents[0]->id]->datesubmitted);
    }

    public function test_submissions_open() {
        $this->setUser($this->editingteachers[0]);

        $now = time();
        $tomorrow = $now + 24*60*60;
        $oneweek = $now + 7*24*60*60;
        $yesterday = $now - 24*60*60;

        $practicalab = $this->create_instance();
        $this->assertEquals(true, $practicalab->testable_submissions_open($this->students[0]->id));

        $practicalab = $this->create_instance(array('duedate'=>$tomorrow));
        $this->assertEquals(true, $practicalab->testable_submissions_open($this->students[0]->id));

        $practicalab = $this->create_instance(array('duedate'=>$yesterday));
        $this->assertEquals(true, $practicalab->testable_submissions_open($this->students[0]->id));

        $practicalab = $this->create_instance(array('duedate'=>$yesterday, 'cutoffdate'=>$tomorrow));
        $this->assertEquals(true, $practicalab->testable_submissions_open($this->students[0]->id));

        $practicalab = $this->create_instance(array('duedate'=>$yesterday, 'cutoffdate'=>$yesterday));
        $this->assertEquals(false, $practicalab->testable_submissions_open($this->students[0]->id));

        $practicalab->testable_save_user_extension($this->students[0]->id, $tomorrow);
        $this->assertEquals(true, $practicalab->testable_submissions_open($this->students[0]->id));

        $practicalab = $this->create_instance(array('submissiondrafts'=>1));
        $this->assertEquals(true, $practicalab->testable_submissions_open($this->students[0]->id));

        $this->setUser($this->students[0]);
        $now = time();
        $submission = $practicalab->get_user_submission($this->students[0]->id, true);
        $submission->status = PRACTICALAB_SUBMISSION_STATUS_SUBMITTED;
        $practicalab->testable_update_submission($submission, $this->students[0]->id, true, false);
        $this->setUser($this->editingteachers[0]);
        $this->assertEquals(false, $practicalab->testable_submissions_open($this->students[0]->id));
    }

    public function test_get_graders() {
        $this->create_extra_users();
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance();

        $this->assertCount(self::DEFAULT_TEACHER_COUNT +
                           self::DEFAULT_EDITING_TEACHER_COUNT +
                           self::EXTRA_TEACHER_COUNT +
                           self::EXTRA_EDITING_TEACHER_COUNT,
                           $practicalab->testable_get_graders($this->students[0]->id));

        $practicalab = $this->create_instance();
        // Force create an practicalabment with SEPARATEGROUPS.
        $generator = $this->getDataGenerator()->get_plugin_generator('mod_practicalab');
        $params = array('course'=>$this->course->id);
        $instance = $generator->create_instance($params);
        $cm = get_coursemodule_from_instance('practicalab', $instance->id);
        set_coursemodule_groupmode($cm->id, SEPARATEGROUPS);
        $cm->groupmode = SEPARATEGROUPS;
        $context = context_module::instance($cm->id);
        $practicalab = new testable_practicalab($context, $cm, $this->course);

        $this->setUser($this->students[1]);
        $this->assertCount(4, $practicalab->testable_get_graders($this->students[0]->id));
    }

    public function test_get_uniqueid_for_user() {
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance();

        foreach ($this->students as $student) {
            $uniqueid = $practicalab->get_uniqueid_for_user($student->id);
            $this->assertEquals($student->id, $practicalab->get_user_id_for_uniqueid($uniqueid));
        }
    }

    public function test_show_student_summary() {
        global $CFG, $PAGE;

        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance();
        $PAGE->set_url(new moodle_url('/mod/practicalab/view.php', array('id' => $practicalab->get_course_module()->id)));

        // No feedback should be available because this student has not been graded.
        $this->setUser($this->students[0]);
        $output = $practicalab->view_student_summary($this->students[0], true);
        $this->assertEquals(false, strpos($output, 'Feedback'), 'Do not show feedback if there is no grade');
        // Simulate adding a grade.
        $this->setUser($this->teachers[0]);
        $data = new stdClass();
        $data->grade = '50.0';
        $practicalab->testable_apply_grade_to_user($data, $this->students[0]->id, 0);

        // Now we should see the feedback.
        $this->setUser($this->students[0]);
        $output = $practicalab->view_student_summary($this->students[0], true);
        $this->assertNotEquals(false, strpos($output, 'Feedback'), 'Show feedback if there is a grade');

        // Now hide the grade in gradebook.
        $this->setUser($this->teachers[0]);
        require_once($CFG->libdir.'/gradelib.php');
        $gradeitem = new grade_item(array(
            'itemtype'      => 'mod',
            'itemmodule'    => 'practicalab',
            'iteminstance'  => $practicalab->get_instance()->id,
            'courseid'      => $this->course->id));

        $gradeitem->set_hidden(1, false);

        // No feedback should be available because the grade is hidden.
        $this->setUser($this->students[0]);
        $output = $practicalab->view_student_summary($this->students[0], true);
        $this->assertEquals(false, strpos($output, 'Feedback'), 'Do not show feedback if the grade is hidden in the gradebook');

        // Do the same but add feedback.
        $practicalab = $this->create_instance(array('practicalabfeedback_comments_enabled' => 1));

        $this->setUser($this->teachers[0]);
        $grade = $practicalab->get_user_grade($this->students[0]->id, true);
        $data = new stdClass();
        $data->practicalabfeedbackcomments_editor = array('text'=>'Tomato sauce',
                                         'format'=>FORMAT_MOODLE);
        $plugin = $practicalab->get_feedback_plugin_by_type('comments');
        $plugin->save($grade, $data);

        // Should have feedback but no grade.
        $this->setUser($this->students[0]);
        $output = $practicalab->view_student_summary($this->students[0], true);
        $this->assertNotEquals(false, strpos($output, 'Tomato sauce'), 'Show feedback even if there is no grade');
        $this->assertEquals(false, strpos($output, 'Grade'), 'Do not show grade when there is no grade.');
        $this->assertEquals(false, strpos($output, 'Graded on'), 'Do not show graded date when there is no grade.');
    }

    public function test_attempt_reopen_method_manual() {
        global $PAGE;

        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance(array('attemptreopenmethod'=>PRACTICALAB_ATTEMPT_REOPEN_METHOD_MANUAL,
                                               'maxattempts'=>3,
                                               'submissiondrafts'=>1,
                                               'practicalabsubmission_texto_enabled'=>1));
        $PAGE->set_url(new moodle_url('/mod/practicalab/view.php', array('id' => $practicalab->get_course_module()->id)));

        // Student should be able to see an add submission button.
        $this->setUser($this->students[0]);
        $output = $practicalab->view_student_summary($this->students[0], true);
        $this->assertNotEquals(false, strpos($output, get_string('addsubmission', 'practicalab')));

        // Add a submission.
        $now = time();
        $submission = $practicalab->get_user_submission($this->students[0]->id, true);
        $data = new stdClass();
        $data->texto_editor = array('itemid'=>file_get_unused_draft_itemid(),
                                         'text'=>'Submission text',
                                         'format'=>FORMAT_MOODLE);
        $plugin = $practicalab->get_submission_plugin_by_type('texto');
        $plugin->save($submission, $data);

        // And now submit it for marking.
        $submission->status = PRACTICALAB_SUBMISSION_STATUS_SUBMITTED;
        $practicalab->testable_update_submission($submission, $this->students[0]->id, true, false);

        // Verify the student cannot make changes to the submission.
        $output = $practicalab->view_student_summary($this->students[0], true);
        $this->assertEquals(false, strpos($output, get_string('addsubmission', 'practicalab')));

        // Mark the submission.
        $this->setUser($this->teachers[0]);
        $data = new stdClass();
        $data->grade = '50.0';
        $practicalab->testable_apply_grade_to_user($data, $this->students[0]->id, 0);

        // Check the student can see the grade.
        $this->setUser($this->students[0]);
        $output = $practicalab->view_student_summary($this->students[0], true);
        $this->assertNotEquals(false, strpos($output, '50.0'));

        // Allow the student another attempt.
        $this->teachers[0]->ignoresesskey = true;
        $this->setUser($this->teachers[0]);
        $result = $practicalab->testable_process_add_attempt($this->students[0]->id);
        $this->assertEquals(true, $result);

        // Check that the previous attempt is now in the submission history table.
        $this->setUser($this->students[0]);
        $output = $practicalab->view_student_summary($this->students[0], true);
        // Need a better check.
        $this->assertNotEquals(false, strpos($output, 'Submission text'), 'Contains: Submission text');

        // Check that the student now has a button for Add a new attempt".
        $this->assertNotEquals(false, strpos($output, get_string('addnewattempt', 'practicalab')));
        // Check that the student now does not have a button for Submit.
        $this->assertEquals(false, strpos($output, get_string('submitpracticalabment', 'practicalab')));

        // Check that the student now has a submission history.
        $this->assertNotEquals(false, strpos($output, get_string('attempthistory', 'practicalab')));

        $this->setUser($this->teachers[0]);
        // Check that the grading table loads correctly and contains this user.
        // This is also testing that we do not get duplicate rows in the grading table.
        $gradingtable = new practicalab_grading_table($practicalab, 100, '', 0, true);
        $output = $practicalab->get_renderer()->render($gradingtable);
        $this->assertEquals(true, strpos($output, $this->students[0]->lastname));

        // Should be 1 not 2.
        $this->assertEquals(1, $practicalab->count_submissions());
        $this->assertEquals(1, $practicalab->count_submissions_with_status('reopened'));
        $this->assertEquals(0, $practicalab->count_submissions_need_grading());
        $this->assertEquals(1, $practicalab->count_grades());

        // Change max attempts to unlimited.
        $formdata = clone($practicalab->get_instance());
        $formdata->maxattempts = PRACTICALAB_UNLIMITED_ATTEMPTS;
        $formdata->instance = $formdata->id;
        $practicalab->update_instance($formdata);

        // Check we can repopen still.
        $result = $practicalab->testable_process_add_attempt($this->students[0]->id);
        $this->assertEquals(true, $result);

        $grades = $practicalab->get_user_grades_for_gradebook($this->students[0]->id);
        $this->assertEquals(50, (int)$grades[$this->students[0]->id]->rawgrade);


    }

}

