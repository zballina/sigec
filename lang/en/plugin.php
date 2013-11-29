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
 * Strings for component 'plugin', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   plugin
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Acciones';
$string['availability'] = 'Disponibilidad';
$string['checkforupdates'] = 'Revisar actualizaciones disponibles';
$string['checkforupdateslast'] = 'La última revisión se hizo el {$a}';
$string['detectedmisplacedplugin'] = 'El plugin "{$a->component}" está instalado en una localización incorrecta "{$a->current}", la localización esperada es "{$a->expected}"';
$string['displayname'] = 'Nombre del plugin';
$string['err_response_curl'] = 'No pudo obtener actualizaciones disponibles - error cURL inesperado.';
$string['err_response_format_version'] = 'Formato de respuesta con versión inesperada. Por favor trate de revisar nuevamente las actualizaciones disponibles.';
$string['err_response_http_code'] = 'No pudo obtener actualizaciones disponibles - código de respuesta HTTP inesperado.';
$string['filterall'] = 'Mostrar todos';
$string['filtercontribonly'] = 'Mostrar únicamente complementos';
$string['filtercontribonlyactive'] = 'Mostrando únicamente complementos';
$string['filterupdatesonly'] = 'Mostrar únicamente actualizables';
$string['filterupdatesonlyactive'] = 'Mostrando únicamente actualizables';
$string['moodleversion'] = 'Moodle {$a}';
$string['nonehighlighted'] = 'No hay plugins que requieran atención ahora';
$string['nonehighlightedinfo'] = 'Mostrar la lista de todos los plugins instalados de cualquier forma';
$string['noneinstalled'] = 'No hay plugins instalados de este tipo';
$string['notdownloadable'] = 'No puede descargarse el paquete';
$string['notdownloadable_help'] = 'El paquete ZIP con la actualización no pudo descargarse automáticamente. Por favor diríjase a la página de documentación para más ayuda.';
$string['notes'] = 'Notas';
$string['notwritable'] = 'Los archivos de plugins no son escribibles';
$string['notwritable_help'] = 'Usted ha habilitado que se implementen actualizaciones automáticas y hay una actualización disponible para este plugin. Sin embargo, los archivos del plugin no son escribibles para el servidor web, por lo que no se pudo instalar automáticamente la actualización por el momento.

