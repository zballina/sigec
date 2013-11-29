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
 * Strings for component 'format_topcoll', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   format_topcoll
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['arrow'] = 'Flecha';
$string['center'] = 'Centro';
$string['colourrule'] = 'Por favor escriba un color RGB válido, seis dígitos hexadecimales.';
$string['columnhorizontal'] = 'Horizontal';
$string['columnvertical'] = 'Vertical';
$string['ctreset'] = 'Opciones de reinicio de Tópicos Colapsados';
$string['ctreset_help'] = 'Reiniciar a las configuraciones por defecto de Tópicos Colapsados.';
$string['currentsection'] = 'Esta sección';
$string['defaultcoursedisplay'] = 'Vista del curso por defecto';
$string['defaultcoursedisplay_desc'] = 'Mostrar, o todas las secciones en una sola página, o sección cero y la sección elegida en la página.';
$string['defaultlayoutcolumnorientation'] = 'Orientación de la columna por defecto';
$string['defaultlayoutcolumnorientation_desc'] = 'Orientación de la columna por defecto: Horizontal o Vertical.';
$string['defaultlayoutcolumns'] = 'Número de columnas por defecto';
$string['defaultlayoutcolumns_desc'] = 'Número de columnas entre una y cuatro.';
$string['defaultlayoutelement'] = 'Configuración del diseño por defecto';
$string['defaultlayoutelement_desc'] = 'La configuración del diseño puede ser una de:

\'Por defecto\', que muestra todo.

Sin \'Tópico x\' / \'Semana x\' / \'Día x\'.

Sin número de seccción.


Sin \'Tópico x\' / \'Semana x\' / \'Día x\' y sin número de seccción.

Sin palabra \'Alternar\'.


Sin palabra \'Alternar\' y sin \'Tópico x\' / \'Semana x\' / \'Día x\'.

Sin palabra \'Alternar\' y sin \'Tópico x\' / \'Semana x\' / \'Día x\'  y sin número de seccción.';
$string['defaultlayoutelement_descpositive'] = 'La configuración del diseño puede ser una de:

Alternar palabra, \'Tópico x\' / \'Semana x\' / \'Día x\' y número de sección.

Alternar palabra y \'Tópico x\' / \'Semana x\' / \'Día x\'.

Alternar palabra y número de sección.

\'Tópico x\' / \'Semana x\' / \'Día x\' y número de sección.

Alternar palabra.

\'Tópico x\' / \'Semana x\' / \'Día x\'.

Número de sección.

Sin adiciones.';
$string['defaultlayoutstructure'] = 'Configuración de la estructura por defecto.';
$string['defaultlayoutstructure_desc'] = 'La configuración de la estructura puede ser una de:

Tópico

Semana

La Semana Más Reciente primero

Tópico actual Primero

Día';
$string['defaulttgbgcolour'] = 'Color del fondo de alternar por defecto';
$string['defaulttgbgcolour_desc'] = 'Color del fondo de alternar en RGB hexadecimal.';
$string['defaulttgbghvrcolour'] = 'Color del fondo de alternar al pasar el ratón encima';
$string['defaulttgbghvrcolour_desc'] = 'Color del fondo de alternar al pasar el ratón encima en RGB hexadecimal.';
$string['defaulttgfgcolour'] = 'Color del frente de alternar por defecto';
$string['defaulttgfgcolour_desc'] = 'Color del frente de alternar en RGB hexadecimal.';
$string['defaulttogglealignment'] = 'Alineación por defecto del texto de alternar';
$string['defaulttogglealignment_desc'] = '\'Izquierda\', \'Centro\' o \'Derecha\'.';
$string['defaulttoggleallhover'] = 'Por defecto alternar todos los íconos al pasar el ratón encima';
$string['defaulttoggleallhover_desc'] = '\'No\' o \'Sí.';
$string['defaulttoggleiconset'] = 'Conjunto de íconos de alternar por defecto';
$string['defaulttoggleiconset_desc'] = '\'Flecha\' => Conjunto de íconos Flecha.

\'Puento\' =< Conjunto de íconos Punto.

\'Potencia\' => Conjunto de íconos Potencia.';
$string['defaulttogglepersistence'] = 'Persistencia de alternar';
$string['defaulttogglepersistence_desc'] = '\'No\' o \'Sí\'. Usted puede desear desactivarla para una mejora del rendimiento de AJAX, pero no se recordará la selección de alternancia del usuario al refrescar o revisitar páginas.

