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
 * External sesiontarea API
 *
 * @package    mod_sesiontarea
 * @since      Moodle 2.4
 * @copyright  2012 Paul Charsley
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

require_once("$CFG->libdir/externallib.php");

/**
 * Assign functions
 */
class mod_sesiontarea_external extends external_api {

    /**
     * Describes the parameters for get_grades
     * @return external_external_function_parameters
     * @since  Moodle 2.4
     */
    public static function get_grades_parameters() {
        return new external_function_parameters(
            array(
                'sesiontareamentids' => new external_multiple_structure(
                    new external_value(PARAM_INT, 'sesiontareament id'),
                    '1 or more sesiontareament ids',
                    VALUE_REQUIRED),
                'since' => new external_value(PARAM_INT,
                          'timestamp, only return records where timemodified >= since',
                          VALUE_DEFAULT, 0)
            )
        );
    }

    /**
     * Returns grade information from sesiontarea_grades for the requested sesiontareament ids
     * @param array of ints $sesiontareamentids
     * @param int $since only return records with timemodified >= since
     * @return array of grade records for each requested sesiontareament
     * @since  Moodle 2.4
     */
    public static function get_grades($sesiontareamentids, $since = 0) {
        global $DB;
        $params = self::validate_parameters(self::get_grades_parameters(),
                        array('sesiontareamentids' => $sesiontareamentids,
                              'since' => $since));

        $sesiontareaments = array();
        $warnings = array();
        $requestedsesiontareamentids = $params['sesiontareamentids'];

        // Check the user is allowed to get the grades for the sesiontareaments requested.
        $placeholders = array();
        list($sqlsesiontareamentids, $placeholders) = $DB->get_in_or_equal($requestedsesiontareamentids, SQL_PARAMS_NAMED);
        $sql = "SELECT cm.id, cm.instance FROM {course_modules} cm JOIN {modules} md ON md.id = cm.module ".
               "WHERE md.name = :modname AND cm.instance ".$sqlsesiontareamentids;
        $placeholders['modname'] = 'sesiontarea';
        $cms = $DB->get_records_sql($sql, $placeholders);
        foreach ($cms as $cm) {
            try {
                $context = context_module::instance($cm->id);
                self::validate_context($context);
                require_capability('mod/sesiontarea:grade', $context);
            } catch (Exception $e) {
                $requestedsesiontareamentids = array_diff($requestedsesiontareamentids, array($cm->instance));
                $warning = array();
                $warning['item'] = 'sesiontareament';
                $warning['itemid'] = $cm->instance;
                $warning['warningcode'] = '1';
                $warning['message'] = 'No access rights in module context';
                $warnings[] = $warning;
            }
        }

        // Create the query and populate an array of grade records from the recordset results.
        if (count ($requestedsesiontareamentids) > 0) {
            $placeholders = array();
            list($inorequalsql, $placeholders) = $DB->get_in_or_equal($requestedsesiontareamentids, SQL_PARAMS_NAMED);
            list($inorequalsql2, $placeholders2) = $DB->get_in_or_equal($requestedsesiontareamentids, SQL_PARAMS_NAMED);

            $grademaxattempt = 'SELECT mxg.userid, MAX(mxg.attemptnumber) AS maxattempt
                                FROM {sesiontarea_grades} mxg
                                WHERE mxg.sesiontareament ' . $inorequalsql2 . ' GROUP BY mxg.userid';

            $sql = "SELECT ag.id,ag.sesiontareament,ag.userid,ag.timecreated,ag.timemodified,".
                   "ag.grader,ag.grade ".
                   "FROM {sesiontarea_grades} ag ".
                   "JOIN ( " . $grademaxattempt . " ) gmx ON ag.userid = gmx.userid".
                   " WHERE ag.sesiontareament ".$inorequalsql.
                   " AND ag.timemodified  >= :since".
                   " AND ag.attemptnumber = gmx.maxattempt" .
                   " ORDER BY ag.sesiontareament, ag.id";
            $placeholders['since'] = $params['since'];
            // Combine the parameters.
            $placeholders += $placeholders2;
            $rs = $DB->get_recordset_sql($sql, $placeholders);
            $currentsesiontareamentid = null;
            $sesiontareament = null;
            foreach ($rs as $rd) {
                $grade = array();
                $grade['id'] = $rd->id;
                $grade['userid'] = $rd->userid;
                $grade['timecreated'] = $rd->timecreated;
                $grade['timemodified'] = $rd->timemodified;
                $grade['grader'] = $rd->grader;
                $grade['grade'] = (string)$rd->grade;

                if (is_null($currentsesiontareamentid) || ($rd->sesiontareament != $currentsesiontareamentid )) {
                    if (!is_null($sesiontareament)) {
                        $sesiontareaments[] = $sesiontareament;
                    }
                    $sesiontareament = array();
                    $sesiontareament['sesiontareamentid'] = $rd->sesiontareament;
                    $sesiontareament['grades'] = array();
                    $requestedsesiontareamentids = array_diff($requestedsesiontareamentids, array($rd->sesiontareament));
                }
                $sesiontareament['grades'][] = $grade;

                $currentsesiontareamentid = $rd->sesiontareament;
            }
            if (!is_null($sesiontareament)) {
                $sesiontareaments[] = $sesiontareament;
            }
            $rs->close();
        }
        foreach ($requestedsesiontareamentids as $sesiontareamentid) {
            $warning = array();
            $warning['item'] = 'sesiontareament';
            $warning['itemid'] = $sesiontareamentid;
            $warning['warningcode'] = '3';
            $warning['message'] = 'No grades found';
            $warnings[] = $warning;
        }

        $result = array();
        $result['sesiontareaments'] = $sesiontareaments;
        $result['warnings'] = $warnings;
        return $result;
    }

