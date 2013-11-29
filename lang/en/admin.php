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
 * Strings for component 'admin', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   admin
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accessdenied'] = 'Acceso denegado';
$string['accounts'] = 'Cuentas';
$string['additionalhtml'] = 'HTML adicional';
$string['additionalhtml_desc'] = 'Estas opciones le permiten especificar código HTML que desee añadir en todas las páginas. Puede establecer el código HTML que se añadirán dentro de la etiqueta HEAD de la página, inmediatamente después de que se haya abierto la etiqueta BODY o inmediatamente antes de que la etiqueta BODY se cierre. <br /> Hacer esto le permite agregar encabezados o pies de página personalizados en cada página o añadir fácilmente, con independencia del tema elegido, soporte para servicios como Google Analytics.';
$string['additionalhtmlfooter'] = 'Antes de cerrar BODY';
$string['additionalhtmlfooter_desc'] = 'Este contenido se agregará a cada página justo antes de que se cierre la etiqueta BODY.';
$string['additionalhtmlhead'] = 'Dentro del Encabezado';
$string['additionalhtmlhead_desc'] = 'Este contenido se agregará al final de la etiqueta HEAD en cada página.';
$string['additionalhtml_heading'] = 'HTML adicional que se añade a cada página.';
$string['additionalhtmltopofbody'] = 'Cuando BODY está abierto';
$string['additionalhtmltopofbody_desc'] = 'Este contenido se agregará a cada página justo después de que se abra la etiqueta BODY.';
$string['admincategory'] = 'Carrera: {$a}';
$string['adminseesall'] = 'Los administradores ven todo';
$string['adminseesallevents'] = 'Los administradores ven todos los eventos';
$string['adminseesownevents'] = 'Los administradores son como los demás usuarios';
$string['advancedfeatures'] = 'Características avanzadas';
$string['allcountrycodes'] = 'Todos los códigos de país';
$string['allowbeforeblock'] = 'La lista autorizada será procesada en primer lugar';
$string['allowbeforeblockdesc'] = 'Por defecto, se procesará en primer lugar la lista de IPs bloqueadas; si la opción se activa, la lista de IPs permitidas se procesará antes que la lista bloqueada.';
$string['allowblockstodock'] = 'Permitir que los bloques se \'orillen a la orilla\' (dock)';
$string['allowcategorythemes'] = 'Permitir temas por carrera';
$string['allowcoursethemes'] = 'Permitir temas gráficos en el curso';
$string['allowediplist'] = 'Lista de IP permitidas';
$string['allowemailaddresses'] = 'Dominios de Email permitidos';
$string['allowframembedding'] = 'Permitir incrustación de marco';
$string['allowframembedding_help'] = 'Permitir incrustar este sitio en marcos de sitios externos. No se recomienda activar esta opción por razones de seguridad.';
$string['allowguestmymoodle'] = 'Permitir a los invitados acceso a Mi Hogar';
$string['allowobjectembed'] = 'Permitir marcas EMBED (incrustar) y OBJECT (objeto)';
$string['allowthemechangeonurl'] = 'Permitir cambios de tema gráfico en la URL';
$string['allowuserblockhiding'] = 'Permitir a los usuarios ocultar bloques';
$string['allowuserswitchrolestheycantassign'] = 'Permitir a los usuarios sin el permiso para asignar roles poder de cambiar de rol';
$string['allowuserthemes'] = 'Permitir temas gráficos del usuario';
$string['antivirus'] = 'Antivirus';
$string['appearance'] = 'Apariencia';
$string['aspellpath'] = 'Ruta a aspell';
$string['authentication'] = 'Autenticación';
$string['authpreventaccountcreation'] = 'Evitar la creación de cuentas al autenticarse';
$string['authpreventaccountcreation_help'] = 'Cuando un usuario se autentica, si aún no existe su cuenta, se crea una en el sitio de forma automática. Si se utiliza una base de datos externa para la autenticación, por ejemplo LDAP, pero se desea restringir el acceso al sitio solo a los usuarios con una cuenta existente, esta opción debe estar habilitada. Las nuevas cuentas tendrán que ser creadas manualmente o mediante la función de carga de usuarios por archivo de texto. Tenga en cuenta que este ajuste no se aplica a la autenticación MNet.';
$string['authsettings'] = 'Gestionar autenticación';
$string['autolang'] = 'Detectar idioma automáticamente';
$string['autologinguests'] = 'Ingreso automático de invitados';
$string['availablelicenses'] = 'Licencias disponibles';
$string['availableto'] = 'Disponible para';
$string['backgroundcolour'] = 'Color Transparente';
$string['backups'] = 'Respaldos';
$string['backup_shortname'] = 'Usar nombre del curso en el nombre del archivo de copia de seguridad';
$string['backup_shortnamehelp'] = 'Usar el nombre del curso como parte del nombre del archivo de copia de seguridad (en vez de usar el ID del curso).';
$string['badwordsconfig'] = 'Escriba su lista de palabras censuradas, separadas por comas';
$string['badwordsdefault'] = 'Si la lista personalizada está vacía, se usará una lista por defecto contenida en el paquete de idioma.';
$string['badwordslist'] = 'Lista personalizada de palabras censuradas';
$string['blockediplist'] = 'Lista de IP bloqueadas';
$string['blockinstances'] = 'Instancias';
$string['blockmultiple'] = 'Múltiples';
$string['blockprotect'] = 'Proteger instancias';
$string['blockprotect_help'] = 'Si bloquea (pone seguro a)  un tipo particular de bloque, entonces nadie podrá añadir o eliminar instancias de dicho bloque. (Desde luego, Usted podrá des-bloquearlo después si necesitara editar instancias).

Esta opción se utiliza principalmente para proteger los bloques de navegación y configuración, cuya recuperación en caso de eliminación accidental puede ser muy compleja.';
$string['blocksettings'] = 'Gestionar bloques';
$string['blockunprotect'] = 'Desproteger';
$string['bloglevel'] = 'Visibilidad del blog';
$string['bookmarkadded'] = 'Marcador agregado.';
$string['bookmarkalreadyexists'] = 'Usted ya ha marcado esta página';
$string['bookmarkdeleted'] = 'Marca borrada';
$string['bookmarkthispage'] = 'marcar esta página';
$string['cacheapplication'] = 'Caché de aplicación';
$string['cacheapplicationhelp'] = 'Los items cacheados se comparten entre los usuarios y caducan por una TTL determinada';
$string['cachejs'] = 'Caché Javascript';
$string['cachejs_help'] = 'El almacenamiento en caché y la conversión Javascript mejoran enormemente el rendimiento de carga de la página. Se recomienda para los sitios de producción. Los desarrolladores probablemente querrán desactivar esta función.';
$string['cacherequest'] = 'Solicitar caché';
$string['cacherequesthelp'] = 'Caché específica de usuario que caduca cuando se completa la solicitud. Diseñada para remplazar áreas en donde estamos usando los almacenamientos estáticos.';
$string['cachesession'] = 'Caché de la sesión';
$string['cachesessionhelp'] = 'Caché específica del usuario que caduca cuando termina la sesión del usuario. Diseñada para aliviar el abotagamiento/fatiga de la sesión.';
$string['cachesettings'] = 'Configuraciones de caché';
$string['cachetext'] = 'Tiempo de vida de la caché de texto';
$string['caching'] = 'Cacheando';
$string['calendarexportsalt'] = 'Salado de exportación de calendarios';
$string['calendarsettings'] = 'Calendario';
$string['calendar_weekend'] = 'Días del fin de semana';
$string['cannotdeletemodfilter'] = 'No puede desinstalar \'{$a->filter}\' porque es parte del módulo \'{$a->module}\'.';
$string['cannotuninstall'] = '{$a} no se puede desinstalar.';
$string['cfgwwwrootslashwarning'] = 'Ha definido $CFG->wwwroot incorrectamente en su archivo config.php. Ha incluído un carácter \'/\' al final. Por favor, elimínelo. De lo contrario, aparecerán errores extraños tales como <a href=\'http://tracker.moodle.org/browse/MDL-11061\'>MDL-11061</a>.';
$string['cfgwwwrootwarning'] = 'Ha definido $CFG->wwwroot incorrectamente en su archivo config.php. No se corresponde con la URL que usted está usando para acceder a esta página. Por favor, corríjalo. De lo contrario, aparecerán errores extraños tales como <a href=\'http://tracker.moodle.org/browse/MDL-11061\'>MDL-11061</a>.';
$string['change'] = 'cambiar';
$string['checkboxno'] = 'No';
$string['checkboxyes'] = 'Sí';
$string['choosefiletoedit'] = 'Elija un archivo para editar';
$string['clamfailureonupload'] = 'Fallo en clam AV';
$string['cleanup'] = 'Limpieza';
$string['clianswerno'] = 'n';
$string['cliansweryes'] = 's';
$string['cliincorrectvalueerror'] = 'Error, valor incorrecto  "{$a->value}" para "{$a->option}"';
$string['cliincorrectvalueretry'] = 'Valor incorrecto, por favor, inténtelo de nuevo';
$string['clistatusdisabled'] = 'Status: deshabilitado';
$string['clistatusenabled'] = 'Status: habilitado';
$string['clistatusenabledlater'] = 'status: se habilitará el modo de mantenimiento CLI en {$a}';
$string['clitypevalue'] = 'valor del tipo';
$string['clitypevaluedefault'] = 'valor del tipo, pulse Enter para utilizar el valor por defecto ({$a})';
$string['cliunknowoption'] = 'Opciones no reconocidas:
{$a}
Por favor, utilice la opción Ayuda.';
$string['cliupgradefinished'] = 'Actualización de comando de línea finalizado con éxito.';
$string['cliupgradenoneed'] = 'No se necesita actualizar la versión instalada {$a}. ¡Gracias por comprobarlo!';
$string['cliyesnoprompt'] = 'escriba s (sí) o n (no)';
$string['commentsperpage'] = 'Comentarios por página';
$string['commonfiltersettings'] = 'Ajustes comunes de filtro';
$string['commonsettings'] = 'Ajustes comunes';
$string['componentinstalled'] = 'Componente instalado';
$string['computedfromlogs'] = 'Calculado a partir de las bitácoras desde {$a}.';
$string['condifmodeditdefaults'] = 'Los valores que fije aquí definen los valores por defecto que se usan cuando usted crea una actividad nueva.';
$string['confeditorhidebuttons'] = 'Seleccione los botones que deberían estar ocultos en el editor HTML.';
$string['configallcountrycodes'] = 'Esta es la lista de países que pueden ser seleccionados en varios lugares, por ejemplo, en el perfil de un usuario. Si está vacía (por defecto) se utilizaría originalmente la lista de \'countries.php\' en el paquete de idioma Inglés estándar, o actualmente, su traducción al español de México. Esta es la lista de la norma ISO 3166-1. De otra forma, Usted puede especificar una lista separada por comas de los códigos, por ejemplo, "GB,FR,ES. Si se agregan nuevos códigos, no estándar aquí, tendrá que añadirlos a los archivos countries.php en inglés \'en\' y en su paquete de idioma (es_Mx).';
$string['configallowassign'] = 'Puede permitir a las personas que tienen los roles de la izquierda asignar algunos de los roles de la columna a otras personas';
$string['configallowblockstodock'] = 'Si se activa y está soportado por el tema seleccionado, los usuarios pueden optar por mover los bloques a una barra lateral (dock) especial en la orilla';
$string['configallowcategorythemes'] = 'Si activa esta opción, los temas gráficos pueden ajustarse al nivel de la carrera. Esto afectará a todas las carreras y cursos de nivel inferior (\'hijos\') a menos que tengan especificado su propio tema. ADVERTENCIA: Habilitar esta opción puede afectar al rendimiento.';
$string['configallowcoursethemes'] = 'Si activa esta opción, se permitirá a los cursos ajustar sus propios temas gráficos. Los temas de los cursos pasan por alto cualesquiera otras opciones de tema (sitio, usuario o sesión)';
$string['configallowemailaddresses'] = 'Si desea restringir todas las direcciones nuevas de correo a dominios particulares, lístelos aquí separados por espacios. El resto de los dominios será rechazado, e.g., <strong>ourcollege.edu.au .gov.au</strong>';
$string['configallowguestmymoodle'] = 'Si se habilita, los invitados podrán tener acceso a Mi Hogar, de lo contrario se redireccionarán a la página principal del sitio.';
$string['configallowobjectembed'] = 'Como medida de seguridad por defecto, los usuarios normales no podrán incrustar en el código HTML objetos multimedia (como  Flash) dentro del texto utilizando las marcas explícitas EMBED y OBJECT (si bien podrá hacerse con seguridad utilizando el filtro mediaplugins). Active la opción si desea permitir incrustar objetos multimedia.';
$string['configallowoverride'] = 'Puede permitir a las personas que tengan los roles de la izquierda anular algunos de los roles de la columna';
$string['configallowoverride2'] = 'Seleccione qué rol(es) puede(n) ser invalidado(s) por cada rol de la columna izquierda.<br />Note que estos ajustes sólo se aplican a los usuarios que tienen permiso en \'moodle/role:override\' o en \'moodle/role:safeoverride\'.';
$string['configallowswitch'] = 'Seleccione a qué roles puede cambiar un usuario, de entre los roles que ya tiene asignados. Además de una entrada en esta tabla el usuario debe tener  también el permiso moodle/role:switchroles para poder cambiar de rol';
$string['configallowthemechangeonurl'] = 'Si está activado, el tema gráfico se puede cambiar mediante la adición de theme={themename} a cualquier URL de sitio Moodle (por ejemplo: mymoodlesite.com/?theme=afterburner ) o <br />&theme=themename a cualquier URL interna de Moodle URL (por ejemplo: mymoodlesite.com/course/view.php?id=2&theme=afterburner ).Moodle.';
$string['configallowuserblockhiding'] = '¿Desea que los usuarios puedan mostrar u ocultar bloques laterales en el sitio? Esta opción usa Javascript y \'cookies\' para recordar el estado de cada bloque colapsable, y sólo afecta al modo en que cada usuario ve la información.';
$string['configallowuserswitchrolestheycantassign'] = 'Por defecto, moodle/role:assign se requiere para que los usuarios puedan cambiar de rol. Activar esta opción remueve este requisito y resulta en que los roles disponibles en el menú "Cambiar rol a" sean determinados por la configuración en la tabla de "Permitir asignación de roles" exclusivamente. Se recomienda que la configuración de esta tabla NO permita que los usuarios cambien hacia un rol con mayores privilegios de su rol actual.';
$string['configallowuserthemes'] = 'Si se activa esta opción, los usuarios podrán elegir sus propios temas gráficos. Los temas personales de los usuarios anulan los temas del sitio (pero no los temas del curso)';
$string['configallusersaresitestudents'] = 'En lo que concierne a las actividades de la portada del sitio, ¿deberían TODOS los usuarios ser considerados como estudiantes? Si la respuesta es "Sí", cualquier usuario con cuenta confirmada podrá participar como estudiante en tales actividades. Si la respuesta es "No", sólo los usuarios que ya participan en al menos un curso podrán tomar parte en las actividades de la página principal. Sólo los administradores y profesores especialmente asignados pueden actuar como profesores en las actividades de la portada.';
$string['configauthenticationplugins'] = 'Por favor, seleccione los plugins de autenticación que desea utilizar y dispóngalos en orden.';
$string['configautolang'] = 'Detectar idioma por defecto desde el ajuste del navegador. Si está deshabilitado, se utiliza el idioma por defecto del sitio.';
$string['configautologinguests'] = '¿Deberá permitirse a los visitantes automáticamente el acceso como invitados cuando entran a los cursos con acceso de invitado?';
$string['configbloglevel'] = 'Esta opción le permite restringir el nivel en el que pueden verse los blogs de los usuarios en este sitio. Advierta que se especifica el contexto máximo de quien los ve, pero no de quien envía mensajes ni de los tipos de mensaje enviados al blog. Los blogs pueden también deshabilitarse completamente si así lo desea.';
$string['configcachetext'] = 'En sitios grandes o que usan filtros de texto, esta opción realmente puede acelerar las cosas.

Las copias de los textos se retendrán en su forma procesada durante el tiempo especificado aquí.

Si el ajuste es muy pequeño, el proceso se enlentecerá, pero si es muy grande los textos tardarán demasiado en refrescarse (con nuevos enlaces, por ejemplo).';
$string['configcalendarcustomexport'] = 'Habilitar exportación de rango de fechas personalizado de  calendario';
$string['configcalendarexportsalt'] = 'Esta cadena de caracteres aleatorios se utiliza para mejorar las claves de seguridad (tokens) de autenticación utilizadas para la exportación de los calendarios. Tenga en cuenta que todas las claves de seguridad actuales quedarán invalidadas si modifica esta sal.';
$string['configclamactlikevirus'] = 'Tratar archivos como virus';
$string['configclamdonothing'] = 'Tratar archivos como buenos';
$string['configclamfailureonupload'] = 'Si ha configurado clam para escanear archivos subidos, pero está mal configurado o no funciona por alguna razón desconocida, ¿cómo debería comportarse? Si selecciona \'Tratar archivos como virus\', tales archivos serán trasladados al área de cuarentena, o eliminados. Si selecciona \'Tratar los archivos como buenos\', los archivos serán trasladados al directorio de destino. En cualquier caso, los administradores recibirán una alerta cuando clam falle. Si selecciona \'Tratar los archivos como virus\' y por alguna razón clam no funciona (normalmente debido a que ha introducido una ruta no válida), TODOS los archivos subidos serán llevados al área de cuarentena, o eliminados. Sea cuidadoso con esta configuración.';
$string['configconvertformat'] = 'Si están disponibles <i> látex </i>, <i> dvips </i> y <i> convert</i>, las imágenes se crean utilizando el formato especificado. Si no es así, se usará mimeTeX y creará imágenes GIF.';
$string['configcookiehttponly'] = 'Habilita la nueva característica de PHP 5.2.0: se instruye a los navegadores para que envíen una \'cookie\' sólo a petición de http reales. Las \'cookies\' no deberían ser accesibles desde lenguajes de script. No todos los navegadores pueden ejecutar esta opción, y podría no ser compatible con el código actual. Ayuda a prevenir algunos tipos de ataques XSS.';
$string['configcookiesecure'] = 'Si el servidor únicamente acepta conexiones https, se recomienda habilitar el envío de \'cookies\' seguras. Si la opción está activada, asegúrese por favor de que el servidor web no acepta http:// ni ha fijado una redirección permanente a direcciones https:// Cuando una dirección <em>wwwroot</em> no comienza con https:// este ajuste se desactiva automáticamente.';
$string['configcountry'] = 'Si selecciona un país, dicho país quedará como valor por defecto para nuevos usuarios o cuentas. Si se encuentra en México, elija México. Para forzar a los usuarios a elegir un país, deje la opción sin seleccionar.';
$string['configcourseoverviewfilesext'] = 'Lista separada por comas de extensiones permitidas para los archivos de vista general de curso';
$string['configcourseoverviewfileslimit'] = 'El número de archivos que se pueden añadir al resumen del curso.';
$string['configcourserequestnotify'] = 'Escriba el nombre de usuario a quien se enviará una notificación cuando se solicite un nuevo curso';
$string['configcourserequestnotify2'] = 'Usuarios a quienes se notificará cuando un nuevo curso sea solicitado. En esta lista figuran únicamente los usuarios que pueden aprobar las solicitudes de curso.';
$string['configcoursesperpage'] = 'Introduzca el número de cursos a ser mostrados por página en un listado de cursos.';
$string['configcourseswithsummarieslimit'] = 'El número máximo de cursos a mostrar en un listado de cursos, incluyendo resúmenes, antes de revertir a un listado más simple.';
$string['configcronclionly'] = 'Si se activa esta opción, el script del cron sólo podrá ejecutarse desde una línea de comandos en lugar de vía web. Esto anula el ajuste de más abajo de contraseña del cron.';
$string['configcronremotepassword'] = 'Esto significa que el script cron.php no puede ejecutarse desde un navegador web sin suministrar la contraseña usando la siguiente formato para la URL:<pre>http://site.example.com/admin/cron.php?password=opensesame
</pre>Si se deja vacío, no se necesita contraseña.';
$string['configcurlcache'] = 'Tiempo de vigencia (en segundos) de la caché cURL.';
$string['configcustommenuitems'] = 'Puede diseñar aquí un menú personalizado que los temas gráficos pueden mostrar. Cada línea consta de un texto del menú, un enlace URL (opcional) y una descripción del título (opcional), separados por el caracter de línea vertical | (AltGr + 1). Puede especificar una estructura de submenús haciendo uso de guiones.

