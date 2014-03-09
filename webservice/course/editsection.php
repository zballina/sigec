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
 * Edit the section basic information and availability
 *
 * @copyright 1999 Martin Dougiamas  http://dougiamas.com
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @package course
 */

require_once("../config.php");
require_once("lib.php");
require_once($CFG->libdir . '/formslib.php');
require_once($CFG->libdir . '/conditionlib.php');

$id = required_param('id', PARAM_INT);    // course_sections.id
$sectionreturn = optional_param('sr', 0, PARAM_INT);

$PAGE->set_url('/course/editsection.php', array('id'=>$id, 'sr'=> $sectionreturn));

$section = $DB->get_record('course_sections', array('id' => $id), '*', MUST_EXIST);
$course = $DB->get_record('course', array('id' => $section->course), '*', MUST_EXIST);
$sectionnum = $section->section;

require_login($course);
$context = context_course::instance($course->id);
require_capability('moodle/course:update', $context);

// Get section_info object with all availability options.
$sectioninfo = get_fast_modinfo($course)->get_section_info($sectionnum);

$format_curso = course_get_format($course->id)->get_format();
if ($format_curso == 'unidades')
{
    if (!$DB->record_exists('course_unidades', array('id' => $id)))
    {
        $unidad = new stdClass();
        $unidad->id = $id;
        $unidad->nu_curso = $course->id;
        $unidad->nu_unidad = $section->section;
        $unidad->caracterizacionformat = 1;
        $unidad->objetivocursoformat = 1;
        $unidad->caracterizacionformat = 1;
        $unidad->competenciaespecificaformat = 1;
        $unidad->competenciasgenericasformat = 1;
        $unidad->apoyosdidacticosformat = 1;
        $unidad->fuentesinformacionformat = 1;
        //		print_r($unidad);
        $DB->insert_record_raw('course_unidades', $unidad, false, false, true);
    }
}

$editoroptions = array(
    'context' => $context,
    'maxfiles' => EDITOR_UNLIMITED_FILES,
    'maxbytes' => $CFG->maxbytes,
    'trusttext' => false,
    'noclean' => true
);
// set current value, make an editable copy of section_info object
// this will retrieve all format-specific options as well

if ($format_curso == 'unidades')
{
    $unidad = $DB->get_record('course_unidades', array('id' => $id, 'nu_curso' => $course->id, 'nu_unidad' => $section->section), '*', MUST_EXIST);

    $mform = course_get_format($course->id)->editsection_form($PAGE->url, array(
        'cs' => $sectioninfo,
        'editoroptions' => $editoroptions,
        'unidad' => $unidad
    ));

    $mform->set_data(convert_to_array($unidad));
}
else
{
    $mform = course_get_format($course->id)->editsection_form($PAGE->url, array('cs' => $sectioninfo, 'editoroptions' => $editoroptions));
    // set current value, make an editable copy of section_info object
    // this will retrieve all format-specific options as well
$mform->set_data(convert_to_array($sectioninfo));
}

if ($mform->is_cancelled()){
    // Form cancelled, return to course.
    redirect(course_get_url($course, $section, array('sr' => $sectionreturn)));
}
else if ($data = $mform->get_data())
{
    if ($format_curso == 'unidades')
    {
        $DB->update_record('course_unidades', $data);
    }
    else
    {
        $DB->update_record('course_sections', $data);
    }

    rebuild_course_cache($course->id, true);
    if (isset($data->section)) {
        // Usually edit form does not change relative section number but just in case.
        $sectionnum = $data->section;
    }
    if (!empty($CFG->enableavailability)) {
        // Update grade and completion conditions.
        $sectioninfo = get_fast_modinfo($course)->get_section_info($sectionnum);
        condition_info_section::update_section_from_form($sectioninfo, $data);
        rebuild_course_cache($course->id, true);
    }
    course_get_format($course->id)->update_section_format_options($data);

    // Set section info, as this might not be present in form_data.
    if (!isset($data->section))  {
        $data->section = $sectionnum;
    }
    // Trigger an event for course section update.
    $event = \core\event\course_section_updated::create(
            array(
                'objectid' => $data->id,
                'courseid' => $course->id,
                'context' => $context,
                'other' => array('sectionnum' => $data->section)
            )
        );
    $event->trigger();

    $PAGE->navigation->clear_cache();
    redirect(course_get_url($course, $section, array('sr' => $sectionreturn)));
}

// The edit form is displayed for the first time or if there was validation error on the previous step.
$sectionname  = get_section_name($course, $sectionnum);
$stredit      = get_string('edita', '', " $sectionname");
$strsummaryof = get_string('summaryof', '', " $sectionname");

$PAGE->set_title($stredit);
$PAGE->set_heading($course->fullname);
$PAGE->navbar->add($stredit);
echo $OUTPUT->header();

echo $OUTPUT->heading($strsummaryof);

$mform->display();
echo $OUTPUT->footer();
