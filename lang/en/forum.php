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
 * Strings for component 'forum', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   forum
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Hay nuevas publicaciones en foro';
$string['addanewdiscussion'] = 'Añadir un nuevo tema de discusión aquí';
$string['addanewquestion'] = 'Añadir una nueva pregunta';
$string['addanewtopic'] = 'Añadir un nuevo tópico (tema)';
$string['advancedsearch'] = 'Búsqueda avanzada';
$string['allforums'] = 'Todos los foros';
$string['allowdiscussions'] = 'Permitir que cualquier {$a} abra nuevos temas';
$string['allowsallsubscribe'] = 'Este foro permite que cualquiera elija suscribirse o no';
$string['allowsdiscussions'] = 'Este foro permite que cada persona pueda iniciar un tema de discusión.';
$string['allsubscribe'] = 'Suscribir a todos los foros';
$string['allunsubscribe'] = 'Dar de baja (des-suscribir) de todos los foros';
$string['alreadyfirstpost'] = 'Este ya es el primer mensaje de la discusión';
$string['anyfile'] = 'Cualquier archivo';
$string['areaattachment'] = 'Archivos adjuntos';
$string['areapost'] = 'Mensajes';
$string['attachment'] = 'Archivo adjunto';
$string['attachment_help'] = 'Si lo desea, puede adjuntar uno o más archivos a un mensaje en el foro. Si adjunta una imagen, se mostrará al final del mensaje.';
$string['attachmentnopost'] = 'No puede exportar archivos adjuntos sin una id de mensaje';
$string['attachments'] = 'Archivos adjuntos';
$string['attachmentswordcount'] = 'Anexos y conteo de palabras';
$string['blockafter'] = 'Umbral de mensajes para bloqueo';
$string['blockafter_help'] = 'Este ajuste especifica el número máximo de aportaciones que un usuario puede publicar en el período de tiempo especificado. Los usuarios con el permiso \'mod/forum:postwithoutthrottling\'  están exentos de esta limitación.';
$string['blockperiod'] = 'Período de tiempo para bloqueo';
$string['blockperioddisabled'] = 'No bloquear';
$string['blockperiod_help'] = 'Se puede impedir que los estudiantes puedan publicar más aportaciones que las especificadas por número determinado dentro de un periodo de tiempo.
Los usuarios con el permiso \'moodle/forum:ostwithoutthrottling\' están exentos de esta limitación.';
$string['blogforum'] = 'Foro estándar que aparece en un formato similar a blog.';
$string['bynameondate'] = 'de {$a->name} - {$a->date}';
$string['cannotadd'] = 'No se ha podido añadir la discusión a este foro';
$string['cannotadddiscussion'] = 'Para agregar discusiones a este foro se requiere pertenecer al grupo.';
$string['cannotadddiscussionall'] = 'No tiene permiso para añadir un nuevo tema de discusión para todos los participantes.';
$string['cannotaddsubscriber'] = 'No se pudo añadirun suscriptor con la id {$a} a este foro.';
$string['cannotaddteacherforumto'] = 'No se ha podido convertir la instancia de foro de profesores a la sección 0 del curso';
$string['cannotcreatediscussion'] = 'No se pudo crear una discusión nueva';
$string['cannotcreateinstanceforteacher'] = 'No se pudo crear una nueva instancia de módulo de curso para el foro de profesores';
$string['cannotdeleteforummodule'] = 'No se puede eliminar el módulo Foro.';
$string['cannotdeletepost'] = 'No puede eliminar este mensaje.';
$string['cannoteditposts'] = 'No puede eliminar los mensajes de otras personas.';
$string['cannotfinddiscussion'] = 'No se pudo encontrar la discusión en este foro';
$string['cannotfindfirstpost'] = 'No se pudo encontrar el primer mensaje en este foro';
$string['cannotfindorcreateforum'] = 'No se pudo encontrar o crear un foro principal de noticias en este sitio';
$string['cannotfindparentpost'] = 'No se pudo encontrar la categoría padre del mensaje {$a}';
$string['cannotmovefromsingleforum'] = 'No se puede mover la discusión a partir de un foro de discusión única';
$string['cannotmovenotvisible'] = 'Foro no visible';
$string['cannotmovetonotexist'] = 'No puede mover nada a ese foro, no existe';
$string['cannotmovetonotfound'] = 'Foro de destino no encontrado en este curso.';
$string['cannotmovetosingleforum'] = 'No se puede mover la discución hacia un foro de discusión única.';
$string['cannotpurgecachedrss'] = 'No se han podido purgar los canales RSS en caché en los foros de partida y de destino: compruebe sus permisos';
$string['cannotremovesubscriber'] = 'No se pudo eliminar al suscriptor con id {$a} de este foro.';
$string['cannotreply'] = 'Usted no puede contestar (réplica) a este mensaje';
$string['cannotsplit'] = 'Las discusiones en este foro no pueden dividirse';
$string['cannotsubscribe'] = 'Lo sentimos, debe ser un miembro de un grupo para suscribirse.';
$string['cannottrack'] = 'No se pudo parar de rastrear ese foro';
$string['cannotunsubscribe'] = 'No se pudo darle de baja en ese foro';
$string['cannotupdatepost'] = 'No puede actualizar este mensaje';
$string['cannotviewpostyet'] = 'No puede leer las preguntas de otros estudiantes en esta discusión porque usted aún no ha enviado mensajes';
$string['cannotviewusersposts'] = 'No hay aportaciones realizadas por este usuario que usted pueda ver.';
$string['cleanreadtime'] = 'Hora para marcar mensajes antiguos como leídos';
$string['completiondiscussions'] = 'El estudiante debe crear discusiones:';
$string['completiondiscussionsgroup'] = 'Requerir discusiones';
$string['completiondiscussionshelp'] = 'se requieren discusiones para completar';
$string['completionposts'] = 'El estudiante debe enviar discusiones o responderlas:';
$string['completionpostsgroup'] = 'Requerir mensajes';
$string['completionpostshelp'] = 'requiriendo discusiones o respuestas para completar';
$string['completionreplies'] = 'El usuario debe enviar réplicas:';
$string['completionrepliesgroup'] = 'Requerir réplicas';
$string['completionreplieshelp'] = 'se requieren réplicas para completar';
$string['configcleanreadtime'] = 'Hora del día para limpiar mensajes antiguos de la tabla de lectura.';
$string['configdigestmailtime'] = 'Se enviará un resumen de los correos a las personas que eligen dicha opción. Este ajuste controla a qué hora del día se enviará el correo (por medio del primer cron que se ejecute después de la hora fijada).';
$string['configdisplaymode'] = 'El modo de visualización por defecto para discusiones si no se ha configurado algún modo.';
$string['configenablerssfeeds'] = 'Esta opción habilita la posibilidad de canales RSS para todos los foros. Aún así necesitará activar manualmente los canales en los ajustes de cada foro.';
$string['configenabletimedposts'] = 'Seleccione \'sí\' si desea permitir el ajuste de períodos en los que se mostrará una nueva discusión en el foro (Experimental y no probada totalmente)';
$string['configlongpost'] = 'Cualquier mensaje que exceda esta extensión (sin incluir código HTML) se considera largo. Los mensajes mostrados en la portada del sitio, en las páginas de los cursos con formato social o en los perfiles de usuario, están recortados a una rotura natural en algún sitio entre los valores de forum_shortpost y forum_longpost';
$string['configmanydiscussions'] = 'Número máximo de discusiones a mostrar por página en un foro';
$string['configmaxattachments'] = 'Máximo número de archivos adjuntos que se permiten por mensaje.';
$string['configmaxbytes'] = 'Tamaño máximo por defecto para los archivos adjuntos a los mensajes de los foros en este sitio (sujeto a los límites del curso y otras configuraciones del servidor)';
$string['configoldpostdays'] = 'Número de días para que un mensaje se considere leído.';
$string['configreplytouser'] = 'Cuando un mensaje del foro es enviado por correo electrónico, ¿debería contener la dirección del usuario de modo que los receptores pudieran responderle personalmente en lugar de hacerlo en el foro? Incluso aunque se seleccione \'Sí\', los usuarios pueden elegir en su perfil que su dirección de correo electrónico se mantenga en secreto.';
$string['configshortpost'] = 'Cualquier mensaje que no alcance esta extensión (sin incluir código HTML) se considera corto.';
$string['configtrackreadposts'] = 'Seleccione \'Sí\' si desea rastrear leído/no leído para cada usuario.';
$string['configusermarksread'] = 'Si elige \'sí\' el usuario debe marcar manualmente un mensaje como leído. Si \'no\', cuando el mensaje sea visto se marcará como leído.';
$string['confirmsubscribe'] = '¿Está seguro que quiere suscribirse al foro \'{$a}\'?';
$string['confirmunsubscribe'] = '¿Está seguro que quiere darse de baja del foro \'{$ a}\'?';
$string['couldnotadd'] = 'No se puede colocar su mensaje debido a un problema desconocido.';
$string['couldnotdeletereplies'] = 'Lo sentimos, no podemos borrar este mensaje debido a que tiene réplicas.';
$string['couldnotupdate'] = 'No se ha podido actualizar su mensaje debido a un error desconocido.';
$string['delete'] = 'Borrar';
$string['deleteddiscussion'] = 'El tópico de discusión se ha borrado';
$string['deletedpost'] = 'El mensaje se ha borrado';
$string['deletedposts'] = 'Los mensajes han sido borrados';
$string['deletesure'] = '¿Está seguro de que desea borrar este mensaje?';
$string['deletesureplural'] = '¿Está seguro de que desea borrar este mensaje y todas las réplicas? ({$a} mensajes)';
$string['digestmailheader'] = 'Éste es su resumen diario por correo de los nuevos mensajes de los foros de {$a->sitename}. Si desea cambiar sus preferencias de foro por correo, hágalo en {$a->userprefs}.';
$string['digestmailprefs'] = 'su perfil de usuario';
$string['digestmailsubject'] = 'Resumen diario del foro de {$a}';
$string['digestmailtime'] = 'Hora para enviar los mensajes resumen';
$string['digestsentusers'] = 'Resúmenes de correo enviados con éxito a {$a} usuarios.';
$string['disallowsubscribe'] = 'No se permiten suscripciones';
$string['disallowsubscribeteacher'] = 'No se permiten suscripciones (excepto para profesores)';
$string['discussion'] = 'Discusión';
$string['discussionmoved'] = 'Esta discusión se ha movido a \'{$a}\'.';
$string['discussionmovedpost'] = 'Esta discusión se ha movido a <a href="{$a->discusshref}">aquí</a> en el foro <a href="{$a->forumhref}">{$a->forumname}</a>';
$string['discussionname'] = 'Nombre de la discusión';
$string['discussions'] = 'Discusiones';
$string['discussionsstartedby'] = 'Discusiones comenzadas por {$a}';
$string['discussionsstartedbyrecent'] = 'Discusión recientemente comenzada por {$a}';
$string['discussionsstartedbyuserincourse'] = 'Discusiones comenzadas por {$a->fullname} en {$a->coursename}';
$string['discussthistopic'] = 'Ver mensajes';
$string['displayend'] = 'Mostrar final';
$string['displayend_help'] = '<p>Puede elegir si los mensajes del foro se muestran a partir de una fecha determinada, expiran en una fecha concreta o son visibles sólo a lo largo de un determinado período.</p>

