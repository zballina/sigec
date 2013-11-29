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
 * Strings for component 'assign', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   assign
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Usted tiene tareas que requieren su atención';
$string['addattempt'] = 'Permitir otro intento';
$string['addnewattempt'] = 'Añadir un nuevo intento';
$string['addnewattemptfromprevious'] = 'Añadir un nuevo intento basado en un envío anterior';
$string['addnewattemptfromprevious_help'] = 'Esto copiará los contenidos de sus envíos previos a un nuevo envío, para que Usted trabaje en él.';
$string['addnewattempt_help'] = 'Esto creará un nuevo envío vacío, para que Usted trabaje en él.';
$string['addsubmission'] = 'Añadir envío';
$string['allowsubmissions'] = 'Permitir al usurio continuar haciendo entregas a esta tarea';
$string['allowsubmissionsanddescriptionfromdatesummary'] = 'Los detalles de la tarea y el formato de entrega estarán disponibles en <strong>{$a}</strong>';
$string['allowsubmissionsfromdate'] = 'Permitir envíos desde';
$string['allowsubmissionsfromdate_help'] = 'Si se habilita, los estudiantes no podrán envíar nada antes de esta fecha. Si se deshabilita, los estudiantes podrán empezar a enviar inmediatamente.';
$string['allowsubmissionsfromdatesummary'] = 'Esta tarea aceptará entregas de <strong>{$a}</strong>';
$string['allowsubmissionsshort'] = 'Permitir cambios en la entrega';
$string['alwaysshowdescription'] = 'Siempre mostrar descripción';
$string['alwaysshowdescription_help'] = 'Si está deshabilitado, la Descripción de la Tarea superior solo será visible para los estudiantes en la fecha "Permitir entregas desde",';
$string['applytoteam'] = 'Aplicar calificaciones y retroalimentación a todo el equipo';
$string['assign:addinstance'] = 'Añadir una nueva tarea';
$string['assign:exportownsubmission'] = 'Exportar entrega propia';
$string['assignfeedback'] = 'Plugin de retroalimentación';
$string['assignfeedbackpluginname'] = 'Plugin de retroalimentación';
$string['assign:grade'] = 'Calificar tarea';
$string['assign:grantextension'] = 'Otorgar extensión';
$string['assignmentisdue'] = 'La tarea ha vencido';
$string['assignmentmail'] = '{$a->grader} ha puesto una retroalimentación en su entrega a la tarea de \'{$a->assignment}\'

Usted puede verla añadida a su entrega: {$a->url}';
$string['assignmentmailhtml'] = '{$a->grader} ha puesto una retroalimentación en su entrega a la tarea de \'<i>{$a->assignment<7i>\'<br></br>\'

Usted puede verla añadida a su entrega: <a href="{$a->url}"';
$string['assignmentmailsmall'] = '{$a->grader} has puesto una retroalimentación en su entrega a la tarea de \'{$a->assignment}\'

