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
 * Strings for component 'enrol_autoenrol', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   enrol_autoenrol
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['alwaysenrol'] = 'Inscribir siempre';
$string['alwaysenrol_help'] = 'Cuando se pone en \'Si\' los plugins siempre incribirán alos usuarios, aún cuando ellos ya hubieran accedido al curso mediante otro método.';
$string['auto'] = 'Auto';
$string['auto_desc'] = 'Este grupo ha sido creado automáticamente por el plugin de Auto inscribir. Será eliminado si Usted remueve el plugin de Auto Inscribir del curso.';
$string['autoenrol:config'] = 'Configurar inscripciones automáticas';
$string['autoenrol:method'] = 'Un usuario puede inscribir usuarios al curso al entrar';
$string['autoenrol:unenrol'] = 'Usuario puede des-inscribir usuarios auto-inscritos';
$string['autoenrol:unenrolself'] = 'Usuario puede des-inscribirse a sí mismo si fueron inscritos al accesar';
$string['config'] = 'Configuración';
$string['countlimit'] = 'Límite';
$string['countlimit_help'] = 'Esta instancia cuenta el número de inscripciones que hace en un curso y puede dejar de inscribir usarios cuando se alcanza un cierto nivel. La configuración por defecto de 0 significa ilimitado.';
$string['defaultrole'] = 'Asignación de rol por defecto';
$string['defaultrole_desc'] = 'Seleccionar rol que será asignado a los usuarios durante las inscripciones automáticas';
$string['filter'] = 'Permitir solamente';
$string['filter_help'] = 'Cuando se selecciona un enfoque de grupo, Usted puede usar este campo para filtrar qué tipo de usuario desea inscribir al curso. Por ejemplo: si agrupó por autenticación y filtró para solamente "manual", solamente los usuarios que hubieran sido registrados directamente en el sitio serían inscritos.';
$string['filtering'] = 'Filtradod e usuarios';
$string['g_auth'] = 'Método de Autenticación';
$string['g_dept'] = 'Departamento';
$string['g_email'] = 'Dirección Email';
$string['general'] = 'General';
$string['g_inst'] = 'Institución';
$string['g_lang'] = 'Idioma';
$string['g_none'] = 'Seleccionar...';
$string['groupon'] = 'Agrupar por';
$string['groupon_help'] = 'Auto Inscribir puede añadir usuarios automáticamente cuando son inscritos basados en uno de estos campos de usuario.';
$string['instancename'] = 'Etiqueta personalizada';
$string['instancename_help'] = 'Usted puede añadir una etiqueta personalizada paradejar bien claro lo que hace este método de inscripción. Esta opción es más útil cuando existen varias instancias de AutoInscripción en un curso.';
$string['m_course'] = 'Cargando el curso';
$string['method'] = 'Inscribir Cuando';
$string['method_help'] = 'Los usuarios poderosos pueden usar esta configuración para cambiar el comportamiento del plugin, de forma que los usuarios sean inscritos al curso al entrar al sitio, en lugar de esperar a que entren al curso. Esto es útil para cursos que deberían ser visibles por defecto en la lista de "mis cursos" de los usuarios.';
$string['m_site'] = 'Entrar al Sitio';
$string['pluginname'] = 'Auto Inscribir';
$string['pluginname_desc'] = 'El módulo de inscripción automática permite una opción para que a los usuarios que han ingresado al sitio se les otorgue entrada a un curso y sean inscritos en él. Ésto es similar a permitir el acceso a invitados, pero los estudiantes quedarán permanentemente inscritos y por lo tanto, podrán participar en foros y actividades dentro del área.';
$string['role'] = 'Rol';
$string['role_help'] = 'Los usuarios poderosos pueden usar esta configuración para cambiar el nivel de permiso al que los usuarios son inscritos,';
$string['softmatch'] = 'Coincidencia Suave';
$string['softmatch_help'] = 'Cuando se habilita, AutoInscripción inscribirá a un usuario cuando coincida parcialmente con el valor de "Permitir Solamente" en lugar de requirir una coincidencia exacta. Las coincidencias suaves también son sensibles a MAY/minúsculas. El valor de "Filtrar por" será usado para el nombre del grupo.';
$string['warning'] = '¡Precaución!';
$string['warning_message'] = 'Al añadir este plugin a su curso le permitirá a cualquier usuario registrado de Moodle accesar a su curso. Solamente instale este plugin si quiere permitir acceso abierto a su curso para usuarios que hayan entrado al sitio.';
