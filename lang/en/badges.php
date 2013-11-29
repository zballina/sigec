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
 * Strings for component 'badges', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   badges
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Acciones';
$string['activate'] = 'Habilitar acceso';
$string['activatesuccess'] = 'El acceso a insignias fue habilitado exitosamente.';
$string['addbadgecriteria'] = 'Añadir criterio para insignia';
$string['addcourse'] = 'Añadir cursos';
$string['addcourse_help'] = 'Seleccionar todos los cursos que deberían ser añadidos a este requisito para insignia. Mantener presionada la tecla Ctrl para seleccionar varios ítems.';
$string['addcriteria'] = 'Añadir criterio';
$string['addcriteriatext'] = 'Para empezar a añadir criterios, por favor seleccione una de las opciones del menú desplegable.';
$string['addtobackpack'] = 'Añadir a mochila';
$string['adminonly'] = 'Esta página está restringida a Administradores del Sitio exclusivamente';
$string['after'] = 'después de la fecha de emisión';
$string['aggregationmethod'] = 'Método de agregación';
$string['all'] = 'Todas';
$string['allmethod'] = 'Todas las condiciones seleccionadas se cumplen';
$string['allmethodactivity'] = 'Todas las actividades seleccionadas están completas';
$string['allmethodcourseset'] = 'Todos los cursos selecionados están completos';
$string['allmethodmanual'] = 'Todos los roles seleccionados otorgan la insignia';
$string['allmethodprofile'] = 'Todos los campos de perfil seleccionados han sido completados';
$string['allowcoursebadges'] = 'Habilitar insignias de curso';
$string['allowcoursebadges_desc'] = 'Permitir la creación y otorgamiento de insignias en el contexto de curso.';
$string['allowexternalbackpack'] = 'Habilitar conexión hacia mochilas externas';
$string['allowexternalbackpack_desc'] = 'Le permite a los usuarios configurar conexiones y mostrar insignias de sus provedores de mochilas externas.

