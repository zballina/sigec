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
 * Strings for component 'enrol_ldap', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   enrol_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Assignando rol \'{$a->role_shortname}\' al usuario \'{$a->user_username}\' dentro del curso  \'{$a->course_shortname}\' (id {$a->course_id})';
$string['assignrolefailed'] = 'No se pudo asignar el rol \'{$a->role_shortname}\' al usuario \'{$a->user_username}\' dentro del curso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['autocreate'] = 'Los cursos pueden crearse automáticamente si existen inscripciones en un curso que aún no existe en Moodle. </p><p>ISi Usted está empleando la creación automática de cursos, se recomienda que remueva los siguientes permisos: moodle/course:changeidnumber, moodle/course:changeshortname, moodle/course:changefullname and moodle/course:changesummary,
de los roles relevantes para impedir modificaciones a los cuatro campos del curso especificados arriba (ID number, shortname, fullname and summary).</p>';
$string['autocreate_key'] = 'Creación automática';
$string['autocreation_settings'] = 'Ajustes para la creación automática de cursos';
$string['bind_dn'] = 'Si desea usar \'bind-user\' para buscar usuarios, especifíquelo aquí. Algo como \'cn=ldapuser,ou=public,o=org';
$string['bind_dn_key'] = 'Enlazar nombre completo del usuario';
$string['bind_pw'] = 'Contraseña para \'bind-user\'.';
$string['bind_pw_key'] = 'Contraseña';
$string['bind_settings'] = 'Configuración de enlazado (bind)';
$string['cannotcreatecourse'] = 'No se puede crear el curso: faltan datos necesarios del registro LDAP';
$string['category'] = 'Categoría para cursos auto-creados.';
$string['category_key'] = 'Categoría';
$string['contexts'] = 'Contextos LDAP';
$string['couldnotfinduser'] = 'No se pudo encontrar el usuario \'{$a}\', omitido';
$string['course_fullname'] = 'Opcional: campo LDAP del que conseguir el nombre completo.';
$string['course_fullname_key'] = 'Nombre completo';
$string['course_idnumber'] = 'Mapa del identificador único en LDAP, normalmente  <em>cn</em> or <em>uid</em>. Se recomienda bloquear el valor si se está utilizando la creación automática del curso.';
$string['course_idnumber_key'] = 'Número ID';
$string['coursenotexistskip'] = 'El curso \'{$a}\' no existe y la auto-creación está deshabilitada, se omite.';
$string['course_search_sub'] = 'Buscar membresías al grupo desde subcontextos';
$string['course_search_sub_key'] = 'Buscar subcontextos';
$string['course_settings'] = 'Ajustes de inscripción de Curso';
$string['course_shortname'] = 'Opcional: campo LDAP del que conseguir el nombre corto.';
$string['course_shortname_key'] = 'Nombre corto';
$string['course_summary'] = 'Opcional: campo LDAP del que conseguir el sumario.';
$string['course_summary_key'] = 'Resumen';
$string['createcourseextid'] = 'CREATE Usuario inscrito a un curso inexistente \'{$a->courseextid}';
$string['createnotcourseextid'] = 'Usuario inscrito a un curso inexistente \'{$a->courseextid}';
$string['creatingcourse'] = 'Creando curso \'{$a}\'...';
$string['duplicateshortname'] = 'Falla al crear curso. Nombre corto duplicado Saltándose al curso con idnumber \'{$a->idnumber}\'...';
$string['editlock'] = 'Bloquear valor';
$string['emptyenrolment'] = 'Inscripción vacía para el rol \'{$a->role_shortname}\' en el curso \'{$a->course_shortname}';
$string['enrolname'] = 'LDAP';
$string['enroluser'] = 'Inscribir al usuario \'{$a->user_username}\' en el curso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['enroluserenable'] = 'Se habilitó la inscripción para el usuario \'{$a->user_username}\' en el curso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['explodegroupusertypenotsupported'] = 'ldap_explode_group() no soporta el tipo de usuario seleccionado: {$a}';
$string['extcourseidinvalid'] = 'La id del curso externo no es válido';
$string['extremovedsuspend'] = 'La inscripción está deshabilitada para el usuario \'{$a->user_username}\' en el curso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['extremovedsuspendnoroles'] = 'La inscripción está deshabilitada y se han eliminado los roles para el usuario\'{$a->user_username}\' en el curso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['extremovedunenrol'] = 'Dar de baja (des-inscribir) al usuario \'{$a->user_username}\' del curso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['failed'] = 'Error';
$string['general_options'] = 'Opciones generales';
$string['group_memberofattribute'] = 'Nombre del atributo que especifica a que grupos pertenece un usurio o grupo determinado (por ejemplo: memberOf, groupMembership, etc.)';
$string['group_memberofattribute_key'] = 'Atributo \'Miembro de';
$string['host_url'] = 'Especifique el host LDAP en formato URL, e.g.,  \'ldap://ldap.myorg.com/\'
or \'ldaps://ldap.myorg.com/';
$string['host_url_key'] = 'URL del servidor';
$string['idnumber_attribute'] = 'Si la membresía del grupo contiene nombres distinguidos, especifique el mismo atributo que Usted ha empleado para el mapeo del usuario \'ID Number\'  en la configuración de autenticación LDAP';
$string['idnumber_attribute_key'] = 'Atributo de número ID';
$string['ldap_encoding'] = 'Especifique la codificación empleada por el servidor LDAP. Muy probablemente es utf-8, MS AD v2 usea codificación de plataforma por defectotales como cp1252, cp1250, etc.';
$string['ldap_encoding_key'] = 'Codificación LDAP';
$string['ldap:manage'] = 'Gestionar instancias de inscripción LDAP';
$string['memberattribute'] = 'Atributo de miembro LDAP';
$string['memberattribute_isdn'] = 'Si la membresía del grupo contiene nombres distinguidos, Usted debe especificarlo aquí. Si así fuera, Usted necesita configurar los ajustes restantes de esta sección.';
$string['memberattribute_isdn_key'] = 'El atributo de miembro usa dn';
$string['nested_groups'] = '¿Desea usar grupos anidados (i.e., grupos de grupos) para la inscripción?';
$string['nested_groups_key'] = 'Grupos anidados';
$string['nested_groups_settings'] = 'Configuración de grupos anidados';
$string['nosuchrole'] = 'No existe ese rol: \'{$a}';
$string['objectclass'] = 'objectClass usada para buscar cursos. Normalmente
\'posixGroup\'.';
$string['objectclass_key'] = 'Clase del objeto';
$string['ok'] = 'Ok';
$string['opt_deref'] = 'Si la membresía del grupo contiene nombres distinguidos, especifique cómo se manejarán los alias durante la búsqueda. Elija uno de los siguientes valores: \'No\' (LDAP_DEREF_NEVER) o \'Yes\' (LDAP_DEREF_ALWAYS)';
$string['opt_deref_key'] = 'Des-referenciar alias';
$string['phpldap_noextension'] = '<em>El módulo PHP LDAP no parecen estar presente. Por favor, asegúrese de que está instalado y habilitado si desea utilizar este módulo de inscripción.</em>';
$string['pluginname'] = 'Inscripciones LDAP';
$string['pluginname_desc'] = '<p>Usted puede utilizar un servidor LDAP para controlar sus inscripciones. Se asume que su árbol LDAP contiene grupos que apuntan a los cursos, y que cada uno de esos grupos o cursos contienen entradas de inscripción que hacen referencia a los estudiantes.</p> <p>Se asume que los cursos están definidos como grupos en LDAP, de modo que cada grupo tiene múltiples campos de inscripción (<em>member</em> or <em>memberUid</em>) que contienen una identificación única del usuario.</p> <p>Para usar la inscripción LDAP, los usuarios <strong>deben</strong> tener un campo \'idnumber\' válido. Los grupos LDAP deben contener ese \'idnumber\' en los campos de membresía para que un usuario pueda inscribirse en un curso. Esto normalmente funcionará bien si usted ya está usando la autenticación LDAP.</p> <p>Las inscripciones se actualizarán cuando el usuario se identifica. Consulte en <em>enrol/ldap/enrol_ldap_sync.php</em>.</p> <p>Este plugin puede también ajustarse para crear nuevos cursos de forma automática cuando aparecen nuevos grupos en LDAP.</p>';
$string['pluginnotenabled'] = 'El plugin no está habilitado';
$string['role_mapping'] = '<p>Para cada rol que quiera asignar desde LDAP, necesita especificar la lista de contextos sonde se localizan los grupos de roles de curso. Separe contextos diferentes con \';\'.</p><p>También deberá especificar el atributo que usa su servidor LDAP para mantener los miembros de un grupo. Usualmente es \'member\' o \'memberUid\'</p>';
$string['role_mapping_attribute'] = 'Atributo de miembro LDAP para {$a}';
$string['role_mapping_context'] = 'Contextos de LDAP para {$a}';
$string['role_mapping_key'] = 'Mapa de roles de LDAP';
$string['roles'] = 'Mapeo de roles';
$string['server_settings'] = 'Configuración del Servidor LDAP';
$string['synccourserole'] = '== Sincronizando al curso  \'{$a->idnumber}\' para rol \'{$a->role_shortname}';
$string['template'] = 'Opcional: los cursos auto-creados pueden copiar sus ajustes a partir de un curso-plantilla.';
$string['template_key'] = 'Plantilla';
$string['unassignrole'] = 'Des-asignando el rol \'{$a->role_shortname}\' al usuario \'{$a->user_username}\' del curso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['unassignrolefailed'] = 'No se pudo des-asignar el rol \'{$a->role_shortname}\' al usuario \'{$a->user_username}\' del curso \'{$a->course_shortname}\' (id {$a->course_id})';
$string['unassignroleid'] = 'Des-asignando rol con ID \'{$a->role_id}\' al usuario con ID \'{$a->user_id}';
$string['updatelocal'] = 'Actualizar datos locales';
$string['user_attribute'] = 'Si la membresía del grupo contiene nombres distinguidos, especifique el atributo empleado para nombrar/buscar usuarios. Si Usted emplea autenticación LDAP, este valor debería concordar con el atributo especificado en el mapeo \'ID Number\' en el plugin de autenticación LDAP.';
$string['user_attribute_key'] = 'ID de atributo de número';
$string['user_contexts'] = 'Si la membresía del grupo contiene nombres distinguidos, especifique la lista de contextos donde se asignan los usuarios. Separe contextos diferentes con \';\'. Por ejemplo: \'ou=users,o=org; ou=others,o=org';
$string['user_contexts_key'] = 'Contextos';
$string['user_search_sub'] = 'Si la membresía del grupo contiene nombres distinguidos, especifique si la búsqueda de usuarios también se realiza en subcontextos.';
$string['user_search_sub_key'] = 'Buscar subcontextos';
$string['user_settings'] = 'Configuración de búsqueda de usuario';
$string['user_type'] = 'Si la membresía del grupo contiene nombres distinguidos, especifique cómo se almacenan los usuarios en LDAP';
$string['user_type_key'] = 'Tipo de usuario';
$string['version'] = 'Versión del protocolo LDAP usado por el servidor.';
$string['version_key'] = 'Versión';
