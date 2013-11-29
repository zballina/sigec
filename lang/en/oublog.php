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
 * Strings for component 'oublog', language 'es_mx', branch 'MOODLE_24_STABLE'
 *
 * @package   oublog
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accessdenied'] = 'Lo siento, Usted';
$string['addcomment'] = 'Añadir comentario';
$string['addlink'] = 'Añadir enlace';
$string['addpost'] = 'Añadir mensaje blog';
$string['allowcomments'] = 'Permitir comentarios';
$string['allowcomments_help'] = '&lsquo;Si, de usuarios identificados&rsquo; permte comentarios de usuarios que tengan acceso al blog.

&lsquo;Si, de todos&rsquo; permite comentarios de usuarios y del público en general. Usted recibirá correos para aprobar o rechazar coemntarios de usuarios que no estén identificados.

&lsquo;No&rsquo; impide a todos hacer comentarios en esta publicación.';
$string['allowcommentsmax'] = 'Permitir comentarios (si eligió publicar)';
$string['atom'] = 'Atom';
$string['atomfeed'] = 'canal Atom';
$string['attachments'] = 'Anexos';
$string['attachments_help'] = 'Opcionalmente Usted puede anexar uno o más archivos a una publicación en blog. Si añade una imagen, se mostrará después del mensaje.';
$string['blogfeed'] = 'Canales del Blog';
$string['bloginfo'] = 'Información del blog';
$string['blogname'] = 'Nombre del blog';
$string['blogoptions'] = 'Opciones del blog';
$string['blogsummary'] = 'Resumen del blog';
$string['comment'] = 'Añada su comentario';
$string['commentonby'] = 'Comentado en <u>{$a->title}</u> por <u>{$a->author}</u>';
$string['comments'] = 'Comentarios';
$string['commentsby'] = 'Comentarios por {$a}';
$string['commentsfeed'] = 'Comentarios solamente';
$string['commentsnotallowed'] = 'Comentarios no están permitidos';
$string['completioncomments'] = 'El usuario debe hacer comentarios en publicaciones del blog';
$string['completioncommentsgroup'] = 'Requerir comentarios';
$string['completioncommentsgroup_help'] = 'Si habilita esta opción, el blog será marcado como completo para un estudiante en cuanto hayan dejado el número especificado de comentarios.';
$string['completionposts'] = 'Los usuarios deben hacer publicaciones al blog:';
$string['completionpostsgroup'] = 'Requerir publicaciones';
$string['completionpostsgroup_help'] = 'Si habilita esta opción, el blog será marcado como completo para un estudiante en cuanto hayan hecho el número especificado de publicaciones.';
$string['computingguide'] = 'Guía a los blogs OU';
$string['computingguideurl'] = 'URL de guía de cómputo';
$string['computingguideurlexplained'] = 'Escriba la URL para la guía de cómputo de blogs OU';
$string['configmaxattachments'] = 'Número máximo de anexos permitidos por publicación de blog.';
$string['configmaxbytes'] = 'Tamaño máximo para todos los anexos del blog en el sitio. (sujeto a límites del curso y otras configuraciones locales)';
$string['confirmdeletecomment'] = '¿Está Usted seguro de querer borar este comentario?';
$string['confirmdeletelink'] = '¿Está Usted seguro de querer borar este enlace?';
$string['confirmdeletepost'] = '¿Está Usted seguro de querer borar esta publicación de blog?';
$string['couldnotaddcomment'] = 'No se pudo añadir comentario';
$string['couldnotaddlink'] = 'No se pudo añadir enlace';
$string['defaultpersonalblogname'] = 'El blog de {$a}';
$string['delete'] = 'Borrar';
$string['deletedby'] = 'Borrado por {$a->fullname}, {$a->timedeleted}';
$string['deleteglobalblog'] = 'Usted no puede borrar el blog global';
$string['details'] = 'Detalles';
$string['displayversion'] = 'Versión de OU blog: <strong>{$a}</strong>';
$string['downloadas'] = 'Descargó datos como';
$string['edit'] = 'Editar';
$string['editlink'] = 'Editar enlace';
$string['editonsummary'] = 'Editado {$a->editdate}';
$string['editpost'] = 'Actualizar publicación blog';
$string['editsummary'] = 'Editado por {$a->editby}, {$a->editdate}';
$string['error_alreadyapproved'] = 'El comentario ya fue aprobado o rechazado';
$string['error_grouppubliccomments'] = 'Usted no puede permitir comentarios públicos cuando el blog está en modo de grupo';
$string['error_moderatednotallowed'] = 'Los comentarios moderados ya no están permitidos en este blog o publicación de blog';
$string['error_noconfirm'] = 'Escriba el texto en negritas de arriba, exactamente como aparece, en esta caja.';
$string['error_toomanycomments'] = 'Usted ha hecho demasiados comentarios al blog en la última hora desde esta direción de internet. Por favor espere un rato y vuelva a intentarlo.';
$string['error_unspecified'] = 'El sistema no puede completar su solicitud debido a que ocurrió un error ({$a})';
$string['error_wrongkey'] = 'Clave de comentario incorrecta';
$string['exportedpost'] = 'Publicación de blog exportada';
$string['externaldashboardadd'] = 'Añadir blog al tablero';
$string['externaldashboardremove'] = 'Remover blog del tablero';
$string['extranavolderposts'] = 'Publicaciones anteriores: {$a->from}-{$a->to}';
$string['extranavtag'] = 'Etiqueta (tag): {$a}';
$string['feedhelp'] = 'Canales';
$string['feedhelp_help'] = 'Si utiliza canales Usted puede añadir un enlace Atom o RSS para mantenerse actualizado con este blog. La mayoría de los lectores de canales soportan Atom y RSS.

