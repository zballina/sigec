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
 * Strings for component 'portfolio_mahara', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   portfolio_mahara
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['enableleap2a'] = 'Habilitar soporte de portafolio Leap2A (requiere Mahara 1.3 o superior)';
$string['err_invalidhost'] = 'host MNet no válido';
$string['err_invalidhost_help'] = 'Este plugin está mal configurada porque apunta a un host MNet inválido (o borrado). Este plugin requiere pares de Red Moodle (Moodle Networking) con SSO IDP publicados, SSO_SP suscrito, y portafolio suscrito <b>y</b> publicado.';
$string['err_networkingoff'] = 'MNet está apagada';
$string['err_networkingoff_help'] = 'MNet está desconectado por completo. Por favor habilitelo antes de intentar configurar este plugin. Cualquier instancia de este plugin se ha vuelto no-visible hasta que esto se arregle - Usted deberá volverlas visibles manualmente. No pueden usarse hasta que se haga esto.';
$string['err_nomnetauth'] = 'El plugin de autenticación MNet está deshabilitada';
$string['err_nomnetauth_help'] = 'El plugin de autenticación de MNet está deshabilitado, pero es requerido para este servicio';
$string['err_nomnethosts'] = 'Requiere MNet';
$string['err_nomnethosts_help'] = 'Este plugin se basa en pares MNet con SSO IDP publicado, SSO SP suscrito, portafolio de servicios publicados <b> y </b> suscritos, así como el conector de autenticación MNet. Cualquier instancia de este conector se ha ocultado hasta que se cumplan estas condiciones. Posteriormente será necesario ajustarlos manualmente para hacerlos de nuevo visibles.';
$string['failedtojump'] = 'No pudo iniciar comunicación con el servidor remoto';
$string['failedtoping'] = 'No pudo iniciar comunicación con el servidor externo: {$a}';
$string['mnethost'] = 'host MNet';
$string['mnet_nofile'] = 'No pudo encontrar el archivo en el objeto transferido - error raro';
$string['mnet_nofilecontents'] = 'Se encontró el archivo en el objeto transferido, pero no pudo obtener su contenido - error raro: {$a}';
$string['mnet_noid'] = 'No pudo encontrar el registro concordante con la transferencia para esta ficha (token)';
$string['mnet_notoken'] = 'No pudo encontrar la ficha (token) que concuerde con esta transferencia';
$string['mnet_wronghost'] = 'El host remoto no concordó el registro de transferencia para esta ficha (token)';
$string['pf_description'] = 'Le permite a los usuarios empujar contenido de Moodle hacia este host<br />Subscribase a <b>y</b> publique este servicio para permitir que los usuarios autenticados en su sitio puedan empujar contenido a  {$a}<br /><ul><li><em>Dependencia</em>: Usted también debe de <strong>publicar</strong> el servicio del SSO (Provedor de Identificación) a {$a}.</li><li><em>Dependencia</em>: Usted también debe de <strong>subscribirse </strong> al servicio SSO (SProvedor de Servicio) en {$a}</li><li><em>Dependencia</em>: YUsted también debe de habilitar el plugin de autenticación MNet.</li></ul><br />';
$string['pf_name'] = 'Servicios de Portafolio';
$string['pluginname'] = 'ePortafolio Mahara';
$string['senddisallowed'] = 'Usted no puede transferir archivos a Mahara por el momento';
$string['url'] = 'URL';
