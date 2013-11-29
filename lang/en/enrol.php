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
 * Strings for component 'enrol', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   enrol
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actenrolshhdr'] = 'Plugins de inscripción a curso disponibles';
$string['addinstance'] = 'Añadir método';
$string['ajaxnext25'] = 'Siguientes 25...';
$string['ajaxoneuserfound'] = '1 usuario encontrado';
$string['ajaxxusersfound'] = '{$a} usuarios encontrados';
$string['assignnotpermitted'] = 'No tiene permiso o no puede asignar roles en este curso';
$string['bulkuseroperation'] = 'Operación de usuario masiva';
$string['configenrolplugins'] = 'Por favor, seleccione todos los plugins requeridos y colóquelos en el orden adecuado.';
$string['custominstancename'] = 'Nombre de instancia a la medida';
$string['defaultenrol'] = 'Agregar instancia a cursos nuevos';
$string['defaultenrol_desc'] = 'Si es posible añadir este plugin a todos los cursos nuevos por defecto';
$string['deleteinstanceconfirm'] = 'Usted está a punto de eliminar el método de inscripción  "{$a->name}". Todos los {$a->users} usuarios actualmente inscritos usando este método serán des-inscritos (dados de baja) y todos los datos relacionados con el curso, como las calificaciones, membresía de grupos o suscripciones a foro de los usuarios se eliminarán