Haga que la carpeta del plugin y todos sus contenidos sean escribibles para poder instalar automáticamente la actualización disponible automáticamente.';
$string['numdisabled'] = 'Deshabilitados: {$a}';
$string['numextension'] = 'Complementos: {$a}';
$string['numtotal'] = 'Instalados: {$a}';
$string['numupdatable'] = 'Actualizaciones disponibles: {$a}';
$string['otherplugin'] = '{$a->component}';
$string['otherpluginversion'] = '{$a->component} ({$a->version})';
$string['pluginchecknotice'] = 'Esta página muestra los plugins que pueden requerir su atención durante la actualización. Los elementos resaltados incluyen nuevos plugins que están a punto de ser instalados, los que van a ser actualizados y los plugins anteriores que ahora faltan. Los complementos también se destacan si existe una actualización para ellos. Se recomienda que compruebe si existen versiones más recientes de los complementos y que les actualice su código fuente antes de continuar con esta actualización de Moodle.';
$string['plugindisable'] = 'Deshabilitar';
$string['plugindisabled'] = 'Deshabilitado';
$string['pluginenable'] = 'Habilitar';
$string['pluginenabled'] = 'Habilitado';
$string['requiredby'] = 'Requerido por: {$a}';
$string['requires'] = 'Requiere';
$string['rootdir'] = 'Directorio';
$string['settings'] = 'Configuraciones';
$string['showall'] = 'Recargar y mostrar todos los plugins';
$string['somehighlighted'] = 'Número de plugins que requieren su atención: {$a}';
$string['somehighlightedinfo'] = 'Mostrar la lista completa de plugins instalados';
$string['somehighlightedonly'] = 'Mostrar solamente los plugins que requieren su atención';
$string['source'] = 'Origen';
$string['sourceext'] = 'Complemento';
$string['sourcestd'] = 'Estándar';
$string['status'] = 'Status';
$string['status_delete'] = 'Para ser borrado';
$string['status_downgrade'] = 'Una versión mayor ya está instalada';
$string['status_missing'] = '¡Ausente del disco!';
$string['status_new'] = 'Para instalarse';
$string['status_nodb'] = 'Ninguna base de datos';
$string['status_upgrade'] = 'Para ser actualizada';
$string['status_uptodate'] = 'Instalada';
$string['systemname'] = 'Identificador';
$string['type_auth'] = 'Método de autenticación';
$string['type_auth_plural'] = 'Métodos de autenticación';
$string['type_block'] = 'Bloque';
$string['type_block_plural'] = 'Bloques';
$string['type_cachelock'] = 'Manejador de bloqueo de caché';
$string['type_cachelock_plural'] = 'Manejadores de bloqueo de caché';
$string['type_cachestore'] = 'Almacén de caché';
$string['type_cachestore_plural'] = 'Almacenes de caché';
$string['type_coursereport'] = 'Reporte de curso';
$string['type_coursereport_plural'] = 'Resportes de curso';
$string['type_editor'] = 'Editor';
$string['type_editor_plural'] = 'Editores';
$string['type_enrol'] = 'Método de inscripción';
$string['type_enrol_plural'] = 'Métodos de inscripción';
$string['type_filter'] = 'Filtro de texto';
$string['type_filter_plural'] = 'Filtros de texto';
$string['type_format'] = 'Formato de curso';
$string['type_format_plural'] = 'Formatos de curso';
$string['type_gradeexport'] = 'Método de exportación de calificaciones';
$string['type_gradeexport_plural'] = 'Métodos de exportación de calificaciones';
$string['type_gradeimport'] = 'Método de importación de calificaciones';
$string['type_gradeimport_plural'] = 'Métodos de importación de calificaciones';
$string['type_gradereport'] = 'Reporte del libro de calificaciones';
$string['type_gradereport_plural'] = 'Reportes del libro de calificaciones';
$string['type_gradingform'] = 'Método avanzado de calificación';
$string['type_gradingform_plural'] = 'Métodos avanzados de calificación';
$string['type_local'] = 'Plugin local';
$string['type_local_plural'] = 'Plugins locales';
$string['type_message'] = 'Salida de mensajes';
$string['type_message_plural'] = 'Salidas de mensajes';
$string['type_mnetservice'] = 'Servicio MNet';
$string['type_mnetservice_plural'] = 'Servicios MNet';
$string['type_mod'] = 'Módulo de actividad';
$string['type_mod_plural'] = 'Módulos de actividad';
$string['type_plagiarism'] = 'Plugin de Prevención de plagio';
$string['type_plagiarism_plural'] = 'Plugins de prevención de plagio';
$string['type_portfolio'] = 'Portafolio';
$string['type_portfolio_plural'] = 'Portafolios';
$string['type_profilefield'] = 'Tipo de campo de perfil';
$string['type_profilefield_plural'] = 'Tipos de campos de perfiles';
$string['type_qbehaviour'] = 'Comportamiento de preguntas';
$string['type_qbehaviour_plural'] = 'Comportamientos de preguntas';
$string['type_qformat'] = 'Formato para importar/exportar preguntas';
$string['type_qformat_plural'] = 'Formatos para importar/exportar preguntas';
$string['type_qtype'] = 'Tipo de pregunta';
$string['type_qtype_plural'] = 'Tipos de preguntas';
$string['type_report'] = 'Reporte del sitio';
$string['type_report_plural'] = 'Reportes';
$string['type_repository'] = 'Repositorio';
$string['type_repository_plural'] = 'Repositorios';
$string['type_theme'] = 'Tema';
$string['type_theme_plural'] = 'Temas';
$string['type_tool'] = 'Herramienta de Administración';
$string['type_tool_plural'] = 'Herramientas de Administración';
$string['type_webservice'] = 'Protocolo Webservice';
$string['type_webservice_plural'] = 'Protocolos Webservice';
$string['uninstall'] = 'Desinstalar';
$string['uninstallconfirm'] = 'Usted está a punto de desinstalar el plugin <em>{$a->name}</em>. Esto borrará completamente todo en la BasedeDatos asociado con este plugin, incluyendo su configuración, registros de bitácoras, archivos del usuario gestionados por el plugin, etc. No hay vuelta atrás y Moodle por sí mismo no crea ningún respaldo para recuperación. ¿ Está seguro de que qiere continuar ?';
$string['uninstalldelete'] = 'Todos los datos asociados con el plugin <em>{$a->name}</em> han sido borrados de la BasedeDatos. Para mpedir que el  plugin se re-instale a sí mismo, su carpeta <em>{$a->rootdir}</em> debe ser ahora removida manualmente del servidor.  Moodle mismo no puede remover la carpeta debido a permisos de escritura.';
$string['uninstalldeleteconfirm'] = 'Todos los datos asociados con el plugin <em>{$a->name}</em> han sido borrados de la BasedeDatos. Para mpedir que el  plugin se re-instale a sí mismo, su carpeta <em>{$a->rootdir}</em> debe ser removida del servidor. ¿Desea Usted remover la carpeta del plugin ahora?';
$string['uninstalldeleteconfirmexternal'] = 'Al parecer, la versión actual del plugin fue obtenida mediante un sistema de manejo de código fuente ({$a}) checkout. Si Usted remueve la carpeta del plugin, puede perder modificaciones locales importantes del código. Por favor asegúrese de que definitivamente desea remover el plugin antes de continuar.';
$string['uninstalling'] = 'Desinstalando{$a->name}';
$string['updateavailable'] = '¡Existe una nueva versión {$a} disponible!';
$string['updateavailable_moreinfo'] = 'Más información ...';
$string['updateavailable_release'] = 'Versión {$a}';
$string['updatepluginconfirm'] = 'Confirmación de actualización de plugin';
$string['updatepluginconfirmexternal'] = 'Parece que la versión actual del plugin ha sido obtenida mediante el sistema de manejo de código fuente ({$a}). Si Usted instala esta actualización, Usted ya no podrá después obtener actualizaciones de plugins desde el  sistema de manejo de código fuente. Por favor, asegúrese que defininitivamente si desea actualizar el plugin antes de continuar.';
$string['updatepluginconfirminfo'] = 'Usted está a punto de instalar una nueva versión del plugin <strong>{$a->name}</strong>. Un paquete ZIP con la versión {$a->version} del plugin será descargado desde <a href="{$a->url}">{$a->url}</a> y será extraído a su instalación de Moodle, para que pueda actualizar su instalación.';
$string['updatepluginconfirmwarning'] = 'Por favor tome en cuenta que Moodle no hará automáticamente un respaldo de su base de datos antes de la actualización. Nosotros le recomendamos encarecidamente que haga un respaldo completo (instantánea) ahora, para lidiar con el raro caso en que el nuevo código tuviese defectos que hicieran a su sitio inoperante o inclusive que corrompiera su base de datos. Proceda bajo su propio riesgo.';
$string['version'] = 'Versión';
$string['versiondb'] = 'Versión actual';
$string['versiondisk'] = 'Nueva versión';
