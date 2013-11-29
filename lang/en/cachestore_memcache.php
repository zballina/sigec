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
 * Strings for component 'cachestore_memcache', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   cachestore_memcache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Memcache';
$string['prefix'] = 'Prefijo de clave';
$string['prefix_help'] = 'Este prefijo se usa para todos los nombres de claves en el servidor memcache.
* Si sólamente tiene una instancia de Moodle usando éste servidor, usted puede dejar este valor en su estado por defecto.
* Debido a restricciones en el largo de la clave, se permite un máximo de 5 caracteres.';
$string['prefixinvalid'] = 'Prefijo inválido. Solamente puede emplear a-z A-Z 0-9-_.';
$string['servers'] = 'Servidores';
$string['servers_help'] = 'Esto configura los servidores que deberían ser utilizados por este adaptador memcached.

Los servidores deberían definirse de a uno por línea y consisten de una dirección de servidor y opcionalmente un puerto y peso.

Si no se proporciona puerto, entonces el puerto por defecto (11211) es usado.

Por ejemplo:
<pre>
server.url.com
ipaddress:port
servername:port:weight
</pre>';
$string['testservers'] = 'Servidores de prueba';
$string['testservers_desc'] = 'Los servidores de prueba se usan para las pruebas de unidades y pruebas de desempeño (rendimiento). Es enteramente opcional configurar servidores de prueba. Los servidores deberían definirse de a uno por línea y consisten de una dirección de servidor y opcionalmente un puerto y un peso. Si no se proporciona un puerto, se usa el puerto por defecto (11211)';
