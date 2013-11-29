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
 * Strings for component 'gradingform_erubric', language 'es_mx', branch 'MOODLE_24_STABLE'
 *
 * @package   gradingform_erubric
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcriterion'] = 'Añadir criterio';
$string['addnew'] = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Añadir (+)';
$string['alwaysshowdefinition'] = 'Permite a los usuarios previsualizar rúbrica usada en el módulo (de otra forma la rúbrica únicamente sería visible después de calificar)';
$string['backtoediting'] = 'Regresar a editar';
$string['benchmarkinfo'] = 'Enriquecimiento<br />patrón:<br /><b>{$a}</b>';
$string['benchmarkinfoall'] = 'Estudiantes<br />promedio:<br /><b>{$a->students}</b><br />Estudiante:<br /><b>{$a->student}</b>';
$string['benchmarkinfonull'] = 'Enriquecimiento<br />patrón:<br /><b>Not found!</b>';
$string['collaborationempty'] = 'Tipo de colaboración';
$string['collaborationochoice'] = '¡Usted debe elegir el tipo de colaboración antes de añadir módulos!';
$string['collaborationtype'] = 'Tipo:';
$string['collaborationtypeentries'] = 'ocurrencias simples';
$string['collaborationtypefileadds'] = 'envíos de archivo';
$string['collaborationtypeinteractions'] = 'interactuaron personas';
$string['collaborationtypereplies'] = 'respuestas en foros';
$string['confirmchangecriteriontype'] = '¿Está seguro de querer cambiar el tipo de criterio? Los módulos de criterio actual del curso serán reiniciados.';
$string['confirmdeleteactivity'] = '¿Está seguro de querer eliminar esta actividad?';
$string['confirmdeleteassignment'] = '¿Está seguro de querer eliminar esta tarea?';
$string['confirmdeletecriterion'] = '¿Está seguro de querer eliminar este criterio?';
$string['confirmdeletelevel'] = '¿Está seguro de querer eliminar este nivel?';
$string['confirmdeleteresource'] = '¿Está seguro de querer eliminar este recurso?';
$string['coursemoduleempty'] = 'Añadir Módulo de Curso';
$string['coursemoduleis'] = 'En:';
$string['criterionaddlevel'] = 'Añadir nivel';
$string['criteriondelete'] = 'Eliminar criterio';
$string['criterionempty'] = 'Elegir para editar criterio';
$string['criterionmovedown'] = 'Mover abajo';
$string['criterionmoveup'] = 'Mover arriba';
$string['criterionoperatorequals'] = 'igual (=)';
$string['criterionoperatormorethan'] = 'mayor que (>=)';
$string['defineenrichedrubric'] = 'Definir e-rúbrica de Análisis del Aprendizaje';
$string['deleteactivity'] = 'Eliminar actividad';
$string['deleteassignment'] = 'Eliminar tarea';
$string['deleteresource'] = 'Eliminar recurso';
$string['description'] = 'Descripción';
$string['enableremarks'] = 'Permitirle al evaluador que añada anotaciones de texto para cada criterio';
$string['enrichedrubricinfo'] = 'Reglas de enriquecimiento para criterio rúbrica';
$string['enrichedrubricinfoexplained'] = 'Todos los criterios enriquecidos serán calculados automáticamente y la selección de nivel será hecha por el sistema.

