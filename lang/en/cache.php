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
 * Strings for component 'cache', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   cache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Acciones';
$string['addinstance'] = 'Añadir instancia';
$string['addlocksuccess'] = 'Se añadió exitosamente una nueva instancia de bloqueo de caché (lock)';
$string['addnewlockinstance'] = 'Añadir una nueva instancia de bloqueo de caché (lock)';
$string['addstore'] = 'Añadir {$a} almacén';
$string['addstoresuccess'] = 'Se añadió exitosamente un nuevo almacén de {$a}.';
$string['area'] = 'Área';
$string['cacheadmin'] = 'Administración de caché';
$string['cacheconfig'] = 'Configuración';
$string['cachedef_calendar_subscriptions'] = 'Suscripciones al calendario';
$string['cachedef_config'] = 'Configuraciones';
$string['cachedef_coursecat'] = 'Lista de categorías de curso para usuario particular';
$string['cachedef_coursecatrecords'] = 'Registros de categorías de cursos';
$string['cachedef_coursecattree'] = 'Árbol de categorías de cursos';
$string['cachedef_coursecontacts'] = 'Lista de contactos del curso';
$string['cachedef_databasemeta'] = 'Meta Información de Base de Datos';
$string['cachedef_eventinvalidation'] = 'Invalidación de evento';
$string['cachedef_externalbadges'] = 'Insignias externas para usuario particular';
$string['cachedef_groupdata'] = 'Información de grupo de curso';
$string['cachedef_htmlpurifier'] = 'Purificador de HTML - contenido limpiado';
$string['cachedef_locking'] = 'Bloqueando';
$string['cachedef_plugininfo_base'] = 'Información del plugin - base';
$string['cachedef_plugininfo_block'] = 'Información del plugin - bloques';
$string['cachedef_plugininfo_filter'] = 'Información del plugin - filtro';
$string['cachedef_plugininfo_mod'] = 'Información del plugin - módulos de actividad';
$string['cachedef_plugininfo_portfolio'] = 'Información del plugin - portafolios';
$string['cachedef_plugininfo_repository'] = 'Información del plugin - repositorios';
$string['cachedef_pluginlist'] = 'Lista de plugins';
$string['cachedef_plugintypes'] = 'Tipos de plugins';
$string['cachedef_questiondata'] = 'Definiciones de preguntas';
$string['cachedef_repositories'] = 'Datos de instancias de repositorios';
$string['cachedef_string'] = 'Caché de cadenas de idioma';
$string['cachedef_yuimodules'] = 'Definiciones del Módulo YUI';
$string['cachelock_file_default'] = 'Bloqueo de archivo por defecto';
$string['cachestores'] = 'Almacenes de caché';
$string['caching'] = 'Caché';
$string['component'] = 'Componente';
$string['confirmlockdeletion'] = 'Confirmar eliminación de bloqueo de caché (lock)';
$string['confirmstoredeletion'] = 'Confirme borrado de almacén';
$string['default_application'] = 'Almacén de aplicación por defecto';
$string['defaultmappings'] = 'Almacenes usados cuando no hay mapeo presente';
$string['defaultmappings_help'] = 'Estos son los almacenes por defecto que serán usados si Usted no mapea uno o más almacenes para la definición del caché';
$string['default_request'] = 'Almacén de solicitud por defecto';
$string['default_session'] = 'Almacén de sesión por defecto';
$string['defaultstoreactions'] = 'Los almacenes por defecto no pueden modificarse';
$string['definition'] = 'Definición';
$string['definitionsummaries'] = 'Definiciones de caché conocidas';
$string['delete'] = 'Eliminar';
$string['deletelock'] = 'Eliminar bloqueo de caché (lock)';
$string['deletelockconfirmation'] = '¿Está seguro de querer eliminar el bloqueo de caché (lock) {$a} ?';
$string['deletelockhasuses'] = 'Usted no puede eliminar esta instancia de bloqueo de caché (lock) porque está siendo utilizada por uno o más almacenes.';
$string['deletelocksuccess'] = 'Se eliminó exitosamente el bloqueo de caché.';
$string['deletestore'] = 'Eliminar almacén';
$string['deletestoreconfirmation'] = '¿Está seguro de querer eliminar el almacén  "{$a}" ?';
$string['deletestorehasmappings'] = 'Usted no puede eliminar este almacén porque tiene mapeos. Por favor elimine todos los mapeos antes de eliminar el almacén.';
$string['deletestoresuccess'] = 'Se eliminó exitosamente el almacén de caché';
$string['editdefinitionmappings'] = 'Mapeos de almacén definiciones {$a}';
$string['editdefinitionsharing'] = 'Editar compartición de definición para {$a}';
$string['editmappings'] = 'Editar mapeos';
$string['editsharing'] = 'Editar compartición';
$string['editstore'] = 'Editar almacén';
$string['editstoresuccess'] = 'Se editó exitosamente el almacén de caché';
$string['ex_configcannotsave'] = 'No se pudo guardar la configuración del caché al archivo.';
$string['ex_nodefaultlock'] = 'No se pudo encontrar una instancia de bloqueo por defecto.';
$string['ex_unabletolock'] = 'No se pudo adquirir un bloqueo para cachear.';
$string['ex_unmetstorerequirements'] = 'Usted no puede usar este almacén actualmente. Por favor vea la documentación para determinar los requisitos.';
$string['gethit'] = 'Obtener (Get) - Acierto (Hit)';
$string['getmiss'] = 'Obtener (Get) - Falla (Miss)';
$string['invalidlock'] = 'bloqueo de caché inválido';
$string['invalidplugin'] = 'Plugin inválido';
$string['invalidstore'] = 'Almacén de caché proporcionado inválido';
$string['lockdefault'] = 'Por defecto';
$string['lockingmeans'] = 'Mecanismo de bloqueo de archivo de caché (locking). Se adquiere un bloqueo para asegurarse de que nada más use un recurso al mismo tiempo que el código que adquirió el bloqueo';
$string['lockmethod'] = 'Método de bloqueo';
$string['lockmethod_help'] = 'Este es el método usado para bloquear cuando se requiera para este almacén.';
$string['lockname'] = 'Nombre';
$string['locknamedesc'] = 'El nombre debe ser único y sólamente puede consistir de los siguientes caracteres: a-z   A-Z   _';
$string['locknamenotunique'] = 'El nombre que Usted ha seleccionado no es único. Por favor seleccione un nombre único.';
$string['locksummary'] = 'Resumen de instancias de bloqueos de caché';
$string['locktype'] = 'Tipo';
$string['lockuses'] = 'Usos';
$string['mappingdefault'] = '(por defecto)';
$string['mappingfinal'] = 'Almacén final';
$string['mappingprimary'] = 'Almacén primario';
$string['mappings'] = 'Mapeos almacén';
$string['mode'] = 'Modo';
$string['mode_1'] = 'Aplicación';
$string['mode_2'] = 'Sesión';
$string['mode_4'] = 'Solicitud';
$string['modes'] = 'Modos';
$string['nativelocking'] = 'Este plugin maneja su propio bloqueo.';
$string['none'] = 'Ninguno';
$string['plugin'] = 'Plugin';
$string['pluginsummaries'] = 'Almacenes de caché instalados';
$string['purge'] = 'Purgar';
$string['purgedefinitionsuccess'] = 'La definición solicitada fue exitosamente purgada.';
$string['purgestoresuccess'] = 'Se purgó exitosamente el almacén solicitado.';
$string['requestcount'] = 'Probar con {$a} solicitudes';
$string['rescandefinitions'] = 'Re-revisar definiciones';
$string['result'] = 'Resultado';
$string['set'] = 'Configurar';
$string['sharing'] = 'Compartición';
$string['sharing_all'] = 'Todos.';
$string['sharing_help'] = 'Ésto le permite a Usted determinar cómo será compartida la caché de datos si tiene una configuración en cluster, o si tiene sitios múltiples que estén todos configurados con el mismo almacén y desea compartir los datos. Ésta es una configuración avanzada, por favor aségurese de que entiende su propósito antes de cambiarla.';
$string['sharing_input'] = 'Clave personalizada (escribir debajo)';
$string['sharingrequired'] = 'Usted debe seleccionar al menos una opción de compartición.';
$string['sharingselected_all'] = 'Todos';
$string['sharingselected_input'] = 'Clave personalizada';
$string['sharingselected_siteid'] = 'Identificador del sitio';
$string['sharingselected_version'] = 'Versión';
$string['sharing_siteid'] = 'Sitios con la misma ID de sitio';
$string['sharing_version'] = 'Sitios que corren la misma versión.';
$string['storeconfiguration'] = 'Guardar configuración';
$string['store_default_application'] = 'Almacén de archivo por defecto para los cachés de aplicación';
$string['store_default_request'] = 'Almacén estático por defecto para los cachés de solicitudes';
$string['store_default_session'] = 'Almacén de sesión por defecto para los cachés de sesión';
$string['storename'] = 'Nombre de almacén';
$string['storenamealreadyused'] = 'Usted debe elegir un nombre único para este almacén';
$string['storename_help'] = 'Esto configura el nombre del almacén. Se usa para identificar el almacén dentro del sistema y solamente puede consistir de caracteres a-z A-Z 0-9 -_ y espacios. También debe ser único. Si intenta usar un nombre que ya haya sido usado, recibirá un mensaje de error.';
$string['storenameinvalid'] = 'Nombre de almacén inválido. Usted solamente puede usar letras de a-z A-Z números de 0-9 el caracter de subrayado _ y espacios.';
$string['storenotready'] = 'Almacenamiento no listo';
$string['storeperformance'] = 'Reporte del desempeño de almacén de caché - {$a} solicitudes únicas por operación.';
$string['storeready'] = 'Listo';
$string['storerequiresattention'] = 'Requiere atención.';
$string['storerequiresattention_help'] = 'Esta instancia de almacenamiento no está lista para usarse, pero tiene mapeos. Al arreglar este asunto se mejorará el desempeño de su sistema. Por favor revise que la parte trasera (backend) del almacenamiento está lista para usarse y que se han cumplido todos los requirimientos de PHP.';
$string['storeresults_application'] = 'Solicitudes de almacén cuando se usa como caché de aplicación.';
$string['storeresults_request'] = 'Solicitudes de almacén cuando se usa como caché de solicitudes.';
$string['storeresults_session'] = 'Solicitudes de almacén cuando se usa como caché de sesión.';
$string['stores'] = 'Almacenes';
$string['storesummaries'] = 'Instancias de almacenes configuradas';
$string['supports'] = 'Soporta';
$string['supports_dataguarantee'] = 'datos garantizados';
$string['supports_keyawareness'] = 'consciente de clave (key awareness)';
$string['supports_multipleidentifiers'] = 'identificadores múltiples';
$string['supports_nativelocking'] = 'bloqueo';
$string['supports_nativettl'] = 'TTL';
$string['supports_searchable'] = 'buscando por clave';
$string['tested'] = 'Probado';
$string['testperformance'] = 'Probar rendimiento';
$string['unsupportedmode'] = 'Modo no soportado';
$string['untestable'] = 'No puede probarse';
$string['userinputsharingkey'] = 'Clave personalizada para compartir';
$string['userinputsharingkey_help'] = 'Escriba su propia clave privada aquí. Cuando Usted configure otros almacenes en otros sitios con los que desea compartir datos, asegúrese de que configura exactamente la misma clave aquí.';