    /**
     * Creates an sesiontarea_grades external_single_structure
     * @return external_single_structure
     * @since  Moodle 2.4
     */
    private static function sesiontarea_grades() {
        return new external_single_structure(
            array (
                'sesiontareamentid'    => new external_value(PARAM_INT, 'sesiontareament id'),
                'grades'   => new external_multiple_structure(new external_single_structure(
                        array(
                            'id'            => new external_value(PARAM_INT, 'grade id'),
                            'userid'        => new external_value(PARAM_INT, 'student id'),
                            'timecreated'   => new external_value(PARAM_INT, 'grade creation time'),
                            'timemodified'  => new external_value(PARAM_INT, 'grade last modified time'),
                            'grader'        => new external_value(PARAM_INT, 'grader'),
                            'grade'         => new external_value(PARAM_TEXT, 'grade')
                        )
                    )
                )
            )
        );
    }

    /**
     * Describes the get_grades return value
     * @return external_single_structure
     * @since  Moodle 2.4
     */
    public static function get_grades_returns() {
        return new external_single_structure(
            array(
                'sesiontareaments' => new external_multiple_structure(self::sesiontarea_grades(), 'list of sesiontareament grade information'),
                'warnings'      => new external_warnings('item is always \'sesiontareament\'',
                    'when errorcode is 3 then itemid is an sesiontareament id. When errorcode is 1, itemid is a course module id',
                    'errorcode can be 3 (no grades found) or 1 (no permission to get grades)')
            )
        );
    }

    /**
     * Returns description of method parameters
     *
     * @return external_function_parameters
     * @since  Moodle 2.4
     */
    public static function get_sesiontareaments_parameters() {
        return new external_function_parameters(
            array(
                'courseids' => new external_multiple_structure(
                    new external_value(PARAM_INT, 'course id'),
                    '0 or more course ids',
                    VALUE_DEFAULT, array()
                ),
                'capabilities'  => new external_multiple_structure(
                    new external_value(PARAM_CAPABILITY, 'capability'),
                    'list of capabilities used to filter courses',
                    VALUE_DEFAULT, array()
                )
            )
        );
    }

