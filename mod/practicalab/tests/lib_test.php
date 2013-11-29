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
 * Unit tests for (some of) mod/practicalab/lib.php.
 *
 * @package    mod_practicalab
 * @category   phpunit
 * @copyright  1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/mod/practicalab/lib.php');
require_once($CFG->dirroot . '/mod/practicalab/locallib.php');
require_once($CFG->dirroot . '/mod/practicalab/tests/base_test.php');

/**
 * Unit tests for (some of) mod/practicalab/lib.php.
 *
 * @copyright  1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mod_practicalab_lib_testcase extends mod_practicalab_base_testcase {

    public function test_practicalab_print_overview() {
        $this->setUser($this->editingteachers[0]);
        $this->create_instance();
        $this->create_instance(array('duedate'=>time()));

        $this->setUser($this->students[0]);
        $overview = array();
        practicalab_print_overview(array($this->course->id => $this->course), $overview);
        $this->assertEquals(count($overview), 1);

        $this->setUser($this->teachers[0]);
        $overview = array();
        practicalab_print_overview(array($this->course->id => $this->course), $overview);
        $this->assertEquals(count($overview), 1);

        $this->setUser($this->editingteachers[0]);
        $overview = array();
        practicalab_print_overview(array($this->course->id => $this->course), $overview);
        $this->assertEquals(1, count($overview));
    }

    public function test_print_recent_activity() {
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance();

        $submission = $practicalab->get_user_submission($this->students[0]->id, true);

        $this->expectOutputRegex('/submitted:/');
        practicalab_print_recent_activity($this->course, true, time() - 3600);
    }

    public function test_practicalab_get_recent_mod_activity() {
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance();

        $submission = $practicalab->get_user_submission($this->students[0]->id, true);

        $activities = array();
        $index = 0;

        $activity = new stdClass();
        $activity->type    = 'activity';
        $activity->cmid    = $practicalab->get_course_module()->id;
        $activities[$index++] = $activity;

        practicalab_get_recent_mod_activity( $activities,
                                        $index,
                                        time() - 3600,
                                        $this->course->id,
                                        $practicalab->get_course_module()->id);

        $this->assertEquals("practicalab", $activities[1]->type);
    }

    public function test_practicalab_user_complete() {
        global $PAGE;

        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance(array('submissiondrafts' => 1));
        $PAGE->set_url(new moodle_url('/mod/practicalab/view.php', array('id'=>$practicalab->get_course_module()->id)));

        $submission = $practicalab->get_user_submission($this->students[0]->id, true);

        $this->expectOutputRegex('/Draft/');
        practicalab_user_complete($this->course, $this->students[0], $practicalab->get_course_module(), $practicalab->get_instance());
    }

    public function test_practicalab_user_outline() {
        $this->setUser($this->editingteachers[0]);
        $practicalab = $this->create_instance();

        $this->setUser($this->teachers[0]);
        $data = $practicalab->get_user_grade($this->students[0]->id, true);
        $data->grade = '50.5';
        $practicalab->update_grade($data);

        $result = practicalab_user_outline($this->course, $this->students[0], $practicalab->get_course_module(), $practicalab->get_instance());

        $this->assertRegExp('/50.5/', $result->info);
    }

    public function test_practicalab_get_completion_state() {
        global $DB;
        $practicalab = $this->create_instance(array('submissiondrafts'=>0, 'completionsubmit'=>1));

        $this->setUser($this->students[0]);
        $result = practicalab_get_completion_state($this->course, $practicalab->get_course_module(), $this->students[0]->id, false);
        $this->assertFalse($result);
        $submission = $practicalab->get_user_submission($this->students[0]->id, true);
        $submission->status = PRACTICALAB_SUBMISSION_STATUS_SUBMITTED;
        $DB->update_record('practicalab_submission', $submission);

        $result = practicalab_get_completion_state($this->course, $practicalab->get_course_module(), $this->students[0]->id, false);

        $this->assertTrue($result);
    }

}
