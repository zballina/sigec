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
 * This file contains functions used by the log reports
 *
 * This file is also required by /admin/reports/stats/index.php.
 *
 * @package    report
 * @subpackage stats
 * @copyright  1999 onwards Martin Dougiamas (http://dougiamas.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

/**
 * This function extends the navigation with the report items
 *
 * @param navigation_node $navigation The navigation node to extend
 * @param stdClass $course The course to object for the report
 * @param stdClass $context The context of the course
 */
function report_stats_extend_navigation_course($navigation, $course, $context) {
    global $CFG;
    if (empty($CFG->enablestats)) {
        return;
    }
    if (has_capability('report/stats:view', $context)) {
        $url = new moodle_url('/report/stats/index.php', array('course'=>$course->id));
        $navigation->add(get_string('pluginname', 'report_stats'), $url, navigation_node::TYPE_SETTING, null, null, new pix_icon('i/report', ''));
    }
}

/**
 * This function extends the course navigation with the report items
 *
 * @param navigation_node $navigation The navigation node to extend
 * @param stdClass $user
 * @param stdClass $course The course to object for the report
 */
function report_stats_extend_navigation_user($navigation, $user, $course) {
    global $CFG;
    if (empty($CFG->enablestats)) {
        return;
    }
    if (report_stats_can_access_user_report($user, $course)) {
        $url = new moodle_url('/report/stats/user.php', array('id'=>$user->id, 'course'=>$course->id));
        $navigation->add(get_string('stats'), $url);
    }
}

/**
 * Is current user allowed to access this report
 *
 * @private defined in lib.php for performance reasons
 *
 * @param stdClass $user
 * @param stdClass $course
 * @return bool
 */
function report_stats_can_access_user_report($user, $course) {
    global $USER;

    $coursecontext = context_course::instance($course->id);
    $personalcontext = context_user::instance($user->id);

    if (has_capability('report/stats:view', $coursecontext)) {
        return true;
    }

    if (has_capability('moodle/user:viewuseractivitiesreport', $personalcontext)) {
        if ($course->showreports and (is_viewing($coursecontext, $user) or is_enrolled($coursecontext, $user))) {
            return true;
        }

    } else if ($user->id == $USER->id) {
        if ($course->showreports and (is_viewing($coursecontext, $USER) or is_enrolled($coursecontext, $USER))) {
            return true;
        }
    }

    return false;
}

/**
 * Return a list of page types
 * @param string $pagetype current page type
 * @param stdClass $parentcontext Block's parent context
 * @param stdClass $currentcontext Current context of block
 * @return array
 */
function report_stats_page_type_list($pagetype, $parentcontext, $currentcontext) {
    $array = array(
        '*'                  => get_string('page-x', 'pagetype'),
        'report-*'           => get_string('page-report-x', 'pagetype'),
        'report-stats-*'     => get_string('page-report-stats-x',  'report_stats'),
        'report-stats-index' => get_string('page-report-stats-index',  'report_stats'),
        'report-stats-user'  => get_string('page-report-stats-user',  'report_stats')
    );
    return $array;
}