    /**
     * Returns an array of courses the user is enrolled in, and for each course all of the sesiontareaments that the user can
     * view within that course.
     *
     * @param array $courseids An optional array of course ids. If provided only sesiontareaments within the given course
     * will be returned. If the user is not enrolled in a given course a warning will be generated and returned.
     * @param array $capabilities An array of additional capability checks you wish to be made on the course context.
     * @return An array of courses and warnings.
     * @since  Moodle 2.4
     */
    public static function get_sesiontareaments($courseids = array(), $capabilities = array()) {
        global $USER, $DB;

        $params = self::validate_parameters(
            self::get_sesiontareaments_parameters(),
            array('courseids' => $courseids, 'capabilities' => $capabilities)
        );

        $warnings = array();
        $fields = 'sortorder,shortname,fullname,timemodified';
        $courses = enrol_get_users_courses($USER->id, true, $fields);
        // Used to test for ids that have been requested but can't be returned.
        if (count($params['courseids']) > 0) {
            foreach ($params['courseids'] as $courseid) {
                if (!in_array($courseid, array_keys($courses))) {
                    unset($courses[$courseid]);
                    $warnings[] = array(
                        'item' => 'course',
                        'itemid' => $courseid,
                        'warningcode' => '2',
                        'message' => 'User is not enrolled or does not have requested capability'
                    );
                }
            }
        }
        foreach ($courses as $id => $course) {
            if (count($params['courseids']) > 0 && !in_array($id, $params['courseids'])) {
                unset($courses[$id]);
            }
            $context = context_course::instance($id);
            try {
                self::validate_context($context);
            } catch (Exception $e) {
                unset($courses[$id]);
                $warnings[] = array(
                    'item' => 'course',
                    'itemid' => $id,
                    'warningcode' => '1',
                    'message' => 'No access rights in course context '.$e->getMessage().$e->getTraceAsString()
                );
                continue;
            }
            if (count($params['capabilities']) > 0 && !has_all_capabilities($params['capabilities'], $context)) {
                unset($courses[$id]);
            }
        }
        $extrafields='m.id as sesiontareamentid, m.course, m.nosubmissions, m.submissiondrafts, m.sendnotifications, '.
                     'm.sendlatenotifications, m.duedate, m.allowsubmissionsfromdate, m.grade, m.timemodified, '.
                     'm.completionsubmit, m.cutoffdate, m.teamsubmission, m.requireallteammemberssubmit, '.
                     'm.teamsubmissiongroupingid, m.blindmarking, m.revealidentities, m.requiresubmissionstatement';
        $coursearray = array();
        foreach ($courses as $id => $course) {
            $sesiontareamentarray = array();
            // Get a list of sesiontareaments for the course.
            if ($modules = get_coursemodules_in_course('sesiontarea', $courses[$id]->id, $extrafields)) {
                foreach ($modules as $module) {
                    $context = context_module::instance($module->id);
                    try {
                        self::validate_context($context);
                        require_capability('mod/sesiontarea:view', $context);
                    } catch (Exception $e) {
                        $warnings[] = array(
                            'item' => 'module',
                            'itemid' => $module->id,
                            'warningcode' => '1',
                            'message' => 'No access rights in module context'
                        );
                        continue;
                    }
                    $configrecords = $DB->get_recordset('sesiontarea_plugin_config', array('sesiontareament' => $module->sesiontareamentid));
                    $configarray = array();
                    foreach ($configrecords as $configrecord) {
                        $configarray[] = array(
                            'id' => $configrecord->id,
                            'sesiontareament' => $configrecord->sesiontareament,
                            'plugin' => $configrecord->plugin,
                            'subtype' => $configrecord->subtype,
                            'name' => $configrecord->name,
                            'value' => $configrecord->value
                        );
                    }
                    $configrecords->close();

                    $sesiontareamentarray[]= array(
                        'id' => $module->sesiontareamentid,
                        'cmid' => $module->id,
                        'course' => $module->course,
                        'name' => $module->name,
                        'nosubmissions' => $module->nosubmissions,
                        'submissiondrafts' => $module->submissiondrafts,
                        'sendnotifications' => $module->sendnotifications,
                        'sendlatenotifications' => $module->sendlatenotifications,
                        'duedate' => $module->duedate,
                        'allowsubmissionsfromdate' => $module->allowsubmissionsfromdate,
                        'grade' => $module->grade,
                        'timemodified' => $module->timemodified,
                        'completionsubmit' => $module->completionsubmit,
                        'cutoffdate' => $module->cutoffdate,
                        'teamsubmission' => $module->teamsubmission,
                        'requireallteammemberssubmit' => $module->requireallteammemberssubmit,
                        'teamsubmissiongroupingid' => $module->teamsubmissiongroupingid,
                        'blindmarking' => $module->blindmarking,
                        'revealidentities' => $module->revealidentities,
                        'requiresubmissionstatement' => $module->requiresubmissionstatement,
                        'configs' => $configarray
                    );
                }
            }
            $coursearray[]= array(
                'id' => $courses[$id]->id,
                'fullname' => $courses[$id]->fullname,
                'shortname' => $courses[$id]->shortname,
                'timemodified' => $courses[$id]->timemodified,
                'sesiontareaments' => $sesiontareamentarray
            );
        }

        $result = array(
            'courses' => $coursearray,
            'warnings' => $warnings
        );
        return $result;
    }

