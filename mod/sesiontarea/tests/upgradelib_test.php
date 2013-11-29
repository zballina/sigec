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
 * Unit tests for (some of) mod/sesiontarea/upgradelib.php.
 *
 * @package    mod_sesiontarea
 * @category   phpunit
 * @copyright  1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/mod/sesiontarea/locallib.php');
require_once($CFG->dirroot . '/mod/sesiontarea/upgradelib.php');
require_once($CFG->dirroot . '/mod/sesiontareament/lib.php');
require_once($CFG->dirroot . '/mod/sesiontarea/tests/base_test.php');

/**
 * Unit tests for (some of) mod/sesiontarea/upgradelib.php.
 *
 * @copyright  1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mod_sesiontarea_upgradelib_testcase extends mod_sesiontarea_base_testcase {

    protected function tearDown() {
        // Reset the timeouts.
        set_time_limit(0);
    }

    public function test_upgrade_upload_sesiontareament() {
        global $DB;

        $this->setUser($this->editingteachers[0]);
        $generator = $this->getDataGenerator()->get_plugin_generator('mod_sesiontareament');
        $params = array('course'=>$this->course->id,
                        'sesiontareamenttype'=>'upload');
        $record = $generator->create_instance($params);

        $sesiontareament = new sesiontareament_base($record->cmid);

        $this->setAdminUser();
        $log = '';
        $upgrader = new sesiontarea_upgrade_manager();

        $this->assertTrue($upgrader->upgrade_sesiontareament($sesiontareament->sesiontareament->id, $log));
        $record = $DB->get_record('sesiontarea', array('course'=>$this->course->id));

        $cm = get_coursemodule_from_instance('sesiontarea', $record->id);
        $context = context_module::instance($cm->id);

        $sesiontarea = new sesiontarea($context, $cm, $this->course);

        $plugin = $sesiontarea->get_submission_plugin_by_type('onlinetext');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $sesiontarea->get_submission_plugin_by_type('comments');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $sesiontarea->get_submission_plugin_by_type('file');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $sesiontarea->get_feedback_plugin_by_type('comments');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $sesiontarea->get_feedback_plugin_by_type('file');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $sesiontarea->get_feedback_plugin_by_type('offline');
        $this->assertEmpty($plugin->is_enabled());

        course_delete_module($cm->id);
    }

    public function test_upgrade_uploadsingle_sesiontareament() {
        global $DB;

        $this->setUser($this->editingteachers[0]);
        $generator = $this->getDataGenerator()->get_plugin_generator('mod_sesiontareament');
        $params = array('course'=>$this->course->id,
                        'sesiontareamenttype'=>'uploadsingle');
        $record = $generator->create_instance($params);

        $sesiontareament = new sesiontareament_base($record->cmid);

        $this->setAdminUser();
        $log = '';
        $upgrader = new sesiontarea_upgrade_manager();

        $this->assertTrue($upgrader->upgrade_sesiontareament($sesiontareament->sesiontareament->id, $log));
        $record = $DB->get_record('sesiontarea', array('course'=>$this->course->id));

        $cm = get_coursemodule_from_instance('sesiontarea', $record->id);
        $context = context_module::instance($cm->id);

        $sesiontarea = new sesiontarea($context, $cm, $this->course);

        $plugin = $sesiontarea->get_submission_plugin_by_type('onlinetext');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $sesiontarea->get_submission_plugin_by_type('comments');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $sesiontarea->get_submission_plugin_by_type('file');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $sesiontarea->get_feedback_plugin_by_type('comments');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $sesiontarea->get_feedback_plugin_by_type('file');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $sesiontarea->get_feedback_plugin_by_type('offline');
        $this->assertEmpty($plugin->is_enabled());

        course_delete_module($cm->id);
    }

    public function test_upgrade_onlinetext_sesiontareament() {
        global $DB;

        $this->setUser($this->editingteachers[0]);
        $generator = $this->getDataGenerator()->get_plugin_generator('mod_sesiontareament');
        $params = array('course'=>$this->course->id,
                        'sesiontareamenttype'=>'online');
        $record = $generator->create_instance($params);

        $sesiontareament = new sesiontareament_base($record->cmid);

        $this->setAdminUser();
        $log = '';
        $upgrader = new sesiontarea_upgrade_manager();

        $this->assertTrue($upgrader->upgrade_sesiontareament($sesiontareament->sesiontareament->id, $log));
        $record = $DB->get_record('sesiontarea', array('course'=>$this->course->id));

        $cm = get_coursemodule_from_instance('sesiontarea', $record->id);
        $context = context_module::instance($cm->id);

        $sesiontarea = new sesiontarea($context, $cm, $this->course);

        $plugin = $sesiontarea->get_submission_plugin_by_type('onlinetext');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $sesiontarea->get_submission_plugin_by_type('comments');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $sesiontarea->get_submission_plugin_by_type('file');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $sesiontarea->get_feedback_plugin_by_type('comments');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $sesiontarea->get_feedback_plugin_by_type('file');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $sesiontarea->get_feedback_plugin_by_type('offline');
        $this->assertEmpty($plugin->is_enabled());

        course_delete_module($cm->id);
    }

    public function test_upgrade_offline_sesiontareament() {
        global $DB;

        $this->setUser($this->editingteachers[0]);
        $generator = $this->getDataGenerator()->get_plugin_generator('mod_sesiontareament');
        $params = array('course'=>$this->course->id,
                        'sesiontareamenttype'=>'offline');
        $record = $generator->create_instance($params);

        $sesiontareament = new sesiontareament_base($record->cmid);

        $this->setAdminUser();
        $log = '';
        $upgrader = new sesiontarea_upgrade_manager();

        $this->assertTrue($upgrader->upgrade_sesiontareament($sesiontareament->sesiontareament->id, $log));
        $record = $DB->get_record('sesiontarea', array('course'=>$this->course->id));

        $cm = get_coursemodule_from_instance('sesiontarea', $record->id);
        $context = context_module::instance($cm->id);

        $sesiontarea = new sesiontarea($context, $cm, $this->course);

        $plugin = $sesiontarea->get_submission_plugin_by_type('onlinetext');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $sesiontarea->get_submission_plugin_by_type('comments');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $sesiontarea->get_submission_plugin_by_type('file');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $sesiontarea->get_feedback_plugin_by_type('comments');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $sesiontarea->get_feedback_plugin_by_type('file');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $sesiontarea->get_feedback_plugin_by_type('offline');
        $this->assertEmpty($plugin->is_enabled());

        course_delete_module($cm->id);
    }
}
