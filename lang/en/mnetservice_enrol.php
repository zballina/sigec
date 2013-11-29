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
 * Strings for component 'mnetservice_enrol', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   mnetservice_enrol
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['availablecourseson'] = 'Cursos disponibles en {$a}';
$string['availablecoursesonnone'] = 'El host remoto <a href="{$a->hosturl}">{$a->hostname}</a> no ofrece ningun curso para nuestros usuarios.';
$string['clientname'] = 'Cliente de inscripciones remotas';
$string['clientname_help'] = 'Esta herramienta le permite Inscribir y dar de baja usuarios de su instalación en los hosts remotos de Moodle que le permitan hacerlo a través del Plugin de inscripción remota MNet.';
$string['editenrolments'] = 'Editar inscripciones';
$string['hostappname'] = 'Aplicación';
$string['hostname'] = 'Nombre del host';
$string['hosturl'] = 'URL del host remoto';
$string['nopublishers'] = 'No hay pares (peers) remotos disponibles.';
$string['noroamingusers'] = 'Los usuarios necesitan el permiso \'{$a}\' en el contexto del sistema para inscribirse a cursos remotos. Sin embargo actualmente no hay usuarios con este permiso. Elija el boton \'Continuar\' para asignar el permiso requerido a uno o más roles en su siti.';
$string['otherenrolledusers'] = 'Otros usuarios inscritos';
$string['pluginname'] = 'Servicio de inscripción remoto';
$string['refetch'] = 'Re-buscar estado actualizado para los hosts remotos';