    /**
     * Creates an sesiontareament external_single_structure
     *
     * @return external_single_structure
     * @since Moodle 2.4
     */
    private static function get_sesiontareaments_sesiontareament_structure() {
        return new external_single_structure(
            array(
                'id' => new external_value(PARAM_INT, 'sesiontareament id'),
                'course' => new external_value(PARAM_INT, 'course id'),
                'name' => new external_value(PARAM_TEXT, 'sesiontareament name'),
                'nosubmissions' => new external_value(PARAM_INT, 'no submissions'),
                'submissiondrafts' => new external_value(PARAM_INT, 'submissions drafts'),
                'sendnotifications' => new external_value(PARAM_INT, 'send notifications'),
                'sendlatenotifications' => new external_value(PARAM_INT, 'send notifications'),
                'duedate' => new external_value(PARAM_INT, 'sesiontareament due date'),
                'allowsubmissionsfromdate' => new external_value(PARAM_INT, 'allow submissions from date'),
                'grade' => new external_value(PARAM_INT, 'grade type'),
                'timemodified' => new external_value(PARAM_INT, 'last time sesiontareament was modified'),
                'completionsubmit' => new external_value(PARAM_INT, 'if enabled, set activity as complete following submission'),
                'cutoffdate' => new external_value(PARAM_INT, 'date after which submission is not accepted without an extension'),
                'teamsubmission' => new external_value(PARAM_INT, 'if enabled, students submit as a team'),
                'requireallteammemberssubmit' => new external_value(PARAM_INT, 'if enabled, all team members must submit'),
                'teamsubmissiongroupingid' => new external_value(PARAM_INT, 'the grouping id for the team submission groups'),
                'blindmarking' => new external_value(PARAM_INT, 'if enabled, hide identities until reveal identities actioned'),
                'revealidentities' => new external_value(PARAM_INT, 'show identities for a blind marking sesiontareament'),
                'requiresubmissionstatement' => new external_value(PARAM_INT, 'student must accept submission statement'),
                'configs' => new external_multiple_structure(self::get_sesiontareaments_config_structure(), 'configuration settings')
            ), 'sesiontareament information object');
    }

    /**
     * Creates an sesiontarea_plugin_config external_single_structure
     *
     * @return external_single_structure
     * @since Moodle 2.4
     */
    private static function get_sesiontareaments_config_structure() {
        return new external_single_structure(
            array(
                'id' => new external_value(PARAM_INT, 'sesiontarea_plugin_config id'),
                'sesiontareament' => new external_value(PARAM_INT, 'sesiontareament id'),
                'plugin' => new external_value(PARAM_TEXT, 'plugin'),
                'subtype' => new external_value(PARAM_TEXT, 'subtype'),
                'name' => new external_value(PARAM_TEXT, 'name'),
                'value' => new external_value(PARAM_TEXT, 'value')
            ), 'sesiontareament configuration object'
        );
    }

    /**
     * Creates a course external_single_structure
     *
     * @return external_single_structure
     * @since Moodle 2.4
     */
    private static function get_sesiontareaments_course_structure() {
        return new external_single_structure(
            array(
                'id' => new external_value(PARAM_INT, 'course id'),
                'fullname' => new external_value(PARAM_TEXT, 'course full name'),
                'shortname' => new external_value(PARAM_TEXT, 'course short name'),
                'timemodified' => new external_value(PARAM_INT, 'last time modified'),
                'sesiontareaments' => new external_multiple_structure(self::get_sesiontareaments_sesiontareament_structure(), 'sesiontareament info')
              ), 'course information object'
        );
    }

    /**
     * Describes the return value for get_sesiontareaments
     *
     * @return external_single_structure
     * @since Moodle 2.4
     */
    public static function get_sesiontareaments_returns() {
        return new external_single_structure(
            array(
                'courses' => new external_multiple_structure(self::get_sesiontareaments_course_structure(), 'list of courses'),
                'warnings'  => new external_warnings('item can be \'course\' (errorcode 1 or 2) or \'module\' (errorcode 1)',
                    'When item is a course then itemid is a course id. When the item is a module then itemid is a module id',
                    'errorcode can be 1 (no access rights) or 2 (not enrolled or no permissions)')
            )
        );
    }

    /**
     * Describes the parameters for get_submissions
     *
     * @return external_external_function_parameters
     * @since Moodle 2.5
     */
    public static function get_submissions_parameters() {
        return new external_function_parameters(
            array(
                'sesiontareamentids' => new external_multiple_structure(
                    new external_value(PARAM_INT, 'sesiontareament id'),
                    '1 or more sesiontareament ids',
                    VALUE_REQUIRED),
                'status' => new external_value(PARAM_ALPHA, 'status', VALUE_DEFAULT, ''),
                'since' => new external_value(PARAM_INT, 'submitted since', VALUE_DEFAULT, 0),
                'before' => new external_value(PARAM_INT, 'submitted before', VALUE_DEFAULT, 0)
            )
        );
    }

