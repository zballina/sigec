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
 * Prints a particular instance of sesionclase
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod
 * @subpackage sesionclase
 * @copyright  2011 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
/// (Replace sesionclase with the name of your module and remove this line)

require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');
require_once(dirname(__FILE__) . '/lib.php');
require_once($CFG->libdir . '/itse/lib.php');

$id = optional_param('id', 0, PARAM_INT); // course_module ID, or
$n = optional_param('n', 0, PARAM_INT);  // sesionclase instance ID - it should be named as the first character of the module

if ($id)
{
    $cm = get_coursemodule_from_id('sesionclase', $id, 0, false, MUST_EXIST);
    $course = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $sesionclase = $DB->get_record('sesionclase', array('id' => $cm->instance), '*', MUST_EXIST);
}
elseif ($n)
{
    $sesionclase = $DB->get_record('sesionclase', array('id' => $n), '*', MUST_EXIST);
    $course = $DB->get_record('course', array('id' => $sesionclase->course), '*', MUST_EXIST);
    $cm = get_coursemodule_from_instance('sesionclase', $sesionclase->id, $course->id, false, MUST_EXIST);
}
else
{
    error('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);
$context = get_context_instance(CONTEXT_MODULE, $cm->id);

//print_r($course);
add_to_log($course->id, 'sesionclase', 'view', "view.php?id={$cm->id}", $sesionclase->name, $cm->id);

/// Print the page header

$PAGE->set_url('/mod/sesionclase/view.php', array('id' => $cm->id));
$PAGE->set_title(format_string($sesionclase->name));
$PAGE->set_heading(format_string($course->fullname));
$PAGE->set_context($context);

$sesion = new SesionClase($sesionclase->id, 'sesionclase', $cm->id);
$o = $sesion->display_selector_grupos($context);
$o .= $sesion->display($context);
$o .= $sesion->display_cerrar_actividad($context);
$o .= $sesion->display_asistencias($context);
// Output starts here
echo $OUTPUT->header();

echo $OUTPUT->box($o, 'generalbox mod_introbox', 'sesionclaseintro');

// Finish the page
echo $OUTPUT->footer();
