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
 * Strings for component 'gradingform_rubric', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   gradingform_rubric
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcriterion'] = 'Añadir criterio';
$string['alwaysshowdefinition'] = 'Permitirle a los usuarios pre-visualizar rúbrica empleada en el módulo (de lo contrario la rúbrica únicamente se volverá visible hasta después de calificar)';
$string['backtoediting'] = 'Regresar a editar';
$string['confirmdeletecriterion'] = '¿Está seguro que quiere eliminar este criterio?';
$string['confirmdeletelevel'] = '¿Está seguro de querer borrar este nivel?';
$string['criterionaddlevel'] = 'Añadir nivel';
$string['criteriondelete'] = 'Borrar criterio';
$string['criterionempty'] = 'Elegir para editar criterio';
$string['criterionmovedown'] = 'Mover hacia abajo';
$string['criterionmoveup'] = 'Mover hacia arriba';
$string['definerubric'] = 'Definir rúbrica';
$string['description'] = 'Descripción';
$string['enableremarks'] = 'Permitirle al profesor que califica añadir comentarios en texto para cada criterio';
$string['err_mintwolevels'] = 'Cada criterio debe tener al menos dos niveles';
$string['err_nocriteria'] = 'La rúbrica debe tener al menos un criterio';
$string['err_nodefinition'] = 'La definición del nivel no puede estar vacía';
$string['err_nodescription'] = 'La descripción del criterio no puede estar vacía';
$string['err_scoreformat'] = 'El número de puntos para cada nivel debe ser un número no-negativo válido';
$string['err_totalscore'] = 'El número máximo de puntos posibles al calificar por rúbrica debe ser mayor de cero';
$string['gradingof'] = '{$a} calificando';
$string['leveldelete'] = 'Borrar nivel';
$string['levelempty'] = 'Elija para editar nivel';
$string['name'] = 'Nombre';
$string['needregrademessage'] = 'La definición de rúbrica fue cambiada después de que este estudiante fue calificado. El estudiante no puede ver esta rúbrica hasta que Usted revise la rúbrica y actualice la calificación.';
$string['pluginname'] = 'Rúbrica';
$string['previewrubric'] = 'Pre-visualizar rúbrica';
$string['regrademessage1'] = 'Usted está a punto de guardar los cambios en una rúbrica que ya ha sido utilizada para calificar. Por favor, indique si las calificaciones existentes deben ser revisadas. Si decide que debe ser así, entonces la rúbrica se ocultará a los estudiantes hasta que su elemento sea recalificado.';
$string['regrademessage5'] = 'Usted está a punto de guardar cambios significativos a una rúbrica que ya ha sido usada para calificar. El valor del libro de calificaciones no será cambiado, pero la rúbrica se ocultará a los estudiantes hasta que sus items sean re-calificados.';
$string['regradeoption0'] = 'No marcarla para re-calificar';
$string['regradeoption1'] = 'Marcarla para re-calificar';
$string['restoredfromdraft'] = 'NOTA: El último intento de calificar a esta persona no se guardó adecuadamente, por lo que se han restaurado las calificaciones en borrador. Si Usted desea cancelar estos cambios, use el botón inferior  \'Cancelar\'.';
$string['rubric'] = 'Rúbrica';
$string['rubricmapping'] = 'Reglas de mapeo de puntaje a calificación';
$string['rubricmappingexplained'] = 'El puntaje mínimo para esta rúbrica es <b>{$a->minscore} puntos</b> y será convertido a la calificación mínima disponible en este módulo (que es de cero a menos que se emplee una escala). El puntaje máximo <b>{$a->maxscore} puntos</b> será convertido a la calificación máxima.<br /> Los puntajes intermedios serán convertidos respectivamente y redondeados a la calificación más cercana disponible.<br /> Si se emplea una escala en lugar de calificación, el puntaje será convertido a los elementos de la escala de forma similar a si fuesen números enteros consecutivos.';
$string['rubricnotcompleted'] = 'Por favor elija algo para cada criterio';
$string['rubricoptions'] = 'Opciones de rúbrica';
$string['rubricstatus'] = 'Status actual de rúbrica';
$string['save'] = 'Guardar';
$string['saverubric'] = 'Guardar rúbrica y hacerla disponible';
$string['saverubricdraft'] = 'Guardar como borrador';
$string['scorepostfix'] = '{$a} puntos';
$string['showdescriptionstudent'] = 'Mostrar descripción de rúbrica a quienes son calificados';
$string['showdescriptionteacher'] = 'Mostrar descripción de rúbrica durante la evaluación';
$string['showremarksstudent'] = 'Mostrar notas-comentarios a quienes son calificados';
$string['showscorestudent'] = 'Mostrar puntos para cada nivel a quienes son calificados';
$string['showscoreteacher'] = 'Mostrar puntos para cada nivel durante la evaluación';
$string['sortlevelsasc'] = 'Forma de ordenar para niveles:';
$string['sortlevelsasc0'] = 'Descendiente por número de puntos';
$string['sortlevelsasc1'] = 'Ascendiente por número de puntos';
