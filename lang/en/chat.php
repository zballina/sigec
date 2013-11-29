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
 * Strings for component 'chat', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   chat
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Usted tiene una sesión de chat próxima';
$string['ajax'] = 'Versión usando Ajax';
$string['autoscroll'] = 'Desplazamiento automático';
$string['beep'] = 'Bip';
$string['cantlogin'] = 'No se pudo ingresar en la sala de chat';
$string['chat:addinstance'] = 'Añadir un nuevo chat';
$string['chat:chat'] = 'Acceder a la sala';
$string['chat:deletelog'] = 'Eliminar bitácoras de chat';
$string['chat:exportparticipatedsession'] = 'Exportar sesión de chat en que usted ha participado';
$string['chat:exportsession'] = 'Exportar cualquier sesión de chat';
$string['chatintro'] = 'Descripción';
$string['chatname'] = 'Nombre de la sala';
$string['chat:readlog'] = 'Leer bitácoras de chat';
$string['chatreport'] = 'Sesiones';
$string['chat:talk'] = 'Hablar en un chat';
$string['chattime'] = 'Próxima cita';
$string['composemessage'] = 'Componer un mensaje';
$string['configmethod'] = 'El método ajax de chat proporciona una interfase de chat basada en ajax, contacta al servidor regularmente para actualizarse. El método normal de chat  implica que los usuarios contactan con el servidor de forma regular para llevar a cabo las actualizaciones. No requiere configuración y funciona en cualquier parte, pero puede ocasionar una sobrecarga en el servidor cuando hay muchos usuarios chateando simultáneamente en la sala. Utilizar un \'daemon\' (proceso de ejecución independiente en segundo plano) en el servidor requiere el acceso al shell (de intérprete de comandos) de Unix, pero resulta en un ambiente de chat más rápido y escalable.';
$string['confignormalupdatemode'] = 'Las actualizaciones de la sala de chat normalmente son servidas eficientemente utilizando la característica de HTTP 1.1 <em>Keep-Alive</em>, pero esto resulta una tarea bastante pesada para el servidor. Un método más avanzado consiste en utilizar la estrategia <em>Stream</em> para enviar actualizaciones a los usuarios. Al utilizar <em>Stream</em> se consigue un escalamiento mucho mejor (es similar al método chatd), pero es posible que su servidor no tenga disponible esta opción.';
$string['configoldping'] = '¿Cual es el máximo tiempo (en segundos) que puede transcurrir antes de que detectemos que un usuario se ha desconectado?  Este es unicamente un límite superior, dado que las desconexiones generalmente se detectan muy rápidamente. Valores más bajos serán más demandantes para el servidor. Si Usted está empleando el método normal,  <strong>nunca</strong> configure este valor por debajo de 2 * chat_refresh_room.';
$string['configrefreshroom'] = '¿Cada cuántos segundos se debe actualizar la página del chat?
Un valor bajo permitirá una conversación más ágil, pero puede ser mucha carga para el servidor cuando hay mucha gente en la sala';
$string['configrefreshuserlist'] = '¿Cada cuántos segundos se debe actualizar la lista de usuarios presentes en el chat?';
$string['configserverhost'] = '\'Hostname\' (nombre de anfitrión) de la computadora en la que reside el \'daemon\' (proceso de ejecución independiente) del servidor';
$string['configserverip'] = 'Dirección IP numérica que corresponde al \'hostname\' (nombre de anfitrión) de arriba';
$string['configservermax'] = 'Número máximo de usuarios';
$string['configserverport'] = 'Puerto que usa el \'daemon\' en el servidor';
$string['currentchats'] = 'Salas activas';
$string['currentusers'] = 'Usuarios';
$string['deletesession'] = 'Borrar esta sesión';
$string['deletesessionsure'] = '¿Está seguro de que desea borrar esta sesión?';
$string['donotusechattime'] = 'No publicar horas de chat';
$string['enterchat'] = 'Entrar a la sala';
$string['entermessage'] = 'Escriba su mensaje';
$string['errornousers'] = '¡No puedo encontrar usuarios!';
$string['explaingeneralconfig'] = 'Estos ajustes se usan <strong>siempre</strong>';
$string['explainmethoddaemon'] = 'Estos ajustes actúan <strong>solamente</strong> si ha seleccionado "Daemon del servidor de chat" en \'Método de chat';
$string['explainmethodnormal'] = 'Estos ajustes actúan <strong>solamente</strong> si ha seleccionado "Método normal" en \'Método de chat';
$string['generalconfig'] = 'Configuración general';
$string['idle'] = 'Inactivo';
$string['inputarea'] = 'Área de entrada';
$string['invalidid'] = 'No se encontró esa sala de chat';
$string['list_all_sessions'] = 'Listar todas las sesiones.';
$string['list_complete_sessions'] = 'Listar sólo las sesiones completas.';
$string['listing_all_sessions'] = 'Listando todas las sesiones.';
$string['messagebeepseveryone'] = '{$a} envía un beep a todos';
$string['messagebeepsyou'] = '{$a} le acaba de enviar un beep';
$string['messageenter'] = '{$a} entró a la sala';
$string['messageexit'] = '{$a} salió de la sala';
$string['messages'] = 'Mensajes';
$string['messageyoubeep'] = 'Su señal de sonido bip {$a}';
$string['method'] = 'Método de chat';
$string['methodajax'] = 'Método Ajax';
$string['methoddaemon'] = '\'Daemon\' del servidor de chat';
$string['methodnormal'] = 'Método normal';
$string['modulename'] = 'Chat';
$string['modulename_help'] = 'El módulo chat permite que los participantes tengan una discusión sincrónica, basada en texto,  en tiempo real en la web.

