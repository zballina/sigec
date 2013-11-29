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
 * Strings for component 'reservation', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   reservation
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addparticipant'] = 'Añadir solicitud';
$string['after10min'] = 'Después de 10 minutos de iniciado el evento';
$string['after12h'] = 'Después de 12 horas de iniciado el evento';
$string['after1d'] = 'Después de 1 día de iniciado el evento';
$string['after1h'] = 'Después de 1 hora de iniciado el evento';
$string['after1w'] = 'Después de 1 semana de iniciado el evento';
$string['after2d'] = 'Después de 2 días de iniciado el evento';
$string['after2h'] = 'Después de 2 horas de iniciado el evento';
$string['after2w'] = 'Después de 2 semanas de iniciado el evento';
$string['after30min'] = 'Después de 30 minutos de iniciado el evento';
$string['after3w'] = 'Después de 3 semanas de iniciado el evento';
$string['after4h'] = 'Después de 4 horas de iniciado el evento';
$string['after4w'] = 'Después de 4 semanas de iniciado el evento';
$string['after5min'] = 'Después de 5 minutos de iniciado el evento';
$string['after6h'] = 'Después de 26 horas de iniciado el evento';
$string['alreadybooked'] = 'Usted ya está reservado';
$string['atstart'] = 'Al inicio del evento';
$string['autohide'] = 'Auto ocultar lista de Reservación';
$string['availablerequests'] = 'Asientos disponibles';
$string['by'] = 'por';
$string['bydate'] = 'Fecha del evento';
$string['byname'] = 'Nombre';
$string['bysection'] = 'Tópico/Semana';
$string['cancelledon'] = 'Cancelado en';
$string['checkclashes'] = 'Revisar colisiones de lugar y hora';
$string['clashesreport'] = 'Reporte de colisiones';
$string['cleanview'] = 'Ver solamente las actualmente reservadas';
$string['close'] = 'cerrar';
$string['closed'] = 'Cerrado';
$string['config'] = 'Configuraciones globales del módulo de reservación';
$string['configautohide'] = 'Esto define cuando es que las reservaciones deben ocultarse de la lista de reservaciones (mod/reservation/index.php). Esto puede ser útil si se usa con listas públicas, para mostrar una lista limpiada.';
$string['configcheckclashes'] = 'Habilite el botón de "Revisar colisiones de lugar y hora" en la página de edición de reservaciones';
$string['configdownload'] = 'Esto define el formato por defecto del archivo para descarga para todas las listas de solicitudes y reservaciones.';
$string['configfields'] = 'Esta configuración define cuales campos se mostrarán en la tabla de reservaciones';
$string['configlocations'] = 'En esta página puede gestionar locaciones estándar para reservaciones en este sitio Moodle';
$string['configmanualusers'] = 'Esto define cual lista de usuarios se mostrará en el menú desplegable usado para reservar usuarios manualmente.';
$string['configmaxoverbook'] = 'Esto define el porcentaje máximo de sobrecupo para reservaciones.';
$string['configmaxrequests'] = 'Define el límite del menú desplegable en la página de editar reservación';
$string['configminduration'] = 'Esto indica la duración mínima de eveento reservado. Se usa con eventos que no terminan para revisarles disponibilidad de hora y lugar.';
$string['configoverbookstep'] = 'Esto define el porcentaje de granularidad del sobrecupo. A un grado menor habrá mayor granularidad.';
$string['configpubliclists'] = 'Esto define si es que las listas de reservaciones son públicas (pueden verse sin entrar al sitio Moodle) o no.';
$string['configsortby'] = 'Esto define como se ordena la lista de reservaciones.';
$string['configsublimits'] = 'Definir el número de filas de reglas de sublímites en la página de edición de reservación';
$string['description'] = 'Descripción';
$string['duration10h'] = '10 horas';
$string['duration10min'] = '10 minutos';
$string['duration11h'] = '11 horas';
$string['duration12h'] = '12 horas';
$string['duration15min'] = '15 minutos';
$string['duration20min'] = '20 minutos';
$string['duration2h'] = '2 horas';
$string['duration30min'] = '30 minutos';
$string['duration3h'] = '3 horas';
$string['duration45min'] = '45  minutos';
$string['duration4h'] = '4 horas';
$string['duration5h'] = '5 horas';
$string['duration5min'] = '5 minutos';
$string['duration60min'] = '60 minutos';
$string['duration6h'] = '6 horas';
$string['duration7h'] = '7 horas';
$string['duration8h'] = '8 horas';
$string['duration90min'] = '90 minutos';
$string['duration9h'] = '9 horas';
$string['enablenote'] = 'Habilitar nota de usuarios';
$string['equal'] = 'igual a';
$string['err_sublimitsgreater'] = 'La suma de sublímites es mayor que el máximo permitido';
$string['err_timeendlower'] = 'La fecha de fin del evento está configurada anterior a la fecha de inicio';
$string['err_timeopengreater'] = 'La fecha de inicio de reservación está configurada posterior a la fecha de fin';
$string['eventsettings'] = 'Configuraciones del evento';
$string['explainconfig'] = 'Los administradores pueden definir aquí las configuraciones globales para el módulo de reservación';
$string['fields'] = 'Campos mostrados';
$string['fullview'] = 'Ver también reservaciones eliminadas';
$string['gradedmail'] = '{$a->teacher} ha publicado retroalimentación sobre su reservación \'{$a->reservation}\'

