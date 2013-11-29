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
 * Strings for component 'plagiarism_compilatio', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   plagiarism_compilatio
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['analysisdate'] = 'Fecha de análisis';
$string['analysistype'] = 'Tipo de análisis';
$string['analysistypeauto'] = 'Instante';
$string['analysistype_help'] = '<p>Hay 3 opciones posibles:</p> <ul>

 <li><strong>Instante: </strong>El documento se envía a Compilatio y se analiza de inmediato.</li> <li><strong>Manual:</strong> El documento se envía a Compilatio pero el maestro debe hacer funcionar manualmente el análisis de documentos.</li> <li><strong>Programado: </strong>El documento se envía a Compilatio y se analiza el día y hora programadas.</li> </ul>

<p>Para habilitar que todos los documentos se comparen entre sí, elija el modo manual y espere hasta que todos los trabajos hayan sido enviados por los estudiantes y entonces haga funcionar el análisis.</p>';
$string['analysistypemanual'] = 'Manual';
$string['analysistypeprog'] = 'Programado';
$string['compilatio'] = 'Plugin de plagio compilatio';
$string['compilatio_api'] = 'Dirección de Integración Compilatio';
$string['compilatio_api_help'] = 'Esta es la dirección del API de Compilatio';
$string['compilatiodefaults'] = 'Valores por defecto de Compilatio';
$string['compilatio_draft_submit'] = 'Cuando deber´ía de enviarse el archivo a Compilatio';
$string['compilatioexplain'] = 'Para más información sobre este plugin, vea: <a href="http://compilatio.net" target="_blank">http://compilatio.net</a>';
$string['compilatio_password'] = 'Código institucional';
$string['compilatio_password_help'] = 'Código institucional proporcionado por Compilatio para accesar el API';
$string['compilatio_show_student_report'] = 'Mostrar reporte de similaridad al estudiante';
$string['compilatio_show_student_report_help'] = 'El reporte de similitud da un desglose de cuales partes del envío fueron plagiadas y el sitio donde Compilatio vió por primera vez ese contenido.';
$string['compilatio_show_student_score'] = 'Mostrar puntaje de similaridad al estudiante';
$string['compilatio_show_student_score_help'] = 'El puntaje de militud es el porcentaje del envío que ha coincidido con otro contenido.';
$string['compilatio_studentemail'] = 'Mandar E-mail al estudiante';
$string['compilatio_studentemail_help'] = 'Esto le mandará un correo electónico al estudiante cuando un archivo haya sido procesado, para que sepa que está disponible un reporte.';
$string['defaultsdesc'] = 'Las siguientes son las configuraciones por defecto cuando se habilita Compilatio dentro de un Módulo de Actividad';
$string['defaultupdated'] = 'Valores por defecto actualizados';
$string['enabledandworking'] = 'El plugin de Compilatio está habilitado y funcionando.';
$string['failedanalysis'] = 'Compilatio no pudo analizar su documento:';
$string['filereset'] = 'Un archivo ha sido reiniciado para re-envío a Compilatio';
$string['optout'] = 'Abandonar';
$string['pending'] = 'Este eachivo está pendiente de enviar a Compilatio';
$string['pluginname'] = 'Plugin de plagio Compilatio';
$string['previouslysubmitted'] = 'Previamente enviado como';
$string['processing'] = 'Este archivo ha sido enviado a Compilatio, ahora espera a que esté disponible el análisis.';
$string['report'] = 'reporte';
$string['savedconfigfailed'] = 'Se escribió un código de dirección/institución de integración incorrecto,Compilatio está deshabilitado, por favor intente de nuevo.';
$string['savedconfigsuccess'] = 'Configuraciones de Plagio Guardadas';
$string['showwhenclosed'] = 'Cuando se cierre la Actividad';
$string['similarity'] = 'Compilatio';
$string['startanalysis'] = 'Iniciar análisis';
$string['studentdisclosure'] = 'Declaración legal al estudiante';
$string['studentdisclosuredefault'] = 'Todos los archivos subidos aquí serán enviados al servicio para detección de plagio Compilatio';
$string['studentdisclosure_help'] = 'Este texto se mostrará a todos los estudiantes en la página de subir archivo.';
$string['studentemailcontent'] = 'El archivo que Usted envió a {$a->modulename} en {$a->coursename} ha sido ya procesado por la herramienta para detección de plagio Compilatio. {$a->modulelink}';
$string['studentemailsubject'] = 'Archivo procesado por Compilatio';
$string['submitondraft'] = 'Enviar archivo la primera vez que se suba';
$string['submitonfinal'] = 'Enviar archivo cuando el estudiante loenvíe para ser calificado';
$string['toolarge'] = 'Este archivo es demasiado grande para que lo procese Compilatio';
$string['unknownwarning'] = 'Ocurrió un error al tratar de enviar este archivo a Compilatio';
$string['unsupportedfiletype'] = 'Este tipo de archivo no es soportado por Compilatio';
$string['usecompilatio'] = 'Habilitar Compilatio';
$string['usedcredits'] = '<strong>Usted ha usado {$a->used} crédito(s) de {$a->credits} y tiene {$a->remaining} crédito(s) restante</strong>';
