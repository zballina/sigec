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
 * Strings for component 'flashcard', language 'es_mx', branch 'MOODLE_23_STABLE'
 *
 * @package   flashcard
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addone'] = 'Añadir una nueva pregunta';
$string['addthree'] = 'Añadir tres nuevas preguntas';
$string['answer'] = 'Respuestas';
$string['answersmediatype'] = 'Tipo de medio para respuestas';
$string['autodowngrade'] = 'Permitir autodesvalorar';
$string['autodowngrade_help'] = 'Esta opción permite el desvaloramiento automático de cartas. Un juego está erosionado si el alumno no revisa el juego por un tiempo (vea tiempos más abajo). Las cartas muy viejas en los paquetes son más difíciles de regresar al primer paquete. La taza de erosión depende de la configuración de los varios retrasos para cada paquete.';
$string['avgaccess'] = 'Número de rascados (ticks) por carta';
$string['backside'] = 'Flashea de vuelta la carta';
$string['backtocourse'] = 'Regresa al curso';
$string['backtodecks'] = 'Regresa a la mesa de cartas';
$string['badcards'] = 'Carta(s) rechazada(s):';
$string['bycards'] = 'Por cartas';
$string['byusers'] = 'Por usuario';
$string['card'] = 'Carta';
$string['cardsep'] = 'Separador de carta en importación de texto:';
$string['cardsindeck'] = 'Quedan : {$a} carta(s)';
$string['cardsread'] = 'Carta(s) leídas:';
$string['cardsremaining'] = 'Cartas restantes';
$string['confirm'] = 'Confirmar:';
$string['counters'] = 'Contadores';
$string['customisation'] = 'Para configurar esta instancia de flashcard, obtenga la hoja patrón de estilo debajo de , <br/>editela y guerdela dentro de la  <a href="{$a}">moddata/flashcard</a>/&lt;<i>instancia</i>&gt; del directorio en los archivos del curso.<br/> Si emplea imágenes como fondos, guárdelos en el mismo lugar, y podrá invocarlas con sus nombres simples';
$string['deck'] = 'Mazo de cartas';
$string['deck1_delay'] = 'Retraso del disparo de revisión (mazo 1)';
$string['deck2_delay'] = 'Retraso del disparo de revisión (mazo 2)';
$string['deck2_release'] = 'Tiempo extra de autodesvaloración (mazo 2)';
$string['deck3_delay'] = 'Retraso del disparo de revisión (mazo 3)';
$string['deck3_release'] = 'Tiempo extra de autodesvaloración (mazo 3)';
$string['deck4_delay'] = 'Retraso del disparo de revisión (mazo 4)';
$string['deck4_release'] = 'Tiempo extra de autodesvaloración (mazo 3)';
$string['deck_delay'] = 'Disparo de revisión';
$string['deck_delay_help'] = 'Tiempo ajustable en horas en las cuales el mazo está marcado "para revisar"';
$string['deck_release'] = 'Autodesvalorar';
$string['deck_release_help'] = 'Tiempo en horas, despues del cual las cartas se regresan al mazo superior. Cada paquete puede ajustarse diferentemente.';
$string['decks'] = 'Mazos';
$string['decks_help'] = 'Permite elegir 2,3, o 4 mazos. Tipicamente, el sistema Leitner usa 3 mazos. 4 mazos ampliarán el ciclo de memorización más difícil o pueden aprenderse juegos de cartas más grandes. 2 mazos será conveniente para juegos simples o ensambles de pequeño tamaño.';
$string['deckstates'] = 'Estado del juego';
$string['deleteselection'] = 'Borrar la selección';
$string['difficultcards'] = 'Juego difícil';
$string['easycards'] = 'Juego fácil';
$string['edit'] = 'Editar las cartas';
$string['editingcards1'] = 'Editar el juego de Flashcards';
$string['editingcards2'] = 'Editar el juego de Flashcards';
$string['emptyset'] = 'El juego de Flashcards está vacío';
$string['endtime'] = 'Se acabó el tiempo';
$string['fieldsep'] = 'Separador de campo:';
$string['flashback:manage'] = 'Administrar las cartas';
$string['flashcard:canplayfree'] = 'Juego en modo libre';
$string['flashcard:manage'] = 'Administrar las cartas';
$string['flipdeck'] = 'Voltear respuestas y preguntas';
$string['flipdeck_help'] = 'Esta opción permite invertir las cartas. Si se habilita, las preguntas se escribirán en la parte trasera de las cartas como si fuesen respuestas y viceversa.';
$string['forcereload'] = 'Forzar recarga de pregunta';
$string['forcereload_help'] = 'Forzar recarga del juego de cartas. Habilitar esta casilla forzará que el juego de cartas se recargue con datos del tipo de preguntas pareadas. Todos los datos del usuario grabados se perderán y todas las cuentas se resetearán.';
$string['freegame'] = 'Juego libre';
$string['freeplayinstructions'] = 'Piense en la respuesta, voltee la carta, y evalúe su respuesta para ver si le atinó (ya se la sabe). Puede extraer esta carta del mazo o probar con otra carta. El mazo se presenta en orden aleatorio. Revise todo el mazo una vuelta completa de ser posible.';
$string['frontside'] = 'Frente de la carta';
$string['goodcards'] = 'Carta(s) válida(s):';
$string['havetologin'] = 'Tiene que registrarse antes de enviar su elección';
$string['ifailed'] = '¡ Fallé !';
$string['igotit'] = '¡ Le atiné !';
$string['image'] = 'imágen';
$string['imageplussound'] = 'imágen + sonido';
$string['import'] = 'Importar';
$string['importadvice'] = 'Al importar un nuevo juego de cartas, Usted removerá el juego antiguo junto con la información previa sobre los jugadores';
$string['imported'] = 'Importar:';
$string['import_help'] = 'Usted puede importar en forma masiva pares de pregunta/respuesta dentro de un flashcard usando la opción de importación de cartas a granel. Solo necesita hacer un archivo con la lista de pares de preguntas/respuestas y pegar el contenido de ese archivo en el área de texto del importador. Usted puede decidir codificar este archivo con alguno de los separadores comunes en sistemas Linux o Windows. El más común puede ser archivos de "una pareja por línea", usar \':\' o la coma para separar las preguntas de las respuestas. Las preguntas deben venir primero y SIEMPRE deben tener una respuesta. Las líneas vacías o líneas negras serán ignoradas, igual que las que empiecen con un # o diagonal (/). El importador hará una revisión rápida del texto a importar y rechazará la importación si la secuencia del texto no está bien formada y le dirá cuantas parejas están mal en el archivo. Dado que la importación exitosa borrará todos los datos de los mazos y la información sobre los participantes, aparecerá una casilla de verificación que debe de aprobarse para que se realice la importación.';
$string['importingcards'] = 'Importar cartas';
$string['importreport'] = '<b>Flashcard ha importado nuevas cartas :</b>';
$string['instructions'] = 'Haga click sobre la carta (flashcard) para voltearla y ver el lado opuesto';
$string['leitnergame'] = 'Juego Leitner';
$string['matchingquestion'] = 'Pregunta pareada (relación de columnas) del banco de preguntas';
$string['maxaccess'] = 'Más rascadas vistas';
$string['mediatypes'] = 'Tipo de medio';
$string['mediatypes_help'] = 'Esta lista define el tipo de medio empleado para las preguntas.

