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
require_once($CFG->dirroot . '/course/apertura/nueva_materia_form.php');
require_once($CFG->libdir . '/itse/lib.php');


$nu_carrera = required_param('nu_carrera', PARAM_INT);


$PAGE->set_url('/course/apertura/nueva_materia.php', array(
    'nu_carrera' => $nu_carrera      
));

// This page should always redirect
//require_login();


$materias = $DB->get_record_sql('SELECT * FROM {itse_sigec_materias} WHERE carrera = ?', array(1), '*', MUST_EXIST);

if($materias == null){
    echo"No existen datos en la Base de datos.";
}  
 $forma_nueva_materia = new nueva_materia_form($PAGE->url, array($nu_carrera));

   if ($forma_nueva_materia->is_cancelled())
    {
       
       
    }
   else if($data = $forma_nueva_materia->get_data())
    {
        $record = new stdClass();
        $record->clave= $data->clave;
        $record->fullname = $data->fullname;
        $record->horas_teoricas = $data->horas_teoricas;
        $record->horas_practicas = $data->horas_practicas;
        $record->creditos = $data->creditos;
        $record->carrera = $nu_carrera;
        $record->semestre = $data->semestre;
        $DB->insert_record('itse_sigec_materias', $record, false);
        echo"Registro Exitoso";
        redirect('apertura.php?nu_carrera='.$nu_carrera);
    }        
    
    $PAGE->set_title('Apertura de Nueva Materia');
    $PAGE->set_heading();
    $PAGE->navbar->add('Apertura de Nueva Materia');
    $PAGE->set_pagelayout('incourse');

    echo $OUTPUT->header();
     
    $forma_nueva_materia->display();
    
    echo $OUTPUT->footer();
//}