Por ejemplo:
<pre>
Moodle central|http://moodle.org
-Moodle soporte gratuito|http://moodle.org/support
-Moodle desarrollo|http://moodle.org/development
--Moodle Tracker|http://tracker.moodle.org
--Moodle Documentación en Español|http://docs.moodle.org/all/es/P%C3%A1gina_Principal
-Moodle Noticias|http://moodle.org/news
Moodle comercial
-Moodle alojamiento comercial|http://moodle.com/hosting
-Moodle soporte comercial|http://moodle.com/support
</pre>';
$string['configdbsessions'] = 'Si elige esta opción, se usará la base de datos para almacenar información sobre las sesiones actuales. Esto es especialmente útil para sitios grandes u ocupados construídos sobre racimos (\'clusters\') de servidores. En la mayoría de los casos debería dejarse en blanco de modo que se use en su lugar el disco del servidor. Note que la modificación de este ajuste desconectará a todos los usuarios, incluído usted.';
$string['configdebug'] = 'Si activa esta opción, se incrementará el error_reporting de PHP, de modo que recibirá más advertencias. Sólo resulta útil para los desarrolladores.';
$string['configdebugdisplay'] = 'Si activa esta opción, el informe de errores irá a la página HTML. Es práctico pero rompe XHTML, JS, \'cookies\' y cabeceras HTTP en general. Si deshabilita esta opción, se enviarán las salidas a las bitácoras del servidor, permitiendo una mejor depuración. El parámetro de configuración de PHP <b>error_log</b> controla a qué bitácora va el error.';
$string['configdebugpageinfo'] = 'Habilítelo si desea que la información de la página aparezca en el pie de página.';
$string['configdebugsmtp'] = 'Activa la depuración con información detallada durante el envío de correos electrónicos al servidor SMTP.';
$string['configdebugvalidators'] = 'Activar si quiere disponer de enlaces a servidores externos de validación en el pie de página. Es posible que necesite crear un nuevo usuario con nombredeusuario <em>w3cvalidator</em>, y permitir el acceso de invitados. Estos cambios pueden facilitar el acceso no autorizado al servidor, ¡no lo haga en los sitios de producción!';
$string['configdefaulthomepage'] = 'Determina cuál será la página principal para los usuarios identificados';
$string['configdefaultrequestcategory'] = 'Los cursos solicitados por los usuarios serán ubicados automáticamente en esta carrera.';
$string['configdefaultrequestedcategory'] = 'Carrera por defecto en la que incluir los cursos solicitados, en el caso de que sean aprobados.';
$string['configdefaultuserroleid'] = 'A todos los usuarios autenticados se les asignarán los permisos del rol que usted especifique aquí, en el nivel del sitio, ADEMÁS de cualesquiera otros roles que puedan tener. El rol por defecto es el de Usuario identificado (Authenticated user). Advierta que esto no entrará en conflicto con otros roles que el usuario tenga a menos que Usted prohiba permisos (prohibit capabilities). Simplemente asegura que todos los usuarios tengan permisos que no son asignables a nivel de curso (por ejemplo: enviar entradas al blog, gestionar su propio calendario, etc.).';
$string['configdeleteincompleteusers'] = 'Después de este período se eliminarán todas las cuentas no validadas completamente.';
$string['configdeleteunconfirmed'] = 'Si está usando una autenticación basada en email, éste es el período dentro del cual se aceptará una respuesta enviada por los usuarios. Pasado ese período, se eliminarán todas las cuentas no confirmadas.';
$string['configdenyemailaddresses'] = 'Para denegar direcciones de email de dominios particulares, escriba aquí una lista de ellos. El resto de los dominios serán aceptados. Para denegar subdominios escriba el dominio precedido por un punto \'.\' Por ejemplo, <strong>hotmail.com (para dominios) .yahoo.mx (para los subdominios)</strong>';
$string['configdisableuserimages'] = 'Desactiva la posibilidad de que los usuarios cambien las imágenes de sus perfiles.';
$string['configdisplayloginfailures'] = 'Esta opción muestra información a los usuarios seleccionados sobre los anteriores intentos de ingreso al sistema fallidos.';
$string['configdndallowtextandlinks'] = 'Activar o desactivar la función "Arrastrar y Soltar" texto y enlaces a una página del curso, junto con el arrastrar y soltar los archivos. Tenga en cuenta que el arrastre de texto en Firefox, o entre diferentes navegadores no siempre es confiable y puede dar lugar a que no se suba nada, o que suba texto corrupto.

PERO si funciona bien,  hace mucho más fácil el trabajo de maestros, alumnos y administradores...';
$string['configdocroot'] = 'Define la ruta a Moodle Docs para proporcionar documentación específica según el contexto, mediante enlaces hacia \'Moodle Docs para esta página\' .en el pie de cada página. Si deja vacío este espacio, desaparecerá el enlace hacia \'Moodle Docs para esta página\'.

Puede cambiar esta opción si desea tener su propia documentación personalizada en línea. No obstante, si lo hace así, asegúrese de que las rutas de su documentación siguen el mismo formato que http://docs.moodle.org.';
$string['configdoctonewwindow'] = 'Si habilita esta opción los enlaces a Moodle Docs se mostrarán en una nueva ventana.';
$string['configeditordictionary'] = 'Este valor será usado si el corrector de ortografía (aspell) no tiene un diccionario para el idioma propio de los usuarios.';
$string['configeditorfontlist'] = 'Seleccione los tipos de letra (fonts) que deberían aparecer en la lista del menú emergente del editor.';
$string['configemailchangeconfirmation'] = 'Cuando los usuarios cambien su dirección de correo electrónico en sus perfiles de usuario, se requerirá confirmación del correo electrónico.';
$string['configenableajax'] = 'Esta configuración le permite controlar el uso de AJAX (interfaces avanzadas cliente/servidor usando Javascript) en todo el sitio. AJAX se requiere para cierta funcionalidad como arrastrar y soltar.';
$string['configenableblogs'] = 'Esta configuración les proporciona a todos los usuarios su propio blog.';
$string['configenablecalendarexport'] = 'Habilitar la exportación o suscripción a los calendarios.';
$string['configenablecomments'] = 'Habilitar comentarios';
$string['configenablecourserequests'] = 'Permite que cualquier usuario solicite la creación de un curso.';
$string['configenabledevicedetection'] = 'Permite la detección de teléfonos móviles, móviles inteligentes, tabletas o dispositivos por defecto (PC de escritorio, PC portátil, etc.) para la aplicación de temas u otras características.';
$string['configenablegroupmembersonly'] = 'Si está activado, el acceso a las actividades podrá restringirse a los miembros del grupo. Esto puede aumentar la carga de trabajo del servidor. Además, las carreras del libro de calificaciones deben configurarse de modo que se garantice que las actividades quedan ocultas para los usuarios que no sean miembros del grupo. En instituciones grandes de enseñanza superior, habilitar esta opción permitirá realizar exámenes diferentes (tipo A y tipo B) a grupos diferentes (en diferentes horarios de examen), y evitar que los alumnos \'se pasen\' las preguntas y respuestas, por lo que SI se recomienda para Universidades públicas en México.';
$string['configenablemobilewebservice'] = 'Habilitar el servicio para móviles para la aplicación oficial Moodle u otra aplicación que lo solicite. Para más información lea la {$a}';
$string['configenablerssfeeds'] = 'Si se habilita, se generan canales RSS por varias características dentro del sitio, tales como blogs, foros, actividades de base de datos y glosarios. Tome nota de que también deberán habilitarse los canales RSS para los módulos de actividad particulares.';
$string['configenablerssfeedsdisabled'] = 'No está disponible porque los canales RSS están desactivados en todo el sitio. Para activarlos, vaya a Variables en Admin - Configuración.';
$string['configenablerssfeedsdisabled2'] = 'Los canales RSS están deshabilitados en el nivel servidor. Para activarlos, vaya a los ajustes de las Variables en Configuración -> Administración.';
$string['configenablesafebrowserintegration'] = 'Agrega la opción "Requerir Examen Seguro del Navegador" para el campo "Seguridad del navegador "en el formato de configuración del examen. Ver http://www.safeexambrowser.org/ para más información. Nota: los exámenes seguros requieren que la computadora y el navegador estén correctamente configurados, lo que no siempre sucede en los cafés internet y las casas de los usuarios de México.';
$string['configenablestats'] = 'Si selecciona \'sí\', el cronjob de Moodle procesará las bitácoras y recopilará algunas estadísticas. Dependiendo de la cantidad de tráfico del sitio, esta operación puede demorarse. Si activa esta opción, podrá ver algunos gráficos y estadísticas interesantes sobre cada uno de sus cursos, o bien sobre todo el sitio.';
$string['configenabletrusttext'] = 'Por defecto, Moodle limpiará siempre a fondo el texto escrito por los usuarios a fin de eliminar cualesquiera \'scripts\', medios, etc., que pudieran constituir un riesgo para la seguridad. El sistema de contenido confiable es una forma de otorgar a determinados usuarios en los que usted confía la capacidad para incluir estas características avanzadas en su contenido sin interferencias. Para activar este sistema, necesita en primer lugar activar este ajuste, y luego otorgar permiso de Contenido confiable a un rol específico de Moodle. Los textos creados o subidos por tales usuarios serán marcados como confiables y no serán sometidos a limipieza antes de ser mostrados.';
$string['configenablewebservices'] = 'Los servicios Web permiten a otros sistemas acceder a este Moodle y realizar operaciones. Para mayor seguridad esta característica debe ser desactivada a menos que realmente la esté utilizando.';
$string['configenablewsdocumentation'] = 'Habilitar la auto-generación de documentación de servicios web. Un usuario puede tener acceso a su propia documentación en su página de claves de seguridad {$a}. Solo se muestra la documentación de los protocolos habilitados.';
$string['configerrorlevel'] = 'Seleccionar la cantidad de advertencias PHP que desea mostrar. La mejor elección es \'Normal\'.';
$string['configexportlookahead'] = 'Días de anticipación durante exportación';
$string['configexportlookback'] = 'Días hacia el pasado durante exportación';
$string['configextendedusernamechars'] = 'Este ajuste permite a los estudiantes usar cualesquiera caracteres en sus nombresdeusuario (note que eso no afecta a sus nombres reales). El valor por defecto es "NO", lo que restringe los nombres de usuario a caracteres alfanuméricos en minúsculas, guión bajo (_), guión (-), símbolo de punto (.) o de arroba (@). Tenga en cuenta que en México es frecuente que las computadoras confundan la disposición del teclado Latinoamericano con Español, lo que comunmente resulta en acentos equivocados (à en lugar de á)...';
$string['configextramemorylimit'] = 'Algunas secuencias de comandos como búsqueda, respaldar/restaurar o cron requieren más memoria. Establezca valores más altos para los sitios grandes.';
$string['configfilterall'] = 'Filtrar todas las cadenas, incluyendo cabeceras, títulos, barra de navegación, etc. Esto resulta muy útil cuando se usa el filtro multi-idioma; de otro modo, únicamente se ocasionará una sobrecarga en el sitio para obtener escasas ganancias.';
$string['configfiltermatchoneperpage'] = 'Los filtros de enlace automático sólo generarán un enlace único a la primera instancia de texto coincidente que se encuentre en la página completa, pasando por alto el resto.';
$string['configfiltermatchonepertext'] = 'Los filtros de enlace automático sólo generarán un enlace único a la primera instancia de texto coincidente que se encuentre en cada elemento de texto (e.g., recurso, bloque) de la página, pasando por alto el resto. Este ajuste no se tendrá en cuenta si la opción de "uno por página" es <i>sí</i>.';
$string['configfilteruploadedfiles'] = 'Esta opción posibilita que Moodle procese con los filtros todos los archivos HTML y de texto subidos antes de mostrarlos.';
$string['configforcelogin'] = 'Normalmente la portada del sitio y las listas de los cursos (pero no los cursos) pueden ser leídos por cualquiera sin necesidad de escribir su nombre de usuario y contraseña. Si desea forzar a los visitantes a acceder al sitio antes de poder ver CUALQUIER CONTENIDO, debería activar esta opción.';
$string['configforceloginforprofiles'] = 'Esta opción obliga a ingresar al sitio con cuentas válidas (no como invitados) antes de poder ver las páginas de los perfiles de usuario. Si deshabilita esta opción puede darse el caso de que algunos usuarios publiquen anuncios (spam) u otro contenido inapropiado en sus perfiles y este contenido será visible para todo el mundo.';
$string['configfrontpage'] = 'Los elementos seleccionados se mostrarán en la portada del sitio.';
$string['configfrontpagecourselimit'] = 'Número máximo de cursos';
$string['configfrontpagecourselimithelp'] = 'Número máximo de cursos a mostrarse en la portada del sitio en los listados de cursos.';
$string['configfrontpageloggedin'] = 'Los elementos seleccionados se mostrarán en la portada del sitio cuando un usuario se identifica.';
$string['configfullnamedisplay'] = 'Esto define como se verán los nombres cuando se muestren completos. Para la mayoría de los sitios mono-lingües, la configuración por defecto más eficiente sería "Nombre + Apellidos", pero Usted puede elegir ocultar los apellidos por completo, o que lo decida la configuración del paquete de idioma actual (algunos idiomas tienen reglas diferentes).';
$string['configgeoipfile'] = 'Ubicación del archivo binario GeoIP City. Este archivo no forma parte de la distribución de Moodle y debe obtenerse de forma independiente en <a href="http://www.maxmind.com/">MaxMind</a>. Puede adquirir una versión comercial u optar por la versión gratuita.<br />Simplemente descargue <a href="http://geolite.maxmind.com/download/geoip/database/GeoLiteCity.dat.gz" >http://geolite.maxmind.com/download/geoip/database/GeoLiteCity.dat.gz</a> y extráigalo en el directorio "{$a}" de su servidor.';
$string['configgetremoteaddrconf'] = 'Si su servidor está detrás de un \'proxy reverso\' (para mejorar la respuesta), puede usar esta opción para especificar en qué cabeceras HTTP se puede confiar que contengan la dirección IP remota. Las cabeceras se leen por orden, usando la primera que esté disponible.';
$string['configgradebookroles'] = 'Esta configuración le permite controlar quien aparece en el libro de calificaciones. Los usuarios necesitan tener al menos uno de estos roles en un curso para poder aparecer en el libro de calificaciones del curso. Es muy importante que esté activada la casilla de estudiante o no les podrán calificar sus tareas y exámenes..';
$string['configgradeexport'] = 'Elija qué formatos de exportación del libro de calificaciones constituyen su método principal para exportar calificaciones. Los plugins elegidos ajustarán y usarán un campo ("últimos exportados") para cada calificación. Por ejemplo, esto podría dar como resultado que los registros exportados se identificaran como "nuevos" o "actualizados". Si no está seguro de cómo hacer esto, no marque nada.';
$string['confighiddenuserfields'] = 'Para aumentar la privacidad de los estudiantes, seleccione qué campos de información sobre el usuario desea ocultar a otros usuarios distintos de los profesores del curso o los administradores (mánagers). Mantenga pulsada la tecla CTRL para seleccionar varios campos.

Por favor cuide los datos personales de los usuarios y considere IMPORTANTE tener la precaución de  no escribir ni permitir el acceso no-autorizado a "datos personales sensibles" (estado de salud, información genética, creencias religiosas, filosóficas y morales, afiliación sindical, opiniones políticas, orígen racial o étnico, preferencia sexual, ...) que pudieran causarle responsabilidades o riesgos innecesarios a Usted y a la Institución.

Por favor si está en México le recomendamos que consulte la página y siga las indicaciones del <a href="http://www.ifai.gob.mx">Instituto Federal de Acceso a la Información y Protección de Datos</a>';
$string['configidnumber'] = 'Esta opción especifica si

(a) No se pide a los usuarios un número de ID,

(b) Se les pide un número de ID pero pueden dejarlo en blanco o

(c) Se les pide un número de ID y no pueden dejarlo en blanco.

