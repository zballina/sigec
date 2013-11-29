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
 * This file contains the definition for the library class for online comment submission plugin
 *
 * @package sesiontareasubmission_comments
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

 defined('MOODLE_INTERNAL') || die();

 require_once($CFG->dirroot . '/comment/lib.php');
 require_once($CFG->dirroot . '/mod/sesiontarea/submissionplugin.php');

/**
 * Library class for comment submission plugin extending submission plugin base class
 *
 * @package sesiontareasubmission_comments
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class sesiontarea_submission_comments extends sesiontarea_submission_plugin {

    /**
     * Get the name of the online comment submission plugin
     * @return string
     */
    public function get_name() {
        return get_string('pluginname', 'sesiontareasubmission_comments');
    }

    /**
     * Display AJAX based comment in the submission status table
     *
     * @param stdClass $submission
     * @param bool $showviewlink - If the comments are long this is
     *                             set to true so they can be shown in a separate page
     * @return string
     */
    public function view_summary(stdClass $submission, & $showviewlink) {

        // Never show a link to view full submission.
        $showviewlink = false;
        // Need to used this init() otherwise it does not have the javascript includes.
        comment::init();

        $options = new stdClass();
        $options->area    = 'submission_comments';
        $options->course    = $this->sesiontareament->get_course();
        $options->context = $this->sesiontareament->get_context();
        $options->itemid  = $submission->id;
        $options->component = 'sesiontareasubmission_comments';
        $options->showcount = true;
        $options->displaycancel = true;

        $comment = new comment($options);
        $comment->set_view_permission(true);

        $o = $this->sesiontareament->get_renderer()->container($comment->output(true), 'commentscontainer');
        return $o;
    }

    /**
     * Always return true because the submission comments are not part of the submission form.
     *
     * @param stdClass $submission
     * @return bool
     */
    public function is_empty(stdClass $submission) {
        return true;
    }

    /**
     * Return true if this plugin can upgrade an old Moodle 2.2 sesiontareament of this type
     * and version.
     *
     * @param string $type old sesiontareament subtype
     * @param int $version old sesiontareament version
     * @return bool True if upgrade is possible
     */
    public function can_upgrade($type, $version) {

        if ($type == 'upload' && $version >= 2011112900) {
            return true;
        }
        return false;
    }


    /**
     * Upgrade the settings from the old sesiontareament to the new plugin based one
     *
     * @param context $oldcontext - the context for the old sesiontareament
     * @param stdClass $oldsesiontareament - the data for the old sesiontareament
     * @param string $log - can be appended to by the upgrade
     * @return bool was it a success? (false will trigger a rollback)
     */
    public function upgrade_settings(context $oldcontext, stdClass $oldsesiontareament, & $log) {
        if ($oldsesiontareament->sesiontareamenttype == 'upload') {
            // Disable if allow notes was not enabled.
            if (!$oldsesiontareament->var2) {
                $this->disable();
            }
        }
        return true;
    }

    /**
     * Upgrade the submission from the old sesiontareament to the new one
     *
     * @param context $oldcontext The context for the old sesiontareament
     * @param stdClass $oldsesiontareament The data record for the old sesiontareament
     * @param stdClass $oldsubmission The data record for the old submission
     * @param stdClass $submission The new submission record
     * @param string $log Record upgrade messages in the log
     * @return bool true or false - false will trigger a rollback
     */
    public function upgrade(context $oldcontext,
                            stdClass $oldsesiontareament,
                            stdClass $oldsubmission,
                            stdClass $submission,
                            & $log) {

        if ($oldsubmission->data1 != '') {

            // Need to used this init() otherwise it does not have the javascript includes.
            comment::init();

            $options = new stdClass();
            $options->area = 'submission_comments_upgrade';
            $options->course = $this->sesiontareament->get_course();
            $options->context = $this->sesiontareament->get_context();
            $options->itemid = $submission->id;
            $options->component = 'sesiontareasubmission_comments';
            $options->showcount = true;
            $options->displaycancel = true;

            $comment = new comment($options);
            $comment->add($oldsubmission->data1);
            $comment->set_view_permission(true);

            return $comment->output(true);
        }

        return true;
    }

    /**
     * The submission comments plugin has no submission component so should not be counted
     * when determining whether to show the edit submission link.
     * @return boolean
     */
    public function allow_submissions() {
        return false;
    }
}
