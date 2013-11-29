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
 * External mod practicalab functions unit tests
 *
 * @package mod_practicalab
 * @category external
 * @copyright 2012 Paul Charsley
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mod_practicalab_external_testcase extends externallib_advanced_testcase {

    /**
     * Tests set up
     */
    protected function setUp() {
        global $CFG;
        require_once($CFG->dirroot . '/mod/practicalab/externallib.php');
    }

    /**
     * Test get_grades
     */
    public function test_get_grades () {
        global $DB, $USER;

        $this->resetAfterTest(true);
        // Create a course and practicalabment.
        $coursedata['idnumber'] = 'idnumbercourse';
        $coursedata['fullname'] = 'Lightwork Course';
        $coursedata['summary'] = 'Lightwork Course description';
        $coursedata['summaryformat'] = FORMAT_MOODLE;
        $course = self::getDataGenerator()->create_course($coursedata);

        $practicalabdata['course'] = $course->id;
        $practicalabdata['name'] = 'lightwork practicalabment';

        $practicalab = self::getDataGenerator()->create_module('practicalab', $practicalabdata);

        // Create a manual enrolment record.
        $manual_enrol_data['enrol'] = 'manual';
        $manual_enrol_data['status'] = 0;
        $manual_enrol_data['courseid'] = $course->id;
        $enrolid = $DB->insert_record('enrol', $manual_enrol_data);

        // Create a teacher and give them capabilities.
        $context = context_course::instance($course->id);
        $roleid = $this->practicalabUserCapability('moodle/course:viewparticipants', $context->id, 3);
        $context = context_module::instance($practicalab->id);
        $this->practicalabUserCapability('mod/practicalab:grade', $context->id, $roleid);

        // Create the teacher's enrolment record.
        $user_enrolment_data['status'] = 0;
        $user_enrolment_data['enrolid'] = $enrolid;
        $user_enrolment_data['userid'] = $USER->id;
        $DB->insert_record('user_enrolments', $user_enrolment_data);

        // Create a student and give them 2 grades (for 2 attempts).
        $student = self::getDataGenerator()->create_user();
        $grade = new stdClass();
        $grade->practicalabment = $practicalab->id;
        $grade->userid = $student->id;
        $grade->timecreated = time();
        $grade->timemodified = $grade->timecreated;
        $grade->grader = $USER->id;
        $grade->grade = 50;
        $grade->attemptnumber = 0;
        $DB->insert_record('practicalab_grades', $grade);

        $grade = new stdClass();
        $grade->practicalabment = $practicalab->id;
        $grade->userid = $student->id;
        $grade->timecreated = time();
        $grade->timemodified = $grade->timecreated;
        $grade->grader = $USER->id;
        $grade->grade = 75;
        $grade->attemptnumber = 1;
        $DB->insert_record('practicalab_grades', $grade);

        $practicalabmentids[] = $practicalab->id;
        $result = mod_practicalab_external::get_grades($practicalabmentids);

        // We need to execute the return values cleaning process to simulate the web service server.
        $result = external_api::clean_returnvalue(mod_practicalab_external::get_grades_returns(), $result);

        // Check that the correct grade information for the student is returned.
        $this->assertEquals(1, count($result['practicalabments']));
        $practicalabment = $result['practicalabments'][0];
        $this->assertEquals($practicalab->id, $practicalabment['practicalabmentid']);
        // Should only get the last grade for this student.
        $this->assertEquals(1, count($practicalabment['grades']));
        $grade = $practicalabment['grades'][0];
        $this->assertEquals($student->id, $grade['userid']);
        // Should be the last grade (not the first)
        $this->assertEquals(75, $grade['grade']);
    }

    /**
     * Test get_practicalabments
     */
    public function test_get_practicalabments () {
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

        // Create the practicalabment module.
        $practicalab1 = self::getDataGenerator()->create_module('practicalab', array(
            'course' => $course1->id,
            'name' => 'lightwork practicalabment'
        ));

        // Create manual enrolment record.
        $enrolid = $DB->insert_record('enrol', (object)array(
            'enrol' => 'manual',
            'status' => 0,
            'courseid' => $course1->id
        ));

        // Create the user and give them capabilities.
        $context = context_course::instance($course1->id);
        $roleid = $this->practicalabUserCapability('moodle/course:view', $context->id);
        $context = context_module::instance($practicalab1->id);
        $this->practicalabUserCapability('mod/practicalab:view', $context->id, $roleid);

        // Create the user enrolment record.
        $DB->insert_record('user_enrolments', (object)array(
            'status' => 0,
            'enrolid' => $enrolid,
            'userid' => $USER->id
        ));

        $result = mod_practicalab_external::get_practicalabments();

        // We need to execute the return values cleaning process to simulate the web service server.
        $result = external_api::clean_returnvalue(mod_practicalab_external::get_practicalabments_returns(), $result);

        // Check the course and practicalabment are returned.
        $this->assertEquals(1, count($result['courses']));
        $course = $result['courses'][0];
        $this->assertEquals('Lightwork Course 1', $course['fullname']);
        $this->assertEquals(1, count($course['practicalabments']));
        $practicalabment = $course['practicalabments'][0];
        $this->assertEquals($practicalab1->id, $practicalabment['id']);
        $this->assertEquals($course1->id, $practicalabment['course']);
        $this->assertEquals('lightwork practicalabment', $practicalabment['name']);

        $result = mod_practicalab_external::get_practicalabments(array($course1->id));

        // We need to execute the return values cleaning process to simulate the web service server.
        $result = external_api::clean_returnvalue(mod_practicalab_external::get_practicalabments_returns(), $result);

        $this->assertEquals(1, count($result['courses']));
        $course = $result['courses'][0];
        $this->assertEquals('Lightwork Course 1', $course['fullname']);
        $this->assertEquals(1, count($course['practicalabments']));
        $practicalabment = $course['practicalabments'][0];
        $this->assertEquals($practicalab1->id, $practicalabment['id']);
        $this->assertEquals($course1->id, $practicalabment['course']);
        $this->assertEquals('lightwork practicalabment', $practicalabment['name']);

        $result = mod_practicalab_external::get_practicalabments(array($course2->id));

        // We need to execute the return values cleaning process to simulate the web service server.
        $result = external_api::clean_returnvalue(mod_practicalab_external::get_practicalabments_returns(), $result);

        $this->assertEquals(0, count($result['courses']));
        $this->assertEquals(1, count($result['warnings']));
    }

    /**
     * Test get_submissions
     */
    public function test_get_submissions () {
        global $DB, $USER;

        $this->resetAfterTest(true);
        // Create a course and practicalabment.
        $coursedata['idnumber'] = 'idnumbercourse1';
        $coursedata['fullname'] = 'Lightwork Course 1';
        $coursedata['summary'] = 'Lightwork Course 1 description';
        $coursedata['summaryformat'] = FORMAT_MOODLE;
        $course1 = self::getDataGenerator()->create_course($coursedata);

        $practicalabdata['course'] = $course1->id;
        $practicalabdata['name'] = 'lightwork practicalabment';

        $practicalab1 = self::getDataGenerator()->create_module('practicalab', $practicalabdata);

        // Create a student with an online text submission.
        // First attempt.
        $student = self::getDataGenerator()->create_user();
        $submission = new stdClass();
        $submission->practicalabment = $practicalab1->id;
        $submission->userid = $student->id;
        $submission->timecreated = time();
        $submission->timemodified = $submission->timecreated;
        $submission->status = 'draft';
        $submission->attemptnumber = 0;
        $sid = $DB->insert_record('practicalab_submission', $submission);

        // Second attempt.
        $submission = new stdClass();
        $submission->practicalabment = $practicalab1->id;
        $submission->userid = $student->id;
        $submission->timecreated = time();
        $submission->timemodified = $submission->timecreated;
        $submission->status = 'submitted';
        $submission->attemptnumber = 1;
        $sid = $DB->insert_record('practicalab_submission', $submission);
        $submission->id = $sid;

        $textosubmission = new stdClass();
        $textosubmission->texto = "<p>online test text</p>";
        $textosubmission->onlineformat = 1;
        $textosubmission->submission = $submission->id;
        $textosubmission->practicalabment = $practicalab1->id;
        $DB->insert_record('practicalabsubmission_texto', $textosubmission);

        // Create manual enrolment record.
        $manual_enrol_data['enrol'] = 'manual';
        $manual_enrol_data['status'] = 0;
        $manual_enrol_data['courseid'] = $course1->id;
        $enrolid = $DB->insert_record('enrol', $manual_enrol_data);

        // Create a teacher and give them capabilities.
        $context = context_course::instance($course1->id);
        $roleid = $this->practicalabUserCapability('moodle/course:viewparticipants', $context->id, 3);
        $context = context_module::instance($practicalab1->id);
        $this->practicalabUserCapability('mod/practicalab:grade', $context->id, $roleid);

        // Create the teacher's enrolment record.
        $user_enrolment_data['status'] = 0;
        $user_enrolment_data['enrolid'] = $enrolid;
        $user_enrolment_data['userid'] = $USER->id;
        $DB->insert_record('user_enrolments', $user_enrolment_data);

        $practicalabmentids[] = $practicalab1->id;
        $result = mod_practicalab_external::get_submissions($practicalabmentids);

        // Check the online text submission is returned.
        $this->assertEquals(1, count($result['practicalabments']));
        $practicalabment = $result['practicalabments'][0];
        $this->assertEquals($practicalab1->id, $practicalabment['practicalabmentid']);
        $this->assertEquals(1, count($practicalabment['submissions']));
        $submission = $practicalabment['submissions'][0];
        $this->assertEquals($sid, $submission['id']);
        $this->assertGreaterThanOrEqual(3, count($submission['plugins']));
        $plugins = $submission['plugins'];
        foreach ($plugins as $plugin) {
            $foundtexto = false;
            if ($plugin['type'] == 'texto') {
                $foundtexto = true;
                break;
            }
        }
        $this->assertTrue($foundtexto);
    }
}
