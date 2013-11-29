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

require_once ('../../../config.php');
require_once($CFG->libdir . '/itse/lib.php');


$id = required_param('id', PARAM_INT);
$estado = required_param('estado', PARAM_INT);
$sesskey = required_param('sesskey', PARAM_TEXT);
$observaciones = optional_param('observaciones', '', PARAM_TEXT);

$PAGE->set_url('/course/format/unidades/confirma.php', array(
    'id' => $id,
    'estado' => $estado,
    'sesskey' => $sesskey
));

// This page should always redirect
require_login();

$unidad = $DB->get_record('course_unidades', array('id' => $id), '*', MUST_EXIST);
$course = $DB->get_record('course', array('id' => $unidad->nu_curso), '*', MUST_EXIST);

require_login($unidad->nu_curso);
$context = context_course::instance($course->id);


if (confirm_sesskey($sesskey))
{
    $accion = '';
    $cadena = '';
    $pre = 'Observaciones por ';
    switch ($estado)
    {
        case PLANEACION_APROBADA:
            $accion = 'aprobar';
            $cadena = 'confirma_aprobacion';
            require_capability('courseformat/unidades:aprobar', $context);
            break;
        case PLANEACION_RECHAZADA:
            $accion = 'rechazar';
            $cadena = 'confirma_rechazo';
            require_capability('courseformat/unidades:rechazar', $context);
            break;
        case PLANEACION_REVISADA:
            $accion = 'revisar';
            $pre .= 'revisión: ';
            $cadena = 'confirma_revision';
            require_capability('courseformat/unidades:revisar', $context);
            break;
        case PLANEACION_ENVIADA:
            $accion = 'enviar';
            $cadena = 'confirma_envio';
            require_capability('courseformat/unidades:enviar', $context);
            break;
    }

    $PAGE->set_title(get_string('accion_' . $accion, 'format_unidades'));
    $PAGE->set_heading($course->fullname);
    $PAGE->navbar->add(get_string('accion_' . $accion, 'format_unidades'));
    $PAGE->set_pagelayout('incourse');

    echo $OUTPUT->header();
    echo $OUTPUT->confirm(
        get_string($cadena, 'format_unidades') . "<p>$pre . $observaciones</p>", 
        new single_button(
            new moodle_url('/course/format/unidades/notificacion.php', array('id' => $id, 'estado' => $estado, 'observaciones' => $observaciones, 'sesskey' => $sesskey)), 
                get_string('continue'), 'post'), 
        new single_button(
            course_get_url($course), get_string('cancel'), 'get')
    );
    
    echo $OUTPUT->footer();
}