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
 * Strings for component 'auth_googleoauth2', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   auth_googleoauth2
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_facebookclientid'] = 'Su ID de App - puede encontrarse en https://developers.facebook.com/apps/.';
$string['auth_facebookclientid_key'] = 'ID de Facebook App';
$string['auth_facebookclientsecret'] = 'Su secreto de App  - puede encontrarse en https://developers.facebook.com/apps/.';
$string['auth_facebookclientsecret_key'] = 'Secreto de Facebook App';
$string['auth_googleclientid'] = 'Su ID de cliente - puede encontrarse en la API de consola de Google';
$string['auth_googleclientid_key'] = 'ID de cliente de Google';
$string['auth_googleclientsecret'] = 'Su secreto de cliente - puede encontrarse en la API de consola de Google';
$string['auth_googleclientsecret_key'] = 'Secreto de Cliente de Google';
$string['auth_googleipinfodbkey'] = 'IPinfoDB es un servicio que le permite encontrar cual es el país y la ciudad del visitante. Usted debe suscribirse al servicio para obtener una clave:: http://www.ipinfodb.com/register.php';
$string['auth_googleipinfodbkey_key'] = 'Clave IPinfoDB';
$string['auth_googleoauth2description'] = 'Autenticación simple y llana Oauth2 Google/Facebook/Messenger.
   Si no existe el Email del usuario, entonces el plugin de autenticación crea un nuevo usuario con nombredeusuario  "User_XXX", donde XXX se incrementará consecutivamente';
$string['auth_googlesettings'] = 'Configuraciones';
$string['auth_googleuserprefix'] = 'Este es el prefijo del nombredeusuario que será usado para cada usuario nuevo autenticado por Google Oauth2. Cámbielo si tuviera conflicto con cualquier cosa de Moodle. En un sitio Moodle básico en idioma inglés usualmente no se necesitaría cambiarlo.';
$string['auth_googleuserprefix_key'] = 'Prefijo del nombredeusuario';
$string['auth_messengerclientid'] = 'Su ID de cliente - puede encontrarse en https://manage.dev.live.com/Applications.';
$string['auth_messengerclientid_key'] = 'ID del Cliente de Messenger';
$string['auth_messengerclientsecret'] = 'Su secreto de cliente - puede encontrarse en https://manage.dev.live.com/Applications.';
$string['auth_messengerclientsecret_key'] = 'Secreto de Cliente de Messenger';
$string['couldnotgetgoogleaccesstoken'] = 'El provedor de autenticación nos envió un error de comunicación. Por favor trate de entrar de nuevo.';
$string['emailaddressmustbeverified'] = 'Su dirección de Email no es verificada por el método de autenticación que Usted seleccionó. A Usted probablemente se le olvidó elegir el enlace de "verificar dirección de Email" que Google o Facebook debieron de haberle enviado durante su suscripción al servicio.';
$string['moreproviderlink'] = 'Entrar con otro servicio';
$string['pluginname'] = 'Google Oauth2';
$string['signinwithanaccount'] = 'Entrar con:';
