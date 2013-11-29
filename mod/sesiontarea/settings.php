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
 * @package   mod_sesiontarea
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

require_once($CFG->dirroot . '/mod/sesiontarea/adminlib.php');

$ADMIN->add('modules', new admin_category('sesiontareamentplugins',
                new lang_string('sesiontareamentplugins', 'sesiontarea'), $module->is_enabled() === false));
$ADMIN->add('sesiontareamentplugins', new admin_category('sesiontareasubmissionplugins',
                new lang_string('submissionplugins', 'sesiontarea'), $module->is_enabled() === false));
$ADMIN->add('sesiontareasubmissionplugins', new sesiontarea_admin_page_manage_sesiontarea_plugins('sesiontareasubmission'));
$ADMIN->add('sesiontareamentplugins', new admin_category('sesiontareafeedbackplugins',
                new lang_string('feedbackplugins', 'sesiontarea'), $module->is_enabled() === false));
$ADMIN->add('sesiontareafeedbackplugins', new sesiontarea_admin_page_manage_sesiontarea_plugins('sesiontareafeedback'));


sesiontarea_plugin_manager::add_admin_sesiontarea_plugin_settings('sesiontareasubmission', $ADMIN, $settings, $module);
sesiontarea_plugin_manager::add_admin_sesiontarea_plugin_settings('sesiontareafeedback', $ADMIN, $settings, $module);

if ($ADMIN->fulltree) {
    $menu = array();
    foreach (get_plugin_list('sesiontareafeedback') as $type => $notused) {
        $visible = !get_config('sesiontareafeedback_' . $type, 'disabled');
        if ($visible) {
            $menu['sesiontareafeedback_' . $type] = new lang_string('pluginname', 'sesiontareafeedback_' . $type);
        }
    }

    // The default here is feedback_comments (if it exists).
    $name = new lang_string('feedbackplugin', 'mod_sesiontarea');
    $description = new lang_string('feedbackpluginforgradebook', 'mod_sesiontarea');
    $settings->add(new admin_setting_configselect('sesiontarea/feedback_plugin_for_gradebook',
                                                  $name,
                                                  $description,
                                                  'sesiontareafeedback_comments',
                                                  $menu));

    $name = new lang_string('showrecentsubmissions', 'mod_sesiontarea');
    $description = new lang_string('configshowrecentsubmissions', 'mod_sesiontarea');
    $settings->add(new admin_setting_configcheckbox('sesiontarea/showrecentsubmissions',
                                                    $name,
                                                    $description,
                                                    0));

    $name = new lang_string('sendsubmissionreceipts', 'mod_sesiontarea');
    $description = new lang_string('sendsubmissionreceipts_help', 'mod_sesiontarea');
    $settings->add(new admin_setting_configcheckbox('sesiontarea/submissionreceipts',
                                                    $name,
                                                    $description,
                                                    1));

    $name = new lang_string('submissionstatement', 'mod_sesiontarea');
    $description = new lang_string('submissionstatement_help', 'mod_sesiontarea');
    $default = get_string('submissionstatementdefault', 'mod_sesiontarea');
    $settings->add(new admin_setting_configtextarea('sesiontarea/submissionstatement',
                                                    $name,
                                                    $description,
                                                    $default));

    $name = new lang_string('requiresubmissionstatement', 'mod_sesiontarea');
    $description = new lang_string('requiresubmissionstatement_help', 'mod_sesiontarea');
    $settings->add(new admin_setting_configcheckbox('sesiontarea/requiresubmissionstatement',
                                                    $name,
                                                    $description,
                                                    0));

}