En caso afirmativo, el número de ID del Usuario se muestra en su Perfil.';
$string['configintro'] = 'En esta página puede especificar un número de variables de configuración que ayudan a Moodle a trabajar adecuadamente en su servidor. Que esto no le preocupe demasiado: los valores por defecto funcionarán bien y, en todo caso, siempre podrá volver a esta página y cambiar los ajustes.';
$string['configintroadmin'] = 'En esta página debería configurar su cuenta de administrador principal, que le dará un control absoluto sobre el sitio. Asegúrese de que usa un nombredeusuario y contraseña seguros, así como una dirección de correo electrónico válida. Más adelante podrá crear más cuentas de administrador.';
$string['configintrosite'] = 'Esta página le permite configurar la portada y dar un nombre a su nuevo sitio. Puede volver aquí más adelante y cambiar estos ajustes en cualquier momento usando los menús de Administración.';
$string['configiplookup'] = 'Cuando usted hace clic en una dirección IP (e.g., 34.12.222.93), como sucede en llas bitácoras, se mostrará un mapa con la mejor aproximación posible de la ubicación de la IP. Para hacer esto, existen diferentes plugins entre los que puede elegir, y cada uno de ellos tiene ventajas e inconvenientes.';
$string['configkeeptagnamecase'] = 'Marque esta opción si desea que los nombres de marca (tags) conserven la configuración de minúsculas/MAYÚSCULAS original tal como fueron introducidos por los usuarios que los crearon.';
$string['configlang'] = 'Elija un idioma por defecto para el sitio completo. Los usuarios pueden más tarde elegir otra opción en el menú de idiomas o en su perfil personal.
Si está en México, elija Español - Mexico.
Si está en España elija Español - Internacional.';
$string['configlanglist'] = 'Deje esto en blanco para dejar que los usuarios elijan cualquier idioma presente en la instalación de Moodle. Sin embargo, puede acortar el menú escribiendo una lista de códigos de los idiomas que desee separada por comas. Por ejemplo, en,es_es,es_mx,fr,it';
$string['configlangmenu'] = 'Decida si quiere o no mostrar el menú de idiomas de propósito general en la página de inicio, en la de ingreso , etc. Esto no afecta a la posibilidad que los usuarios tienen de elegir su idioma preferido en su propio perfil.';
$string['configlangstringcache'] = 'Guarda en la caché todas las cadenas del idioma en archivos compilados dentro del directorio de datos. Si está traduciendo Moodle o cambiando cadenas en el código fuente de Moodle, entonces puede desactivar esto. De lo contrario, déjelo activo en beneficio del rendimiento.';
$string['configlatinexcelexport'] = 'Elegir la codificación para exportaciones en formato Excel.';
$string['configlocale'] = 'Elija una localización para el sitio (esto afectará al formato de idioma y a las fechas). Necesita tener estos datos de localización instalados en su sistema operativo (en Linux sería es_MX.UTF-8). En la mayoría de los casos o si no sabe qué elegir, debería dejarlo vacío.';
$string['configloginhttps'] = 'Esta opción hace que Moodle use una conexión https segura en la página de ingreso (proporcionando un ingreso seguro) para volver luego a la URL http normal. PRECAUCIÓN: esta opción REQUIERE que el https esté habilitado específicamente en el servidor web. En caso contrario, USTED MISMO SERÁ EXPULSADO DEL SITIO.';
$string['configloglifetime'] = 'Esta opción especifica durante cuánto tiempo desea conservar las bitácoras de actividad de cada usuario. Las bitácoras anteriores serán eliminadas. Es mejor que la cifra sea alta (por si las necesita) pero si el servidor está muy ocupado y hay problemas de funcionamiento, tal vez convenga acortar el tiempo. No se recomiendan valores menores de 30 porque en ese caso puede que las estadísticas no funcionen correctamente.';
$string['configlookahead'] = 'Días de previsión...';
$string['configmaxbytes'] = 'Esta opción especifica el tamaño máximo que deben tener los archivos subidos al sitio. Está limitada por los ajustes post_max_size y upload_max_size de  PHP y por el ajuste LimitRequestBody de Apache. A su vez, la opción limita el rango de tamaños que pueden elegirse en el nivel de curso o de módulo. Si se elige la opción \'Límite de Servidor\' se usará el máximo permitido por el servidor.';
$string['configmaxconsecutiveidentchars'] = 'Las contraseñas no deben tener más de este número de caracteres idénticos consecutivos. Utilice el 0 para deshabilitar esta comprobación.';
$string['configmaxeditingtime'] = 'Esta opción especifica cuánto tiempo tienen los usuarios para reeditar los mensajes enviados al foro, la retroalimentación del diario, etc. Normalmente 30 minutos es un valor adecuado.';
$string['configmaxevents'] = 'Eventos de previsión';
$string['configmaxusersperpage'] = 'Número máximo de usuarios mostrados dentro del selector de usuarios en curso, grupo, cohorte, servicio web, etc.';
$string['configmessaging'] = '¿Desea habilitar el sistema de mensajería entre los usuarios del sitio?';
$string['configmessagingallowemailoverride'] = 'Permitirle a los usuarios que las notificaciones por mensajes de correo electrónico se envíen a una dirección de correo diferente a la que aparece en su perfil';
$string['configmessagingdeletereadnotificationsdelay'] = 'Las notificaciones ya leídas pueden borrarse para ahorrar espacio. ¿Al cabo de cúanto tiempo después de ser leída puede borrarse?';
$string['configmessaginghidereadnotifications'] = 'Ocultar las notificaciones ya leídas, como las aportaciones a los foros, cuando esté viendo el historial de mensajes';
$string['configminpassworddigits'] = 'Las contraseñas deben tener al menos tantos dígitos.';
$string['configminpasswordlength'] = 'Las contraseñas deben tener al menos este número de caracteres.';
$string['configminpasswordlower'] = 'Las contraseñas deben tener al menos este número de minúsculas.';
$string['configminpasswordnonalphanum'] = 'Las contraseñas deben tener al menos este número de caracteres no alfanuméricos (%,$,#,.,/,=...). Tenga en cuenta que en México es frecuente que al configurar las computadoras se confunda la disposición del teclado LatinoAmericano de México con el teclado Español de España, lo que dificulta muchísimo localizar los caracteres de #,@,%,&,/,(,),=,?,¿,¡,!,",+,<,> y las letras acentuadas (à/á). El caracter especial más accesibles en ambos teclados parecería ser $  por lo que se sugiere encarecidamente recomendar el empleo del signo $ para evitar quejas.';
$string['configminpasswordupper'] = 'Las contraseñas deben tener al menos este número de MAYÚSCULAS.';
$string['configmobilecssurl'] = 'Un archivo CSS para personalizar su interfase para dispositivo móvil';
$string['configmodchooserdefault'] = '¿Debería el selector de actividades ser presentado por defecto a los usuarios?';
$string['configmycoursesperpage'] = 'Número máximo de cursos que se mostrará en cualquier lista de cursos propios de un usuario';
$string['configmymoodleredirect'] = 'Esta opción fuerza a los no administradores a dirigirse a /my al ingresar y reemplaza la navegación de nivel superior del sitio con /my';
$string['configmypagelocked'] = 'Este ajuste impide que la página por defecto sea editada por cualquiera que no sea administrador';
$string['confignavcourselimit'] = 'Limita el número de cursos mostrados al usuario cuando aún no se ha registrado o no se ha inscrito en ningún curso.';
$string['confignavshowallcourses'] = 'Esta configuración determina si es que los usuarios que están inscritos en cursos pueden ver Cursos (listado de todos los cursos) en la navegación, adicionalmente a Mis Cursos (listado de los cursos en donde ellos están inscritos).';
$string['confignavshowcategories'] = '<p>Mostrar las carreras de curso en la barra de navegación y en los bloques de navegación. </p> <p>No afecta a los cursos en los que el usuario está actualmente inscrito, de manera que todavía aparecerán en la lista \'Mis cursos\' sin carreras.</p>';
$string['confignotifyloginfailures'] = 'Si los intentos de ingreso fallidos han sido registrados, pueden enviarse notificaciones mediante correo electrónico. ¿Quién debería ver estas notificaciones?';
$string['confignotifyloginthreshold'] = 'Si las notificaciones de intentos de ingreso fallidos están activas, ¿cuántos intentos fallidos son necesarios para enviar una notificación al respecto a un usuario o a una dirección IP?';
$string['confignotloggedinroleid'] = 'Los usuarios que no están identificados en el sitio serán tratados como si tuvieran este rol en el contexto del sitio. \'Invitado\' es casi siempre lo que usted quiere aquí, pero quizás desearía crear roles que sean más o menos restrictivos. Cosas como poner mensajes requieren que el usuario se identifique (autentifique) adecuadamente';
$string['configopentogoogle'] = 'Si activa esta opción, se permitirá a Google entrar al sitio como Invitado. Además, quien acceda al sitio vía búsqueda en Google accederá automáticamente como Invitado. Note que esta opción sólo proporciona acceso transparente a los cursos que ya permiten el acceso a invitados.';
$string['configoverride'] = 'Definido en config.php';
$string['configpasswordpolicy'] = 'Si se activa esta opción, Moodle contrastará las contraseñas del usuario con especificaciones de validez de contraseñas. Use los ajustes de más abajo para fijar tales especificaciones (serán pasadas por alto si selecciona \'No\').';
$string['configpathtoclam'] = 'Ruta a clam AV. Probablemente algo parecido a /usr/bin/clamscan or /usr/bin/clamdscan. Esta ruta es necesaria para que clam AV funcione.';
$string['configpathtodu'] = 'Ruta a du (probablemente algo parecido a /usr/bin/du). Si escribe esto, las páginas que muestran el contenido del directorio se ejecutarán mucho más rápidamente cuando los directorios contengan muchos archivos.';
$string['configperfdebug'] = 'Si activa esta opción, aparecerá la información sobre el rendimiento en el pie de página del tema estándar.';
$string['configprofileroles'] = 'Lista de roles que son visibles en los perfiles de usuario y en la página de participación.';
$string['configprofilesforenrolledusersonly'] = 'Para prevenir el abuso de los creadores de spam, se ocultan las descripciones del perfil de los usuarios que aún no están inscritos en ningún curso. Los usuarios nuevos deben inscribirse en al menos un curso antes de que puedan agregar la descripción del perfil.';
$string['configprotectusernames'] = 'Por defecto, forget_password.php no muestra ninguna indicación que permita adivinar nombresdeusuario o direcciones de email.';
$string['configproxybypass'] = 'Lista separada por comas de los nombres de host (parciales) o direcciones IP que deberían saltar el proxy (por ejemplo, 192.168., .mydomain.com)';
$string['configproxyhost'] = 'Si este <b>servidor</b> necesita usar un proxy (e.g., un cortafuegos) para acceder a Internet, escriba aquí el nombre del proxy. En caso contrario, déjelo en blanco.';
$string['configproxypassword'] = 'Contraseña necesaria para acceder a internet a través del proxy; dejar vacío en caso contrario (se requiere extensión PHP cURL).';
$string['configproxyport'] = 'Si este servidor necesita usar un servidor proxy, escriba aquí el puerto del proxy.';
$string['configproxytype'] = 'Tipo de proxy web (se requiere extensión PHP5 y cURL para apoyo SOCKS5).';
$string['configproxyuser'] = 'Nombredeusuario necesario para acceder a internet a través del proxy; dejar vacío en caso contrario (se requiere extensión PHP cURL).';
$string['configquarantinedir'] = 'Si desea que clam AV traslade los archivos infectados a un directorio de cuarentena, escríbalo aquí. El directorio debe tener permiso de escritura en el servidor. Si lo deja en blanco, o si escribe un directorio inexistente o sin permiso de escritura, los archivos infectados serán destruídos. No incluya la barra final.';
$string['configrecaptchaprivatekey'] = 'Cadena de caracteres usada para comunicarse entre su servidor Moodle y el servidor recaptcha.net. Obtenga una para este sitio visitando http://recaptcha.net';
$string['configrecaptchapublickey'] = 'Cadena de caracteres usados para mostrar el elemento reCAPTCHA en el formato de acceso. Generada por http://www.google.com/recaptcha';
$string['configrequestcategoryselection'] = 'Permitir la selección de una carrera al solicitar un curso';
$string['configrequestedstudentname'] = 'Término utilizado para \'estudiante\' en los cursos solicitados';
$string['configrequestedstudentsname'] = 'Término utilizado para \'estudiantes\' en los cursos solicitados';
$string['configrequestedteachername'] = 'Término utilizado para \'profesor\' en los cursos solicitados';
$string['configrequestedteachersname'] = 'Término utilizado para \'profesores\' en los cursos solicitados';
$string['configrequiremodintro'] = 'Desactive esta opción si no quiere forzar a los usuarios a escribir la descripción de cada actividad.';
$string['configrunclamavonupload'] = 'Cuando se activa, clam AV se usará para escanear todos los archivos subidos. Esto puede detectar y limpiar virus (para Windows) de los archivos subidos por los usuarios (bueno), pero disminuye el rendimiento (malo).';
$string['configrunclamonupload'] = '¿Deberá ejecutarse clam AV cuando se sube un archivo? Para que esto funcione es necesaria una ruta correcta \'pathtoclam\'. (Clam AV es un programa antivirus gratuito que se puede bajar de http://www.clamav.net/)';
$string['configsectioninterface'] = 'Interfaz';
$string['configsectionmail'] = 'Correo electrónico';
$string['configsectionmaintenance'] = 'Mantenimiento';
$string['configsectionmisc'] = 'Misceláneo';
$string['configsectionoperatingsystem'] = 'Sistema Operativo';
$string['configsectionpermissions'] = 'Permisos';
$string['configsectionrequestedcourse'] = 'Solicitudes de cursos';
$string['configsectionsecurity'] = 'Seguridad';
$string['configsectionstats'] = 'Estadísticas';
$string['configsectionuser'] = 'Usuario';
$string['configsecureforms'] = 'Moodle puede usar un nivel adicional de seguridad cuando acepta datos provenientes de formatos web. Si la opción está activada, se contrastará la variable HTTP_REFERER del navegador con la dirección del formato actual. En muy pocos casos esto ocasiona problemas si el usuario utiliza un cortafuegos (por ejemplo: ZoneAlarm) configurado para desmontar su HTTP_REFERER del tráfico web. El síntoma consiste en quedarse \'atascado\' en un formato. Si, pongamos por caso, los usuarios tuvieran problemas con la página de ingreso, quizás conviniera desactivar la opción, aun con el riesgo de dejar el sitio más vulnerable a ataques de fuerza bruta. En caso de duda, seleccione la opción \'Sí\'.';
$string['configsessioncookie'] = 'Esta opción personaliza el nombre de la \'cookie\' usada para las sesiones de Moodle. Es opcional, y resulta útil únicamente para evitar que las \'cookies\' se confundan cuando hay más de una copia de Moodle ejecutándose en el mismo sitio web.';
$string['configsessioncookiedomain'] = 'Le permite cambiar el dominio donde están disponibles las cookies de Moodle. Es útil para la personalización de Moodle (por ejemplo, la autenticación o plugins de inscripción) que necesitan compartir información de la sesión de Moodle con una aplicación web en otro subdominio. <strong> ADVERTENCIA: se recomienda dejar este ajuste en el valor por defecto (vacío) - un valor incorrecto impedirá todos los ingresos al sitio </strong>.';
$string['configsessioncookiepath'] = 'Si necesita cambiar el lugar al que los navegadores envían las \'cookies\' de Moodle, cambie esta opción para especifirar un subdirectorio de su sitio web. En caso contrario, \'/\' por defecto funcionará correctamente..';
$string['configsessiontimeout'] = 'Si los usuarios conectados al sitio están inactivos durante mucho tiempo (sin cargar páginas), serán desconectados automáticamente (se terminará su sesión). Esta variable especifica el tiempo de inactividad antes de la desconexión.';
$string['configshowcommentscount'] = 'Mostrar el número de comentarios. Supone una consulta más cuando se muestre el enlace a los comentarios';
$string['configshowicalsource'] = 'Mostrar información acerca del orígen para los eventos de iCal';
$string['configshowsiteparticipantslist'] = 'Todos los estudiantes y profesores del sitio aparecerán en la lista de participantes. ¿Quién puede ver esa lista?';
$string['configsitedefaultlicense'] = 'Licencia predeterminada del sitio';
$string['configsitedefaultlicensehelp'] = 'Licencia predeterminada para publicar contenidos en este sitio';
$string['configsitemaxcategorydepth'] = 'Profundidad máxima de la carrera';
$string['configsitemaxcategorydepthhelp'] = 'Esta opción especifica la profundidad máxima de las carreras-hijo expandidas al mostrar las carreras o lista combo. Las carreras de nivel más profundo aparecerán como enlaces y los usuarios pueden expandirlos con solicitud AJAX.';
$string['configslasharguments'] = 'Los archivos (imágenes, archivos subidos, etc.) se proporcionan vía un script que usa \'slash arguments\'. Este método permite que los archivos sean incluídos más fácilmente en la caché de los navegadores, servidores proxy, etc. Desafortunadamente, algunos servidores PHP no permiten usar este método, de modo que si usted tiene problemas para ver archivos o imágenes subidas al servidor (por ejemplo: fotografías de los usuarios), deshabilite este ajuste.';
$string['configsmartpix'] = 'Cuando se activa, los inconos se sirven a través de un script PHP que busca el tema gráfico actual, luego todos los temas padre, luego la carpeta /pix de Moodle. Esto reduce la necesidad de duplicar archivos de imágenes dentro de los temas, pero tiene un pequeño costo de rendimiento.';
$string['configstartwday'] = 'Día en que comienza la semana';
$string['configstatsfirstrun'] = 'Esta opción especifica el momento a partir del cual deberían procesarse las bitácoras <b>la primera vez</b> que el cronjob procesa las estadísticas. Si el sitio tiene mucho tráfico y el servidor es compartido, probablemente no sea una buena idea comenzar demasiado pronto, puesto que se tardará mucho tiempo y se consumirán muchos recursos. (Nótese que en esta opción 1 mes equivale a 28 días, en tanto que en los gráficos e informes generados, 1 mes equivale a 1 mes de calendario).';
$string['configstatsmaxruntime'] = 'El procesamiento estadístico puede ser muy intenso, de modo que conviene combinar este campo y el siguiente para especificar cuándo y durante cuánto tiempo funcionará.';
$string['configstatsmaxruntime2'] = 'El procesamiento de datos estadísticos puede ser muy intenso. Especifique el tiempo máximo permitido para recopilar las estadísticas de un día. El número máximo de días procesados en una ejecución del cron es de 31.';
$string['configstatsmaxruntime3'] = 'Especifique el tiempo máximo permitido para calcular las estadísticas de un día, teniendo en cuenta que el procesamiento de datos estadísticos supone una gran carga para el servidor. El número máximo de días procesados en un trabajo de cron puede especificarse más abajo.';
$string['configstatsruntimedays'] = 'Especifique el número máximo de días procesados en cada ejecución de análisis de datos estadísticos. Una vez que las estadísticas estén actualizadas, sólo se procesará un día, de modo que deberá ajustar este valor dependiendo de la carga de su servidor, reduciéndolo si se necesitan ejecuciones más cortas del cron.';
$string['configstatsruntimestart'] = '¿En qué momento comenzará a trabajar el cronjob que procesa las estadísticas? Por favor, especifique distintas horas si existen varios sitios  Moodle en el mismo servidor físico.';
$string['configstatsuserthreshold'] = 'Este ajuste especifica el número mínimo de usuarios inscritos en un curso para que este valor sea incluido en los cálculos de las estadísticas.';
$string['configstrictformsrequired'] = 'Si está activado, se impide a los usuarios introducir un espacio en blanco o un salto de línea en los campos obligatorios de los formatos.';
$string['configstripalltitletags'] = 'Desactive esta opción para permitir marcas HTML en los nombres de actividades y recursos.';
$string['configsupportemail'] = 'Esta dirección email se publicará a los usuarios del sitio como aquella a la que deberán dirigirse cuando necesiten ayuda de tipo general (por ejemplo, cuando un usuario nuevo crea su propia cuenta). Si se deja en blanco, no se dispondrá de una dirección de ayuda del tipo mencionado.';
$string['configsupportname'] = 'Este es el nombre de una persona u otra entidad  que ofrece ayuda general por medio de una dirección email o una página web.';
$string['configsupportpage'] = 'Esta dirección email se publicará a los usuarios del sitio como aquella a la que deberán dirigirse cuando necesiten ayuda de tipo general (por ejemplo, cuando un usuario nuevo crea su propia cuenta). Si se deja en blanco, no se suministrará el enlace correspondiente.';
$string['configthemedesignermode'] = 'Habitualmente todas las imágenes del tema y hojas de estilo se almacenan en caché en los navegadores y en el servidor durante un tiempo muy largo, para mejorar el rendimiento. Si va a rediseñar los temas o desarrollar código, es probable que desee activar este modo para que no se guarden versiones en la caché. Advertencia: esto hará que su sitio sea más lento para todos los usuarios mientras esté activado. Opcionalmente también puede restablecer la caché manualmente desde la página del selector de temas.';
$string['configthemelist'] = 'Deje esta opción en blanco para permitir que se utilice cualquier tema gráfico válido. Si quiere acortar el menú de temas, puede especificar una lista de nombres separados por comas. Por ejemplo: standard,orangewhite';
$string['configtimezone'] = 'Aquí puede fijar la zona horaria por defecto. Ésta es la única zona horaria POR DEFECTO para mostrar fechas -aunque cada usuario puede modificar esto en su perfil-. La "Hora del Servidor" aquí hará que Moodle tome por defecto la hora del sistema operativo  del servidor (Linux/Windows), pero la opción de "Hora del servidor" en el perfil del usuario lo ajustará a ESTA zona horaria. La ejecución del "Cron" que dependa de una hora del día empleará esta zona horaria para decidir.

