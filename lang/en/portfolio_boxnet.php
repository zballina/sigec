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
 * Strings for component 'portfolio_boxnet', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   portfolio_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'clave API';
$string['err_noapikey'] = 'Sin clave API';
$string['err_noapikey_help'] = 'No hay clave API configurada para este plugin. Usted puede obtener una clave desde la página de desarrollo de OpenBox.';
$string['existingfolder'] = 'Carpetas existentes a donde poner el/los archivo(s)';
$string['folderclash'] = '¡La carpeta que solicitó crear ya existía !';
$string['foldercreatefailed'] = 'No pudo crear la carpeta destino en box.net';
$string['folderlistfailed'] = 'No pudo obtener una lista de carpetas de box.net';
$string['newfolder'] = 'Nueva carpeta en donde poner archivo(s)';
$string['noauthtoken'] = 'No pudo tomar una ficha (token) de autenticación para emplear en esta sesión';
$string['notarget'] = 'Usted debe especificar si se subirá a una carpeta existente o a una carpeta nueva';
$string['noticket'] = 'No se pudo recibir un ticket desde box.net para comenzar con la sesión de autenticación';
$string['password'] = 'Su contraseña de box.net (no se guardará)';
$string['pluginname'] = 'Box.net';
$string['sendfailed'] = 'No pudo enviar contenido a box.net: {$a}';
$string['setupinfo'] = 'Instrucciones de configuración';
$string['setupinfodetails'] = 'Para obtener la clave API, ingrese a Box.net y visite su <a href="{$a->servicesurl}">OpenBox development page</a>. En \'Developer Tools\', siga a \'Create new application\' y fabrique una nueva aplicación para su sitio Moodle. La clave API se mostrará en la sección  \'Backend parameters\' del formato para editar la aplicación. En este formato, llene el campo  \'Redirect URL\' con:<br /><code>{$a->callbackurl}</code><br />Opcionalmente, Usted puede proporcionar otra información adicional sobre su sitio Moodle.Estos valores podrán editarse posteriormente en la página de \'View my applications\' .';
$string['sharedfolder'] = 'Compartido';
$string['sharefile'] = '¿Compartir este archivo?';
$string['sharefolder'] = '¿Compartir esta carpeta nueva?';
$string['targetfolder'] = 'Carpeta destino';
$string['tobecreated'] = 'Para crear';
$string['username'] = 'Su nombredeusuario de box.net (no será guardado)';
