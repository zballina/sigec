<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ('../../../config.php');
require_once ($CFG->libdir. '/itse/lib.php');
require_once ($CFG->libdir. '/itse/reportes/rubricas.php');
require_once ($CFG->libdir. '/itse/reportes/desglose.php');
require_once ($CFG->libdir. '/itse/reportes/planeacion.php');
require_once ($CFG->libdir. '/itse/reportes/practica.php');
require_once ($CFG->libdir. '/itse/reportes/calificaciones.php');
require_once ($CFG->libdir. '/itse/reportes/corte_parcial.php');

$id = required_param('id', PARAM_INT); // course id
$accion = required_param('accion', PARAM_INT); // course id
$groupid = optional_param('groupid', 0, PARAM_INT); // course id
$unidad = optional_param('unidad', 0, PARAM_INT); // course id
$corte = optional_param('corte', 0, PARAM_INT); // course id

if (!$course = $DB->get_record('course', array('id' => $id)))
{
    print_error('nocourseid');
}

require_login($course);
$context = context_course::instance($course->id);

if($groupid != 0)
{
    switch ($accion)
    {
        case ACCION_DESCARGA_PLANEACION:
            require_capability('courseformat/unidades:generarpdf', $context);
            $reporte = new reporte_planeacion($course->id, $groupid);
            break;
        case ACCION_DESCARGA_DESGLOSE:
            require_capability('courseformat/unidades:generarpdf', $context);
            $reporte = new reporte_desglose($course->id);
            break;
        case ACCION_DESCARGA_CALIFICACIONES:
            require_capability('courseformat/unidades:pdfcalificacion', $context);
            $reporte = new reporte_calificaciones($course->id, $groupid, $unidad);
            break;
        case ACCION_DESCARGA_RUBRICAS:
            require_capability('courseformat/unidades:generarpdf', $context);
            $reporte = new reporte_rubricas($course->id);
            break;
    }
}
else if ($corte != 0 && $accion == ACCION_DESCARGA_CORTES) 
{
    require_capability('courseformat/cortes:pdf', $context);
    $reporte = new reporte_corte_parcial($id, $course->category, $corte);
}

$reporte->descargar();

?>
