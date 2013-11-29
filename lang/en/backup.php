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
 * Strings for component 'backup', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   backup
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autoactivedescription'] = 'Escoja si desea o no hacer respaldos automáticos. Si selecciona el modo manual los respaldos automáticos sólo serán posibles mediante el "script" CLI de respaldos automáticos. Esto se puede hacer manualmente mediante la línea de comandos de UNIX o a través de cron.';
$string['autoactivedisabled'] = 'Deshabilitado';
$string['autoactiveenabled'] = 'Habilitado';
$string['autoactivemanual'] = 'Manual';
$string['automatedbackupschedule'] = 'Agenda';
$string['automatedbackupschedulehelp'] = 'Decida en qué días de la semana se realizarán los respaldos automatizados';
$string['automatedbackupsinactive'] = 'Los respaldos programados no han sido habilitados por el administrador del sitio';
$string['automatedbackupstatus'] = 'Estado de los respaldos automatizados';
$string['automatedsettings'] = 'Configuraciones de los respaldos automatizados';
$string['automatedsetup'] = 'Configuración de respaldo automatizado';
$string['automatedstorage'] = 'Almacenamiento de respaldo automatizado';
$string['automatedstoragehelp'] = 'Elija la ubicación donde desea almacenar los respaldos automatizados';
$string['backupactivity'] = 'Respaldar actividad: {$a}';
$string['backupcourse'] = 'Respaldar curso: {$a}';
$string['backupcoursedetails'] = 'Detalles del curso';
$string['backupcoursesection'] = 'Sección: {$a}';
$string['backupcoursesections'] = 'Secciones del curso';
$string['backupdate'] = 'Fecha realizado';
$string['backupdetails'] = 'Detalles del respaldo';
$string['backupdetailsnonstandardinfo'] = 'El archivo seleccionado no es un archivo de respaldo estándar de Moodle. El proceso de restauración intentará convertir el archivo de respaldo al formato estándar y luego restaurarlo.';
$string['backupformat'] = 'Formato';
$string['backupformatimscc1'] = 'IMS Cartucho Común 1.0';
$string['backupformatimscc11'] = 'IMS Cartucho Común 1.1';
$string['backupformatmoodle1'] = 'Moodle 1';
$string['backupformatmoodle2'] = 'Moodle 2';
$string['backupformatunknown'] = 'Formato desconocido';
$string['backupmode'] = 'Modo';
$string['backupmode10'] = 'General';
$string['backupmode20'] = 'Importar';
$string['backupmode30'] = 'Comunidad (hub)';
$string['backupmode40'] = 'Mismo sitio';
$string['backupmode50'] = 'Automatizado';
$string['backupmode60'] = 'Covertido';
$string['backupsection'] = 'Respaldo de sección de curso: {$a}';
$string['backupsettings'] = 'Configuración de RESPALDO';
$string['backupsitedetails'] = 'Detalles del sitio';
$string['backupstage16action'] = 'Continuar';
$string['backupstage1action'] = 'Siguiente';
$string['backupstage2action'] = 'Siguiente';
$string['backupstage4action'] = 'Realizar respaldo';
$string['backupstage8action'] = 'Continuar';
$string['backuptype'] = 'Tipo';
$string['backuptypeactivity'] = 'Actividad';
$string['backuptypecourse'] = 'Curso';
$string['backuptypesection'] = 'Sección';
$string['backupversion'] = 'Versión del respaldo';
$string['cannotfindassignablerole'] = 'El rol {$a} en el archivo de respaldo no se puede mapear a ninguno de los roles que usted puede asignar.';
$string['choosefilefromactivitybackup'] = 'Area de respaldo de actividad';
$string['choosefilefromactivitybackup_help'] = 'Cuando respalda actividades empleando las configuraciones por defecto, los archivos de respaldo se guardarán aquí';
$string['choosefilefromautomatedbackup'] = 'Respaldos automatizados';
$string['choosefilefromautomatedbackup_help'] = 'Contiene los respaldos generados automáticamente';
$string['choosefilefromcoursebackup'] = 'Area de respaldos de curso';
$string['choosefilefromcoursebackup_help'] = 'Cuando respalda cursos empleando las configuraciones por defecto, los archivos de respaldo se guardarán aquí';
$string['choosefilefromuserbackup'] = 'Zona de respaldos privados del usuario';
$string['choosefilefromuserbackup_help'] = 'Cuando respalda cursos con la opción de "Hacer anónima la información de usuario" seleccionada, los archivos de respaldo se guardarán aquí';
$string['configgeneralactivities'] = 'Ajusta la configuración por defecto para incluir actividades en un respaldo';
$string['configgeneralanonymize'] = 'Si se habilita, toda la información relativa a los usuarios será anónima por defecto.';
$string['configgeneralbadges'] = 'Configuración por defecto para incluir insignias dentro de un respaldo.';
$string['configgeneralblocks'] = 'Ajusta la configuración por defecto para incluir bloques en un respaldo';
$string['configgeneralcomments'] = 'Ajusta la configuración por defecto para incluir comentarios en un respaldo';
$string['configgeneralfilters'] = 'Ajusta la configuración por defecto para incluir filtros en un respaldo';
$string['configgeneralhistories'] = 'Ajusta la configuración por defecto para incluir la historia del usuario en un respaldo';
$string['configgenerallogs'] = 'Si se habilita, las bitácoras se incluirán por defecto  en los respaldos.';
$string['configgeneralroleassignments'] = 'Si se habilita, los roles asignados serán también respaldados por defecto.';
$string['configgeneralusers'] = 'Ajusta la configuración por defecto para incluir usuarios en los respaldos';
$string['configgeneraluserscompletion'] = 'Si se habilita, la información sobre grado de finalización será incluida por defecto en los respaldos';
$string['configloglifetime'] = 'Esto especifica el tiempo que desea que se mantengan la información de respaldos en las bitácoras. Las bitácoras más antiguas que este tiempo serán borradas automáticamente. Se recomienda mantener pequeño este valor, porque la información guardada en bitácoras sobre respaldos puede ser enorme y llenar rápidamente el disco duro del servidor.';
$string['confirmcancel'] = 'Cancelar respaldo';
$string['confirmcancelno'] = 'Permanecer';
$string['confirmcancelquestion'] = '¿Está seguro de querer cancelar? Cualquier información que hubiera escrito se perderá.';
$string['confirmcancelyes'] = 'Cancelar';
$string['confirmnewcoursecontinue'] = 'Advertencia curso nuevo';
$string['confirmnewcoursecontinuequestion'] = 'Un curso temporal (oculto) será creado por el proceso de restauración de curso. Para abortar la restauración, elija cancelar. No cierre el navegador mientras restaura.';
$string['coursecategory'] = 'Categoría a donde se restaurará el curso';
$string['courseid'] = 'ID original';
$string['coursesettings'] = 'Configuraciones del curso';
$string['coursetitle'] = 'Título';
$string['currentstage1'] = 'Configuraciones iniciales';
$string['currentstage16'] = 'Completo';
$string['currentstage2'] = 'Configuraciones del esquema';
$string['currentstage4'] = 'Confirmar y revisar';
$string['currentstage8'] = 'Realizar respaldo';
$string['enterasearch'] = 'Escriba una búsqueda';
$string['error_block_for_module_not_found'] = 'Instancia de bloque huérfana (id: {$a->bid}) para módulo de curso (id: {$a->mid}) encontrada. Este bloque no será respaldado.';
$string['error_course_module_not_found'] = 'Se encontró un módulo de curso huérfano (id: {$a}). Este módulo no será restaurado.';
$string['errorfilenamemustbezip'] = 'El nombre que se introduzca debe ser un archivo ZIP y con la extensión .MBZ';
$string['errorfilenamerequired'] = 'Debe introducir un nombre de archivo válido para este respaldo';
$string['errorinvalidformat'] = 'Formato de respaldo desconocido';
$string['errorinvalidformatinfo'] = 'El archivo seleccionado no es un archivo de respaldo válido de Moodle y no puede ser restaurado.';
$string['errorminbackup20version'] = 'Este archivo de respaldo ha sido creado con una versión de desarrollo de respaldo de Moodle ({$a->backup}) y se requiere al menos la versión {$a->min}. Por lo tanto, no pudo ser restaurado.';
$string['errorrestorefrontpage'] = 'No está permitido restaurar sobre la portada';
$string['executionsuccess'] = 'El archivo de respaldo se creó exitosamente';
$string['filealiasesrestorefailures'] = 'Fallas en restauración de alias';
$string['filealiasesrestorefailures_help'] = 'Los alias son enlaces simbólicos hacia otros archivos, incluyendo aquellos guardados en repositorios externos. En algunos casos, Moodle no puede restaurarlos - por ejemplo cuando se restaura un respaldo en otro sitio o cuando el archivo referenciado no existe.