<p>Deje sin seleccionar la(s) opcion(es) de deshabilitar para activar las fechas inicial y final en que son visibles los mensajes.</p>

<p>Note que los usuarios con acceso de Administrador verán los mensajes antes de su fecha de aparición y después de su fecha de expiración.</p>';
$string['displaymode'] = 'Modo de visualización';
$string['displayperiod'] = 'Mostrar período';
$string['displaystart'] = 'Mostrar inicio';
$string['displaystart_help'] = '<p>Puede elegir si los mensajes del foro se muestran a partir de una fecha determinada, expiran en una fecha concreta o son visibles sólo a lo largo de un determinado período.</p>

<p>Deje sin seleccionar la(s) opcion(es) de deshabilitar para activar las fechas inicial y final en que son visibles los mensajes.</p>

<p>Note que los usuarios con acceso de Administrador verán los mensajes antes de su fecha de aparición y después de su fecha de expiración.</p>';
$string['displaywordcount'] = 'Mostrar número de palabras';
$string['displaywordcount_help'] = 'Esta configuración especifica si es que se debería o no mostrar el número de palabras de cada publicación.';
$string['eachuserforum'] = 'Cada persona plantea una discusión';
$string['edit'] = 'Editar';
$string['editedby'] = 'Editado por {$a->name} - envío original {$a->date}';
$string['editedpostupdated'] = 'El mensaje de {$a} fue actualizado';
$string['editing'] = 'Editando';
$string['emptymessage'] = 'Algo va mal con su mensaje. Tal vez lo haya enviado en blanco o el archivo adjunto, si lo hay, es demasiado grande. Sus cambios NO se han guardado.';
$string['erroremptymessage'] = 'El mensaje no puede estar vacío';
$string['erroremptysubject'] = 'El asunto del mensaje no puede estar vacío.';
$string['errorenrolmentrequired'] = 'Usted debe estar inscrito en este curso para acceder a este contendio';
$string['errorwhiledelete'] = 'Ha ocurrido un error al eliminar el registro';
$string['everyonecanchoose'] = 'Todos pueden suscribirse';
$string['everyonecannowchoose'] = 'Ahora cualquiera puede elegir si se suscribe';
$string['everyoneisnowsubscribed'] = 'Ahora todos están suscritos a este foro';
$string['everyoneissubscribed'] = 'Todos están suscritos a este foro';
$string['existingsubscribers'] = 'Suscriptores existentes';
$string['exportdiscussion'] = 'Exportar la discusión completa';
$string['forcessubscribe'] = 'Este foro fuerza la suscripción de todos';
$string['forum'] = 'Foro';
$string['forum:addinstance'] = 'Añadir un nuevo foro';
$string['forum:addnews'] = 'Añadirr noticias';
$string['forum:addquestion'] = 'Añadir pregunta';
$string['forum:allowforcesubscribe'] = 'Permitir suscripción forzosa';
$string['forumauthorhidden'] = 'Autor (oculto)';
$string['forumblockingalmosttoomanyposts'] = 'Usted se está aproximando al límite permitido de mensajes. Ha enviado {$a->numposts} mensajes en el último {$a->blockperiod} y el límite está en {$a->blockafter} mensajes.';
$string['forumbodyhidden'] = 'Usted no puede ver este mensaje, probablemente porque Usted no ha enviado mensajes a la discusión o porque aún no ha transcurrido el tiempo máximo para editar la discusión, o la discusión no ha comenzado o ya caducó.';
$string['forum:createattachment'] = 'Crear archivos adjuntos';
$string['forum:deleteanypost'] = 'Eliminar cualquier mensaje (en cualquier momento)';
$string['forum:deleteownpost'] = 'Eliminar mensajes propios (antes de la fecha límite)';
$string['forum:editanypost'] = 'Editar cualquier mensaje';
$string['forum:exportdiscussion'] = 'Exportar la discusión completa';
$string['forum:exportownpost'] = 'Exportar mensaje propio';
$string['forum:exportpost'] = 'Exportar mensaje';
$string['forumintro'] = 'Descripción';
$string['forum:managesubscriptions'] = 'Gestionar suscripciones';
$string['forum:movediscussions'] = 'Mover discusiones';
$string['forumname'] = 'Nombre del foro';
$string['forumposts'] = 'Mensajes en foros';
$string['forum:postwithoutthrottling'] = 'Exentos del umbral de mensaje';
$string['forum:rate'] = 'Calificar mensajes';
$string['forum:replynews'] = 'Responder (réplica) a noticias';
$string['forum:replypost'] = 'Responder (réplica) a mensajes';
$string['forums'] = 'Foros';
$string['forum:splitdiscussions'] = 'Dividir discusiones';
$string['forum:startdiscussion'] = 'Comenzar nuevas discusiones';
$string['forumsubjecthidden'] = 'Tema (oculto)';
$string['forumtracked'] = 'Se están rastreando los mensajes no leídos';
$string['forumtrackednot'] = 'Los mensajes no leídos no se están rastreando l';
$string['forumtype'] = 'Tipo de foro';
$string['forumtype_help'] = '<P>Hay cinco tipos diferentes de foros entre los que elegir:

* Una discusión única sencilla - Es simplemente un intercambio de ideas sobre un solo tema, todo en una página. Útil para debates cortos y concretos. Todos pueden responder al tema de discusión. No puede usarse con grupos separados.

* Cada persona plantea un tema a discusión - Cada persona puede plantear exactamente un nuevo tema de discusión (y todos pueden responder). Esta modalidad es útil cuando usted quiere que cada estudiante empiece una discusión sobre, digamos, sus reflexiones sobre el tema de la semana, y que todos los demás le puedan responder.

* Foro de Preguntas y Respuestas - Los estudiantes primero deben escribir sus puntos de vista antes de ver los mensajes de los demás.

* Foro General mostrado en formato similar a Blog - Un foro abierto donde cualquiera puede iniciar un nuevo debate en cualquier momento y en el que los temas de discusión se muestran en una página con enlaces "Discute este tema".

* Foro estándar para uso general - Es un foro abierto donde cualquiera puede empezar un nuevo tema de discusión en cualquier momento. Este es el foro más adecuado, para uso general.';
$string['forum:viewallratings'] = 'Ver todas las valuaciones (ratings) emitidas por las usuarios';
$string['forum:viewanyrating'] = 'Ver el total de valuaciones (ratings) que alguien recibió';
$string['forum:viewdiscussion'] = 'Ver discusiones';
$string['forum:viewhiddentimedposts'] = 'Ver mensajes agendados ocultos';
$string['forum:viewqandawithoutposting'] = 'Ver siempre mensajes de P y R';
$string['forum:viewrating'] = 'Ver valuación (rating) total recibida';
$string['forum:viewsubscribers'] = 'Ver suscriptores';
$string['generalforum'] = 'Foro estándar para uso general';
$string['generalforums'] = 'Foros generales';
$string['inforum'] = 'en {$a}';
$string['introblog'] = 'Los mensajes de este foro fueron copiados aquí de forma automática a partir de los blogs de los usuarios de este curso debido a que esas entradas de blog ya no están disponibles';
$string['intronews'] = 'Novedades y anuncios';
$string['introsocial'] = 'Foro abierto a todos los temas';
$string['introteacher'] = 'Foro de notas y discusiones exclusivo para profesores';
$string['invalidaccess'] = 'No se ha accedido correctamente a esta página';
$string['invaliddiscussionid'] = 'El ID de la discusión es incorrecto o ya no existe';
$string['invalidforcesubscribe'] = 'Modo de suscripción forzada no válido';
$string['invalidforumid'] = 'El ID del foro es incorrecto';
$string['invalidparentpostid'] = 'La ID del mensaje padre es incorrecta';
$string['invalidpostid'] = 'ID de mensaje no válido - {$a}';
$string['lastpost'] = 'Último mensaje';
$string['learningforums'] = 'Foros de aprendizaje';
$string['longpost'] = 'Mensaje largo';
$string['mailnow'] = 'Enviar ahora';
$string['manydiscussions'] = 'Discusiones por página';
$string['markalldread'] = 'Marcar como leídos todos los mensajes de esta discusión.';
$string['markallread'] = 'Marcar como leídos todos los mensajes de este foro.';
$string['markread'] = 'Marcar como leído';
$string['markreadbutton'] = 'Marcar<br />leídos';
$string['markunread'] = 'Marcar como no leído';
$string['markunreadbutton'] = 'Marcar<br />no leídos';
$string['maxattachments'] = 'Número máximo de archivos adjuntos';
$string['maxattachments_help'] = 'Este ajuste determina el número máximo de archivos que se pueden adjuntar a un mensaje en el foro.';
$string['maxattachmentsize'] = 'Tamaño máximo del archivo adjunto';
$string['maxattachmentsize_help'] = '<P>El tamaño de los archivos adjuntos pueden ser limitado por la persona
   que configura el foro.

