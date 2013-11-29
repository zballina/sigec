<?PHP
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
 * This file contains the moodle hooks for the sesiontarea module.
 * It delegates most functions to the sesiontareament class.
 *
 * @package   mod_sesiontarea
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/itse/lib.php');

/**
 * Adds an sesiontareament instance
 *
 * This is done by calling the add_instance() method of the sesiontareament type class
 * @param stdClass $data
 * @param mod_sesiontarea_mod_form $form
 * @return int The instance id of the new sesiontareament
 */
function sesiontarea_add_instance(stdClass $data, mod_sesiontarea_mod_form $form = null) {
    global $CFG, $DB;
    require_once($CFG->dirroot . '/mod/sesiontarea/locallib.php');
    
    $sesiontareament = new sesiontarea(context_module::instance($data->coursemodule), null, null);

    $id = $sesiontareament->add_instance($data, true);

    $grupos = groups_get_all_groups($data->course);
    foreach ($grupos as $grupo)
    {
        $programacion = new stdClass();
        $programacion->course = $data->course;
        $programacion->modulename = 'sesiontarea';
        $programacion->sesionclaseid = $id;
        $programacion->groupid = $grupo->id;
        $fprogramada = "fprogramada$grupo->id";
        $programacion->fprogramada = $data->$fprogramada;
        $hprogramada = "hprogramada$grupo->id";
        $programacion->hprogramada = $data->$hprogramada;
        $DB->insert_record('sesionclase_programacion', $programacion);
    }
    
    return $id;
}

/**
 * delete an sesiontareament instance
 * @param int $id
 * @return bool
 */
function sesiontarea_delete_instance($id) {
    global $CFG, $DB;
    require_once($CFG->dirroot . '/mod/sesiontarea/locallib.php');
    $cm = get_coursemodule_from_instance('sesiontarea', $id, 0, false, MUST_EXIST);
    $context = context_module::instance($cm->id);
    $course = $cm->course;
    $sesiontareament = new sesiontarea($context, null, null);
    if($sesiontareament->delete_instance())
    {
        $grupos = groups_get_all_groups($course);
        foreach ($grupos as $grupo)
        {
            $programa = $DB->get_record('sesionclase_programacion', array('course' => $course, 
                'modulename' => 'sesiontarea', 'sesionclaseid' => $id, 'groupid' => $grupo->id));
            $DB->delete_records('sesionclase_programacion', array('id' => $programa->id));
            $asistencias = $DB->get_records('sesionclase_asistencias', array('course' => $course, 
                'modulename' => 'sesiontarea', 'sesionclaseid' => $id, 'groupid' => $grupo->id));
            foreach ($asistencias as $asistencia)
            {
                $DB->delete_records('sesionclase_asistencias', array('id' => $asistencia->id));
            }
        }
        return true;
    }
    return false;
}

/**
 * This function is used by the reset_course_userdata function in moodlelib.
 * This function will remove all sesiontareament submissions and feedbacks in the database
 * and clean up any related data.
 * @param $data the data submitted from the reset course.
 * @return array status array
 */
function sesiontarea_reset_userdata($data) {
    global $CFG, $DB;
    require_once($CFG->dirroot . '/mod/sesiontarea/locallib.php');

    $status = array();
    $params = array('courseid'=>$data->courseid);
    $sql = "SELECT a.id FROM {sesiontarea} a WHERE a.course=:courseid";
    $course = $DB->get_record('course', array('id'=>$data->courseid), '*', MUST_EXIST);
    if ($sesiontareas = $DB->get_records_sql($sql, $params)) {
        foreach ($sesiontareas as $sesiontarea) {
            $cm = get_coursemodule_from_instance('sesiontarea',
                                                 $sesiontarea->id,
                                                 $data->courseid,
                                                 false,
                                                 MUST_EXIST);
            $context = context_module::instance($cm->id);
            $sesiontareament = new sesiontarea($context, $cm, $course);
            $status = array_merge($status, $sesiontareament->reset_userdata($data));
        }
    }
    return $status;
}

/**
 * Removes all grades from gradebook
 *
 * @param int $courseid The ID of the course to reset
 * @param string $type Optional type of sesiontareament to limit the reset to a particular sesiontareament type
 */
function sesiontarea_reset_gradebook($courseid, $type='') {
    global $CFG, $DB;

    $params = array('moduletype'=>'sesiontarea', 'courseid'=>$courseid);
    $sql = 'SELECT a.*, cm.idnumber as cmidnumber, a.course as courseid
            FROM {sesiontarea} a, {course_modules} cm, {modules} m
            WHERE m.name=:moduletype AND m.id=cm.module AND cm.instance=a.id AND a.course=:courseid';

    if ($sesiontareaments = $DB->get_records_sql($sql, $params)) {
        foreach ($sesiontareaments as $sesiontareament) {
            sesiontarea_grade_item_update($sesiontareament, 'reset');
        }
    }
}

/**
 * Implementation of the function for printing the form elements that control
 * whether the course reset functionality affects the sesiontareament.
 * @param $mform form passed by reference
 */
function sesiontarea_reset_course_form_definition(&$mform) {
    $mform->addElement('header', 'sesiontareaheader', get_string('modulenameplural', 'sesiontarea'));
    $name = get_string('deleteallsubmissions', 'sesiontarea');
    $mform->addElement('advcheckbox', 'reset_sesiontarea_submissions', $name);
}

