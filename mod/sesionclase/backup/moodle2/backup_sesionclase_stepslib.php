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
 * @package    mod
 * @subpackage sesionclase
 * @copyright  2013 onwards Francisco Ballina (stronk7) {@link http://www.moodle.itsescarcega.edu.mx}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Define all the backup steps that will be used by the backup_sesionclase_activity_task
 */

/**
 * Define the complete sesionclase structure for backup, with file and id annotations
 */
class backup_sesionclase_activity_structure_step extends backup_activity_structure_step {

    protected function define_structure() {

        // To know if we are including userinfo
        $userinfo = $this->get_setting_value('userinfo');

        // Define each element separated
        $sesionclase = new backup_nested_element('sesionclase', array('id'), array(
            'name', 'intro', 'introformat', 'nombre', 'aprendizaje', 'aprendizajeformat',
            'ensenanza', 'ensenanzaformat', 'portafolio', 'portafolioformat', 'timemodified'));

        $programaciones = new backup_nested_element('programaciones');
        
        $programacion = new backup_nested_element('programacion', array('id'), array(
            'modulename', 'groupid', 'estado', 'fprogramada', 'hprogramada', 'freal', 'hreal', 
            'observaciones','observacionesformat'));

        $asistencias = new backup_nested_element('asistencias');
        
        $asistencia = new backup_nested_element('asistencia', array('id'), array(
            'modulename', 'teacher', 'groupid', 'fprogramada', 'freal', 'userid', 
            'asistio', 'observaciones'));
        // Build the tree
        // (love this)
        $sesionclase->add_child($programaciones);
        $programaciones->add_child($programacion);
        $sesionclase->add_child($asistencias);
        $asistencias->add_child($asistencia);
        // Define sources
        $sesionclase->set_source_table('sesionclase', array('id' => backup::VAR_ACTIVITYID));
//        print_r(array('course' => backup::VAR_COURSEID, 
//            'coursemoduleid' => backup::VAR_MODID, 'sesionid' => backup::VAR_PARENTID));
        $programacion->set_source_table('sesionclase_programacion', array('course' => backup::VAR_COURSEID, 
            'sesionclaseid' => backup::VAR_PARENTID,
            'modulename' => backup::VAR_MODNAME));
        if ($userinfo) 
        {
            $asistencia->set_source_table('sesionclase_asistencias', array('course' => backup::VAR_COURSEID, 
                'sesionclaseid' => backup::VAR_PARENTID,
                'modulename' => backup::VAR_MODNAME));
        }
        // Define id annotations
        // (none)
        $programacion->annotate_ids('group', 'groupid');
        $asistencia->annotate_ids('user', 'userid');
        $asistencia->annotate_ids('user', 'teacher');
        $asistencia->annotate_ids('group', 'groupid');

        // Define file annotations
        $sesionclase->annotate_files('mod_sesionclase', 'intro', null); // This file area hasn't itemid

        // Return the root element (sesionclase), wrapped into standard activity structure
        return $this->prepare_activity_structure($sesionclase);
    }
}
