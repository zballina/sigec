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
 * Strings for component 'block_glossary_export_to_quiz', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   block_glossary_export_to_quiz
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allentries'] = 'Todas las entradas';
$string['clicktoexport'] = 'Elija para exportar estas entradas del glosario hacia un examen (XML)';
$string['concept'] = 'Órden alfebético';
$string['emptyglossaries'] = 'Los glosarios del curso están vación (sin entradas)';
$string['emptyglossary'] = 'El glosario del curso está vacío (sin entradas)';
$string['exportentriestoxml'] = 'Exportar entradas hacia Examen (XML)';
$string['firstmodified'] = 'La entrada más antigua primero';
$string['generalhelp'] = 'Ayuda del bloque';
$string['glossary_export_to_quiz:addinstance'] = 'Añadir un nuevo bloque de exportar_glosario_a_quiz';
$string['glossary_export_to_quiz:myaddinstance'] = 'Añadir un nuevo bloque de exportar_glosario_a_quiz a la página de Mi Moodle';
$string['lastmodified'] = 'La entrada más reciente primero';
$string['limitnum'] = 'Número máximo de entradas a exportar';
$string['limitnum_help'] = 'Dejar vacío para exportar todas las entradas del Glosario o Categoría elegida.
Esta opción puede ser de utilidad para exportar un número limitado de entradas desde glosarios muy grandes.';
$string['multichoice'] = 'Opción múltiple';
$string['noglossaries'] = 'No hay glosarios en este curso';
$string['nolink'] = 'Remover ligas automáticas del glosario';
$string['notyetconfigured'] = 'Por favor <b>Active la edición</b> para configurar este bloque.';
$string['notyetconfiguredediting'] = 'Por favor configure este bloque usando el ícono para editar.';
$string['numentries'] = 'Exportar {$a} entradas';
$string['pluginname'] = 'Exportar Glosario hacia Examen';
$string['pluginname_help'] = 'Hacer click derecho sobre el enlace hacia <b>Más Ayuda</b> para ver el  Wiki de Documentación de Moodle..';
$string['questiontype'] = 'Tipo de pregunta:';
$string['questiontype_help'] = 'Las entradas del glosario pueden exportarse al banco de Preguntas para examen, ya sea como preguntas de opción múltiple o de respuesta corta.

Las preguntas de opción múltiple consistirán de los siguientes elementos:

* texto de la pregunta = definición de la entrada del glosario
* respuesta correcta = concepto de la entrada del glosario
* distractores = 3 entradas del glosario elegidas en forma aleatoria del glosario (o la categoría del glosario) que Usted haya seleccionado.


Preguntas de respuesta corta:
* Insensible MAYÚS/minúsculas. Las respuestas del estudiante serán tomadas como acertadas sin importar si el concepto de la entrada del glosario estaba en MAYÚSCULAS o minúsculas.
** Ejemplo: entrada original "Moodle". Respuestas correctas aceptadas: "Moodle", "moodle".
* Sensible MAYÚS/minúsculas. LAs respuestas del estudiante solamente serán aceptadas como correctas si corresponden al concepto original de la entrada del glosario
** Ejemplo: entrada original "Moodle". Respuesta correcta aceptada: "Moodle".';
$string['random'] = 'Aleatoriamente';
$string['selectglossary'] = 'Elegir glosario desde donde exportará';
$string['selectglossary_help'] = 'Use la lista desplegable para elegir el glosario desde el cual quiere exportar sus entradas hacia el banco de preguntas para examen. Si el glosario tuviera categorías, Usted podrá elegir una sola categoría para exportar sus entradas.
Para cancelar su elección, o para restablecer el bloque, simplemente deje la lista desplegable en la posición den "Elegir...".';
$string['shortanswer'] = 'Respuesta corta';
$string['shortanswer_0'] = 'Respuesta corta (no importa MAYÚS/minúsculas)';
$string['shortanswer_1'] = 'Respuesta corta (si importa MAYÚS/minúsculas)';
$string['sortingorder'] = 'Órden de acomodo';
$string['sortingorder_help'] = 'Use esta configuración para determinar cómo se ordenarán las entradas del glosario cuando las importe en su banco de preguntas.
Esto puede usarse, junto con el número máximo de entradas, para crear un exámen rápido para poder evaluar las últimas entradas de su glosario (especialmente un glosario bastante grande).';