/**
 * Course reset form defaults.
 * @param  object $course
 * @return array
 */
function sesiontarea_reset_course_form_defaults($course) {
    return array('reset_sesiontarea_submissions'=>1);
}

/**
 * Update an sesiontareament instance
 *
 * This is done by calling the update_instance() method of the sesiontareament type class
 * @param stdClass $data
 * @param $form
 * @return object
 */
function sesiontarea_update_instance(stdClass $sesionclase, $form) {
    global $CFG, $DB;
    require_once($CFG->dirroot . '/mod/sesiontarea/locallib.php');

    $context = context_module::instance($sesionclase->coursemodule);
    $sesion = new SesionClase($sesionclase->instance, $sesionclase->modulename, $sesionclase->coursemodule);

    $sesiontareament = new sesiontarea($context, null, null);
    $id = $sesiontareament->update_instance($sesionclase);
    
    $grupos = groups_get_all_groups($sesionclase->course);
    foreach ($grupos as $grupo)
    {
        $programacion = $sesion->programacion($grupo->id);
        if($programacion != null)
        {
            $fprogramada = "fprogramada$grupo->id";
            $programacion->fprogramada = $sesionclase->$fprogramada;
            $hprogramada = "hprogramada$grupo->id";
            $programacion->hprogramada = $sesionclase->$hprogramada;
            $DB->update_record('sesionclase_programacion', $programacion);
        }
    }
    return $id;
}

/**
 * Return the list if Moodle features this module supports
 *
 * @param string $feature FEATURE_xx constant for requested feature
 * @return mixed True if module supports feature, null if doesn't know
 */
function sesiontarea_supports($feature) {
    switch($feature) {
        case FEATURE_GROUPS:
            return true;
        case FEATURE_GROUPINGS:
            return true;
        case FEATURE_GROUPMEMBERSONLY:
            return true;
        case FEATURE_MOD_INTRO:
            return true;
        case FEATURE_COMPLETION_TRACKS_VIEWS:
            return true;
        case FEATURE_COMPLETION_HAS_RULES:
            return true;
        case FEATURE_GRADE_HAS_GRADE:
            return true;
        case FEATURE_GRADE_OUTCOMES:
            return true;
        case FEATURE_BACKUP_MOODLE2:
            return true;
        case FEATURE_SHOW_DESCRIPTION:
            return true;
        case FEATURE_ADVANCED_GRADING:
            return true;
        case FEATURE_PLAGIARISM:
            return true;

        default:
            return null;
    }
}

/**
 * Lists all gradable areas for the advanced grading methods gramework
 *
 * @return array('string'=>'string') An array with area names as keys and descriptions as values
 */
function sesiontarea_grading_areas_list() {
    return array('submissions'=>get_string('submissions', 'sesiontarea'));
}

/**
 * extend an assigment navigation settings
 *
 * @param settings_navigation $settings
 * @param navigation_node $navref
 * @return void
 */ 
function sesiontarea_extend_settings_navigation(settings_navigation $settings, navigation_node $navref) {
    global $PAGE, $DB;

    $cm = $PAGE->cm;
    if (!$cm) {
        return;
    }

    $context = $cm->context;
    $course = $PAGE->course;

    if (!$course) {
        return;
    }

    // Link to gradebook.
    if (has_capability('gradereport/grader:view', $cm->context) &&
            has_capability('moodle/grade:viewall', $cm->context)) {
        $link = new moodle_url('/grade/report/grader/index.php', array('id' => $course->id));
        $linkname = get_string('viewgradebook', 'sesiontarea');
        $node = $navref->add($linkname, $link, navigation_node::TYPE_SETTING);
    }

    // Link to download all submissions.
    if (has_capability('mod/sesiontarea:grade', $context)) {
        $link = new moodle_url('/mod/sesiontarea/view.php', array('id' => $cm->id, 'action'=>'grading'));
        $node = $navref->add(get_string('viewgrading', 'sesiontarea'), $link, navigation_node::TYPE_SETTING);

        $link = new moodle_url('/mod/sesiontarea/view.php', array('id' => $cm->id, 'action'=>'downloadall'));
        $node = $navref->add(get_string('downloadall', 'sesiontarea'), $link, navigation_node::TYPE_SETTING);
    }

    if (has_capability('mod/sesiontarea:revealidentities', $context)) {
        $dbparams = array('id'=>$cm->instance);
        $sesiontareament = $DB->get_record('sesiontarea', $dbparams, 'blindmarking, revealidentities');

        if ($sesiontareament && $sesiontareament->blindmarking && !$sesiontareament->revealidentities) {
            $urlparams = array('id' => $cm->id, 'action'=>'revealidentities');
            $url = new moodle_url('/mod/sesiontarea/view.php', $urlparams);
            $linkname = get_string('revealidentities', 'sesiontarea');
            $node = $navref->add($linkname, $url, navigation_node::TYPE_SETTING);
        }
    }

    $nodo = $navref->get('modedit');
    if($nodo != null)
        $nodo->remove();    
}