Usted puede verla añadida a su entrega';
$string['assignmentname'] = 'Nombre de la tarea';
$string['assignmentplugins'] = 'Plugins de tarea';
$string['assignmentsperpage'] = 'Tareas por página';
$string['assign:revealidentities'] = 'Revelar las identidades de los estudiantes';
$string['assignsubmission'] = 'Plugin de entregas';
$string['assignsubmissionpluginname'] = 'Plugin de entregas';
$string['assign:submit'] = 'Enviar tarea';
$string['assign:view'] = 'Ver tarea';
$string['attemptheading'] = 'Intento {$a->attemptnumber}: {$a->submissionsummary}';
$string['attempthistory'] = 'Intentos previos';
$string['attemptnumber'] = 'Número de intento';
$string['attemptreopenmethod'] = 'Intentos reabiertos';
$string['attemptreopenmethod_help'] = 'Determina cómo se reabren los envíos de los estudiantes. Las opciones disponibles son: <ul><li>Nunca- El envío del estudiante no puede ser reabierto.
</li><li>Manualmente -  El envío del estudiante puede ser reabierto por un maestro.
</li><li>Automáticamente hasta pasar - El envío del estudiante es reabierto automáticamente, hasta que el estudiante alcance la calificación necesaria para pasar (aprobar), que está configurada en el libro de calificaciones para esta tarea.</li></ul>';
$string['attemptreopenmethod_manual'] = 'Manualmente';
$string['attemptreopenmethod_none'] = 'Nunca';
$string['attemptreopenmethod_untilpass'] = 'Automáticamente hasta pasar';
$string['attemptsettings'] = 'Configuraciones del intento';
$string['availability'] = 'Disponibilidad';
$string['backtoassignment'] = 'Volver a la tarea';
$string['batchoperationconfirmaddattempt'] = '¿Permitir otro intento para los envíos seleccionados?';
$string['batchoperationconfirmgrantextension'] = '¿Otorgar una extensión a todos los envíos seleccionados?';
$string['batchoperationconfirmlock'] = '¿Bloquear todas las entregas seleccionadas?';
$string['batchoperationconfirmreverttodraft'] = 'Revertir loas entregas seleccionados a borrador?';
$string['batchoperationconfirmunlock'] = '¿Desbloquear todas las entregas seleccionadas?';
$string['batchoperationlock'] = 'bloquear entregas';
$string['batchoperationreverttodraft'] = 'revertir entregas a borrador';
$string['batchoperationsdescription'] = 'Ejecute acción en las filas seleccionadas';
$string['batchoperationunlock'] = 'desbloquear entregas';
$string['blindmarking'] = 'Calificación ciega';
$string['blindmarking_help'] = 'La calificación ciega oculta la identidad de los estudiantes a los evaluadores. Las configuraciones de calificación ciega se bloquearán en cuanto  se haga  un envío o calificación con respecto a esta tarea.';
$string['changegradewarning'] = 'Esta tarea tiene envíos calificados y el cambiar la calfificación no hará que se re-calculen las calificaciones de los envíos existentes. Usted debe re-calificar todos los envíos existentes, si desea cambiar la calificación.';
$string['choosegradingaction'] = 'Acción de calificar';
$string['chooseoperation'] = 'Elegir operación';
$string['comment'] = 'Comentario';
$string['completionsubmit'] = 'Los estudiantes deben enviar a esta actividad para completarla';
$string['configshowrecentsubmissions'] = 'Todos pueden ver las notificaciones de las entregas en los informes de actividad reciente.';
$string['confirmbatchgradingoperation'] = '¿Está Usted seguro de querer  {$a->operation} a {$a->count} estudiantes?';
$string['confirmsubmission'] = '¿Está Usted seguro de querer enviar su trabajo para que sea calificado? Usted ya no le podrá hacer más cambios';
$string['conversionexception'] = 'No se pudo convertir tarea. La excepción fue: {$a}';
$string['couldnotconvertgrade'] = 'No se pudo convertir calificación de tarea del usuario {$a}.';
$string['couldnotconvertsubmission'] = 'No se pudo convertir la calificación de la entrega a la tarea del usuario {$a}.';
$string['couldnotcreatecoursemodule'] = 'No pudo crearse módulo de curso';
$string['couldnotcreatenewassignmentinstance'] = 'No se pudo crear nueva instancia tarea.';
$string['couldnotfindassignmenttoupgrade'] = 'No se pudo encontrar instancias de tarea anteriores para actualizar.';
$string['currentattempt'] = 'Éste es el intento {$a}.';
$string['currentattemptof'] = 'Éste es el intento {$a->attemptnumber} ( {$a->maxattempts} intentos permitidos ).';
$string['currentgrade'] = 'Calificación actual en el libro';
$string['cutoffdate'] = 'Fecha de corte';
$string['cutoffdatefromdatevalidation'] = 'La fecha de corte debe ser posterior a la fecha de \'comienzo de envíos\'.';
$string['cutoffdate_help'] = 'Si se configura, la tarea no aceptará envíos después de esta fecha si no hubiera extensiones.';
$string['cutoffdatevalidation'] = 'La fecha de corte no puede ser anterior a la fecha de entrega.';
$string['defaultplugins'] = 'Parámetros por defecto de la tareas';
$string['defaultplugins_help'] = 'Estos parámetros definen los valores por defecto para todas las nuevas tareas.';
$string['defaultteam'] = 'Grupo por defecto';
$string['deleteallsubmissions'] = 'Eliminar todos los envíos';
$string['deletepluginareyousure'] = 'Borrar plugin de tarea {$a}: ¿está seguro?';
$string['deletepluginareyousuremessage'] = 'Está a punto de borrar completamente el plugin de tarea {$a}. Esta acción borrará completamente de la base de datos toda información  asociada con este plugin de tarea. ¿Está usted seguro que quiere continuar?';
$string['deletingplugin'] = 'Eliminando plugin {$a}.';
$string['description'] = 'Descripción';
$string['downloadall'] = 'Descargar todas las entregas';
$string['duedate'] = 'Fecha de entrega';
$string['duedate_help'] = 'Esta es la fecha cuando se debería de entregar la tarea. Los envíos seguirán siendo permitidos aún después de esta fecha de entrega, pero cualquier envío mandado después de esta fecha será marcado como \'retrasado\'. Para evitar que se puedan enviar tareas depués de una cierta fecha debe configurar la fecha de corte.';
$string['duedateno'] = 'No hay fecha de entrega';
$string['duedatereached'] = 'La fecha de vencimiento de esta tarea ya ha pasado';
$string['duedatevalidation'] = 'La fecha de vencimiento debe ser posterior a la fecha de inicio de las entregas.';
$string['editaction'] = 'Acciones...';
$string['editattemptfeedback'] = 'Editar la calificación y retroalimentación para el intento número {$a}.';
$string['editingpreviousfeedbackwarning'] = 'Usted está editando la retroalimentación para un intento previo. Éste es el intento {$a->attemptnumber} de un total de {$a->totalattempts}.';
$string['editingstatus'] = 'Status de edición';
$string['editsubmission'] = 'Editar envío';
$string['editsubmission_help'] = 'Hacer cambios a su envío';
$string['enabled'] = 'Habilitado';
$string['errornosubmissions'] = 'No hay entregas que descargar';
$string['errorquickgradingvsadvancedgrading'] = 'Las calificacines no se guardaron porque esta tarea actualmente está empleando calificación avanzada';
$string['errorrecordmodified'] = 'Las calificaciones no se guardaron porque alguien acaba de modificar uno o más registros, antes de que usted terminara de cargar la página';
$string['extensionduedate'] = 'Fecha de entrega extendida';
$string['extensionnotafterduedate'] = 'La fecha extendida debe ser posterior a la fecha de entrega original';
$string['extensionnotafterfromdate'] = 'La fecha extendida debe ser posterior a la fecha de comienzo de envíos';
$string['feedback'] = 'Retroalimentación';
$string['feedbackavailablehtml'] = '{$a->username} ha publicado retroalimentación a su envío de tarea para \'<i>{$a->assignment}</i>\'<br /><br /> Usted puede verla incluída en su <a href="{$a->url}">envío de tarea</a>.';
$string['feedbackavailablesmall'] = '{$a->username} ha proporcionado retroalimentación para la tarea {$a->assignment}';
$string['feedbackavailabletext'] = '{$a->username}  ha publicado retroalimentación a su envío de tarea para \'{$a->assignment}\' Usted puede verla incluída en suenvío de tarea';
$string['feedbackplugin'] = 'Plugin de retroalimentación';
$string['feedbackpluginforgradebook'] = 'Plugin de retroalimentación que empujará comentarios al libro de calificaciones';
$string['feedbackpluginforgradebook_help'] = 'Solamente un plugin de retroalimentación de tarea puede empujar retroalimentación al libro de calificaciones';
$string['feedbackplugins'] = 'Plugins de retroalimentación';
$string['feedbacksettings'] = 'Configuraciones de retroalimentación';
$string['feedbacktypes'] = 'Tipos de retroalimentación';
$string['filesubmissions'] = 'Envíos de archivo';
$string['filter'] = 'Filtro';
$string['filternone'] = 'Sin filtro';
$string['filterrequiregrading'] = 'Requiere calificación';
$string['filtersubmitted'] = 'Enviada';
$string['gradeabovemaximum'] = 'La calificación debe ser menor o igual a {$a}.';
$string['gradebelowzero'] = 'La calificación debe ser mayor o igual a cero.';
$string['graded'] = 'Calificado';
$string['gradedby'] = 'Calificado por';
$string['gradedon'] = 'Calificado en';
$string['gradelocked'] = 'La calificación está bloqueada o anulada en el libro de calificaciones.';
$string['gradeoutof'] = 'Calificación sobre {$a}';
$string['gradeoutofhelp'] = 'Calificación';
$string['gradeoutofhelp_help'] = 'Introduzca aquí la calificación para los envíos del estudiante. Puede utilizar decimales.';
$string['gradersubmissionupdatedhtml'] = '{$a->username} ha actualizado la entrega de su tarea a
<i>\'{$a->assignment}\'</i><br /><br />
Está <a href="{$a->url}">disponible en el sitio web</a>.';
$string['gradersubmissionupdatedsmall'] = '{$a->username} ha actualizado su entrega a la tarea  {$a->assignment}.';
$string['gradersubmissionupdatedtext'] = '{$a->username} ha actualizado la entrega de su tarea
a \'{$a->assignment}\' en {$a->timeupdated}

