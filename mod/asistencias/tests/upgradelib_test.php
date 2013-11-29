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
 * Unit tests for (some of) mod/asistencias/upgradelib.php.
 *
 * @package    mod_asistencias
 * @category   phpunit
 * @copyright  1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/mod/asistencias/locallib.php');
require_once($CFG->dirroot . '/mod/asistencias/upgradelib.php');
require_once($CFG->dirroot . '/mod/asistenciasment/lib.php');
require_once($CFG->dirroot . '/mod/asistencias/tests/base_test.php');

/**
 * Unit tests for (some of) mod/asistencias/upgradelib.php.
 *
 * @copyright  1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mod_asistencias_upgradelib_testcase extends mod_asistencias_base_testcase {

    protected function tearDown() {
        // Reset the timeouts.
        set_time_limit(0);
    }

    public function test_upgrade_upload_asistenciasment() {
        global $DB;

        $this->setUser($this->editingteachers[0]);
        $generator = $this->getDataGenerator()->get_plugin_generator('mod_asistenciasment');
        $params = array('course'=>$this->course->id,
                        'asistenciasmenttype'=>'upload');
        $record = $generator->create_instance($params);

        $asistenciasment = new asistenciasment_base($record->cmid);

        $this->setAdminUser();
        $log = '';
        $upgrader = new asistencias_upgrade_manager();

        $this->assertTrue($upgrader->upgrade_asistenciasment($asistenciasment->asistenciasment->id, $log));
        $record = $DB->get_record('asistencias', array('course'=>$this->course->id));

        $cm = get_coursemodule_from_instance('asistencias', $record->id);
        $context = context_module::instance($cm->id);

        $asistencias = new asistencias($context, $cm, $this->course);

        $plugin = $asistencias->get_submission_plugin_by_type('onlinetext');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $asistencias->get_submission_plugin_by_type('comments');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $asistencias->get_submission_plugin_by_type('file');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $asistencias->get_feedback_plugin_by_type('comments');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $asistencias->get_feedback_plugin_by_type('file');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $asistencias->get_feedback_plugin_by_type('offline');
        $this->assertEmpty($plugin->is_enabled());

        course_delete_module($cm->id);
    }

    public function test_upgrade_uploadsingle_asistenciasment() {
        global $DB;

        $this->setUser($this->editingteachers[0]);
        $generator = $this->getDataGenerator()->get_plugin_generator('mod_asistenciasment');
        $params = array('course'=>$this->course->id,
                        'asistenciasmenttype'=>'uploadsingle');
        $record = $generator->create_instance($params);

        $asistenciasment = new asistenciasment_base($record->cmid);

        $this->setAdminUser();
        $log = '';
        $upgrader = new asistencias_upgrade_manager();

        $this->assertTrue($upgrader->upgrade_asistenciasment($asistenciasment->asistenciasment->id, $log));
        $record = $DB->get_record('asistencias', array('course'=>$this->course->id));

        $cm = get_coursemodule_from_instance('asistencias', $record->id);
        $context = context_module::instance($cm->id);

        $asistencias = new asistencias($context, $cm, $this->course);

        $plugin = $asistencias->get_submission_plugin_by_type('onlinetext');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $asistencias->get_submission_plugin_by_type('comments');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $asistencias->get_submission_plugin_by_type('file');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $asistencias->get_feedback_plugin_by_type('comments');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $asistencias->get_feedback_plugin_by_type('file');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $asistencias->get_feedback_plugin_by_type('offline');
        $this->assertEmpty($plugin->is_enabled());

        course_delete_module($cm->id);
    }

    public function test_upgrade_onlinetext_asistenciasment() {
        global $DB;

        $this->setUser($this->editingteachers[0]);
        $generator = $this->getDataGenerator()->get_plugin_generator('mod_asistenciasment');
        $params = array('course'=>$this->course->id,
                        'asistenciasmenttype'=>'online');
        $record = $generator->create_instance($params);

        $asistenciasment = new asistenciasment_base($record->cmid);

        $this->setAdminUser();
        $log = '';
        $upgrader = new asistencias_upgrade_manager();

        $this->assertTrue($upgrader->upgrade_asistenciasment($asistenciasment->asistenciasment->id, $log));
        $record = $DB->get_record('asistencias', array('course'=>$this->course->id));

        $cm = get_coursemodule_from_instance('asistencias', $record->id);
        $context = context_module::instance($cm->id);

        $asistencias = new asistencias($context, $cm, $this->course);

        $plugin = $asistencias->get_submission_plugin_by_type('onlinetext');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $asistencias->get_submission_plugin_by_type('comments');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $asistencias->get_submission_plugin_by_type('file');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $asistencias->get_feedback_plugin_by_type('comments');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $asistencias->get_feedback_plugin_by_type('file');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $asistencias->get_feedback_plugin_by_type('offline');
        $this->assertEmpty($plugin->is_enabled());

        course_delete_module($cm->id);
    }

    public function test_upgrade_offline_asistenciasment() {
        global $DB;

        $this->setUser($this->editingteachers[0]);
        $generator = $this->getDataGenerator()->get_plugin_generator('mod_asistenciasment');
        $params = array('course'=>$this->course->id,
                        'asistenciasmenttype'=>'offline');
        $record = $generator->create_instance($params);

        $asistenciasment = new asistenciasment_base($record->cmid);

        $this->setAdminUser();
        $log = '';
        $upgrader = new asistencias_upgrade_manager();

        $this->assertTrue($upgrader->upgrade_asistenciasment($asistenciasment->asistenciasment->id, $log));
        $record = $DB->get_record('asistencias', array('course'=>$this->course->id));

        $cm = get_coursemodule_from_instance('asistencias', $record->id);
        $context = context_module::instance($cm->id);

        $asistencias = new asistencias($context, $cm, $this->course);

        $plugin = $asistencias->get_submission_plugin_by_type('onlinetext');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $asistencias->get_submission_plugin_by_type('comments');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $asistencias->get_submission_plugin_by_type('file');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $asistencias->get_feedback_plugin_by_type('comments');
        $this->assertNotEmpty($plugin->is_enabled());
        $plugin = $asistencias->get_feedback_plugin_by_type('file');
        $this->assertEmpty($plugin->is_enabled());
        $plugin = $asistencias->get_feedback_plugin_by_type('offline');
        $this->assertEmpty($plugin->is_enabled());

        course_delete_module($cm->id);
    }
}
