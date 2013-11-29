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
 * Strings for component 'auth_uniquelogin', language 'es_mx', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_uniquelogin
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_uniquelogindescription'] = 'Esta forma de entrar al sitio se asegura de que cada usuario solamente tenga una sesión activa.<br /><br />
Cada vez que un usuario haga una entrada exitosa al sitio, todas las demás sesiones pertenecientes a ese usuario serán terminadas.<br><br />
<div style="font-weight: bold;">Nota 1: Para que este plugin funcione, las sesiones de usuario deben almacenarse en la base de datos. Esta configuración está determinada en  <a href="settings.php?section=sessionhandling">Sessions.</a></div><br />';
$string['auth_uniquelogintitle'] = 'Entrada única';
$string['pluginname'] = 'Entrada única';
