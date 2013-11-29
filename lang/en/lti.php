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
 * Strings for component 'lti', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   lti
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accept'] = 'Aceptar';
$string['accept_grades'] = 'Aceptar calificaciones de la herramienta';
$string['accept_grades_admin'] = 'Aceptar calificaciones de la herramienta';
$string['accept_grades_admin_help'] = 'Especificar si el provedor de la herramienta puede añadir, actualizar, leer y borrar calificaciones asociadas con instancias de este tipo de herramientas. Algunos provedores de herramientas soportan el transferir calificaciones hacia Moodle basados en accciones que ocurren dentro de la herramienta, creando una experiencia más integrada.';
$string['accept_grades_help'] = 'Especificar si es que el proveedor de la herramienta puede añadir, actualizar, leer y borrar calificaciones asociadas únicamente con esta instancia de herramienta externa. Algunos provedores de herramientas reportan calificaciones de vuelta a Moodle basados en acciones tomadas dentro de la herramienta, creando una experiencia más integrada. Observe que esta configuración puede anularse en la configuración de la herramienta.';
$string['action'] = 'Acción';
$string['active'] = 'Activo';
$string['activity'] = 'Actividad';
$string['addnewapp'] = 'Habilitar Aplicación Externa';
$string['addserver'] = 'Añadir nuevo servidor de confianza';
$string['addtype'] = 'Añadir configuración de herramienta externa';
$string['allow'] = 'Permitir';
$string['allowinstructorcustom'] = 'Permitirle a los profesores añadir parámetros a la medida';
$string['allowsetting'] = 'Permitirle a la herramienta almacenar 8K de configuraciones en Moodle';
$string['always'] = 'Siempre';
$string['automatic'] = 'Automática, basada en Launch URL';
$string['baseurl'] = 'URL Base';
$string['basiclti'] = 'LTI';
$string['basicltiactivities'] = 'Actividades LTI (Learning Tools Interoperability = Interoperatividad de Herramientas de Aprendizaje)';
$string['basiclti_base_string'] = 'Cadena Base de LTI OAuth';
$string['basiclti_endpoint'] = 'Puntofinal de LTI Launch';
$string['basicltifieldset'] = 'Campo de ejemplo a la medida';
$string['basiclti_in_new_window'] = 'Su actividad se ha abierto en una ventana nueva';
$string['basicltiintro'] = 'Descripción de la Actividad';
$string['basicltiname'] = 'Nombre de la Actividad';
$string['basiclti_parameters'] = 'Parámetros de LTI Launch';
$string['basicltisettings'] = 'Configuraciones de Interoperatividad básicas de herramienta de aprendizaje';
$string['cannot_delete'] = 'Usted no puede borrar la configuración de esta herramienta';
$string['cannot_edit'] = 'Usted no puede editar la configuración de esta herramienta';
$string['comment'] = 'Comentario';
$string['configpassword'] = 'Contraseña por defecto para la herramienta remota';
$string['configpreferheight'] = 'Altura preferida por defecto';
$string['configpreferwidget'] = 'Configurara widget como invocación estándard';
$string['configpreferwidth'] = 'Ancho preferido por defecto';
$string['configresourceurl'] = 'URL del recurso por defecto';
$string['configtoolurl'] = 'URL para la herramienta remota';
$string['configtypes'] = 'Permitir Aplicaciones LTI (Learning Tools Interoperability = Interoperatividad de Herramientas de Aprendizaje)';
$string['courseid'] = 'Número ID del curso';
$string['coursemisconf'] = 'El curso está mal configurado';
$string['course_tool_types'] = 'Tipos de herramientas para curso';
$string['createdon'] = 'Creada en';
$string['curllibrarymissing'] = 'La biblioteca PHP Curl debe instalarse para emplear LTI (Learning Tools Interoperability = Interoperatividad de Herramientas de Aprendizaje)';
$string['custom'] = 'Parámetros a la medida';
$string['custom_config'] = 'Empleando configuración de herramienta a la medida';
$string['custom_help'] = 'Los parámetros a la medida son configuraciones usadas por el provedor de la herramienta. Por ejemplo, un parámetro a la medida puede emplearse para mostrar un recurso específico del provedor. Es seguro dejar sin cambios este campo a menos que el provedor de la herramienta indique lo contrario.';
$string['custominstr'] = 'Parámetros a la medida';
$string['debuglaunch'] = 'Opción de depuración (debug)';
$string['debuglaunchoff'] = 'Invocación normal';
$string['debuglaunchon'] = 'Invocación de depuración (debug)';
$string['default'] = 'Por defecto';
$string['default_launch_container'] = 'Contenedor de invocación Default';
$string['default_launch_container_help'] = 'El contenedor para invocar la herramienta afecta la apariencia de la herramienta cuando se invoca dentro del curso. Algunos contenedores proporcionan mayor superficie de pantalla a la herramienta, mientras otros le dan un aspecto más integrado con el ambiente Moodle

