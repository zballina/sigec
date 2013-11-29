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
 * External asistencias API
 *
 * @package    mod_asistencias
 * @since      Moodle 2.4
 * @copyright  2012 Paul Charsley
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

require_once("$CFG->libdir/externallib.php");

/**
 * Assign functions
 */
class mod_asistencias_external extends external_api {

    /**
     * Describes the parameters for get_grades
     * @return external_external_function_parameters
     * @since  Moodle 2.4
     */
    public static function get_grades_parameters() {
        return new external_function_parameters(
            array(
                'asistenciasmentids' => new external_multiple_structure(
                    new external_value(PARAM_INT, 'asistenciasment id'),
                    '1 or more asistenciasment ids',
                    VALUE_REQUIRED),
                'since' => new external_value(PARAM_INT,
                          'timestamp, only return records where timemodified >= since',
                          VALUE_DEFAULT, 0)
            )
        );
    }

    /**
     * Returns grade information from asistencias_grades for the requested asistenciasment ids
     * @param array of ints $asistenciasmentids
     * @param int $since only return records with timemodified >= since
     * @return array of grade records for each requested asistenciasment
     * @since  Moodle 2.4
     */
    public static function get_grades($asistenciasmentids, $since = 0) {
        global $DB;
        $params = self::validate_parameters(self::get_grades_parameters(),
                        array('asistenciasmentids' => $asistenciasmentids,
                              'since' => $since));

        $asistenciasments = array();
        $warnings = array();
        $requestedasistenciasmentids = $params['asistenciasmentids'];

        // Check the user is allowed to get the grades for the asistenciasments requested.
        $placeholders = array();
        list($sqlasistenciasmentids, $placeholders) = $DB->get_in_or_equal($requestedasistenciasmentids, SQL_PARAMS_NAMED);
        $sql = "SELECT cm.id, cm.instance FROM {course_modules} cm JOIN {modules} md ON md.id = cm.module ".
               "WHERE md.name = :modname AND cm.instance ".$sqlasistenciasmentids;
        $placeholders['modname'] = 'asistencias';
        $cms = $DB->get_records_sql($sql, $placeholders);
        foreach ($cms as $cm) {
            try {
                $context = context_module::instance($cm->id);
                self::validate_context($context);
                require_capability('mod/asistencias:grade', $context);
            } catch (Exception $e) {
                $requestedasistenciasmentids = array_diff($requestedasistenciasmentids, array($cm->instance));
                $warning = array();
                $warning['item'] = 'asistenciasment';
                $warning['itemid'] = $cm->instance;
                $warning['warningcode'] = '1';
                $warning['message'] = 'No access rights in module context';
                $warnings[] = $warning;
            }
        }

        // Create the query and populate an array of grade records from the recordset results.
        if (count ($requestedasistenciasmentids) > 0) {
            $placeholders = array();
            list($inorequalsql, $placeholders) = $DB->get_in_or_equal($requestedasistenciasmentids, SQL_PARAMS_NAMED);
            list($inorequalsql2, $placeholders2) = $DB->get_in_or_equal($requestedasistenciasmentids, SQL_PARAMS_NAMED);

            $grademaxattempt = 'SELECT mxg.userid, MAX(mxg.attemptnumber) AS maxattempt
                                FROM {asistencias_grades} mxg
                                WHERE mxg.asistenciasment ' . $inorequalsql2 . ' GROUP BY mxg.userid';

            $sql = "SELECT ag.id,ag.asistenciasment,ag.userid,ag.timecreated,ag.timemodified,".
                   "ag.grader,ag.grade ".
                   "FROM {asistencias_grades} ag ".
                   "JOIN ( " . $grademaxattempt . " ) gmx ON ag.userid = gmx.userid".
                   " WHERE ag.asistenciasment ".$inorequalsql.
                   " AND ag.timemodified  >= :since".
                   " AND ag.attemptnumber = gmx.maxattempt" .
                   " ORDER BY ag.asistenciasment, ag.id";
            $placeholders['since'] = $params['since'];
            // Combine the parameters.
            $placeholders += $placeholders2;
            $rs = $DB->get_recordset_sql($sql, $placeholders);
            $currentasistenciasmentid = null;
            $asistenciasment = null;
            foreach ($rs as $rd) {
                $grade = array();
                $grade['id'] = $rd->id;
                $grade['userid'] = $rd->userid;
                $grade['timecreated'] = $rd->timecreated;
                $grade['timemodified'] = $rd->timemodified;
                $grade['grader'] = $rd->grader;
                $grade['grade'] = (string)$rd->grade;

                if (is_null($currentasistenciasmentid) || ($rd->asistenciasment != $currentasistenciasmentid )) {
                    if (!is_null($asistenciasment)) {
                        $asistenciasments[] = $asistenciasment;
                    }
                    $asistenciasment = array();
                    $asistenciasment['asistenciasmentid'] = $rd->asistenciasment;
                    $asistenciasment['grades'] = array();
                    $requestedasistenciasmentids = array_diff($requestedasistenciasmentids, array($rd->asistenciasment));
                }
                $asistenciasment['grades'][] = $grade;

                $currentasistenciasmentid = $rd->asistenciasment;
            }
            if (!is_null($asistenciasment)) {
                $asistenciasments[] = $asistenciasment;
            }
            $rs->close();
        }
        foreach ($requestedasistenciasmentids as $asistenciasmentid) {
            $warning = array();
            $warning['item'] = 'asistenciasment';
            $warning['itemid'] = $asistenciasmentid;
            $warning['warningcode'] = '3';
            $warning['message'] = 'No grades found';
            $warnings[] = $warning;
        }

        $result = array();
        $result['asistenciasments'] = $asistenciasments;
        $result['warnings'] = $warnings;
        return $result;
    }

