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
 * Define all the backup steps that will be used by the backup_sesiontarea_activity_task
 *
 * @package   mod_sesiontarea
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Define the complete choice structure for backup, with file and id annotations
 *
 * @package   mod_sesiontarea
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class backup_sesiontarea_activity_structure_step extends backup_activity_structure_step {

    /**
     * Define the structure for the sesiontarea activity
     * @return void
     */
    protected function define_structure() {

        // To know if we are including userinfo.
        $userinfo = $this->get_setting_value('userinfo');

        // Define each element separated.
        $sesiontarea = new backup_nested_element('sesiontarea', array('id'),
                                            array('name',
                                                  'intro',
                                                  'introformat',
                                                  'aprendizaje',
                                                  'aprendizajeformat',
                                                  'ensenanza',
                                                  'ensenanzaformat',
                                                  'portafolio',
                                                  'portafolioformat',
                                                  'alwaysshowdescription',
                                                  'submissiondrafts',
                                                  'sendnotifications',
                                                  'sendlatenotifications',
                                                  'duedate',
                                                  'cutoffdate',
                                                  'allowsubmissionsfromdate',
                                                  'grade',
                                                  'timemodified',
                                                  'completionsubmit',
                                                  'requiresubmissionstatement',
                                                  'teamsubmission',
                                                  'requireallteammemberssubmit',
                                                  'teamsubmissiongroupingid',
                                                  'blindmarking',
                                                  'revealidentities',
                                                  'attemptreopenmethod',
                                                  'maxattempts'));

        $programaciones = new backup_nested_element('programaciones');
        
        $programacion = new backup_nested_element('programacion', array('id'), array(
            'modulename', 'groupid', 'estado', 'fprogramada', 'hprogramada', 'freal', 'hreal', 
            'observaciones','observacionesformat'));

        $asistencias = new backup_nested_element('asistencias');
        
        $asistencia = new backup_nested_element('asistencia', array('id'), array(
            'modulename', 'teacher', 'groupid', 'fprogramada', 'freal', 'userid', 
            'asistio', 'observaciones'));
        
        $userflags = new backup_nested_element('userflags');

        $userflag = new backup_nested_element('userflag', array('id'),
                                                array('userid',
                                                      'sesiontareament',
                                                      'mailed',
                                                      'locked',
                                                      'extensionduedate'));

        $submissions = new backup_nested_element('submissions');

        $submission = new backup_nested_element('submission', array('id'),
                                                array('userid',
                                                      'timecreated',
                                                      'timemodified',
                                                      'status',
                                                      'groupid',
                                                      'attemptnumber'));

        $grades = new backup_nested_element('grades');

        $grade = new backup_nested_element('grade', array('id'),
                                           array('userid',
                                                 'timecreated',
                                                 'timemodified',
                                                 'grader',
                                                 'grade',
                                                 'attemptnumber'));

        $pluginconfigs = new backup_nested_element('plugin_configs');

        $pluginconfig = new backup_nested_element('plugin_config', array('id'),
                                                   array('plugin',
                                                         'subtype',
                                                         'name',
                                                         'value'));

        // Build the tree.
        $sesiontarea->add_child($userflags);
        $userflags->add_child($userflag);
        $sesiontarea->add_child($submissions);
        $submissions->add_child($submission);
        $sesiontarea->add_child($grades);
        $grades->add_child($grade);
        $sesiontarea->add_child($pluginconfigs);
        $pluginconfigs->add_child($pluginconfig);
        $sesiontarea->add_child($programaciones);
        $programaciones->add_child($programacion);
        $sesiontarea->add_child($asistencias);
        $asistencias->add_child($asistencia);

        // Define sources.
        $sesiontarea->set_source_table('sesiontarea', array('id' => backup::VAR_ACTIVITYID));
        $programacion->set_source_table('sesionclase_programacion', array('course' => backup::VAR_COURSEID, 
            'sesionclaseid' => backup::VAR_PARENTID,
            'modulename' => backup::VAR_MODNAME));
        $pluginconfig->set_source_table('sesiontarea_plugin_config',
                                        array('sesiontareament' => backup::VAR_PARENTID));

        if ($userinfo) 
        {
            $asistencia->set_source_table('sesionclase_asistencias', array('course' => backup::VAR_COURSEID, 
                'sesionclaseid' => backup::VAR_PARENTID,
                'modulename' => backup::VAR_MODNAME));
            $userflag->set_source_table('sesiontarea_user_flags',
                                     array('sesiontareament' => backup::VAR_PARENTID));

            $submission->set_source_table('sesiontarea_submission',
                                     array('sesiontareament' => backup::VAR_PARENTID));

            $grade->set_source_table('sesiontarea_grades',
                                     array('sesiontareament' => backup::VAR_PARENTID));

            // Support 2 types of subplugins.
            $this->add_subplugin_structure('sesiontareasubmission', $submission, true);
            $this->add_subplugin_structure('sesiontareafeedback', $grade, true);
        }

        // Define id annotations.
        $userflag->annotate_ids('user', 'userid');
        $submission->annotate_ids('user', 'userid');
        $submission->annotate_ids('group', 'groupid');
        $grade->annotate_ids('user', 'userid');
        $grade->annotate_ids('user', 'grader');
        $programacion->annotate_ids('group', 'groupid');
        $asistencia->annotate_ids('user', 'userid');
        $asistencia->annotate_ids('user', 'teacher');
        $asistencia->annotate_ids('group', 'groupid');
        $sesiontarea->annotate_ids('grouping', 'teamsubmissiongroupingid');

        // Define file annotations.
        // This file area hasn't itemid.
        $sesiontarea->annotate_files('mod_sesiontarea', 'intro', null);

        // Return the root element (choice), wrapped into standard activity structure.

        return $this->prepare_activity_structure($sesiontarea);
    }
}