Está disponible aquí:

{$a->url}';
$string['gradestudent'] = 'calificar estudiante: (id={$a->id}, nombrecompleto={$a->fullname}).';
$string['gradeuser'] = 'Calificación {$a}';
$string['grading'] = 'Calificando';
$string['gradingchangessaved'] = 'Los cambios en la calificación fueron guardados';
$string['gradingmethodpreview'] = 'Criterio para calificar';
$string['gradingoptions'] = 'Opciones del listado de calificaciones';
$string['gradingstatus'] = 'Status de calificación';
$string['gradingstudent'] = 'Calificando estudiante';
$string['gradingsummary'] = 'Sumario de calificaciones';
$string['grantextension'] = 'Otorgar extensión';
$string['grantextensionforusers'] = 'Otorgar extensión para {$a} estudiantes';
$string['groupsubmissionsettings'] = 'Configuraciones de envío de grupo';
$string['hiddenuser'] = 'Participante';
$string['hideshow'] = 'Ocultar/Mostrar';
$string['instructionfiles'] = 'Archivos de instrucciones';
$string['invalidfloatforgrade'] = 'No se entendió la calificación proporcionada: {$a}';
$string['invalidgradeforscale'] = 'La calificación proporcionada no era válida para la escala actual';
$string['lastmodifiedgrade'] = 'Última modificación (calificación)';
$string['lastmodifiedsubmission'] = 'Última modificación (entrega)';
$string['latesubmissions'] = 'Envíos retrasados';
$string['latesubmissionsaccepted'] = 'Solamente los estudiantes que hayan recibido extensión de fecha de entrega pueden todavía enviar sus tareas';
$string['locksubmissionforstudent'] = 'Evita nuevas entregas del estudiante: (id={$a->id}, nombre={$a->fullname}).';
$string['locksubmissions'] = 'Bloquear entregas';
$string['manageassignfeedbackplugins'] = 'Gestionar plugins de retroalimentación de tarea';
$string['manageassignsubmissionplugins'] = 'Gestionar plugins de envío de tarea';
$string['maxattempts'] = 'Intentos máximos';
$string['maxattempts_help'] = 'El número máximo de intentos de envíos que puede hacer un estudiante. Después de este número de intentos, los envíos del estudiante no se podrán reabrir.';
$string['maxgrade'] = 'Calificación máxima';
$string['messageprovider:assign_notification'] = 'Notificaciones de tareas';
$string['modulename'] = 'Tarea';
$string['modulename_help'] = 'El módulo de actividad tarea le permite al maestrocomunicar tareas, recolectar los trabajos y proporcionar calificaciones y retroalimentación.

