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
 * Strings for component 'tool_langimport', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   tool_langimport
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['install'] = 'Instalar paquete(s) de idioma(s) seleccionado(s)';
$string['installedlangs'] = 'Paquetes de idioma instalados';
$string['langimport'] = 'Utilería para importar idioma';
$string['langimportdisabled'] = 'Se ha deshabilitado la opción de importación de idioma. Deberá actualizar sus paquetes de idioma manualmente en el nivel de sistema de archivos. No olvide purgar el caché de cadenas después de hacerlo.';
$string['langpackinstalled'] = 'El paquete de idioma "{$a}" se ha instalado con éxito';
$string['langpackremoved'] = 'El paquete de idioma fue desinstalado';
$string['langpackupdateskipped'] = 'Se pasó por alto la actualización del paquete de idioma {$a}';
$string['langpackuptodate'] = 'El paquete de idioma {$a} está al día.';
$string['langupdatecomplete'] = 'Se completó la actualización del paquete de idioma';
$string['missingcfglangotherroot'] = 'Falta el valor de configuración $CFG->langotherroot';
$string['missinglangparent'] = 'Falta idioma padre <em>{$a->parent}</em> de <em>{$a->lang}</em>.';
$string['nolangupdateneeded'] = 'Todos los paquetes de idioma están al día: no se necesita actualizarlos';
$string['pluginname'] = 'Paquetes de idioma';
$string['purgestringcaches'] = 'Purgar cachés de cadenas de texto';
$string['remotelangnotavailable'] = 'Debido a que Moodle no puede conectarse a download.moodle.org, no es posible instalar los paquetes de idioma automáticamente. Por favor, descargue los archivos ZIP apropiados de <a href="http://download.moodle.org/langpack/">download.moodle.org/langpack</a>, cópielos a su directorio {$a} y descomprímalos manualmente.';
$string['uninstall'] = 'Desinstalar paquete(s) de idioma(s) seleccionado(s)';
$string['uninstallconfirm'] = 'Está a punto de desinstalar por completo el paquete de idioma {$a}; ¿está Usted seguro?';
$string['updatelangs'] = 'Actualizar todos los paquetes de idioma instalados';