<P>En ocasiones es posible subir un archivo de un tamaño mayor al especificado,
   pero en este caso no se guardará en el servidor y aparecerá un mensaje de error.';
$string['maxtimehaspassed'] = 'Lo sentimos, pero el tiempo máximo para editar ({$a}) ya venció.';
$string['message'] = 'Mensaje';
$string['messageprovider:digests'] = 'Compendios suscritos del foro';
$string['messageprovider:posts'] = 'Mensajes suscritos del foro';
$string['missingsearchterms'] = 'Los siguientes términos de búsqueda sólo tienen lugar en la marca HTML de este mensaje:';
$string['modeflatnewestfirst'] = 'Ordenar desde el más reciente';
$string['modeflatoldestfirst'] = 'Ordenar desde el más antiguo';
$string['modenested'] = 'Mostrar respuestas anidadas';
$string['modethreaded'] = 'Mostrar respuestas por rama';
$string['modulename'] = 'Foro';
$string['modulename_help'] = 'El módulo foro les permite a los participantes tener discusiones asincrónicas (en diferentes tiempos), que suceden a lo largo de un largo periodo de tiempo.

Existen varios tipos de foros a elegir, como el foro estándar donde cualquiera puede empezar una nueva discusión en cualquier momento, un foro donde cada estudiante solamente puede publicar exactamente una discusión, un foro de preguntas y respuestas donde los estudiantes deben publicar un mensaje antes de poder ver los mensajes de los otros estudiantes. Un profesor puede permitir que se anexen archivos a los mensajes del foro y las imágenes anexas se mostrarán en el mensaje del foro.