/**
 * Add a get_coursemodule_info function in case any sesiontareament type wants to add 'extra' information
 * for the course (see resource).
 *
 * Given a course_module object, this function returns any "extra" information that may be needed
 * when printing this activity in a course listing.  See get_array_of_activities() in course/lib.php.
 *
 * @param stdClass $coursemodule The coursemodule object (record).
 * @return cached_cm_info An object on information that the courses
 *                        will know about (most noticeably, an icon).
 */
function sesiontarea_get_coursemodule_info($coursemodule) {
    global $CFG, $DB;

    $dbparams = array('id'=>$coursemodule->instance);
    $fields = 'id, name, alwaysshowdescription, allowsubmissionsfromdate, intro, introformat';
    if (! $sesiontareament = $DB->get_record('sesiontarea', $dbparams, $fields)) {
        return false;
    }

    $result = new cached_cm_info();
    $result->name = $sesiontareament->name;
    if ($coursemodule->showdescription) {
        if ($sesiontareament->alwaysshowdescription || time() > $sesiontareament->allowsubmissionsfromdate) {
            // Convert intro to html. Do not filter cached version, filters run at display time.
            $result->content = format_module_intro('sesiontarea', $sesiontareament, $coursemodule->id, false);
        }
    }
    return $result;
}

/**
 * Return a list of page types
 * @param string $pagetype current page type
 * @param stdClass $parentcontext Block's parent context
 * @param stdClass $currentcontext Current context of block
 */
function sesiontarea_page_type_list($pagetype, $parentcontext, $currentcontext) {
    $module_pagetype = array(
        'mod-sesiontarea-*' => get_string('page-mod-sesiontarea-x', 'sesiontarea'),
        'mod-sesiontarea-view' => get_string('page-mod-sesiontarea-view', 'sesiontarea'),
    );
    return $module_pagetype;
}

/**
 * Print an overview of all sesiontareaments
 * for the courses.
 *
 * @param mixed $courses The list of courses to print the overview for
 * @param array $htmlarray The array of html to return
 */