Usted puede verla aquí:

 {$a->url}';
$string['gradedmailhtml'] = '{$a->teacher}  ha publicado retroalimentación sobre su reservación \'<i>{$a->reservation}</i>\'<br /><br /> Usted puede verla <a href="{$a->url}">aquí</a>.';
$string['justbooked'] = 'Usted ya está reservado como: {$a}';
$string['location'] = 'Lugar';
$string['locations'] = 'Gestionar Locaciones';
$string['locationslist'] = 'Lista de Locaciones';
$string['mail'] = 'La reservación \'{$a->reservation}\' ha sido cerrada.

Usted puede descargar la lista de reservaciones desde:

{$a->url}';
$string['mailhtml'] = 'Reservación <em>{$a->reservation}</em> ha sido cerrada.<br /><br /> Usted puede descargar la lista de reservaciones desde <a href="{$a->url}">aquí</a>.';
$string['manualusers'] = 'Reservación manual, mostrar usuarios de';
$string['maxoverbook'] = 'Porcentaje máximo de sobrecupo';
$string['maxrequest'] = 'Máximo de reservaciones';
$string['minduration'] = 'Duración mínima del evento';
$string['modulename'] = 'Reservación';
$string['modulenameplural'] = 'Reservaciones';
$string['newlocation'] = 'Nuevas Locaciones';
$string['noclashes'] = 'No se encontraron colisiones de lugar y hora';
$string['nolimit'] = 'Sin límite de reservación';
$string['nomorerequest'] = 'No más asientos disponibles';
$string['nooverbook'] = 'Sin sobrecupo';
$string['noreservations'] = 'Sin reservación';
$string['note'] = 'Nota';
$string['noteachers'] = 'Sin maestros disponibles';
$string['notequal'] = 'no es igual a';
$string['notopened'] = 'No abierto';
$string['novalues'] = 'No hay valores disponibles para este campo';
$string['number'] = 'Número de Reservación';
$string['otherlocation'] = 'Otras locaciones especificadas';
$string['overbook'] = 'Sobrecupo';
$string['overbookonly'] = 'Solamente hay asientos en sobrecupo';
$string['overbookstep'] = 'Grado de sobrecupo';
$string['pluginadministration'] = 'Administración de reservación';
$string['pluginname'] = 'Reservación';
$string['publiclists'] = 'Lista pública de reservación';
$string['requestoverview'] = 'Vista general de Solicitudes';
$string['requests'] = 'Solicitudes';
$string['reservationcancelled'] = 'Reservación cancelada';
$string['reservationclosed'] = 'Reservaciones cerradas';
$string['reservationdenied'] = 'Reservaciones no permitidas';
$string['reservation:downloadrequests'] = 'Puede descargar lista de solicitudes';
$string['reservation:grade'] = 'Puede asignar calificación';
$string['reservation:manualdelete'] = 'Puede eliminar solicitudes de otros usuarios';
$string['reservation:manualreserve'] = 'Puede enviar solicitudes para otros usuarios';
$string['reservationnotopened'] = 'Las reservaciones aún no se han abierto';
$string['reservation:reserve'] = 'Puede enviar sus propias solicitudes';
$string['reservations'] = 'Reservaciones';
$string['reservationsettings'] = 'Configuraciones de Reservaciones';
$string['reservation:viewnote'] = 'Puede ver nota de solicitudes';
$string['reservation:viewrequest'] = 'Puede ver lista de solicitudes';
$string['reserve'] = 'Reservar';
$string['reservecancel'] = 'Cancelar reservación';
$string['reserved'] = 'Reservado';
$string['reservedon'] = 'Reservado en';
$string['resetreservation'] = 'Remover todas las reservaciones';
$string['save'] = 'Guardar calificación';
$string['selectvalue'] = 'Sleccionar uno de los valores disponibles';
$string['showrequest'] = 'Los usuarios pueden ver la lista de solicitudes';
$string['sortby'] = 'Listas de solicitudes ordenadas por';
$string['sublimit'] = 'Sublímite {$a}';
$string['sublimitrules'] = 'Reglas de sublímites';
$string['sublimits'] = 'Sublímites de Reservación';
$string['timeclose'] = 'Reservación termina en';
$string['timeend'] = 'Fecha de término';
$string['timeopen'] = 'Reservación inicia en';
$string['timestart'] = 'Fecha de inicio';
$string['with'] = 'con';
$string['withselected'] = 'Con seleccionados...';
$string['yourgrade'] = 'Su calificación para esta reservación es: {$a->grade}/${a->maxgrade}';
$string['yourscale'] = 'Su calificación para esta reservación es:  {$a}';