Es muy importante que tome en cuenta que México tiene un horario de verano (del primer domingo de abril al último domingo de octubre)  diferente al de Estados Unidos (del segundo domingo de marzo al primer domingo de noviembre) y con frecuencia los servidores LINUX y WINDOWS se confunden y modifican el reloj de Moodle en las fechas equivocadas. En estos casos, la solución menos complicada para arreglar la hora del sitio Moodle EN MÉXICO es ajustar ESTE VALOR AQUI (empiece con valores de UTC-6 en invierno y UTC-5 en verano y disminuya o aumente de uno en uno hasta que funcione). El estado de Sonora no tiene horario de verano, similar a su vecino del norte, Arizona.

Los estados de Sinaloa, Chihuahua y Baja California Sur tienen una hora más tarde, Baja California Norte dos horas más tarde.

La hora oficial en México está definida en http://www.cenam.mx/hora_oficial/';
$string['configuseblogassociations'] = '¿Deberían los usuarios poder organizar su blog asociando entradas con los cursos y con los módulos de curso?';
$string['configuseexternalyui'] = 'En lugar de usar archivos locales, usar archivos disponibles en línea en servidores Yahoo&#145;s. ADVERTENCIA: Esto requiere una conexión de internet; de otro modo, AJAX no funcionará en el sitio.';
$string['configuserquota'] = 'El número máximo de bytes que un usuario puede almacenar en sus carpetas de archivos privados.{$a->bytes} bytes == {$a->displaysize}';
$string['configusesitenameforsitepages'] = 'Si está habilitado se utilizará el nombre corto del sitio en lugar de la cadena de texto \'páginas del sitio\' en la navegación por las páginas del sitio';
$string['configusetags'] = '¿Habilitar la funcionalidad de marcas (tags) para todo el sitio? (por ejemplo: intereses en perfil de usuario). Esto puede ser muy útil para promover socialización, o peligroso si tiene usuarios muy traviesos o irreverentes...';
$string['configvariables'] = 'Variables';
$string['configverifychangedemail'] = 'Habilita la verificación de direcciones de email cambiadas usando ajustes de dominios de correo electrónico permitidos y denegados. Si esta opción está deshabilitada, los dominios se fuerzan sólo cuando se crean usuarios nuevos.';
$string['configvisiblecourses'] = 'Mostrar normalmente los cursos de carreras ocultas';
$string['configwarning'] = 'Sea cuidadoso al modificar estos resultados (valores extraños pueden ocasionar problemas).';
$string['configyuicomboloading'] = 'Esta opción permite la optimización de carga de archivos de bibliotecas YUI. Esta opción debe estar habilitada en los centros de producción por razones de rendimiento.';
$string['confirmation'] = 'Confirmación';
$string['confirmdeletecomments'] = 'Está a punto de eliminar comentarios, ¿está seguro?';
$string['confirmed'] = 'Confirmado';
$string['convertformat'] = '<i>convertir</i> formato de salida';
$string['cookiehttponly'] = 'Sólo \'cookies\' http';
$string['cookiesecure'] = 'Sólo \'cookies\' seguras';
$string['country'] = 'País por defecto';
$string['coursecontact'] = 'Responsables (contactos) del curso';
$string['coursecontact_desc'] = 'Esta opción le permite controlar quién aparece en la descripción del curso. Los usuarios deben tener al menos uno de estos roles en un curso a fin de poder mostrarlos en la descripción de ese curso.';
$string['courselistshortnames'] = 'Mostrar nombres extendidos de cursos';
$string['courselistshortnames_desc'] = 'Si se habilita, se mostrarán tanto el nombre corto del curso como el nombre completo en las listas de cursos. Si se requiere, los nombres extendidos del curso pueden personalizarse al editar  la cadena de texto de idioma \'courseextendednamedisplay\' , mediante la personalización del idioma.';
$string['coursemgmt'] = 'Agregar/editar cursos';
$string['courseoverview'] = 'Visión general del curso';
$string['courserequestnotify'] = 'Notificación de solicitud de curso';
$string['courserequestnotifyemail'] = 'El usuario {$a->user} ha solicitado un nuevo curso en {$a->link}';
$string['courserequests'] = 'Solicitudes de cursos';
$string['courserequestspending'] = 'Solicitudes de curso pendientes';
$string['courses'] = 'Cursos';
$string['coursesperpage'] = 'Cursos por página';
$string['courseswithsummarieslimit'] = 'Cursos con límite de resúmenes';
$string['creatornewroleid'] = 'Rol de los creadores en cursos nuevos';
$string['creatornewroleid_help'] = 'Si el usuario no tiene aún permiso para administrar el nuevo curso, el usuario es inscrito automáticamente utilizando este rol.';
$string['cron'] = 'Cron';
$string['cronclionly'] = 'Ejecución de cron sólo mediante comandos';
$string['cronerrorclionly'] = 'Lo sentimos, el acceso por internet a esta página ha sido desactivado por el administrador.';
$string['cronerrorpassword'] = 'Lo sentimos, no ha introducido una contraseña válida para acceder a esta página';
$string['cron_help'] = 'El script de mantenimiento cron.php es requerido por algunos de los módulos de Moodle para realizar tareas de forma programada tales como enviar por correo la copia de los nuevos mensajes de los foros. Es necesario ejecutar, mediante algún mecanismo programado, la secuencia de comandos que ejecute la acción de cron.php periódicamente, por ejemplo cada 5 minutos. Una configuración razonable para un sitio mediano podría ser cada 50 minutos.';
$string['cronremotepassword'] = 'Contraseña de cron para acceso remoto';
$string['cronwarning'] = 'El script de mantenimiento del <a href="cron.php">cron.php </a> no ha sido ejecutado durante las últimas 24 horas.';
$string['ctyperecommended'] = 'Es muy recomendable instalar la extensión opcional ctype de PHP con el fin de mejorar el rendimiento del sitio, en especial si el sitio incluye idiomas no latinos.';
$string['ctyperequired'] = 'Con el fin de mejorar el rendimiento del sitio y ofrecer compatibilidad multilingüe, Moodle requiere la extensión ctype de PHP.';
$string['curlcache'] = 'cURL caché TTL';
$string['curlrecommended'] = 'Se recomienda instalar la librería opcional cURL a fin de posibilitar la funcionalidad de la Red Moodle.';
$string['curlrequired'] = 'La extensión cURL PHP ahora es requerida por Moodle con el fin de comunicarse con los repositorios de Moodle.';
$string['curltimeoutkbitrate'] = 'Bitrate (en Kbps) a emplear cuando se calcula tiempo cURL';
$string['curltimeoutkbitrate_help'] = 'Esta configuración se usa para calcular un tiempo (timeout) apropiado en solicitudes cURL grandes. Como parte del cálculo, se hace una solicitud HTTP HEAD para determinar el tamaño del contenido. El ponerlo a 0 desabilita esta solicitud.';
$string['currenttheme'] = 'Tema actual';
$string['customcheck'] = 'Otras comprobaciones';
$string['custommenu'] = 'Menú personalizado';
$string['custommenuitems'] = 'Ítems del menú personalizado';
$string['datarootsecurityerror'] = '<p><strong>¡ADVERTENCIA DE SEGURIDAD!</strong></p><p>Su directorio dataroot está en una ubicación errónea y está expuesto a la web. Esto significa que cualquiera desde cualquier lugar puede acceder a todos sus archivos privados y que algunos de ellos podrían ser usados por un cracker para obtener acceso no autorizado al sitio.</p>
<p>Usted <em>debe</em> cambiar el directorio dataroot ({$a}) a una nueva ubicación fuera de su directorio web público y actualizar el correspondiente ajuste de <code>$CFG->dataroot</code> en su config.php.</p>';
$string['datarootsecuritywarning'] = 'La configuración de su sitio podría no ser segura. Por favor, asegúrese de que su directorio raíz ({$a}) no es accesible directamente vía web.';
$string['dbmigrate'] = 'Migración a Base de Datos de Moodle';
$string['dbmigrateconnecerror'] = 'No se ha podido conectar a la base de datos especificada';
$string['dbmigrateencodingerror'] = 'La base de datos especificada tiene una codificación {$a} en lugar de UNICODE/UTF8.<br /> Por favor, especifique otra.';
$string['dbmigratepostgres'] = 'Parece que usted está utilizando PostgreSAL como servidor de base de datos. Para continuar el proceso de migración, necesita crear manualmente una nueva base de datos con codificación "UNICODE"(PostgreSQL 7) o "UTF8" (PostgreSQL 8) para almacenar los datos migrados. Por favor, introduzca los ajustes de su conexión a la nueva base de datos para continuar:';
$string['dbmigratewarning'] = 'Por favor, asegúrese de que ha hecho una copia de la base de datos de Moodle antes de comenzar este procedimiento. Si no está seguro de cómo hacerlo, contacte con el administrador del sistema. Su sitio Moodle será puesto en modo de mantenimiento una vez que comience el proceso de migración.';
$string['dbmigratewarning2'] = '<b>ADVERTENCIA: Está a punto de comenzar el proceso de migración de la base de datos. Por favor, asegúrese de que que se ha hecho una copia de toda la base de datos de Moodle.</b>';
$string['dbmigrationdeprecateddb'] = '<font color="#ff0000">Esta base de datos ha migrado a una nueva base de datos UTF8. Por favor, edite el archivo config.php y utilice la nueva base de datos con este Moodle.</font>';
$string['dbmigrationdupfailed'] = 'Ha fallado la duplicación de la base de datos debido a este posible error:<font color="#ff0000"><pre>{$a}</pre></font>';
$string['dbsessions'] = 'Usar la base de datos para información de la sesión';
$string['debug'] = 'Mensajes de depuración';
$string['debugall'] = 'TODOS: Mostrar todos los mensajes razonables de depuración PHP';
$string['debugdeveloper'] = 'DESARROLLADOR: mensajes extra de depuración Moodle para desarrolladores';
$string['debugdisplay'] = 'Mostrar mensajes de depuración';
$string['debugging'] = 'Depuración (debugging)';
$string['debugminimal'] = 'MÍNIMO: Mostrar sólo errores fatales';
$string['debugnone'] = 'NINGUNO: No mostrar errores ni advertencias';
$string['debugnormal'] = 'NORMAL: Mostrar errores, advertencias y avisos';
$string['debugpageinfo'] = 'Mostrar información de la página';
$string['debugsmtp'] = 'Depurar envío de emails';
$string['debugstringids'] = 'Mostrar el origen de las cadenas de idiomas';
$string['debugstringids_desc'] = 'Esta opción está diseñada para ayudar a los traductores. Cuando esta opción está activada, si se agrega el parámetro strings =1 para una petición de URL, se mostrará el archivo de idioma y el identificador de cadena al lado de cada cadena que se emite.';
$string['debugvalidators'] = 'Mostrar enlaces de validación';
$string['defaultcity'] = 'Ciudad por defecto';
$string['defaultcity_help'] = 'La ciudad introducida aquí será la ciudad por defecto al crear nuevas cuentas de usuario.';
$string['defaultformatnotset'] = 'Error al determinar el formato por defecto del curso. Por favor revise las configuraciones del sitio.';
$string['defaulthomepage'] = 'Página de inicio predeterminada para los usuarios';
$string['defaultrequestcategory'] = 'Carrera por defecto de las solicitudes de curso';
$string['defaultsettinginfo'] = 'Valor por defecto: {$a}';
$string['defaultuserroleid'] = 'Rol por defecto de todos los usuarios';
$string['deletefilterareyousure'] = '¿Está seguro que desea eliminar el filtro \'{$a}\'';
$string['deletefilterareyousuremessage'] = 'Usted está a punto de eliminar por completo el filtro \'{$a}\'. ¿Desea continuar?';
$string['deletefilterfiles'] = 'Todos los datos relacionados con el filtro \'{$a-> filter}\' han sido borrados de la base de datos. Para completar la eliminación (y para evitar que el filtro se reinstale por si mismo), debería eliminar ahora mismo este directorio del servidor: {$a->directory}';
$string['deleteincompleteusers'] = 'Eliminar usuarios incompletos después de';
$string['deleteunconfirmed'] = 'Eliminar usuarios no confirmados después de';
$string['deleteuser'] = 'Eliminar usuario';
$string['deletingfilter'] = 'Eliminando filtro \'{$a} \'';
$string['density'] = 'Densidad';
$string['denyemailaddresses'] = 'Dominios de email denegados';
$string['development'] = 'Desarrollo';
$string['devicedetectregex'] = 'Expresiones regulares para la detección de dispositivos';
$string['devicedetectregex_desc'] = '<p>Por defecto Moodle puede detectar dispositivos del tipo \'por defecto\' (PC de escritorio, PC portátil, etc.) dispositivos móviles (teléfonos y pequeños dispositivos como PDAs), tabletas (iPads, tabletas Android) y \'heredados\' (usuarios de Internet Explorer 6). Se puede usar el selector de temas para aplicar temas diferentes a cada uno de ellos. Este ajuste admite expresiones regulares que permiten detectar tipos de dispositivos extra (éstos tienen precedencia sobre los tipos por defecto).</p><p>Por ejemplo, podría introducir la expresión regular \'/(MIDP-1.0|Maemo|Windows CE)/\' para detectar algunos teléfonos usados habitualmente con determinada característica y añadir el valor \'telefonocaracteristica\'. Esto añade \'telefonocaracteristica\' en el selector de temas, lo que permite añadir un tema para usarse con estos dispositivos. El resto de teléfonos seguirán usando el tema seleccionado para los tipos de dispositivos móviles.</p>';
$string['devicedetectregexexpression'] = 'Expresión regular';
$string['devicedetectregexvalue'] = 'Valor devuelto';
$string['devicetype'] = 'Tipo de dispositivo';
$string['disableuserimages'] = 'Desactivar imágenes en el perfil del usuario';
$string['displayerrorswarning'] = 'No se recomienda habilitar el ajuste PHP <em>display_errors</em> en sitios en producción debido a que algunos mensajes de error pueden revelar información sensible sobre su servidor.';
$string['displayloginfailures'] = 'Mostrar intentos de ingreso fallidos a';
$string['dndallowtextandlinks'] = 'Subir texto/enlaces mediante "Arrastrar y Soltar"';
$string['docroot'] = 'Raíz de Moodle Docs';
$string['doctonewwindow'] = 'Abrir en nueva ventana';
$string['download'] = 'Descargar';
$string['edithelpdocs'] = 'Editar documentos de ayuda';
$string['editingnoncorelangfile'] = 'Está intentando modificar la traducción de un módulo/plugin añadido. Puede guardar la traducción de módulos de terceras partes sólo en su carpeta local. Quizás quiera mover el archivo con la traducción al directorio lang del módulo y/o enviarlo al mantenedor del módulo.';
$string['editlang'] = '<b>Edición</b>';
$string['editorbackgroundcolor'] = 'Color del fondo';
$string['editordictionary'] = 'Diccionario del editor';
$string['editorfontfamily'] = 'Familia de tipos de letra (fonts)';
$string['editorfontlist'] = 'Lista de tipos de letra (fonts)';
$string['editorfontsize'] = 'Tamaño del tipo de letra (font) por defecto';
$string['editorhidebuttons'] = 'Botones ocultos';
$string['editorkillword'] = 'Filtro formato Word';
$string['editorspelling'] = 'Corrector de ortografía editor';
$string['editorspellinghelp'] = 'Activar o desactivar corrector de ortografía. Cuando está activado, el <strong>aspell</strong> debe estar instalado en el servidor.';
$string['editstrings'] = 'Editar palabras o frases';
$string['emailchangeconfirmation'] = 'Confirmación de cambio de email';
$string['emoticonalt'] = 'Texto alternativo';
$string['emoticoncomponent'] = 'Componente de imagen';
$string['emoticonimagename'] = 'Nombre de la imagen';
$string['emoticons'] = 'Emoticones';
$string['emoticons_desc'] = 'Este formato define los \'emoticons\' (o iconos gestuales o \'caritas\') usados en su sitio.

