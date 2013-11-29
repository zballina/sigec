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
 * Strings for component 'local_sandbox', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   local_sandbox
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adjustcoursestartdate'] = 'Ajustar la fecha de inicio del curso';
$string['adjustcoursestartdate_desc'] = 'Ajustar la fecha de inicio del curso a hoy, en lugar de configurarla a la fecha guardada en el archivo de respaldo del curso';
$string['coursebackupsdirectory'] = 'Ruta a respaldos del curso';
$string['coursebackupsdirectory_desc'] = 'Especifica la ruta al directorio en donde están los archivos de respaldo para restaurar el curso. Los archivos de respaldo en este directorio deben haber sido nombrados con el nombre corto apropiado para el curso y deben tener la extensión .MBZ en el archivo.';
$string['coursebackupsheading'] = 'Respaldos del curso';
$string['cronrunday'] = 'Días de ejecución';
$string['cronrunday_desc'] = 'Restaurar cursos en la caja de arena en estos días';
$string['cronruntime'] = 'Hora de ejecución';
$string['cronruntime_desc'] = 'Restaurar cursos en caja de arena en esta hora del día';
$string['cronruntimeheading'] = 'Hora de ejecución';
$string['emailsubjecterror'] = 'ERROR: Caja de arena';
$string['emailsubjectnotice'] = 'AVISO: Caja de arena';
$string['emailsubjectwarning'] = 'ADVERTENCIA: Caja de arena';
$string['errordirectorynotexist'] = 'ERROR: El directorio de caja de arena "{$a}" no existe o no pudo ser accesado, saliendo...';
$string['errordirectorynotreadable'] = 'ERROR: El directorio de caja de arena "{$a}" no pudo abrirse para lectura, saliendo...';
$string['errorlastcronerror'] = 'ERROR: No se pudo obtener (el estampado de) la hora de la última ejecución de caja de arena de la base de datos, saliendo...';
$string['exitingnoneed'] = 'No hay necesidad de restaurar cursos en la caja de arena hasta ahora, esperemos a la siguiente hora de corrida del CRON, saliendo...';
$string['noticedaysnotconfigured'] = 'AVISO: No están configurados los días para la ejecución de caja de arena, por esta razón no hay nada que hacer, saliendo...';
$string['noticedirectorynotconfigured'] = 'AVISO: No está configurado el directorio de caja de arena, por esta razón no hay nada que hacer, saliendo..';
$string['noticerestorecount'] = 'AVISO: Caja de arena ha restaurado {$a} cursos';
$string['notifyheading'] = 'Notificaciones';
$string['notifylevel'] = 'Umbral para Email';
$string['notifylevel_desc'] = 'Las notificaciones de Email sólamente se mandarán para eventos que usted quiera que le sean notificados. ¿De qué quiere usted que le notifiquen?';
$string['notifyonerrors'] = 'Mandar Email de fallas a';
$string['notifyonerrors_desc'] = 'Si hubiera fallas en caja de arena, se pueden enviar notificaciones por Email. ¿Quién debería de ver estas notificaciones?';
$string['nowprocessing'] = 'AHORA: Procesando el curso "{$a}"';
$string['pluginname'] = 'Caja de arena';
$string['skippingadjuststartdatefailed'] = 'ADVERTENCIA: El ajuste de fecha de inicio del curso "{$a}" falló, saltándose el archivo...';
$string['skippingcreatefailed'] = 'ADVERTENCIA: La creación del curso "{$a}" falló, saltándose el archivo...';
$string['skippingdbupdatefailed'] = 'ADVERTENCIA: La actualización de la base de datos para el curso "{$a}" falló, saltándose el archivo...';
$string['skippingdeletionfailed'] = 'ADVERTENCIA: La eliminación del curso existente "{$a}" falló (parcial o completamente), saltándose el archivo...';
$string['skippingnocourse'] = 'ADVERTENCIA: No existe el curso con nombre corto de "{$a}", saltándose el archivo...';
$string['skippingrestorefailed'] = 'ADVERTENCIA: La restauración del curso "{$a}" falló, saltándose el archivo...';
$string['skippingunzipfailed'] = 'ADVERTENCIA: La descompresión del archivo de respaldo del curso "{$a}" falló, saltándose el archivo...';
$string['successrestored'] = 'ÉXITO: Curso restaurado "{$a}"';