Los participantes pueden suscribirse al foro para recibir avisos de nuevos mensajes en el foro. Un profesor puede configurar el modo de suscripción a opcional, forzado o auto, o impedir completamente las suscripciones. Si se requiere, se puede prohibir a los alumnos que publiquen más de un número determinado de mensajes en un periodo de tiempo para evitar que algún individuo acapare las discusiones.

Los mensajes de foros se pueden calificar por los profesores y por los alumnos (evaluación por pares). Las calificaciones de agregan para formar una calificación final que se guarda en el libro de calificaciones.

Los foros tienen varios usos como

* Un espacio introductorio para que los estudiantes del curso se conozcan entre ellos
* Un espacio para avisos del curso (empleando un foro de noticias con suscripción forzosa)
* Un centro de ayuda donde los tutores y alumnos pueden dar orientación
* Un método informal para compartir (y potencialmente hacer evaluación por pares) documentos entre estudiantes
* Para continuar en línea un tema que surgió previamente en una sesión de clase presencial
* Un lugar para que los profesores discutan entre ellos (empleando un foro oculto a los alumnos)
* Para actividades de extensión, por ejemplo, desafíos mentales para que los alumnos ponderen y sugieran soluciones
* Un espacio social para discusiones fuera del tema del curso';
$string['modulenameplural'] = 'Foros';
$string['more'] = 'más';
$string['movedmarker'] = '(Trasladada)';
$string['movethisdiscussionto'] = 'Mover esta discusión a ...';
$string['mustprovidediscussionorpost'] = 'Debe proporcionar una de dos opciones: ID de discusión o ID del mensaje para exportar';
$string['namenews'] = 'Novedades';
$string['namenews_help'] = 'El foro Novedades es un foro especial para anuncios que se crea automáticamente cuando se crea un curso. Un curso puede tener sólo un foro de Novedades. Sólo los profesores y los administradores pueden escribir en el foro de Novedades. El bloque "Últimas noticias" muestra los últimos debates del foro de Novedades.';
$string['namesocial'] = 'Foro social';
$string['nameteacher'] = 'Foro de profesores';
$string['newforumposts'] = 'Nuevos mensajes en foros';
$string['noattachments'] = 'No hay archivos adjuntos a este mensaje';
$string['nodiscussions'] = 'Aún no hay temas de discusión en este foro';
$string['nodiscussionsstartedby'] = '{$a} no ha comenzado ninguna discusión';
$string['nodiscussionsstartedbyyou'] = 'Usted no ha empezado aún ninguna discusión';
$string['noguestpost'] = 'Lo sentimos, los invitados no pueden enviar mensajes.';
$string['noguesttracking'] = 'Lo sentimos, los invitados no pueden ajustar opciones de rastreo.';
$string['nomorepostscontaining'] = 'No se encontraron más mensajes que contengan {$a}';
$string['nonews'] = 'Sin novedades aún';
$string['noonecansubscribenow'] = 'Las suscripciones no están permitidas ahora';
$string['nopermissiontosubscribe'] = 'No tiene permiso para ver los suscriptores del foro';
$string['nopermissiontoview'] = 'No tiene permiso para ver este mensaje';
$string['nopostforum'] = 'Lo sentimos, no puede enviar mensajes a este foro';
$string['noposts'] = 'No hay mensajes';
$string['nopostsmadebyuser'] = '{$a} no ha realizado aportaciones';
$string['nopostsmadebyyou'] = 'Usted no ha realizado ninguna aportación';
$string['noquestions'] = 'Aún no hay preguntas en este foro';
$string['nosubscribers'] = 'Nadie se ha suscrito aún a este foro';
$string['notexists'] = 'La discusión ya no existe';
$string['nothingnew'] = 'Nada nuevo para {$a}';
$string['notingroup'] = 'Lo sentimos, pero debe formar parte del grupo para poder ver este foro.';
$string['notinstalled'] = 'El módulo foro no está instalado';
$string['notpartofdiscussion'] = '¡Este mensaje no es parte de una discusión!';
$string['notrackforum'] = 'No rastrear mensajes no leídos';
$string['noviewdiscussionspermission'] = 'Usted no tiene permiso para ver discusiones en este foro';
$string['nowallsubscribed'] = 'Todos los foros en {$a} están suscritos.';
$string['nowallunsubscribed'] = 'Todos los foros en {$a} están dados de baja.';
$string['nownotsubscribed'] = '{$a->name} no recibirá copias de \'{$a->forum}\' por correo.';
$string['nownottracking'] = '{$a->name} ya no está rastreando \'{$a->forum}\'.';
$string['nowsubscribed'] = '{$a->name} recibirá copias de \'{$a->forum}\' por correo.';
$string['nowtracking'] = '{$a->name} está rastreando \'{$a->forum}\' en este momento.';
$string['numposts'] = '{$a} mensajes';
$string['olderdiscussions'] = 'Discusiones anteriores';
$string['oldertopics'] = 'Temas antiguos';
$string['oldpostdays'] = 'Leer después de días';
$string['openmode0'] = 'Ni discusiones, ni réplicas';
$string['openmode1'] = 'No se pueden iniciar discusiones, pero si se permiten réplicas';
$string['openmode2'] = 'Se permiten discusiones y réplicas';
$string['overviewnumpostssince'] = 'mensajes desdeel último ingreso';
$string['overviewnumunread'] = 'no leídos';
$string['page-mod-forum-discuss'] = 'Página del hilo de la discusión del módulo Foro';
$string['page-mod-forum-view'] = 'Página principal del módulo Foro';
$string['page-mod-forum-x'] = 'Cualquier página del módulo Foro';
$string['parent'] = 'Mostrar mensaje anterior';
$string['parentofthispost'] = 'Anterior a este mensaje';
$string['pluginadministration'] = 'Administración del foro';
$string['pluginname'] = 'Foro';
$string['postadded'] = '<p>Su mensaje se ha enviado con éxito.</p> <p>Tiene {$a} para editar si desea hacer cualquier cambio.</p>';
$string['postaddedsuccess'] = 'Su mensaje ha sido añadido con éxito.';
$string['postaddedtimeleft'] = 'Dispone de {$a} para editarlo si quiere hacer cualquier cambio.';
$string['postincontext'] = 'Ver el mensaje en su contexto';
$string['postmailinfo'] = 'Esta es una copia del mensaje publicado en el sitio web {$a}. Para responder (réplica) a este mensaje haga clic en este enlace:';
$string['postmailnow'] = '<p>Este mensaje será enviado inmediatamente a todos los suscritos al foro.</p>';
$string['postrating1'] = 'Muy individualista';
$string['postrating2'] = 'Término medio';
$string['postrating3'] = 'Muy comunicativo';
$string['posts'] = 'Mensajes';
$string['postsmadebyuser'] = 'Aportación realizada por {$a}';
$string['postsmadebyuserincourse'] = 'Comentarios hechos por {$a->fullname} en {$a->coursename}';
$string['posttoforum'] = 'Enviar al foro';
$string['postupdated'] = 'Su mensaje se ha actualizado';
$string['potentialsubscribers'] = 'Suscriptores potenciales';
$string['processingdigest'] = 'Procesando el resumen por correo para el usuario {$a}';
$string['processingpost'] = 'Procesando {$a}';
$string['prune'] = 'Partir';
$string['prunedpost'] = 'Se ha creado una nueva discusión a partir de ese mensaje';
$string['pruneheading'] = 'Partir la discusión y mover este mensaje hacia una discusión nueva';
$string['qandaforum'] = 'Foro Preguntas y Respuestas';
$string['qandanotify'] = 'Este es un foro de Preguntas y Respuestas. Para ver otras respuestas, debe primero enviar la suya';
$string['re'] = 'Re:';
$string['readtherest'] = 'Ver el resto del tema';
$string['replies'] = 'Réplicas';
$string['repliesmany'] = '{$a} réplicas';
$string['repliesone'] = '{$a} réplica hasta el momento';
$string['reply'] = 'Responder (réplica)';
$string['replyforum'] = 'Responder (réplica) al foro';
$string['replytouser'] = 'Usar dirección email en réplica';
$string['resetforums'] = 'Eliminar mensajes de';
$string['resetforumsall'] = 'Eliminar todos los mensajes';
$string['resetsubscriptions'] = 'Eliminar todas las suscripciones al foro';
$string['resettrackprefs'] = 'Eliminar todas las preferencias de rastreo de los foros';
$string['rssarticles'] = 'Número de artículos recientes RSS';
$string['rssarticles_help'] = '<P>Esta opción le permite seleccionar el número de artículos a incluir
   en el Canal RSS.