Nota: Si usted desactiva la persistencia, remueva cualquier fila que contenga \'topcoll_toggle-x\' en el campo  \'name\' (nombre) de la tabla de \'user_preferences\' (preferencias del usuario) en la base de datos. Donde la \'x\' en \'topcoll_toggle_x\' será la ID de un curso.';
$string['defaultuserpreference'] = 'Qué hacer con los alternadores cuando el usuario accesa el curso o añade más secciones';
$string['defaultuserpreference_desc'] = 'Dice qué hacer con los alternadores cuando el usuario accesa el curso por vez primera o el estado de secciones adicionales cuando sean añadidas.';
$string['formatsettings'] = 'Reiniciar Configuraciones del formato';
$string['formatsettingsinformation'] = '<br />Para reiniciar las configuraciones del formato del curso, elija el ícono a la derecha.';
$string['formattopcoll'] = 'Tópicos (temas) colapsados';
$string['four'] = 'Cuatro';
$string['hidefromothers'] = 'Ocultar sección';
$string['left'] = 'Izquierda';
$string['maincoursepage'] = 'Página principal del curso';
$string['markedthissection'] = 'Esta sección está resaltada como la sección actual';
$string['markthissection'] = 'Resaltar esta sección como la sección actual';
$string['nametopcoll'] = 'Tópicos colapsados';
$string['numbersections'] = 'Número de secciones';
$string['off'] = 'Desactivada';
$string['on'] = 'Activada';
$string['one'] = 'Uno';
$string['page-course-view-topcoll'] = 'Cualquier página principal de curso en el formato de tópicos colapsados';
$string['page-course-view-topcoll-x'] = 'Cualquier página de curso en el formato de tópicos colapsados';
$string['pluginname'] = 'Tópicos Colapsados';
$string['point'] = 'Punto';
$string['power'] = 'Potencia';
$string['resetallcolour'] = 'Reiniciar colores para todos los cursos con Tópicos Colapsados';
$string['resetallcolour_help'] = 'Reiniciar los colores a los valores por defecto para todos los cursos, de forma que serán iguales a los de un curso que por primera vez está en formato de Tópicos Colapsados.';
$string['resetalllayout'] = 'Reiniciar diseños para todos los cursos de Tópicos Colapsados';
$string['resetalllayout_help'] = 'Reiniciar los diseños a los valores por defecto para todos los cursos, de forma que serán iguales a los de un curso que por primera vez está en formato de Tópicos Colapsados.';
$string['resetalltogglealignment'] = 'Reiniciar interruptor de alineación para todos los cursos en Tópicos Colapsados';
$string['resetalltogglealignment_help'] = 'Reiniciar alineación a los valores por defecto para todos los cursos, de forma tal que queden como un curso que por vez primera está en formato de Tópicos Colapsados.';
$string['resetalltoggleiconset'] = 'Reiniciar el conjunto de íconos de alternancia para todos los cursos de Tópicos Colapsados';
$string['resetalltoggleiconset_help'] = 'Reinicia el conjunto de íconos de alternancia y alterna todos los cambios al pasar el ratón encima para todos los cursos, de forma tal que queden como un curso que por vez primera está en formato de Tópicos Colapsados.';
$string['resetcolour'] = 'Reiniciar color';
$string['resetcolour_help'] = 'Reiniciar los colores a los valores por defecto de forma que serán iguales a los de un curso que por primera vez está en formato de Tópicos Colapsados.';
$string['resetlayout'] = 'Reiniciar diseño';
$string['resetlayout_help'] = 'Reiniciar el diseño a los valores por defecto de forma que serán iguales a los de un curso que por primera vez está en formato de Tópicos Colapsados.';
$string['resettogglealignment'] = 'Reiniciar interruptor de alineación';
$string['resettogglealignment_help'] = 'Reiniciar el interruptor de alineación a los valores por defecto de forma tal que quede como un curso que por vez primera está en formato de Tópicos Colapsados.';
$string['resettoggleiconset'] = 'Reiniciar el conjunto de íconos de alternancia';
$string['resettoggleiconset_help'] = 'Reinicia el conjunto de íconos de alternancia y alterna todos los cambios al pasar el ratón encima para todos los cursos, de forma tal que queden como un curso que por vez primera está en formato de Tópicos Colapsados.';
$string['right'] = 'Derecha';
$string['section0name'] = 'General';
$string['sectionname'] = 'Sección';
$string['setcolour'] = 'Configurar color';
$string['setcolour_help'] = 'Contiene las configuraciones que tienen que ver con los colores del formato dentro del curso.';
$string['setlayout'] = 'Configurar diseño';
$string['setlayout_all'] = 'Alternar palabra, \'Tópico x\' / \'Semana x\' / \'Día x\' y número de sección.';
$string['setlayoutcolumnorientation'] = 'Configurar orientación de columna';
$string['setlayoutcolumnorientation_help'] = 'Vertical - Las secciones van de arriba hacia abajo.

