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
 * This file contains the functions for practicalab_plugin abstract class
 *
 *
 * @package   mod_practicalab
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Abstract class for practicalab_plugin (submission/feedback).
 *
 * @package   mod_practicalab
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class practicalab_plugin {

    /** @var practicalab $practicalabment the practicalabment record that contains the global
     *              settings for this practicalab instance
     */
    protected $practicalabment;
    /** @var string $type practicalabment plugin type */
    private $type = '';
    /** @var string $error error message */
    private $error = '';


    /**
     * Constructor for the abstract plugin type class
     *
     * @param practicalab $practicalabment
     * @param string $type
     */
    public final function __construct(practicalab $practicalabment, $type) {
        $this->practicalabment = $practicalabment;
        $this->type = $type;
    }

    /**
     * Is this the first plugin in the list?
     *
     * @return bool
     */
    public final function is_first() {
        $order = get_config($this->get_subtype() . '_' . $this->get_type(), 'sortorder');

        if ($order == 0) {
            return true;
        }
        return false;
    }

    /**
     * Is this the last plugin in the list?
     *
     * @return bool
     */
    public final function is_last() {
        $lastindex = count(get_plugin_list($this->get_subtype()))-1;
        $currentindex = get_config($this->get_subtype() . '_' . $this->get_type(), 'sortorder');
        if ($lastindex == $currentindex) {
            return true;
        }

        return false;
    }

    /**
     * This function should be overridden to provide an array of elements that can be added to a moodle
     * form for display in the settings page for the practicalabment.
     * @param MoodleQuickForm $mform The form to add the elements to
     * @return $array
     */
    public function get_settings(MoodleQuickForm $mform) {
        return;
    }

    /**
     * Allows the plugin to update the defaultvalues passed in to
     * the settings form (needed to set up draft areas for editor
     * and filemanager elements)
     * @param array $defaultvalues
     */
    public function data_preprocessing(&$defaultvalues) {
        return;
    }

    /**
     * The practicalabment subtype is responsible for saving it's own settings as the database table for the
     * standard type cannot be modified.
     *
     * @param stdClass $formdata - the data submitted from the form
     * @return bool - on error the subtype should call set_error and return false.
     */
    public function save_settings(stdClass $formdata) {
        return true;
    }

    /**
     * Save the error message from the last error
     *
     * @param string $msg - the error description
     */
    protected final function set_error($msg) {
        $this->error = $msg;
    }

    /**
     * What was the last error?
     *
     * @return string
     */
    public final function get_error() {
        return $this->error;
    }

    /**
     * Should return the name of this plugin type.
     *
     * @return string - the name
     */
    public abstract function get_name();

    /**
     * Should return the subtype of this plugin.
     *
     * @return string - either 'practicalabsubmission' or 'feedback'
     */
    public abstract function get_subtype();

    /**
     * Should return the type of this plugin.
     *
     * @return string - the type
     */
    public final function get_type() {
        return $this->type;
    }

    /**
     * Get the installed version of this plugin
     *
     * @return string
     */
    public final function get_version() {
        $version = get_config($this->get_subtype() . '_' . $this->get_type(), 'version');
        if ($version) {
            return $version;
        } else {
            return '';
        }
    }

    /**
     * Get the required moodle version for this plugin
     *
     * @return string
     */
    public final function get_requires() {
        $requires = get_config($this->get_subtype() . '_' . $this->get_type(), 'requires');
        if ($requires) {
            return $requires;
        } else {
            return '';
        }
    }

    /**
     * Save any custom data for this form submission
     *
     * @param stdClass $submissionorgrade - practicalab_submission or practicalab_grade.
     *              For submission plugins this is the submission data,
     *              for feedback plugins it is the grade data
     * @param stdClass $data - the data submitted from the form
     * @return bool - on error the subtype should call set_error and return false.
     */
    public function save(stdClass $submissionorgrade, stdClass $data) {
        return true;
    }

    /**
     * Set this plugin to enabled
     *
     * @return bool
     */
    public final function enable() {
        return $this->set_config('enabled', 1);
    }

    /**
     * Set this plugin to disabled
     *
     * @return bool
     */
    public final function disable() {
        return $this->set_config('enabled', 0);
    }

    /**
     * Allows hiding this plugin from the submission/feedback screen if it is not enabled.
     *
     * @return bool - if false - this plugin will not accept submissions / feedback
     */
    public function is_enabled() {
        return $this->get_config('enabled');
    }


    /**
     * Get any additional fields for the submission/grading form for this practicalabment.
     *
     * @param mixed $submissionorgrade submission|grade - For submission plugins this is the submission data,
     *                                                    for feedback plugins it is the grade data
     * @param MoodleQuickForm $mform - This is the form
     * @param stdClass $data - This is the form data that can be modified for example by a filemanager element
     * @param int $userid - This is the userid for the current submission.
     *                      This is passed separately as there may not yet be a submission or grade.
     * @return boolean - true if we added anything to the form
     */
    public function get_form_elements_for_user($submissionorgrade, MoodleQuickForm $mform, stdClass $data, $userid) {
        return $this->get_form_elements($submissionorgrade, $mform, $data);
    }

    /**
     * Get any additional fields for the submission/grading form for this practicalabment.
     * This function is retained for backwards compatibility - new plugins should override {@link get_form_elements_for_user()}.
     *
     * @param mixed $submissionorgrade submission|grade - For submission plugins this is the submission data,
     *                                                    for feedback plugins it is the grade data
     * @param MoodleQuickForm $mform - This is the form
     * @param stdClass $data - This is the form data that can be modified for example by a filemanager element
     * @return boolean - true if we added anything to the form
     */
    public function get_form_elements($submissionorgrade, MoodleQuickForm $mform, stdClass $data) {
        return false;
    }

    /**
     * Should not output anything - return the result as a string so it can be consumed by webservices.
     *
     * @param stdClass $submissionorgrade practicalab_submission or practicalab_grade
     *                 For submission plugins this is the submission data,
     *                 for feedback plugins it is the grade data
     * @return string - return a string representation of the submission in full
     */
    public function view(stdClass $submissionorgrade) {
        return '';
    }

    /**
     * Get the numerical sort order for this plugin
     *
     * @return int
     */
    public final function get_sort_order() {
        $order = get_config($this->get_subtype() . '_' . $this->get_type(), 'sortorder');
        return $order?$order:0;
    }

    /**
     * Is this plugin enaled?
     *
     * @return bool
     */
    public final function is_visible() {
        $disabled = get_config($this->get_subtype() . '_' . $this->get_type(), 'disabled');
        return !$disabled;
    }


    /**
     * Has this plugin got a custom settings.php file?
     *
     * @return bool
     */
    public final function has_admin_settings() {
        global $CFG;

        $pluginroot = $CFG->dirroot . '/mod/practicalab/' . substr($this->get_subtype(), strlen('practicalab')) . '/' . $this->get_type();
        $settingsfile = $pluginroot . '/settings.php';
        return file_exists($settingsfile);
    }

    /**
     * Set a configuration value for this plugin
     *
     * @param string $name The config key
     * @param string $value The config value
     * @return bool
     */
    public final function set_config($name, $value) {
        global $DB;

        $dbparams = array('practicalabment'=>$this->practicalabment->get_instance()->id,
                          'subtype'=>$this->get_subtype(),
                          'plugin'=>$this->get_type(),
                          'name'=>$name);
        $current = $DB->get_record('practicalab_plugin_config', $dbparams, '*', IGNORE_MISSING);

        if ($current) {
            $current->value = $value;
            return $DB->update_record('practicalab_plugin_config', $current);
        } else {
            $setting = new stdClass();
            $setting->practicalabment = $this->practicalabment->get_instance()->id;
            $setting->subtype = $this->get_subtype();
            $setting->plugin = $this->get_type();
            $setting->name = $name;
            $setting->value = $value;

            return $DB->insert_record('practicalab_plugin_config', $setting) > 0;
        }
    }

    /**
     * Get a configuration value for this plugin
     *
     * @param mixed $setting The config key (string) or null
     * @return mixed string | false
     */
    public final function get_config($setting = null) {
        global $DB;

        if ($setting) {
            if (!$this->practicalabment->has_instance()) {
                return false;
            }
            $practicalabment = $this->practicalabment->get_instance();
            if ($practicalabment) {
                $dbparams = array('practicalabment'=>$practicalabment->id,
                                  'subtype'=>$this->get_subtype(),
                                  'plugin'=>$this->get_type(),
                                  'name'=>$setting);
                $result = $DB->get_record('practicalab_plugin_config', $dbparams, '*', IGNORE_MISSING);
                if ($result) {
                    return $result->value;
                }
            }
            return false;
        }
        $dbparams = array('practicalabment'=>$this->practicalabment->get_instance()->id,
                          'subtype'=>$this->get_subtype(),
                           'plugin'=>$this->get_type());
        $results = $DB->get_records('practicalab_plugin_config', $dbparams);

        $config = new stdClass();
        if (is_array($results)) {
            foreach ($results as $setting) {
                $name = $setting->name;
                $config->$name = $setting->value;
            }
        }
        return $config;
    }

    /**
     * Should not output anything - return the result as a string so it can be consumed by webservices.
     *
     * @param stdClass $submissionorgrade practicalab_submission or practicalab_grade
     *                 For submission plugins this is the submission data, for feedback plugins it is the grade data
     * @param bool $showviewlink Modifed to return whether or not to show a link to the full submission/feedback
     * @return string - return a string representation of the submission in full
     */
    public function view_summary(stdClass $submissionorgrade, & $showviewlink) {
        return '';
    }

    /**
     * Given a field name and value should update the text for this field in the plugins submission or grade
     *
     * @param string $name Name of the field.
     * @param string $value Updated text
     * @param int $submissionorgradeid The id of the submission or grade
     * @return bool - true if the value was updated
     */
    public function set_editor_text($name, $value, $submissionorgradeid) {
        return false;
    }

    /**
     * Given a field name and value should update the format for this field in the plugins submission or grade
     *
     * @param string $name Name of the field.
     * @param int $format Updated format.
     * @param int $submissionorgradeid The id of the submission or grade.
     * @return bool - true if the value was updated
     */
    public function set_editor_format($name, $format, $submissionorgradeid) {
        return false;
    }

    /**
     * Return a list of the fields that can be exported or imported via text.
     *
     * @return array - The list of field names (strings) and descriptions. ($name => $description)
     */
    public function get_editor_fields() {
        return array();
    }

    /**
     * Given a field name, should return the text of an editor field that is part of
     * this plugin. This is used when exporting to portfolio.
     *
     * @param string $name Name of the field.
     * @param int $submissionorgradeid The id of the submission or grade
     * @return string - The text for the editor field
     */
    public function get_editor_text($name, $submissionorgradeid) {
        return '';
    }

    /**
     * Produce a list of files suitable for export that represent this feedback or submission
     *
     * @param stdClass $submissionorgrade practicalab_submission or practicalab_grade
     *                 For submission plugins this is the submission data, for feedback plugins it is the grade data
     * @param stdClass $user The user record for the current submission.
     *                         Needed for url rewriting if this is a group submission.
     * @return array - return an array of files indexed by filename
     */
    public function get_files(stdClass $submissionorgrade, stdClass $user) {
        return array();
    }

    /**
     * Given a field name, should return the format of an editor field that is part of
     * this plugin. This is used when exporting to portfolio.
     *
     * @param string $name Name of the field.
     * @param int $submissionid The id of the submission
     * @return int - The format for the editor field
     */
    public function get_editor_format($name, $submissionid) {
        return 0;
    }

    /**
     * Return true if this plugin can upgrade an old Moodle 2.2 practicalabment of this type
     * and version.
     *
     * @param string $type The old practicalabment subtype
     * @param int $version The old practicalabment version
     * @return bool True if upgrade is possible
     */
    public function can_upgrade($type, $version) {
        return false;
    }

    /**
     * Upgrade the settings from the old practicalabment to the new one
     *
     * @param context $oldcontext The context for the old practicalabment module
     * @param stdClass $oldpracticalabment The data record for the old practicalabment
     * @param string $log Record upgrade messages in the log
     * @return bool true or false - false will trigger a rollback
     */
    public function upgrade_settings(context $oldcontext, stdClass $oldpracticalabment, & $log) {
        $params = array('type'=>$this->type, 'subtype'=>$this->get_subtype());
        $log .= ' ' . get_string('upgradenotimplemented', 'mod_practicalab', $params);
        return false;
    }

    /**
     * Upgrade the submission from the old practicalabment to the new one
     *
     * @param context $oldcontext The data record for the old context
     * @param stdClass $oldpracticalabment The data record for the old practicalabment
     * @param stdClass $oldsubmissionorgrade The data record for the old submission
     * @param stdClass $submissionorgrade practicalab_submission or practicalab_grade The new submission or grade
     * @param string $log Record upgrade messages in the log
     * @return boolean true or false - false will trigger a rollback
     */
    public function upgrade(context $oldcontext,
                            stdClass $oldpracticalabment,
                            stdClass $oldsubmissionorgrade,
                            stdClass $submissionorgrade,
                            & $log) {
        $params = array('type'=>$this->type, 'subtype'=>$this->get_subtype());
        $log = $log . ' ' . get_string('upgradenotimplemented', 'mod_practicalab', $params);
        return false;
    }

    /**
     * Formatting for log info
     *
     * @param stdClass $submissionorgrade practicalab_submission or practicalab_grade The new submission or grade
     * @return string
     */
    public function format_for_log(stdClass $submissionorgrade) {
        // Format the info for each submission plugin add_to_log.
        return '';
    }

    /**
     * The practicalabment has been deleted - remove the plugin specific data
     *
     * @return bool
     */
    public function delete_instance() {
        return true;
    }

    /**
     * Run cron for this plugin
     */
    public static function cron() {
    }

    /**
     * Is this practicalabment plugin empty? (ie no submission or feedback)
     * @param stdClass $submissionorgrade practicalab_submission or practicalab_grade
     * @return bool
     */
    public function is_empty(stdClass $submissionorgrade) {
        return true;
    }

    /**
     * Get file areas returns a list of areas this plugin stores files
     * @return array - An array of fileareas (keys) and descriptions (values)
     */
    public function get_file_areas() {
        return array();
    }


    /**
     * Default implementation of file_get_info for plugins.
     * This is used by the filebrowser to browse a plugins file areas.
     *
     * This implementation should work for most plugins but can be overridden if required.
     * @param file_browser $browser
     * @param string $filearea
     * @param int $itemid
     * @param string $filepath
     * @param string $filename
     * @return file_info_stored
     */
    public function get_file_info($browser, $filearea, $itemid, $filepath, $filename) {
        global $CFG, $DB, $USER;
        $urlbase = $CFG->wwwroot.'/pluginfile.php';

        // Permission check on the itemid.

        if ($this->get_subtype() == 'practicalabsubmission') {
            if ($itemid) {
                $record = $DB->get_record('practicalab_submission', array('id'=>$itemid), 'userid', IGNORE_MISSING);
                if (!$record) {
                    return null;
                }
                if (!$this->practicalabment->can_view_submission($record->userid)) {
                    return null;
                }
            }
        } else {
            // Not supported for feedback plugins.
            return null;
        }

        $fs = get_file_storage();
        $filepath = is_null($filepath) ? '/' : $filepath;
        $filename = is_null($filename) ? '.' : $filename;
        if (!($storedfile = $fs->get_file($this->practicalabment->get_context()->id,
                                          $this->get_subtype() . '_' . $this->get_type(),
                                          $filearea,
                                          $itemid,
                                          $filepath,
                                          $filename))) {
            return null;
        }
        return new file_info_stored($browser,
                                    $this->practicalabment->get_context(),
                                    $storedfile,
                                    $urlbase,
                                    $filearea,
                                    $itemid,
                                    true,
                                    true,
                                    false);
    }

    /**
     * This allows a plugin to render a page in the context of the practicalabment
     *
     * If the plugin creates a link to the practicalabment view.php page with
     * The following required parameters:
     *      id=coursemoduleid
     *      plugin=type
     *      pluginsubtype=practicalabfeedback|practicalabsubmission
     *      pluginaction=customaction
     *
     * Then this function will be called to display the page with the pluginaction passed as action
     * @param string $action The plugin specified action
     * @return string
     */
    public function view_page($action) {
        return '';
    }

    /**
     * If this plugin should not include a column in the grading table or a row on the summary page
     * then return false
     *
     * @return bool
     */
    public function has_user_summary() {
        return true;
    }


}
