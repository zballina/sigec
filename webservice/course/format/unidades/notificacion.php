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
 * Duplicates a given course module
 *
 * The script backups and restores a single activity as if it was imported
 * from the same course, using the default import settings. The newly created
 * copy of the activity is then moved right below the original one.
 *
 * @package    core
 * @subpackage course
 * @copyright  2011 David Mudrak <david@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once ('../../../config.php');
require_once($CFG->libdir . '/itse/lib.php');
require_once($CFG->libdir . '/moodlelib.php');

$id = required_param('id', PARAM_INT);
$nu_unidad = required_param('unidad', PARAM_INT);
$sesskey = required_param('sesskey', PARAM_TEXT);
$estado = optional_param('estado', 9999, PARAM_INT);
$desbloquear_unidad = optional_param('desbloquear_unidad', 9999, PARAM_INT);
$observaciones = optional_param('observaciones', '', PARAM_TEXT);

$PAGE->set_url('/course/format/unidades/notificacion.php', array(
    'id' => $id,
    'unidad' => $nu_unidad,
    'sesskey' => $sesskey
));

$unidad = $DB->get_record('course_unidades', array('id' => $id), '*', MUST_EXIST);
$course = $DB->get_record('course', array('id' => $unidad->nu_curso), '*', MUST_EXIST);
$context = context_course::instance($course->id);

require_login($course);
require_sesskey();

if (confirm_sesskey($sesskey))
{
    if($nu_unidad == 0)
    {
        $accion = '';
        switch ($estado)
        {
            case PLANEACION_APROBADA:
                require_capability('courseformat/unidades:aprobar', $context);
                $accion = 'aprobar';
                $rs = $DB->get_recordset('course_unidades', array('nu_curso' => $unidad->nu_curso));
                foreach ($rs as $record) 
                {
                    $record->estado = $estado;
                    if($record->nu_unidad == 0)
                        $record->observaciones_revision = $observaciones;
                    $DB->update_record('course_unidades', $record);
                }

                $rs->close();
                break;
            case PLANEACION_RECHAZADA:
                require_capability('courseformat/unidades:rechazar', $context);
                $accion = 'rechazar';
                $rs = $DB->get_recordset('course_unidades', array('nu_curso' => $unidad->nu_curso));
                foreach ($rs as $record) 
                {
                    $record->estado = $estado;
                    if($record->nu_unidad == 0)
                        $record->observaciones_revision = $observaciones;
                    $DB->update_record('course_unidades', $record);
                }
                $rs->close();
                break;
            case PLANEACION_REVISADA:
                require_capability('courseformat/unidades:revisar', $context);
                $accion = 'revisar';
                $rs = $DB->get_recordset('course_unidades', array('nu_curso' => $unidad->nu_curso));
                foreach ($rs as $record) 
                {
                    $record->estado = $estado;
                    if($record->nu_unidad == 0)
                        $record->observaciones_revision = $observaciones;
                    $DB->update_record('course_unidades', $record);
                }
                $rs->close();
                break;
            case PLANEACION_ENVIADA:
                require_capability('courseformat/unidades:enviar', $context);
                $accion = 'enviar';
                $rs = $DB->get_recordset('course_unidades', array('nu_curso' => $unidad->nu_curso));
                foreach ($rs as $record) 
                {
                    $record->estado = $estado;
                    if($record->nu_unidad == 0)
                        $record->observaciones_revision = $observaciones;
                    $DB->update_record('course_unidades', $record);
                }

                if($users = get_users_from_config($CFG->courserequestnotify, 'moodle/site:approvecourse')) 
                {
                    $a = new stdClass;
                    $a->link = "$CFG->wwwroot/course/view.php?id=" . $course->id;
                    $a->user = fullname($USER);
                    $subject = 'Curso enviado para Aprobación';
                    $message = $course->fullname . " requiere la aprobación para generar "
                            . "la Planeación e Instrumentación Didáctica."
                            . " Por favor visite " . $a->link
                            . " que es la dirección del curso para realizar la revisión. $observaciones";
                    foreach ($users as $user) 
                    {
                        notificacion_email($user, $USER, 'courserequested', $subject, $message);
                    }
                }
                $rs->close();
                break;
        }
        $PAGE->set_title(get_string('accion_' . $accion, 'format_unidades'));
        $PAGE->set_heading($course->fullname);
        $PAGE->navbar->add(get_string('accion_' . $accion, 'format_unidades'));
        $PAGE->set_pagelayout('incourse');
    }
    else
    {
        require_capability('courseformat/unidades:cambiarestado', $context);
        $record = $DB->get_record('course_unidades', array('id' => $id, 'nu_curso' => $unidad->nu_curso), 
                '*', MUST_EXIST);        

        $PAGE->set_title(get_string('desbloquear_unidad', 'format_unidades'));
        $PAGE->set_heading($course->fullname);
        $PAGE->navbar->add(get_string('desbloquear_unidad', 'format_unidades'));
        $PAGE->set_pagelayout('incourse');

        $record->estado = $desbloquear_unidad > 0 ? PLANEACION_NOREALIZADA: PLANEACION_APROBADA;
        $record->observaciones_revision = $observaciones;
        $DB->update_record('course_unidades', $record);
    }

    echo $OUTPUT->header();
    echo $OUTPUT->notification(get_string('cambioexitoso', 'format_unidades'), 'notifysuccess');
    echo $OUTPUT->continue_button(course_get_url($course));

    echo $OUTPUT->footer();

}
