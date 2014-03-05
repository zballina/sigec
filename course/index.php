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
 * Lists the course categories
 *
 * @copyright 1999 Martin Dougiamas  http://dougiamas.com
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @package course
 */
require_once("../config.php");
require_once($CFG->dirroot . '/course/lib.php');
require_once($CFG->libdir  . '/itse/carreras/periodos_form.php');
require_once($CFG->libdir  . '/itse/carreras/periodoactual_form.php');
//require_once($CFG->libdir  . '/itse/carreras/semanas_form.php');
require_once($CFG->libdir  . '/itse/carreras/periodos_cortes_form.php');
require_once($CFG->libdir . '/coursecatlib.php');

$categoryid = optional_param('categoryid', 0, PARAM_INT); // Category id
$site = get_site();

if ($categoryid)
{
    $PAGE->set_category_by_id($categoryid);
    $PAGE->set_url(new moodle_url('/course/index.php', array('categoryid' => $categoryid)));
    $PAGE->set_pagetype('course-index-category');
    // And the object has been loaded for us no need for another DB call
    $category = $PAGE->category;
}
else
{
    $categoryid = 0;
    $PAGE->set_url('/course/index.php');
    $PAGE->set_context(context_system::instance());
}

$PAGE->set_pagelayout('coursecategory');
$courserenderer = $PAGE->get_renderer('core', 'course');

$PAGE->navigation->add('Apertura', '/course/apertura/apertura.php?nu_carrera='.$categoryid, navigation_node::TYPE_COURSE);
 
if ($CFG->forcelogin)
{
    require_login();
}

if ($categoryid && !$category->visible && !has_capability('moodle/category:viewhiddencategories', $PAGE->context))
{
    throw new moodle_exception('unknowncategory');
}

$PAGE->set_heading($site->fullname);
$content = $courserenderer->course_category($categoryid);

if ($categoryid != 0)
{
    $syscontext = context_system::instance();

    if(has_capability('moodle/category:manage', $syscontext))
    {
        $PAGE->navigation->add('Informe Uso Moodle Docentes', Botones_Descarga::boton_cursos_estadisticas_docentes($categoryid), navigation_node::TYPE_SETTING);
    }
    
    $context = context_coursecat::instance($categoryid);

    if(has_capability('courseformat/semanas:agregar', $context))
    {
        $PAGE->navigation->add('Semanas', Botones_Descarga::boton_cursos_estadisticas_docentes($categoryid), navigation_node::TYPE_SETTING);
    }

    
    $forma_periodos = new periodos_form($PAGE->url, array(
        'context' => $context,
        'category' => $category
        )
    );

    $forma_periodoactual = new periodoactual_form($PAGE->url, array(
        'context' => $context,
        'category' => $category
    ));

    if($DB->record_exists('course_periodos', array('nu_carrera' => $categoryid, 'actual' => 1)))
    {
        $periodo_actual = $DB->get_record('course_periodos', array('nu_carrera' => $categoryid, 'actual' => 1), '*', MUST_EXIST);
     //   $forma_semanas = new semanas_form($PAGE->url, array(
      //      'context' => $context,
      //      'nu_carrera' => $periodo_actual->nu_carrera,
     //       'nu_periodo' => $periodo_actual->id
     //   ));    
        $forma_cortes = new periodos_cortes_form ($PAGE->url, array(
            'context' => $context,
            'nu_carrera' => $periodo_actual->nu_carrera,
            'nu_periodo' => $periodo_actual->id
        ));    
    }
}

if ($categoryid != 0)
{
    $context = context_coursecat::instance($categoryid);

    if (has_capability('courseformat/periodos:agregar', $context))
    {
        if ($data = $forma_periodos->get_data())
        {
            $DB->insert_record('course_periodos', $data);
            redirect(new moodle_url('/course/index.php', array('categoryid' => $categoryid)));
        }
    }
    if (has_capability('courseformat/periodos:editar', $context))
    {
        if ($dataactual = $forma_periodoactual->get_data())
        {
            foreach ($dataactual as $key => $value)
            {
                $DB->update_record('course_periodos', $value);
            }

            redirect(new moodle_url('/course/index.php', array('categoryid' => $categoryid)));
        }
    }
    if (has_capability('courseformat/semanas:editar', $context))
    {
        if($DB->record_exists('course_periodos', array('nu_carrera' => $categoryid, 'actual' => 1)))
        {
            if ($dataactual = $forma_semanas->get_data())
            {
                foreach ($dataactual->semanas as $semana)
                {
                    $semana->nu_carrera = $dataactual->nu_carrera;
                    $semana->nu_periodo = $dataactual->nu_periodo;
                    if($DB->record_exists('course_semanas_efectivas', array('nu_carrera' => $semana->nu_carrera, 'nu_periodo' => $semana->nu_periodo, 'nu_semana' => $semana->nu_semana)))
                    {
                        $DB->update_record('course_semanas_efectivas', $semana);
                    }
                    else
                    {
                        $DB->insert_record('course_semanas_efectivas', $semana);
                    }
                }
                redirect(new moodle_url('/course/index.php', array('categoryid' => $categoryid)));
            }
        }
    }
}

echo $OUTPUT->header();
echo $OUTPUT->skip_link_target();

if ($categoryid != 0)
{

    if (has_capability('courseformat/periodos:agregar', $context))
    {
        $forma_periodos->set_data($category);
        $forma_periodos->display();
    }

    if (has_capability('courseformat/periodos:editar', $context))
    {
        $rs = $DB->get_recordset('course_periodos', array('nu_carrera' => $categoryid));
        $periodos = array();
        foreach ($rs as $record)
        {
            $periodos[$record->id] = $record;
        }
        $rs->close();
        $forma_periodoactual->set_data($periodos);
        $forma_periodoactual->display();
    }
    if (has_capability('courseformat/semanas:editar', $context))
    {
        if($DB->record_exists('course_periodos', array('nu_carrera' => $categoryid, 'actual' => 1)))
        {
            $forma_semanas->set_data($periodo_actual);
            $forma_semanas->display();
        }
    }
    if (has_capability('courseformat/cortes_periodo:add', $context))
    {
        if($DB->record_exists('course_periodos', array('nu_carrera' => $categoryid, 'actual' => 1)))
        {
            $forma_cortes->set_data($periodo_actual);
            $forma_cortes->display();
        }
    }
}
echo $content;

echo $OUTPUT->footer();
