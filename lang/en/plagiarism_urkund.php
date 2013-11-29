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
 * Strings for component 'plagiarism_urkund', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   plagiarism_urkund
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['defaultsdesc'] = 'Las configuraciones siguientes son por defecto al habilitar URKUND dentro de un Módulo de Actividad';
$string['defaultupdated'] = 'Valores por defecto actualizados';
$string['filereset'] = 'Un archivo ha sido reseteado para su re-envíoa URKUND';
$string['noreceiver'] = 'No se especificó dirección para el destinatario';
$string['optout'] = 'Optar-por-no';
$string['pending'] = 'El archivo está pendiente para enviar a URKUND';
$string['pluginname'] = 'Plugin de detección de plagio URKUND';
$string['previouslysubmitted'] = 'Previamente enviado como';
$string['processing'] = 'Su archivo ha sido enviado a URKUND, ahora espera a que esté disponible el análisis';
$string['report'] = 'reporte';
$string['savedconfigfailed'] = 'Se ha escrito una combinación incorrecta de nombredeusuario/contraseña, URKUND ha sido deshabilitado, por favor inténtelo de nuevo.';
$string['savedconfigsuccess'] = 'Configuraciones de plagio guardadas';
$string['showwhenclosed'] = 'Cuando la Actividad se cierre';
$string['similarity'] = 'URKUND';
$string['studentdisclosure'] = 'Declaración para Estudiantes';
$string['studentdisclosuredefault'] = 'Todos los archivos subidos serán enviados al servicio de detección de plagio de URKUND. Si Usted desea impedir que su documento sea utilizado como fuente para análisis afuera de este sitio por otras organizaciones, Usted puede usar la liga para arrepentirse que aparece después de que el reporte sea generado.';
$string['studentdisclosure_help'] = 'Este texto se mostrará atodos los estudiantes en la página de subida de archivo.';
$string['studentemailcontent'] = 'El archivo que Usted sometió a  {$a->modulename} en {$a->coursename} ha sido procesado por la herramienta de plagio URKUND. {$a->modulelink} Si Usted desea impedir que su documento sea utilizado como fuente para análisis afuera de este sitio por otras organizaciones, Usted puede usar este enlace para arrepentirse:. {$a->optoutlink}';
$string['studentemailsubject'] = 'Archivo procesado por URKUND';
$string['submitondraft'] = 'Enviar archivo la primera vez que se suba';
$string['submitonfinal'] = 'Enviar archivo cuando el estudiante lo envíe para ser calificado';
$string['toolarge'] = 'Este archivo es demasiado grande para que URKUND lo procese';
$string['unknownwarning'] = 'Ocurrió un error al tratar de enviar este archivo a URKUND';
$string['unsupportedfiletype'] = 'Este tipo de archivo no es soportado por URKUND';
$string['urkund'] = 'Plugin de detección de plagio URKUND';
$string['urkund_api'] = 'Dirección de integración URKUND';
$string['urkund_api_help'] = 'Esta es la dirección del API de URKUND';
$string['urkunddefaults'] = 'Configuraciones por defecto de URKUND';
$string['urkund_draft_submit'] = 'Cuando debería de enviarse el archivo a URKUND';
$string['urkundexplain'] = 'Para más información sobre este plugin vea: <a href="http://www.urkund.com/int/en/" target="_blank">http://www.urkund.com/int/en/</a>';
$string['urkund_lang'] = 'Idioma';
$string['urkund_lang_help'] = 'Código de idioma proporcionado por URKUND';
$string['urkund_password'] = 'Contraseña';
$string['urkund_password_help'] = 'Contraseña proporcionada por URKUND para accesar al API';
$string['urkund_receiver'] = 'Dirección del receptor';
$string['urkund_receiver_help'] = 'Esta es la dirección única proporcionada por URKUND al maestro';
$string['urkund_show_student_report'] = 'Mostrar reporte de similitud al estudiante';
$string['urkund_show_student_report_help'] = 'El reporte de similitud da un desglose de que partes del envío furon plagios y el lugar donde URKUND vió primero este contenido';
$string['urkund_show_student_score'] = 'Mostrar puntaje de similitud al estudiante';
$string['urkund_show_student_score_help'] = 'El puntaje de similitud es el porcentaje del envío que ha cincidido con otro contenido.';
$string['urkund_studentemail'] = 'Mandar Email a estudiante';
$string['urkund_studentemail_help'] = 'Esto mandará un correo electrónico al estudiante cuando se haya procesado un archivo para hacerle saber que está disponible un reporte. El correo también incluye el enlace para optar-por-no.';
$string['urkund_username'] = 'Nombredeusuario';
$string['urkund_username_help'] = 'Nombredeusuario proporcionado por URKUND para accesar el API';
$string['useurkund'] = 'Habilitar URKUND';