* **Default** - Use el contenedor especificado por la configuración de la herramienta.
* **Incrustado** - La herramienta se muestra dentro de la ventana Moodle existente, en forma similar a la mayoría de las otras actividades.
* **Incrustado, sin bloques** - La herramienta se muestra dentro de la ventana Moodle existente, solamente con los controles de navegación en la parte superior.
* **Nueva ventana** - La herramienta abre una nueva ventana que ocupa todo el espacio disponible.
Dependiendo del navegador, abrirá en una nueva pestaña o en una ventana emergente.
Es posible que el navegador impida que se abran ventanas emergentes si está configurado así.';
$string['delegate'] = 'Delegar al profesor';
$string['delete'] = 'Borrar';
$string['delete_confirmation'] = '¿Está Usted seguro de querer borrar esta configuración de herramienta externa ?';
$string['deletetype'] = 'Borrar la configuración de herramienta externa';
$string['display_description'] = 'Mostrar la descripción de la actividad cuando se invoque';
$string['display_description_help'] = 'Si se selecciona, la descripción de la actividad (especificada arriba) se mostrará sobre el contenido del provedor de la herramienta.

La descripción puede emplearse para darle instrucciones adicionales al programa que invoca la herramienta, pero no es necesaria.

La descripción nunca se muestra cuando el contenedor de la herramienta está en una ventana nueva.';
$string['display_name'] = 'Mostrar el nombre de la actividad cuando se invoque';
$string['display_name_help'] = 'Si se selecciona, el nombre de la actividad (especificado arriba) se mostrará sobre el contenido del provedor de la herramienta.

Es posible que el provedor de la herramienta muestre además el título. Esta opción podría evitar que el título de la actividad se mostrara dos veces.

El nombre  nunca se muestra cuando el contenedor de la herramienta está en una ventana nueva.';
$string['domain_mismatch'] = 'El dominio de Launch URL no concuerda con la configuración de la herramienta.';
$string['donot'] = 'No enviar';
$string['donotaccept'] = 'No aceptar';
$string['donotallow'] = 'No permitir';
$string['edittype'] = 'Editar la configuración de herramienta externa';
$string['embed'] = 'Incrustado';
$string['embed_no_blocks'] = 'Incrustado, sin bloques';
$string['enableemailnotification'] = 'Mandar emails de notificación';
$string['enableemailnotification_help'] = 'Si se habilita, los estudiantes recibirán notificación por email cuando sean calificados sus envíos para la herramienta.';
$string['errormisconfig'] = 'Herramienta mal configurada. Por favor pídale a su administrador Moodle que arregle la configuración de la herramienta.';
$string['extensions'] = 'Servicios de Extensión LTI';
$string['external_tool_type'] = 'Tipo de herramienta externa';
$string['external_tool_type_help'] = 'El principal propósito de una configuración de herramienta es establecer un canal de comunicación seguro entre Moodle y el proveedor de la herramienta. Tambien proporciona una oportunidad para poner configuraciones por defecto e instalar servicios adicionales proporcionados por la herramienta.

