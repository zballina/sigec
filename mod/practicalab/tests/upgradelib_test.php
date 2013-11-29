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
 * Unit tests for (some of) mod/practicalab/upgradelib.php.
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
require_once($CFG->dirroot . '/mod/practicalabment/lib.php');
require_once($CFG->dirroot . '/mod/practicalab/tests/base_test.php');

/**
 * Unit tests for (some of) mod/practicalab/upgradelib.php.
 *
 * @copyright  1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mod_practicalab_upgradelib_testcase extends mod_practicalab_base_testcase {

    protected function tearDown() {
        // Reset the timeouts.
        set_time_limit(0);
    }

    public function test_upgrade_upload_practicalabment() {
        global $DB;

        $this->setUser($this->editingteachers[0]);
        $generator = $this->getDataGenerator()->get_plugin_generator('mod_practicalabment');
        $params = array('course'=>$this->course->id,
                        'practicalabmenttype'=>'upload');
        $record = $generator->create_instance($params);

        $practicalabment = new practicalabment_base($record->cmid);

        $this->setAdminUser();
        $log = '';
        $upgrader = new practicalab_upgrade_manager();

        $this->assertTrue($upgrader->upgrade_practicalabment($practicalabment->practicalabment->id, $log));
        $record = $DB->get_record('practicalab', array('course'=>$this->course->id));

        $cm = get_coursemodule_from_instance('practicalab', $record->id);
        $context = context_module::instance($cm->id);

        $practicalab = new practicalab($context, $cm, $this->course);

        $plugin = $practicalab->get_submission_plugin_by_type('texto');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $practicalab->get_submission_plugin_by_type('comments');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $practicalab->get_submission_plugin_by_type('file');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $practicalab->get_feedback_plugin_by_type('comments');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $practicalab->get_feedback_plugin_by_type('file');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $practicalab->get_feedback_plugin_by_type('offline');
        $this->assertEmpty($plugin->is_enabled());

        course_delete_module($cm->id);
    }

    public function test_upgrade_uploadsingle_practicalabment() {
        global $DB;

        $this->setUser($this->editingteachers[0]);
        $generator = $this->getDataGenerator()->get_plugin_generator('mod_practicalabment');
        $params = array('course'=>$this->course->id,
                        'practicalabmenttype'=>'uploadsingle');
        $record = $generator->create_instance($params);

        $practicalabment = new practicalabment_base($record->cmid);

        $this->setAdminUser();
        $log = '';
        $upgrader = new practicalab_upgrade_manager();

        $this->assertTrue($upgrader->upgrade_practicalabment($practicalabment->practicalabment->id, $log));
        $record = $DB->get_record('practicalab', array('course'=>$this->course->id));

        $cm = get_coursemodule_from_instance('practicalab', $record->id);
        $context = context_module::instance($cm->id);

        $practicalab = new practicalab($context, $cm, $this->course);

        $plugin = $practicalab->get_submission_plugin_by_type('texto');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $practicalab->get_submission_plugin_by_type('comments');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $practicalab->get_submission_plugin_by_type('file');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $practicalab->get_feedback_plugin_by_type('comments');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $practicalab->get_feedback_plugin_by_type('file');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $practicalab->get_feedback_plugin_by_type('offline');
        $this->assertEmpty($plugin->is_enabled());

        course_delete_module($cm->id);
    }

    public function test_upgrade_texto_practicalabment() {
        global $DB;

        $this->setUser($this->editingteachers[0]);
        $generator = $this->getDataGenerator()->get_plugin_generator('mod_practicalabment');
        $params = array('course'=>$this->course->id,
                        'practicalabmenttype'=>'online');
        $record = $generator->create_instance($params);

        $practicalabment = new practicalabment_base($record->cmid);

        $this->setAdminUser();
        $log = '';
        $upgrader = new practicalab_upgrade_manager();

        $this->assertTrue($upgrader->upgrade_practicalabment($practicalabment->practicalabment->id, $log));
        $record = $DB->get_record('practicalab', array('course'=>$this->course->id));

        $cm = get_coursemodule_from_instance('practicalab', $record->id);
        $context = context_module::instance($cm->id);

        $practicalab = new practicalab($context, $cm, $this->course);

        $plugin = $practicalab->get_submission_plugin_by_type('texto');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $practicalab->get_submission_plugin_by_type('comments');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $practicalab->get_submission_plugin_by_type('file');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $practicalab->get_feedback_plugin_by_type('comments');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $practicalab->get_feedback_plugin_by_type('file');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $practicalab->get_feedback_plugin_by_type('offline');
        $this->assertEmpty($plugin->is_enabled());

        course_delete_module($cm->id);
    }

    public function test_upgrade_offline_practicalabment() {
        global $DB;

        $this->setUser($this->editingteachers[0]);
        $generator = $this->getDataGenerator()->get_plugin_generator('mod_practicalabment');
        $params = array('course'=>$this->course->id,
                        'practicalabmenttype'=>'offline');
        $record = $generator->create_instance($params);

        $practicalabment = new practicalabment_base($record->cmid);

        $this->setAdminUser();
        $log = '';
        $upgrader = new practicalab_upgrade_manager();

        $this->assertTrue($upgrader->upgrade_practicalabment($practicalabment->practicalabment->id, $log));
        $record = $DB->get_record('practicalab', array('course'=>$this->course->id));

        $cm = get_coursemodule_from_instance('practicalab', $record->id);
        $context = context_module::instance($cm->id);

        $practicalab = new practicalab($context, $cm, $this->course);

        $plugin = $practicalab->get_submission_plugin_by_type('texto');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $practicalab->get_submission_plugin_by_type('comments');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $practicalab->get_submission_plugin_by_type('file');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $practicalab->get_feedback_plugin_by_type('comments');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $practicalab->get_feedback_plugin_by_type('file');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $practicalab->get_feedback_plugin_by_type('offline');
        $this->assertEmpty($plugin->is_enabled());

        course_delete_module($cm->id);
    }
}
