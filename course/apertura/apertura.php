<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ('../../config.php');
require_once($CFG->dirroot . '/course/apertura/apertura_form.php');

$nu_carrera = required_param('nu_carrera', PARAM_INT);

$PAGE->set_url('/course/apertura/apertura.php', array(
    'nu_carrera' => $nu_carrera
));

// This page should always redirect
require_login();

$contextcat = context_coursecat::instance($nu_carrera);
require_capability('course_format/apertura_materia', $contextcat);

$form_apertura = new apertura_form($PAGE->url, array());

$form_apertura->set_data(array($nu_carrera));

if($form_apertura->is_cancelled())
{
//        redirect(course_get_url($courseorid));
}
else if($data = $form_apertura->get_data())
{
    $info = print_r($data, true);
}

$PAGE->set_title(get_string('apertura_materias', 'format_unidades'));
$PAGE->set_heading($course->fullname);
$PAGE->navbar->add(get_string('apertura_materias', 'format_unidades'));
$PAGE->set_pagelayout('incourse');

echo $OUTPUT->header();
echo "Datos generados por el formulario: $info";

$form_apertura->display();

echo $OUTPUT->footer();
?>