* **Automático, basada en Launch URL** - Esta configuración debería emplearse en casi todos los casos. Moodle eligirá la configuración de herramienta más apropiada basada en Launch URL. Herramienta configurada tanto por el administrador o dentro del curso. Cuando se emplea  Launch URL especificada, Moodle dará retroalimentación si es que la reconoce o no. Si Moodle no reconociera Launch URL, Usted necesitaría poner los detalles de configuración de la herramienta manualmente.

* **Un tipo específico de herramienta** - Al seleccionar un tipo específico de herramienta, Usted puede forzar a Moodle a que emplee esa configuración de herramienta cuando se comunique con el proveedor de la herramienta externa. Si Launch URL pareciera que no pertenece al proveedor de la herramienta, aparecerá una advertencia. En algunos casos no es necesario proporcionar un Launch URLal emplear un tipo de herramienta específico (si no está invocando un recurso particular dentro del proveedor de la herramienta).

* **Configuración a la medida** - Para ajustar la configuración a la medida solamente en esta instancia, mostrar Opciones Avanzadas, y proporcione la clave del consumidor y el secreto compartido Usted mismo. Si no tiene una clave de consumidor y una secreto compartido,puede solicitarlos al proveedor de la herramienta. No todas las herramientas requieren una clave de consumidor y un secreto compartido; en estos casos los campos pueden dejarse en blanco.

### Edición del Tipo de Herramienta.

Existen tres íconos disponibles en la lista desplegable de Herramienta:

* **Añadir** - Crea una configuración de herramienta a nivel de curso. Todas las instancias de la herramienta externa en este curso pueden emplear esta configuración de herramienta.

* **Editar** - Selecciona un tipo de herramienta a nivel de curso a partir de una lista desplegable y eligiendo después este ícono. Los detalles de la configuración de la herramienta pueden editarse.

* **Borrar** - Remueve el tipo de herramienta del curso seleccionado.';
$string['external_tool_types'] = 'Tipos de herramientas externas';
$string['failedtoconnect'] = 'Moodle no pudo comunicarse con el sistema "{$a}"';
$string['filter_basiclti_configlink'] = 'Configurar sus sitios preferidos y sus contraseñas';
$string['filter_basiclti_password'] = 'La contraseña es obligatoria';
$string['filterconfig'] = 'Administración de LTI';
$string['filtername'] = 'LTI';
$string['fixexistingconf'] = 'Usar una configuración existente para la instancia mal-configurada';
$string['fixnew'] = 'Nueva configuración';
$string['fixnewconf'] = 'Definir una nueva configuración para la instancia mal-configurada';
$string['fixold'] = 'Usar la existente';
$string['forced_help'] = 'Esta configuración ha sido forzada en un curso o a nivel del sitio en la configuración de la herramienta. Usted no puede cambiarlo desde esta interfase.';
$string['force_ssl'] = 'Forzar SSL';
$string['force_ssl_help'] = 'Seleccionando esta opción, se obliga que todos los usos de este provedor de herramienta usen SSL.

Además, todas las solicitudes de servicios web del provedor de la herramienta emplearán SSL.