    /**
     * Creates an asistencias_grades external_single_structure
     * @return external_single_structure
     * @since  Moodle 2.4
     */
    private static function asistencias_grades() {
        return new external_single_structure(
            array (
                'asistenciasmentid'    => new external_value(PARAM_INT, 'asistenciasment id'),
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
                'asistenciasments' => new external_multiple_structure(self::asistencias_grades(), 'list of asistenciasment grade information'),
                'warnings'      => new external_warnings('item is always \'asistenciasment\'',
                    'when errorcode is 3 then itemid is an asistenciasment id. When errorcode is 1, itemid is a course module id',
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
    public static function get_asistenciasments_parameters() {
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
     * Returns an array of courses the user is enrolled in, and for each course all of the asistenciasments that the user can
     * view within that course.
     *
     * @param array $courseids An optional array of course ids. If provided only asistenciasments within the given course
     * will be returned. If the user is not enrolled in a given course a warning will be generated and returned.
     * @param array $capabilities An array of additional capability checks you wish to be made on the course context.
     * @return An array of courses and warnings.
     * @since  Moodle 2.4
     */
    public static function get_asistenciasments($courseids = array(), $capabilities = array()) {
        global $USER, $DB;

        $params = self::validate_parameters(
            self::get_asistenciasments_parameters(),
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
        $extrafields='m.id as asistenciasmentid, m.course, m.nosubmissions, m.submissiondrafts, m.sendnotifications, '.
                     'm.sendlatenotifications, m.duedate, m.allowsubmissionsfromdate, m.grade, m.timemodified, '.
                     'm.completionsubmit, m.cutoffdate, m.teamsubmission, m.requireallteammemberssubmit, '.
                     'm.teamsubmissiongroupingid, m.blindmarking, m.revealidentities, m.requiresubmissionstatement';
        $coursearray = array();
        foreach ($courses as $id => $course) {
            $asistenciasmentarray = array();
            // Get a list of asistenciasments for the course.
            if ($modules = get_coursemodules_in_course('asistencias', $courses[$id]->id, $extrafields)) {
                foreach ($modules as $module) {
                    $context = context_module::instance($module->id);
                    try {
                        self::validate_context($context);
                        require_capability('mod/asistencias:view', $context);
                    } catch (Exception $e) {
                        $warnings[] = array(
                            'item' => 'module',
                            'itemid' => $module->id,
                            'warningcode' => '1',
                            'message' => 'No access rights in module context'
                        );
                        continue;
                    }
                    $configrecords = $DB->get_recordset('asistencias_plugin_config', array('asistenciasment' => $module->asistenciasmentid));
                    $configarray = array();
                    foreach ($configrecords as $configrecord) {
                        $configarray[] = array(
                            'id' => $configrecord->id,
                            'asistenciasment' => $configrecord->asistenciasment,
                            'plugin' => $configrecord->plugin,
                            'subtype' => $configrecord->subtype,
                            'name' => $configrecord->name,
                            'value' => $configrecord->value
                        );
                    }
                    $configrecords->close();

                    $asistenciasmentarray[]= array(
                        'id' => $module->asistenciasmentid,
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
                'asistenciasments' => $asistenciasmentarray
            );
        }

        $result = array(
            'courses' => $coursearray,
            'warnings' => $warnings
        );
        return $result;
    }

    /**
     * Creates an asistenciasment external_single_structure
     *
     * @return external_single_structure
     * @since Moodle 2.4
     */
    private static function get_asistenciasments_asistenciasment_structure() {
        return new external_single_structure(
            array(
                'id' => new external_value(PARAM_INT, 'asistenciasment id'),
                'course' => new external_value(PARAM_INT, 'course id'),
                'name' => new external_value(PARAM_TEXT, 'asistenciasment name'),
                'nosubmissions' => new external_value(PARAM_INT, 'no submissions'),
                'submissiondrafts' => new external_value(PARAM_INT, 'submissions drafts'),
                'sendnotifications' => new external_value(PARAM_INT, 'send notifications'),
                'sendlatenotifications' => new external_value(PARAM_INT, 'send notifications'),
                'duedate' => new external_value(PARAM_INT, 'asistenciasment due date'),
                'allowsubmissionsfromdate' => new external_value(PARAM_INT, 'allow submissions from date'),
                'grade' => new external_value(PARAM_INT, 'grade type'),
                'timemodified' => new external_value(PARAM_INT, 'last time asistenciasment was modified'),
                'completionsubmit' => new external_value(PARAM_INT, 'if enabled, set activity as complete following submission'),
                'cutoffdate' => new external_value(PARAM_INT, 'date after which submission is not accepted without an extension'),
                'teamsubmission' => new external_value(PARAM_INT, 'if enabled, students submit as a team'),
                'requireallteammemberssubmit' => new external_value(PARAM_INT, 'if enabled, all team members must submit'),
                'teamsubmissiongroupingid' => new external_value(PARAM_INT, 'the grouping id for the team submission groups'),
                'blindmarking' => new external_value(PARAM_INT, 'if enabled, hide identities until reveal identities actioned'),
                'revealidentities' => new external_value(PARAM_INT, 'show identities for a blind marking asistenciasment'),
                'requiresubmissionstatement' => new external_value(PARAM_INT, 'student must accept submission statement'),
                'configs' => new external_multiple_structure(self::get_asistenciasments_config_structure(), 'configuration settings')
            ), 'asistenciasment information object');
    }

    /**
     * Creates an asistencias_plugin_config external_single_structure
     *
     * @return external_single_structure
     * @since Moodle 2.4
     */
    private static function get_asistenciasments_config_structure() {
        return new external_single_structure(
            array(
                'id' => new external_value(PARAM_INT, 'asistencias_plugin_config id'),
                'asistenciasment' => new external_value(PARAM_INT, 'asistenciasment id'),
                'plugin' => new external_value(PARAM_TEXT, 'plugin'),
                'subtype' => new external_value(PARAM_TEXT, 'subtype'),
                'name' => new external_value(PARAM_TEXT, 'name'),
                'value' => new external_value(PARAM_TEXT, 'value')
            ), 'asistenciasment configuration object'
        );
    }

    /**
     * Creates a course external_single_structure
     *
     * @return external_single_structure
     * @since Moodle 2.4
     */
    private static function get_asistenciasments_course_structure() {
        return new external_single_structure(
            array(
                'id' => new external_value(PARAM_INT, 'course id'),
                'fullname' => new external_value(PARAM_TEXT, 'course full name'),
                'shortname' => new external_value(PARAM_TEXT, 'course short name'),
                'timemodified' => new external_value(PARAM_INT, 'last time modified'),
                'asistenciasments' => new external_multiple_structure(self::get_asistenciasments_asistenciasment_structure(), 'asistenciasment info')
              ), 'course information object'
        );
    }

    /**
     * Describes the return value for get_asistenciasments
     *
     * @return external_single_structure
     * @since Moodle 2.4
     */
    public static function get_asistenciasments_returns() {
        return new external_single_structure(
            array(
                'courses' => new external_multiple_structure(self::get_asistenciasments_course_structure(), 'list of courses'),
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
                'asistenciasmentids' => new external_multiple_structure(
                    new external_value(PARAM_INT, 'asistenciasment id'),
                    '1 or more asistenciasment ids',
                    VALUE_REQUIRED),
                'status' => new external_value(PARAM_ALPHA, 'status', VALUE_DEFAULT, ''),
                'since' => new external_value(PARAM_INT, 'submitted since', VALUE_DEFAULT, 0),
                'before' => new external_value(PARAM_INT, 'submitted before', VALUE_DEFAULT, 0)
            )
        );
    }

    /**
     * Returns submissions for the requested asistenciasment ids
     *
     * @param array of ints $asistenciasmentids
     * @param string $status only return submissions with this status
     * @param int $since only return submissions with timemodified >= since
     * @param int $before only return submissions with timemodified <= before
     * @return array of submissions for each requested asistenciasment
     * @since Moodle 2.5
     */
    public static function get_submissions($asistenciasmentids, $status = '', $since = 0, $before = 0) {
        global $DB, $CFG;
        require_once("$CFG->dirroot/mod/asistencias/locallib.php");
        $params = self::validate_parameters(self::get_submissions_parameters(),
                        array('asistenciasmentids' => $asistenciasmentids,
                              'status' => $status,
                              'since' => $since,
                              'before' => $before));

        $warnings = array();
        $asistenciasments = array();

        // Check the user is allowed to get the submissions for the asistenciasments requested.
        $placeholders = array();
        list($inorequalsql, $placeholders) = $DB->get_in_or_equal($params['asistenciasmentids'], SQL_PARAMS_NAMED);
        $sql = "SELECT cm.id, cm.instance FROM {course_modules} cm JOIN {modules} md ON md.id = cm.module ".
               "WHERE md.name = :modname AND cm.instance ".$inorequalsql;
        $placeholders['modname'] = 'asistencias';
        $cms = $DB->get_records_sql($sql, $placeholders);
        $asistenciass = array();
        foreach ($cms as $cm) {
            try {
                $context = context_module::instance($cm->id);
                self::validate_context($context);
                require_capability('mod/asistencias:grade', $context);
                $asistencias = new asistencias($context, null, null);
                $asistenciass[] = $asistencias;
            } catch (Exception $e) {
                $warnings[] = array(
                    'item' => 'asistenciasment',
                    'itemid' => $cm->instance,
                    'warningcode' => '1',
                    'message' => 'No access rights in module context'
                );
            }
        }

        foreach ($asistenciass as $asistencias) {
            $submissions = array();
            $submissionplugins = $asistencias->get_submission_plugins();
            $placeholders = array('asistenciasid1' => $asistencias->get_instance()->id,
                                  'asistenciasid2' => $asistencias->get_instance()->id);

            $submissionmaxattempt = 'SELECT mxs.userid, MAX(mxs.attemptnumber) AS maxattempt
                                     FROM {asistencias_submission} mxs
                                     WHERE mxs.asistenciasment = :asistenciasid1 GROUP BY mxs.userid';

            $sql = "SELECT mas.id, mas.asistenciasment,mas.userid,".
                   "mas.timecreated,mas.timemodified,mas.status,mas.groupid ".
                   "FROM {asistencias_submission} mas ".
                   "JOIN ( " . $submissionmaxattempt . " ) smx ON mas.userid = smx.userid ".
                   "WHERE mas.asistenciasment = :asistenciasid2 AND mas.attemptnumber = smx.maxattempt";

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
                        // Subtype is 'asistenciassubmission', type is currently 'file' or 'onlinetext'.
                        $component = $submissionplugin->get_subtype().'_'.$submissionplugin->get_type();

                        $fileareas = $submissionplugin->get_file_areas();
                        foreach ($fileareas as $filearea => $name) {
                            $fileareainfo = array('area' => $filearea);
                            $files = $fs->get_area_files(
                                $asistencias->get_context()->id,
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
                    'itemid' => $asistencias->get_instance()->id,
                    'warningcode' => '3',
                    'message' => 'No submissions found'
                );
            }

            $asistenciasments[] = array(
                'asistenciasmentid' => $asistencias->get_instance()->id,
                'submissions' => $submissions
            );

        }

        $result = array(
            'asistenciasments' => $asistenciasments,
            'warnings' => $warnings
        );
        return $result;
    }

    /**
     * Creates an asistencias_submissions external_single_structure
     *
     * @return external_single_structure
     * @since Moodle 2.5
     */
    private static function get_submissions_structure() {
        return new external_single_structure(
            array (
                'asistenciasmentid' => new external_value(PARAM_INT, 'asistenciasment id'),
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
                'asistenciasments' => new external_multiple_structure(self::get_submissions_structure(), 'asistenciasment submissions'),
                'warnings' => new external_warnings()
            )
        );
    }
}
