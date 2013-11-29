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
 * Strings for component 'qtype_ddmarker', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   qtype_ddmarker
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addmoreitems'] = 'Vacíos para {no} más marcadores';
$string['alttext'] = 'Texto alterno';
$string['answer'] = 'Respuesta';
$string['bgimage'] = 'Imagen de fondo';
$string['clearwrongparts'] = 'Mover marcadores colocados incorrectamente de regreso a su posición inicial por defecto debajo de imagen';
$string['confirmimagetargetconversion'] = 'Usted está a punto de convertir las preguntas destino de imágenes de arriba hacia tipos de preguntas de marcadores arrastrar y soltar.';
$string['convertingimagetargetquestion'] = 'Pregunta convertida "{$a->name}"';
$string['coords'] = 'Corrdenadas';
$string['correctansweris'] = 'La respuesta correcta es: {$a}';
$string['draggableimage'] = 'Imagen arrastrable';
$string['draggableitem'] = 'Item arrastrable';
$string['draggableitemheader'] = 'Item arrastrable {$a}';
$string['draggableitemtype'] = 'Tipo';
$string['draggableword'] = 'Texto arrastrable';
$string['dropbackground'] = 'Imagen de fondo a donde arrastrar los marcadores';
$string['dropzone'] = 'Zona para soltar {$a}';
$string['dropzoneheader'] = 'Zonas para soltar';
$string['followingarewrong'] = 'Los siguientes marcadores han sido colocados en el área equivocada : {$a}.';
$string['followingarewrongandhighlighted'] = 'Los siguientes marcadores fueron colocados equivocadamente: {$a}. Marcador(es) resaltado(s) se muestra(n) con la localización correcta.<br /> Elija el marcador para resaltar el área permitida..';
$string['formerror_nobgimage'] = 'Usted necesita seleccionar una imagen para usar como fondo para el área de arrastrar y colocar.';
$string['formerror_noitemselected'] = 'Usted ha especificado una zona para soltar, pero no eligió al marcador que debe arrastrarse a esa zona.';
$string['formerror_nosemicolons'] = 'No hay punto y coma en su cadena de coordenadas. Sus coordenadas para un(a)  {$a->shape} deberían expresarse como - {$a->coordsstring}.';
$string['formerror_onlysometagsallowed'] = 'Solamente se permiten etiquetas (tags)  "{$a}" en una etiqueta (label) para un marcador';
$string['formerror_onlyusewholepositivenumbers'] = 'Por favor solamente use números enteros positivos para especificar coordenadas x,y y/o  ancho y alto de formas. Sus coordenadas para un(a) {$a->shape} deberían expresarse como - {$a->coordsstring}.';
$string['formerror_polygonmusthaveatleastthreepoints'] = 'Para una forma de polígono, Usted debe especificar al menos 3 puntos. Sus coordenadas para un(a) {$a->shape} deberían expresarse como - {$a->coordsstring}.';
$string['formerror_shapeoutsideboundsofbgimage'] = 'La forma que Usted ha definido se sale de los límites de la imagen de fondo';
$string['formerror_toomanysemicolons'] = 'Existen demasiadas partes separadas por punto y coma en las coordenadas que Usted ha especificado. Sus coordenadas para un(a) {$a->shape} deberían expresarse como - {$a->coordsstring}.';
$string['formerror_unrecognisedwidthheightpart'] = 'No reconocemos el alto y ancho que Usted ha especificado. Sus coordenadas para un(a) {$a->shape} deberían expresarse como - {$a->coordsstring}.';
$string['formerror_unrecognisedxypart'] = 'No reconocemos las coordenadas x,y que Usted ha especificado. Sus coordenadas para un(a) {$a->shape} deberían expresarse como - {$a->coordsstring}.';
$string['imagetargetconverter'] = 'Convertir preguntas de imagen destino a marcador arrastrar y soltar';
$string['infinite'] = 'Infinito';
$string['listitemconfirmcategory'] = 'A punto de convertir todas las preguntas de destino imagen de la categoría "{$a->name}" (contiene {$a->qcount} preguntas destinoimagen)';
$string['listitemconfirmcontext'] = 'A punto de convertir todas las preguntas de destino imagen en el contexto "{$a->name}" (contiene {$a->qcount} preguntas destinoimagen)';
$string['listitemconfirmquestion'] = 'A punto de convertir la pregunta "{$a->name}"';
$string['listitemlistallcategory'] = 'Seleccionar todas las preguntas de destinoimagen en la categoría "{$a->name}" (contiene {$a->qcount} preguntas destinoimagen)';
$string['listitemlistallcontext'] = 'Seleccionar todas las preguntas de destinoimagen en el contexto "{$a->name}" (contiene {$a->qcount} preguntas destinoimagen)';
$string['listitemlistallquestion'] = 'Elegir pregunta "{$a->name}"';
$string['listitemprocessingcategory'] = 'Convirtiendo todas las preguntas de destinoimagen en la categoría "{$a->name}" (contiene {$a->qcount} preguntas destinoimagen)';
$string['listitemprocessingcontext'] = 'Convirtiendo todas las preguntas de destinoimagen en el contexto "{$a->name}" (contiene {$a->qcount} preguntas destinoimagen)';
$string['listitemprocessingquestion'] = 'Pregunta convertida "{$a->name}"';
$string['marker'] = 'Marcador';
$string['marker_n'] = 'Marcador {no}';
$string['markers'] = 'Marcadores';
$string['nolabel'] = 'No texto de etiqueta';
$string['noofdrags'] = 'Número';
$string['noquestionsfound'] = 'No se encontraron preguntas para convertir aquí';
$string['pleasedragatleastonemarker'] = 'Su respuesta no está completa. Usted debe poner al menos un marcador sobre la imagen.';
$string['pluginname'] = 'Marcadores arrastrar y soltar';
$string['pluginnameadding'] = 'Agregando marcadores arrastrar y soltar';
$string['pluginnameediting'] = 'Editando marcadores arrastrar y soltar';
$string['pluginname_help'] = 'elija un archivo de imagen de fondo, escriba etiquetas de texto para marcadores y defina las zonas para soltar sobre la imagen de fondo a donde deben de arrastrarse.';
$string['pluginnamesummary'] = 'Los marcadores se arrastran y sueltan sobre una imagen de fondo.';
$string['previewareaheader'] = 'Vista previa';
$string['previewareamessage'] = 'Elija un archivo de imagen de fondo, escriba etiquetas de texto para los marcadores y defina las zonas para soltar sobre la imagen de fondo en donde deberán arrastrarse.';
$string['refresh'] = 'Refrescar vista previa';
$string['shape'] = 'Forma';
$string['shape_circle'] = 'Círculo';
$string['shape_circle_coords'] = 'x,y;r (donde x,y son las coordenadas xy del centro del círculo y r es el radio)';
$string['shape_circle_lowercase'] = 'círculo';
$string['shape_polygon'] = 'Polígono';
$string['shape_polygon_coords'] = 'x1,y1;x2,y2;x3,y3;x4,y4....(donde x1, y1 son las coordenadas x,y del primer vértice, x2, y2 son las coordenadas x,y del segundo, etc. Usted no necesita repetir las coordenadas del primer vértice para cerrar el polígono)';
$string['shape_polygon_lowercase'] = 'polígono';
$string['shape_rectangle'] = 'Rectángulo';
$string['shape_rectangle_coords'] = 'x,y;w,h (donde x,y son las coordenadas x,y de la esquina superior izquierda del rectángulo mientras que w y h son el ancho y alto del rectángulo)';
$string['shape_rectangle_lowercase'] = 'rectángulo';
$string['showmisplaced'] = 'Resaltar las zonas para soltar en donde no se han soltado los marcadores correctos';
$string['shuffleimages'] = 'Barajar items para arrastrar cada vez que se intente la pregunta';
$string['stateincorrectlyplaced'] = 'Mostrar cuales marcadores están colocados incorrectamente';
$string['summariseplace'] = '{$a->no}. {$a->text}';
$string['summariseplaceno'] = 'Zona para soltar {$a}';
$string['ytop'] = 'Superior';