Si emplea esta opción, confirme que tanto el sitio Moodle y el provedor de la herramienta soporten SSL.';
$string['global_tool_types'] = 'Tipos de herramientas globales';
$string['grading'] = 'Rutemiento de calificaciones';
$string['icon_url'] = 'URL del ícono';
$string['icon_url_help'] = 'La URL del ícono permite que se modifique el ícono que aparece en el listado del curso para esta actividad. En lugar de emplear el ícono por defecto para LTI, puede especificarse un ícono que identifique mejor el tipo de actividad.';
$string['id'] = 'id';
$string['invalidid'] = 'ID del LTI estaba incorrecta';
$string['launch_in_moodle'] = 'Invocar herramienta en Moodle';
$string['launchinpopup'] = 'Contenedor para invocar';
$string['launch_in_popup'] = 'Invocar herramienta en ventana emergente';
$string['launchinpopup_help'] = 'El contenedor para invocar la herramienta afecta el aspecto de la herramienta cuando se invoca desde el curso. Algunos contenedores proporcionan más espacio de pantalla a la herramienta, mientras otros le dan una imágen más integrada con el ambiente Moodle.

* **Default** - Usa el contenedor especificado por la configuración de la herramienta.

* **Incrustado** - La herramienta se muestra dentro de una ventana Moodle existente, de forma similar a la mayoría de las otras Actividades de Moodle.

* **Incrustado sin bloques** - La herramienta se muestra dentro de una ventana Moodle existente, solamente con los controles de navegación en la parte superior de la página.

* **Nueva Ventana** - La herramienta se abre en una ventana nueva, ocupa todo el espacio disponible.

Dependiendo delnavegador, se abrirá en una nueva pestaña o una ventana emergente. Es posible que algunos navegadores impidan que se abra la ventana emergente.';
$string['launchoptions'] = 'Opciones para invocar';
$string['launch_url'] = 'Launch URL (URL para invocar)';
$string['launch_url_help'] = 'El Launch URL indica la dirección de internet de la herramienta externa, y puede contener información adicional, como los recursos a mostrar. Si Usted no está seguro de introducir la Launch URL, por favor revise con el provedor de la herramienta para obtener mayor información.

Si ha elegido un tipo específico de herramienta, tal vez no necesite poner una Launch URL. Si el enlace a la herramienta solamente se emplea para invocar el sistema del provedor de la herramienta, y no va hacia un recurso específico, este muy probablemente sea el caso.';
$string['lti'] = 'LTI';
$string['lti:addcoursetool'] = 'Añadir configuraciones de herramienta específica del curso';
$string['lti:addinstance'] = 'Añadir una nueva actividad de herramienta externa';
$string['lti_administration'] = 'Administración de LTI (Learning Tools Interoperability = Interoperatividad de Herramientas de Aprendizaje)';
$string['lti_errormsg'] = 'La herramienta dió el siguiente mensaje de error: "{$a}"';
$string['lti:grade'] = 'Ver calificaciones regresadas por la herramienta extern';
$string['lti_launch_error'] = 'Ocurrió un error al invocar la herramienta externa:';
$string['lti_launch_error_tool_request'] = '<p> Para solicitarle al administrador que complete la configuración de la herramienta, haga click  <a href="{$a->admin_request_url}" target="_top">aqui</a>. </p>';
$string['lti_launch_error_unsigned_help'] = '<p> Ese error puede ser el resultado de una clave de usuario (y una palabra secreta compartida) faltante  para el proveedor de la herramienta. </p> <p>Si Usted tiene una clave de consumidor y una palabra secreta compartida, Usted puede proporcionarlas al editar la instancia de la herramienta externa (asegúrese de que estén visibles las opciones avanzadas).<br /> Alternativamente, puede hacer una configuración para el proveedor de herramienta a nivel de curso <a href="{$a->course_tool_editor}">aquí</a>. </p>';
$string['lti:manage'] = 'Ser un instructor cuando se invoque la herramienta';
$string['lti:requesttooladd'] = 'Solicitr que una herramienta se configure para todo el sitio';
$string['lti_tool_request_added'] = 'La solicitud para pedir que configuren la herramienta se procesó exitosamente. Usted deberá contactar a un Administrador para completar la configuración de la herramienta.';
$string['lti_tool_request_existing'] = 'Ya se ha solicitado antes una configuración de la herramienta para el dominio de la herramienta.';
$string['lti:view'] = 'Invocar actividades de herramienta externa';
$string['main_admin'] = 'Ayuda general';
$string['main_admin_help'] = 'Las herramientas externas le permiten a los usuarios de Moodle interactuar suavemente con recursos educativos alojados en sitios remotos. Empleando un protocolo especial para invocarla, la herramienta remota tendrá acceso a cierta información general sobre el usuario que la invoca. Por ejemplo, el nombre de la institución, ID del curso, ID del usuario, y otra información tal como el nombre del usuario y dirección de su correo electrónico.