Si el blog permite comentarios, existen canales para ‘Comentarios solamente’.';
$string['feeds'] = 'Canales';
$string['feedsnotenabled'] = 'Los canales no están habilitados';
$string['foruser'] = 'para {$a}';
$string['globalblogmissing'] = 'Falta el blog global';
$string['gradesupdated'] = 'Calificaciones actualizadas';
$string['guestblog'] = 'Si Usted tiene una cuenta en el sistema, por favor,  <a href=\'{$a}\'>regístrese para tener acceso completo al blog</a>.';
$string['individualblogs'] = 'Blogs individuales';
$string['individualblogs_help'] = '<p><strong>No (blog juntos o en grupo)</strong>: <em>Los blogs individuales no se usan</em> – No hay blogs individuales configurados, todos son parte de una comunidad mayor (dependiendo de la configuración de \'modo Grupo\').</p> <p><strong>Blogs individuales separados</strong>: <em>Blogs Individuales se usan de forma privada</em> – Los usuarios individuales solamente pueden publicar-a y ver en sus propios blogs, a menos que tengan permiso ("viewindividual") para ver otros blogs individuales.</p> <p><strong>Blogs individuales visibles</strong>: <em>Los blogs individuales se usan públicamente</em> – los usuarios individuales solamente pueden publicar en sus propios blogs, pero pueden ver las publicaciones de otros blogs individuales</p>';
$string['invalidblog'] = 'ID de blog inválida';
$string['invalidblogdetails'] = 'No se pueden encontrar detalles sobre la publicación blog {$a}';
$string['invalidcomment'] = 'ID de comentario inválida';
$string['invalidedit'] = 'ID de edición inválida';
$string['invalidformat'] = 'El formato debe ser Atom o RSS';
$string['invalidlink'] = 'ID de enlace inválido';
$string['invalidpost'] = 'ID de publicación inválida';
$string['invalidpostid'] = 'Postid inválida';
$string['invalidvisbilitylevel'] = 'Nivel de visibilidad inválido {$a}';
$string['invalidvisibility'] = 'Nivel de visibilidad inválido';
$string['lastcomment'] = '(último por {$a->fullname}, {$a->timeposted})';
$string['links'] = 'Enlaces relacionados';
$string['logincomments'] = 'Si, de usuarios identificados';
$string['maxattachments'] = 'Número máximo de anexos';
$string['maxattachments_help'] = 'Esta configuración especifica el número máximo de archivos que pueden ser anexados a una publicación de blog.';
$string['maxattachmentsize'] = 'Tamaño máximo de anexo';
$string['maxattachmentsize_help'] = 'Esta configuración especifica el tamaño máximo del archivo que puede ser anexado a una publicación de blog.';
$string['maxvisibility'] = 'Visibilidad máxima';
$string['maxvisibility_help'] = '<p><em>En un blog personal:</em> <strong>Visible solamente para el propietario del blog (privado)</strong> – nadie más puede ver esta publicación.</p> <p><em>En un blog de curso:</em> <strong>Visible a los participantes de este curso</strong> – para ver la publicación Usted requiere que le hayan dado acceso al blog, usualmente al inscribirse al curso que lo contiene.</p> <p><strong>Visible para todos los identificados en el sistema</strong> – todos los que estén identificados pueden ver esta publicaci´n, aún cuando no estén inscritos en un curso específico.</p> <p><strong>Visible para todo el  mundo</strong> – cualquier usuario de internet puede ver este blog si les da la dirección.</p> <p>Esta opción existe en todo el blog y también para publicaciones individuales. Si la opción se configura para todo el blog, esto se vuelve un máximo. Por ejemplo: si todo el blog se pusiera al primer nivel, Usted no podrá cambiar el nivel de una publicación individual en absoluto.</p>';
$string['maybehiddenposts'] = 'Este blog contiene publicaciones que solamente son visibles para usuarios identificados, o donde solamente pueden comentar usuarios identificdos. Si Usted tiene cuenta en el sistema, por favor <a href=\'{$a}\'>regístrese para tener acceso completo</a>.';
$string['message'] = 'Mensaje';
$string['moderated_addedcomment'] = 'Gracias por añadir su comentario, que ha sido recibido exitosamente. Su comentario no aparecerá hasta que haya sido aprobado por el autor de esta publicación.';
$string['moderated_approve'] = 'Aprobar este comentario';
$string['moderated_authorname'] = 'Su nombre';
$string['moderated_awaiting'] = 'Comentarios que esperan aprobación';
$string['moderated_awaitingnote'] = 'Estos comentarios no son visibles para otros usuarios a menos que Usted los apruebe. Considere que el sistema no conoce la identidad de las personas que comentaron y que los comentarios pudieran tener enlaces que, de seguirse, pudieran <strong>dañar seriamente su computadora</strong>. Si tiene dudas, por favor rechace los comentarios <strong>sin seguir ningun enlace dentro de ellos</strong>.';
$string['moderated_confirm'] = 'Confirmación';
$string['moderated_confirminfo'] = 'Por favor esciba <strong>si</strong> debajo para confirmar que Usted es una persona.';
$string['moderated_confirmvalue'] = 'si';
$string['moderated_emailhtml'] = '<p>(Este es un correo generado automáticamente. Por favor no responda.)</p> <p>Alguien ha añadido un comentario a su publicación del blog: {$a->postlink}</p> <p>Usted necesita <strong>aprobar el comentariot</strong> antes de que este aparezca publicado.</p> <p>El sistema no conoce la identidad de quien hizo el comentario y los comentarios pudieran contener enlaces que, en caso de seguirse, pudieran <strong>dañar seriamente su computadora</strong>. Si tiene dudas, por favor rechace los comentarios <strong>sin seguir ningun enlace dentro de ellos</strong>.</p> <p>Si Usted aprueba el comentario, Usted asume la responsabilidad por publicarlo. Asegúrese de que no contenga nada que vaya contra las reglas.</p> <hr/> <p>Nombre dado: {$a->commenter}</p> <hr/> <h3>{$a->commenttitle}</h3> {$a->comment} <hr/> <ul class=\'oublog-approvereject\'> <li><a href=\'{$a->approvelink}\'>{$a->approvetext}</a></li> <li><a href=\'{$a->rejectlink}\'>{$a->rejecttext}</a></li> </ul> <p> Usted también podría ignorar este correo y el comentario será borrado automáticamente en 30 días.. </p> <p> Si Usted recibe demasiados de estos correos, Usted puede restringir los comentarios para que solamente los hagan los usuarios identificados . </p> <ul class=\'oublog-restrict\'> <li><a href=\'{$a->restrictpostlink}\'>{$a->restrictposttext}</a></li> <li><a href=\'{$a->restrictbloglink}\'>{$a->restrictblogtext}</a></li> </ul>';
$string['moderated_emailsubject'] = 'Comentario esperando aprobación en: {$a->blog} ({$a->commenter})';
$string['moderated_emailtext'] = 'Este es un correo generado automáticamente. Por favor no responda.

