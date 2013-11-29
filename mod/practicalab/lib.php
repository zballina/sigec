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
 * This file contains the moodle hooks for the practicalab module.
 * It delegates most functions to the practicalabment class.
 *
 * @package   mod_practicalab
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/itse/lib.php');

/**
 * Adds an practicalabment instance
 *
 * This is done by calling the add_instance() method of the practicalabment type class
 * @param stdClass $data
 * @param mod_practicalab_mod_form $form
 * @return int The instance id of the new practicalabment
 */
function practicalab_add_instance(stdClass $data, mod_practicalab_mod_form $form = null) {
    global $CFG, $DB;
    require_once($CFG->dirroot . '/mod/practicalab/locallib.php');

    $context = context_module::instance($data->coursemodule);
    $practicalabment = new practicalab($context,  null, null);
    $id = $practicalabment->add_instance($data, true);

    $grupos = groups_get_all_groups($data->course);
    foreach ($grupos as $grupo)
    {
        $programacion = new stdClass();
        $programacion->course = $data->course;
        $programacion->modulename = 'practicalab';
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
 * delete an practicalabment instance
 * @param int $id
 * @return bool
 */
function practicalab_delete_instance($id) {
    global $CFG, $DB;
    require_once($CFG->dirroot . '/mod/practicalab/locallib.php');
    $cm = get_coursemodule_from_instance('practicalab', $id, 0, false, MUST_EXIST);
    $context = context_module::instance($cm->id);
    $course = $cm->course;
    $practicalabment = new practicalab($context, null, null);
    if($practicalabment->delete_instance())
    {
        $grupos = groups_get_all_groups($course);
        foreach ($grupos as $grupo)
        {
            $programa = $DB->get_record('sesionclase_programacion', array('course' => $course, 
                'modulename' => 'practicalab', 'sesionclaseid' => $id, 'groupid' => $grupo->id));
            $DB->delete_records('sesionclase_programacion', array('id' => $programa->id));
            $asistencias = $DB->get_records('sesionclase_asistencias', array('course' => $course, 
                'modulename' => 'practicalab', 'sesionclaseid' => $id, 'groupid' => $grupo->id));
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
 * This function will remove all practicalabment submissions and feedbacks in the database
 * and clean up any related data.
 * @param $data the data submitted from the reset course.
 * @return array status array
 */
function practicalab_reset_userdata($data) {
    global $CFG, $DB;
    require_once($CFG->dirroot . '/mod/practicalab/locallib.php');

    $status = array();
    $params = array('courseid'=>$data->courseid);
    $sql = "SELECT a.id FROM {practicalab} a WHERE a.course=:courseid";
    $course = $DB->get_record('course', array('id'=>$data->courseid), '*', MUST_EXIST);
    if ($practicalabs = $DB->get_records_sql($sql, $params)) {
        foreach ($practicalabs as $practicalab) {
            $cm = get_coursemodule_from_instance('practicalab',
                                                 $practicalab->id,
                                                 $data->courseid,
                                                 false,
                                                 MUST_EXIST);
            $context = context_module::instance($cm->id);
            $practicalabment = new practicalab($context, $cm, $course);
            $status = array_merge($status, $practicalabment->reset_userdata($data));
        }
    }
    return $status;
}

/**
 * Removes all grades from gradebook
 *
 * @param int $courseid The ID of the course to reset
 * @param string $type Optional type of practicalabment to limit the reset to a particular practicalabment type
 */
function practicalab_reset_gradebook($courseid, $type='') {
    global $CFG, $DB;

    $params = array('moduletype'=>'practicalab', 'courseid'=>$courseid);
    $sql = 'SELECT a.*, cm.idnumber as cmidnumber, a.course as courseid
            FROM {practicalab} a, {course_modules} cm, {modules} m
            WHERE m.name=:moduletype AND m.id=cm.module AND cm.instance=a.id AND a.course=:courseid';

    if ($practicalabments = $DB->get_records_sql($sql, $params)) {
        foreach ($practicalabments as $practicalabment) {
            practicalab_grade_item_update($practicalabment, 'reset');
        }
    }
}

/**
 * Implementation of the function for printing the form elements that control
 * whether the course reset functionality affects the practicalabment.
 * @param $mform form passed by reference
 */
function practicalab_reset_course_form_definition(&$mform) {
    $mform->addElement('header', 'practicalabheader', get_string('modulenameplural', 'practicalab'));
    $name = get_string('deleteallsubmissions', 'practicalab');
    $mform->addElement('advcheckbox', 'reset_practicalab_submissions', $name);
}

/**
 * Course reset form defaults.
 * @param  object $course
 * @return array
 */
function practicalab_reset_course_form_defaults($course) {
    return array('reset_practicalab_submissions'=>1);
}

/**
 * Update an practicalabment instance
 *
 * This is done by calling the update_instance() method of the practicalabment type class
 * @param stdClass $data
 * @param $form
 * @return object
 */
function practicalab_update_instance(stdClass $sesionclase, $form) {
    global $CFG, $DB;
    require_once($CFG->dirroot . '/mod/practicalab/locallib.php');
    $context = context_module::instance($sesionclase->coursemodule);
    $sesion = new SesionClase($sesionclase->instance, $sesionclase->modulename, $sesionclase->coursemodule);
    $practicalabment = new practicalab($context,  null, null);
    $id = $practicalabment->update_instance($sesionclase);
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
function practicalab_supports($feature) {
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
function practicalab_grading_areas_list() {
    return array('submissions'=>get_string('submissions', 'practicalab'));
}

/**
 * extend an assigment navigation settings
 *
 * @param settings_navigation $settings
 * @param navigation_node $navref
 * @return void
 */
 function practicalab_extend_settings_navigation(settings_navigation $settings, navigation_node $navref) {
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
        $linkname = get_string('viewgradebook', 'practicalab');
        $node = $navref->add($linkname, $link, navigation_node::TYPE_SETTING);
    }

    // Link to download all submissions.
    if (has_capability('mod/practicalab:grade', $context)) {
        $link = new moodle_url('/mod/practicalab/view.php', array('id' => $cm->id, 'action'=>'grading'));
        $node = $navref->add(get_string('viewgrading', 'practicalab'), $link, navigation_node::TYPE_SETTING);

        $link = new moodle_url('/mod/practicalab/view.php', array('id' => $cm->id, 'action'=>'downloadall'));
        $node = $navref->add(get_string('downloadall', 'practicalab'), $link, navigation_node::TYPE_SETTING);
    }

    if (has_capability('mod/practicalab:revealidentities', $context)) {
        $dbparams = array('id'=>$cm->instance);
        $practicalabment = $DB->get_record('practicalab', $dbparams, 'blindmarking, revealidentities');

        if ($practicalabment && $practicalabment->blindmarking && !$practicalabment->revealidentities) {
            $urlparams = array('id' => $cm->id, 'action'=>'revealidentities');
            $url = new moodle_url('/mod/practicalab/view.php', $urlparams);
            $linkname = get_string('revealidentities', 'practicalab');
            $node = $navref->add($linkname, $url, navigation_node::TYPE_SETTING);
        }
    }
    $nodo = $navref->get('modedit');
    if($nodo != null)
        $nodo->remove();    
}

/**
 * Add a get_coursemodule_info function in case any practicalabment type wants to add 'extra' information
 * for the course (see resource).
 *
 * Given a course_module object, this function returns any "extra" information that may be needed
 * when printing this activity in a course listing.  See get_array_of_activities() in course/lib.php.
 *
 * @param stdClass $coursemodule The coursemodule object (record).
 * @return cached_cm_info An object on information that the courses
 *                        will know about (most noticeably, an icon).
 */
function practicalab_get_coursemodule_info($coursemodule) {
    global $CFG, $DB;

    $dbparams = array('id'=>$coursemodule->instance);
    $fields = 'id, name, alwaysshowdescription, allowsubmissionsfromdate, intro, introformat';
    if (! $practicalabment = $DB->get_record('practicalab', $dbparams, $fields)) {
        return false;
    }

    $result = new cached_cm_info();
    $result->name = $practicalabment->name;
    if ($coursemodule->showdescription) 
    {
        if ($practicalabment->alwaysshowdescription || time() > $practicalabment->allowsubmissionsfromdate) 
        {
            // Convert intro to html. Do not filter cached version, filters run at display time.
            $result->content = format_module_intro('practicalab', $practicalabment, $coursemodule->id, false);
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
function practicalab_page_type_list($pagetype, $parentcontext, $currentcontext) {
    $module_pagetype = array(
        'mod-practicalab-*' => get_string('page-mod-practicalab-x', 'practicalab'),
        'mod-practicalab-view' => get_string('page-mod-practicalab-view', 'practicalab'),
    );
    return $module_pagetype;
}

/**
 * Print an overview of all practicalabments
 * for the courses.
 *
 * @param mixed $courses The list of courses to print the overview for
 * @param array $htmlarray The array of html to return
 */
function practicalab_print_overview($courses, &$htmlarray) {
    global $USER, $CFG, $DB;

    if (empty($courses) || !is_array($courses) || count($courses) == 0) {
        return array();
    }

    if (!$practicalabments = get_all_instances_in_courses('practicalab', $courses)) {
        return;
    }

    $practicalabmentids = array();

    // Do practicalabment_base::isopen() here without loading the whole thing for speed.
    foreach ($practicalabments as $key => $practicalabment) {
        $time = time();
        $isopen = false;
        if ($practicalabment->duedate) {
            $duedate = false;
            if ($practicalabment->cutoffdate) {
                $duedate = $practicalabment->cutoffdate;
            }
            if ($duedate) {
                $isopen = ($practicalabment->allowsubmissionsfromdate <= $time && $time <= $duedate);
            } else {
                $isopen = ($practicalabment->allowsubmissionsfromdate <= $time);
            }
        }
        if ($isopen) {
            $practicalabmentids[] = $practicalabment->id;
        }
    }

    if (empty($practicalabmentids)) {
        // No practicalabments to look at - we're done.
        return true;
    }

    // Definitely something to print, now include the constants we need.
    require_once($CFG->dirroot . '/mod/practicalab/locallib.php');

    $strduedate = get_string('duedate', 'practicalab');
    $strcutoffdate = get_string('nosubmissionsacceptedafter', 'practicalab');
    $strnolatesubmissions = get_string('nolatesubmissions', 'practicalab');
    $strduedateno = get_string('duedateno', 'practicalab');
    $strduedateno = get_string('duedateno', 'practicalab');
    $strgraded = get_string('graded', 'practicalab');
    $strnotgradedyet = get_string('notgradedyet', 'practicalab');
    $strnotsubmittedyet = get_string('notsubmittedyet', 'practicalab');
    $strsubmitted = get_string('submitted', 'practicalab');
    $strpracticalabment = get_string('modulename', 'practicalab');
    $strreviewed = get_string('reviewed', 'practicalab');

    // We do all possible database work here *outside* of the loop to ensure this scales.
    list($sqlpracticalabmentids, $practicalabmentidparams) = $DB->get_in_or_equal($practicalabmentids);

    $mysubmissions = null;
    $unmarkedsubmissions = null;

    foreach ($practicalabments as $practicalabment) {
        // Do not show practicalabments that are not open.
        if (!in_array($practicalabment->id, $practicalabmentids)) {
            continue;
        }
        $dimmedclass = '';
        if (!$practicalabment->visible) {
            $dimmedclass = ' class="dimmed"';
        }
        $href = $CFG->wwwroot . '/mod/practicalab/view.php?id=' . $practicalabment->coursemodule;
        $str = '<div class="practicalab overview">' .
               '<div class="name">' .
               $strpracticalabment . ': '.
               '<a ' . $dimmedclass .
                   'title="' . $strpracticalabment . '" ' .
                   'href="' . $href . '">' .
               format_string($practicalabment->name) .
               '</a></div>';
        if ($practicalabment->duedate) {
            $userdate = userdate($practicalabment->duedate);
            $str .= '<div class="info">' . $strduedate . ': ' . $userdate . '</div>';
        } else {
            $str .= '<div class="info">' . $strduedateno . '</div>';
        }
        if ($practicalabment->cutoffdate) {
            if ($practicalabment->cutoffdate == $practicalabment->duedate) {
                $str .= '<div class="info">' . $strnolatesubmissions . '</div>';
            } else {
                $userdate = userdate($practicalabment->cutoffdate);
                $str .= '<div class="info">' . $strcutoffdate . ': ' . $userdate . '</div>';
            }
        }
        $context = context_module::instance($practicalabment->coursemodule);
        if (has_capability('mod/practicalab:grade', $context)) {
            if (!isset($unmarkedsubmissions)) {
                // Build up and array of unmarked submissions indexed by practicalabment id/ userid
                // for use where the user has grading rights on practicalabment.
                $dbparams = array_merge(array(PRACTICALAB_SUBMISSION_STATUS_SUBMITTED), $practicalabmentidparams);
                $rs = $DB->get_recordset_sql('SELECT
                                                  s.practicalabment as practicalabment,
                                                  s.userid as userid,
                                                  s.id as id,
                                                  s.status as status,
                                                  g.timemodified as timegraded
                                              FROM {practicalab_submission} s
                                              LEFT JOIN {practicalab_grades} g ON
                                                  s.userid = g.userid AND
                                                  s.practicalabment = g.practicalabment
                                              WHERE
                                                  ( g.timemodified is NULL OR
                                                  s.timemodified > g.timemodified ) AND
                                                  s.timemodified IS NOT NULL AND
                                                  s.status = ? AND
                                                  s.practicalabment ' . $sqlpracticalabmentids, $dbparams);

                $unmarkedsubmissions = array();
                foreach ($rs as $rd) {
                    $unmarkedsubmissions[$rd->practicalabment][$rd->userid] = $rd->id;
                }
                $rs->close();
            }

            // Count how many people can submit.
            $submissions = 0;
            if ($students = get_enrolled_users($context, 'mod/practicalab:view', 0, 'u.id')) {
                foreach ($students as $student) {
                    if (isset($unmarkedsubmissions[$practicalabment->id][$student->id])) {
                        $submissions++;
                    }
                }
            }

            if ($submissions) {
                $urlparams = array('id'=>$practicalabment->coursemodule, 'action'=>'grading');
                $url = new moodle_url('/mod/practicalab/view.php', $urlparams);
                $str .= '<div class="details">' .
                        '<a href="' . $url . '">' .
                        get_string('submissionsnotgraded', 'practicalab', $submissions) .
                        '</a></div>';
            }
        }
        if (has_capability('mod/practicalab:submit', $context)) {
            if (!isset($mysubmissions)) {
                // Get all user submissions, indexed by practicalabment id.
                $dbparams = array_merge(array($USER->id, $USER->id), $practicalabmentidparams);
                $mysubmissions = $DB->get_records_sql('SELECT
                                                           a.id AS practicalabment,
                                                           a.nosubmissions AS nosubmissions,
                                                           g.timemodified AS timemarked,
                                                           g.grader AS grader,
                                                           g.grade AS grade,
                                                           s.status AS status
                                                       FROM {practicalab} a
                                                       LEFT JOIN {practicalab_grades} g ON
                                                           g.practicalabment = a.id AND
                                                           g.userid = ?
                                                       LEFT JOIN {practicalab_submission} s ON
                                                           s.practicalabment = a.id AND
                                                           s.userid = ?
                                                       WHERE a.id ' . $sqlpracticalabmentids, $dbparams);
            }

            $str .= '<div class="details">';
            $str .= get_string('mysubmission', 'practicalab');
            $submission = $mysubmissions[$practicalabment->id];
            if ($submission->nosubmissions) {
                $str .= get_string('offline', 'practicalab');
            } else if (!$submission->status || $submission->status == 'draft') {
                $str .= $strnotsubmittedyet;
            } else {
                $str .= get_string('submissionstatus_' . $submission->status, 'practicalab');
            }
            if (!$submission->grade || $submission->grade < 0) {
                $str .= ', ' . get_string('notgraded', 'practicalab');
            } else {
                $str .= ', ' . get_string('graded', 'practicalab');
            }
            $str .= '</div>';
        }
        $str .= '</div>';
        if (empty($htmlarray[$practicalabment->course]['practicalab'])) {
            $htmlarray[$practicalabment->course]['practicalab'] = $str;
        } else {
            $htmlarray[$practicalabment->course]['practicalab'] .= $str;
        }
    }
}

/**
 * Print recent activity from all practicalabments in a given course
 *
 * This is used by the recent activity block
 * @param mixed $course the course to print activity for
 * @param bool $viewfullnames boolean to determine whether to show full names or not
 * @param int $timestart the time the rendering started
 */
function practicalab_print_recent_activity($course, $viewfullnames, $timestart) {
    global $CFG, $USER, $DB, $OUTPUT;

    // Do not use log table if possible, it may be huge.

    $dbparams = array($timestart, $course->id, 'practicalab');
    if (!$submissions = $DB->get_records_sql('SELECT asb.id, asb.timemodified, cm.id AS cmid, asb.userid,
                                                     u.firstname, u.lastname, u.email, u.picture
                                                FROM {practicalab_submission} asb
                                                     JOIN {practicalab} a      ON a.id = asb.practicalabment
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

    $showrecentsubmissions = get_config('mod_practicalab', 'showrecentsubmissions');

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
        // The act of submitting of practicalabment may be considered private -
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

    echo $OUTPUT->heading(get_string('newsubmissions', 'practicalab').':', 3);

    foreach ($show as $submission) {
        $cm = $modinfo->get_cm($submission->cmid);
        $link = $CFG->wwwroot.'/mod/practicalab/view.php?id='.$cm->id;
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
 * Returns all practicalabments since a given time.
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
function practicalab_get_recent_mod_activity(&$activities,
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
                                             '  FROM {practicalab_submission} asb
                                                JOIN {practicalab} a ON a.id = asb.practicalabment
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

    $showrecentsubmissions = get_config('mod_practicalab', 'showrecentsubmissions');
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
        // The act of submitting of practicalabment may be considered private -
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
        $grades = grade_get_grades($courseid, 'mod', 'practicalab', $cm->instance, $userids);
    }

    $aname = format_string($cm->name, true);
    foreach ($show as $submission) {
        $activity = new stdClass();

        $activity->type         = 'practicalab';
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
 * Print recent activity from all practicalabments in a given course
 *
 * This is used by course/recent.php
 * @param stdClass $activity
 * @param int $courseid
 * @param bool $detail
 * @param array $modnames
 */
function practicalab_print_recent_mod_activity($activity, $courseid, $detail, $modnames) {
    global $CFG, $OUTPUT;

    echo '<table border="0" cellpadding="3" cellspacing="0" class="practicalabment-recent">';

    echo '<tr><td class="userpicture" valign="top">';
    echo $OUTPUT->user_picture($activity->user);
    echo '</td><td>';

    if ($detail) {
        $modname = $modnames[$activity->type];
        echo '<div class="title">';
        echo '<img src="' . $OUTPUT->pix_url('icon', 'practicalab') . '" '.
             'class="icon" alt="' . $modname . '">';
        echo '<a href="' . $CFG->wwwroot . '/mod/practicalab/view.php?id=' . $activity->cmid . '">';
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
 * Checks if a scale is being used by an practicalabment.
 *
 * This is used by the backup code to decide whether to back up a scale
 * @param int $practicalabmentid
 * @param int $scaleid
 * @return boolean True if the scale is used by the practicalabment
 */
function practicalab_scale_used($practicalabmentid, $scaleid) {
    global $DB;

    $return = false;
    $rec = $DB->get_record('practicalab', array('id'=>$practicalabmentid, 'grade'=>-$scaleid));

    if (!empty($rec) && !empty($scaleid)) {
        $return = true;
    }

    return $return;
}

/**
 * Checks if scale is being used by any instance of practicalabment
 *
 * This is used to find out if scale used anywhere
 * @param int $scaleid
 * @return boolean True if the scale is used by any practicalabment
 */
function practicalab_scale_used_anywhere($scaleid) {
    global $DB;

    if ($scaleid and $DB->record_exists('practicalab', array('grade'=>-$scaleid))) {
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
function practicalab_get_view_actions() {
    return array('view submission', 'view feedback');
}

/**
 * List the actions that correspond to a post of this module.
 * This is used by the participation report.
 * @return array
 */
function practicalab_get_post_actions() {
    return array('upload', 'submit', 'submit for grading');
}

/**
 * Call cron on the practicalab module.
 */
function practicalab_cron() {
    global $CFG;

    require_once($CFG->dirroot . '/mod/practicalab/locallib.php');
    practicalab::cron();

    $plugins = get_plugin_list('practicalabsubmission');

    foreach ($plugins as $name => $plugin) {
        $disabled = get_config('practicalabsubmission_' . $name, 'disabled');
        if (!$disabled) {
            $class = 'practicalab_submission_' . $name;
            require_once($CFG->dirroot . '/mod/practicalab/submission/' . $name . '/locallib.php');
            $class::cron();
        }
    }
    $plugins = get_plugin_list('practicalabfeedback');

    foreach ($plugins as $name => $plugin) {
        $disabled = get_config('practicalabfeedback_' . $name, 'disabled');
        if (!$disabled) {
            $class = 'practicalab_feedback_' . $name;
            require_once($CFG->dirroot . '/mod/practicalab/feedback/' . $name . '/locallib.php');
            $class::cron();
        }
    }
}

/**
 * Returns all other capabilities used by this module.
 * @return array Array of capability strings
 */
function practicalab_get_extra_capabilities() {
    return array('gradereport/grader:view',
                 'moodle/grade:viewall',
                 'moodle/site:viewfullnames',
                 'moodle/site:config');
}

/**
 * Create grade item for given practicalabment.
 *
 * @param stdClass $practicalab record with extra cmidnumber
 * @param array $grades optional array/object of grade(s); 'reset' means reset grades in gradebook
 * @return int 0 if ok, error code otherwise
 */
function practicalab_grade_item_update($practicalab, $grades=null) {
    global $CFG;
    require_once($CFG->libdir.'/gradelib.php');

    if (!isset($practicalab->courseid)) {
        $practicalab->courseid = $practicalab->course;
    }

    $params = array('itemname'=>$practicalab->name, 'idnumber'=>$practicalab->cmidnumber);

    if ($practicalab->grade > 0) {
        $params['gradetype'] = GRADE_TYPE_VALUE;
        $params['grademax']  = $practicalab->grade;
        $params['grademin']  = 0;

    } else if ($practicalab->grade < 0) {
        $params['gradetype'] = GRADE_TYPE_SCALE;
        $params['scaleid']   = -$practicalab->grade;

    } else {
        // Allow text comments only.
        $params['gradetype'] = GRADE_TYPE_TEXT;
    }

    if ($grades  === 'reset') {
        $params['reset'] = true;
        $grades = null;
    }

    return grade_update('mod/practicalab',
                        $practicalab->courseid,
                        'mod',
                        'practicalab',
                        $practicalab->id,
                        0,
                        $grades,
                        $params);
}

/**
 * Return grade for given user or all users.
 *
 * @param stdClass $practicalab record of practicalab with an additional cmidnumber
 * @param int $userid optional user id, 0 means all users
 * @return array array of grades, false if none
 */
function practicalab_get_user_grades($practicalab, $userid=0) {
    global $CFG;

    require_once($CFG->dirroot . '/mod/practicalab/locallib.php');

    $cm = get_coursemodule_from_instance('practicalab', $practicalab->id, 0, false, MUST_EXIST);
    $context = context_module::instance($cm->id);
    $practicalabment = new practicalab($context, null, null);
    $practicalabment->set_instance($practicalab);
    return $practicalabment->get_user_grades_for_gradebook($userid);
}

/**
 * Update activity grades.
 *
 * @param stdClass $practicalab database record
 * @param int $userid specific user only, 0 means all
 * @param bool $nullifnone - not used
 */
function practicalab_update_grades($practicalab, $userid=0, $nullifnone=true) {
    global $CFG;
    require_once($CFG->libdir.'/gradelib.php');

    if ($practicalab->grade == 0) {
        practicalab_grade_item_update($practicalab);

    } else if ($grades = practicalab_get_user_grades($practicalab, $userid)) {
        foreach ($grades as $k => $v) {
            if ($v->rawgrade == -1) {
                $grades[$k]->rawgrade = null;
            }
        }
        practicalab_grade_item_update($practicalab, $grades);

    } else {
        practicalab_grade_item_update($practicalab);
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
function practicalab_get_file_areas($course, $cm, $context) {
    global $CFG;
    require_once($CFG->dirroot . '/mod/practicalab/locallib.php');
    $areas = array();

    $practicalabment = new practicalab($context, $cm, $course);
    foreach ($practicalabment->get_submission_plugins() as $plugin) {
        if ($plugin->is_visible()) {
            $pluginareas = $plugin->get_file_areas();

            if ($pluginareas) {
                $areas = array_merge($areas, $pluginareas);
            }
        }
    }
    foreach ($practicalabment->get_feedback_plugins() as $plugin) {
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
 * File browsing support for practicalab module.
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
function practicalab_get_file_info($browser,
                              $areas,
                              $course,
                              $cm,
                              $context,
                              $filearea,
                              $itemid,
                              $filepath,
                              $filename) {
    global $CFG;
    require_once($CFG->dirroot . '/mod/practicalab/locallib.php');

    if ($context->contextlevel != CONTEXT_MODULE) {
        return null;
    }

    $fs = get_file_storage();
    $filepath = is_null($filepath) ? '/' : $filepath;
    $filename = is_null($filename) ? '.' : $filename;

    // Need to find the plugin this belongs to.
    $practicalabment = new practicalab($context, $cm, $course);
    $pluginowner = null;
    foreach ($practicalabment->get_submission_plugins() as $plugin) {
        if ($plugin->is_visible()) {
            $pluginareas = $plugin->get_file_areas();

            if (array_key_exists($filearea, $pluginareas)) {
                $pluginowner = $plugin;
                break;
            }
        }
    }
    if (!$pluginowner) {
        foreach ($practicalabment->get_feedback_plugins() as $plugin) {
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
 * Prints the complete info about a user's interaction with an practicalabment.
 *
 * @param stdClass $course
 * @param stdClass $user
 * @param stdClass $coursemodule
 * @param stdClass $practicalab the database practicalab record
 *
 * This prints the submission summary and feedback summary for this student.
 */
function practicalab_user_complete($course, $user, $coursemodule, $practicalab) {
    global $CFG;
    require_once($CFG->dirroot . '/mod/practicalab/locallib.php');

    $context = context_module::instance($coursemodule->id);

    $practicalabment = new practicalab($context, $coursemodule, $course);

    echo $practicalabment->view_student_summary($user, false);
}

/**
 * Print the grade information for the practicalabment for this user.
 *
 * @param stdClass $course
 * @param stdClass $user
 * @param stdClass $coursemodule
 * @param stdClass $practicalabment
 */
function practicalab_user_outline($course, $user, $coursemodule, $practicalabment) {
    global $CFG;
    require_once($CFG->libdir.'/gradelib.php');
    require_once($CFG->dirroot.'/grade/grading/lib.php');

    $gradinginfo = grade_get_grades($course->id,
                                        'mod',
                                        'practicalab',
                                        $practicalabment->id,
                                        $user->id);

    $gradingitem = $gradinginfo->items[0];
    $gradebookgrade = $gradingitem->grades[$user->id];

    if (empty($gradebookgrade->str_long_grade)) {
        return null;
    }
    $result = new stdClass();
    $result->info = get_string('outlinegrade', 'practicalab', $gradebookgrade->str_long_grade);
    $result->time = $gradebookgrade->dategraded;

    return $result;
}

/**
 * Obtains the automatic completion state for this module based on any conditions
 * in practicalab settings.
 *
 * @param object $course Course
 * @param object $cm Course-module
 * @param int $userid User ID
 * @param bool $type Type of comparison (or/and; can be used as return value if no conditions)
 * @return bool True if completed, false if not, $type if conditions not set.
 */
function practicalab_get_completion_state($course, $cm, $userid, $type) {
    global $CFG, $DB;
    require_once($CFG->dirroot . '/mod/practicalab/locallib.php');

    $practicalab = new practicalab(null, $cm, $course);

    // If completion option is enabled, evaluate it and return true/false.
    if ($practicalab->get_instance()->completionsubmit) {
        $dbparams = array('practicalabment'=>$practicalab->get_instance()->id, 'userid'=>$userid);
        $submission = $DB->get_record('practicalab_submission', $dbparams, '*', IGNORE_MISSING);
        return $submission && $submission->status == PRACTICALAB_SUBMISSION_STATUS_SUBMITTED;
    } else {
        // Completion option is not enabled so just return $type.
        return $type;
    }
}
