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
 * This file adds the settings pages to the navigation menu
 *
 * @package   mod_practicalab
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

require_once($CFG->dirroot . '/mod/practicalab/adminlib.php');

$ADMIN->add('modules', new admin_category('practicalabmentplugins',
                new lang_string('practicalabmentplugins', 'practicalab'), $module->is_enabled() === false));
$ADMIN->add('practicalabmentplugins', new admin_category('practicalabsubmissionplugins',
                new lang_string('submissionplugins', 'practicalab'), $module->is_enabled() === false));
$ADMIN->add('practicalabsubmissionplugins', new practicalab_admin_page_manage_practicalab_plugins('practicalabsubmission'));
$ADMIN->add('practicalabmentplugins', new admin_category('practicalabfeedbackplugins',
                new lang_string('feedbackplugins', 'practicalab'), $module->is_enabled() === false));
$ADMIN->add('practicalabfeedbackplugins', new practicalab_admin_page_manage_practicalab_plugins('practicalabfeedback'));


practicalab_plugin_manager::add_admin_practicalab_plugin_settings('practicalabsubmission', $ADMIN, $settings, $module);
practicalab_plugin_manager::add_admin_practicalab_plugin_settings('practicalabfeedback', $ADMIN, $settings, $module);

if ($ADMIN->fulltree) {
    $menu = array();
    foreach (get_plugin_list('practicalabfeedback') as $type => $notused) {
        $visible = !get_config('practicalabfeedback_' . $type, 'disabled');
        if ($visible) {
            $menu['practicalabfeedback_' . $type] = new lang_string('pluginname', 'practicalabfeedback_' . $type);
        }
    }

    // The default here is feedback_comments (if it exists).
    $name = new lang_string('feedbackplugin', 'mod_practicalab');
    $description = new lang_string('feedbackpluginforgradebook', 'mod_practicalab');
    $settings->add(new admin_setting_configselect('practicalab/feedback_plugin_for_gradebook',
                                                  $name,
                                                  $description,
                                                  'practicalabfeedback_comments',
                                                  $menu));

    $name = new lang_string('showrecentsubmissions', 'mod_practicalab');
    $description = new lang_string('configshowrecentsubmissions', 'mod_practicalab');
    $settings->add(new admin_setting_configcheckbox('practicalab/showrecentsubmissions',
                                                    $name,
                                                    $description,
                                                    0));

    $name = new lang_string('sendsubmissionreceipts', 'mod_practicalab');
    $description = new lang_string('sendsubmissionreceipts_help', 'mod_practicalab');
    $settings->add(new admin_setting_configcheckbox('practicalab/submissionreceipts',
                                                    $name,
                                                    $description,
                                                    1));

    $name = new lang_string('submissionstatement', 'mod_practicalab');
    $description = new lang_string('submissionstatement_help', 'mod_practicalab');
    $default = get_string('submissionstatementdefault', 'mod_practicalab');
    $settings->add(new admin_setting_configtextarea('practicalab/submissionstatement',
                                                    $name,
                                                    $description,
                                                    $default));

    $name = new lang_string('requiresubmissionstatement', 'mod_practicalab');
    $description = new lang_string('requiresubmissionstatement_help', 'mod_practicalab');
    $settings->add(new admin_setting_configcheckbox('practicalab/requiresubmissionstatement',
                                                    $name,
                                                    $description,
                                                    0));

}