<P>Un número comprendido entre 5 y 20 debería ser apropiado para la mayoría
   de los foros. Auméntelo si se trata de un foro muy utilizado.';
$string['rsssubscriberssdiscussions'] = 'Canal RSS de discusiones';
$string['rsssubscriberssposts'] = 'Canal RSS de mensajes';
$string['rsstype'] = 'Canal RSS de esta actividad';
$string['rsstype_help'] = '<P>Esta opción le permite habilitar los canales RSS en este foro. <P>Puede escoger entre dos tipos de foros: <UL> <LI><B>Discusiones:</B> Con esta opción, los datos generados incluirán nuevas discusiones en el foro con su mensaje inicial. <LI><B>Mensajes:</B> Con esta opción, los datos generados incluirán cada nuevo mensaje en el foro. </UL>';
$string['search'] = 'Buscar';
$string['searchdatefrom'] = 'Los mensajes deben ser más recientes que éste';
$string['searchdateto'] = 'Los mensajes deben ser más antiguos que éste';
$string['searchforumintro'] = 'Por favor, introduzca los términos de búsqueda en uno o más de los campos siguientes:';
$string['searchforums'] = 'Buscar en foros';
$string['searchfullwords'] = 'Estas palabras deberían aparecer como palabras completas';
$string['searchnotwords'] = 'Estas palabras NO deberían incluirse';
$string['searcholderposts'] = 'Buscar mensajes antiguos...';
$string['searchphrase'] = 'En el mensaje debería aparecer esta frase exacta';
$string['searchresults'] = 'Resultado';
$string['searchsubject'] = 'Estas palabras deberían figurar en el asunto';
$string['searchuser'] = 'Este nombre debería corresponder al del autor';
$string['searchuserid'] = 'ID del autor en Moodle';
$string['searchwhichforums'] = 'Elegir en qué foros buscar';
$string['searchwords'] = 'Estas palabras pueden aparecer en cualquier lugar del mensaje';
$string['seeallposts'] = 'Ver todos los mensajes de este usuario';
$string['shortpost'] = 'Mensaje corto';
$string['showsubscribers'] = 'Mostrar/editar suscriptores actuales';
$string['singleforum'] = 'Una discusión única sencilla';
$string['smallmessage'] = '{$a->user} envió un mensaje a {$a->forumname}';
$string['startedby'] = 'Comenzado por';
$string['subject'] = 'Asunto';
$string['subscribe'] = 'Suscribirse a este foro';
$string['subscribeall'] = 'Suscribir a todos a este foro';
$string['subscribed'] = 'Suscrito';
$string['subscribeenrolledonly'] = 'Sólo los usuarios registrados pueden suscribirse en los foros para recibir mensajes por correo electrónico.';
$string['subscribenone'] = 'Dar de baja a todos de este foro';
$string['subscribers'] = 'Suscriptores';
$string['subscribersto'] = 'Suscriptores de \'{$a}';
$string['subscribestart'] = 'Deseo recibir copias de este foro por correo';
$string['subscribestop'] = 'No deseo recibir copias de este foro por correo';
$string['subscription'] = 'Suscripción';
$string['subscriptionandtracking'] = 'Suscripción y seguimiento';
$string['subscriptionauto'] = 'Suscripción automática';
$string['subscriptiondisabled'] = 'Suscripción deshabilitada';
$string['subscriptionforced'] = 'Suscripción forzosa';
$string['subscription_help'] = '<P>Cuando alguien se subscribe a un foro recibirá por correo electrónico una
   copia de cada mensaje enviado a ese foro (los mensajes son enviados
   <?PHP echo $CFG->maxeditingtime/60 ?> aproximadamente 30 minutos después
   de haber sido escritos).