Cuando esto sucede, el evaluador no puede cambiar la selección..<br />
En caso de un error lógico en criterio de enriquecimiento, no será seleccionado ningún nivel por el sistema, por lo que el puntaje específico del criterio no será incluido en la calificación y solamente si estuviesen habiltadas las anulaciones podría el evaluador hacer su propia elección.<br />';
$string['enrichedvalueempty'] = 'Añadir valor';
$string['enrichedvaluesuffixnothing'] = '<font color="rojo"><b>!!!</b></font>';
$string['enrichedvaluesuffixpercent'] = 'porciento';
$string['enrichedvaluesuffixpoints'] = '%puntos';
$string['enrichedvaluesuffixstudents'] = 'gente';
$string['enrichedvaluesuffixtimes'] = 'veces';
$string['enrichment'] = 'Enriquecimiento';
$string['enrichment_help'] = 'Vea el siguiente tutorial sobre cómo Crear Criterios en Rúbrica Enriquecida de Análisis del Aprendizaje: <br /><br /> <a target="_blank" href="http://www.youtube.com/watch?v=8w6yreB1geI&hd=1">Create Criteria in Learning Analytics Enriched Rubric</a><br /><br />';
$string['enrichmentoptions'] = 'Opciones de criterios enriquecidos';
$string['enrichshareconfirm'] = '<font color="red"><b>ADVERTENCIA!</b></font><br /><br /> <b>El plugin de la Rúbrica Enriquecida de análisis del Aprendizaje</b> puede usarse como una plantilla de formato avanzado para calificar, ¡SOLAMENTE PARA EL CURSO ACTUAL! . Si otros usuarios en su sitio usan este formato en cualquier otro curso <b> no funcionará como está</b> !';
$string['err_collaborationhoice'] = 'Los módulos de chat no pueden elegirse para revisar envíos de archivos o respuestas en foros';
$string['err_collaborationtypeneedless'] = 'El tipo de campo debería ser seleccionado solamente para revisión colaborativa';
$string['err_criterionmethod'] = 'Usted debe elegir la referencia numérica para el criteerio enriquecido';
$string['err_criteriontypeid'] = 'Usted debe elegirun operador para el criteerio enriquecido';
$string['err_enrichedcriterionmissing'] = 'Todos, o ninguno, de los criterios enriquecidos deben ser seleccionados';
$string['err_enrichedmoduleselection'] = 'Los módulos de curso seleccionados deben ser del mismo tipo de criterio enriquecido';
$string['err_enrichedvalueformat'] = 'El número de valores de revisión para cada nivel enriquecido debe ser un número no-negativo válido';
$string['err_enrichedvaluemissing'] = 'Criterio enriquecido, debe tener valores de comprobación en todos los niveles';
$string['err_mintwolevels'] = 'Cada criterio debe tener al menos dos niveles';
$string['err_missingcoursemodule'] = '¡Módulo faltante!';
$string['err_missingcoursemodules'] = '<font color="red"><b>ADVERTENCIA!</b></font><br /> ¡Falta cuando menos un módulo de curso del criterio! Tal vez el módulo del curso fue eliminado o este formato de calificación fue importado desde otro curso (o de un respaldo) (o formato compartido). Edite el formato actual para re-enriquecer (o no) estos criterios. De otra forma,  <b>¡ no será posible la evaluación de los alumnos</b>!';
$string['err_missingcoursemodulesedit'] = '<font color="red"><b>ADVERTENCIA!</b></font><br /> ¡Falta cuando menos un módulo de curso del criterio!  Usted puede eliminar estos criterios o hacerlos \'simples\' al reiniciar los campos de enriquecimiento, o enriquecerlos de nuevo. <b>Si Usted no actualiza este formato y lo deja como está, ¡no será posible la evaluación del estudiante!</b>';
$string['err_nocriteria'] = 'La rúbrica debe tener cuando menos un criterio';
$string['err_nodefinition'] = 'La definición del nivel no puede estar vacía';
$string['err_nodescription'] = 'La descripción del criterio no puede estar vacía';
$string['err_scoreformat'] = 'El número de puntos para cada nivel debe ser un número no-negativo válido';
$string['err_totalscore'] = 'El número máximo de puntos posibles al calificar por la rúbrica debe ser mayor de cero';
$string['erubric'] = 'E-rúbrica de Criterios de Aprendizaje';
$string['gradingof'] = '{$a} calificando';
$string['intercactionempty'] = 'Tipo de Criterio';
$string['leveldelete'] = 'Eliminar nivel';
$string['levelempty'] = 'Elija para editar nivel';
$string['name'] = 'Nombre';
$string['needregrademessage'] = 'La definición de la rúbrica enriquecida se cambió después de que este estudiante fuera evaluado.
El estudiante no puede ver esta rúbrica enriquecida hasta que Usted haya revisado la rúbrica enriquecida y actualice la calificación.';
$string['operatorempty'] = 'Elegir operador';
$string['overideenrichmentevaluation'] = 'ERROR LÓGICO al anular evaluación automática de criterio en caso de enriquecimiento<br>        (<i> Si hubiera un error lógico en enriquecimiento, ¡no es posible la evaluación sin que se anule!)</i>';
$string['participationin'] = 'Revisar:';
$string['participationis'] = 'Es:';
$string['participationon'] = 'Relacionado con:';
$string['pluginname'] = 'Rúbrica Enriquecida de Criterio de Aprendizaje';
$string['previewerubric'] = 'Previsualizar e-rúbrica de CA';
$string['referencetypeempty'] = 'Una o Todas';
$string['referencetypenumber'] = 'estudiante';
$string['referencetypepercentage'] = 'estudiantes';
$string['regrademessage1'] = 'Usted está a punto de guardar cambios significativos a una rúbrica enriquecida que ya había sido usada para calificar.
Por favor indique si las calificaciones existentes necesitan ser revisadas.
Si configura esto, entonces la rúbrica enriquecida estará oculta a los estudiantes hasta que sus items sean recalificados.';
$string['regrademessage5'] = 'Usted está a punto de guardar cambios significativos a una rúbrica enriquecida que ya había sido usada para  calificar.
El libro de calificaciones seguirá inalterado, pero la rúbrica enriquecida estará oculta a los estudiantes hasta que sus items sean recalificados.';
$string['regradeoption0'] = 'No marcar para recalificar';
$string['regradeoption1'] = 'Marcar para recalificar';
$string['restoredfromdraft'] = 'NOTA: El último intento para calificar a esta persona no se grabó apropiadamente, por lo que se han restaurado las calificaciones del borrador. SI quiere cancelar estos cambio, use el botón inferior de \'Cancelar\'.';
$string['rubricmapping'] = 'Reglas de mapeo de puntaje a calificación';
$string['rubricmappingexplained'] = 'El puntaje mínimo posible para esta rúbrica enriquecida es de <b>{$a->minscore} puntos</b>  y será convertida a la califícación mínima disponible en este módulo (que es de cero, a menos que se use la escala).
El puntaje máximo de <b>{$a->maxscore} puntos</b> será convertido a la calificación máxima.<br />
Los puntajes intermedios serán convertidos respectivamente y redondeados a la calificación disponible más cercana.<br />
Si se usa una escala en lugar de una calificación, el puntaje será convertido a los elementos de la escala como si fueran números enteros consecutivos.<br /><br />';
$string['rubricnotcompleted'] = 'Debería de elegirse un nivel apropiado para cada criterio';
$string['rubricoptions'] = 'Opciones de rúbrica';
$string['rubricstatus'] = 'Status actual de e-rúbrica de EA';
$string['save'] = 'Guardar';
$string['saverubric'] = 'Guardar rúbrica enriquecida y hacerla disponible';
$string['saverubricdraft'] = 'Guardar como borrador';
$string['scorepostfix'] = '{$a} puntos';
$string['selectcollaboration'] = 'colaboración';
$string['selectgrade'] = 'calificación';
$string['selectstudy'] = 'estudio';
$string['showdescriptionstudent'] = 'Mostrar descripción de rúbrica a quienes sean calificados';
$string['showdescriptionteacher'] = 'Mostrar descripción de rúbrica durante la evaluación';
$string['showenrichedbenchmarkstudent'] = 'Mostrar patrón basal de enriquecimiento calculado a quienes son calificados';
$string['showenrichedbenchmarkteacher'] = 'Mostrar patrón basal de enriquecimiento calculado durante la evaluación';
$string['showenrichedcriteriastudent'] = 'Mostrar enriquecimiento de criterios a quienes son calificados';
$string['showenrichedcriteriateacher'] = 'Mostrar enriquecimiento de criterios durante la evaluación';
$string['showenrichedvaluestudent'] = 'Mostrar pontos de revisión de enriquecimiento para cada nivel a quienes son evaluados';
$string['showenrichedvalueteacher'] = 'Mostrar pontos de revisión de enriquecimiento para cada nivel durante la evaluación';
$string['showremarksstudent'] = 'Mostrar anotaciones a quienes son calificados';
$string['showscorestudent'] = 'Mostrar puntos para cada nivel a quienes son calificados';
$string['showscoreteacher'] = 'Mostrar puntos para cada nivel durante la evaluación';
$string['sortlevelsasc'] = 'Ordenación para niveles';
$string['sortlevelsasc0'] = 'Descendiente por número de puntos';
$string['sortlevelsasc1'] = 'Ascendiente por número de puntos';
$string['timestampenrichmentend'] = 'Los cálculos de enriquecimiento se realizan hasta la fecha esperada de envío (si está habilitada)';
$string['timestampenrichmentstart'] = 'Los cálculos de enriquecimiento se realizan desde la fecha disponible (si está habilitada)';
