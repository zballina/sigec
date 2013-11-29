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
 * Strings for component 'tool_behat', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   tool_behat
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aim'] = 'Esta herramienta administrativa ayuda a desarrolladores y escritores de pruebas para crear archivos de características que describen las funcionalidades de Moodle y las corren automáticamente.';
$string['allavailablesteps'] = 'Todas las definiciones de pasos disponibles';
$string['giveninfo'] = 'Dado. Procesos para configurar el entorno';
$string['infoheading'] = 'Información';
$string['installinfo'] = 'Lea {$a} para ver información acerca de instalación y ejecución de pruebas';
$string['moreinfoin'] = 'Más información en {$a}';
$string['newstepsinfo'] = 'Lea {$a} para ver información acerca de cómo añadir nuevas definiciones de pasos';
$string['newtestsinfo'] = 'Lea {$a} para ver información acerca de cómo escribir nuevas pruebas';
$string['nostepsdefinitions'] = 'No hay definiciones de pasos que coincidan con estos filtros';
$string['pluginname'] = 'Prueba de aceptación';
$string['runclitool'] = 'Para enlistar las definiciones de pasos, Usted necesita correr la herramienta Behat CLI para crear el directorio $CFG->behat_dataroot. Vaya a su moodle dirroot y corra "{$a}"';
$string['stepsdefinitionscomponent'] = 'Área';
$string['stepsdefinitionscontains'] = 'Contiene';
$string['stepsdefinitionsfilters'] = 'Definiciones de pasos';
$string['stepsdefinitionstype'] = 'Tipo';
$string['theninfo'] = 'Entonces. Revisando para asegurar que los resultados sean los esperados';
$string['viewsteps'] = 'Filtro';
$string['wheninfo'] = 'Cuando. Acciones que provocan un evento';
$string['wrongbehatsetup'] = 'Algo está mal con la configuración de behat, asegúrese de que:<ul> <li>Usted corrió  "php admin/tool/behat/cli/init.php" desde su directorio raíz de Moodle</li> <li>vendor/bin/behat file tiene permisos de ejecución</li></ul>';