Los tipos de herramientas enlistadas en esta página se dividen en tres categorías:

* **Activa** - Estos provedores de herramientas han sido aprobados y configurados por un administrador. Estas pueden emplearse desde cualquier curso en esta instancia de Moodle. Si una clave de consumidor y un secreto compartido se introducen, se establece una relación de confianza entre esta instancia de Moodle y la herramienta remota, proporcionando un canal de comunicación seguro.

* **Pendiente** - Estos provedores de herramientas llegaron mediante una importación de un paquete, pero no han sido configurados por un administrador. Los maestros aún pueden usar herramientas de estos provedores si es que tienen una clave de consumidor y un secreto compartido, o si no se requiere de ninguna.

* **Rechazada** - Estos provedores de herramientas están señalados como aquellos que el administrador no tiene intención de hacer disponibles para la instancia completa de Moodle. Los profesores aún pueden emplear herramientas de estos provedores si tienen una clave de usuario y secreto compartido, o si no se requiere de ninguno.';
$string['miscellaneous'] = 'Misceláneos';
$string['misconfiguredtools'] = 'Se detectaron instancias de herramientas mal-configuradas';
$string['missingparameterserror'] = 'La página está mal configurada: "{$a}"';
$string['module_class_type'] = 'tipo de módulo Moodle';
$string['modulename'] = 'Herramienta externa';
$string['modulename_help'] = 'El módulo de actividad de herramienta externa les permiten a los estudiantes interactuar con recursos educativos y actividades alojadas en otros sitios de internet. Por ejemplo, una herramienta externa podría proporcionar acceso a un nuevo tipo de actividad o de materiales educativos de una editorial.

Para crear una actividad de herramienta externa se requiere un provedor de herramienta que soporte  LTI (Learning Tools Interoperability = Interoperatividad de Herramientas de Aprendizaje). Un maestro puede crear una actividad de herramienta externa o hacer uso de una herramienta configurada por el administrador del sitio.

Las herramientas externas difieren se los recursos URL en varias formas:

* Las herramientas externas están conscientes del contexto, por ejemplo: tienen acceso a información acerca del usuario que invocó la herramienta, como por ejemplo sa institución, curso y nombre

* Las herramientas externas soportan leer, actualizar y borrar calificaciones asociadas con la instancia de la actividad