Alguien ha añadido un comentario a su publicación del blog: {$a->postlink}

Usted necesita aprobar el comentariot antes de que este aparezca publicado.

El sistema no conoce la identidad de quien hizo el comentario y los comentarios pudieran contener enlaces que, en caso de seguirse, pudieran dañar seriamente su computadora.
Si tiene dudas, por favor rechace los comentarios sin seguir ningun enlace dentro de ellos.

Si Usted aprueba el comentario, Usted asume la responsabilidad por publicarlo. Asegúrese de que no contenga nada que vaya contra las reglas.

-----------------------------------------------------------------------
Nombre dado: {$a->commenter}
----------------------------------------------------------------------- {$a->commenttitle}
 {$a->comment}
-----------------------------------------------------------------------

* {$a->approvetext}: {$a->approvelink}

* {$a->rejecttext}: {$a->rejectlink}

Usted también podría ignorar este correo y el comentario será borrado automáticamente en 30 días.

Si Usted recibe demasiados de estos correos, Usted puede restringir los comentarios para que solamente los hagan los usuarios identificados.

* {$a->restrictposttext}: {$a->restrictpostlink}

* {$a->restrictblogtext}: {$a->restrictbloglink}';
$string['moderated_info'] = 'Debido a que Usted no está identificado, su comentario solamente aparecerá después de que sea aprobado Si Usted tiene cuenta en el sistema, por favor <a href=\'{$a}\'>regístrese para tener acceso completo</a>.';
$string['moderated_postername'] = 'usando el nombre <strong>{$a}</strong>';
$string['moderated_reject'] = 'Rechazar este comentario';
$string['moderated_rejectedon'] = 'Rechazado {$a}:';
$string['moderated_restrictblog'] = 'Restringir los comentarios en todas sus publicaciones de este blog';
$string['moderated_restrictblog_info'] = '¿Le gustaría restringir los comentarios en todas sus publicaciones de este blog, de forma tal que solamente las personas identificadas en el sistema puedan añadir comentarios?';
$string['moderated_restrictpage'] = 'Retringir comentarios';
$string['moderated_restrictpost'] = 'Retringir comentarios en esta publicación';
$string['moderated_restrictpost_info'] = '¿Le gustaría restringir los comentarios en esta publicación, de forma tal que solamente las personas identificadas en el sistema puedan añadir comentarios?';
$string['moderated_submitted'] = 'Esperando moderación';
$string['moderated_typicaltime'] = 'En el pasado, esto generalmente ha tomado {$a}.';
$string['modulename'] = 'blog OU';
$string['modulename_help'] = 'El módulo de actividad blog permite la creación de blogs dentro de un curso (estos están separados del sistema de blog del núcleo de Moodle).
Usted puede tener blogs a lo ancho del curso (todos en el curso publican al mismo blog), blogs de grupo, o blogs individuales.';
$string['modulenameplural'] = 'blogs OU';
$string['mustprovidepost'] = 'Debe proporcionar postid';
$string['myparticipation'] = 'Mi participación';
$string['ncomments'] = '{$a} comentarios';
$string['newblogposts'] = 'Nuevas publicaciones del blog';
$string['newcomment'] = 'Nuevo comentario del blog';
$string['newerposts'] = 'Publicaciones más nuevas &gt;';
$string['newpost'] = 'Nueva publicación del blog';
$string['no'] = 'No';
$string['noblogposts'] = 'Sin publicaciones del blog';
$string['no_blogtogetheroringroups'] = 'No (blog junto o en grupos)';
$string['nocomments'] = 'Comentarios no permitidos';
$string['noposts'] = 'No hay publicaciones visibles en este blog.';
$string['notaddpost'] = 'No se pudo añadir publicación';
$string['notaddpostnogroup'] = 'No se puede añadir publicación con no-grupo';
$string['nousercomments'] = 'El usuario no añadió comentarios a este blog.';
$string['nouserposts'] = 'El usuario no hizo publicaciones en este blog.';
$string['npending'] = '{$a} comentarios esperan aprobación';
$string['npendingafter'] = '{$a} esperando aprobación';
$string['numposts'] = '{$a} publicaciones';
$string['olderposts'] = '&lt; Publicaciones más antiguas';
$string['onecomment'] = '{$a} comentario';
$string['onepending'] = '{$a} comentarios esperando aprobación';
$string['onependingafter'] = ', {$a} esperando aprobación';
$string['onlyworkspersonal'] = 'Solamente trabajos para blogs personales';
$string['oublog'] = 'blog OU';
$string['oublog:addinstance'] = 'Añadir un nuevo blog OU';
$string['oublog:audit'] = 'Ver publicaciones borradas y versiones anteriores';
$string['oublog:comment'] = 'Comentar sobre una publicación';
$string['oublog:contributepersonal'] = 'Publicar y comentar en en blogs personales';
$string['oublog:exportownpost'] = 'Exportar sus propias publicaciones';
$string['oublog:exportpost'] = 'Exportar publicaciones';
$string['oublog:grade'] = 'Calificar participación de usuario en blog OU';
$string['oublog:managecomments'] = 'Administrar comentarios';
$string['oublog:managelinks'] = 'Administrar enlaces';
$string['oublog:manageposts'] = 'Administrar publicaciones';
$string['oublog:post'] = 'Crear una nueva publicación';
$string['oublog:view'] = 'Ver publicaciones';
$string['oublog:viewindividual'] = 'Ver blogs individuales';
$string['oublog:viewparticipation'] = 'Ver participación de usuario en blog OU';
$string['oublog:viewpersonal'] = 'Ver publicaciones en blogs personales';
$string['overviewnumentrylog'] = 'entradas desde la última identificacón';
$string['overviewnumentrylog1'] = 'entrada desde la última identificacón';
$string['overviewnumentryvw'] = 'entradas desde la última vez que se vió';
$string['overviewnumentryvw1'] = 'entrada desde la última vez que se vió';
$string['participation'] = 'Participación';
$string['participationbyuser'] = 'Participación por usuario';
$string['permalink'] = 'Enlace-permanente';
$string['personalblognotsetup'] = 'Blogs personales no configurados';
$string['pluginadministration'] = 'Administración Blog OU';
$string['pluginname'] = 'Blog OU';
$string['postauthor'] = 'Autor publicación';
$string['postdate'] = 'Fecha publicción';
$string['postedby'] = 'por {$a}';
$string['postedbymoderated'] = 'por {$a->commenter} (aprobada por {$a->approver}, {$a->approvedate})';
$string['postedbymoderatedaudit'] = 'por {$a->commenter} [{$a->ip}] (aprobada por {$a->approver}, {$a->approvedate})';
$string['posts'] = 'Publicaciones';
$string['postsby'] = 'Publicaciones por {$a}';
$string['posttime'] = 'Hora de publicación';
$string['posttitle'] = 'Título de publicación';
$string['publiccomments'] = 'Si, por todos (aunque no estén identificados)';
$string['publiccomments_info'] = 'Si alguien añade un comentario cuando no estén identificados, Usted recibirá un correo electrónico y puede aprobar o rechazar el coemntario. Esto es necesario para prevenir el spam.';
$string['re'] = 'Re: {$a}';
$string['rss'] = 'RSS';
$string['rssfeed'] = 'Canal RSS';
$string['savegrades'] = 'Guardar calificaciones';
$string['searchblogs'] = 'Buscar blogs';
$string['searchthisblog'] = 'Buscar en este blog';
$string['searchthisblog_help'] = 'Escriba el término a buscar y presione ENTER o elija el botón.