    /**
     * Returns submissions for the requested sesiontareament ids
     *
     * @param array of ints $sesiontareamentids
     * @param string $status only return submissions with this status
     * @param int $since only return submissions with timemodified >= since
     * @param int $before only return submissions with timemodified <= before
     * @return array of submissions for each requested sesiontareament
     * @since Moodle 2.5
     */
    public static function get_submissions($sesiontareamentids, $status = '', $since = 0, $before = 0) {
        global $DB, $CFG;
        require_once("$CFG->dirroot/mod/sesiontarea/locallib.php");
        $params = self::validate_parameters(self::get_submissions_parameters(),
                        array('sesiontareamentids' => $sesiontareamentids,
                              'status' => $status,
                              'since' => $since,
                              'before' => $before));

        $warnings = array();
        $sesiontareaments = array();

        // Check the user is allowed to get the submissions for the sesiontareaments requested.
        $placeholders = array();
        list($inorequalsql, $placeholders) = $DB->get_in_or_equal($params['sesiontareamentids'], SQL_PARAMS_NAMED);
        $sql = "SELECT cm.id, cm.instance FROM {course_modules} cm JOIN {modules} md ON md.id = cm.module ".
               "WHERE md.name = :modname AND cm.instance ".$inorequalsql;
        $placeholders['modname'] = 'sesiontarea';
        $cms = $DB->get_records_sql($sql, $placeholders);
        $sesiontareas = array();
        foreach ($cms as $cm) {
            try {
                $context = context_module::instance($cm->id);
                self::validate_context($context);
                require_capability('mod/sesiontarea:grade', $context);
                $sesiontarea = new sesiontarea($context, null, null);
                $sesiontareas[] = $sesiontarea;
            } catch (Exception $e) {
                $warnings[] = array(
                    'item' => 'sesiontareament',
                    'itemid' => $cm->instance,
                    'warningcode' => '1',
                    'message' => 'No access rights in module context'
                );
            }
        }

        foreach ($sesiontareas as $sesiontarea) {
            $submissions = array();
            $submissionplugins = $sesiontarea->get_submission_plugins();
            $placeholders = array('sesiontareaid1' => $sesiontarea->get_instance()->id,
                                  'sesiontareaid2' => $sesiontarea->get_instance()->id);

            $submissionmaxattempt = 'SELECT mxs.userid, MAX(mxs.attemptnumber) AS maxattempt
                                     FROM {sesiontarea_submission} mxs
                                     WHERE mxs.sesiontareament = :sesiontareaid1 GROUP BY mxs.userid';

            $sql = "SELECT mas.id, mas.sesiontareament,mas.userid,".
                   "mas.timecreated,mas.timemodified,mas.status,mas.groupid ".
                   "FROM {sesiontarea_submission} mas ".
                   "JOIN ( " . $submissionmaxattempt . " ) smx ON mas.userid = smx.userid ".
                   "WHERE mas.sesiontareament = :sesiontareaid2 AND mas.attemptnumber = smx.maxattempt";

            if (!empty($params['status'])) {
                $placeholders['status'] = $params['status'];
                $sql = $sql." AND mas.status = :status";
            }
            if (!empty($params['before'])) {
                $placeholders['since'] = $params['since'];
                $placeholders['before'] = $params['before'];
                $sql = $sql." AND mas.timemodified BETWEEN :since AND :before";
            } else {
                $placeholders['since'] = $params['since'];
                $sql = $sql." AND mas.timemodified >= :since";
            }

            $submissionrecords = $DB->get_records_sql($sql, $placeholders);

            if (!empty($submissionrecords)) {
                $fs = get_file_storage();
                foreach ($submissionrecords as $submissionrecord) {
                    $submission = array(
                        'id' => $submissionrecord->id,
                        'userid' => $submissionrecord->userid,
                        'timecreated' => $submissionrecord->timecreated,
                        'timemodified' => $submissionrecord->timemodified,
                        'status' => $submissionrecord->status,
                        'groupid' => $submissionrecord->groupid
                    );
                    foreach ($submissionplugins as $submissionplugin) {
                        $plugin = array(
                            'name' => $submissionplugin->get_name(),
                            'type' => $submissionplugin->get_type()
                        );
                        // Subtype is 'sesiontareasubmission', type is currently 'file' or 'onlinetext'.
                        $component = $submissionplugin->get_subtype().'_'.$submissionplugin->get_type();

                        $fileareas = $submissionplugin->get_file_areas();
                        foreach ($fileareas as $filearea => $name) {
                            $fileareainfo = array('area' => $filearea);
                            $files = $fs->get_area_files(
                                $sesiontarea->get_context()->id,
                                $component,
                                $filearea,
                                $submissionrecord->id,
                                "timemodified",
                                false
                            );
                            foreach ($files as $file) {
                                $filepath = array('filepath' => $file->get_filepath().$file->get_filename());
                                $fileareainfo['files'][] = $filepath;
                            }
                            $plugin['fileareas'][] = $fileareainfo;
                        }

                        $editorfields = $submissionplugin->get_editor_fields();
                        foreach ($editorfields as $name => $description) {
                            $editorfieldinfo = array(
                                'name' => $name,
                                'description' => $description,
                                'text' => $submissionplugin->get_editor_text($name, $submissionrecord->id),
                                'format' => $submissionplugin->get_editor_format($name, $submissionrecord->id)
                            );
                            $plugin['editorfields'][] = $editorfieldinfo;
                        }

                        $submission['plugins'][] = $plugin;
                    }
                    $submissions[] = $submission;
                }
            } else {
                $warnings[] = array(
                    'item' => 'module',
                    'itemid' => $sesiontarea->get_instance()->id,
                    'warningcode' => '3',
                    'message' => 'No submissions found'
                );
            }

            $sesiontareaments[] = array(
                'sesiontareamentid' => $sesiontarea->get_instance()->id,
                'submissions' => $submissions
            );

        }

        $result = array(
            'sesiontareaments' => $sesiontareaments,
            'warnings' => $warnings
        );
        return $result;
    }

