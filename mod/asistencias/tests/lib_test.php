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
 * Unit tests for (some of) mod/asistencias/lib.php.
 *
 * @package    mod_asistencias
 * @category   phpunit
 * @copyright  1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/mod/asistencias/lib.php');
require_once($CFG->dirroot . '/mod/asistencias/locallib.php');
require_once($CFG->dirroot . '/mod/asistencias/tests/base_test.php');

/**
 * Unit tests for (some of) mod/asistencias/lib.php.
 *
 * @copyright  1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mod_asistencias_lib_testcase extends mod_asistencias_base_testcase {

    public function test_asistencias_print_overview() {
        $this->setUser($this->editingteachers[0]);
        $this->create_instance();
        $this->create_instance(array('duedate'=>time()));

        $this->setUser($this->students[0]);
        $overview = array();
        asistencias_print_overview(array($this->course->id => $this->course), $overview);
        $this->assertEquals(count($overview), 1);

        $this->setUser($this->teachers[0]);
        $overview = array();
        asistencias_print_overview(array($this->course->id => $this->course), $overview);
        $this->assertEquals(count($overview), 1);

        $this->setUser($this->editingteachers[0]);
        $overview = array();
        asistencias_print_overview(array($this->course->id => $this->course), $overview);
        $this->assertEquals(1, count($overview));
    }

    public function test_print_recent_activity() {
        $this->setUser($this->editingteachers[0]);
        $asistencias = $this->create_instance();

        $submission = $asistencias->get_user_submission($this->students[0]->id, true);

        $this->expectOutputRegex('/submitted:/');
        asistencias_print_recent_activity($this->course, true, time() - 3600);
    }

    public function test_asistencias_get_recent_mod_activity() {
        $this->setUser($this->editingteachers[0]);
        $asistencias = $this->create_instance();

        $submission = $asistencias->get_user_submission($this->students[0]->id, true);

        $activities = array();
        $index = 0;

        $activity = new stdClass();
        $activity->type    = 'activity';
        $activity->cmid    = $asistencias->get_course_module()->id;
        $activities[$index++] = $activity;

        asistencias_get_recent_mod_activity( $activities,
                                        $index,
                                        time() - 3600,
                                        $this->course->id,
                                        $asistencias->get_course_module()->id);

        $this->assertEquals("asistencias", $activities[1]->type);
    }

    public function test_asistencias_user_complete() {
        global $PAGE;

        $this->setUser($this->editingteachers[0]);
        $asistencias = $this->create_instance(array('submissiondrafts' => 1));
        $PAGE->set_url(new moodle_url('/mod/asistencias/view.php', array('id'=>$asistencias->get_course_module()->id)));

        $submission = $asistencias->get_user_submission($this->students[0]->id, true);

        $this->expectOutputRegex('/Draft/');
        asistencias_user_complete($this->course, $this->students[0], $asistencias->get_course_module(), $asistencias->get_instance());
    }

    public function test_asistencias_user_outline() {
        $this->setUser($this->editingteachers[0]);
        $asistencias = $this->create_instance();

        $this->setUser($this->teachers[0]);
        $data = $asistencias->get_user_grade($this->students[0]->id, true);
        $data->grade = '50.5';
        $asistencias->update_grade($data);

        $result = asistencias_user_outline($this->course, $this->students[0], $asistencias->get_course_module(), $asistencias->get_instance());

        $this->assertRegExp('/50.5/', $result->info);
    }

    public function test_asistencias_get_completion_state() {
        global $DB;
        $asistencias = $this->create_instance(array('submissiondrafts'=>0, 'completionsubmit'=>1));

        $this->setUser($this->students[0]);
        $result = asistencias_get_completion_state($this->course, $asistencias->get_course_module(), $this->students[0]->id, false);
        $this->assertFalse($result);
        $submission = $asistencias->get_user_submission($this->students[0]->id, true);
        $submission->status = ASISTENCIAS_SUBMISSION_STATUS_SUBMITTED;
        $DB->update_record('asistencias_submission', $submission);

        $result = asistencias_get_completion_state($this->course, $asistencias->get_course_module(), $this->students[0]->id, false);

        $this->assertTrue($result);
    }

}