Para buscar una frase exacta debe emplear comillas.

Para excluir una palabra inserte un guión inmediantemente antes de la palabra.

Ejemplo: la búsqueda <tt>picasso -escultura &quot;primeros trabajos&quot;</tt> regresará resultados para &lsquo;picasso&rsquo; o la frase &lsquo;primeros trabajos&rsquo; pero excluirá los items que contengan &lsquo;escultura&rsquo;.';
$string['separateindividual'] = 'Separar&nbsp;individuales';
$string['separateindividualblogs'] = 'Separar blogs individuales';
$string['siteentries'] = 'Ver entradas al sitio';
$string['subscribefeed'] = 'Suscribirse al cana (requiere software apropiado) para recibir notficación cundo este blog se actualice.';
$string['summary'] = 'Resumen';
$string['tags'] = 'Marcadores (tags)';
$string['tagsfield'] = 'Marcadores (tags) (separados por comas)';
$string['tags_help'] = 'Existen etiquetas que le ayudana a encontrar y categorizar las publicaciones del blog';
$string['tagupdatefailed'] = 'Falló al actualizar marcadores (tags)';
$string['title'] = 'Título';
$string['unsupportedbrowser'] = '<p>Su navegador no puede mostrar canales Atom o RSS directamente.</p> <p>Los canales son más útiles en programas independientes de cómputo o sitios web. Si Usted desea usar estos canales en alguno de esos programas, copie y pegue la dirección desde la barra de direcciones de su navegador web.</p>';
$string['url'] = 'Dirección de internet completa';
$string['usergrade'] = 'Calificación del usuario';
$string['userparticipation'] = 'Participación del usuario';
$string['viewallusers'] = 'Ver todos los usuarios';
$string['viewallusersingroup'] = 'Ver todos los usuarios del grupo';
$string['viewblogdetails'] = 'Ver detalles del blog';
$string['viewblogposts'] = 'Regresar al blog';
$string['viewedit'] = 'Ver edición';
$string['views'] = 'Visitas totales a este blog:';
$string['visibility'] = '¿Quién puede ver esto?';
$string['visibility_help'] = '<p><strong>Visible para participantes en este curso</strong> – para ver la publicación Usted debe haber recibido previamente acceso a este blog, usualmente al inscribirse en el curso que contiene el blog.</p>

<p><strong>Visible para todos los identificados en el sistema</strong> – todos los que estén identificados en el sistema pueden ver la publicación, aún si no estuvieran inscritos en algún curso específico.</p> <p><strong>Visible para todo el mundo</strong> – cualquier usuario de internet puede ver la publicación si Usted le proporciona la dirección del blog.</p>';
$string['visibleblogusers'] = 'Visible solamente a miembros de este blog';
$string['visiblecourseusers'] = 'Visible a participantes de este curso';
$string['visibleindividual'] = 'Visible&nbsp;individuales';
$string['visibleindividualblogs'] = 'Visible blogs individuales';
$string['visibleloggedinusers'] = 'Visible a todos los identificados en el sistema';
$string['visiblepublic'] = 'Visible a todo el mundo';
$string['visibleyou'] = 'Visible solamente al propietario del blog (privado)';
$string['yes'] = 'Si';
