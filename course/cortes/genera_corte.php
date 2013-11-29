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
 * Moves, adds, updates, duplicates or deletes modules in a course
 *
 * @copyright 1999 Martin Dougiamas  http://dougiamas.com
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @package course
 */

require_once ('../../config.php');
require_once($CFG->dirroot . '/course/cortes/genera_corte_form.php');
require_once($CFG->libdir . '/itse/lib.php');
require_once($CFG->libdir . '/itse/reportes/corte_parcial.php');

$id = required_param('id', PARAM_INT);
$corte = required_param('corte', PARAM_INT);
$sesskey = required_param('sesskey', PARAM_TEXT);

$PAGE->set_url('/course/cortes/genera_corte.php', array(
    'id' => $id,
    'corte' => $corte,
    'sesskey' => $sesskey
));

// This page should always redirect
require_login();

$course = $DB->get_record('course', array('id' => $id), '*', MUST_EXIST);

require_login($course->id);
require_sesskey();
$context = context_course::instance($course->id);

if (confirm_sesskey($sesskey))
{
    require_capability('courseformat/cortes:generate', $context);

    $url = new moodle_url('/course/cortes/genera_corte_notificacion.php', array('id' => $id, 'corte' => $corte, 'sesskey' => $sesskey));

    $forma_genera_corte = new genera_corte_form($PAGE->url, array());

    if ($forma_genera_corte->is_cancelled())
    {
        redirect(course_get_url($course));
    }
    else if($data = $forma_genera_corte->get_data())
    {
        $reporte = new reporte_corte_parcial($course->id, $course->category, $corte, $data->desertores);
        $reporte->descargar();
    }        
    
    $PAGE->set_title(get_string('genera_corte', 'format_unidades'));
    $PAGE->set_heading($course->fullname);
    $PAGE->navbar->add(get_string('genera_corte', 'format_unidades'));
    $PAGE->set_pagelayout('incourse');

    echo $OUTPUT->header();
    $info = new reporte_corte_parcial($course->id, $course->category, $corte, 0);
    
    echo $info->generar();
    
    $forma_genera_corte->display();
    
    echo $OUTPUT->footer();
}