* Las configuraciones de la herramienta externa crean una relación de confianza entre su sitio Moodle y el provedor de la herramienta, permitiendo la comunicación segura entre ambos';
$string['modulenameplural'] = 'basicltis';
$string['modulenamepluralformatted'] = 'Instancias de LTI';
$string['never'] = 'Nunca';
$string['new_window'] = 'Ventana nueva';
$string['noattempts'] = 'No se han intentado instancias de esta herramienta';
$string['no_lti_configured'] = 'No hay Herramientas Externas activas configuradas.';
$string['no_lti_pending'] = 'No hay Herramientas Externas pendientes.';
$string['no_lti_rejected'] = 'No hay Herramientas Externas rechazadas.';
$string['noltis'] = 'No hay instancias LTI (Learning Tools Interoperability = Interoperatividad de Herramientas de Aprendizaje)';
$string['noservers'] = 'No se encontraron servidores';
$string['notypes'] = 'Actualmente no hay herramientas configuradas para LTI (Learning Tools Interoperability = Interoperatividad de Herramientas de Aprendizaje). Haga click sobre el enlace para instalar (arriba) para añadirlas.';
$string['noviewusers'] = 'No se encontraron usuarios con permisos para emplear esta herramienta';
$string['optionalsettings'] = 'Configuraciones opcionales';
$string['organization'] = 'Detalles de organización';
$string['organizationdescr'] = 'Descripción de Organización';
$string['organizationid'] = 'ID de Organización';
$string['organizationid_help'] = 'Un identificador único para esta instancia de Moodle. Típicamente, se emplea el nombre DNS de la organización. Si este campo se deja en blanco, el nombre del hospedador de este sitio Moodle será usado como valor por defecto.';
$string['organizationurl'] = 'URL de la Organización';
$string['organizationurl_help'] = 'La URL base de esta instancia Moodle. Si este campo se deja en blanco, se usará un valor por defecto basado en la configuración del sitio.';
$string['pagesize'] = 'Envíos mostrados por página';
$string['password'] = 'Secreto Compartido';
$string['password_admin'] = 'Secreto Compartido';
$string['password_admin_help'] = 'El secreto compartido puede concebirse como una contraseña usada para autenticar el acceso a la herramienta. Debe de proporcionarse junto con la clave del consumidor al provedor de la herramienta.

Aquellas herramientas que no requieran una comunicación segura con Moodle y que no proporcionen servicios adicionales (como reporte de calificaciones) puede ser que no requieran de un secreto compartido.';
$string['password_help'] = 'Para herramientas pre-configuradas, no es necesario proporcionar un secreto compartido aquí, dado que el secreto compartido estará dado como parte del proceso de configuración.

Este campo debe llenarse si creamos un enlace hacia el provedor de la herramienta que no está previamente configurada. Si el provedor de la herramientase se empleará más de una vez en el curso, el añadir una configuración de la herramienta sería una buena idea.

El secreto compartido puede concebirse como una contraseña usada para autenticar el acceso a la herramienta. Debe de proporcionarse junto con la clave del consumidor al provedor de la herramienta.

Aquellas herramientas que no requieran una comunicación segura con Moodle y que no proporcionen servicios adicionales (como reporte de calificaciones) puede ser que no requieran de un secreto compartido.';
$string['pending'] = 'Pendiente';
$string['pluginadministration'] = 'Administración LTI';
$string['pluginname'] = 'LTI';
$string['preferheight'] = 'Altura Preferida';
$string['preferwidget'] = 'Invocador de Widget preferido';
$string['preferwidth'] = 'Ancho preferido';
$string['press_to_submit'] = 'Presione para invocar esta actividad';
$string['privacy'] = 'Privacidad';
$string['quickgrade'] = 'Permitir calificación rápida';
$string['quickgrade_help'] = 'Si se habilita, múltiples herramientas podrán calificarse en una sola página. Añada calificaciones y comentarios y luego elija el botón de "Guardar toda mi retroalimentación" para guardar todos los cambios para esta página.';
$string['redirect'] = 'Usted será re-direccionado en unos segundos. Si no lo fuese, presione el botón.';
$string['reject'] = 'Rechazar';
$string['rejected'] = 'Rechazado';
$string['resource'] = 'Recurso';
$string['resourcekey'] = 'Clave de Consumidor';
$string['resourcekey_admin'] = 'Clave de Consumidor';
$string['resourcekey_admin_help'] = 'La clave del consumidor puede concebirse como un nombredeusuario empleado para autenticar el acceso a la herramienta. Se puede emplear por el provedor de la herramienta para identificar inequívocamente al sitio Moodle desde donde los usuarios invocan la herramienta.

La clave del consumidor debe ser proporcionada por el provedor de la herramienta. El método para obtener la clave del consumidor varía entre los provedores de herramientas. Puede ser un procedimiento automatizado, o puede requerir un diálogo con el provedor de la herramienta.