Los estudiantes pueden enviar cualquier contenido digital (archivos), tal como documentos de procesador de textos, hojas de cálculo, imágenes y clips de audio o video. De forma alterna, o adicional, la tarea puede requerir que el estudiante escriba texto directamente en un campo empleando un editor de texto. Una tarea también puede emplearse para recordarle a los estudiantes sobre tareas \'de la vida real\' que necesitan realizar fuera de línea, como trabajos para clases de arte, asistencia a museos y otras actividades que no requieren de contenidos digitales. Los estudiantes pueden enviar su trabajo en forma individual o como miembros de un equipo.

Cuando se revisan las tareas, los profesores pueden dejar comentarios de retroalimentación y subir archivos; por ejemplo documentos de alumnos con anotaciones del profesor, o comentarios grabados en audio. Las tareas pueden calificarse emplando una escala numérica o escala a la medida, o un método de calificación avanzado como rúbrica. Las calificaciones finales se anotan en el libro de calificaciones.';
$string['modulenameplural'] = 'Tareas';
$string['mysubmission'] = 'Mi entrega:';
$string['newsubmissions'] = 'Tareas enviadas';
$string['noattempt'] = 'Sin intento';
$string['nofiles'] = 'Sin archivos.';
$string['nograde'] = 'Sin calificación.';
$string['nolatesubmissions'] = 'No se aceptan envíos retrasados.';
$string['nomoresubmissionsaccepted'] = 'No se aceptan más envíos';
$string['noonlinesubmissions'] = 'Esta tarea no requiere que usted envíe nada de forma online';
$string['nosavebutnext'] = 'Siguiente';
$string['nosubmission'] = 'No se ha enviado nada en esta tarea';
$string['nosubmissionsacceptedafter'] = 'No se aceptan envíos después de';
$string['notgraded'] = 'No calificado';
$string['notgradedyet'] = 'No calificado aún';
$string['notifications'] = 'Avisos';
$string['notsubmittedyet'] = 'Aún no ha enviado esta tarea';
$string['nousersselected'] = 'Sin usuarios seleccionados';
$string['numberofdraftsubmissions'] = 'Borradores';
$string['numberofparticipants'] = 'Participantes';
$string['numberofsubmissionsneedgrading'] = 'Necesita calificarse';
$string['numberofsubmittedassignments'] = 'Enviados';
$string['numberofteams'] = 'Grupos';
$string['offline'] = 'No se requieren entregas online';
$string['open'] = 'Abierto';
$string['outlinegrade'] = 'Calificación: {$a}';
$string['outof'] = '{$a->current} de un total de {$a->total}';
$string['overdue'] = '<font color="red">La Tarea está retrasada por: {$a}</font>';
$string['page-mod-assign-view'] = 'Página principal del módulo tareas y entregas';
$string['page-mod-assign-x'] = 'Cualquier página del módulo tarea';
$string['participant'] = 'Participante';
$string['pluginadministration'] = 'Administración de tareas';
$string['pluginname'] = 'Tarea';
$string['preventsubmissions'] = 'Evita que los usuarios realicen más entregas en esta tarea';
$string['preventsubmissionsshort'] = 'Evitar cambios en la entrega';
$string['previous'] = 'Anterior';
$string['quickgrading'] = 'Calificación rápida';
$string['quickgradingchangessaved'] = 'Se guardaron los cambios de las calificaciones';
$string['quickgrading_help'] = 'La calificación rápida le permite asignar calificaciones (y competencias) directamente en la tabla de envíos. La calificación rápida no es compatible con la calificación avanzada y no se recomienda cuando existan varias personas que califican.';
$string['quickgradingresult'] = 'Calificación rápida';
$string['recordid'] = 'Identificador';
$string['requireallteammemberssubmit'] = 'Obligar a que todos los miembros del grupo envíen';
$string['requireallteammemberssubmit_help'] = 'Si se habilita, todos los miembros del grupo de estudiantes deben elegir el botón de envío para esta tarea antes de que se considere como enviada la tarea del geupo. Si se deshabilita, se considerará como enviada la tarea del grupo tan pronto alguno de los estudiantes del grupo elija el botón de envío.';
$string['requiresubmissionstatement'] = 'Requerir que los estudiantes acepte la declaratoria para el envío';
$string['requiresubmissionstatementassignment'] = 'Requerir que los estudiantes acepten las condiciones para el envío';
$string['requiresubmissionstatementassignment_help'] = 'Requerir que los estudiantes acepten la declaratoria de envío para todos los envíos en esta tarea.';
$string['requiresubmissionstatement_help'] = 'Requerir que los estudiantes acepten las condiciones para el envío para todos los envíos de tareas para toda esta instalación Moodle. Si esta configuración no está habilitada, entonces las condiciones para el envío pueden habilitarse o deshabilitarse en las configuraciones para cada una de las tareas';
$string['revealidentities'] = 'Revelar identidad de los estudiantes';
$string['revealidentitiesconfirm'] = '¿Está seguro de querer revelar las identidades de los estudiantes para esta tarea. Esta operación no podrá deshacerse. Una vez que las identidades de los estudiantes sean reveladas, sus calificaciones se enviarán al libro de calificaciones.';
$string['reverttodraft'] = 'Revertir la entrega al estatus de borrador.';
$string['reverttodraftforstudent'] = 'Revertir la entrega a borrador para el estudiante: (id={$a->id}, nombre={$a->fullname}).';
$string['reverttodraftshort'] = 'Revertir la entrega a borrador';
$string['reviewed'] = 'Revisado';
$string['saveallquickgradingchanges'] = 'Guardar todos los cambios de calificación rápida';
$string['savechanges'] = 'Guardar cambios';
$string['savegradingresult'] = 'Calificación';
$string['savenext'] = 'Guardar y mostrar siguiente';
$string['scale'] = 'Escala';
$string['selectlink'] = 'Seleccione...';
$string['selectuser'] = 'Seleccionar {$a}';
$string['sendlatenotifications'] = 'Notificar a los evaluadores las entregas fuera de plazo';
$string['sendlatenotifications_help'] = 'Si está habilitado, los evaluadores (normalmente profesores) reciben un mensaje cuando un estudiante realiza una entrega a la tarea fuera de plazo . Se pueden configurar los métodos de mensajería.';
$string['sendnotifications'] = 'Mandar avisos a los (profesores) calificadores';
$string['sendnotifications_help'] = 'Si se habilita, los (profesores) calificadores reciben un mensaje cuando unestudiante envía una tarea, anticipadamente, a tiempo y retrasada. Los métodos de mensaje son configurables.';
$string['sendsubmissionreceipts'] = 'Mandar recibo de envío a estudiantes';
$string['sendsubmissionreceipts_help'] = 'Este interruptor habilitará los recibos de envíos para estudiantes. Los estudiantes recibirán una notificación cada vez que envíen exitosamente una tarea';
$string['settings'] = 'Parámetros de la tarea';
$string['showrecentsubmissions'] = 'Mostrar entregas recientes';
$string['submission'] = 'Entrega';
$string['submissioncopiedhtml'] = 'Usted ha hecho una copia de su envío de tarea previo para \'<i>{$a->assignment}</i>\'<br /><br /> Usted puede ver el status de su <a href="{$a->url}">envío de tarea</a>.';
$string['submissioncopiedsmall'] = 'Usted ha copiado su envío de tarea previo para {$a->assignment}';
$string['submissioncopiedtext'] = 'Usted ha hecho una copia de su envío de tarea previo para \'{$a->assignment}\'