<P>Los participantes normalmente pueden escoger si desean o no suscribirse a cada uno
   de los foros.

<P>Sin embargo, si un profesor fuerza la suscripción a un foro concreto, esta
   posibilidad de elección es anulada y todos recibirán copias por
   correo electrónico de los mensajes de ese foro.

<P>Esto es especialmente útil en el foro de Noticias y en los foros iniciados
   al principio del curso (antes de que todos sepan que pueden suscribirse por sí mismos).';
$string['subscriptionmode'] = 'Modalidad de suscripción';
$string['subscriptionmode_help'] = 'Cuando un participante se subscribe a un foro, ésto significa que recibirá por correo electrónico notificaciones acerca de los mensajes enviados a ese foro. Hay 4 modos de suscripción:

* Opcional - Los participantes pueden elegir si desean o no ser suscritos.
* Forzosa - Todos están suscritos y no puede darse de baja.
* Automática - Todos están suscritos inicialmente, pero cada usuario puede elegir desactivar la suscripción en cualquier momento.
* Desactivada - No se permiten suscripciones.

Nota: Los cambios en cualquier modo de suscripción solamente afectarán a los usuarios que se inscriban a futuro en el foro, y no afectarán a los usuarios existentes.';
$string['subscriptionoptional'] = 'Suscripción opcional';
$string['subscriptions'] = 'Suscripciones';
$string['thisforumisthrottled'] = 'Este foro tiene un número limitado de mensajes para enviar en un cierto período de tiempo. El ajuste normalmente se hace en {$a->blockafter} mensaje(s) en {$a->blockperiod}';
$string['timedposts'] = 'Mensajes con asignación de tiempo';
$string['timestartenderror'] = 'La fecha final no puede ser anterior a la inicial';
$string['trackforum'] = 'Rastrear mensajes no leídos';
$string['tracking'] = 'Rastrear';
$string['trackingoff'] = 'Desactivado';
$string['trackingon'] = 'Activado';
$string['trackingoptional'] = 'Opcional';
$string['trackingtype'] = 'Leer rastreo de este foro';
$string['trackingtype_help'] = '<p>Si los foros tienen activada la opción de seguimiento
   (forum_trackreadposts), los usuarios pueden realizar
   el seguimiento de mensajes leídos y no leídos
   en los foros y las discusiones. El profesor puede
   obligar a realizar cierto tipo de seguimiento
   en un foro utilizando este ajuste.</p>

