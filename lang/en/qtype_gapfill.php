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
 * Strings for component 'qtype_gapfill', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   qtype_gapfill
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['answerdisplay'] = 'Mostrar Respuestas';
$string['answerdisplay_help'] = 'Dragdrop (Arrastrar y soltar) muestra una lista de palabras que pueden ser arrastradas hacia los huecos, gapfill (llena huecos) muestra los huecos sin opciones de palabras, dropdown (desplegable) muestra  la misma lista de respuestas correctas (y posiblemente incorrectas) para cada campo';
$string['casesensitive'] = 'MAYÚS/minúsculas';
$string['casesensitive_help'] = 'Cuando se elige esta opción, si la respuesta correcta fuera GATO, entonces gato se calificaría como respuesta equivocada.';
$string['delimitchars'] = 'Caracteres delimitadores';
$string['delimitchars_help'] = 'Cambia los caracteres que delimitan un campo y que por defecto son [ ] ,lo que resulta útil para preguntas sobre lenguajes de programación';
$string['displaydragdrop'] = 'arrastrarysoltar';
$string['displaydropdown'] = 'desplegable';
$string['displaygapfill'] = 'llenarhueco';
$string['gapfill'] = 'LLenarhueco Multipregunta (cloze)';
$string['moreoptions'] = 'Más opciones.';
$string['noduplicates'] = 'Sin duplicados';
$string['noduplicates_help'] = 'Cuando se elige, cada respuesta debe ser única, lo que es útil donde cada campo tiene un operador  | (or) ; por ejemplo, ¿cuales son los colores de las medallas olímpicas? y cada campo tiene [oro|plata|bronce] ; si el estudiante escribe oro en cada campo, solamente el primero tendrá puntuación (aunque los otros si tendrán su palomita de correcto). Realmente es más que nada descartar las respuestas duplicadas para fines de puntuación.';
$string['pleaseenterananswer'] = 'Por favor escriba una respuesta';
$string['pluginname'] = 'Tipo de pregunta de llenar un hueco';
$string['pluginnameadding'] = 'Añadiendo una pregunta de LLenar Un Hueco.';
$string['pluginnameediting'] = 'Editando LLenado de Hueco.';
$string['pluginname_help'] = 'Ponga las palabras para completar dentro de paréntesis cuadrados. Por ejemplo: El [gato] se sentó en el [tapete]. Los modos de arrastrarysoltar y desplegables permiten que una lista aleatorizada de respuestas se muestre y que pueda incluir respuestas opcionales erróneas o distractores.';
$string['pluginnamesummary'] = 'Una pregunta del tipo de llenar hueco. Menos características que una pregunta tipo Cloze (multipregunta), pero con sintaxis más sencilla';
$string['questionsmissing'] = 'Usted no ha incluido ningún campo en su texto de pregunta';
$string['wronganswers'] = 'Respuestas equivocadas.';
$string['wronganswers_help'] = 'Lista de palabras incorrectas separadas por comas, solamente aplica para modo de arrastrarysoltar/desplegable.';
$string['yougotnrightcount'] = 'Su número de respuestas correctas es {$a->num}.';