    /**
     * Creates an sesiontarea_submissions external_single_structure
     *
     * @return external_single_structure
     * @since Moodle 2.5
     */
    private static function get_submissions_structure() {
        return new external_single_structure(
            array (
                'sesiontareamentid' => new external_value(PARAM_INT, 'sesiontareament id'),
                'submissions' => new external_multiple_structure(
                    new external_single_structure(
                        array(
                            'id' => new external_value(PARAM_INT, 'submission id'),
                            'userid' => new external_value(PARAM_INT, 'student id'),
                            'timecreated' => new external_value(PARAM_INT, 'submission creation time'),
                            'timemodified' => new external_value(PARAM_INT, 'submission last modified time'),
                            'status' => new external_value(PARAM_TEXT, 'submission status'),
                            'groupid' => new external_value(PARAM_INT, 'group id'),
                            'plugins' => new external_multiple_structure(
                                new external_single_structure(
                                    array(
                                        'type' => new external_value(PARAM_TEXT, 'submission plugin type'),
                                        'name' => new external_value(PARAM_TEXT, 'submission plugin name'),
                                        'fileareas' => new external_multiple_structure(
                                            new external_single_structure(
                                                array (
                                                    'area' => new external_value (PARAM_TEXT, 'file area'),
                                                    'files' => new external_multiple_structure(
                                                        new external_single_structure(
                                                            array (
                                                                'filepath' => new external_value (PARAM_TEXT, 'file path')
                                                            )
                                                        ), 'files', VALUE_OPTIONAL
                                                    )
                                                )
                                            ), 'fileareas', VALUE_OPTIONAL
                                        ),
                                        'editorfields' => new external_multiple_structure(
                                            new external_single_structure(
                                                array(
                                                    'name' => new external_value(PARAM_TEXT, 'field name'),
                                                    'description' => new external_value(PARAM_TEXT, 'field description'),
                                                    'text' => new external_value (PARAM_RAW, 'field value'),
                                                    'format' => new external_format_value ('text')
                                                )
                                            )
                                            , 'editorfields', VALUE_OPTIONAL
                                        )
                                    )
                                )
                                , 'plugins', VALUE_OPTIONAL
                            )
                        )
                    )
                )
            )
        );
    }

    /**
     * Describes the get_submissions return value
     *
     * @return external_single_structure
     * @since Moodle 2.5
     */
    public static function get_submissions_returns() {
        return new external_single_structure(
            array(
                'sesiontareaments' => new external_multiple_structure(self::get_submissions_structure(), 'sesiontareament submissions'),
                'warnings' => new external_warnings()
            )
        );
    }
}