Las herramientas que no requieran una comunicación segura con Moodle y que no proporcionan servicios adicionales (como reportar calificaciones) puede ser que no requieran una clave para el recurso.';
$string['resourcekey_help'] = 'Para herramientas pre-configuradas, no es necesario proporcionar una clave de recurso aquí, dado que la clave del recurso estará dada como parte del proceso de configuración.

Este campo debe llenarse si creamos un enlace hacia el provedor de la herramienta que no está previamente configurada. Si el provedor de la herramientase se empleará más de una vez en el curso, el añadir una configuración de la herramienta sería una buena idea.

La clave del consumidor puede concebirse como un nombredeusuario empleado para autenticar el acceso a la herramienta.  Se puede emplear por el provedor de la herramienta para identificar inequívocamente al sitio Moodle desde donde los usuarios invocan la herramienta.

La clave del consumidor debe ser proporcionada por el provedor de la herramienta. El método para obtener la clave del consumidor varía entre los provedores de herramientas. Puede ser un procedimiento automatizado, o puede requerir un diálogo con el provedor de la herramienta.

Las herramientas que no requieran una comunicación segura con Moodle y que no proporcionan servicios adicionales (como reportar calificaciones) puede ser que no requieran una clave para el recurso.';
$string['resourceurl'] = 'URL del recurso';
$string['return_to_course'] = 'Elija <a href="{$a->link}" blanco="_top">aquí</a> para regresar al curso.';
$string['saveallfeedback'] = 'Guarde todas mis retroalimentaciones';
$string['secure_icon_url'] = 'URL del ícono seguro';
$string['secure_icon_url_help'] = 'Similar al URL del ícono, pero se emplea si el usuario accesa Moodle en forma segura mediante SSL. El principal propósito para este campo es impedirle al navegador que le advierta al usuario si la página subyaciente fue accesada sobre SSL, pero solicitando que muestre una imagen no-segura.';
$string['secure_launch_url'] = 'URL de invocación segura';
$string['secure_launch_url_help'] = 'Similar a Launch URL, pero se usa en lugar de este si se requiere alta seguridad. Moodle usará el Secure Launch URL en lugar del Launch URL si el sitio Moodle es accesado mediante SSL, o si la configuración de la herramienta está definida para que siempre invoque mediante SSL.

El Launch URL también puede configurarse hacia una dirección https para forzar a que se invoque mediante SSL, y este campo puede dejarse en blanco.';
$string['send'] = 'Enviar';
$string['setupoptions'] = 'Opciones de Configuración';
$string['share_email'] = 'Compartir el email del launcher (invocador) con la herramienta';
$string['share_email_admin'] = 'Compartir el email del launcher (invocador) con herramienta';
$string['share_email_admin_help'] = 'Especificar si es que la dirección de correo electrónico del usuario que invoca la herramienta será compartida con el provedor de la herramienta. El provedor de la herramienta puede necesitar la dirección de correo del que lo invoca para distinguir a usuarios con el mismo nombre en la UI (Interfase de Usuario), o mandar correos a usuarios basados en acciones dentro de la herramienta.';
$string['share_email_help'] = 'Especificar si es que la dirección de correo electrónico del usuario que invoca la herramienta será compartida con el provedor de la herramienta. El provedor de la herramienta puede necesitar la dirección de correo del que lo invoca para distinguir a usuarios con el mismo nombre en la UI (Interfase de Usuario), o mandar correos a usuarios basados en acciones dentro de la herramienta.

Observe que esta configuración puede anularse en la configuración de la herramienta.';
$string['share_name'] = 'Compartir el nombre del que invoca con la herramienta';
$string['share_name_admin'] = 'Compartir el nombre del que invoca con herramienta';
$string['share_name_admin_help'] = 'Especificar si es que el nombre completo del usuario que invoca la herramienta deberá ser compartido con el provedor de la herramienta. El provedor de la herramienta puede necesitar los nombres de quienes la invocan para mostrar información significativa dentro de la herramienta.';
$string['share_name_help'] = 'Especificar si es que el nombre completo del usuario que invoca la herramienta deberá ser compartido con el provedor de la herramienta. El provedor de la herramienta puede necesitar los nombres de quienes la invocan para mostrar información significativa dentro de la herramienta.

