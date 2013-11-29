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
 * Strings for component 'portfolio_picasa', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   portfolio_picasa
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clientid'] = 'ID del cliente';
$string['noauthtoken'] = 'No se ha recibido una marca (token) de autenticación de Google. Por favor asegúrese que le está permitiendo a Moodle accesar a su cuenta de Google';
$string['nooauthcredentials'] = 'Se requieren credenciales de OAuth';
$string['nooauthcredentials_help'] = 'Para usar el plugin del portafolio Picasa Usted debe primero configurar credenciales OAuth en las configuraciones del portafolio.';
$string['oauth2upgrade_message_content'] = 'Como parte de la actualización a Moodle 2.3, el plugin del portafolios de Picasa ha sido deshabilitado. Para re-habilitar este plugin, su sitio Moodle debe ser registrado con Google, tal como se describe en la documentación {$a->docsurl}, para obtener una ID de cliente y un secreto,Esta ID de cliente y el secreto podrán entonces emplearse para configurar todos los plugins de Google Docs y Picasa.';
$string['oauth2upgrade_message_small'] = 'Este plugin ha sido deshabilitado, pues requiere configurarse tal como se describe en la documentación sobre Google OAuth 2.0.';
$string['oauth2upgrade_message_subject'] = 'Información importante respecto al plugin del portafolio Picasa';
$string['oauthinfo'] = '<p>para usar este plugin, Usted debe registrar este sitio con Google, tal como se describe en la documentación <a href="{$a->docsurl}">Google OAuth 2.0 setup</a>.</p><p>Como parte del proceso de registro, Usted deberá introducir la siguiente URL como (URLs de redireccionamiento autorizadas) \'Authorized Redirect URIs\':</p><p>{$a->callbackurl}</p>Una vez registrado, se le proporcionrá una ID de cliente y un secreto que podrá entonces emplear para configurar todos los plugins de Google Docs y Picasa.</p>';
$string['pluginname'] = 'Picasa';
$string['secret'] = 'Secreto';
$string['sendfailed'] = 'El archivo {$a} no pudo transferirse a Picasa';