Para eliminar una fila de la tabla, guarde el formato con un valor vacío en cualquiera de los campos obligatorios.

Para registrar un nuevo \'emoticon\', rellene los campos de la última fila en blanco.

Para restablecer todos los campos en los valores predeterminados, siga el enlace de arriba.

* Texto (obligatorio) - Este texto será reemplazado por la imagen de icono gestual. Debe haber al menos dos caracteres de longitud.

* Nombre de la imagen (obligatorio) - El nombre del archivo de imagen del icono gestual sin la extensión, como en la carpeta de componentes pix.

* Componente de imagen (obligatorio) - El componente que proporciona el ícono.

* Texto alternativo (opcional) - identificador de cadena y los componentes del texto alternativo de los iconos gestuales.';
$string['emoticonsreset'] = 'Reconfigurar los emoticonos a los valores predeterminados';
$string['emoticontext'] = 'Texto';
$string['emptysettingvalue'] = 'Vacío';
$string['enableajax'] = 'Habilitar AJAX';
$string['enableblogs'] = 'Habilitar blogs';
$string['enablecalendarexport'] = 'Habilitar exportación de calendario';
$string['enablecomments'] = 'Habilitar comentarios';
$string['enablecourserequests'] = 'Habilitar solicitudes de curso';
$string['enablecssoptimiser'] = 'Habilitar el optimizador de CSS';
$string['enablecssoptimiser_desc'] = 'Cuando se habilita, CSS se someterá a un proceso de optimización antes de ser cacheado. El optimizador procesa el CSS y remueve las reglas y estilos duplicados, y también los espacios en blanco que pueden ser removidos y reformatea. Por favor tenga en cuenta que habilitar esto al mismo tiempo que se habilita el modo de diseñador de temas gráficos es pesadísimo para el rendimiento, pero le ayudará a los diseñadores de temas gráficos para crear CSS optimizado.';
$string['enabledevicedetection'] = 'Habilitar detección de dispositivos';
$string['enablegravatar'] = 'Activar Gravatar';
$string['enablegravatar_help'] = 'Cuando se habilita Moodle intentará buscar una imagen de perfil de usuario desde Gravatar si el usuario no ha subido una imagen';
$string['enablegroupmembersonly'] = 'Habilitar solo miembros de grupo';
$string['enablemobilewebservice'] = 'Habilitar servicio web para dispositivos móviles';
$string['enablerecordcache'] = 'Habilitar caché de registro';
$string['enablerssfeeds'] = 'Habilitar canales RSS';
$string['enablesafebrowserintegration'] = 'Habilitar integración con Safe Exam Browser';
$string['enablestats'] = 'Habilitar estadísticas';
$string['enabletrusttext'] = 'Habilitar contenido confiable';
$string['enablewebservices'] = 'Habilitar servicios web';
$string['enablewsdocumentation'] = 'Documentación de servicios web';
$string['enrolinstancedefaults'] = 'Valores predeterminados de instancias de inscripción';
$string['enrolinstancedefaults_desc'] = 'Ajustes predeterminados de inscripción en nuevos cursos.';
$string['enrolmultipleusers'] = 'Inscribir a los usuarios';
$string['environment'] = 'Entorno';
$string['environmenterrortodo'] = 'Debe resolver todos los problemas de entorno (errores) encontrados arriba antes de proceder a instalar esta versión de Moodle';
$string['environmenterrorupgrade'] = 'Advertencia: ¡Debería resolver todos los problemas de entorno (errores) encontrados antes de proceder con la actualización de esta versión de Moodle! Actualizar sin arreglar estos requerimientos podría causar problemas como pérdida de datos. ¿Está seguro que desea continuar con la actualización?';
$string['environmentmustfixsetting'] = 'El ajuste PHP debe cambiarse.';
$string['environmentok'] = 'Su entorno de servidor cumple todos los requerimientos mínimos.';
$string['environmentrecommendcustomcheck'] = 'Si esta comprobación falla, ello indica un problema potencial';
$string['environmentrecommendinstall'] = 'debería estar instalado y activado para conseguir los mejores resultados';
$string['environmentrecommendversion'] = 'versión {$a->needed} es recomendada y está ejecutando {$a->current}';
$string['environmentrequirecustomcheck'] = 'esta prueba debe pasar';
$string['environmentrequireinstall'] = 'debe estar instalado y activado';
$string['environmentrequireversion'] = 'versión {$a->needed} es obligatoria y está ejecutando {$a->current}';
$string['environmentsettingok'] = 'detectado ajuste recomendado';
$string['environmentshouldfixsetting'] = 'El ajuste PHP debe cambiarse.';
$string['environmentxmlerror'] = 'Error leyendo la información sobre el entorno ({$a->error_code})';
$string['errordeletingconfig'] = 'Ha ocurrido un error al eliminar los registros de configuración del plugin \'{$a}\'.';
$string['errorsetting'] = 'No pudo guardarse el ajuste:';
$string['errorwithsettings'] = 'Algunos ajustes no se han cambiado debido a un error:';
$string['everyonewhocan'] = 'Todos los que puedan \'{$a}\'';
$string['exceptions'] = 'excepciones';
$string['execpathnotallowed'] = 'La configuración de rutas a ejecutables está deshabilitada en config.php';
$string['experimental'] = 'Experimental';
$string['experimentalsettings'] = 'Configuraciones experimentales';
$string['extendedusernamechars'] = 'Permitir caracteres extendidos en nombredeusuario';
$string['extramemorylimit'] = 'Límite de memoria de PHP extra';
$string['fatalmagicquotesruntime'] = '<p>Se ha detectado un error de configuración grave; por favor notifique al administrador del servidor. </p><p>Para que funcione correctamente, Moodle requiere que el administrador cambie la configuración de PHP. </p><p> <code> magic_quotes_runtime </code> debe establecerse en <code>off </code>. </p> <p>Esta configuración se controla editando <code> php.ini </code>, la configuración de Apache/IIS <br /> o el archivo <code>. htaccess </code> en el servidor. </p>';
$string['fatalsessionautostart'] = '<p>Se ha detectado un error de configuración grave; por favor notifique al administrador del servidor. </p><p>Para que funcione correctamente, Moodle requiere que el administrador cambie la configuración de PHP. </p><p> <code> session.auto_start </code> debe establecerse en <code>off </code>. </p> <p>Esta configuración se controla editando <code> php.ini </code>, la configuración de Apache/IIS <br /> o el archivo <code>. htaccess </code> en el servidor. </p>';
$string['filecreated'] = 'Archivo nuevo creado';
$string['filestoredin'] = 'Guardar archivo en la carpeta:';
$string['filestoredinhelp'] = 'Dónde se almacenará el archivo';
$string['filterall'] = 'Filtrar todas las cadenas';
$string['filtermatchoneperpage'] = 'Filtrar una coincidencia por página';
$string['filtermatchonepertext'] = 'Filtrar una coincidencia por texto';
$string['filters'] = 'Filtros';
$string['filtersettings'] = 'Gestionar filtros';
$string['filtersettingsgeneral'] = 'Ajustes generales de filtro';
$string['filteruploadedfiles'] = 'Filtrar archivos subidos';
$string['forcelogin'] = 'Forzar a los usuarios a ingresar';
$string['forceloginforprofileimage'] = 'Forzar a los usuarios a ingresar para ver imágenes de usuarios';
$string['forceloginforprofileimage_help'] = 'Si se habilita, los usuarios deben ingresar para ver las imágenes del perfil y la imágen por defecto de usuario será empleada en todos los correos electrónicos de notificación';
$string['forceloginforprofiles'] = 'Forzar a los usuarios a ingresar para ver los perfiles';
$string['forcetimezone'] = 'Forzar zona horaria por defecto';
$string['formatuninstallconfirm'] = '{$a} será desinstalado. Ningún curso lo usa actualmente. ¿Desea continuar?';
$string['formatuninstalled'] = 'Todos los datos asociados con el plugin de formato \'{$a->plugin}\' han sido borrados de la base de datos. Para completar la eliminación (y prevenir que el plugin se re-instale a sí mismo), Usted debería de eliminar este directorio de su servidor: {$a->directorio}';
$string['formatuninstallwithcourses'] = 'Hay {$a->count} cursos que usan {$a->format}. Sus formatos serán cambiados a {$a->defaultformat} (el formato por defecto para este sitio). Algunos datos específicos de este formato se pueden perder. ¿Está Usted seguro de querer hacerlo?';
$string['frontpage'] = 'Portada';
$string['frontpagebackup'] = 'Respaldo de la portada';
$string['frontpagedefaultrole'] = 'Rol por defecto en la portada';
$string['frontpagefilters'] = 'Filtros de la portada';
$string['frontpageloggedin'] = 'Elementos de la portada al entrar al sitio';
$string['frontpageoverrides'] = 'Anulaciones de permisos en la portada';
$string['frontpagequestions'] = 'Preguntas de la portada';
$string['frontpagerestore'] = 'Restauración de la portada';
$string['frontpageroles'] = 'Roles de la portada';
$string['frontpagesettings'] = 'Ajustes de la portada';
$string['fullnamedisplay'] = 'Formato de nombre completo';
$string['gdrecommended'] = 'La extensión GD se utiliza para la conversión de imágenes, algunas características tales como las imágenes de perfil de usuario no estará disponible si faltan.';
$string['gdrequired'] = 'La extensión GD actualmente es requerida por Moodle para la conversión de imágenes.';
$string['generalsettings'] = 'Ajustes generales';
$string['geoipfile'] = 'Archivo de datos de ciudades de GeoIP';
$string['getremoteaddrconf'] = 'Fuente de direcciones IP registradas';
$string['globalsquoteswarning'] = '<p><strong>Advertencia de seguridad</strong>: para funcionar adecuadamente, Moodle requiere<br />llevar a cabo ciertos cambios en los ajustes de PHP.<p/><p>Usted <em>debe</em> ajustar <code>register_globals=off</code> y/o <code>magic_quotes_gpc=on</code>. <br />Si fuera posible, debería ajustar <code>register_globals=off</code> para mejorar la seguridad <br /> general del servidor, el ajuste <code>magic_quotes_gpc=on</code> es asimismo recomendable.<p/><p>Estos ajustes se realizan editando el archivo <code>php.ini</code>, la configuración de <br />Apache/IIS o el archivo <code>.htaccess</code>.</p>';
$string['globalswarning'] = '<p><strong>¡ADVERTENCIA DE SEGURIDAD!</strong>: para funcionar adecuadamente, Moodle requiere <br />que realice algunos cambios en los ajustes PHP actuales.<p/><p>Usted <em>debe</em> ajustar <code>register_globals=off</code>.<p>Esta opción se ajusta editando el archivo <code>php.ini</code>, la configuración de Apache/IIS <br />o <code>.htaccess</code>.</p>';
$string['googlemapkey3'] = 'Clave de Google Maps API V3';
$string['googlemapkey3_help'] = 'Necesita introducir una clave especial para utilizar Google Maps para visualizar la búsqueda de la dirección IP. Puede obtener dicha clave gratuitamente en <a href="https://developers.google.com/maps/documentation/javascript/tutorial#api_key" target="_blank">https://developers.google.com/maps/documentation/javascript/tutorial#api_key</a>';
$string['gotofirst'] = 'Ir a la primera cadena ausente';
$string['gradebook'] = 'Libro de calificaciones';
$string['gradebookroles'] = 'Roles calificados';
$string['gradeexport'] = 'Principales métodos de exportación de calificaciones';
$string['gravatardefaulturl'] = 'URL imagen Gravatar por defecto';
$string['gravatardefaulturl_help'] = 'Gravatar requiere una imagen por defecto para mostrar en caso que no encontrara una imagen para un usuario dado. Proporcione la URL completa para una imagen. Si deja vacío este campo, Moodle intentará usar la imagen por defecto más apropiada para la página que está viendo. Observe también que Gravatar tiene un número de códigos que pueden usarse para  <a href="https://en.gravatar.com/site/implement/images/#default-image">generar imágenes por defecto</a>.';
$string['groupenrolmentkeypolicy'] = 'Política de inscripción de grupos';
$string['groupenrolmentkeypolicy_desc'] = 'Activando esta opción hará que Moodle compruebe que la clave de inscripción de grupo cumple la política de claves de acceso válidas.';
$string['guestroleid'] = 'Rol para invitado';
$string['guestroleid_help'] = 'Este rol se le asigna automáticamente a los invitados. También se asigna, temporalmente, por medio del plugin de inscripción de invitados a los usuarios que no están inscritos en un curso.';
$string['helpadminseesall'] = '¿Pueden los administradores ver todos los eventos del calendario o sólo los que les conciernen?';
$string['helpcalendarcustomexport'] = 'Habilitar exportación de rango de fechas personalizado de  calendario. Las exportaciones de calendario deben habilitarse antes de que esto funcione.';
$string['helpcalendarsettings'] = 'Configurar varios aspectos de Moodle relacionados con el calendario y con fechas';
$string['helpexportlookahead'] = '¿Con cuantos días de anticipación deben buscarse eventos en el calendario durante la exportación para la opción de exportación personalizada?';
$string['helpexportlookback'] = '¿Con cuantos días en el pasado deben buscarse eventos en el calendario durante la exportación para la opción de exportación personalizada?';
$string['helpforcetimezone'] = 'Puede permitir que los usuarios seleccionen su zona horaria, o forzarla para todos.';
$string['helpshowicalsource'] = 'Habilite esta configuración si quiere mostrar el nombre de la suscripción a iCal y el enlace para eventos importados de iCal.';
$string['helpsitemaintenance'] = 'Para actualizaciones y otras tareas. Si se habilita, su sitio Moodle sólo será accesible para los administradores.';
$string['helpstartofweek'] = '¿Qué día comienza la semana?';
$string['helpupcominglookahead'] = '¿Cuántos días debe considerar el calendario por defecto para eventos próximos?';
$string['helpupcomingmaxevents'] = '¿Cuántos eventos próximos se mostrarán como máximo a los usuarios?';
$string['helpweekenddays'] = '¿Cuántos días de la semana se considerarán como \'fin de semana\' y se mostrarán con un color diferente?';
$string['hiddenuserfields'] = 'Ocultar campos de usuario';
$string['hidefromall'] = 'Ocultar a todos los usuarios';
$string['hidefromnone'] = 'No ocultar a nadie';
$string['hidefromstudents'] = 'Ocultar a estudiantes';
$string['htmleditor'] = 'Editor HTML';
$string['htmleditorsettings'] = 'Ajustes del editor HTML';
$string['htmlsettings'] = 'Ajustes HTML';
$string['http'] = 'HTTP';
$string['httpsecurity'] = 'Seguridad HTTP';
$string['hubs'] = 'Hubs';
$string['iconvrecommended'] = 'La instalación de la librería opcional ICONV es muy recomendable para mejorar el rendimiento del sitio, especialmente si su sitio está soportando idiomas no latinos.';
$string['iconvrequired'] = 'Es necesario instalar la extensión ICONV';
$string['ignore'] = 'Ignorar';
$string['includemoduleuserdata'] = 'Incluir datos del usuario del módulo';
$string['incompatibleblocks'] = 'Bloques imcompatibles';
$string['installhijacked'] = 'La instalación debe finalizarse desde la misma dirección IP original';
$string['installsessionerror'] = 'No se puede inicializar sesión de PHP, por favor, verifique que su navegador acepta \'cookies\'.';
$string['intlrecommended'] = 'La extensión internacional se utiliza para mejorar el soporte a la internacionalización, como en el caso de la ordenación de localidades.';
$string['invalidsection'] = 'Sección no válida.';
$string['invaliduserchangeme'] = 'El nombredeusuario "changeme" es reservado: no puede crear una cuenta con ese nombre.';
$string['ipblocked'] = 'Actualmente este sitio no está disponible.';
$string['ipblocker'] = 'Bloqueador de IP';
$string['ipblockersyntax'] = 'Ponga cada entrada en una sola línea. Son entradas válidas cada una de las siguientes:

 <br> * direcciones IP completas (como <B>192.168.10.1</B> ) que coinciden con un solo host <br>

 * las direcciones parciales (como <B>192.168 .</B>), que coinciden con cualquier dirección que comienza con estos números <br>

 * las notación CIDR (por ejemplo, <B>231.54.211.0/20</B>) <br>

 * los rangos de direcciones IP (como <B>231.3.56.10-20</B>) donde el rango se aplica a la última parte de la dirección <br>