El chat puede ser una actividad por única ocasión o puede repetirse a la misma hora cada día o cada semana. Las sesiones de chat se guardan y pueden hacerse disponibles para que todos las vean o limitadas a los usuarios con el permiso de ver bitácoras de sesiones de chat.

Los chats son especialmente útiles cuando el grupo no podría juntarse para realizar conversaciones cara-a-cara, como

* Reuniones regulares de estudiantes inscritos a cursos en línea, para permitirles compartir experiencias con otros compañeros del mismo curso pero de diferente ciudad (o país)
* Un estudiante que temporalmente no puede asistir en persona conversa con chat con su maestro, para ponerse al tanto del trabajo escolar
* Estudiantes que empiezan a trabajar se juntan para discutir sus experiencias entre ellos y con el maestro
* Niños pequeños en casa por las tardes, como una introducción controlada (monitoreada) al mundo de las redes sociales
* Una sesión de preguntas y respuestas con un orador invitado de una localidad diferente (a distancia)
* Sesiones para ayudarles a los estudiantes a prepararse para exámenes, donde el maestro, o los estudiantes, hagan preguntas de ejemplo';
$string['modulenameplural'] = 'Chats';
$string['neverdeletemessages'] = 'Nunca borrar mensajes';
$string['nextsession'] = 'Próxima sesión programada';
$string['nochat'] = 'No se encontró chat';
$string['no_complete_sessions_found'] = 'No se han encontrado sesiones completas.';
$string['noguests'] = 'El chat no está abierto a invitados';
$string['nomessages'] = 'Aún no hay mensajes';
$string['nopermissiontoseethechatlog'] = 'No tiene permiso para ver las bitácoras de chat.';
$string['normalkeepalive'] = 'KeepAlive';
$string['normalstream'] = 'Stream';
$string['noscheduledsession'] = 'No hay sesión programada';
$string['notallowenter'] = 'Usted no tiene permitido entrar en la sala de chat';
$string['notlogged'] = '¡Usted no se ha identificado!';
$string['oldping'] = 'Desconectar tiempo de espera';
$string['page-mod-chat-x'] = 'Cualquier página del módulo de chat';
$string['pastchats'] = 'Sesiones de chat pasadas';
$string['pluginadministration'] = 'Administración del chat';
$string['pluginname'] = 'Chat';
$string['refreshroom'] = 'Refrescar sala';
$string['refreshuserlist'] = 'Refrescar lista de usuarios';
$string['removemessages'] = 'Eliminar todos los mensajes';
$string['repeatdaily'] = 'A la misma hora todos los días';
$string['repeatnone'] = 'Sin repeticiones, publicar sólo la hora especificada';
$string['repeattimes'] = 'Repetir publicar horas de sesiones';
$string['repeatweekly'] = 'A la misma hora todas las semanas';
$string['saidto'] = 'dicho a';
$string['savemessages'] = 'Guardar sesiones pasadas';
$string['seesession'] = 'Ver esta sesión';
$string['send'] = 'Enviar';
$string['sending'] = 'Enviando';
$string['serverhost'] = 'Nombre del servidor';
$string['serverip'] = 'IP del servidor';
$string['servermax'] = 'Número máximo de usuarios';
$string['serverport'] = 'Puerto del servidor';
$string['sessions'] = 'Sesiones';
$string['sessionstart'] = 'La siguiente sesión de chat comenzará en: {$a}';
$string['strftimemessage'] = '%H:%M';
$string['studentseereports'] = 'Todos pueden ver las sesiones pasadas';
$string['studentseereports_help'] = 'Si se selecciona \'No\', solo los usuarios que tienen el permiso \'mod/chat:readlog\' pueden ver las bitácoras de chat';
$string['talk'] = 'Charla';
$string['updatemethod'] = 'Actualizar método';
$string['updaterate'] = 'Tasa de Actualización:';
$string['userlist'] = 'Lista de usuarios';
$string['usingchat'] = 'Usando el chat';
$string['usingchat_help'] = 'El módulo chat contiene algunas características para hacer más agradable el chatear.

* Smilies - Las caritas sonrientes (emoticons) que Usted puede emplear en cualquier parte de Moodle también pueden emplearse aquí :-)
* Enlaces - Las direcciones de internet se vuelven enlaces automáticamente
* Emoting - Usted puede empezar una oración con "/me" o ":" para emote,por ejemplo: si su nombre es Kim y Usted escribe ":laughs!" or "/me laughs!"entonces todos verán "Kim laughs!"
* Beeps - Usted puede mandar un sonido a otros participantes eligiendo el enlace de "beep"que está junto a sus nombres. Un atajo útil para mandar un sonido a todas las personas en el chat al mismo tiempo es tecleando "beep all".
* HTML -si Usted sabe emplear código HTML, lo puede utilizar en su texto para hacer cosas como insertar imágenes, hacer que suenen ruidos o crear texto con diferentes colores.';
$string['viewreport'] = 'Ver las sesiones anteriores';