Horizontal - Las secciones van de izquierda a derecha.';
$string['setlayoutcolumns'] = 'Configurar columnas';
$string['setlayoutcolumns_help'] = 'Cuantas columnas emplear.';
$string['setlayout_default'] = 'Por defecto';
$string['setlayoutelements'] = 'Configurar elementos';
$string['setlayoutelements_help'] = 'Cuanta información sobre los cambiadores / secciones desea Usted mostrar.';
$string['setlayout_help'] = 'Contiene las configuraciones que tienen que ver con el disño del formato dentro del curso.';
$string['setlayout_no_additions'] = 'Sin adiciones';
$string['setlayout_no_section_no'] = 'Sin número de sección';
$string['setlayout_no_toggle_section_x'] = 'Sin cambiador sección x';
$string['setlayout_no_toggle_section_x_section_no'] = 'Sin cambiador sección x y número de sección';
$string['setlayout_no_toggle_word'] = 'Sin palabra cambiador';
$string['setlayout_no_toggle_word_toggle_section_x'] = 'Sin palabra cambiador y cambiador sección x';
$string['setlayout_no_toggle_word_toggle_section_x_section_no'] = 'Sin palabra cambiador , cambiador sección x y número de sección';
$string['setlayout_section_number'] = 'Número de sección';
$string['setlayoutstructure'] = 'Configurar estructura';
$string['setlayoutstructurecurrenttopicfirst'] = 'Tópico actual primero';
$string['setlayoutstructureday'] = 'Día';
$string['setlayoutstructure_help'] = 'La estructura del diseño del curso. Usted puede elegir entre:

 \'Tópicos\' - donde cada sección se presenta como un tópico en el orden del número de la sección.

\'Semanas\' - donde cada sección se presenta como una semana en orden ascendente de semanas desde la fecha de inicio del curso.

\'Semana actual primero\' - que es igual a \'Semanas\', pero la semana actual se muestra hasta arriba y las semanas anteriores en orden descendente se muestran debajo, excepto en el modo de edición en donde la estructura es igual a la de \'Semanas\'

\'Tópico actual primero\' - que es igual al de \'Topicos\' excepto que el tema actual se muestra hasta arriba si ha sido configurado.

\'Día\' - donde cada sección se presenta como un día en orden ascendente desde la fecha de inicio del curso.';
$string['setlayoutstructurelatweekfirst'] = 'La Semana Actual Primero';
$string['setlayoutstructuretopic'] = 'Tópico';
$string['setlayoutstructureweek'] = 'Semana';
$string['setlayout_toggle_section_x'] = '\'Tópico x\' / \'Semana x\' / \'Día x\'';
$string['setlayout_toggle_section_x_section_number'] = '\'Tópico x\' / \'Semana x\' / \'Día x\' y número de sección';
$string['setlayout_toggle_word'] = 'Alternar palabra';
$string['setlayout_toggle_word_section_number'] = 'Alternar palabra y número de sección.';
$string['setlayout_toggle_word_section_x'] = 'Alternar palabra y \'Tópico x\' / \'Semana x\' / \'Día x\'';
$string['settogglealignment'] = 'Configurar el interruptor de la alineación del texto';
$string['settogglealignment_help'] = 'Configura la alineación del texto en el interruptor.';
$string['settoggleallhover'] = 'Configurar el aspecto al  pasar el ratón encima de todos los íconos';
$string['settoggleallhover_help'] = 'Configura si es que el alternar todos los íconos cambiará el aspecto al  pasar el ratón encima de ellos.';
$string['settogglebackgroundcolour'] = 'Alternar fondo';
$string['settogglebackgroundcolour_help'] = 'Configurar el color del fondo de la alternancia.';
$string['settogglebackgroundhovercolour'] = 'Alternar fondo flotante';
$string['settogglebackgroundhovercolour_help'] = 'Configurar el color del fondo de la alternancia cuando el ratón pasa (flota) encima de este';
$string['settoggleforegroundcolour'] = 'Alternar primer plano';
$string['settoggleforegroundcolour_help'] = 'Configura el color del texto en la alternancia';
$string['settoggleiconset'] = 'Configurar conjunto de íconos';
$string['settoggleiconset_help'] = 'Configura conjunto de íconos de la alternancia';
$string['showfromothers'] = 'Mostrar sección';
$string['three'] = 'Tres';
$string['topcollall'] = 'secciones.';
$string['topcoll:changecolour'] = 'Cambiar o reiniciar el color';
$string['topcoll:changelayout'] = 'Cambiar o reiniciar el diseño';
$string['topcoll:changetogglealignment'] = 'Cambiar o reiniciar la alineación de la alternancia';
$string['topcoll:changetoggleiconset'] = 'Cambiar o reiniciar el conjunto de íconos de la alternancia';
$string['topcollclosed'] = 'Cerrar todo';
$string['topcollopened'] = 'Abrir todo';
$string['topcollsidewidth'] = '28pixeles';
$string['topcolltoggle'] = 'Alternar';
$string['two'] = 'Dos';