Usted puede ver el status de su envío de tarea:

{$a->url}';
$string['submissiondrafts'] = 'Requerir que los estudiantes opriman el botón \'enviar';
$string['submissiondrafts_help'] = 'Si está habilitado, los estudiantes tendrán que pulsar un botón de Entrega para declarar que es su entrega definitiva. Esto permite que los estudiantes puedan tener una versión borrador de su entrega en el sistema. Si esta configuración se cambia de "no" a "si" después de que los estudiantes ya hayan enviado sus trabajos, estos envíos serán considerados como finales.';
$string['submissioneditable'] = 'Los estudiantes pueden editar este envío';
$string['submissionempty'] = 'Nada fue enviado';
$string['submissionnotcopiedinvalidstatus'] = 'El envío no fue copiado debido a que había sido editado posteriormente a que fuera reabierto.';
$string['submissionnoteditable'] = 'Los estudiantes no pueden editar este envío';
$string['submissionnotready'] = 'Esta tarea no está lista para enviar.';
$string['submissionplugins'] = 'Plugins de envío';
$string['submissionreceipthtml'] = 'Usted ha realizado una entrega en la tarea \'<i>{$a->assignment}</i>\'<br /><br />
Puede ver el estado de su entrega en <a href="{$a->url}"></a>.';
$string['submissionreceipts'] = 'Enviar recibo de entrega';
$string['submissionreceiptsmall'] = 'Usted ha realizado su entrega de la tarea {$a->assignment}';
$string['submissionreceipttext'] = 'Usted ha realizado una entrega en la tarea {$a->assignment}

