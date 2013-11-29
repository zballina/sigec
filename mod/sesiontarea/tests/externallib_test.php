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

defined('MOODLE_INTERNAL') || die();

global $CFG;

require_once($CFG->dirroot . '/webservice/tests/helpers.php');

/**
 * External mod sesiontarea functions unit tests
 *
 * @package mod_sesiontarea
 * @category external
 * @copyright 2012 Paul Charsley
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mod_sesiontarea_external_testcase extends externallib_advanced_testcase {

    /**
     * Tests set up
     */
    protected function setUp() {
        global $CFG;
        require_once($CFG->dirroot . '/mod/sesiontarea/externallib.php');
    }

    /**
     * Test get_grades
     */
    public function test_get_grades () {
        global $DB, $USER;

        $this->resetAfterTest(true);
        // Create a course and sesiontareament.
        $coursedata['idnumber'] = 'idnumbercourse';
        $coursedata['fullname'] = 'Lightwork Course';
        $coursedata['summary'] = 'Lightwork Course description';
        $coursedata['summaryformat'] = FORMAT_MOODLE;
        $course = self::getDataGenerator()->create_course($coursedata);

        $sesiontareadata['course'] = $course->id;
        $sesiontareadata['name'] = 'lightwork sesiontareament';

        $sesiontarea = self::getDataGenerator()->create_module('sesiontarea', $sesiontareadata);

        // Create a manual enrolment record.
        $manual_enrol_data['enrol'] = 'manual';
        $manual_enrol_data['status'] = 0;
        $manual_enrol_data['courseid'] = $course->id;
        $enrolid = $DB->insert_record('enrol', $manual_enrol_data);

        // Create a teacher and give them capabilities.
        $context = context_course::instance($course->id);
        $roleid = $this->sesiontareaUserCapability('moodle/course:viewparticipants', $context->id, 3);
        $context = context_module::instance($sesiontarea->id);
        $this->sesiontareaUserCapability('mod/sesiontarea:grade', $context->id, $roleid);

        // Create the teacher's enrolment record.
        $user_enrolment_data['status'] = 0;
        $user_enrolment_data['enrolid'] = $enrolid;
        $user_enrolment_data['userid'] = $USER->id;
        $DB->insert_record('user_enrolments', $user_enrolment_data);

        // Create a student and give them 2 grades (for 2 attempts).
        $student = self::getDataGenerator()->create_user();
        $grade = new stdClass();
        $grade->sesiontareament = $sesiontarea->id;
        $grade->userid = $student->id;
        $grade->timecreated = time();
        $grade->timemodified = $grade->timecreated;
        $grade->grader = $USER->id;
        $grade->grade = 50;
        $grade->attemptnumber = 0;
        $DB->insert_record('sesiontarea_grades', $grade);

        $grade = new stdClass();
        $grade->sesiontareament = $sesiontarea->id;
        $grade->userid = $student->id;
        $grade->timecreated = time();
        $grade->timemodified = $grade->timecreated;
        $grade->grader = $USER->id;
        $grade->grade = 75;
        $grade->attemptnumber = 1;
        $DB->insert_record('sesiontarea_grades', $grade);

        $sesiontareamentids[] = $sesiontarea->id;
        $result = mod_sesiontarea_external::get_grades($sesiontareamentids);

        // We need to execute the return values cleaning process to simulate the web service server.
        $result = external_api::clean_returnvalue(mod_sesiontarea_external::get_grades_returns(), $result);

        // Check that the correct grade information for the student is returned.
        $this->assertEquals(1, count($result['sesiontareaments']));
        $sesiontareament = $result['sesiontareaments'][0];
        $this->assertEquals($sesiontarea->id, $sesiontareament['sesiontareamentid']);
        // Should only get the last grade for this student.
        $this->assertEquals(1, count($sesiontareament['grades']));
        $grade = $sesiontareament['grades'][0];
        $this->assertEquals($student->id, $grade['userid']);
        // Should be the last grade (not the first)
        $this->assertEquals(75, $grade['grade']);
    }

    /**
     * Test get_sesiontareaments
     */
    public function test_get_sesiontareaments () {
        global $DB, $USER;

        $this->resetAfterTest(true);

        $category = self::getDataGenerator()->create_category(array(
            'name' => 'Test category'
        ));

        // Create a course.
        $course1 = self::getDataGenerator()->create_course(array(
            'idnumber' => 'idnumbercourse1',
            'fullname' => 'Lightwork Course 1',
            'summary' => 'Lightwork Course 1 description',
            'summaryformat' => FORMAT_MOODLE,
            'category' => $category->id
        ));

        // Create a second course, just for testing.
        $course2 = self::getDataGenerator()->create_course(array(
            'idnumber' => 'idnumbercourse2',
            'fullname' => 'Lightwork Course 2',
            'summary' => 'Lightwork Course 2 description',
            'summaryformat' => FORMAT_MOODLE,
            'category' => $category->id
        ));

        // Create the sesiontareament module.
        $sesiontarea1 = self::getDataGenerator()->create_module('sesiontarea', array(
            'course' => $course1->id,
            'name' => 'lightwork sesiontareament'
        ));

        // Create manual enrolment record.
        $enrolid = $DB->insert_record('enrol', (object)array(
            'enrol' => 'manual',
            'status' => 0,
            'courseid' => $course1->id
        ));

        // Create the user and give them capabilities.
        $context = context_course::instance($course1->id);
        $roleid = $this->sesiontareaUserCapability('moodle/course:view', $context->id);
        $context = context_module::instance($sesiontarea1->id);
        $this->sesiontareaUserCapability('mod/sesiontarea:view', $context->id, $roleid);

        // Create the user enrolment record.
        $DB->insert_record('user_enrolments', (object)array(
            'status' => 0,
            'enrolid' => $enrolid,
            'userid' => $USER->id
        ));

        $result = mod_sesiontarea_external::get_sesiontareaments();

        // We need to execute the return values cleaning process to simulate the web service server.
        $result = external_api::clean_returnvalue(mod_sesiontarea_external::get_sesiontareaments_returns(), $result);

        // Check the course and sesiontareament are returned.
        $this->assertEquals(1, count($result['courses']));
        $course = $result['courses'][0];
        $this->assertEquals('Lightwork Course 1', $course['fullname']);
        $this->assertEquals(1, count($course['sesiontareaments']));
        $sesiontareament = $course['sesiontareaments'][0];
        $this->assertEquals($sesiontarea1->id, $sesiontareament['id']);
        $this->assertEquals($course1->id, $sesiontareament['course']);
        $this->assertEquals('lightwork sesiontareament', $sesiontareament['name']);

        $result = mod_sesiontarea_external::get_sesiontareaments(array($course1->id));

        // We need to execute the return values cleaning process to simulate the web service server.
        $result = external_api::clean_returnvalue(mod_sesiontarea_external::get_sesiontareaments_returns(), $result);

        $this->assertEquals(1, count($result['courses']));
        $course = $result['courses'][0];
        $this->assertEquals('Lightwork Course 1', $course['fullname']);
        $this->assertEquals(1, count($course['sesiontareaments']));
        $sesiontareament = $course['sesiontareaments'][0];
        $this->assertEquals($sesiontarea1->id, $sesiontareament['id']);
        $this->assertEquals($course1->id, $sesiontareament['course']);
        $this->assertEquals('lightwork sesiontareament', $sesiontareament['name']);

        $result = mod_sesiontarea_external::get_sesiontareaments(array($course2->id));

        // We need to execute the return values cleaning process to simulate the web service server.
        $result = external_api::clean_returnvalue(mod_sesiontarea_external::get_sesiontareaments_returns(), $result);

        $this->assertEquals(0, count($result['courses']));
        $this->assertEquals(1, count($result['warnings']));
    }

    /**
     * Test get_submissions
     */
    public function test_get_submissions () {
        global $DB, $USER;

        $this->resetAfterTest(true);
        // Create a course and sesiontareament.
        $coursedata['idnumber'] = 'idnumbercourse1';
        $coursedata['fullname'] = 'Lightwork Course 1';
        $coursedata['summary'] = 'Lightwork Course 1 description';
        $coursedata['summaryformat'] = FORMAT_MOODLE;
        $course1 = self::getDataGenerator()->create_course($coursedata);

        $sesiontareadata['course'] = $course1->id;
        $sesiontareadata['name'] = 'lightwork sesiontareament';

        $sesiontarea1 = self::getDataGenerator()->create_module('sesiontarea', $sesiontareadata);

        // Create a student with an online text submission.
        // First attempt.
        $student = self::getDataGenerator()->create_user();
        $submission = new stdClass();
        $submission->sesiontareament = $sesiontarea1->id;
        $submission->userid = $student->id;
        $submission->timecreated = time();
        $submission->timemodified = $submission->timecreated;
        $submission->status = 'draft';
        $submission->attemptnumber = 0;
        $sid = $DB->insert_record('sesiontarea_submission', $submission);

        // Second attempt.
        $submission = new stdClass();
        $submission->sesiontareament = $sesiontarea1->id;
        $submission->userid = $student->id;
        $submission->timecreated = time();
        $submission->timemodified = $submission->timecreated;
        $submission->status = 'submitted';
        $submission->attemptnumber = 1;
        $sid = $DB->insert_record('sesiontarea_submission', $submission);
        $submission->id = $sid;

        $onlinetextsubmission = new stdClass();
        $onlinetextsubmission->onlinetext = "<p>online test text</p>";
        $onlinetextsubmission->onlineformat = 1;
        $onlinetextsubmission->submission = $submission->id;
        $onlinetextsubmission->sesiontareament = $sesiontarea1->id;
        $DB->insert_record('sesiontareasubmission_onlinetext', $onlinetextsubmission);

        // Create manual enrolment record.
        $manual_enrol_data['enrol'] = 'manual';
        $manual_enrol_data['status'] = 0;
        $manual_enrol_data['courseid'] = $course1->id;
        $enrolid = $DB->insert_record('enrol', $manual_enrol_data);

        // Create a teacher and give them capabilities.
        $context = context_course::instance($course1->id);
        $roleid = $this->sesiontareaUserCapability('moodle/course:viewparticipants', $context->id, 3);
        $context = context_module::instance($sesiontarea1->id);
        $this->sesiontareaUserCapability('mod/sesiontarea:grade', $context->id, $roleid);

        // Create the teacher's enrolment record.
        $user_enrolment_data['status'] = 0;
        $user_enrolment_data['enrolid'] = $enrolid;
        $user_enrolment_data['userid'] = $USER->id;
        $DB->insert_record('user_enrolments', $user_enrolment_data);

        $sesiontareamentids[] = $sesiontarea1->id;
        $result = mod_sesiontarea_external::get_submissions($sesiontareamentids);

        // Check the online text submission is returned.
        $this->assertEquals(1, count($result['sesiontareaments']));
        $sesiontareament = $result['sesiontareaments'][0];
        $this->assertEquals($sesiontarea1->id, $sesiontareament['sesiontareamentid']);
        $this->assertEquals(1, count($sesiontareament['submissions']));
        $submission = $sesiontareament['submissions'][0];
        $this->assertEquals($sid, $submission['id']);
        $this->assertGreaterThanOrEqual(3, count($submission['plugins']));
        $plugins = $submission['plugins'];
        foreach ($plugins as $plugin) {
            $foundonlinetext = false;
            if ($plugin['type'] == 'onlinetext') {
                $foundonlinetext = true;
                break;
            }
        }
        $this->assertTrue($foundonlinetext);
    }
}
