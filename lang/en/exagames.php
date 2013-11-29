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
 * Strings for component 'exagames', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   exagames
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['configure_questions'] = 'Configurar Preguntas';
$string['configure_quiz'] = 'Configurar examen';
$string['exagamesintro'] = 'Introducción';
$string['exagamesname'] = 'Nombre';
$string['game_braingame'] = 'juegocerebro';
$string['game_gamelabs'] = 'gamelabs.at';
$string['game_tiles'] = 'exaclick';
$string['game_tiles_rules'] = '¿Está listo para el reto exaclick?
Try to recognize what you see on these pictures and answer the questions. Here is what you need to do:<br />1. Click “Start” and a hidden image will appear. Tiles will gradually drop revealing more and more of the image/clip.<br />2. If you think you know enough, click “Stop”, the earlier you click “Stop” the higher your score will be. – But watch out!  If you click too early you might not yet see enough to answer the question!<br />3. Answer the pertaining question before time runs out.  You have 40 seconds to answer each question. You will get a higher score for more difficult questions and the faster you answer. Give a wrong answer and you will lose a life.<br />4. Keep on going until the end of the game<br />The questions will get more and more difficult. Be careful, you only have three lives. Only the most courageous and clever learners will be able to break the high-score. May the force be with you!';
$string['gametype'] = 'Tipo-de-Juego';
$string['gametype_help'] = 'Los Juegos Exabis actualmente consisten de tres juegos diferentes:
* juegocerebro - aquí se mejoran los exámenes de Moodle con una animación divertida en Flash. el objetivo es catapultar al científico al espacio exterior - ¡al no contestar todas las preguntas correctamente el científico únicamente se cae al agua!

* exaclick descubre una imágen para el jugador. Si se elige el botón de paro (stop) el tiempo se detiene y se tiene que contestar una pregunta de examen de Moodle. La pregunta debe ser configurada al principio por el entrenador mediante el editor de Flash en la pestaña de "configurar pregunta"(configure questions).<br /><br />

ATENCIÓN: El juego solamente acepta ligas hacia archivos que sean accesibles para los estudiantes dentro de Moodle, por ejemplo: dentro de la carpeta de un curso. La imágen debe de haberse subido antes de configurar la pregunta.

* gamelabs.at - Este creador de aventuras en línea de código abierto le permite crear pequeñas aventuras basadas en cualquier tema. Los juegos que hayan sido creados (por un entrenador o un alumno) se pueden incrustar en Moodle aquí.';
$string['modulename'] = 'Juegos Exabis';
$string['modulenameplural'] = 'Juegos Exabis';
$string['noquizzesincourse'] = 'favor de crear  {$a->linkTag}un nuevo examen</a> primero, ¡antes de añadir un Juego Exabis!!';
$string['pluginadministration'] = 'Administración de Juegos Exabis';
$string['pluginname'] = 'Juegos Exabis';
$string['question_configured'] = 'Pregunta configurada';
$string['question_not_configured'] = 'Pregunta no configurada';
$string['quizid'] = 'examen';
$string['quizid_help'] = 'elija el examen en que se basará el juegocerebro o exaclick';
$string['savingdata'] = 'Guardando datos...';
$string['url'] = 'URL';
$string['url_help'] = 'pegue su juego de aventuras de gamelabs.at-aquí para incrustarlo.<br /><br />esta opción únicamente trabajará con una liga-a-juego-gamelabs y no requiere de preguntas de Moodle.';
$string['version_5.2.0_needed'] = 'Exajuegos requiere al menos PHP-Versión 5.2.0';