*Texto: El texto introducido se imprime literalmente sobre las cartas.  *Imagen: El texto introducido es la localización de un archivo de imágen en el servidor, tomado de los archivos del curso.
*Sonido: El texto introducido es la localización de un archivo de sonido en el servidor, tomado de los archivos del curso.';
$string['mediumeffortcards'] = 'Juego de esfuerzo medio';
$string['minaccess'] = 'Rascadas  menos vistas';
$string['missingimage'] = '{Archivo de imágen faltante}';
$string['missingsound'] = '{Archivo de sonido faltante}';
$string['modulename'] = 'Juego de Flashcards';
$string['modulenameplural'] = 'Flash Cards';
$string['next'] = 'Siguiente carta';
$string['nocards'] = 'No hay cartas definidas.';
$string['noflashcards'] = 'No hay cartas en este curso.';
$string['nomorecards'] = 'Ya no hay más cartas.';
$string['nosubquestions'] = 'Error: ¡ Faltan subpreguntas para esta pregunta!';
$string['notinitialized'] = 'Este estudiante nunca empleó esta flashcard.';
$string['nousers'] = 'No hay estudiantes en este curso.';
$string['num'] = 'N°';
$string['numericrequired'] = 'Se necesita un número.';
$string['outoftimerange'] = 'Este módulo se cerró por horario. No puede usarlo ahora.';
$string['playwithme'] = 'Aprende con este mazo';
$string['pluginadministration'] = 'Administración de flashcard';
$string['pluginname'] = 'Flashcard';
$string['previous'] = 'Carta anterior';
$string['question'] = 'Preguntas';
$string['questionid'] = 'Pregunta a importar';
$string['questionsmediatype'] = 'Tipo de medio de pregunta';
$string['reinforce'] = 'revisar este mazo';
$string['removecard'] = 'Remover carta';
$string['reset'] = 'Resetear juego de cartas';
$string['sound'] = 'sonido';
$string['sourcequestion'] = 'Pregunta a importar';
$string['sourcequestion_help'] = 'Elige una pregunta como orígen. Puede armar rápido un mazo de cartas desde una pregunta de relacionar columnas del banco de preguntas. Para proceder, elija una pregunta de la lista y tache la casilla "forzar recarga". Todas las cartas previas se borrarán y se recargarán con los datos de las preguntas. Advertencia: el cambiar las cartas empleando el editor de cartas NO cambiará el contenido de las preguntas del banco de preguntas.';
$string['starttime'] = 'Hora de inicio';
$string['stylesheet'] = 'Obtener la hoja de estilo';
$string['styling'] = 'Ajustar al gusto del cliente';
$string['sumaccess'] = 'Total de cartas vistas';
$string['summary'] = 'resumen del juego de cartas';
$string['teachersummary'] = 'Resumen';
$string['text'] = 'texto';
$string['timetoreview'] = 'Quedan {$a} días antes de la revisión';
$string['trivialcards'] = 'Cartas triviales';
$string['undefinedquestionset'] = 'No se eligió una pregunta pareada en los exámenes para este juego de cartas';
$string['userdecks'] = 'Mazos de los usuarios';
$string['viewed'] = 'Vistas';