Se pueden encontrar más detalles y la causa real de la falla en el archivo de la bitácora de restauración.';
$string['filealiasesrestorefailuresinfo'] = 'Algunos alias incluidos en el archivo de respaldo no pudieron restaurarse. La lista siguiente contiene su localización esperada y el archivo orígen al que se estaban refiriendo en el sitio original.';
$string['filename'] = 'Nombre del archivo';
$string['filereferencesincluded'] = 'Hay referencias en archivos hacia contenidos externos incluídos en el paquete de respaldo, las que no funcionarán en otros sitios.';
$string['filereferencesnotsamesite'] = 'El respaldo es de otro sitio, las referencias a archivos no pueden restaurarse';
$string['filereferencessamesite'] = 'El respaldo es del mismo sitio, las referencias a archivos si pueden restaurarse';
$string['generalactivities'] = 'Incluir actividades';
$string['generalanonymize'] = 'Volver anónima la información';
$string['generalbackdefaults'] = 'Configuración de respaldo general';
$string['generalbadges'] = 'Incluir insignias';
$string['generalblocks'] = 'Incluir bloques';
$string['generalcomments'] = 'Incluir comentarios';
$string['generalfilters'] = 'Incluir filtros';
$string['generalgradehistories'] = 'Incluir historias';
$string['generalhistories'] = 'Incluir historias';
$string['generallogs'] = 'Incluir bitácoras (logs)';
$string['generalroleassignments'] = 'Incluir asignaciones de rol';
$string['generalsettings'] = 'Configuraciones de respaldo general';
$string['generalusers'] = 'Incluir usuarios';
$string['generaluserscompletion'] = 'Incluir información sobre grado de finalización de usuarios';
$string['importbackupstage16action'] = 'Continuar';
$string['importbackupstage1action'] = 'Siguiente';
$string['importbackupstage2action'] = 'Siguiente';
$string['importbackupstage4action'] = 'Realizar importación';
$string['importbackupstage8action'] = 'Continuar';
$string['importcurrentstage0'] = 'Selección de curso';
$string['importcurrentstage1'] = 'Configuraciones iniciales';
$string['importcurrentstage16'] = 'Completo';
$string['importcurrentstage2'] = 'Configuraciones esquema';
$string['importcurrentstage4'] = 'Confirmar y revisar';
$string['importcurrentstage8'] = 'Realizar importación';
$string['importfile'] = 'Importar un archivo de respaldo';
$string['importgeneralmaxresults'] = 'Número máximo de cursos enlistados para importar';
$string['importgeneralmaxresults_desc'] = 'Esto controla el número de cursos que son enlistados durante el primer paso del proceso de importación';
$string['importgeneralsettings'] = 'Valores por defecto de importación general';
$string['importsuccess'] = 'Importación completada. Pulse continuar para volver al curso.';
$string['includeactivities'] = 'Incluir:';
$string['includeditems'] = 'Items incluídos:';
$string['includefilereferences'] = 'Archivo hace referencia a contenidos externos';
$string['includesection'] = 'Sección {$a}';
$string['includeuserinfo'] = 'Datos de usuario';
$string['locked'] = 'Cerrado';
$string['lockedbyconfig'] = 'Este ajuste ha sido bloqueado por la configuración predeterminada de respaldo';
$string['lockedbyhierarchy'] = 'Cerrado por dependencias';
$string['lockedbypermission'] = 'Usted no tiene permisos para cambiar esta configuración';
$string['loglifetime'] = 'Mantener bitácoras por';
$string['managefiles'] = 'Gestionar archivos de respaldo';
$string['missingfilesinpool'] = 'Algunos archivos no pudieron guardarse al hacer el respaldo. No será posible restaurarlos.';
$string['module'] = 'Módulo';
$string['moodleversion'] = 'Versión de Moodle';
$string['morecoursesearchresults'] = 'Se encontraron más de {$a} cursos , se muestran los primeros {$a} resultados';
$string['moreresults'] = 'Hay demasiados resultados, haga una búsqueda más específica.';
$string['nomatchingcourses'] = 'No hay cursos que mostrar';
$string['norestoreoptions'] = 'No hay categorías o cursos existentes a donde pueda Usted restaur.ar';
$string['originalwwwroot'] = 'URL del respaldo';
$string['previousstage'] = 'Previo';
$string['qcategory2coursefallback'] = 'La categoría de preguntas "{$a->name", originalmente dentro del contexto de categoría sistema/curso en el archivo de respaldo, será creada en el contexto de curso al ser restaurada.';
$string['qcategorycannotberestored'] = 'La restauración no puede crear la categoría de preguntas  "{$a->name}"';
$string['question2coursefallback'] = 'La categoría de preguntas "{$a->name}", originalmente en la categoría de contexto sistema/curso dentro del archivo de copia de seguridad, se creará en el contexto del curso al ser restaurada';
$string['questionegorycannotberestored'] = 'La restauración no puede crear las preguntas  "{$a->name}"';
$string['restoreactivity'] = 'Restaurar actividad';
$string['restorecourse'] = 'Restaurar curso';
$string['restorecoursesettings'] = 'Configuraciones de curso';
$string['restoreexecutionsuccess'] = 'El curso fue restaurado exitosamente, elija el botón inferior de continuar, que lo llevará a ver el curso que Usted restauró.';
$string['restorefileweremissing'] = 'Algunos archivos no pudieron restaurarse debido a que faltaban en el respaldo.';
$string['restorenewcoursefullname'] = 'Nombre del nuevo curso';
$string['restorenewcourseshortname'] = 'Nombre corto del nuevo curso';
$string['restorenewcoursestartdate'] = 'Nueva fecha de inicio';
$string['restorerolemappings'] = 'Restaurar mapeo de roles';
$string['restorerootsettings'] = 'Restaurar configuraciones';
$string['restoresection'] = 'Restaurar sección';
$string['restorestage1'] = 'Confirmar';
$string['restorestage16'] = 'Revisar';
$string['restorestage16action'] = 'Realizar restauración';
$string['restorestage1action'] = 'Siguiente';
$string['restorestage2'] = 'Destino';
$string['restorestage2action'] = 'Siguiente';
$string['restorestage32'] = 'Proceso';
$string['restorestage32action'] = 'Continuar';
$string['restorestage4'] = 'Configuraciones';
$string['restorestage4action'] = 'Siguiente';
$string['restorestage64'] = 'Completo';
$string['restorestage64action'] = 'Continuar';
$string['restorestage8'] = 'Esquema';
$string['restorestage8action'] = 'Siguiente';
$string['restoretarget'] = 'Restaurar destino';
$string['restoretocourse'] = 'Restaurar al curso:';
$string['restoretocurrentcourse'] = 'Restaurar adentro de este curso';
$string['restoretocurrentcourseadding'] = 'Fusionar el curso del respaldo con este curso';
$string['restoretocurrentcoursedeleting'] = 'Borrar los contenidos de este curso y después restaurar';
$string['restoretoexistingcourse'] = 'Restaurar dentro de un curso existente';
$string['restoretoexistingcourseadding'] = 'Fusionar el curso del respaldo con el curso existente';
$string['restoretoexistingcoursedeleting'] = 'Borrar el contenido del curso actual y después restaurar';
$string['restoretonewcourse'] = 'Restaurar como curso nuevo';
$string['restoringcourse'] = 'Restauración de curso en progreso';
$string['restoringcourseshortname'] = 'restaurando';
$string['rootenrolmanual'] = 'Restaurar como inscripciones manuales';
$string['rootsettingactivities'] = 'Incluir actividades';
$string['rootsettinganonymize'] = 'Hacer anónima información de usuarios';
$string['rootsettingbadges'] = 'Incluir insignias';
$string['rootsettingblocks'] = 'Incluir bloques';
$string['rootsettingcalendarevents'] = 'Incluir eventos del calendario';
$string['rootsettingcomments'] = 'Incluir comentarios';
$string['rootsettingfilters'] = 'Incluir filtros';
$string['rootsettinggradehistories'] = 'Incluir historial de calificaciones';
$string['rootsettingimscc1'] = 'Convertir a IMS Cartucho Común 1.0';
$string['rootsettingimscc11'] = 'Convertir a IMS Cartucho Común 1.1';
$string['rootsettinglogs'] = 'Incluir bitácoras (logs) del curso';
$string['rootsettingroleassignments'] = 'Incluir asignaciones de rol de usuario';
$string['rootsettings'] = 'Configuraciones del respaldo';
$string['rootsettingusers'] = 'Incluir usuarios inscritos';
$string['rootsettinguserscompletion'] = 'Incluir detalles de grado de finalización de usuarios';
$string['sectionactivities'] = 'Actividades';
$string['sectioninc'] = 'Incluído en respaldo (sin información de usuarios)';
$string['sectionincanduser'] = 'Incluído en respaldo junto con la información de usuarios';
$string['selectacategory'] = 'Seleccione una categoría';
$string['selectacourse'] = 'Seleccione un curso';
$string['setting_course_fullname'] = 'Nombre del curso';
$string['setting_course_shortname'] = 'Nombre corto del curso';
$string['setting_course_startdate'] = 'Fecha de inicio del curso';
$string['setting_keep_groups_and_groupings'] = 'Mantener grupos y agrupamientos actuales';
$string['setting_keep_roles_and_enrolments'] = 'Mantener los roles e inscripciones actuales';
$string['setting_overwriteconf'] = 'Sobre-escribir configuración del curso';
$string['skiphidden'] = 'Saltar cursos ocultos';
$string['skiphiddenhelp'] = 'Elegir si se saltan o no los cursos ocultos';
$string['skipmodifdays'] = 'Saltar cursos sin modificaciones desde';
$string['skipmodifdayshelp'] = 'Elegir saltar cursos que no hayan sido modificados desde hace cierto número de días';
$string['skipmodifprev'] = 'Saltar cursos que no se hayan modificado desde el respaldo anterior';
$string['skipmodifprevhelp'] = 'Elegir si se saltan o no cursos que no hayan sido modificados desde el respaldo anterior';
$string['storagecourseandexternal'] = 'Área de archivos de respaldo de curso y la carpeta específica';
$string['storagecourseonly'] = 'Área de archivos de respaldo de curso';
$string['storageexternalonly'] = 'Especifique directorio para los respaldos automatizados';
$string['title'] = 'Título';
$string['totalcategorysearchresults'] = 'Categorías totales: {$a}';
$string['totalcoursesearchresults'] = 'Cursos totales: {$a}';
$string['userinfo'] = 'Info_usuario';