Los nombres de dominio (como \'ejemplo.com\') no son compatibles.

Las líneas en blanco se ignoran.';
$string['iplookup'] = 'Búsqueda de dirección IP';
$string['iplookupgeoplugin'] = 'El servicio <a href="http://www.geoplugin.com">geoPlugin</a> se emplea actualmente para buscar información geográfica. Para tener resultados más exactos, le recomendamos instalar una copia local de la base de datos MaxMind GeoLite.';
$string['iplookupinfo'] = 'Por defecto Moodle utiliza el servidor gratuito en línea NetGeo (The Internet Geographic Database) para buscar la ubicación de las direcciones IP. Desafortunadamente, ha cesado el mantenimiento de esta base de datos, y puede devolver información <em>totalmente errónea</em>.
Se recomienda instalar una copia local de la base de datos GeoLite City, desde MaxMind.<br />
La ubicación de la dirección IP se muestra en un mapa simple, o usando Google Maps. Para activar los mapas interactivos necesita tener una cuenta Google y aplicar la clave API de Google Maps.';
$string['iplookupmaxmindnote'] = 'Este producto incluye los datos GeoLite creados por MaxMind, disponibles en <a href="http://www.maxmind.com/">http://www.maxmind.com/</a>.';
$string['keeptagnamecase'] = 'Mantener \'casing\' de nombre de marca';
$string['lang'] = 'Idioma por defecto';
$string['langcache'] = 'Guardar en caché el menú de idioma';
$string['langcache_desc'] = 'Cachear el menú de idiomas. Si se habilita, la lista de idiomas disponibles se almacena en caché. La caché se refresca automáticamente cuando se instala o elimina un paquete de idioma por medio de la herramienta de gestión de paquetes de idiomas incorporada. Si instala un paquete de idioma manualmente, deberá usar la característica "Purgar todas las cachés" para refrescar la lista cacheada (Administración del sitio, Desarrollo, Experimental, Purgar todas las cachés).';
$string['langlist'] = 'Idiomas en el menú de idioma';
$string['langmenu'] = 'Mostrar menú de idioma';
$string['langpackwillbeupdated'] = 'Durante la actualización, Moodle intentará actualizar el paquete de idioma seleccionado actualmente.';
$string['langstringcache'] = 'Guardar en caché todas las cadenas del idioma';
$string['languagesettings'] = 'Ajustes de idioma';
$string['latexpreamble'] = 'Preámbulo LaTeX';
$string['latexsettings'] = 'Configuración de procesador de LaTeX';
$string['latinexcelexport'] = 'Codificación Excel';
$string['legacyfilesinnewcourses'] = 'Archivos heredados en los cursos nuevos';
$string['legacyfilesinnewcourses_help'] = 'De forma predeterminada los archivos heredados sólo están disponibles en los cursos actualizados desde versiones anteriores de Moodle (1.9.x a 2.0 por ejemplo). Tenga en cuenta que algunas características como respaldo y restauración de actividades individuales no son compatibles con esta configuración.';
$string['licensesettings'] = 'Configuración de licencias';
$string['linkadmincategories'] = 'Enlazar categorías administrativas';
$string['linkadmincategories_help'] = 'Si se habilita, las categorías de ajustes de administración se mostrarán como enlaces en la navegación y conducirán a las páginas de categoría de administración';
$string['loading'] = 'Cargando';
$string['localetext'] = '\'Locale\' del sitio';
$string['localstringcustomization'] = 'Personalización local del idioma';
$string['location'] = 'Ubicación';
$string['locationsettings'] = 'Ajustes de ubicación';
$string['locked'] = 'bloqueado';
$string['lockoutduration'] = 'Duración del bloqueo de la cuenta';
$string['lockoutduration_desc'] = 'La cuenta bloqueada es des-bloqueada automáticamente después de este tiempo.';
$string['lockoutemailbody'] = 'Su cuenta con nombredeusuario {$a->username} en el servidor \'{$a->sitename}\' fue bloqueada después de haber tenido múltiples intentos fallidos para entrar.

Para desbloquear inmediatamente la cuenta, vaya a la dirección siguiente

{$a->link}

En la mayoría de los programas de correo electrónico, esto debería de aparecer como un enlace en texto azul, el cual puede Usted elegir. Si esto no funciona, entonces copie la dirección y péguela en la barra de dirección de su ventana de navegador de internet.

Si necesita ayuda, por favor contacte al administrador del sitio,
{$a->admin}';
$string['lockoutemailsubject'] = 'Su cuenta en {$a} fue bloqueada';
$string['lockouterrorunlock'] = 'Se proporcionó información inválida para des-bloquear la cuenta.';
$string['lockoutthreshold'] = 'Umbral para bloquear cuenta';
$string['lockoutthreshold_desc'] = 'Seleccione el número de intentos de entrar fallidos que resultarán en que se bloquee la cuenta. Esta característica puede ser abusada en los ataques por negación de servicio.';
$string['lockoutwindow'] = 'Ventana de observación de bloqueo de cuenta';
$string['lockoutwindow_desc'] = 'Tiempo de observación para el umbral para bloquear cuenta; si no hubiera intentos fallidos, el contador del umbral se reinicia después de este tiempo.';
$string['log'] = 'Bitácoras';
$string['logguests'] = 'Registro del acceso de invitados';
$string['logguests_help'] = 'Esta configuración habilita el registro de acciones para cuentas de invitados o usuarios no registrados. En determinados sitios se podría desactivar esta opción por razones de rendimiento. Se recomienda mantener esta opción habilitada en los sitios en producción.';
$string['loginhttps'] = 'Usar HTTPS para ingresos';
$string['loginpageautofocus'] = 'Formato de página de enfoque automático de ingreso';
$string['loginpageautofocus_help'] = 'Al activar esta opción se mejora la usabilidad de la página de ingreso al sitio, pero el enfoque automático de campos puede ser considerado como un problema de accesibilidad.';
$string['loginpasswordautocomplete'] = 'Impedir que se auto-complete la contraseña en el formato de ingreso.';
$string['loginpasswordautocomplete_help'] = 'El deshabilitar esta opción les permitirá a sus usuarios guardar su contraseña en el navegador web. Habilitar esta opción resultará en que su sitio Moodle ya no cumpla estrictamente las reglas estrictas de validación XHTML.';
$string['loglifetime'] = 'Mantener bitácoras por';
$string['longtimewarning'] = '<b>Por favor, tenga en cuenta que este proceso puede durar mucho.</b>';
$string['maintenancemode'] = 'En Modo Mantenimiento';
$string['maintenancemodeisscheduled'] = 'Este sitio cambiará a modo de mantenimiento en {$a} minutos';
$string['maintfileopenerror'] = '¡Error al abrir los archivos de mantenimiento!';
$string['maintinprogress'] = 'Mantenimiento en curso...';
$string['manageformats'] = 'Gestionar formatos de curso';
$string['manageformatsgotosettings'] = 'El formato por defecto puede cambiarse en {$a}';
$string['managelang'] = 'Administrar';
$string['managelicenses'] = 'Administrar licencias';
$string['manageqbehaviours'] = 'Gestionar comportamientos de preguntas.';
$string['manageqtypes'] = 'Administrar tipos de preguntas';
$string['maturity100'] = 'Beta';
$string['maturity150'] = 'Candidato para liberación';
$string['maturity200'] = 'Versión estable';
$string['maturity50'] = 'Alfa';
$string['maturityallowunstable'] = 'Sugerencia: Usted podría querer correr este script con la opción --allow-unstable';
$string['maturitycoreinfo'] = 'Su sitio está actualmente ejecutando código inestable  "{$a}" en desarrollo.';
$string['maturitycorewarning'] = 'La versión de Moodle que usted va a instalar o actualizar contiene código inestable "{$a}" en desarrollo, que no es adecuado para usarse en la mayoría de los sitios de producción. Si esto no es lo que Usted deseaba, entonces asegúrese de instalar o actualizar a una versión de una rama "ESTABLE" del código de Moodle. Vea Moodle Docs para más detalles.';
$string['maxbytes'] = 'Tamaño máximo del archivo subido';
$string['maxconsecutiveidentchars'] = 'Caracteres consecutivos idénticos';
$string['maxeditingtime'] = 'Tiempo máximo para editar mensajes';
$string['maxusersperpage'] = 'Máximo de usuarios por página';
$string['mbstringrecommended'] = 'La instalación de la librería opcional MBSTRING es muy recomendable para mejorar el rendimiento del sitio, especialmente si su sitio está soportando idiomas no latinos.';
$string['mediapluginavi'] = 'Habilitar filtro .avi';
$string['mediapluginflv'] = 'Habilitar filtro .flv';
$string['mediapluginimg'] = 'Habilitar la incrustación automática de imágenes enlazadas';
$string['mediapluginmov'] = 'Habilitar filtro .mov';
$string['mediapluginmp3'] = 'Habilitar filtro .mp3';
$string['mediapluginmpg'] = 'Habilitar filtro .mpg';
$string['mediapluginogg'] = 'Habilitar el filtro .ogg';
$string['mediapluginogv'] = 'Habilitar el filtro .ogv';
$string['mediapluginram'] = 'Habilitar filtro .ram';
$string['mediapluginrm'] = 'Habilitar filtro .rm';
$string['mediapluginrpm'] = 'Habilitar filtro .rpm';
$string['mediapluginswf'] = 'Habilitar filtro .swf';
$string['mediapluginswfnote'] = 'Como medida de seguridad por defecto, no se permite a los usuarios incrustar archivos flash swf.';
$string['mediapluginwmv'] = 'Habilitar filtro .wmv';
$string['mediapluginyoutube'] = 'Habilitar el filtro de enlaces de YouTube';
$string['messaging'] = 'Habilitar sistema de mensajería';
$string['messagingallowemailoverride'] = 'Anulación de notificación por email';
$string['messagingdeletereadnotificationsdelay'] = 'Eliminar las notificaciones ya leídas';
$string['messaginghidereadnotifications'] = 'Ocultar las notificaciones ya leídas';
$string['minpassworddigits'] = 'Dígitos';
$string['minpasswordlength'] = 'Longitud de la contraseña';
$string['minpasswordlower'] = 'Minúsculas';
$string['minpasswordnonalphanum'] = 'Caracteres no alfanuméricos (como . $ ? / * - + # @)';
$string['minpasswordupper'] = 'MAYÚSCULAS';
$string['misc'] = 'Misceláneos';
$string['mnetrestore_extusers'] = 'Este respaldo contiene cuentas de usuario de red Moodle remotas las cuales serán recuperadas como parte del proceso.';
$string['mnetrestore_extusers_admin'] = '<strong> Nota: </strong> Este archivo de respaldo parece venir de otra instalación diferente de Moodle y contiene cuentas de usuario remoto de Moodle Network. El proceso de restauración intentará hacer coincidir los host de Moodle Network con todos los usuarios creados. Los que no coincidan se conectarán automáticamente mediante autenticación interna (en lugar de la de Mnet). La bitácora de restauración le informará al respecto.';
$string['mnetrestore_extusers_mismatch'] = '<strong>Nota:</strong> Este archivo de respaldo aparentemente se origina de una instalación diferente de Moodle y contiene cuentas de red Moodle remotas que pueden fallar al intentar recuperarlas. Esta operación no está soportada. Si usted está seguro que fue creada en esta instalación de Moodle, o puede asegurarse de que todos los hosts de red Moodle necesarios están configurados, entonces podría intentar la restauración.';
$string['mnetrestore_extusers_noadmin'] = '<strong> Nota: </strong> Este archivo de respaldo parece venir de otra instalación de Moodle y contiene cuentas de usuario de Moodle Network. No tiene permiso para ejecutar este tipo de restauración. Póngase en contacto con el administrador del sitio o bien, restaure este curso sin ningún tipo de información de usuario (módulos, archivos ...)';
$string['mnetrestore_extusers_switchuserauth'] = 'El usuario remoto de Moodle Network {$a->username} (proveniente de {$a->mnethosturl}) ha cambiado a usuario autenticado {$a->auth} local.';
$string['mobile'] = 'Móvil';
$string['mobilecssurl'] = 'CSS';
$string['modchooserdefault'] = 'Por defecto del selector de actividades';
$string['modeditdefaults'] = 'Valores predeterminados para la configuración de la actividad';
$string['modsettings'] = 'Gestionar actividades';
$string['modulesecurity'] = 'Seguridad del módulo';
$string['moodleorghubname'] = 'Moodle.net';
$string['multilangforceold'] = 'Forzar sintaxis vieja multi-idioma: <span> sin la class="multilang" y &lt;lang&gt;';
$string['mustenablestats'] = 'Las estadísticas aún no se han habilitado en este sitio.';
$string['mycoursesperpage'] = 'Número de cursos';
$string['mydashboard'] = 'Panel por defecto del sistema';
$string['mymoodle'] = 'Mi Hogar';
$string['mymoodleredirect'] = 'Forzar a los usuarios a usar Mi Moodle';
$string['mypage'] = 'Página de Mi Hogar por defecto';
$string['mypagelocked'] = 'Bloquear página por defecto';
$string['myprofile'] = 'Página de perfil por defecto';
$string['mysql416bypassed'] = 'En cualquier caso, si su sitio únicamente está utilizando idiomas ISO-8859-1 (latin), puede continuar con su versión de MySQL actual (4.1.12 o superior).';
$string['mysql416required'] = 'MySQL 4.1.16 es la versión mínima requerida para trabajar con Moodle 1.6 y garantizar que toda la información podrá ser convertida a UTF-8 en el futuro.';
$string['navadduserpostslinks'] = 'Añada enlaces para ver los mensajes del usuario';
$string['navadduserpostslinks_help'] = 'Si está habilitado, dos enlaces se añadirán a la navegación del usuario  para ver las discusiones que el usuario ha comenzado y los mensajes que el usuario ha hecho en foros en todo el sitio o en cursos específicos.';
$string['navcourselimit'] = 'Límite del curso';
$string['navigationupgrade'] = 'Esta actualización introduce dos nuevos bloques de navegación que sustituirán a estos bloques: Administración, Cursos, Actividades y Participantes. Si tiene establecido algún permiso especial en estos  bloques debe asegurarse de que todo se está comportando como usted desea.';
$string['navshowallcourses'] = 'Mostrar todos los cursos';
$string['navshowcategories'] = 'Mostrar las carreras de los cursos';
$string['navshowfrontpagemods'] = 'Mostrar las actividades de la portada en la navegación';
$string['navshowfrontpagemods_help'] = 'Si se habilita, las actividades de la portada se mostrarán en la navegación debajo de las páginas del sitio.';
$string['navshowfullcoursenames'] = 'Mostrar nombres completos de cursos';
$string['navshowfullcoursenames_help'] = 'Si se habilita, los cursos en la navegación se mostrarán usando sus nombres completos en lugar de los nombres cortos.';
$string['navshowmycoursecategories'] = 'Mostrar carreras de mis cursos';
$string['navshowmycoursecategories_help'] = 'Si se habilita, los cursos en la rama de mis cursos se mostrarán por carreras.';
$string['navsortmycoursessort'] = 'Ordenar mis cursos';
$string['navsortmycoursessort_help'] = 'Determina cómo se ordenarán (por ejemplo, en el órden puesto en Configuraciones > Administración del sitio > Cursos > Añadir/editar cursos)  o alfabéticamente por configuración del curso.';
$string['neverdeleteruns'] = 'Nunca eliminar ejecuciones';
$string['nobookmarksforuser'] = 'No tiene ninguna marca (bookmarks)';
$string['nodatabase'] = 'Ninguna base de datos';
$string['nohttpsformobilewarning'] = 'Se recomienda que se habilite HTTPS con un certificado válido. La aplicación Moodle siempre intentará usar una conexión segura en primer lugar.';
$string['nomissingstrings'] = 'No hay cadenas sin traducir';
$string['nonewsettings'] = 'No se han agregado nuevos ajustes durante esta actualización.';
$string['nonexistentbookmark'] = 'La marca (bokkmark) solicitada no existe';
$string['noresults'] = 'No hay resultados.';
$string['noroles'] = 'No roles';
$string['notifications'] = 'Notificaciones';
$string['notifyloginfailures'] = 'Enviar por correo electrónico los ingresos fallidos a';
$string['notifyloginthreshold'] = 'Umbral para notificaciones email';
$string['notloggedinroleid'] = 'Rol de los visitantes';
$string['numberofmissingstrings'] = 'Número de cadenas faltantes: {$a}';
$string['numberofstrings'] = 'Número total de cadenas: {$a->strings}<br />Faltantes: {$a->missing} ({$a->missingpercent}&nbsp;%)';
$string['opensslrecommended'] = 'Instalar la librería opcional OpenSSL es altamente recomendado -- activa la funcionalidad de red de Moodle (\'Moodle Networking\').';
$string['opentogoogle'] = 'Abierta a Google';
$string['optionalmaintenancemessage'] = 'Mensaje de mantenimiento opcional';
$string['order1'] = 'Primero';
$string['order2'] = 'Segundo';
$string['order3'] = 'Tercero';
$string['order4'] = 'Cuarto';
$string['passwordpolicy'] = 'Política de contraseñas';
$string['pathconvert'] = 'Ruta de <i>convert</i> binario';
$string['pathdvips'] = 'Ruta de <i>dvips</i> binario';
$string['pathlatex'] = 'Ruta de <i>latex</i> binario';
$string['pathtoclam'] = 'ruta a clam AV';
$string['pathtodot'] = 'Ruta a "dot"';
$string['pathtodot_help'] = 'La ruta al ejecutable de dot. Probablemente algo así como /usr/bin/dot. Para poder generar gráficos de archivos DOT, debe tener instalado el ejecutable de dot y señalar hacia esa dirección. Observe que, por ahora, esto solo se emplea para las caracteristicas experimentales en desarrollo de perfilado (Profiling)  en Moodle.';
$string['pathtodu'] = 'Ruta a du';
$string['pathtopgdump'] = 'Ruta a pg_dump';
$string['pathtopgdumpdesc'] = 'Sólo es necesario entrar si usted tiene má de un pg_dump en su sistema (por ejemplo, si tiene instalada más de una versión de postgresql)';
$string['pathtopgdumpinvalid'] = 'Ruta no válida a pg_dump: o bien es errónea, o bien no se encuentra el ejecutable';
$string['pathtopsql'] = 'Ruta a psql';
$string['pathtopsqldesc'] = 'Esto sólo es necesario si tiene más de un psql en su sistema (por ejemplo, si tiene instalada más de una versión de postgresql)';
$string['pathtopsqlinvalid'] = 'Ruta a psql no válida: o bien es errónea, o bien no es ejecutable';
$string['pcreunicodewarning'] = 'Se recomienda encarecidamente usar la extensión PCRE PHP que sea compatible con caracteres Unicode.';
$string['perfdebug'] = 'Información de rendimiento';
$string['performance'] = 'Rendimiento';
$string['pgcluster'] = 'Cluster PostgreSQL';
$string['pgclusterdescription'] = 'Parámetro de versión/cluster PostgreSQL para operaciones de línea de comandos. Si sólo tiene un postgresql en su sistema o no está seguro de qué es esto, déjelo en blanco.';
$string['php50restricted'] = 'PHP 5.0.x tiene varios problemas conocidos; por favor, actualícese a la versión 5.1.x o utilice las versiones 4.3.x o 4.4.x';
$string['php533warning'] = 'Se recomienda PHP 5.3.3 o superior';
$string['phpfloatproblem'] = 'Detectado problema inesperado en el manejo de números flotantes PHP - {$a}';
$string['pleaserefreshregistration'] = 'Su sitio ha sido registrado en moodle.org. Por favor, considere la conveniencia de actualizar el registro si hubiera ocurrido algún cambio desde su última actualización en {$a}';
$string['pleaseregister'] = 'Por favor, registre su sitio para eliminar este botón';
$string['plugin'] = 'Plugin';
$string['plugins'] = 'Plugins';
$string['pluginscheck'] = 'Revisión de dependencias del plugin';
$string['pluginscheckfailed'] = 'Falló la revisión de dependencias para {$a->pluginslist}';
$string['pluginschecktodo'] = '¡ Debe resolver todos los requisitos para plugins antes de proceder a la instalación de esta versión de Moodle !';
$string['pluginsoverview'] = 'Vista general de plugins';
$string['pluginsoverviewsee'] = 'Vea la página sobre <a href="{$a->url}">vista general de plugins</a> para más detalles.';
$string['profilecategory'] = 'Categoría';
$string['profilecategoryname'] = 'Nombre de la categoría (debe ser único)';
$string['profilecategorynamenotunique'] = 'Este nombre de categoría ya está en uso';
$string['profilecommonsettings'] = 'Ajustes comunes';
$string['profileconfirmcategorydeletion'] = 'Hay {$a} campo/s en esta categoría que serán movidos a la categoría superior (o inferior de estar en la categoría más superior).<br />¿Aún desea eliminar ésta categoría?';
$string['profileconfirmfielddeletion'] = 'Hay {$a} registro/s de usuario para este campo que serán eliminados. <br />¿Aún desea eliminar este campo?';
$string['profilecreatecategory'] = 'Crear una nueva categoría de perfiles';
$string['profilecreatefield'] = 'Crear un nuevo campo de perfil:';
$string['profilecreatenewcategory'] = 'Creando una nueva categoría';
$string['profilecreatenewfield'] = 'Creando un nuevo campo de perfil \'{$a}\'';
$string['profiledefaultcategory'] = 'Otros campos';
$string['profiledefaultchecked'] = 'Marcado por defecto';
$string['profiledefaultdata'] = 'Valor por defecto';
$string['profiledeletecategory'] = 'Eliminando una categoría';
$string['profiledeletefield'] = 'Eliminando el campo \'{$a}\'';
$string['profiledescription'] = 'Descripción del campo';
$string['profiledscript'] = 'Este script ha sido perfilado';
$string['profiledscriptview'] = 'Ver información de perfil para este script';
$string['profileeditcategory'] = 'Editando la categoría {$a}';
$string['profileeditfield'] = 'Editando el campo de perfil {$a}';
$string['profilefield'] = 'Campo de perfil';
$string['profilefieldcolumns'] = 'Columnas';
$string['profilefieldispassword'] = '¿Es éste un campo de contraseña?';
$string['profilefieldlink'] = 'Enlace';
$string['profilefieldlink_help'] = 'Para transformar el texto en un enlace, introduzca una URL que contenga $$, donde $$ se sustituye por el texto. Por ejemplo, para transformar una ID de Twitter en un enlace, introduzca http://twitter.com/$$.';
$string['profilefieldlinktarget'] = 'Enlazar objetivo';
$string['profilefieldmaxlength'] = 'Longitud máxima';
$string['profilefieldrows'] = 'Filas';
$string['profilefields'] = 'Campos de perfil del usuario';
$string['profilefieldsize'] = 'Mostrar tamaño';
$string['profileforceunique'] = '¿Deberían ser únicos los datos?';
$string['profileinvaliddata'] = 'Valor no válido';
$string['profilelocked'] = '¿Está este campo bloqueado?';
$string['profilemenudefaultnotinoptions'] = 'El valor por defecto no está entre las opciones';
$string['profilemenunooptions'] = 'No se han suministrado opciones de menú';
$string['profilemenuoptions'] = 'Opciones de menú (una por línea)';
$string['profilemenutoofewoptions'] = 'Debe proporcionar al menos dos opciones';
$string['profilename'] = 'Nombre';
$string['profilenofieldsdefined'] = 'No se han definido campos';
$string['profilerequired'] = '¿Es este campo necesario?';
$string['profileroles'] = 'Roles de perfil visibles';
$string['profilesforenrolledusersonly'] = 'Perfiles sólo para usuarios inscritos';
$string['profileshortname'] = 'Nombre corto (debe ser único)';
$string['profileshortnamenotunique'] = 'Este nombre corto ya está en uso';
$string['profilesignup'] = '¿Mostrar página al inscribirse?';
$string['profilespecificsettings'] = 'Ajustes específicos';
$string['profilevisible'] = '¿Quién puede ver este campo?';
$string['profilevisibleall'] = 'Todos pueden verlo';
$string['profilevisible_help'] = '<p>Se puede asignar a cada campo personalizado uno de tres ajustes de visibilidad: invisible, a todo el mundo y usuario. El ajuste \'invisible\' normalmente es decidido por un administrador que quiere mantener la privacidad de los datos de los usuarios. El ajuste \'usuario\' es seleccionado normalmente para un campo que contiene información delicada, en tanto que la opción \'todo el mundo\' puede usarse para cualquier tipo de información.</p>';
$string['profilevisiblenone'] = 'No visible';
$string['profilevisibleprivate'] = 'Visible por el usuario';
$string['profiling'] = 'Perfilado (profiling)';
$string['profilingallowall'] = 'Perfilado (profiling) continuo';
$string['profilingallowall_help'] = 'Si activa esta configuración, entonces en cualquier momento podrá emplear el parámetro PROFILEALL en cualquier lugar (PGC) para habilitar el perfilado (profiling) de todos los scripts ejecutados durante  una sesión Moodle. De forma análoga, puede emplear el parámetro PROFILEALLSTOP para detenerlo.';
$string['profilingallowme'] = 'Perfilado selectivo';
$string['profilingallowme_help'] = 'Si activa esta configuración, entonces selectivamente podrá emplear el parámetro PROFILEME en cualquier lugar (PGC) para habilitar el perfilado de ese script. De forma análoga, puede emplear el parámetro DONTPROFILEME para evitar que ocurra el perfilado.';
$string['profilingautofrec'] = 'Perfilado (profiling) automático';
$string['profilingautofrec_help'] = 'Al configurar esta característica, una solicitud (aleatoria, basada en la frecuencia especificada -1 de N) será elegida y perfilada automáticamente, guardando los resultados para análisis posterior. Observe que esta forma de perfilar observa la configuración de incluir/excluir. Si la pone a 0 se desactiva el perfilado automático.';
$string['profilingenabled'] = 'Habilitar perfilado (profiling)';
$string['profilingenabled_help'] = 'Si habilita esta configuración, el perfilado (profiling) estará disponible en este sitio y podrádefinir su comportamiento al configurar las opciones siguientes.';
$string['profilingexcluded'] = 'Excluir perfilado (profiling)';
$string['profilingexcluded_help'] = 'Lista de URLs (separadas por comas, absolute skipping wwwroot, llamables) que serán excluidas de perfilarse de las que están definidas dentro de la configuración de "Perfila estas".';
$string['profilingimportprefix'] = 'Prefijo de importación de perfilado';
$string['profilingimportprefix_desc'] = 'Para detección más fácil, todas las corridas de perfilado importadas serán prefijadas con el valor aquí especificado.';
$string['profilingincluded'] = 'Perfila estas';
$string['profilingincluded_help'] = 'Lista de URLs (separadas por comas, absolute skipping wwwroot, llamables) que serán automáticamente perfiladas. Por ejemplo: /index.php, /course/view.php. Tambien acepta el comodín * en cualquier posición, como por ejemplo en: /mod/forum/*, /mod/*/view.php.';
$string['profilinglifetime'] = 'Mantener las corridas de perfilado (profiling)';
$string['profilinglifetime_help'] = 'Especifica el tiempo que quiere mantener la información sobre antiguas corridas de perfilado. Las más anteriores serán podadas periodicamente. Observe que esto excluye cualquier perfilado marcado como "corrida de referencia".';
$string['protectusernames'] = 'Proteger nombresdeusuario';
$string['proxybypass'] = 'hosts que saltan el proxy';
$string['proxyhost'] = 'host del proxy';
$string['proxypassword'] = 'Contraseña del proxy';
$string['proxyport'] = 'Puerto proxy';
$string['proxytype'] = 'Tipo de proxy';
$string['proxyuser'] = 'Nombredeusuario del proxy';
$string['purgecaches'] = 'Purgar todas las cachés';
$string['purgecachesconfirm'] = 'Moodle puede guardar en caché los temas, javascript, cadenas de idioma, texto filtrado, RSS feeds y muchos otros datos. La purga de estos datos en el servidor forzará a los navegadores de los clientes a actualizar la información y usted se asegurará de que los usuarios están viendo la información con los cambios más recientes. No se corre ningún riesgo por hacerlo, aunque su sitio podría parecer algo más lento en un principio hasta que el servidor y los clientes vuelven a actualizar la información, guardándose nuevamente los datos en la caché.';
$string['purgecachesfinished'] = 'Todas las cachés han sido purgadas';
$string['qtyperqpwillberemoved'] = 'Durante la actualización, el tipo de pregunta RQP será eliminada. En el caso de que no estuviera utilizando este tipo de pregunta, no debería tener ningún problema.';
$string['qtyperqpwillberemovedanyway'] = 'Durante la actualización, el tipo de pregunta RQP será eliminada. Usted tiene algunas preguntas RQP en su base de datos, y tales preguntas no pararán de funcionar a menos que reinstale el código desde http://moodle.org/mod/data/view.php?d=13&amp;rid=797  antes de continuar la actualización.';
$string['quarantinedir'] = 'Directorio de cuarentena';
$string['question'] = 'Pregunta';
$string['questionbehaviours'] = 'Comportamientos de las preguntas';
$string['questioncwqpfscheck'] = 'Una o más preguntas \'aleatorias\' de un examen se disponen para seleccionar preguntas de una mezcla de categorías de pregunta compartidas y no compartidas. Puede ver un informe más detallado <a href="{$a->reporturl}">aquí</a> o consultar la página de Moodle Docs <a href="{$a->docsurl}">here</a>.';
$string['questioncwqpfsok'] = 'Bueno. No existen preguntas \'aleatorias\' en sus exámenes que estén ajustadas para seleccionar preguntas a partir de una mezcla de categorías de pregunta compartidas y no compartidas.';
$string['questiontype'] = 'Tipo de pregunta';
$string['questiontypes'] = 'Tipos de preguntas';
$string['recaptchaprivatekey'] = 'Clave privada ReCAPTCHA';
$string['recaptchapublickey'] = 'Clave pública ReCAPTCHA';
$string['register'] = 'Registre su sitio';
$string['registermoodleorg'] = 'Cuando Usted registre su sitio con  {$a}';
$string['registermoodleorgli1'] = 'Usted es añadido a una lista de correo de bajo volúmen para notificaciones importantes como alertas de seguridad y nuevas versiones liberadas de Moodle.';
$string['registermoodleorgli2'] = 'Las estadísticas acerca de su sitio serán añadidas a las {$a} de la comunidad mundial Moodle.';
$string['registermoodleorgli3'] = 'Su sitio también es registrado con Moodle.net ({$a}), lo que les permite a los usuarios con la capacidad para publicar cursos (por defecto sólamente los mánagers) la opción de publicar cursos en Moodle.net';
$string['registerwithmoodleorg'] = 'Registrar con Moodle.org';
$string['registration'] = 'Registro';
$string['registration_help'] = 'Se recomienda registrar su sitio con Moodle.org para recibir notificaciones acerca de alertas de seguridad por correo electrónico, para contribuir a las <a href="http://moodle.org/stats">Estadísticas de uso de Moodle</a> y para poder compartir cursos en <a href="http://moodle.net/">Moodle.net</a>.';
$string['registrationwarning'] = 'Su sitio aún no está registrado.';
$string['releasenoteslink'] = 'Si desea información sobre esta versión de Moodle, por favor vea <a target="_blank" href="{$a}">Release Notes</a>';
$string['rememberusername'] = 'Recordar nombredeusuario';
$string['rememberusername_desc'] = 'Activar si desea almacenar las cookies permanentes con nombresdeusuario durante el ingreso. ¡Las cookies permanentes se podrían considerar  como riesgo/invasión potencial  para la privacidad del usuario si se utilizan sin su consentimiento!';
$string['reportsdeleteconfirm'] = 'Está a punto de borrar completamente el informe \'{$a}\'. Esta acción borrará toda la información de la base de datos asociada con este plugin. ¿Está seguro de que quiere continuar?';
$string['reportsmanage'] = 'Gestionar informes';
$string['requestcategoryselection'] = 'Habilitar selección de categoría';
$string['requiredentrieschanged'] = '<strong>IMPORTANTE - LÉALO, POR FAVOR<br />(Este mensaje de advertencia sólo aparecerá durante esta actualización)</strong><br />Debido a la solución de un \'bug\', cambiará el comportamiento de las actividades base de datos que utilizan los ajustes \'Entradas requeridas\' y \'Entradas requeridas antes de ver los ajustes\'. Puede ver una explicación más detallada de estos cambios en <a href="http://moodle.org/mod/forum/discuss.php?d=110928" target="_blank">el foro del módulo base de datos</a>. El funcionamiento esperado de estos ajustes puede consultarse asimismo en <a href="http://docs.moodle.org/en/Adding/editing_a_database#Required_entries" target="_blank">Moodle Docs</a>. <br /><br />Este cambio afecta a las siguientes bases de datos de su sistema: (Por favor, guarde ahora esta lista y, después de la actualización, compruebe que estas actividades siguen funcionando del modo que desea el profesor.)<br/><strong>{$a->text}</strong><br/>';
$string['requiremodintro'] = 'Requerir descripción de la actividad';
$string['requires'] = 'Requiere';
$string['restorernewroleid'] = 'Rol de los restauradores en los cursos';
$string['restorernewroleid_help'] = 'Si el usuario no tiene todavía permiso para administrar el curso recién restaurado, se le asignar este permiso automáticamente y se le da de alta en caso necesario. Seleccione "Ninguno" si no quiere que los restauradores puedan gestionar todos los cursos restaurados.';
$string['reverseproxy'] = 'Proxy reverso';
$string['riskconfig'] = 'Los usuarios podrían cambiar la configuración y el comportamiento del sitio';
$string['riskconfigshort'] = 'Riesgo de configuración';
$string['riskdataloss'] = 'Los usuarios podrían destruir grandes cantidades de contenido o la información';
$string['riskdatalossshort'] = 'Riesgo de pérdida de datos';
$string['riskmanagetrust'] = 'Los usuarios podrían cambiar los ajustes de confianza de otros usuarios';
$string['riskmanagetrustshort'] = 'Gestionar ajustes fiables';
$string['riskpersonal'] = 'Los usuarios podrían acceder a información privada de otros usuarios';
$string['riskpersonalshort'] = 'Riesgo de privacidad';
$string['riskspam'] = 'Los usuarios podrían enviar \'spam\' a usuarios del sitio o a otros';
$string['riskspamshort'] = 'Riesgo de spam';
$string['riskxss'] = 'Los usuarios podrían agregar archivos y textos que permiten \'scripting\' a través del sitio (XSS)';
$string['riskxssshort'] = 'Riesgo XSS';
$string['roleswithexceptions'] = '{$a->roles}, con {$a->exceptions}';
$string['rssglobaldisabled'] = 'Deshabilitado en el nivel servidor';
$string['runclamavonupload'] = 'Usar clam AV en archivos subidos';
$string['save'] = 'Guardar';
$string['savechanges'] = 'Guardar cambios';
$string['search'] = 'Buscar';
$string['searchinsettings'] = 'Ajustes de búsqueda';
$string['searchresults'] = 'Resultados de la búsqueda';
$string['sectionerror'] = 'Error de sección';
$string['secureforms'] = 'Usar formato adicional de seguridad';
$string['security'] = 'Seguridad';
$string['selectdevice'] = 'Seleccionar dispositivo';
$string['selecttheme'] = 'Seleccionar Tema para el dispositivo {$a}';
$string['server'] = 'Servidor';
$string['serverchecks'] = 'Comprobaciones del servidor';
$string['serverlimit'] = 'Límite del servidor';
$string['sessionautostartwarning'] = '<p>Se ha detectado un error de configuración grave; por favor notifique al administrador del servidor. </p><p>Para que funcione correctamente, Moodle requiere que el administrador cambie la configuración de PHP. </p><p> <code> session.auto_start </code> debe establecerse en <code>off </code>. </p> <p>Esta configuración se controla editando <code> php.ini </code>, la configuración de Apache/IIS <br /> o el archivo<code>. htaccess </code> en el servidor. </p>';
$string['sessioncookie'] = 'Prefijo de las \'cookies';
$string['sessioncookiedomain'] = 'Dominio de las \'cookies';
$string['sessioncookiepath'] = 'Ruta de las \'cookies';
$string['sessionhandling'] = 'Gestión de la sesión';
$string['sessiontimeout'] = 'Tiempo límite';
$string['settingfileuploads'] = 'La subida de archivos es necesaria para el funcionamiento normal, por favor, actívela en la configuración PHP.';
$string['settingmemorylimit'] = 'Memoria insuficiente, defina un valor mayor de la memoria en la configuración de PHP (memory_limit)';
$string['settingsafemode'] = 'Moodle no es totalmente compatible con el modo seguro, por favor, pida al administrador del servidor que lo desactive. La ejecución de Moodle en modo seguro no es compatible, se producirán diversos problemas si lo hace.';
$string['showcommentscount'] = 'Mostrar número de comentarios';
$string['showdetails'] = 'Mostrar detalles';
$string['showuseridentity'] = 'Mostrar identidad de usuario';
$string['showuseridentity_desc'] = 'Al seleccionar o buscar usuarios, y cuando se muestran las listas de usuarios, estos campos se mostrarán adicionalmente al nombre completo. Los campos sólo se muestran a los usuarios que tienen la capacidad moodle/site:viewuseridentity (por defecto solamente a profesores y mánagers). Esta opción tiene más sentido si selecciona uno o dos campos obligatorios en su institución (por ejemplo: número_de_cuenta, RFC y CURP).

Por favor cuide los datos personales de los usuarios y considere IMPORTANTE tener la precaución de  no escribir ni permitir el acceso no-autorizado a "datos personales sensibles" (estado de salud, información genética, creencias religiosas, filosóficas y morales, afiliación sindical, opiniones políticas, orígen racial o étnico, preferencia sexual, ...) que pudieran causarle responsabilidades o riesgos innecesarios a Usted y a la Institución.

Por favor si está en México le recomendamos que consulte la página y siga las indicaciones del <a href="http://www.ifai.gob.mx">Instituto Federal de Acceso a la Información y Protección de Datos</a>';
$string['simplexmlrequired'] = 'Moodle requiere ahora la extensión SimpleXML de PHP.';
$string['sitemaintenance'] = 'Este sitio está en fase de mantenimiento y no está disponible en este momento';
$string['sitemaintenancemode'] = 'Modo de mantenimiento';
$string['sitemaintenanceoff'] = 'El modo de mantenimiento está desactivado y el sitio vuelve a funcionar con normalidad';
$string['sitemaintenanceon'] = 'El sitio está en modo mantenimiento (sólo los administradores tienen acceso).';
$string['sitemaintenanceoncli'] = 'Su sitio actualmente está en modo de mantenimiento CLI (interfase por línea de comandos), no se permite el acceso vía web.';
$string['sitemaintenancewarning'] = 'El sitio está en modo mantenimiento (sólo los administradores tienen acceso). Para ponerlo en funcionamiento de nuevo, <a href="maintenance.php">desactive el modo de mantenimiento</a>.';
$string['sitemaintenancewarning2'] = 'Su sitio se encuentra actualmente en modo de mantenimiento (solo los administradores pueden iniciar sesión). Para devolver este sitio a la operación normal, <a href="{$a}">desactive el modo de mantenimiento</a>.';
$string['sitepolicies'] = 'Políticas del sitio';
$string['sitepolicy'] = 'URL con la política del sitio';
$string['sitepolicyguest'] = 'URL con la política del sitio para invitados';
$string['sitepolicyguest_help'] = 'Si su política exige que todos los invitados lean y acepten sus condiciones antes de usar el sitio, especifique aquí la URL que muestra esta información; en caso contrario, déje el campo en blanco. Este campo de configuración puede contener  cualquier dirección URL pública.
<p>Nota: El acceso de usuarios no registrados pueden evitarse \'forzando a los usuarios a ingresar\'. </p>';
$string['sitepolicy_help'] = 'Si su política exige que todos los usuarios lean y acepten sus condiciones antes de usar el sitio, especifique aquí la URL que muestre esta información; en caso contrario, deje el campo en blanco. Este campo de configuración puede contener  cualquier dirección URL pública.';
$string['sitesectionhelp'] = 'Si se selecciona, se mostrará una sección de tema en la portada del sitio.';
$string['slasharguments'] = 'Usar argumentos \'slash';
$string['smartpix'] = 'Búsqueda de \'smart pix';
$string['soaprecommended'] = 'La instalación de la extensión SOAP es útil para los servicios web y para algunos complementos.';
$string['sort_fullname'] = 'Nombre completo del curso';
$string['sort_idnumber'] = 'Número de ID del curso';
$string['sort_shortname'] = 'Nombre corto del curso';
$string['sort_sortorder'] = 'Criterio de ordenamiento';
$string['spellengine'] = 'Motor ortográfico';
$string['spelllanguagelist'] = 'Lista de ortografía de idiomas';
$string['splrequired'] = 'Moodle requiere ahora la extensión SPL de PHP.';
$string['stats'] = 'Estadísticas';
$string['statsfirstrun'] = 'Intervalo máximo de procesamiento';
$string['statsmaxruntime'] = 'Tiempo de ejecución máximo';
$string['statsmoodleorg'] = 'estadísticas';
$string['statsruntimedays'] = 'Días para procesar';
$string['statsruntimestart'] = 'Ejecutar en';
$string['statsuserthreshold'] = 'Umbral para el usuario';
$string['stickyblocks'] = 'Bloques pegajosos (sticky)';
$string['stickyblockscourseview'] = 'Página del curso';
$string['stickyblocksduplicatenotice'] = 'Si cualquier bloque que agregue aquí está ya presente en una página en particular, el resultado será un duplicado.<br />Únicamente el bloque agregado no será editable, en tanto que el duplicado podrá editarse.';
$string['stickyblocksmymoodle'] = 'Mi moodle';
$string['stickyblockspagetype'] = 'Tipo de página a configurar';
$string['strictformsrequired'] = 'Validación estricta de campos obligatorios';
$string['stripalltitletags'] = 'Eliminar marcas HTML de todos los nombres de actividad';
$string['supportcontact'] = 'Contacto de soporte';
$string['supportemail'] = 'Email de soporte';
$string['supportname'] = 'Nombre del soporte';
$string['supportpage'] = 'Página de soporte';
$string['suspenduser'] = 'Suspender cuenta de usuario';
$string['switchlang'] = 'Cambiar directorio de idioma';
$string['systempaths'] = 'Rutas del sistema';
$string['tablenosave'] = 'Los cambios de la tabla superior se guardan automáticamente.';
$string['tablesnosave'] = 'Los cambios en la tabla de arriba se guardan automáticamente.';
$string['tabselectedtofront'] = 'En tablas con tabuladores, la fila con el tabulador actualmente seleccionado debería colocarse en el frente';
$string['tabselectedtofronttext'] = 'Poner en primer término la fila de pestañas seleccionada';
$string['themedesignermode'] = 'Modo de diseño de temas gráficos';
$string['themelist'] = 'Lista de temas gráficos';
$string['themenoselected'] = 'No hay tema seleccionado';
$string['themeresetcaches'] = 'Borrar cachés de temas';
$string['themeselect'] = 'Cambiar tema';
$string['themeselector'] = 'Selector de temas gráficos';
$string['themesettings'] = 'Ajustes de temas gráficos';
$string['therewereerrors'] = 'Hay errores en sus datos';
$string['timezone'] = 'Zona horaria por defecto';
$string['timezoneforced'] = 'Esta opción está forzada por el administrador del sitio';
$string['timezoneisforcedto'] = 'Forzar a todos los usuarios a utilizar';
$string['timezonenotforced'] = 'Los usuarios pueden elegir su propia zona horaria';
$string['tokenizerrecommended'] = 'Se recomienda instalar la extensión opcional PHP Tokenizer -- Mejora la funcionalidad red de Moodle (\'Moodle Networking\').';
$string['tools'] = 'Herramientas de administración';
$string['toolsdeleteconfirm'] = 'Está a punto de borrar completamente la herramienta de administración \'{$a}\'. Esto borrará completamente todo lo referente a este plugin de la base de datos asociada. ¿Está seguro de que quiere continuar?';
$string['toolsmanage'] = 'Gestionar herramientas de administración';
$string['unattendedoperation'] = 'Operación no atendida';
$string['unbookmarkthispage'] = 'Desmarcar esta página';
$string['unicoderecommended'] = 'Se recomienda almacenar todos los datos en Unicode (UTF-8). Las instalaciones nuevas deberían ejecutarse en bases de datos cuyo juego de caracteres por defecto fuera Unicode. Si está realizando una actualización, debería llevar a cabo el proceso de migración UTF-8 (vea al respecto la página de Administración).';
$string['unicoderequired'] = 'Es necesario que almacene todos sus datos en formato Unicode (UTF-8). Las instalaciones nuevas deberían ejecutarse en bases de datos cuyo juego de caracteres por defecto fuera Unicode. Si está realizando una actualización, debería llevar a cabo el proceso de migración UTF-8 (vea al respecto la página de Administración).';
$string['uninstallplugin'] = 'Desinstalar';
$string['unlockaccount'] = 'Des-bloquear cuenta';
$string['unsettheme'] = 'Tema anulado';
$string['unsupported'] = 'No admitido';
$string['unsuspenduser'] = 'Activar cuenta de usuario';
$string['updateaccounts'] = 'Actualizar cuentas existentes';
$string['updateautocheck'] = 'Revisar automáticamente si hay actualizaciones disponibles';
$string['updateautocheck_desc'] = 'Si se habilita, su sitio revisará automáticamente si hay actualizaciones disponibles para el código de Moodle y todos sus plugins adicionales. Si existe una nueva actualización disponible, se enviará una notificación a los administradores del sitio.';
$string['updateautodeploy'] = 'Habilitar implementación de actualizaciones';
$string['updateautodeploy_desc'] = 'Si se habilita, Usted podrá descargar e instalar las actualizaciones disponibles directamente desde las páginas de administración de Moodle. Observe que  su servidor web debe de tener acceso de escritura a las carpetas con la instalación de Moodle para hacer que esto funcione. Esto puede verse como un riego potencial de seguridad.';
$string['updateavailable'] = '¡Hay una nueva versión de Moodle disponible!';
$string['updateavailabledetailslink'] = 'Vea {$a->url} para más detalles';
$string['updateavailableforplugin'] = '¡Hay nuevas versiones disponibles para algunos de sus plugins!';
$string['updateavailableinstall'] = 'Instalar esta actualización';
$string['updateavailable_moreinfo'] = 'Más información...';
$string['updateavailablenot'] = 'Su código de Moodle parece estar actualizado';
$string['updateavailable_release'] = 'Moodle {$a}';
$string['updateavailable_version'] = 'Versión {$a}';
$string['updatecomponent'] = 'Actualizar componente';
$string['updateminmaturity'] = 'Madurez de código requerida';
$string['updateminmaturity_desc'] = 'Notificar sobre actualizaciones disponibles sólamente si el código disponible tiene al menos el nivel de madurez seleccionado. Las actualizaciones para los plugins que no declaran su nivel de madurez del código siempre son reportadas sin importar esta configuración.';
$string['updatenotificationfooter'] = 'Su sitio Moodle {$a->siteurl} está configurado para revisar automáticamente las actualizaciones disponibles. Usted está recibiendo este mensaje por ser el administrador del sitio. Usted puede deshabilitar las revisiones automáticas de actualizaciones disponibles en la sección sobre Administración del Sitio del bloque de Administración. Usted puede ajustar el envío de este mensaje por medio de sus configuraciones personales para mensajes en la sección de los ajustes de mi perfil.';
$string['updatenotifications'] = 'Notificaciones de actualización';
$string['updatenotificationsubject'] = 'Existen actualizaciones disponibles para Moodle ({$a->siteurl})';
$string['updatenotifybuilds'] = 'Notificar acerca de nuevos lotes (builds) disponibles';
$string['updatenotifybuilds_desc'] = 'Si se habilita, la actualización disponible para el código de Moodle también se reportará cuando exista un nuevo lote (build) disponible para la versión actual. Los lotes (builds) son desarrollos contínuos de una versión dada de Moodle. Son generalmente liberados una vez por semana. Si se deshabilita, la actualización disponible solamente será reportada cuando exista una versión superior de Moodle liberada. Las revisiones para los plugins no son afectadas por esta configuración.';
$string['upgrade197notice'] = '<p>Moodle 1.9.7 tiene un número de mejoras de seguridad a las contraseñas (passwords) de usuarios y respaldos para proteger los datos de usuarios en su sitio. Como resultado, algunas de las configuraciones y permisos relacionadas con respaldos han cambiado.<br /> Vea las notas de la versión liberada  <a href="http://docs.moodle.org/en/Moodle_1.9.7_release_notes" target="_blank">Moodle 1.9.7 </a> para mayores detalles.</p>';
$string['upgrade197noticesubject'] = 'Avisos de  actualizaciones de seguridad de Moodle 1.9.7';
$string['upgrade197salt'] = 'Para reducir el riesgo de robo de contraseñas, se recomienda establecer una \'sal\' de contraseña. <br /> Vea href="{$a}" <a target="_blank">password salting documentation</a> para más detalles.';
$string['upgradeerror'] = 'Error desconocido de actualización {$a->plugin} a la versión {$a->version}, no se puede continuar.';
$string['upgradeforumread'] = 'Se ha añadido una nueva característica en Moodle 1.5 tpara seguimiento de mensajes leídos/no-leídos.<br />Para emplear esta característica Usted necesita <a href="{$a}">actualizar sus tablas</a>.';
$string['upgradeforumreadinfo'] = 'Se ha incorporado a Moodle 1.5 una nueva funcionalidad para rastrear mensajes enviados al foro leídos y no leídos. Para hacer uso de ella, necesita actualizar sus tablas con toda la información concerniente a los mensajes existentes. Dependiendo del tamaño del sitio, esto puede llevar mucho tiempo (horas) y hacer un uso intensivo de la base de datos, de modo que es mejor llevar a cabo esta operación durante un período de tranquilidad. Sin embargo, el sitio continuará funcionando durante la actualización y los usuarios no se verán afectados. Una vez que comience este proceso, debería dejarlo terminar (i.e., mantenga abierta la ventana del navegador). En todo caso, si detiene el proceso cerrando la ventana, no se preocupe, siempre podrá recomenzar.<br /><br />¿Desea comenzar el proceso de actualización ahora?';
$string['upgradelogs'] = 'Para conseguir una funcionalidad total, sus bitácoras antiguas deben ser actualizadas. <a href="{$a}">Más información</a>';
$string['upgradelogsinfo'] = 'Recientemente se han llevado a cabo algunos cambios en la forma en que se almacenan las bitácoras. Para poder ver sus bitácoras antiguas clasificadas por actividad, esas bitácoras se deben actualizar. Dependiendo del tamaño de su sitio, este proceso puede tardar bastante tiempo (varias horas) puesto que habrá de consultar continuamente la base de datos. Una vez iniciado el proceso debe permitir que llegue a su fin (manteniendo la ventana de su navegador abierta). No se preocupe: durante este proceso su sitio funcionará correctamente para los otros usuarios.<br /><br /> ¿Desea actualizar sus registros ahora?';
$string['upgradepluginsfirst'] = 'Se recomienda que primero instale todas las actualizaciones disponibles';
$string['upgradepluginsinfo'] = 'Actualizando plugins';
$string['upgradepluginsinfo_help'] = 'Existen actualizaciones disponibles para algunos de sus plugins. Usted debería de instalarlas todas antes de actualizar la BasedeDatos de Moodle. Si su sitio no soporta el despliegue de actualizaciones automático, Usted tiene que descargar e instalarmanualmente  las nuevas versiones de los plugins a su servidor.';
$string['upgradesettings'] = 'Nuevos ajustes';
$string['upgradesettingsintro'] = 'Los ajustes que se muestran más abajo se agregaron durante la última actualización de Moodle. Realice los cambios necesarios a los valores por defecto y luego haga clic en el botón &quot;Guardar ajustes&quot; al final de esta página.';
$string['upgradestalefiles'] = 'Se han detectado versiones mezcladas de Moodle, la actualización no puede continuar.';
$string['upgradestalefilesinfo'] = 'El proceso de actualización de Moodle se ha pausado debido a que se han detectado scripts PHP de cuando menos dos versiones principales de Moodle en el directorio de Moodle.

Esto puede causar problemas significativos más adelante, por lo que, para continuar, Usted debe asegurarse que el directorio de Moodle solamente contenga archivos de únicamente una versión.

La manera recomendada de limpiar su directorio Moodle es la siguiente:

* renombre el directorio actual de Moodle a "moodle_old"
* cree un nuevo directorio Moodle que solamente contenga archivos, o bien de una descarga de un paquete Moodle estándar o bien de los repositorios GIT de Moodle
* mueva el archivo original config.php y cualquier plugin no-estándar desde el directorio "moodle_old" hacia el nuevo directorio Moodle.

En cuanto tenga un directorio Moodle limpio, refresque esta página para continuar con el proceso de actualización de Moodle.

Esta advertencia a menudo es causada por descomprimir un paquete estándar de Moodle sobre una versión previa de Moodle. Si bien esto podría ser aceptable para actualizaciones menores, se recomienda firmemente NO HACERLO para actualizaciones mayores de Moodle.

Esta advertencia también pudiera ser causada por un checkout incompleto o una operación incompleta de actualización desde el repositorio GIT, en cuyo caso Usted puede necesitar simplemente esperar a que se complete la operación, o tal vez, correr el comando adecuado de  limpieza (clean up) y volver a intentar la operación.

Puede encontrar más información en la documentación sobre actualización en <a href="{$a}">{$a}</a>';
$string['upgradestart'] = 'Actualizar base de datos Moodle ahora';
$string['upgradesure'] = 'Sus archivos Moodle han sido modificados, y Usted está a punto de actualizar automáticamente su servidor a esta versión:<br /><br /><strong>
{$a}</strong><br /><br />
Una vez que haga esto, no podrá volver atrás.<br /><br />Por favor, note que este proceso puede tomar bastante tiempo.<br /><br />
¿Está seguro de que quiere actualizar este servidor a esta versión?';
$string['upgradetimedout'] = 'Se acabó el tiempo de actualización; por favor, reinicie la actualización.';
$string['upgradingdata'] = 'Actualizando los datos';
$string['upgradinglogs'] = 'Actualizando bitácoras';
$string['upgradingversion'] = 'Actualizando a la nueva versión';
$string['upwards'] = 'en adelante';
$string['useblogassociations'] = 'Habilitar asociaciones';
$string['useexternalyui'] = 'Usar librerías YUI en línea';
$string['usehtmleditor'] = 'Usar editor HTML';
$string['user'] = 'Usuario';
$string['userbulk'] = 'Acciones de usuario masivas';
$string['userlist'] = 'Ojear lista de usuarios';
$string['userpolicies'] = 'Políticas para usuarios';
$string['userpreference'] = 'Preferencias del usuario';
$string['userquota'] = 'Cuota del usuario';
$string['users'] = 'Usuarios';
$string['usesitenameforsitepages'] = 'Usa el nombre del sitio en las páginas del sitio';
$string['usetags'] = 'Habilitar funcionalidad de las marcas (tags)';
$string['validateerror'] = 'Este valor no es válido:';
$string['verifychangedemail'] = 'Restringir los dominios cuando se modifique el correo electrónico';
$string['warningcurrentsetting'] = 'Valor actual no válido: {$a}';
$string['warningiconvbuggy'] = 'iSu versión de la biblioteca de iconv no soporta el modificador  //IGNORE . Usted debe instalar la extensión mbstring que puede emplearse en su lugar para limpiar cadenas que contengan caracteres UTF-8 inválidos..';
$string['webproxy'] = 'Proxy web';
$string['webproxyinfo'] = 'Rellene las siguientes opciones si su servidor Moodle no puede acceder directamente a internet. Es necesario para descargar datos de contexto, paquetes de idioma, canales RSS, zonas horarias, etc.<br /><em>Es muy recomendable la extensión PHP cURL.</em>';
$string['xmlrpcrecommended'] = 'La extensión opcional xmlrpc será necesaria para la funcionalidad de la Red Moodle, la conexión a un hub o a los Servicios Web (Web Services)';
$string['yuicomboloading'] = 'Carga de combo YUI';
$string['ziprequired'] = 'Moodle requiere ahora la extensión Zip PHP. Ya no se usan ni las binarias info-ZIP ni la librería PclZip.';
