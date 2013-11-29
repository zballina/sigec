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
 * Strings for component 'qformat_wordtable', language 'es_mx', branch 'MOODLE_24_STABLE'
 *
 * @package   qformat_wordtable
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['cannotopentempfile'] = 'No puede abrirse el archivo temporal <b>{$a}</b>';
$string['cannotwritetotempfile'] = 'No se puede escribir al archivo temporal <b>{$a}</b>';
$string['conversionfailed'] = 'Falló la importación de pregunta';
$string['conversionsucceeded'] = 'Importación de pregunta <b>exitosa</b>, <br>elija el botón de <b>\'Cerrar\'</b> para continuar.';
$string['conversionsucceeded2'] = 'Importación de pregunta <b>exitosa</b>, <br>elija el botón de <b>\'Continuar\'</b> para continuar.';
$string['docxnotsupported'] = 'Archivos en formato de Word 2007 no soportados: <b>{$a}</b>';
$string['htmldocnotsupported'] = 'Formato de Word incorrecto: por favor use la opción de <i>Archivo>Guardar como...</i> para guardar <b>{$a}</b> en formato nativo de Word y volver a importar';
$string['htmlnotsupported'] = 'Archivos en formato HTML no están soportados: <b>{$a}</b>';
$string['noquestions'] = 'No hay preguntas para exportar';
$string['pluginname'] = 'Formato de tabla de Microsoft Word (wordtable)';
$string['pluginname_help'] = 'Este es un programa para convertir el formato binario de Microsoft Word 2003 hacia formato de pregunta de Moodle XML para importar; y para convertir el formato de pregunta de Moodle XML hacia un formato mejorado XHTML para exportar las preguntas de Moodle en un formato apropiado para editarlas empleando  Microsoft Word.';
$string['preview_question_not_found'] = 'Previsualizar pregunta no encontrada, nombre / ID del curso: {$a}';
$string['registration'] = 'Registro';
$string['registration_administration'] = 'Administración de Moodle2Word';
$string['registrationcomplete'] = 'Registro exitoso, importación de Word disponible';
$string['registrationincomplete'] = 'Registro no exitoso, importación de Word no disponible';
$string['registrationinfo'] = '<p>Usted debe registrar Moodle2Word para habilitar la importación de documentos de Word. Usted no necesita registrarse si solamente desea exportar preguntas hacia formato de Word. El registro es gratuito y le permite importar archivos de Word que contengan hasta 5 preguntas. Sin embargo, para importar numeros mayores de preguntas, Usted debe pagar una suscripción anual.</p> <p>Si Usted así lo decide, puede añadir el nombre de su sitio, país y URL a la lista pública de sitios que usan Moodle2Word.</p>';
$string['registrationinfotitle'] = 'Información para el Registro de Moodle2Word';
$string['registrationno'] = 'No, no deseo recibir correos';
$string['registrationpage'] = 'Re-dirigiendo hacia la página de registro para habilitar importaciones desde Word';
$string['registrationpasswordsdonotmatch'] = 'Las contraseñas no coinciden';
$string['registrationsend'] = 'Mandar información para registro a www.moodle2word.net';
$string['registrationyes'] = 'Si, por favor notifíquenme sobre asuntos importantes';
$string['stylesheetunavailable'] = 'La hoja de estilo de XSLT <b>{$a}</b> no está disponible';
$string['subscription'] = 'Tipo de suscripción';
$string['subtype_free'] = 'Gratuita';
$string['subtype_help'] = '(Sin límites, pero sin soporte)';
$string['subtype_unlimited'] = 'Pagada';
$string['tempfile'] = 'Archivo temporal XML: <b>{$a}</b>';
$string['templateunavailable'] = 'La plantilla XHTML compatible con Word <b>{$a}</b> no está disponible';
$string['transformationfailed'] = 'La transformación con XSLT falló  (XSLT/XML <b>{$a}</b>)';
$string['wordtable'] = 'Formato de tabla de Microsoft Word (wordtable)';
$string['wordtable_help'] = 'Este es un programa para convertir el formato binario de Microsoft Word 2003 hacia el formato de Pregunta de Moodle XML para importar, y para convertir el formato de pregunta de Moodle XML hacia un formato mejorado XHTML para exportarse en un formato adecuado para editarse en Microsoft Word.';
$string['xmlnotsupported'] = 'Los archivos en formato XML no están soportados: <b>{$a}</b>';
$string['xsltunavailable'] = 'Usted necesita la librería XSLT instalada enPHP para guardar este archivo de Word';