Observe que esta configuración puede anularse en la configuración de la herramienta.';
$string['share_roster'] = 'Permitirle a la herramienta acceder al registro de usuarios del curso';
$string['share_roster_admin'] = 'La herramienta puede acceder al registro de usuarios del curso';
$string['share_roster_admin_help'] = 'Especificar si es que la herramienta puede acceder a la lista de usuarios inscritos en cursos desde los que se invoca esta herramienta.';
$string['share_roster_help'] = 'Especificar si es que la herramienta puede acceder a la lista de usuarios inscritos en cursos desde los que se invoca esta herramienta.

Observe que esta configuración puede anularse en la configuración de la herramienta.';
$string['show_in_course'] = 'Mostrar el tipo de herramienta cuando se crean instancias de herramienta';
$string['show_in_course_help'] = 'Si se selecciona, esta configuración de la herramienta aparecerá en el menú desplegable de "Tipo de herramienta externa" cuando los profesores configuren herramientas externas dentro de los cursos.

En la mayoría de los casos, no es necesario seleccionar esta opción. Los profesores pueden emplear esta configuración de la herramienta basada en el Launch URL que corresponde a la URL base de la Herramienta, que es el método preferido.

El único caso en donde debe seleccionarse esta opción es si la configuración de la herramiente se pretenda que únicamente se use para el ingreso único. Por ejemplo, si todas las invocaciones al provedor de la herramienta meramente llevan al usuario a una página donde aterriza en lugar de a un recurso específico.';
$string['size'] = 'Parámetros de tamaño';
$string['submission'] = 'Envío';
$string['toggle_debug_data'] = 'Activar/Desactivar datos de depuración (debug)';
$string['tool_config_not_found'] = 'En esta URL no se encontró configuración para la herramienta.';
$string['tool_settings'] = 'Configuraciones de la Herramienta';
$string['toolsetup'] = 'Configuración de Herramienta Externa';
$string['toolurl'] = 'URL Base de la Herramienta';
$string['toolurl_help'] = 'La URL Base de la Herramienta se emplea para aparear las URLs para invocar herramientas con las configuraciones de Herramientas correcspondientes. Ponerle el prefijo http(s) a la URL es opcional.

Adicionalmente, la URL base se emplea como URL para invocar si es que no se especificó una URL en la instancia de la herramienta externa.

Por ejemplo, una URL base de *tool.com* concordaría con lo siguiente:

* tool.com
* tool.com/quizzes
* tool.com/quizzes/quiz.php?id=10
* www.tool.com/quizzes
* ww.tool.com/quizzes


una URL base de *www.tool.com/quizes* concordaría con lo siguiente:

* www.tool.com/quizzes
* tool.com/quizzes
* tool.com/quizzes/take.php?id=10

una URL base de  *quiz.tool.com* concordaría con lo siguiente:

* quiz.tool.com
* quiz.tool.com/take.php?id=10

Si existen dos diferentes configuraciones de herramienta para el mismo dominio, se usará la concordancia más específica.';
$string['typename'] = 'Nombre de la Herramienta';
$string['typename_help'] = 'El nombre de la herramienta se emplea para identificar al provedor de la herramienta dentro de Moodle. El nombre que se introduzca será visible a los profesores cuando añadan herramientas externas dentro de sus cursos.';
$string['types'] = 'Tipos';
$string['update'] = 'Actualizar';
$string['using_tool_configuration'] = 'Empleando la configuración de herramienta:';
$string['validurl'] = 'Una URL válida debe comenzar con http(s)://';
$string['viewsubmissions'] = 'Ver envíos y pantalla para calificar';