<p>Existen tres posibilidades:</p>
<ul>
<li>Opcional [por defecto]: los estudiante pueden activar
    o desactivar el seguimiento a su discreción.</li>
<li>Conectado: El seguimiento siempre está activo.</li>
<li>Desconectado: El seguimiento siempre está inactivo.</li>
</ul>';
$string['unread'] = 'No leído';
$string['unreadposts'] = 'Mensajes no leídos';
$string['unreadpostsnumber'] = '{$a} mensajes no leídos';
$string['unreadpostsone'] = '1 mensaje no leído';
$string['unsubscribe'] = 'Darse de baja de este foro';
$string['unsubscribeall'] = 'Dar de baja de todos los foros';
$string['unsubscribeallconfirm'] = 'En este momento está suscrito a {$a} foros. ¿Realmente desea darse de baja de todos los foros y deshabilitar la suscripción automática al foro?';
$string['unsubscribealldone'] = 'Se han eliminado todas sus suscripciones a los foros. Aun así, podría seguir recibiendo notificaciones de foros con suscripción forzosa. Si no desea recibir emails de este servidor, vaya por favor a su perfil y deshabilite allí la dirección email.';
$string['unsubscribeallempty'] = 'Lo sentimos, no está suscrito a ningún foro. Si no desea recibir amails de este servidor, vaya por favor a su perfil y deshabilite allí la dirección email.';
$string['unsubscribed'] = 'No suscrito';
$string['unsubscribeshort'] = 'Dar de baja (des-suscribir)';
$string['usermarksread'] = 'Calificado de lectura manual de mensajes';
$string['viewalldiscussions'] = 'Ver todas las discusiones';
$string['warnafter'] = 'Umbral de mensajes para advertencia';
$string['warnafter_help'] = 'Se puede avisar a los estudiante de que se acercan al máximo número de aportaciones permitidas en el periodo de tiempo determinado. Este parámetro especifica después de cuántas aportaciones se les debe advertir. Los usuarios con el permiso \'moodle/forum:postwitho están exentos de esta limitación.';
$string['warnformorepost'] = '¡Advertencia!. Hay más de una discusión en este foro - se usará la más reciente';
$string['yournewquestion'] = 'Su nueva pregunta';
$string['yournewtopic'] = 'Su nuevo tema de discusión';
$string['yourreply'] = 'Su respuesta (réplica)';
