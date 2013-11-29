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
 * Strings for component 'enrol_saml', language 'es_mx', branch 'MOODLE_23_STABLE'
 *
 * @package   enrol_saml
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Asignar rol';
$string['defaultperiod'] = 'Periodo de inscripción por defecto';
$string['defaultperiod_desc'] = 'Configuración de la duración por defecto del periodo de inscripción (en segundos)';
$string['enrolledincourserole'] = 'Inscrito en "{$a->course}" como "{$a->role}"';
$string['enrolusers'] = 'Inscribir usuarios';
$string['error_instance_creation'] = 'Existe una instancia inactiva de este plugin SAML para este curso "{$a}", actívela en lugar de crear una nueva instancia';
$string['pluginname'] = 'Inscripciones SAML';
$string['pluginname_desc'] = 'El plugin para inscripciones SAML le permite a los usuarios ser auto-inscritos al entrar';
$string['saml:config'] = 'Configurar las instancias de inscripción en SAML';
$string['saml:enrol'] = 'Inscribir usuarios';
$string['saml:manage'] = 'Gestionar inscripciones de usuarios';
$string['saml:unenrol'] = 'Des-inscribir (dar de baja) usuarios del curso';
$string['saml:unenrolself'] = 'Des-inscribirse (darse de baja) a sí mismo del curso';
$string['status'] = 'Habilitar inscripciones SAML';
$string['status_desc'] = 'Permitirles acceso al curso a usuarios inscritos internamente. Esto debería conservarse habilitado en la mayoría de los casos.';
$string['statusdisabled'] = 'Deshabilitado';
$string['statusenabled'] = 'Habilitado';
$string['status_help'] = 'Esta configuración determina si es que los usuarios pueden auto-inscribirse mediante entrada a SAML.';
$string['unenrolselfconfirm'] = 'Realmente desea des-inscribirse (darse de baja) a sí mismo del curso"{$a}"?';
$string['unenroluser'] = 'Realmente desea des-inscribir (dar de baja) a  "{$a->user}" del curso "{$a->course}"?';
$string['unenrolusers'] = 'Des-inscribir (dar de baja) usuarios';
$string['wscannotenrol'] = 'La instancia del plugin SAML no puede inscribir un usuario en el curso con ID = {$a->courseid}';
$string['wsnoinstance'] = 'La instancia del plugin SAML no existe o está deshabilitada para el curso  (ID = {$a->courseid})';
$string['wsusercannotassign'] = 'Usted no tiene permisos para asignar este rol ({$a->roleid}) a este usuario ({$a->userid}) en este curso ({$a->courseid}).';