Puede ver el estado de su entrega en

{$a->url}';
$string['submissions'] = 'Entregas';
$string['submissionsclosed'] = 'Entrega cerrada';
$string['submissionsettings'] = 'Configuración de entrega';
$string['submissionslocked'] = 'Esta tarea no acepta entregas';
$string['submissionslockedshort'] = 'No se permiten cambios en las entregas';
$string['submissionsnotgraded'] = 'Entregas no calificadas: {$a}';
$string['submissionstatement'] = 'Declaratoria para el envío';
$string['submissionstatementacceptedlog'] = 'Declaratoria para el envío aceptada por el usuario {$a}';
$string['submissionstatementdefault'] = 'Esta tarea es mi propio trabajo, excepto en donde he reconocido el uso de los trabajos de otras personas.';
$string['submissionstatement_help'] = 'Confirmación de declaratoria para el envío de tarea';
$string['submissionstatus'] = 'Estado de la entrega';
$string['submissionstatus_'] = 'Sin entrega';
$string['submissionstatus_draft'] = 'Borrador (no enviado)';
$string['submissionstatusheading'] = 'Estado de la entrega';
$string['submissionstatus_marked'] = 'Calificado';
$string['submissionstatus_new'] = 'Nueva entrega';
$string['submissionstatus_reopened'] = 'Reabierto';
$string['submissionstatus_submitted'] = 'Enviado para calificar';
$string['submissionsummary'] = '{$a->status}. Modificado por última vez en {$a->timemodified}';
$string['submissionteam'] = 'Grupo';
$string['submissiontypes'] = 'Tipos de envíos';
$string['submitaction'] = 'Enviar';
$string['submitassignment'] = 'Enviar tarea';
$string['submitassignment_help'] = 'Una vez que esta tarea se haya enviado, usted no podrá hacerle más cambios';
$string['submitted'] = 'Enviada';
$string['submittedearly'] = 'La tarea fue enviada {$a} antes';
$string['submittedlate'] = 'La tarea fue enviada {$a} después';
$string['submittedlateshort'] = '{$a} después';
$string['teamsubmission'] = 'Los estudiantes envían en grupos';
$string['teamsubmissiongroupingid'] = 'Agrupamiento para los geupos de estudiantes';
$string['teamsubmissiongroupingid_help'] = 'Este es el agrupamiento que empleará la tarea para encontrar los grupos para los grupos de estudiantes. Si no se configura, entonces se usará el conjunto de grupos por defecto.';
$string['teamsubmission_help'] = 'Si se habilita, los estudiantes serán divididos en grupos basados en el conjunto de grupos por defecto o un agrupamiento a la medida. Un envío en grupo estará compartido entre los miembros del grupo y todos los miembros del grupo verán los cambios de todos ellos al envío.';
$string['teamsubmissionstatus'] = 'Status del envío en grupo';
$string['textinstructions'] = 'Instrucciones de la tarea';
$string['timemodified'] = 'Última modificación';
$string['timeremaining'] = 'Tiempo restante';
$string['unlimitedattempts'] = 'Ilimitados';
$string['unlimitedattemptsallowed'] = 'Se permiten intentos ilimitados.';
$string['unlocksubmissionforstudent'] = 'Permitir entregas al usuario: (id={$a->id}, nombre={$a->fullname}).';
$string['unlocksubmissions'] = 'Desbloquear entregas';
$string['updategrade'] = 'Actualizar calificación';
$string['updatetable'] = 'Guardar y actualizar tabla';
$string['upgradenotimplemented'] = 'Actualización no implementada en el plugin ({$a->type} {$a->subtype})';
$string['userextensiondate'] = 'Se otorgó extensión hasta: {$a}';
$string['usergrade'] = 'Calificación del usuario';
$string['userswhoneedtosubmit'] = 'Usuarios que necesitan enviar: {$a}';
$string['viewfeedback'] = 'Ver retroalimentación';
$string['viewfeedbackforuser'] = 'Ver retroalimentación para usuario: {$a}';
$string['viewfull'] = 'Ver completo';
$string['viewfullgradingpage'] = 'Abrir la página completa de calificar para proporcionar retroalimentación';
$string['viewgradebook'] = 'Ver libro de calificaciones';
$string['viewgrading'] = 'Ver/Calificar todas las entregas';
$string['viewgradingformforstudent'] = 'Ver la página de calificar para estudiante: (id={$a->id},nombrecompleto={$a->fullname}).';
$string['viewownsubmissionform'] = 'Ver la página propia de entregas a tareas.';
$string['viewownsubmissionstatus'] = 'Ver página de estado de las entregas propios.';
$string['viewrevealidentitiesconfirm'] = 'Ver la página de confirmación de revelación de identidad de estudiantes.';
$string['viewsubmission'] = 'Ver entrega';
$string['viewsubmissionforuser'] = 'Ver entrega del usuario: {$a}';
$string['viewsubmissiongradingtable'] = 'Ver tabla de calificaciones de las entregas';
$string['viewsummary'] = 'Ver resumen';