function sesiontarea_print_overview($courses, &$htmlarray) {
    global $USER, $CFG, $DB;

    if (empty($courses) || !is_array($courses) || count($courses) == 0) {
        return array();
    }

    if (!$sesiontareaments = get_all_instances_in_courses('sesiontarea', $courses)) {
        return;
    }

    $sesiontareamentids = array();

    // Do sesiontareament_base::isopen() here without loading the whole thing for speed.
    foreach ($sesiontareaments as $key => $sesiontareament) {
        $time = time();
        $isopen = false;
        if ($sesiontareament->duedate) {
            $duedate = false;
            if ($sesiontareament->cutoffdate) {
                $duedate = $sesiontareament->cutoffdate;
            }
            if ($duedate) {
                $isopen = ($sesiontareament->allowsubmissionsfromdate <= $time && $time <= $duedate);
            } else {
                $isopen = ($sesiontareament->allowsubmissionsfromdate <= $time);
            }
        }
        if ($isopen) {
            $sesiontareamentids[] = $sesiontareament->id;
        }
    }

    if (empty($sesiontareamentids)) {
        // No sesiontareaments to look at - we're done.
        return true;
    }

    // Definitely something to print, now include the constants we need.
    require_once($CFG->dirroot . '/mod/sesiontarea/locallib.php');

    $strduedate = get_string('duedate', 'sesiontarea');
    $strcutoffdate = get_string('nosubmissionsacceptedafter', 'sesiontarea');
    $strnolatesubmissions = get_string('nolatesubmissions', 'sesiontarea');
    $strduedateno = get_string('duedateno', 'sesiontarea');
    $strduedateno = get_string('duedateno', 'sesiontarea');
    $strgraded = get_string('graded', 'sesiontarea');
    $strnotgradedyet = get_string('notgradedyet', 'sesiontarea');
    $strnotsubmittedyet = get_string('notsubmittedyet', 'sesiontarea');
    $strsubmitted = get_string('submitted', 'sesiontarea');
    $strsesiontareament = get_string('modulename', 'sesiontarea');
    $strreviewed = get_string('reviewed', 'sesiontarea');

    // We do all possible database work here *outside* of the loop to ensure this scales.
    list($sqlsesiontareamentids, $sesiontareamentidparams) = $DB->get_in_or_equal($sesiontareamentids);

    $mysubmissions = null;
    $unmarkedsubmissions = null;

    foreach ($sesiontareaments as $sesiontareament) {
        // Do not show sesiontareaments that are not open.
        if (!in_array($sesiontareament->id, $sesiontareamentids)) {
            continue;
        }
        $dimmedclass = '';
        if (!$sesiontareament->visible) {
            $dimmedclass = ' class="dimmed"';
        }
        $href = $CFG->wwwroot . '/mod/sesiontarea/view.php?id=' . $sesiontareament->coursemodule;
        $str = '<div class="sesiontarea overview">' .
               '<div class="name">' .
               $strsesiontareament . ': '.
               '<a ' . $dimmedclass .
                   'title="' . $strsesiontareament . '" ' .
                   'href="' . $href . '">' .
               format_string($sesiontareament->name) .
               '</a></div>';
        if ($sesiontareament->duedate) {
            $userdate = userdate($sesiontareament->duedate);
            $str .= '<div class="info">' . $strduedate . ': ' . $userdate . '</div>';
        } else {
            $str .= '<div class="info">' . $strduedateno . '</div>';
        }
        if ($sesiontareament->cutoffdate) {
            if ($sesiontareament->cutoffdate == $sesiontareament->duedate) {
                $str .= '<div class="info">' . $strnolatesubmissions . '</div>';
            } else {
                $userdate = userdate($sesiontareament->cutoffdate);
                $str .= '<div class="info">' . $strcutoffdate . ': ' . $userdate . '</div>';
            }
        }
        $context = context_module::instance($sesiontareament->coursemodule);
        if (has_capability('mod/sesiontarea:grade', $context)) {
            if (!isset($unmarkedsubmissions)) {
                // Build up and array of unmarked submissions indexed by sesiontareament id/ userid
                // for use where the user has grading rights on sesiontareament.
                $dbparams = array_merge(array(SESIONTAREA_SUBMISSION_STATUS_SUBMITTED), $sesiontareamentidparams);
                $rs = $DB->get_recordset_sql('SELECT
                                                  s.sesiontareament as sesiontareament,
                                                  s.userid as userid,
                                                  s.id as id,
                                                  s.status as status,
                                                  g.timemodified as timegraded
                                              FROM {sesiontarea_submission} s
                                              LEFT JOIN {sesiontarea_grades} g ON
                                                  s.userid = g.userid AND
                                                  s.sesiontareament = g.sesiontareament
                                              WHERE
                                                  ( g.timemodified is NULL OR
                                                  s.timemodified > g.timemodified ) AND
                                                  s.timemodified IS NOT NULL AND
                                                  s.status = ? AND
                                                  s.sesiontareament ' . $sqlsesiontareamentids, $dbparams);

                $unmarkedsubmissions = array();
                foreach ($rs as $rd) {
                    $unmarkedsubmissions[$rd->sesiontareament][$rd->userid] = $rd->id;
                }
                $rs->close();
            }

            // Count how many people can submit.
            $submissions = 0;
            if ($students = get_enrolled_users($context, 'mod/sesiontarea:view', 0, 'u.id')) {
                foreach ($students as $student) {
                    if (isset($unmarkedsubmissions[$sesiontareament->id][$student->id])) {
                        $submissions++;
                    }
                }
            }

            if ($submissions) {
                $urlparams = array('id'=>$sesiontareament->coursemodule, 'action'=>'grading');
                $url = new moodle_url('/mod/sesiontarea/view.php', $urlparams);
                $str .= '<div class="details">' .
                        '<a href="' . $url . '">' .
                        get_string('submissionsnotgraded', 'sesiontarea', $submissions) .
                        '</a></div>';
            }
        }
        if (has_capability('mod/sesiontarea:submit', $context)) {
            if (!isset($mysubmissions)) {
                // Get all user submissions, indexed by sesiontareament id.
                $dbparams = array_merge(array($USER->id, $USER->id), $sesiontareamentidparams);
                $mysubmissions = $DB->get_records_sql('SELECT
                                                           a.id AS sesiontareament,
                                                           a.nosubmissions AS nosubmissions,
                                                           g.timemodified AS timemarked,
                                                           g.grader AS grader,
                                                           g.grade AS grade,
                                                           s.status AS status
                                                       FROM {sesiontarea} a
                                                       LEFT JOIN {sesiontarea_grades} g ON
                                                           g.sesiontareament = a.id AND
                                                           g.userid = ?
                                                       LEFT JOIN {sesiontarea_submission} s ON
                                                           s.sesiontareament = a.id AND
                                                           s.userid = ?
                                                       WHERE a.id ' . $sqlsesiontareamentids, $dbparams);
            }

            $str .= '<div class="details">';
            $str .= get_string('mysubmission', 'sesiontarea');
            $submission = $mysubmissions[$sesiontareament->id];
            if ($submission->nosubmissions) {
                $str .= get_string('offline', 'sesiontarea');
            } else if (!$submission->status || $submission->status == 'draft') {
                $str .= $strnotsubmittedyet;
            } else {
                $str .= get_string('submissionstatus_' . $submission->status, 'sesiontarea');
            }
            if (!$submission->grade || $submission->grade < 0) {
                $str .= ', ' . get_string('notgraded', 'sesiontarea');
            } else {
                $str .= ', ' . get_string('graded', 'sesiontarea');
            }
            $str .= '</div>';
        }
        $str .= '</div>';
        if (empty($htmlarray[$sesiontareament->course]['sesiontarea'])) {
            $htmlarray[$sesiontareament->course]['sesiontarea'] = $str;
        } else {
            $htmlarray[$sesiontareament->course]['sesiontarea'] .= $str;
        }
    }
}

/**
 * Print recent activity from all sesiontareaments in a given course
 *
 * This is used by the recent activity block
 * @param mixed $course the course to print activity for
 * @param bool $viewfullnames boolean to determine whether to show full names or not
 * @param int $timestart the time the rendering started
 */
function sesiontarea_print_recent_activity($course, $viewfullnames, $timestart) {
    global $CFG, $USER, $DB, $OUTPUT;

    // Do not use log table if possible, it may be huge.

    $dbparams = array($timestart, $course->id, 'sesiontarea');
    if (!$submissions = $DB->get_records_sql('SELECT asb.id, asb.timemodified, cm.id AS cmid, asb.userid,
                                                     u.firstname, u.lastname, u.email, u.picture
                                                FROM {sesiontarea_submission} asb
                                                     JOIN {sesiontarea} a      ON a.id = asb.sesiontareament
                                                     JOIN {course_modules} cm ON cm.instance = a.id
                                                     JOIN {modules} md        ON md.id = cm.module
                                                     JOIN {user} u            ON u.id = asb.userid
                                               WHERE asb.timemodified > ? AND
                                                     a.course = ? AND
                                                     md.name = ?
                                            ORDER BY asb.timemodified ASC', $dbparams)) {
         return false;
    }

    $modinfo = get_fast_modinfo($course);
    $show    = array();
    $grader  = array();

    $showrecentsubmissions = get_config('mod_sesiontarea', 'showrecentsubmissions');

    foreach ($submissions as $submission) {
        if (!array_key_exists($submission->cmid, $modinfo->get_cms())) {
            continue;
        }
        $cm = $modinfo->get_cm($submission->cmid);
        if (!$cm->uservisible) {
            continue;
        }
        if ($submission->userid == $USER->id) {
            $show[] = $submission;
            continue;
        }

        $context = context_module::instance($submission->cmid);
        // The act of submitting of sesiontareament may be considered private -
        // only graders will see it if specified.
        if (empty($showrecentsubmissions)) {
            if (!array_key_exists($cm->id, $grader)) {
                $grader[$cm->id] = has_capability('moodle/grade:viewall', $context);
            }
            if (!$grader[$cm->id]) {
                continue;
            }
        }

        $groupmode = groups_get_activity_groupmode($cm, $course);

        if ($groupmode == SEPARATEGROUPS &&
                !has_capability('moodle/site:accessallgroups',  $context)) {
            if (isguestuser()) {
                // Shortcut - guest user does not belong into any group.
                continue;
            }

            if (is_null($modinfo->get_groups())) {
                // Load all my groups and cache it in modinfo.
                $modinfo->groups = groups_get_user_groups($course->id);
            }

            // This will be slow - show only users that share group with me in this cm.
            if (empty($modinfo->groups[$cm->id])) {
                continue;
            }
            $usersgroups =  groups_get_all_groups($course->id, $submission->userid, $cm->groupingid);
            if (is_array($usersgroups)) {
                $usersgroups = array_keys($usersgroups);
                $intersect = array_intersect($usersgroups, $modinfo->groups[$cm->id]);
                if (empty($intersect)) {
                    continue;
                }
            }
        }
        $show[] = $submission;
    }

    if (empty($show)) {
        return false;
    }

    echo $OUTPUT->heading(get_string('newsubmissions', 'sesiontarea').':', 3);

    foreach ($show as $submission) {
        $cm = $modinfo->get_cm($submission->cmid);
        $link = $CFG->wwwroot.'/mod/sesiontarea/view.php?id='.$cm->id;
        print_recent_activity_note($submission->timemodified,
                                   $submission,
                                   $cm->name,
                                   $link,
                                   false,
                                   $viewfullnames);
    }

    return true;
}

/**
 * Returns all sesiontareaments since a given time.
 *
 * @param array $activities The activity information is returned in this array
 * @param int $index The current index in the activities array
 * @param int $timestart The earliest activity to show
 * @param int $courseid Limit the search to this course
 * @param int $cmid The course module id
 * @param int $userid Optional user id
 * @param int $groupid Optional group id
 * @return void
 */
function sesiontarea_get_recent_mod_activity(&$activities,
                                        &$index,
                                        $timestart,
                                        $courseid,
                                        $cmid,
                                        $userid=0,
                                        $groupid=0) {
    global $CFG, $COURSE, $USER, $DB;

    if ($COURSE->id == $courseid) {
        $course = $COURSE;
    } else {
        $course = $DB->get_record('course', array('id'=>$courseid));
    }

    $modinfo = get_fast_modinfo($course);

    $cm = $modinfo->get_cm($cmid);
    $params = array();
    if ($userid) {
        $userselect = 'AND u.id = :userid';
        $params['userid'] = $userid;
    } else {
        $userselect = '';
    }

    if ($groupid) {
        $groupselect = 'AND gm.groupid = :groupid';
        $groupjoin   = 'JOIN {groups_members} gm ON  gm.userid=u.id';
        $params['groupid'] = $groupid;
    } else {
        $groupselect = '';
        $groupjoin   = '';
    }

    $params['cminstance'] = $cm->instance;
    $params['timestart'] = $timestart;

    $userfields = user_picture::fields('u', null, 'userid');

    if (!$submissions = $DB->get_records_sql('SELECT asb.id, asb.timemodified, ' .
                                                     $userfields .
                                             '  FROM {sesiontarea_submission} asb
                                                JOIN {sesiontarea} a ON a.id = asb.sesiontareament
                                                JOIN {user} u ON u.id = asb.userid ' .
                                          $groupjoin .
                                            '  WHERE asb.timemodified > :timestart AND
                                                     a.id = :cminstance
                                                     ' . $userselect . ' ' . $groupselect .
                                            ' ORDER BY asb.timemodified ASC', $params)) {
         return;
    }

    $groupmode       = groups_get_activity_groupmode($cm, $course);
    $cm_context      = context_module::instance($cm->id);
    $grader          = has_capability('moodle/grade:viewall', $cm_context);
    $accessallgroups = has_capability('moodle/site:accessallgroups', $cm_context);
    $viewfullnames   = has_capability('moodle/site:viewfullnames', $cm_context);

    if (is_null($modinfo->get_groups())) {
        // Load all my groups and cache it in modinfo.
        $modinfo->groups = groups_get_user_groups($course->id);
    }

    $showrecentsubmissions = get_config('mod_sesiontarea', 'showrecentsubmissions');
    $show = array();
    $usersgroups = groups_get_all_groups($course->id, $USER->id, $cm->groupingid);
    if (is_array($usersgroups)) {
        $usersgroups = array_keys($usersgroups);
    }
    foreach ($submissions as $submission) {
        if ($submission->userid == $USER->id) {
            $show[] = $submission;
            continue;
        }
        // The act of submitting of sesiontareament may be considered private -
        // only graders will see it if specified.
        if (empty($showrecentsubmissions)) {
            if (!$grader) {
                continue;
            }
        }

        if ($groupmode == SEPARATEGROUPS and !$accessallgroups) {
            if (isguestuser()) {
                // Shortcut - guest user does not belong into any group.
                continue;
            }

            // This will be slow - show only users that share group with me in this cm.
            if (empty($modinfo->groups[$cm->id])) {
                continue;
            }
            if (is_array($usersgroups)) {
                $intersect = array_intersect($usersgroups, $modinfo->groups[$cm->id]);
                if (empty($intersect)) {
                    continue;
                }
            }
        }
        $show[] = $submission;
    }

    if (empty($show)) {
        return;
    }

    if ($grader) {
        require_once($CFG->libdir.'/gradelib.php');
        $userids = array();
        foreach ($show as $id => $submission) {
            $userids[] = $submission->userid;
        }
        $grades = grade_get_grades($courseid, 'mod', 'sesiontarea', $cm->instance, $userids);
    }

    $aname = format_string($cm->name, true);
    foreach ($show as $submission) {
        $activity = new stdClass();

        $activity->type         = 'sesiontarea';
        $activity->cmid         = $cm->id;
        $activity->name         = $aname;
        $activity->sectionnum   = $cm->sectionnum;
        $activity->timestamp    = $submission->timemodified;
        $activity->user         = new stdClass();
        if ($grader) {
            $activity->grade = $grades->items[0]->grades[$submission->userid]->str_long_grade;
        }

        $userfields = explode(',', user_picture::fields());
        foreach ($userfields as $userfield) {
            if ($userfield == 'id') {
                // Aliased in SQL above.
                $activity->user->{$userfield} = $submission->userid;
            } else {
                $activity->user->{$userfield} = $submission->{$userfield};
            }
        }
        $activity->user->fullname = fullname($submission, $viewfullnames);

        $activities[$index++] = $activity;
    }

    return;
}

/**
 * Print recent activity from all sesiontareaments in a given course
 *
 * This is used by course/recent.php
 * @param stdClass $activity
 * @param int $courseid
 * @param bool $detail
 * @param array $modnames
 */
function sesiontarea_print_recent_mod_activity($activity, $courseid, $detail, $modnames) {
    global $CFG, $OUTPUT;

    echo '<table border="0" cellpadding="3" cellspacing="0" class="sesiontareament-recent">';

    echo '<tr><td class="userpicture" valign="top">';
    echo $OUTPUT->user_picture($activity->user);
    echo '</td><td>';

    if ($detail) {
        $modname = $modnames[$activity->type];
        echo '<div class="title">';
        echo '<img src="' . $OUTPUT->pix_url('icon', 'sesiontarea') . '" '.
             'class="icon" alt="' . $modname . '">';
        echo '<a href="' . $CFG->wwwroot . '/mod/sesiontarea/view.php?id=' . $activity->cmid . '">';
        echo $activity->name;
        echo '</a>';
        echo '</div>';
    }

    if (isset($activity->grade)) {
        echo '<div class="grade">';
        echo get_string('grade').': ';
        echo $activity->grade;
        echo '</div>';
    }

    echo '<div class="user">';
    echo "<a href=\"$CFG->wwwroot/user/view.php?id={$activity->user->id}&amp;course=$courseid\">";
    echo "{$activity->user->fullname}</a>  - " . userdate($activity->timestamp);
    echo '</div>';

    echo '</td></tr></table>';
}

/**
 * Checks if a scale is being used by an sesiontareament.
 *
 * This is used by the backup code to decide whether to back up a scale
 * @param int $sesiontareamentid
 * @param int $scaleid
 * @return boolean True if the scale is used by the sesiontareament
 */
function sesiontarea_scale_used($sesiontareamentid, $scaleid) {
    global $DB;

    $return = false;
    $rec = $DB->get_record('sesiontarea', array('id'=>$sesiontareamentid, 'grade'=>-$scaleid));

    if (!empty($rec) && !empty($scaleid)) {
        $return = true;
    }

    return $return;
}

/**
 * Checks if scale is being used by any instance of sesiontareament
 *
 * This is used to find out if scale used anywhere
 * @param int $scaleid
 * @return boolean True if the scale is used by any sesiontareament
 */
function sesiontarea_scale_used_anywhere($scaleid) {
    global $DB;

    if ($scaleid and $DB->record_exists('sesiontarea', array('grade'=>-$scaleid))) {
        return true;
    } else {
        return false;
    }
}

/**
 * List the actions that correspond to a view of this module.
 * This is used by the participation report.
 * @return array
 */
function sesiontarea_get_view_actions() {
    return array('view submission', 'view feedback');
}

/**
 * List the actions that correspond to a post of this module.
 * This is used by the participation report.
 * @return array
 */
function sesiontarea_get_post_actions() {
    return array('upload', 'submit', 'submit for grading');
}

/**
 * Call cron on the sesiontarea module.
 */
function sesiontarea_cron() {
    global $CFG;

    require_once($CFG->dirroot . '/mod/sesiontarea/locallib.php');
    sesiontarea::cron();

    $plugins = get_plugin_list('sesiontareasubmission');

    foreach ($plugins as $name => $plugin) {
        $disabled = get_config('sesiontareasubmission_' . $name, 'disabled');
        if (!$disabled) {
            $class = 'sesiontarea_submission_' . $name;
            require_once($CFG->dirroot . '/mod/sesiontarea/submission/' . $name . '/locallib.php');
            $class::cron();
        }
    }
    $plugins = get_plugin_list('sesiontareafeedback');

    foreach ($plugins as $name => $plugin) {
        $disabled = get_config('sesiontareafeedback_' . $name, 'disabled');
        if (!$disabled) {
            $class = 'sesiontarea_feedback_' . $name;
            require_once($CFG->dirroot . '/mod/sesiontarea/feedback/' . $name . '/locallib.php');
            $class::cron();
        }
    }
}

/**
 * Returns all other capabilities used by this module.
 * @return array Array of capability strings
 */
function sesiontarea_get_extra_capabilities() {
    return array('gradereport/grader:view',
                 'moodle/grade:viewall',
                 'moodle/site:viewfullnames',
                 'moodle/site:config');
}

/**
 * Create grade item for given sesiontareament.
 *
 * @param stdClass $sesiontarea record with extra cmidnumber
 * @param array $grades optional array/object of grade(s); 'reset' means reset grades in gradebook
 * @return int 0 if ok, error code otherwise
 */
function sesiontarea_grade_item_update($sesiontarea, $grades=null) {
    global $CFG;
    require_once($CFG->libdir.'/gradelib.php');

    if (!isset($sesiontarea->courseid)) {
        $sesiontarea->courseid = $sesiontarea->course;
    }

    $params = array('itemname'=>$sesiontarea->name, 'idnumber'=>$sesiontarea->cmidnumber);

    if ($sesiontarea->grade > 0) {
        $params['gradetype'] = GRADE_TYPE_VALUE;
        $params['grademax']  = $sesiontarea->grade;
        $params['grademin']  = 0;

    } else if ($sesiontarea->grade < 0) {
        $params['gradetype'] = GRADE_TYPE_SCALE;
        $params['scaleid']   = -$sesiontarea->grade;

    } else {
        // Allow text comments only.
        $params['gradetype'] = GRADE_TYPE_TEXT;
    }

    if ($grades  === 'reset') {
        $params['reset'] = true;
        $grades = null;
    }

    return grade_update('mod/sesiontarea',
                        $sesiontarea->courseid,
                        'mod',
                        'sesiontarea',
                        $sesiontarea->id,
                        0,
                        $grades,
                        $params);
}

/**
 * Return grade for given user or all users.
 *
 * @param stdClass $sesiontarea record of sesiontarea with an additional cmidnumber
 * @param int $userid optional user id, 0 means all users
 * @return array array of grades, false if none
 */
function sesiontarea_get_user_grades($sesiontarea, $userid=0) {
    global $CFG;

    require_once($CFG->dirroot . '/mod/sesiontarea/locallib.php');

    $cm = get_coursemodule_from_instance('sesiontarea', $sesiontarea->id, 0, false, MUST_EXIST);
    $context = context_module::instance($cm->id);
    $sesiontareament = new sesiontarea($context, null, null);
    $sesiontareament->set_instance($sesiontarea);
    return $sesiontareament->get_user_grades_for_gradebook($userid);
}

/**
 * Update activity grades.
 *
 * @param stdClass $sesiontarea database record
 * @param int $userid specific user only, 0 means all
 * @param bool $nullifnone - not used
 */
function sesiontarea_update_grades($sesiontarea, $userid=0, $nullifnone=true) {
    global $CFG;
    require_once($CFG->libdir.'/gradelib.php');

    if ($sesiontarea->grade == 0) {
        sesiontarea_grade_item_update($sesiontarea);

    } else if ($grades = sesiontarea_get_user_grades($sesiontarea, $userid)) {
        foreach ($grades as $k => $v) {
            if ($v->rawgrade == -1) {
                $grades[$k]->rawgrade = null;
            }
        }
        sesiontarea_grade_item_update($sesiontarea, $grades);

    } else {
        sesiontarea_grade_item_update($sesiontarea);
    }
}

/**
 * List the file areas that can be browsed.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param stdClass $context
 * @return array
 */
function sesiontarea_get_file_areas($course, $cm, $context) {
    global $CFG;
    require_once($CFG->dirroot . '/mod/sesiontarea/locallib.php');
    $areas = array();

    $sesiontareament = new sesiontarea($context, $cm, $course);
    foreach ($sesiontareament->get_submission_plugins() as $plugin) {
        if ($plugin->is_visible()) {
            $pluginareas = $plugin->get_file_areas();

            if ($pluginareas) {
                $areas = array_merge($areas, $pluginareas);
            }
        }
    }
    foreach ($sesiontareament->get_feedback_plugins() as $plugin) {
        if ($plugin->is_visible()) {
            $pluginareas = $plugin->get_file_areas();

            if ($pluginareas) {
                $areas = array_merge($areas, $pluginareas);
            }
        }
    }

    return $areas;
}

/**
 * File browsing support for sesiontarea module.
 *
 * @param file_browser $browser
 * @param object $areas
 * @param object $course
 * @param object $cm
 * @param object $context
 * @param string $filearea
 * @param int $itemid
 * @param string $filepath
 * @param string $filename
 * @return object file_info instance or null if not found
 */
function sesiontarea_get_file_info($browser,
                              $areas,
                              $course,
                              $cm,
                              $context,
                              $filearea,
                              $itemid,
                              $filepath,
                              $filename) {
    global $CFG;
    require_once($CFG->dirroot . '/mod/sesiontarea/locallib.php');

    if ($context->contextlevel != CONTEXT_MODULE) {
        return null;
    }

    $fs = get_file_storage();
    $filepath = is_null($filepath) ? '/' : $filepath;
    $filename = is_null($filename) ? '.' : $filename;

    // Need to find the plugin this belongs to.
    $sesiontareament = new sesiontarea($context, $cm, $course);
    $pluginowner = null;
    foreach ($sesiontareament->get_submission_plugins() as $plugin) {
        if ($plugin->is_visible()) {
            $pluginareas = $plugin->get_file_areas();

            if (array_key_exists($filearea, $pluginareas)) {
                $pluginowner = $plugin;
                break;
            }
        }
    }
    if (!$pluginowner) {
        foreach ($sesiontareament->get_feedback_plugins() as $plugin) {
            if ($plugin->is_visible()) {
                $pluginareas = $plugin->get_file_areas();

                if (array_key_exists($filearea, $pluginareas)) {
                    $pluginowner = $plugin;
                    break;
                }
            }
        }
    }

    if (!$pluginowner) {
        return null;
    }

    $result = $pluginowner->get_file_info($browser, $filearea, $itemid, $filepath, $filename);
    return $result;
}

/**
 * Prints the complete info about a user's interaction with an sesiontareament.
 *
 * @param stdClass $course
 * @param stdClass $user
 * @param stdClass $coursemodule
 * @param stdClass $sesiontarea the database sesiontarea record
 *
 * This prints the submission summary and feedback summary for this student.
 */
function sesiontarea_user_complete($course, $user, $coursemodule, $sesiontarea) {
    global $CFG;
    require_once($CFG->dirroot . '/mod/sesiontarea/locallib.php');

    $context = context_module::instance($coursemodule->id);

    $sesiontareament = new sesiontarea($context, $coursemodule, $course);

    echo $sesiontareament->view_student_summary($user, false);
}

/**
 * Print the grade information for the sesiontareament for this user.
 *
 * @param stdClass $course
 * @param stdClass $user
 * @param stdClass $coursemodule
 * @param stdClass $sesiontareament
 */
function sesiontarea_user_outline($course, $user, $coursemodule, $sesiontareament) {
    global $CFG;
    require_once($CFG->libdir.'/gradelib.php');
    require_once($CFG->dirroot.'/grade/grading/lib.php');

    $gradinginfo = grade_get_grades($course->id,
                                        'mod',
                                        'sesiontarea',
                                        $sesiontareament->id,
                                        $user->id);

    $gradingitem = $gradinginfo->items[0];
    $gradebookgrade = $gradingitem->grades[$user->id];

    if (empty($gradebookgrade->str_long_grade)) {
        return null;
    }
    $result = new stdClass();
    $result->info = get_string('outlinegrade', 'sesiontarea', $gradebookgrade->str_long_grade);
    $result->time = $gradebookgrade->dategraded;

    return $result;
}

/**
 * Obtains the automatic completion state for this module based on any conditions
 * in sesiontarea settings.
 *
 * @param object $course Course
 * @param object $cm Course-module
 * @param int $userid User ID
 * @param bool $type Type of comparison (or/and; can be used as return value if no conditions)
 * @return bool True if completed, false if not, $type if conditions not set.
 */
function sesiontarea_get_completion_state($course, $cm, $userid, $type) {
    global $CFG, $DB;
    require_once($CFG->dirroot . '/mod/sesiontarea/locallib.php');

    $sesiontarea = new sesiontarea(null, $cm, $course);

    // If completion option is enabled, evaluate it and return true/false.
    if ($sesiontarea->get_instance()->completionsubmit) {
        $dbparams = array('sesiontareament'=>$sesiontarea->get_instance()->id, 'userid'=>$userid);
        $submission = $DB->get_record('sesiontarea_submission', $dbparams, '*', IGNORE_MISSING);
        return $submission && $submission->status == SESIONTAREA_SUBMISSION_STATUS_SUBMITTED;
    } else {
        // Completion option is not enabled so just return $type.
        return $type;
    }
}