Nota: Se recomienda dejar esta opción deshabilitada si el sitio web no puede ser accesado desde el Internet (porque hay un cortafuegos \'firewall\').';
$string['any'] = 'Cualquiera';
$string['anymethod'] = 'Cualquiera de las condiciones seleccionadas se cumple';
$string['anymethodactivity'] = 'Cualquiera de las actividades seleccionadas está completa';
$string['anymethodcourseset'] = 'Cualquiera de los cursos seleccionados está completo';
$string['anymethodmanual'] = 'Cualquiera de los roles seleccionados otorga la insignia';
$string['anymethodprofile'] = 'Cualquiera de los campos de perfil seleccionados ha sido completado';
$string['attachment'] = 'Anexar insignia al mensaje';
$string['attachment_help'] = 'Si se activa, una insignia otorgada se anexará al Email del recipiente para que sea descargada';
$string['award'] = 'Otorgar insignia';
$string['awardedtoyou'] = 'Otorgada a mí';
$string['awardoncron'] = 'El acceso a insignias fue habilitado exitosamente. Demasiados usuarios podrían ganarse instantáneamente esta insignia. Para asegurar el desempeño del sitio, esta acción tomará un cierto tiempo para procesarse.';
$string['awards'] = 'Recipientes';
$string['backpackavailability'] = 'Verificación externa de insignia';
$string['backpackavailability_help'] = 'Para que aquellos que recibieron insignias puedan probar que se ganaron las insignias de Usted, debería de ser posible que un sitio de mochila externa pueda acceder a su sitio y verificar quién emitió las insignias. Su sitio actualmente al parecer no es accesible, lo que significa que las insignias que haya otorgado o que otorgue en el futuro no pueden ser verificadas.

##¿Porqué estoy viendo este mensaje?

Es posible que su cortafuegos (fireewall) impida el acceso de usuarios desde fuera de su red del trabajo, que su sitio esté protegido por contraseña, o que estuviera corriendo el sitio desde una computadora que no está disponible desde Internet (como por ejemplo, una máquina experimental local).

##¿Es esto un problema?

Usted debería de arreglar este asunto en cualquier sitio en producción desde donde planee otorgar insignias; de lo contrario los recipientes no podrán probar que se ganaron las insignias de Usted. Si su sitio aún no está activo, Usted puede crear y emitir insignias insignias de prueba, en tanto su sitio sea accesible antes de que sea activo.

##¿Qué pasaría si no puedo hacer que mi sitio sea accesible publicamente?

La única URL requerida para la verificación es la de [URL-de-su-sitio]/badges/assertion.php por lo que si Usted pudiera modificar su cortafuegos (firewall) para que permita el acceso externo a este archivo, la verificación de insignias sí funcionaría.';
$string['backpackbadges'] = 'Usted tiene {$a->totalbadges} insignia(s) mostradas desde su(s)  {$a->totalcollections}  colección(es). <a href="mybackpack.php">Cambiar configuraciones de mochila</a>.';
$string['backpackconnection'] = 'Conexión de mochila';
$string['backpackconnection_help'] = 'Esta página le permite configurar una conexión a un provedor de mochila externa. El conectarse a una mochila le permite mostrar insignias externas dentro de este sitio y empujar insignias ganadas aquí hacia su mochila.

En la actualidad, solamente <a href="http://backpack.openbadges.org">Mozilla OpenBadges Backpack</a> está soportada. Usted necesita apuntarse a un servicio de mochila antes de intentar configurar una conexión a mochila en esta página.';
$string['backpackdetails'] = 'Configuraciones de mochila';
$string['backpackemail'] = 'Dirección Email';
$string['backpackemail_help'] = 'Dirección Email asociada con su mochila.

Si se establece la conexión con la mochila, esta dirección de Email se usa en lugar de su dirección de Email interna, para empujar insignias a su mochila.';
$string['backpackimport'] = 'Configuraciones para importar insignia';
$string['backpackimport_help'] = 'Despuès de que se establezca la conexiòn exitosa a mochila, las insignias de su mochila podràn mostrarse en la pàgina de "Mis Insignias" y su pàgina de perfil.

En èsta àrea, Usted puede seleccionar colecciones de insignias desde su mochila que a Usted le gustarìa mostrar en su perfil.';
$string['badgedetails'] = 'Detalles de insignia';
$string['badgeimage'] = 'Imagen';
$string['badgeimage_help'] = 'Esta es una imagen que se usará cuando la insignia sea emitida. Para añadir una nueva imagen, navegue y seleccione una imagen (en formato JPG o PNG) y elija "Guardar cambios". La imagen será recortada a un cuadrado y su tamaño ajustado para que coincida con los requisitos para imagen de insignia.';
$string['badgeprivacysetting'] = 'Configuraciones de privacidad de insignia';
$string['badgeprivacysetting_help'] = 'Las insignias que Usted gane pueden mostrarse en su página del perfil de la cuenta. Esta configuración le permite configurar automáticamente la visibilidad de las insignias nuevas ganadas.

Usted todavía puede controlar las configuraciones de privacidad de insignias individuales en su página de "Mis insignias".';
$string['badgeprivacysetting_str'] = 'Mostrar automáticamente insignias que obtenga en la página de mi perfil';
$string['badgesalt'] = 'Sal para \'hashing\' de la dirección Email del recipiente';
$string['badgesalt_desc'] = 'Usar un \'hashing\' permite que los servicios de mochila confirmen quién ganó la insignia sin tener que exponer su dirección de correo. Esta configuración solamente debería de usar números y letras.

Nota: Para propósitos de verificación de receptor, por favor evite cambiar esta configuración una vez que haya empezado a otorgar insignias.';
$string['badgesdisabled'] = 'Las insignias no están habilitadas en este sitio.';
$string['badgesearned'] = 'Número de insignias ganadas: {$a}';
$string['badgesettings'] = 'Configuraciones de insignias';
$string['badgestatus_0'] = 'No disponible para los usuarios';
$string['badgestatus_1'] = 'Disponible para los usuarios';
$string['badgestatus_2'] = 'No disponible para los usuarios';
$string['badgestatus_3'] = 'Disponible para los usuarios';
$string['badgestatus_4'] = 'Archivada';
$string['badgestoearn'] = 'Número de insignias disponibles: {$a}';
$string['badgesview'] = 'Insignias de curso';
$string['badgeurl'] = 'Enlace a insignia emitida';
$string['bawards'] = 'Recipientes ({$a})';
$string['bcriteria'] = 'Criterio';
$string['bdetails'] = 'Editar detalles';
$string['bmessage'] = 'Mensaje';
$string['boverview'] = 'Vista general';
$string['bydate'] = 'completada en';
$string['clearsettings'] = 'Borrar configuraciones';
$string['completioninfo'] = 'Esta insignia fue emitida por finalizar:';
$string['completionnotenabled'] = 'La finalización de curso no está habilitada para este curso, por lo que no puede incluirse en el criterio para la insignia. Usted puede habilitar la finalización de curso en las configuraciones del curso.';
$string['configenablebadges'] = 'Cuando se habilita, esta característica le permite crear insignias y otorgarlas a usuarios del sitio.';
$string['configuremessage'] = 'Mensaje de insignia';
$string['connect'] = 'Conectar';
$string['connected'] = 'Conectado';
$string['contact'] = 'Contacto';
$string['contact_help'] = 'Una dirección Email asociada con el emisor de la insignia.';
$string['copyof'] = 'Copia de {$a}';
$string['coursebadges'] = 'Insignias';
$string['coursebadgesdisabled'] = 'Las insignias del curso no están habilitadas en éste sitio.';
$string['coursecompletion'] = 'Los usuarios deben completar este curso.';
$string['create'] = 'Insignia nueva';
$string['createbutton'] = 'Crear insignia';
$string['creatorbody'] = '<p>{$a->user} ha completado todos los requisitos para la insignia y se le ha otorgado dicha insignia. Vea la insignia emitida en {$a->link} </p>';
$string['creatorsubject'] = '¡\'{$a}\' ha sido otorgada!';
$string['criteria_0'] = 'Esta insignia es otorgada cuando ...';
$string['criteria_1'] = 'Finalización de actividad';
$string['criteria_1_help'] = 'Permitir que una insignia le sea otorgada a usuarios basándose en la finalización de un conjunto de actividades dentro de un curso.';
$string['criteria_2'] = 'Emitida manualmente por un rol';
$string['criteria_2_help'] = 'Permitir que una insignia sea otorgada manualmente por usuarios que tienen un rol particular dentro del sitio o del curso.';
$string['criteria_3'] = 'Participación social';
$string['criteria_3_help'] = 'Social';
$string['criteria_4'] = 'Finalización del curso';
$string['criteria_4_help'] = 'Permitir que una insignia le sea otorgada a usuarios que hayan finalizado el curso. Este criterio puede tener parámetros adicionales, tales como calificación mínima y fecha de terminación del curso.';
$string['criteria_5'] = 'Completando un conjunto de cursos';
$string['criteria_5_help'] = 'Permitir que una insignia le sea otorgada a usuarios que hayan finalizado un conjunto de cursos. Cada curso puede tener parámetros adicionales, tales como calificación mínima y fecha de terminación del curso.';
$string['criteria_6'] = 'Finalización de perfil';
$string['criteria_6_help'] = 'Permitir que una insignia le sea otorgada a usuarios que hayan finalizado ciertos campos en su perfil. Usted puede seleccionar desde campos de perfil por defecto y campos personalizados que estén disponibles a los usuarios.';
$string['criteria_descr'] = 'A los usuarios se les otorga esta insignia cuando completan el requisito siguiente:';
$string['criteria_descr_0'] = 'A los usuarios se les otorga esta insignia cuando completan <strong>{$a}</strong> de los requisitos enlistados.';
$string['criteria_descr_1'] = '<strong>{$a}</strong> de las siguientes actividades están completadas:';
$string['criteria_descr_2'] = 'Esta insignia tiene que ser otorgada por usuarios con  <strong>{$a}</strong> de los siguientes roles:';
$string['criteria_descr_4'] = 'Los usuarios deben finalizar el curso';
$string['criteria_descr_5'] = '<strong>{$a}</strong> de los siguientes cursos deben de ser finalizados:';
$string['criteria_descr_6'] = '<strong>{$a}</strong> de los siguientes campos de perfil deben de ser finalizados:';
$string['criteria_descr_bydate'] = 'para <em>{$a}</em>';
$string['criteria_descr_grade'] = 'con califícación mínima de <em>{$a}</em>';
$string['criteria_descr_short0'] = 'Finalizado <strong>{$a}</strong> de:';
$string['criteria_descr_short1'] = 'Finalizado <strong>{$a}</strong> de:';
$string['criteria_descr_short2'] = 'Otorgada por <strong>{$a}</strong> de:';
$string['criteria_descr_short4'] = 'Finalizar el curso';
$string['criteria_descr_short5'] = 'Finalizar <strong>{$a}</strong> de:';
$string['criteria_descr_short6'] = 'Finalizar <strong>{$a}</strong> de:';
$string['criteria_descr_single_1'] = 'La siguiente actividad debe ser finalizada:';
$string['criteria_descr_single_2'] = 'Esta insignia tiene que ser otorgada por un usuario con el siguiente rol:';
$string['criteria_descr_single_4'] = 'Los usuarios deben finalizar el curso';
$string['criteria_descr_single_5'] = 'El curso siguiente debe ser finalizado:';
$string['criteria_descr_single_6'] = 'El siguiente campo de perfil de usuario debe de ser finalizado:';
$string['criteria_descr_single_short1'] = 'Finalizado:';
$string['criteria_descr_single_short2'] = 'Otorgada por:';
$string['criteria_descr_single_short4'] = 'Finalizar el curso';
$string['criteria_descr_single_short5'] = 'Finalizar:';
$string['criteria_descr_single_short6'] = 'Finalizar:';
$string['criteriasummary'] = 'Resumen de criterio';
$string['criterror'] = 'Parámetros actuales';
$string['criterror_help'] = 'Este conjunto de campo muestra todos los parámetros que fueron añadidos inicialmente a este requisito para insignia, pero que ya no están disponibles. Se recomienda que desactive dichos parámetros, para asegurarse de que los usuarios puedan ganarse esta insignia en el futuro.';
$string['currentimage'] = 'Imagen actual';
$string['currentstatus'] = 'Status actual:';
$string['dateawarded'] = 'Fecha de emisión';
$string['dateearned'] = 'Fecha: {$a}';
$string['day'] = 'Día(s)';
$string['deactivate'] = 'Deshabilitar acceso';
$string['deactivatesuccess'] = 'El acceso a las insignias fue deshabilitado exitosamente.';
$string['defaultissuercontact'] = 'Detalles para contacto del emisor de insignia por defecto';
$string['defaultissuercontact_desc'] = 'Una dirección Email asociada con el emisor de insignia.';
$string['defaultissuername'] = 'Nombre del emisor de insignia por defecto';
$string['defaultissuername_desc'] = 'Nombre del agente emisor o autoridad.';
$string['delbadge'] = 'Eliminar insignia';
$string['delconfirm'] = '¿Está Usted seguro de querer eliminar la insignia \'{$a}\'?';
$string['delcritconfirm'] = '¿Está Usted seguro de querer eliminar este criterio?';
$string['delparamconfirm'] = '¿Está Usted seguro de querer eliminar este parámetro?';
$string['description'] = 'Descripción';
$string['disconnect'] = 'Desconectar';
$string['donotaward'] = 'Actualmente, esta insignia no está activa, por lo que no puede ser otorgada a usuarios. Si Usted desea otorgar esta insignia, por favor configure su status a activo.';
$string['editsettings'] = 'Editar configuraciones';
$string['enablebadges'] = 'Habilitar insignias';
$string['error:backpacknotavailable'] = 'Su sitio no está accesible desde Internet, por lo que las insignias emitidas desde este sitio no pueden ser verificadas por servicios de mochilas externas.';
$string['error:backpackproblem'] = 'Hubo un problema al conectar con su provedor del servicio de mochila. Por favor inténtelo después.';
$string['error:cannotact'] = 'No se puede activar la insignia';
$string['error:cannotawardbadge'] = 'No se puede otorgar insignia a un usuario';
$string['error:clone'] = 'No se puede clonar la insignia';
$string['error:duplicatename'] = 'Ya existe una insignia con ese nombre en el sistema.';
$string['error:externalbadgedoesntexist'] = 'Insignia no encontrada';
$string['error:invalidbadgeurl'] = 'Formato de URL de emisor de insignia inválido.';
$string['error:invalidcriteriatype'] = 'Tipo de criterio inválido.';
$string['error:invalidexpiredate'] = 'La fecha de caducidad debe estar en el futuro.';
$string['error:invalidexpireperiod'] = 'El periodo de caducidad no puede ser negativo ni igual a 0.';
$string['error:noactivities'] = 'No hay actividades con criterio de finalización habilitado en este curso.';
$string['error:nocourses'] = 'La finalización de curso no está habilitada para ninguno de los cursos en este sitio, por lo que no puede mostrarse ninguno. Usted puede habilitar la finalización de cursos en las configuraciones del curso.';
$string['error:nogroups'] = '<p>No hay colecciones públicas de insignias disponibles en su mochila. </p> <p>Solamente se muestran colecciones públicas, <a href="http://backpack.openbadges.org">visite su mochila</a> para crear algunas colecciones públicas.</p>';
$string['error:nopermissiontoview'] = 'Usted no tiene permisos para ver recipientes de insignia';
$string['error:nosuchbadge'] = 'La insignia con ID {$a} no existe.';
$string['error:nosuchcourse'] = 'Advertencia: Este curso ya no está disponible.';
$string['error:nosuchfield'] = 'Advertencia: Este campo de perfil de usuario ya no está disponible.';
$string['error:nosuchmod'] = 'Advertencia: Esta actividad ya no está disponible.';
$string['error:nosuchrole'] = 'Advertencia: Este rol ya no está disponible.';
$string['error:nosuchuser'] = 'El usuario con esta dirección Email no tiene una cuenta con el provedor de mochila actual.';
$string['error:notifycoursedate'] = 'Advertencia: Las insignias asociadas con las finalizaciones de curso y actividad no serán re-emitidas hasta la fecha de inicio del curso.';
$string['error:parameter'] = 'Advertencia: Al menos un parámetro debería ser seleccionado para asegurar el flujo correcto en la emisión de insignias.';
$string['error:save'] = 'No se puede guardar la insignia.';
$string['evidence'] = 'Evidencia';
$string['existingrecipients'] = 'Recipientes de insignias existentes';
$string['expired'] = 'Caducada';
$string['expiredate'] = 'Esta insignia caduca en {$a}.';
$string['expireddate'] = 'Esta insignia caducó en {$a}.';
$string['expireperiod'] = 'Esta insignia caduca a los {$a} días de haber sido emitida.';
$string['expireperiodh'] = 'Esta insignia caduca a las {$a} horas de haber sido emitida.';
$string['expireperiodm'] = 'Esta insignia caduca a los {$a} minutos de haber sido emitida.';
$string['expireperiods'] = 'Esta insignia caduca a los {$a} segundos de haber sido emitida.';
$string['expirydate'] = 'Fecha de caducidad';
$string['expirydate_help'] = 'Opcionalmente, las insignias pueden caducar en una fecha específica, o la fecha puede calcularse con base en la fecha en que se emite una insignia.';
$string['externalbadges'] = 'Mis insignias de otros sitios web';
$string['externalbadges_help'] = 'Esta área muestra insignias desde su mochila externa.';
$string['externalbadgesp'] = 'Insignias de otros sitios web:';
$string['externalconnectto'] = 'Para mostrar insignias externas Usted necesita  <a href="{$a}">conectarse a una mochila</a>.';
$string['fixed'] = 'Fecha fija';
$string['hidden'] = 'Oculta';
$string['hiddenbadge'] = 'Desafortunadamente, el propietario de la insignia no ha hecho disponible esta información.';
$string['issuancedetails'] = 'Caducidad de insignia';
$string['issuedbadge'] = 'Información acerca de insignia emitida';
$string['issuerdetails'] = 'Detalles del emisor';
$string['issuername'] = 'Nombre del emisor';
$string['issuername_help'] = 'Nombre del agente emisor o autoridad.';
$string['issuerurl'] = 'URL del emisor';
$string['localbadges'] = 'Mis insignias de {$a} sitio web';
$string['localbadgesh'] = 'Mis insignias de este sitio web';
$string['localbadgesh_help'] = 'Todas las insignias ganadas dentro de este sitio web al completar cursos, acyividades de cursos, y otros requisitos. Usted puede gestionar aquí sus insignias al hacerlas públicas o privadas para su página de perfil. Usted puede descargar todas sus insignias, o cada insignia de forma separada, y guardarlas en su computadora. Las insignias descargadas pueden añadirse a su servicio de mochila externa.';
$string['localbadgesp'] = 'Insignias de {$a}:';
$string['localconnectto'] = 'Para compartir estas insignias afuera de este sitio web, Usted necesita  <a href="{$a}">conectarse a una mochila</a>.';
$string['makeprivate'] = 'Hacer privadas';
$string['makepublic'] = 'Hacer públicas';
$string['managebadges'] = 'Gestionar insignias';
$string['message'] = 'Cuerpo del mensaje';
$string['messagebody'] = '<p>A Usted le han otorgado una insignia "%badgename%"!</p> <p>Puede encontrar más información acerca de esta insignia en %badgelink%.</p> <p>Si no hubiera una insignia anexa a este Email, Usted puede descargarla y gestionarla desde {$a} página.</p>';
$string['messagesubject'] = '¡Felicitaciones! ¡Acaba de ganarse una insignia!';
$string['method'] = 'El criterio está completo cuando ...';
$string['mingrade'] = 'Calificación mínima requerida';
$string['month'] = 'Mes(es)';
$string['mybackpack'] = 'Mis configuraciones de mochila';
$string['mybadges'] = 'Mis insignias';
$string['never'] = 'Nunca';
$string['newbadge'] = 'Añadir una insignia nueva';
$string['newimage'] = 'Nueva imagen';
$string['noawards'] = 'Esta insignia aún no ha sido ganada.';
$string['nobackpack'] = 'No hay servicio de mochila conectado a esta cuenta.<br/>';
$string['nobackpackbadges'] = 'No hay insignias en las colecciones que Usted ha seleccionado. <a href="mybackpack.php">Añadir más colecciones</a>.';
$string['nobackpackcollections'] = 'No se han seleccionado colecciones de insignias. <a href="mybackpack.php">Añadir colecciones</a>.';
$string['nobadges'] = 'No hay insignias disponibles.';
$string['nocriteria'] = 'Los criterios parea esta insignia todavía no han sido configurados.';
$string['noexpiry'] = 'Esta insignia no tiene una fecha de caducidad.';
$string['noparamstoadd'] = 'No hay parámetros adicionales disponibles para añadirle a este requisito de insignia.';
$string['notacceptedrole'] = 'Su asignación de rol actual no está entre los roles que pueden emitir manualmente esta insignia.<br/> Si Usted quisiera ver a los usuarios que ya se han ganado esta insignia, puede visitar la página {$a}.';
$string['notconnected'] = 'No conectado';
$string['nothingtoadd'] = 'No hay criterios disponibles para añadir.';
$string['notification'] = 'Notificar al creador de la insignia';
$string['notification_help'] = 'Esta configuración gestiona las notificaciones enviadas a un creador de insignia para hacerle saber que se ha emitido la insignia. Están disponibles las siguientes opciones: * **NUNCA** – No enviar notificaciones. * **CAD VEZ** – Mandar una notificación cada vez que se otrgue esta insignia. * **DIARIAMENTE** – Mandar notificaciones una vez al día. * **SEMANALMENTE** – Mandar notificaciones una vez por semana. * **MENSUALMENTE** – Mandar notificaciones una vez al mes.';
$string['notifydaily'] = 'Diariamente';
$string['notifyevery'] = 'Cada vez';
$string['notifymonthly'] = 'Mensualmente';
$string['notifyweekly'] = 'Semanalmente';
$string['numawards'] = 'Esta insignia ha sido emitida para <a href="{$a->link}">{$a->count}</a> usuario(s).';
$string['numawardstat'] = 'Esta insignia ha sido emitida a {$a} usuario(s).';
$string['overallcrit'] = 'del criterio seleccionado está completado.';
$string['potentialrecipients'] = 'recipientes potenciales de insignia';
$string['recipientdetails'] = 'Detalles de receptores';
$string['recipientidentificationproblem'] = 'No se puede encontrar un receptor de esta insignia entre los usuarios existentes.';
$string['recipients'] = 'Recipientes de insignia';
$string['recipientvalidationproblem'] = 'El usuario actual no puede ser verificado como receptor para esta insignia.';
$string['relative'] = 'Fecha relativa';
$string['requiredcourse'] = 'Al menos debería de añadirse un curso al criterio del curso';
$string['reviewbadge'] = 'Revisar criterio para insignia';
$string['reviewconfirm'] = '<p>Esta acción realizará una revisión para ver si alguno de los usuarios ha completado todos los requisitos para la insignia \'{$a}\' </p> <p>¿Desea proseguir?</p>';
$string['save'] = 'Guardar';
$string['searchname'] = 'Buscar por nombre';
$string['selectaward'] = 'Por favor seleccione el rol que le gustaría usar para otorgar esta insignia:';
$string['selectgroup_end'] = 'Solamente se muestran colecciones públicas, <a href="http://backpack.openbadges.org">visite su mochila</a> para crear más colecciones públicas.';
$string['selectgroup_start'] = 'Seleccione colecciones desde su mochila para mostrar en este sitio:';
$string['selecting'] = 'Con insignias seleccionadas ...';
$string['setup'] = 'Configurar conexión';
$string['sitebadges'] = 'Insignias del sitio';
$string['sitebadges_help'] = 'Las insignias del sitio solamente pueden ser otorgadas a usuarios por actividades relacionadas con el sitio. Estas incluyen el completar un conjunto de cursos o partes de perfiles de usuarios. Las insignias del sitio también pueden emitirse manualmente por un usuario a otro.

Las insignias para actividades relacionadas con curso deben crearse a nivel del curso. Las insignias de curso pueden encontrarse en Administración del Curso > Insignias.';
$string['status'] = 'Status de insignias';
$string['status_help'] = 'El status de una insignia determina su comportamiento en el sistema: * **DISPONIBLE** – Significa que esta insignia puede ser ganada por los usuarios. Mientras una insignia esté disponible a los usuarios, su criterio no puede modificarse. * **NO DISPONIBLE** – Significa que esta insignia no está disponible para los usuarios y no puede ganarse ni otorgarse manualmente. Si una de estas insignias nunca ha sido emitida anteriormente, se puede cambiar su criterio. Una vez que una insignia haya sido emitida para al menos un usuario, automáticamente se cambia a  **BLOQUEADA**. Las insignias bloqueadas pueden ser ganadas por usuarios, pero sus criterios ya no pueden ser cambiados. Si Usted necesita modificar detalles o criterios de una insignia bloqueada, Usted puede duplicar esta insignia y hacerle todoslos cambios necesarios. *¿Porqué bloqueamos insignias?* Queremos asegurarnos de que todos los usuarios completen los mismos requisitos para ganarse unainsignia. Actualmente no es posible revocar insignias. Si nosotros permitiéramos que se modificaran los requisitos de la insignia acada rato, lo más probable es que terminaríamos teniendo usuarios que hubieran conseguido la misma insignia por haber cumplido requisitos completamente diferentes.';
$string['statusmessage_0'] = 'Esta insignia actualmente no está disponible para los usuarios. Habilite el acceso si desea que los usuarios se ganen esta insignia.';
$string['statusmessage_1'] = 'Esta insignia actualmente sí está disponible para los usuarios. Deshabilite el acceso para realizar cambios.';
$string['statusmessage_2'] = 'Esta insignia actualmente no está disponible para los usuarios y su criterio está bloqueado. Habilite el acceso si desea que los usuarios se ganen esta insignia.';
$string['statusmessage_3'] = 'Esta insignia actualmente sí está disponible para los usuarios y su criterio está bloqueado';
$string['statusmessage_4'] = 'esta insignia actualmente está archivada';
$string['subject'] = 'Asunto del mensaje';
$string['variablesubstitution'] = 'Sustitución de variable en los mensajes.';
$string['variablesubstitution_help'] = 'En un mensaje de insignia, se pueden insertar ciertas variables en el asunto o en el cuerpo del mensaje, de forma que sean luego remplazadas con valores reales cuando se envíe el mensaje. Las variables deberían de ser insertadas en el texto exactamente como se muestra debajo. Se pueden usar las siguientes variables:
%badgename% : Esto será remplazado por el nombre completo de la insignia.
%username% : Esto será remplazado por el nombre completo del recipiente.
%badgelink% : Esto será remplazado por la URL pública con información acerca de la insignia emitida.';
$string['viewbadge'] = 'Ver insignia emitida';
$string['visible'] = 'Visible';
$string['warnexpired'] = '(Esta insignia ha caducado)';
$string['year'] = 'Año(s)';
