<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ('../../../config.php');
require_once ($CFG->libdir. '/itse/lib.php');
require_once ($CFG->libdir. '/itse/reportes/cursos_estadisticas.php');
require_once ($CFG->libdir. '/itse/reportes/cursos_asistencias_carreras.php');

$id = required_param('id', PARAM_INT); // course id
$accion = required_param('accion', PARAM_INT); // course id

require_login();
$context = context_system::instance();
require_capability('moodle/category:manage', $context);

switch ($accion)
{
    case ACCION_DESCARGA_CURSOS_ESTADISTICAS_DOCENTES:
        $reporte = new reporte_cursos_estadisticas($id);
        break;
    case ACCION_DESCARGA_CURSOS_ESTADISTICAS_ASISTENCIAS_CARRERAS:
        $reporte = new reporte_cursos_est_asistencias_carreras($id);
        break;
}

$reporte->descargar();

?>
