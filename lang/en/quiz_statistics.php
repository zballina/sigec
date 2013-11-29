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
 * Strings for component 'quiz_statistics', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   quiz_statistics
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actualresponse'] = 'Respuesta actual';
$string['allattempts'] = 'todos los intentos';
$string['allattemptsavg'] = 'Calificación promedio de todos los intentos';
$string['allattemptscount'] = 'Número total de intentos completos calificados';
$string['analysisofresponses'] = 'Análisis de respuestas';
$string['analysisofresponsesfor'] = 'Análisis de respuestas para {$a}.';
$string['attempts'] = 'Intentos';
$string['attemptsall'] = 'todos los intentos';
$string['attemptsfirst'] = 'primer intento';
$string['backtoquizreport'] = 'Regresar a página principal de reporte de estadísticas';
$string['calculatefrom'] = 'Calcular estadísticas de';
$string['cic'] = 'Coeficiente de consistencia interna (para {$a})';
$string['completestatsfilename'] = 'completestats';
$string['count'] = 'Número';
$string['coursename'] = 'Nombre del curso';
$string['detailedanalysis'] = 'Análisis más detallado de las respuestas a esta pregunta';
$string['discrimination_index'] = 'Índice de Discriminación';
$string['discriminative_efficiency'] = 'Eficiencia discriminativa';
$string['downloadeverything'] = 'Descargar reporte completo como  {$a->formatsmenu} {$a->downloadbutton}';
$string['duration'] = 'Abierto por';
$string['effective_weight'] = 'Peso efectivo';
$string['errordeleting'] = 'Error al borrar registros {$a} antiguos.';
$string['erroritemappearsmorethanoncewithdifferentweight'] = 'La pregunta ({$a}) aparece más de una vez en el examen con diferentes puntajes de calificación. Actualmente esto no está soportado en el informe de estadísticas y puede hacer que las estadísticas para esta pregunta no sean fiables.';
$string['errormedian'] = 'Error al buscar mediana';
$string['errorpowerquestions'] = 'Error al buscar datos para calcular varianza para calificaciones de preguntas';
$string['errorpowers'] = 'Error al recuperar datos para calcular la varianza de las calificaciones del examen';
$string['errorrandom'] = 'Error al obtener datos del sub elemento';
$string['errorratio'] = 'Tasa de error (para {$a})';
$string['errorstatisticsquestions'] = 'Error al buscar datos para calcular estadísticas para calificaciones de preguntas';
$string['facility'] = 'Índice de facilidad';
$string['firstattempts'] = 'primeros intentos';
$string['firstattemptsavg'] = 'Calificación promedio de primeros intentos';
$string['firstattemptscount'] = 'Número de primeros intentos completos calificados';
$string['frequency'] = 'frecuencia';
$string['intended_weight'] = 'Peso deseado';
$string['kurtosis'] = 'Curtosis de la distribución de puntuaciones (para {$a})';
$string['lastcalculated'] = 'El último cálculo fue hace  {$a->lastcalculated} y desde entonces se han realizado  {$a->count} intentos.';
$string['median'] = 'Mediana de calificación (de {$a})';
$string['modelresponse'] = 'Respuesta modelo';
$string['negcovar'] = 'Covarianza negativa de esta calificación con la calificación total del examen';
$string['negcovar_help'] = 'La calificación de la pregunta para este juego de intentos varía en forma inversa a la calificación promedio. Esto significa que la calificación general tiende a estar debajo del promedio cuando la calificación para esta pregunta está sobre el promedio y viceversa.

Nuestra ecuación para el peso efectivo de la pregunta no puede calcularse en este caso. Los cálculos para el peso efectivo de la pregunta para las otras preguntas de este examen son el peso efectivo de la pregunta si las preguntas resaltadas con una covarianza negativa tienen un grado máximo de cero.

Si edita un examen y les pone a estas preguntas con covarianza negativa una calificación máxima de cero, entonces  el peso efectivo de estas preguntas será cero y el peso efectivo real de la pregunta será como se calcule ahora.';
$string['nostudentsingroup'] = 'Aún no hay estudiantes en este grupo';
$string['optiongrade'] = 'Crédito parcial';
$string['partofquestion'] = 'Parte de pregunta';
$string['pluginname'] = 'Estadísticas';
$string['position'] = 'Posición';
$string['positions'] = 'Posición(es)';
$string['questioninformation'] = 'Información sobre la pregunta';
$string['questionname'] = 'Nombre de la pregunta';
$string['questionnumber'] = 'Q#';
$string['questionstatistics'] = 'Estadísticas de la pregunta';
$string['questionstatsfilename'] = 'completestats';
$string['questiontype'] = 'Tipo de pregunta';
$string['quizinformation'] = 'Información del examen';
$string['quizname'] = 'Nombre del examen';
$string['quizoverallstatistics'] = 'Estadísticas globales del examen';
$string['quizstructureanalysis'] = 'Análisis de la estructura del examen';
$string['random_guess_score'] = 'Calificación aleatoria estimada';
$string['recalculatenow'] = 'Recalcular ahora';
$string['response'] = 'Respuesta';
$string['skewness'] = 'Sesgo de la distribución de puntuaciones (para {$a})';
$string['standarddeviation'] = 'Desviación estándar (para {$a})';
$string['standarddeviationq'] = 'Desviación estándar';
$string['standarderror'] = 'Error estándar (para {$a})';
$string['statistics'] = 'Estadísticas';
$string['statistics:componentname'] = 'Informe estadístico del examen';
$string['statisticsreport'] = 'Reporte de Estadísticas';
$string['statisticsreportgraph'] = 'Estadísticas para posiciones de pregunta';
$string['statistics:view'] = 'Ver reporte de estadísticas';
$string['statsfor'] = 'Estadísticas del examen (para {$a})';
