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
 * Strings for component 'local_staticpage', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   local_staticpage
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apacherewrite'] = 'Forzar Apache mod_rewrite';
$string['apacherewrite_desc'] = 'Servir solamente páginas estáticas con una URL limpia, re-escritas por Apache mod_rewrite. Vea el archivo  README para los detalles.';
$string['documentdirectory'] = 'Directorio del documento';
$string['documentdirectory_desc'] = 'El directorio del documento que contiene los archivos HTML con el código HTML de las páginas estáticas. Vea el archivo README para los detalles.';
$string['documentheadingsource'] = 'Orígen de datos del encabezado del documento';
$string['documentheadingsource_desc'] = 'El orígen de los datos del encabezado de la página estática del documento';
$string['documentlist'] = 'Lista de documentos';
$string['documentlistdirectoryempty'] = 'No hay archivos .html en el directorio del documento, por lo que no hay páginas estáticas para entregar. Vea el archivo README para los detalles.';
$string['documentlistdirectorynotreadable'] = 'El directorio del documento no es legible, por lo que no hay páginas estáticas para entregar.';
$string['documentlistentryfilename'] = 'Se encontró el siguiente archivo del documento:<br /><strong>{$a}</strong>';
$string['documentlistentrylanguage'] = 'El documento estará disponible para el siguiente idioma:<br /><strong>{$a}</strong>';
$string['documentlistentrypagename'] = 'A partir del nombre del archivo del documento, Moodle entregó el siguiente nombre-de-página (pagename):<br /><strong>{$a}</strong>';
$string['documentlistentryreachablefail'] = 'El documento debería de estar disponible en la siguiente URL limpia, pero en realidad un navegador no podrá descargarlo y verlo (posiblemente haya algo mal con su configuración del servidor web - vea el archivo README para más detalles):<br /><strong>{$a}</strong>';
$string['documentlistentryreachablesuccess'] = 'El documento está disponible y puede ser enlazado en la siguiente URL:<br /><strong>{$a}</strong>';
$string['documentlistentryrewritefail'] = 'El documento debería de estar disponible en la siguiente URL limpia, pero en realidad un navegador no podrá descargarlo y verlo (posiblemente haya algo mal con su servidor web o la configuración de  mod_rewrite - vea el archivo README para más detalles):<br /><strong>{$a}</strong>';
$string['documentlistentryrewritesuccess'] = 'El documento está disponible y puede ser enlazado en la siguiente URL limpia:<br /><strong>{$a}</strong>';
$string['documentlistentryunsupported'] = 'El sufijo del nombre-de-archivo (filename) se refiere a un paquete de idioma no soportado y; por lo tanto, el documento <strong>no estará disponible</strong>. Por favor cambie el nombre-de-archivo del documento hacia un paquete de idioma soportado.';
$string['documentlistinstruction'] = 'Esta lista muestra todos los archivos que se han encontrado en el directorio del documento y sus URLs';
$string['documentlistnodirectory'] = 'El directorio del documento no existe; por lo tanto,  no hay páginas estáticas para entregar.';
$string['documentnavbarsource'] = 'Orígen de los datos de título de la ruta de navegación del ítem';
$string['documentnavbarsource_desc'] = 'El orígen de los datos de la la ruta de navegación de la página estática del ítem (Usada en la Barra de Navegación de Moodle)';
$string['documenttitlesource'] = 'Orígen de los datos del título del documento';
$string['documenttitlesource_desc'] = 'El orígen de los datos del título de la página estática del ítem (Usada en la Barra de título del navegador)';
$string['documenttitlesourceh1'] = 'Primera marca (tag) h1 del código HTML (usualmente localizada poco después de abrir la marca (tag) del cuerpo (body)';
$string['documenttitlesourcehead'] = 'Primera marca del título en código HTML (usualmente localizada dentro de la marca (tag) del cuerpo (body)';
$string['international'] = 'Todos los idiomas';
$string['pagenotfound'] = 'Página no encontrada';
$string['pluginname'] = 'Páginas estáticas';
