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
 * This file contains the upgrade code to upgrade from mod_practicalabment to mod_practicalab
 *
 * @package   mod_practicalab
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/mod/practicalab/locallib.php');
require_once($CFG->libdir.'/accesslib.php');
require_once($CFG->dirroot.'/course/lib.php');

/*
 * The maximum amount of time to spend upgrading a single practicalabment.
 * This is intentionally generous (5 mins) as the effect of a timeout
 * for a legitimate upgrade would be quite harsh (roll back code will not run)
 */
define('PRACTICALAB_MAX_UPGRADE_TIME_SECS', 300);

/**
 * Class to manage upgrades from mod_practicalabment to mod_practicalab
 *
 * @package   mod_practicalab
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class practicalab_upgrade_manager {

    /**
     * This function converts all of the base settings for an instance of
     * the old practicalabment to the new format. Then it calls each of the plugins
     * to see if they can help upgrade this practicalabment.
     * @param int $oldpracticalabmentid (don't rely on the old practicalabment type even being installed)
     * @param string $log This string gets appended to during the conversion process
     * @return bool true or false
     */
    public function upgrade_practicalabment($oldpracticalabmentid, & $log) {
        global $DB, $CFG, $USER;
        // Steps to upgrade an practicalabment.

        // Is the user the admin? admin check goes here.
        if (!is_siteadmin($USER->id)) {
              return false;
        }

        @set_time_limit(PRACTICALAB_MAX_UPGRADE_TIME_SECS);

        // Get the module details.
        $oldmodule = $DB->get_record('modules', array('name'=>'practicalabment'), '*', MUST_EXIST);
        $params = array('module'=>$oldmodule->id, 'instance'=>$oldpracticalabmentid);
        $oldcoursemodule = $DB->get_record('course_modules',
                                           $params,
                                           '*',
                                           MUST_EXIST);
        $oldcontext = context_module::instance($oldcoursemodule->id);

        // First insert an practicalab instance to get the id.
        $oldpracticalabment = $DB->get_record('practicalabment', array('id'=>$oldpracticalabmentid), '*', MUST_EXIST);

        $oldversion = get_config('practicalabment_' . $oldpracticalabment->practicalabmenttype, 'version');

        $data = new stdClass();
        $data->course = $oldpracticalabment->course;
        $data->name = $oldpracticalabment->name;
        $data->intro = $oldpracticalabment->intro;
        $data->introformat = $oldpracticalabment->introformat;
        $data->alwaysshowdescription = 1;
        $data->sendnotifications = $oldpracticalabment->emailteachers;
        $data->sendlatenotifications = $oldpracticalabment->emailteachers;
        $data->duedate = $oldpracticalabment->timedue;
        $data->allowsubmissionsfromdate = $oldpracticalabment->timeavailable;
        $data->grade = $oldpracticalabment->grade;
        $data->submissiondrafts = $oldpracticalabment->resubmit;
        $data->requiresubmissionstatement = 0;
        $data->cutoffdate = 0;
        // New way to specify no late submissions.
        if ($oldpracticalabment->preventlate) {
            $data->cutoffdate = $data->duedate;
        }
        $data->teamsubmission = 0;
        $data->requireallteammemberssubmit = 0;
        $data->teamsubmissiongroupingid = 0;
        $data->blindmarking = 0;
        $data->attemptreopenmethod = 'none';
        $data->maxattempts = PRACTICALAB_UNLIMITED_ATTEMPTS;

        $newpracticalabment = new practicalab(null, null, null);

        if (!$newpracticalabment->add_instance($data, false)) {
            $log = get_string('couldnotcreatenewpracticalabmentinstance', 'mod_practicalab');
            return false;
        }

        // Now create a new coursemodule from the old one.
        $practicalab = $DB->get_record('modules', array('name'=>'practicalab'), '*', MUST_EXIST);
        $newcoursemodule = $this->duplicate_course_module($oldcoursemodule,
                                                          $practicalab->id,
                                                          $newpracticalabment->get_instance()->id);
        if (!$newcoursemodule) {
            $log = get_string('couldnotcreatenewcoursemodule', 'mod_practicalab');
            return false;
        }

        // Convert the base database tables (practicalabment, submission, grade).

        // These are used to store information in case a rollback is required.
        $gradingarea = null;
        $gradingdefinitions = null;
        $gradeidmap = array();
        $completiondone = false;
        $gradesdone = false;

        // From this point we want to rollback on failure.
        $rollback = false;
        try {
            $newpracticalabment->set_context(context_module::instance($newcoursemodule->id));

            // The course module has now been created - time to update the core tables.

            // Copy intro files.
            $newpracticalabment->copy_area_files_for_upgrade($oldcontext->id, 'mod_practicalabment', 'intro', 0,
                                            $newpracticalabment->get_context()->id, 'mod_practicalab', 'intro', 0);

            // Get the plugins to do their bit.
            foreach ($newpracticalabment->get_submission_plugins() as $plugin) {
                if ($plugin->can_upgrade($oldpracticalabment->practicalabmenttype, $oldversion)) {
                    $plugin->enable();
                    if (!$plugin->upgrade_settings($oldcontext, $oldpracticalabment, $log)) {
                        $rollback = true;
                    }
                } else {
                    $plugin->disable();
                }
            }
            foreach ($newpracticalabment->get_feedback_plugins() as $plugin) {
                if ($plugin->can_upgrade($oldpracticalabment->practicalabmenttype, $oldversion)) {
                    $plugin->enable();
                    if (!$plugin->upgrade_settings($oldcontext, $oldpracticalabment, $log)) {
                        $rollback = true;
                    }
                } else {
                    $plugin->disable();
                }
            }

            // See if there is advanced grading upgrades required.
            $gradingarea = $DB->get_record('grading_areas',
                                           array('contextid'=>$oldcontext->id, 'areaname'=>'submission'),
                                           '*',
                                           IGNORE_MISSING);
            if ($gradingarea) {
                $params = array('id'=>$gradingarea->id,
                                'contextid'=>$newpracticalabment->get_context()->id,
                                'component'=>'mod_practicalab',
                                'areaname'=>'submissions');
                $DB->update_record('grading_areas', $params);
                $gradingdefinitions = $DB->get_records('grading_definitions',
                                                       array('areaid'=>$gradingarea->id));
            }

            // Upgrade availability data.
            $DB->set_field('course_modules_avail_fields',
                           'coursemoduleid',
                           $newcoursemodule->id,
                           array('coursemoduleid'=>$oldcoursemodule->id));
            $DB->set_field('course_modules_availability',
                           'coursemoduleid',
                           $newcoursemodule->id,
                           array('coursemoduleid'=>$oldcoursemodule->id));
            $DB->set_field('course_modules_availability',
                           'sourcecmid',
                           $newcoursemodule->id,
                           array('sourcecmid'=>$oldcoursemodule->id));
            $DB->set_field('course_sections_availability',
                           'sourcecmid',
                           $newcoursemodule->id,
                           array('sourcecmid'=>$oldcoursemodule->id));

            // Upgrade completion data.
            $DB->set_field('course_modules_completion',
                           'coursemoduleid',
                           $newcoursemodule->id,
                           array('coursemoduleid'=>$oldcoursemodule->id));
            $allcriteria = $DB->get_records('course_completion_criteria',
                                            array('moduleinstance'=>$oldcoursemodule->id));
            foreach ($allcriteria as $criteria) {
                $criteria->module = 'practicalab';
                $criteria->moduleinstance = $newcoursemodule->id;
                $DB->update_record('course_completion_criteria', $criteria);
            }
            $completiondone = true;

            // Migrate log entries so we don't lose them.
            $logparams = array('cmid' => $oldcoursemodule->id, 'course' => $oldcoursemodule->course);
            $DB->set_field('log', 'module', 'practicalab', $logparams);
            $DB->set_field('log', 'cmid', $newcoursemodule->id, $logparams);

            // Copy all the submission data (and get plugins to do their bit).
            $oldsubmissions = $DB->get_records('practicalabment_submissions',
                                               array('practicalabment'=>$oldpracticalabmentid));

            foreach ($oldsubmissions as $oldsubmission) {
                $submission = new stdClass();
                $submission->practicalabment = $newpracticalabment->get_instance()->id;
                $submission->userid = $oldsubmission->userid;
                $submission->timecreated = $oldsubmission->timecreated;
                $submission->timemodified = $oldsubmission->timemodified;
                $submission->status = PRACTICALAB_SUBMISSION_STATUS_SUBMITTED;
                $submission->id = $DB->insert_record('practicalab_submission', $submission);
                if (!$submission->id) {
                    $log .= get_string('couldnotinsertsubmission', 'mod_practicalab', $submission->userid);
                    $rollback = true;
                }
                foreach ($newpracticalabment->get_submission_plugins() as $plugin) {
                    if ($plugin->can_upgrade($oldpracticalabment->practicalabmenttype, $oldversion)) {
                        if (!$plugin->upgrade($oldcontext,
                                              $oldpracticalabment,
                                              $oldsubmission,
                                              $submission,
                                              $log)) {
                            $rollback = true;
                        }
                    }
                }
                if ($oldsubmission->timemarked) {
                    // Submission has been graded - create a grade record.
                    $grade = new stdClass();
                    $grade->practicalabment = $newpracticalabment->get_instance()->id;
                    $grade->userid = $oldsubmission->userid;
                    $grade->grader = $oldsubmission->teacher;
                    $grade->timemodified = $oldsubmission->timemarked;
                    $grade->timecreated = $oldsubmission->timecreated;
                    $grade->grade = $oldsubmission->grade;
                    if ($oldsubmission->mailed) {
                        // The mailed flag goes in the flags table.
                        $flags = new stdClass();
                        $flags->userid = $oldsubmission->userid;
                        $flags->practicalabment = $newpracticalabment->get_instance()->id;
                        $flags->mailed = 1;
                        $DB->insert_record('practicalab_user_flags', $flags);
                    }
                    $grade->id = $DB->insert_record('practicalab_grades', $grade);
                    if (!$grade->id) {
                        $log .= get_string('couldnotinsertgrade', 'mod_practicalab', $grade->userid);
                        $rollback = true;
                    }

                    // Copy any grading instances.
                    if ($gradingarea) {

                        $gradeidmap[$grade->id] = $oldsubmission->id;

                        foreach ($gradingdefinitions as $definition) {
                            $params = array('definitionid'=>$definition->id,
                                            'itemid'=>$oldsubmission->id);
                            $DB->set_field('grading_instances', 'itemid', $grade->id, $params);
                        }

                    }
                    foreach ($newpracticalabment->get_feedback_plugins() as $plugin) {
                        if ($plugin->can_upgrade($oldpracticalabment->practicalabmenttype, $oldversion)) {
                            if (!$plugin->upgrade($oldcontext,
                                                  $oldpracticalabment,
                                                  $oldsubmission,
                                                  $grade,
                                                  $log)) {
                                $rollback = true;
                            }
                        }
                    }
                }
            }

            $newpracticalabment->update_calendar($newcoursemodule->id);

            // Reassociate grade_items from the old practicalabment instance to the new practicalab instance.
            // This includes outcome linked grade_items.
            $params = array('practicalab', $newpracticalabment->get_instance()->id, 'practicalabment', $oldpracticalabment->id);
            $sql = 'UPDATE {grade_items} SET itemmodule = ?, iteminstance = ? WHERE itemmodule = ? AND iteminstance = ?';
            $DB->execute($sql, $params);

            $gradesdone = true;

        } catch (Exception $exception) {
            $rollback = true;
            $log .= get_string('conversionexception', 'mod_practicalab', $exception->getMessage());
        }

        if ($rollback) {
            // Roll back the grades changes.
            if ($gradesdone) {
                // Reassociate grade_items from the new practicalab instance to the old practicalabment instance.
                $params = array('practicalabment', $oldpracticalabment->id, 'practicalab', $newpracticalabment->get_instance()->id);
                $sql = 'UPDATE {grade_items} SET itemmodule = ?, iteminstance = ? WHERE itemmodule = ? AND iteminstance = ?';
                $DB->execute($sql, $params);
            }
            // Roll back the completion changes.
            if ($completiondone) {
                $DB->set_field('course_modules_completion',
                               'coursemoduleid',
                               $oldcoursemodule->id,
                               array('coursemoduleid'=>$newcoursemodule->id));

                $allcriteria = $DB->get_records('course_completion_criteria',
                                                array('moduleinstance'=>$newcoursemodule->id));
                foreach ($allcriteria as $criteria) {
                    $criteria->module = 'practicalabment';
                    $criteria->moduleinstance = $oldcoursemodule->id;
                    $DB->update_record('course_completion_criteria', $criteria);
                }
            }
            // Roll back the log changes.
            $logparams = array('cmid' => $newcoursemodule->id, 'course' => $newcoursemodule->course);
            $DB->set_field('log', 'module', 'practicalabment', $logparams);
            $DB->set_field('log', 'cmid', $oldcoursemodule->id, $logparams);
            // Roll back the advanced grading update.
            if ($gradingarea) {
                foreach ($gradeidmap as $newgradeid => $oldsubmissionid) {
                    foreach ($gradingdefinitions as $definition) {
                        $DB->set_field('grading_instances',
                                       'itemid',
                                       $oldsubmissionid,
                                       array('definitionid'=>$definition->id, 'itemid'=>$newgradeid));
                    }
                }
                $params = array('id'=>$gradingarea->id,
                                'contextid'=>$oldcontext->id,
                                'component'=>'mod_practicalabment',
                                'areaname'=>'submission');
                $DB->update_record('grading_areas', $params);
            }
            $newpracticalabment->delete_instance();

            return false;
        }
        // Delete the old practicalabment (use object delete).
        $cm = get_coursemodule_from_id('', $oldcoursemodule->id, $oldcoursemodule->course);
        if ($cm) {
            course_delete_module($cm->id);
        }
        rebuild_course_cache($oldcoursemodule->course);
        return true;
    }


    /**
     * Create a duplicate course module record so we can create the upgraded
     * practicalab module alongside the old practicalabment module.
     *
     * @param stdClass $cm The old course module record
     * @param int $moduleid The id of the new practicalab module
     * @param int $newinstanceid The id of the new instance of the practicalab module
     * @return mixed stdClass|bool The new course module record or FALSE
     */
    private function duplicate_course_module(stdClass $cm, $moduleid, $newinstanceid) {
        global $DB, $CFG;

        $newcm = new stdClass();
        $newcm->course           = $cm->course;
        $newcm->module           = $moduleid;
        $newcm->instance         = $newinstanceid;
        $newcm->visible          = $cm->visible;
        $newcm->section          = $cm->section;
        $newcm->score            = $cm->score;
        $newcm->indent           = $cm->indent;
        $newcm->groupmode        = $cm->groupmode;
        $newcm->groupingid       = $cm->groupingid;
        $newcm->groupmembersonly = $cm->groupmembersonly;
        $newcm->completion                = $cm->completion;
        $newcm->completiongradeitemnumber = $cm->completiongradeitemnumber;
        $newcm->completionview            = $cm->completionview;
        $newcm->completionexpected        = $cm->completionexpected;
        if (!empty($CFG->enableavailability)) {
            $newcm->availablefrom             = $cm->availablefrom;
            $newcm->availableuntil            = $cm->availableuntil;
            $newcm->showavailability          = $cm->showavailability;
        }
        $newcm->showdescription = $cm->showdescription;

        $newcmid = add_course_module($newcm);
        $newcm = get_coursemodule_from_id('', $newcmid, $cm->course);
        if (!$newcm) {
            return false;
        }
        $section = $DB->get_record("course_sections", array("id"=>$newcm->section));
        if (!$section) {
            return false;
        }

        $newcm->section = course_add_cm_to_section($newcm->course, $newcm->id, $section->section, $cm->id);

        // Make sure visibility is set correctly (in particular in calendar).
        // Note: Allow them to set it even without moodle/course:activityvisibility.
        set_coursemodule_visible($newcm->id, $newcm->visible);

        return $newcm;
    }
}