¿Está seguro de querer continuar?';
$string['deleteinstancenousersconfirm'] = 'Usted está a punto de eliminar el método de inscripción  "{$a->name}". ¿Está seguro de querer continuar?';
$string['durationdays'] = '{$a} días';
$string['editenrolment'] = 'Editar inscripción';
$string['enrol'] = 'Inscribir';
$string['enrolcandidates'] = 'Usuarios no inscritos';
$string['enrolcandidatesmatching'] = 'Usuarios no inscritos que coinciden';
$string['enrolcohort'] = 'Inscribir cohorte';
$string['enrolcohortusers'] = 'Inscribir usuarios';
$string['enrollednewusers'] = 'Nuevos usuarios {$a} inscritos con éxito';
$string['enrolledusers'] = 'Usuarios inscritos';
$string['enrolledusersmatching'] = 'Usuarios inscritos que coinciden';
$string['enrolme'] = 'Inscribirme en este curso';
$string['enrolmentinstances'] = 'Métodos de inscripción';
$string['enrolmentnew'] = 'Nueva inscripción en {$a}';
$string['enrolmentnewuser'] = '{$a->user} se ha inscrito en el curso "{$a->course}"';
$string['enrolmentoptions'] = 'Opciones de inscripción';
$string['enrolments'] = 'Inscripciones';
$string['enrolnotpermitted'] = 'No tiene permiso o no puede realizar inscripciones en este curso';
$string['enrolperiod'] = 'Período de vigencia de la inscripción';
$string['enroltimecreated'] = 'Inscripción creada';
$string['enroltimeend'] = 'La inscripción finaliza';
$string['enroltimestart'] = 'La inscripción comienza';
$string['enrolusage'] = 'Instancias / inscripciones';
$string['enrolusers'] = 'Inscribir usuarios';
$string['errajaxfailedenrol'] = 'No se pudo inscribir al usuario';
$string['errajaxsearch'] = 'Error al buscar usuarios';
$string['erroreditenrolment'] = 'Se produjo un error al intentar modificar una inscripción de usuario';
$string['errorenrolcohort'] = 'Error al crear instancia de inscripción sync de cohorte en este curso.';
$string['errorenrolcohortusers'] = 'Error al inscribir a los miembros de la cohorte en este curso.';
$string['errorthresholdlow'] = 'El umbral de notificación debe ser cuando menos de 1 día.';
$string['errorwithbulkoperation'] = 'Se produjo un error mientras se procesaban sus cambios de inscripciones masivas';
$string['expirynotify'] = 'Notificar antes de que caduque la inscripción';
$string['expirynotifyall'] = 'Persona que inscribe y usuario inscrito';
$string['expirynotifyenroller'] = 'Persona que inscribe solamente';
$string['expirynotify_help'] = 'Esta configuración determina si es que se mandan mensajes de notificación respecto a caducidad de inscripción.';
$string['expirynotifyhour'] = 'Hora a la cual se mandan notificaciones de caducidad de inscripción';
$string['expirythreshold'] = 'Umbral de notificación';
$string['expirythreshold_help'] = '¿Cuanto tiempo antes de la caducidad debería de notificárseles a los usuarios?';
$string['extremovedaction'] = 'Acción de desinscripción externa';
$string['extremovedaction_help'] = 'Seleccione una acción para llevar a cabo cuando la inscripción de los usuarios desaparece de la fuente de inscripción externa. Tenga en cuenta que algunos datos y ajustes de los usuarios son purgados del curso durante la desinscripción del curso.';
$string['extremovedkeep'] = 'Mantener inscrito al usuario';
$string['extremovedsuspend'] = 'Deshabilitar la inscripción en el curso';
$string['extremovedsuspendnoroles'] = 'Deshabilitar la inscripción en el curso y eliminar los roles';
$string['extremovedunenrol'] = 'Dar de baja (des-inscribir) al usuario del curso';
$string['finishenrollingusers'] = 'Terminar de inscribir usuarios';
$string['invalidenrolinstance'] = 'Ejemplo de inscripción no válido';
$string['invalidrole'] = 'Rol no válido';
$string['manageenrols'] = 'Gestionar plugins de inscripción';
$string['manageinstance'] = 'Gestionar';
$string['nochange'] = 'Sin cambios';
$string['noexistingparticipants'] = 'No existen participantes';
$string['noguestaccess'] = 'Los invitados no pueden acceder a este curso, por favor intente identificarse.';
$string['none'] = 'Ninguno';
$string['notenrollable'] = 'Usted no se puede inscribir en este curso.';
$string['notenrolledusers'] = 'Otros usuarios';
$string['otheruserdesc'] = 'Los siguientes usuarios no están inscritos en este curso pero tienen roles (heredados o asignados en el curso).';
$string['participationactive'] = 'Activo';
$string['participationstatus'] = 'Status';
$string['participationsuspended'] = 'Suspendido';
$string['periodend'] = 'hasta {$a}';
$string['periodnone'] = 'inscrito {$a}';
$string['periodstart'] = 'desde {$a}';
$string['periodstartend'] = 'desde {$a->start} hasta {$a->end}';
$string['recovergrades'] = 'Es posible recuperar las calificaciones de usuario antiguas';
$string['rolefromcategory'] = '{$a->role} (Heredado de la categoría de curso)';
$string['rolefrommetacourse'] = '{$a->role} (Heredado del curso padre)';
$string['rolefromsystem'] = '{$a->role} (Asignado a nivel de sitio)';
$string['rolefromthiscourse'] = '{$a->role} (Asignado en este curso)';
$string['startdatetoday'] = 'Hoy';
$string['synced'] = 'Sincronizado';
$string['totalenrolledusers'] = '{$a} usuarios inscritos';
$string['totalotherusers'] = '{$a} otros usuarios';
$string['unassignnotpermitted'] = 'No tiene permiso para retirar roles en este curso';
$string['unenrol'] = 'Dar de baja (des-inscribir)';
$string['unenrolconfirm'] = '¿Realmente desea dar de baja (des-inscribir) al usuario "{$a->user}" del curso "{$a->course}"';
$string['unenrolme'] = 'Darme de baja (des-inscribir) en {$a}';
$string['unenrolnotpermitted'] = 'No dispone de permiso o no puede dar de baja a este usuario de este curso.';
$string['unenrolroleusers'] = 'Dar de baja (des-inscribir) a usuarios';
$string['uninstallconfirm'] = 'Está a punto de eliminar completamente el plugin de inscripción \'{$a}\'. Esta acción eliminará completamente toda la información en la base de datos asociada con este tipo de inscripción, incluyendo calificaciones de usuarios, membresía a grupos, suscripciones a foros y otros datos relacionados con el curso.

 ¿Está SEGURO de que desea continuar?';
$string['uninstalldelete'] = 'Borrar todas las inscripciones y desinstalar';
$string['uninstalldeletefiles'] = 'Todos los datos asociados con el plugin de inscripción \'{$a->plugin}\' han sido eliminados de la base de datos. Para completar la eliminación (y evitar que el plugin vuelva a instalarse automáticamente), debería eliminar ahora este directorio de su servidor: {$a->directory}';
$string['uninstallmigrate'] = 'Desinstalar, pero mantener todas las inscripciones';
$string['uninstallmigrating'] = 'Migrando "{$a}" inscripciones';
$string['unknowajaxaction'] = 'Se ha solicitado una acción desconocida';
$string['unlimitedduration'] = 'Sin límite';
$string['usersearch'] = 'Buscar';
$string['withselectedusers'] = 'Con los usuarios seleccionados';
