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
 * Strings for component 'taskchain', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   taskchain
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['abandoned'] = 'Abandonado';
$string['activitycloses'] = 'Actividad Taskchain cierra';
$string['activitygrade'] = 'Calificación de actividad';
$string['activityname'] = 'Nombre de actividada';
$string['activityopens'] = 'Actividad Taskchain abre';
$string['added'] = 'Añadida';
$string['addtaskchain_help'] = '**No**
Solamente una tarea se añadirá al curso

**Si**
Si el archivo de orígen es un (archivo de tarea) **task file**, se le trata como el principio de una cadena de tareas, y todas las tareas en la cadena se añadirán al curso con configuraciones idénticas. Cada tarea en la cadena debe tener un enlace hacia el archivo siguiente en la cadena.

Si el archivo de orígen es una carpeta **folder**, todas las tareas reconocibles en la carpeta se añadirán al curso, para formar una cadena de tareas con configuraciones idénticas.

Si el archivo de orígen es un (archivo de cadena) **chain file**, como un archivo de Hot Potatoes masher file o index.html, las tareas enlistadas en el archivo de cadena se añadirán al curso como una cadena de tareas con configuraciones idénticas.';
$string['addtasks'] = 'Añadir (más) tareas';
$string['addtype'] = 'Archivos a ser añadidos';
$string['addtypeauto'] = 'Detectado automáticamente';
$string['addtypechainfile'] = 'Añadir todos los archivos enlistados en el archivo seleccionado';
$string['addtypechainfolder'] = 'Añadir todos los archivos en la carpeta seleccionada';
$string['addtypechainfolders'] = 'Añadir todos los archivos en todas las carpetas';
$string['addtypetaskchain'] = 'Añadir cadena empezando en la fila seleccionada';
$string['addtypetaskfile'] = 'Añadir solamente el archivo seleccionado';
$string['aftertaskid'] = 'Después de tarea';
$string['aftertaskid_help'] = 'Después de tarea';
$string['allowfreeaccess'] = 'Permitir el libre acceso';
$string['allowresume'] = 'Permitir resumen';
$string['allowresume_help'] = 'Esta configuración especifica si es que los estudiantes pueden o no retomar un intento.

**No** : No pueden retomarse los intentos.

**Si** : A los estudiantes se les dará la opción de continuar un intento previo que esté en progreso, o iniciar un nuevo intento.

**Forzar** : si existiera un intento previo que todavía estuviera en progreso, los estudiantes se verán forzados a retomar ese intento. De otra forma, pueden iniciar un nuevo intento.';
$string['allowreview'] = 'Permitir revisión';
$string['allowreview_help'] = 'Si se habilita, los estudiantes pueden revisar sus intentos de tareas despues de que la tarea esté cerrada.';
$string['anyattempts'] = 'Cualquier intento';
$string['anygroup'] = 'Cualquier grupo';
$string['applydefaults'] = 'Aplicar valores por defecto seleccionados';
$string['assessmenthdr'] = 'Evaluación';
$string['attemptcount'] = 'Conteo de intentos';
$string['attemptdelay'] = 'Retraso de intento';
$string['attemptduration'] = 'Duración del intento';
$string['attemptgrade'] = 'Calificación del intento';
$string['attemptgrademethod'] = 'Método de calificación del intento';
$string['attemptlimit'] = 'Límite de intentos';
$string['attemptlimit_help'] = 'El máximo número de intentos que un estudiante puede tener en esta actividad TaskChain';
$string['attemptnumber'] = 'Número de intento';
$string['attempts'] = 'Intentos';
$string['attemptsallowed'] = 'Intentos permitidos';
$string['attemptscore'] = 'Puntuación del intento';
$string['attemptshdr'] = 'Restricciones del intento';
$string['attemptsunlimited'] = 'Intentos ilimitados';
$string['attempttasknow'] = 'Intentar la tarea ahora';
$string['attempttype'] = 'Tipo de intento';
$string['average'] = 'Promedio';
$string['averagegrade'] = 'Calificación promedio';
$string['averagescore'] = 'Puntuación promedio';
$string['cacherecords'] = 'Registros de caché TaskChain';
$string['cannotread'] = 'No puede leerse el archivo (¡o el archivo está vacío!): {$a}';
$string['canrestartchain'] = 'Tus resultados hasta el momento han sido guardados, pero si quieres volver a hacer esta actividad después, tendrías que empezar por el principio.';
$string['canrestarttask'] = 'Tus resultados hasta el momento han sido guardados, y puedes volver a hacer  "{$a}" más tarde';
$string['canresumetask'] = 'Tus resultados hasta el momento han sido guardados, y puedes continuar "{$a}" más tarde';
$string['chain'] = 'Actividad TaskChain';
$string['chainattemptnotinprogress'] = 'Intento de Cadena no en progreso';
$string['chainclosed'] = 'Lo siento, esta actividad se cerró el {$a}';
$string['chainname_help'] = 'El nombre de esta actividad TaskChain se mostrará en la página del curso';
$string['chainnotavailable'] = 'Lo siento, esta actividadno estará disponible sino hasta después de {$a}';
$string['chainrequirepasswordmessage'] = 'Para intentar esta actividad, Usted necesita conocer la contraseña';
$string['checks'] = 'Revisiones';
$string['checksomeboxes'] = 'Por favor elija algunas casillas';
$string['clearcache'] = 'Limpiar caché TaskChain';
$string['cleardetails'] = 'Limpiar detalles TaskChain';
$string['clearedcache'] = 'El caché de TaskChain se ha limpiado';
$string['cleareddetails'] = 'Los detalles de TaskChain se han limpiado';
$string['clickreporting'] = 'Habilitar reporte de click';
$string['clickreporting_help'] = 'Si se habilita, se guarda un registro de cada vez que se hace click en un botón de "pista", "ayuda" o "revisar". Esto permite que el maestro vea un reporte muy detallado que muestra el estado de las tareas en cada click. De otra forma, solamente se guarda un registro por intento en una tarea.';
$string['clues'] = 'Pistas';
$string['cnumber'] = 'Intento de cadena';
$string['columnlistid'] = 'Mostrar columnas';
$string['columnlistid_help'] = 'Este menú le permite seleccionar cual conjunto de columnas se mostrarán en esta página';
$string['columnlistschain'] = 'Listas de columnas de todas las cadenas';
$string['columnlistschains'] = 'Listas de columnas para editar cadenas';
$string['columnlistsingle'] = 'Lista de columnast ($a)';
$string['columnliststask'] = 'Listas de columna de todas las tareas';
$string['columnliststasks'] = 'Listas de columna para tareas de edición';
$string['completed'] = 'Completada';
$string['conditions'] = 'Condiciones';
$string['conditionscore'] = 'Puntaje de condición';
$string['conditiontaskid'] = 'Tarea de condición';
$string['configenablecache'] = 'Manteniendo una caché de las tareas taskChain puede acelerar drásticamente el proporcionarles tareas a los estudiantes.';
$string['configenablecron'] = 'Especifique las horas en su zona horaria en las que puede correr el script de cron para TaskChain';
$string['configenablemymoodle'] = 'Esta configuración controla si es que las TaskChains son listadas o no en la página de Mi Moodle';
$string['configenableobfuscate'] = 'El ofuscar el código JavaScript para insertar reproductores multimedia hace más didícil el poder determinar el nombre del archivo multimedia y adivinar lo que contiene este archivo.';
$string['configenableswf'] = 'Permitir incrustar los archivos SWF en actividades taskChain. Si se habilita, esta configuración anula  filter_mediaplugin_enable_swf.';
$string['configfile'] = 'Archivo de configuración';
$string['configfilenotfound'] = 'Archivo de configuración no encontrado: {$a}';
$string['configframeheight'] = 'Cuando una tarea se muestra dentro de un marco, este valor es la altura (en pixeles) del marco superior que contiene la barra de navegación de Moodle.';
$string['configlocation'] = 'Localización del archivo de configuración';
$string['configlocation_help'] = 'La localización del archivo de configuración.';
$string['configlockframe'] = 'Si se habilita esta configuración, entonces el marco de navegación, si se usa, estará bloqueado de forma que no pueda desplazarse, ni cambiarse de tamaño, y que no tenga borde.';
$string['configmaxeventlength'] = 'Si una cadena TaskChain tiene tanto hora de apertura como hora de cierre especificadas, y la diferencia entre ambas es mayor que el número de días aquí especificados, entonces se añadirán dos eventos de calendario separados al calendario del curso. Para duraciones más cortas, o cuando solamente se especifica una hora, solamente se añadirá un evento de calendario. Si no se especifica ninguna de las dos horas, no se añadirá evento alguno de calendario.';
$string['configstoredetails'] = 'Si esta configuración está habilitada, entonces los detalles XML crudos de los intentos en tareas TaskChain se almacenarán en la tabla taskchain_details. Esto permite que los intentos de tareas sean re-calificados en el futuro para reflejar cambios en el sistema de puntuación de tareas de TaskChain. Sin embargo, habilitar esta opción en un sitio concurrido causará que la tabla taskchain_details crezca muy rápidamente.';
$string['confirmdeleteallpostconditions'] = '¿Está Usted seguro de querer eliminar TODAS las post-condiciones?';
$string['confirmdeleteallpreconditions'] = '¿Está Usted seguro de querer eliminar TODAS las pre-condiciones?';
$string['confirmdeleteattempts'] = '¿Está Usted seguro de querer eliminar los intentos seleccionados?';
$string['confirmdeletepostcondition'] = '¿Está Usted seguro de querer eliminar esta post-condición?';
$string['confirmdeleteprecondition'] = '¿Está Usted seguro de querer eliminar esta pre-condición?';
$string['confirmdeletetask'] = '¿Está Usted seguro de querer eliminar esta tarea?';
$string['confirmregradeattempts'] = '¿Está Usted seguro de querer re-calificar los intentos seleccionados?';
$string['confirmstop'] = '¿Está Usted seguro de querer navagar lejos de esta página?';
$string['consecutiveattempts'] = 'Intentos consecutivos';
$string['correct'] = 'Correcto';
$string['couldnotinsertsubmissionform'] = 'No se pudo insertar el formato de envío';
$string['delay'] = 'Espera';
$string['delay1'] = 'Espera 1';
$string['delay1_help'] = 'La espera mínimo entre el primer intento y el segundo.';
$string['delay1summary'] = 'Tiempo de espera entre el primer intento y el segundo';
$string['delay2'] = 'Espera 2';
$string['delay2_help'] = 'La espera mínimo entre intentos después del segundo intento.';
$string['delay2summary'] = 'Tiempo de espera entre intentos posteriores';
$string['delay3'] = 'Espera 3';
$string['delay3afterok'] = 'Esperar hasta que el estudiante elija OK';
$string['delay3disable'] = 'No continuar automáticamente';
$string['delay3specific'] = 'Usar tiempo específico (en segundos)';
$string['delay3summary'] = 'Tiempo de espera al final de la tarea';
$string['delay3template'] = 'Usar configuraciones en archivo de orígen/plantilla';
$string['deleteallattempts'] = 'Eliminar todos los intentos';
$string['deleteallcolumnlistschain'] = 'Eliminar TODAS las listas de columna de cadena';
$string['deleteallcolumnliststask'] = 'Eliminar TODAS las listas de columna de tarea';
$string['deleteallpostconditions'] = 'Eliminar TODAS las post-condiciones';
$string['deleteallpreconditions'] = 'Eliminar TODAS las pre-condiciones';
$string['deleteattempts'] = 'Eliminar intentos';
$string['deletecolumnlistchain'] = 'Eliminar lista de columna de cadena: $a';
$string['deletecolumnlisttask'] = 'Eliminar lista de columna de tarea: $a';
$string['deletepostcondition'] = 'Eliminar una post-condición';
$string['deleteprecondition'] = 'Eliminar una pre-condición';
$string['deletetasks'] = 'Eliminar tareas seleccionadas';
$string['detailsrecords'] = 'Registros de detalles de TaskChain';
$string['d_index'] = 'Índice de discriminación';
$string['discarddetails'] = 'Descartar detalles';
$string['discarddetails_help'] = 'Si esta configuración está en "Si", los detalles XML de cada intento de esta tarea se descartarán, de otra forma los detalles XML se almacenarán en la base de datos para posibles referencias futuras';
$string['duration'] = 'Duración';
$string['editchains'] = 'Editar cadenas';
$string['editcolumnlistschain'] = 'Editar columnas para Cadenas TaskChain';
$string['editcolumnliststask'] = 'Editar columnas para Tareas TaskChain';
$string['edittasks'] = 'Editar tareas';
$string['enablecache'] = 'Habilitar caché de TaskChain';
$string['enablecron'] = 'Habilitar cron de TaskChain';
$string['enablemymoodle'] = 'Mostrar TaskChains en Mi Moodle';
$string['enableobfuscate'] = 'Habilitar ofuscación del código de reproductor de medios';
$string['enableswf'] = 'Permitir incrustación de archivos SWF en actividades TaskChain';
$string['endofchain'] = 'Fin de cadena';
$string['entry_attempts'] = 'Intentos';
$string['entrycm'] = 'Actividad previa';
$string['entrycmcourse'] = 'Actividad previa en este curso';
$string['entrycm_help'] = 'Esta configuración especifica una actividad Moodle y una calificación mínima para esa actividad, que deben obtenerse antes de que esta actividada TaskChain pueda ser intentada.

El maestro puede seleccionar una actividad específica, o una de las configuraciones siguientes de propósito general:

*Actividad previa en este curso
*Actividad previa en esta sección
*TaskChain previa en este curso
*TaskChain previa en esta sección';
$string['entrycmsection'] = 'Actividad previa en esta sección del curso';
$string['entrycompletionwarning'] = 'Antes de iniciar esta actividad, Usted debe ver {$a}.';
$string['entry_dates'] = 'Fechas';
$string['entrygrade'] = 'Calificación de actividad previa';
$string['entrygradewarning'] = 'Usted no puede empezar esta actividad hasta que haya obtenido {$a->entrygrade}% en {$a->entryactivity}. Actualmente su calificación para esa actividad es de {$a->usergrade}%';
$string['entry_grading'] = 'Calificación';
$string['entryoptions'] = 'Opciones de página de entrada';
$string['entrypage'] = 'Mostrar página de entrada';
$string['entrypagehdr'] = 'Página de entrada';
$string['entrytaskchaincourse'] = 'TaskChain previa en este curso';
$string['entrytaskchainsection'] = 'TaskChain previa en esta sección del curso';
$string['entrytext'] = 'Texto de la página de entrada';
$string['entry_title'] = 'Nombre de la cadena igual al del título';
$string['error_formhelperclassnotfound'] = 'Clase ayudadora de formato taskChain no encontrada: {$a}';
$string['error_formhelperfilenotfound'] = 'Archivo ayudador de formato taskChain no encontrado: {$a}';
$string['error_getprivateproperty'] = 'No se puede accesar propiedad privada, {$a->property}, de {$a->class} objeto directamente. Use {$a->method} en su lugar.';
$string['error_getunknownproperty'] = 'No se puede accesar propiedad desconocida, {$a->property}, de {$a->class} objeto.';
$string['error_insertrecord'] = 'No se pudo insertar registro en tabla de base de datos: {$a}';
$string['error_missingclass'] = 'No se pudo encontrar la clase del objeto: {$a}';
$string['error_nocolumns'] = 'Por favor seleccione algunas columnas';
$string['error_nocourseid'] = 'Sin ID de curso';
$string['error_nodatabaseinfo'] = 'Sin información disponible de la base de datos';
$string['error_noinputparameters'] = 'Sin parámetros de entrada';
$string['error_norecordsfound'] = 'No se encontraron registros';
$string['error_recordclassnotfound'] = 'No se encontró la clase del registro Taskchain: {$a}';
$string['error_setprivateproperty'] = 'No se puede modificar propiedad privada, {$a->property}, de {$a->class} objeto directamente. Use {$a->method} en su lugar.';
$string['error_setpropertydirectly'] = 'No se puede modificar la propiedad {$a->property} de{$a->class} objeto directamente. Use {$a->method} en su lugar';
$string['error_setunknownproperty'] = 'No se puede modificar propiedad desconocida, {$a->property}, de {$a->class} objeto.';
$string['error_unrecognizedpageid'] = 'Pageid de TaskChain no reconocida: {$a}';
$string['error_updaterecord'] = 'No se pudo actualizar registro en tabla de base de datos: {$a}';
$string['exit_areyouok'] = 'Hola, ¿todavía estás allí?';
$string['exit_attemptscore'] = 'Su puntaje para ese intento fue {$a}';
$string['exitcm'] = 'Siguiente actividad';
$string['exitcmcourse'] = 'Siguiente actividad en este curso';
$string['exitcmsection'] = 'Siguiente actividad en esta sección del curso';
$string['exit_course'] = 'Curso';
$string['exit_course_text'] = 'Regresar a la página principal del curso';
$string['exit_encouragement'] = 'Estímulo';
$string['exit_excellent'] = '¡Excelente!';
$string['exit_feedback'] = 'Salir de página de retroalimentación';
$string['exit_goodtry'] = '¡Buen intento!';
$string['exitgrade'] = 'Calificación de siguiente actividad';
$string['exit_grades'] = 'Calificaciones';
$string['exit_grades_text'] = 'Vea sus calificaciones hasta el momento para este curso';
$string['exit_index'] = 'Índice';
$string['exit_index_text'] = 'Ir al índice de actividades';
$string['exit_links'] = 'Enlaces para salir de la página';
$string['exit_next'] = 'Siguiente';
$string['exit_next_text'] = 'Intentar la siguiente actividad';
$string['exit_noscore'] = '¡Usted ha completado exitosamente esta actividad!';
$string['exitoptions'] = 'Salir de opciones';
$string['exitpage'] = 'Mostrar página de salida';
$string['exitpagehdr'] = 'Página de salida';
$string['exitpage_help'] = '¿Debería de mostrarse una página de salida después de que se haya completado la tarea TaskChain?

**Si** : al estudiante se le mostrará una página de salida cuando se complete la  TaskChain. Los contenidos de la página de salida están determinados por las configuraciones para los enlaces y la retroalimentación de la página de salida de TaskChain.

**No** : al estudiante no se le mostrará una página de salida. En su lugar, se irán inmediatamente a la siguiente actividad, o regresarán a la página del curso Moodle.';
$string['exit_retry'] = 'Reintentar';
$string['exit_retry_text'] = 'Reintentar esta actividad';
$string['exittaskchaincourse'] = 'Siguiente TaskChain en este curso';
$string['exit_taskchaingrade'] = 'Su calficación para esta actividad es {$a}';
$string['exit_taskchaingrade_average'] = 'Su calificación promedio hasta ahora para esta actividad es {$a}';
$string['exit_taskchaingrade_highest'] = 'Su calificación más alta hasta ahora para esta actividad es {$a}';
$string['exit_taskchaingrade_highest_equal'] = '¡Usted igualó su máximo previo para esta actividad!';
$string['exit_taskchaingrade_highest_previous'] = 'Su calificación más alta anterior para esta actividad fue {$a}';
$string['exit_taskchaingrade_highest_zero'] = 'Usted todavía no ha obtenido calificación mayor de {$a} para esta actividad';
$string['exittaskchainsection'] = 'Siguiente TaskChain en esta sección de curso';
$string['exittext'] = 'Texto de página de salida';
$string['exit_welldone'] = '¡Bien hecho!';
$string['exit_whatnext_0'] = '¿Que quisieras hacer ahora?';
$string['exit_whatnext_1'] = 'Elije tu destino...';
$string['exit_whatnext_default'] = 'Por favor elija una d elas siguientes:';
$string['feedbackdiscuss'] = 'Discutir esta tarea en el foro';
$string['feedbackformmail'] = 'Formato de retroalimentación';
$string['feedbackmoodleforum'] = 'Foro Moodle';
$string['feedbackmoodlemessaging'] = 'Mensajería Moodle';
$string['feedbacknone'] = 'Ninguna';
$string['feedbacksendmessage'] = 'Mandarle un mensaje a su instructor';
$string['feedbackwebpage'] = 'Página web';
$string['filename'] = 'Nombre del archivo';
$string['filetype'] = 'Tipo del archivo';
$string['filteredchains'] = 'TaskChains que coinciden con los filtros siguientes:';
$string['filteredtasks'] = 'Tareas que coinciden con los filtros siguientes:';
$string['firstattempt'] = 'Primer intento';
$string['fixboms'] = 'Arreglar BOMs';
$string['forceplugins'] = 'Forzar plugins multimedia';
$string['forceplugins_help'] = 'Si se habilita, los reproductores compatibles con Moodle reproducirán los archivos del tipo AVI, MPEG, MPG, MP3, MOV y WMV. De otra forma, Moodle no cambiará las configuraciones de los reproductores multimedia en la tarea.';
$string['frameheight'] = 'Altura del marco';
$string['giveup'] = 'Darse por vencido';
$string['grade'] = 'Calificación';
$string['gradeignore'] = 'Ignorar vacíos';
$string['gradelimit'] = 'Límite de calificación';
$string['gradelimit_help'] = 'Las calificaciones para los intentos de cadena están escaladas para que se ajusten al rango desde 0 hasta el límite de calificación.

La calificación máxima para una actividad de TaskChain en el libro de calificaciones de Moodle se calcula de la siguiente manera:

: calificación máxima x (ponderación de calificación / 100)';
$string['grademethod'] = 'Método de calificación';
$string['gradeweighting'] = 'Ponderación de calificación';
$string['gradeweighting_help'] = 'Las calificaciones para esta actividad TaskChain se ajustarán por escala a este número en el libro de calificaciones de Moodle.';
$string['groupid'] = 'Grupo';
$string['groupid_help'] = 'El grupo de usuarios Moodle en donde se aplica esdta condición';
$string['guestsno'] = 'Lo siento, los invitados no pueden ver ni intentar actividades TaskChain';
$string['highestgrade'] = 'Calificación más alta';
$string['highestscore'] = 'Puntaje más alto';
$string['highesttaskscore'] = 'Puntaje de tarea más alto';
$string['hints'] = 'Sugerencias';
$string['ignored'] = 'Ignorado';
$string['incorrecttask'] = 'Tarea contestada incorrectamente';
$string['inprogress'] = 'En progreso';
$string['isgreaterthan'] = 'es mayor que';
$string['islessthan'] = 'es menor que';
$string['lastaccess'] = 'Último acceso';
$string['lastattempt'] = 'último intento';
$string['lasttaskabandoned'] = 'Puntaje de la última tarea abandonada';
$string['lasttaskattempted'] = 'Puntaje de la última tarea intentada';
$string['lasttaskcompleted'] = 'Puntaje de la última tarea completada';
$string['lasttasktimedout'] = 'Puntaje de la última tarea con tiempo agotado';
$string['lockframe'] = 'Bloquear marco';
$string['maxeventlength'] = 'Número máximo de días para un solo evento de calendario';
$string['maximum'] = '&lt;=';
$string['mediafilter_moodle'] = 'Filtros multimedia estándar de Moodle';
$string['mediafilter_taskchain'] = 'Filtro multimedia de TaskChain';
$string['menuofalltasks'] = 'Menú de todas las tareas';
$string['menuofalltasksone'] = 'Menú de todas las tareas (un enlace)';
$string['menuofnexttasks'] = 'Menú de siguientes tareas';
$string['menuofnexttasksone'] = 'Menú de siguientes tareas (un enlace)';
$string['migratingfiles'] = 'Migrando archivos de tareas Hot Potatoes';
$string['minimum'] = '&gt;=';
$string['missingsourcetype'] = 'Añ registro Taskchain le falta el tipo-de-origen (sourcetype)';
$string['modulename'] = 'CadenadeTarea (TaskChain)';
$string['modulename_help'] = 'El módulo TaskChain (CadenadeTareas) le permite a los maestros distribuir materiales interactivos de aprendizaje a sus alumnos mediante Moodle y ver reportes acerca de las respuestas de los alumnos y resultados.

Una actividad única de Taskchain consiste en una página opcional de entrada, una cadena de tareas y una página opcional de salida. Cada tarea puede ser una página web estática o una página web interactiva que les ofrece a los estudiantes texto, audio y estímulos visuales y graba sus respuestas. Las tareas son creadas en la computadora del maestro usando software para autoría y después son subidas a Moodle.

El maestro puede definir las rutas de aprendizaje mediante una cadena al añadir condiciones previas (pre-requisitos) y condiciones posteriores a las tareas. Una tarea no puede intentar realizarse hasta que todas las condiciones previas (pre-requisitos) hayan sido satisfechas. Después de que la tarea sea terminada, las condiciones posteriores definen lo que se muestra después al estudiante.

Una actividad de TaskChain puede contener tareas creadas con los siguientes programas (software) de autoría:

* Hot Potatoes (versión 6)
* Qedoc
* Xerte
* iSpring
* cualquier editor HTML';
$string['modulenameplural'] = 'TaskChains';
$string['movetasks'] = 'Mover tareas seleccionadas';
$string['name'] = 'Nombre';
$string['nameedit'] = 'Nombre';
$string['nameedit_help'] = 'El texto específico que se les muestra a los estudiantes';
$string['navigation'] = 'Navegación';
$string['navigation_embed'] = 'Página web incrustada';
$string['navigation_frame'] = 'Marco de navegación Moodle';
$string['navigation_give_up'] = 'Un botón único para "Abandonar"';
$string['navigation_moodle'] = 'Barras de navegación estándar de Moodle (superior y lateral)';
$string['navigation_none'] = 'Nada/ninguno';
$string['navigation_original'] = 'Ayudas de navegación originales';
$string['navigation_topbar'] = 'Solamente barra de navegación superior de Moodle (sin barras laterales)';
$string['next1task'] = 'Siguiente tarea';
$string['next2task'] = 'Saltarse la siguiente tarea';
$string['next3task'] = 'Saltarse 2 tareas';
$string['next4task'] = 'Saltarse 3 tareas';
$string['next5task'] = 'Saltarse 4 tareas';
$string['nexttaskid'] = 'Siguiente tarea';
$string['noactivity'] = 'Sin actividad';
$string['nograde'] = 'Sin calificación';
$string['nolastchainattempt'] = 'No se encontró el registro de cadena previa';
$string['nolasttaskattempt'] = 'No se encontró el registro de actividad previa';
$string['nomoreattempts'] = 'Lo siento, Usted ya no tiene más intentos para esta actividad';
$string['noresponses'] = 'No se encontró información sobre preguntas y respuestas individuales';
$string['noreview'] = 'Lo siento, Usted no tiene permitido ver detalles de este intento de tarea.';
$string['noreviewafterclose'] = 'Lo siento, esta tarea se cerró. Usted ya no tiene permitido ver detalles de este intento de tarea.';
$string['noreviewbeforeclose'] = 'Lo siento, Usted ya no tiene permitido ver detalles de este intento de tarea hasta después de {$a}.';
$string['noscore'] = 'Sin puntaje';
$string['nosourcefilesettings'] = 'Al registro TaskChain le falta información del archivo de orígen';
$string['notaskchains'] = 'No se encontraron TaskChains';
$string['notasksforyou'] = 'Lo siento, ahorita no hay tareas para que tu hagas.';
$string['notasksinchain'] = 'No hay tareas en esta cadena TaskChain';
$string['notavailable'] = 'Lo siento, esta actividad actualmente ya no está disponible para Usted.';
$string['notendswith'] = 'no termina con';
$string['notisempty'] = 'no está vacío';
$string['notisequalto'] = 'no es igual a';
$string['notstartswith'] = 'no comienza con';
$string['or'] = 'o';
$string['orless'] = '{$a} (o menos)';
$string['ormore'] = '{$a} (or más)';
$string['outputformat'] = 'Formato de salida';
$string['outputformat_best'] = 'Mejor';
$string['outputformat_help'] = 'El formato de salida especifica como se presentará el contenido al estudiante.

Los formatos de salida que están disponibles dependen del tipo de archivo de orígen. Algunos tipos de archivo de orígen solamente tienen un tipo de formato de salida, mientras que otros tipos de archivos de orígen tienen varios formatos de salida.

La "mejor" configuración mostrará el contenido empleando el formato de salida óptimo para el navegador del estudiante.';
$string['outputformat_hp_6_jcloze_html'] = 'JCloze (v6) desde html';
$string['outputformat_hp_6_jcloze_xml_anctscan'] = 'ANCT-Scan desde HP6 JCloze xml';
$string['outputformat_hp_6_jcloze_xml_dropdown'] = 'Desplegable (DropDown) desdeHP6 JCloze xml';
$string['outputformat_hp_6_jcloze_xml_findit_a'] = 'FindIt (a) desde HP6 JCloze xml';
$string['outputformat_hp_6_jcloze_xml_findit_b'] = 'FindIt (b) desde HP6 JCloze xml';
$string['outputformat_hp_6_jcloze_xml_jgloss'] = 'JGloss desde HP6 JCloze xml';
$string['outputformat_hp_6_jcloze_xml_v6'] = 'JCloze (v6) desde HP6 xml';
$string['outputformat_hp_6_jcloze_xml_v6_autoadvance'] = 'JCloze (v6) desde HP6 xml (Auto-avanzar)';
$string['outputformat_hp_6_jcross_xml_v6'] = 'JCross (v6) desde xml';
$string['outputformat_hp_6_jmatch_html'] = 'JMatch (v6) desde html';
$string['outputformat_hp_6_jmatch_xml_flashcard'] = 'JMatch (flashcard) desde xml';
$string['outputformat_hp_6_jmatch_xml_jmemori'] = 'JMemori desde xml';
$string['outputformat_hp_6_jmatch_xml_v6'] = 'JMatch (v6) desde xml';
$string['outputformat_hp_6_jmatch_xml_v6_plus'] = 'JMatch (v6+) desde xml';
$string['outputformat_hp_6_jmix_html'] = 'JQuiz (v6) desde html';
$string['outputformat_hp_6_jmix_xml_v6'] = 'JMix (v6) desde xml';
$string['outputformat_hp_6_jmix_xml_v6_plus'] = 'JMix (v6+) desde xml';
$string['outputformat_hp_6_jmix_xml_v6_plus_deluxe'] = 'JMix (v6+ con prefijo, sufijjo y distractores) desde xml';
$string['outputformat_hp_6_jmix_xml_v6_plus_keypress'] = 'JMix (v6+ con tecla apretada) desde xml';
$string['outputformat_hp_6_jquiz_xml_v6'] = 'JQuiz (v6) desde xml';
$string['outputformat_hp_6_jquiz_xml_v6_autoadvance'] = 'JQuiz (v6) desde xml (Auto-avance)';
$string['outputformat_hp_6_jquiz_xml_v6_exam'] = 'JQuiz (v6) desde xml (Examen)';
$string['outputformat_hp_6_rhubarb_html'] = 'Rhubarb (v6) desde html';
$string['outputformat_hp_6_rhubarb_xml'] = 'Rhubarb (v6) desde xml';
$string['outputformat_hp_6_sequitur_html'] = 'Sequitur (v6) desde html';
$string['outputformat_hp_6_sequitur_html_incremental'] = 'Sequitur (v6) desde html, puntaje incremental';
$string['outputformat_hp_6_sequitur_xml'] = 'Sequitur (v6) desde xml';
$string['outputformat_hp_6_sequitur_xml_incremental'] = 'Sequitur (v6) desde xml, puntaje incremental';
$string['outputformat_html_ispring'] = 'Archivo iSpring HTML';
$string['outputformat_html_xerte'] = 'Archivo Xerte HTML';
$string['outputformat_html_xhtml'] = 'Archivo HTML estándar';
$string['outputformat_qedoc'] = 'Archivo Qedoc';
$string['passworderror'] = 'La contraseña escrita era incorrecta';
$string['penalties'] = 'Castigos';
$string['percent'] = 'Porcentaje';
$string['pluginadministration'] = 'Administración de TaskChain';
$string['pluginname'] = 'Módulo TaskChain';
$string['postcondition'] = 'Post-condición';
$string['postconditions'] = 'Post-condiciones';
$string['postconditions_help'] = 'Después de terminar la tarea, será tomada la acción de la *primera* post-condición coincidente en la lista.';
$string['precondition'] = 'Pre-condición';
$string['preconditions'] = 'Pre-condiciones';
$string['preconditions_help'] = 'Esta tarea solamente puede ser tomada si *todas* las pre-condiciones en esta lista están satisfechas.';
$string['pressoktocontinue'] = 'Presione OK para cotinuar, o Cancelar para permanecer en la página actual';
$string['preview'] = 'Vista previa';
$string['previewchainnow'] = 'Previsualizar actividad TaskChain ahora';
$string['previewtasknow'] = 'Previsualizar tarea ahora';
$string['previoustask'] = 'Tarea previa';
$string['questionshort'] = 'Q-{$a}';
$string['randomtask'] = 'Tarea aleatoria';
$string['reattempttask'] = 'Re-intentar tarea';
$string['recentattempts'] = 'Intentos más recientes';
$string['removegradeitem_help'] = '¿ Debería removerse la calificación para esta actividad ?

**No** : el ítem de calificación para esta actividad en el libro de calificaciones de Moodle no será removido

**Si** : Si la calificación máxima para esta TaskChain está configurada a  "Sin calificación"  o si la ponderación de la calificación está configurada a  "Sin ponderación", entonces el ítem de calificación para esta actividad será removido del libro de calificaciones de Moodle';
$string['reordertasks'] = 'Re-ordenar tareas';
$string['requirepassword'] = 'Requerir contraseña';
$string['requirepassword_help'] = 'Si se especifica una contraseña, un estudiante deberá escribirla para poder intentar el examen.';
$string['requiresubnet'] = 'Requerir dirección de red';
$string['requiresubnet_help'] = 'El acceso al examen puede restringirse a subredes aparticulares de la LAN o el Internet al especificar una lista (separada por comas) de números de direcciones IP parciales o completas. Esto puede ser útil para un examen supervisado (vigilado), para asegurarse que solamente las personas dentro de cierto lugar puedan accesar al examen.';
$string['resume'] = 'Resumen';
$string['sametask'] = 'Misma tarea';
$string['score'] = 'Puntaje';
$string['scoreignore'] = 'Ignorar vacíos';
$string['scorelimit'] = 'Límite de puntaje';
$string['scorelimit_help'] = 'Esta configuración especifica el puntaje máximo para esta tarea. Todos los intentos de tarea se asume que son porcentajes y serán ajustados de forma tal que ningún puntaje de tarea sea mayor que el límite de puntaje de la tarea.';
$string['scoremethod'] = 'Método de puntuación';
$string['scoremethod_help'] = 'Esta configuración define cómo se calcula la puntuación de la tarea a partir de los intentos de tarea.

 **La más alta** La puntuación de la tarea se configurará a la puntuación más alta para un intento en esta tarea.

 **Promedio** La puntuación de la tarea se configurará a la puntuación promedio para los intentos en esta tarea.

**Primera** La puntuación de la tarea se configurará a la puntuación del primer intento en esta tarea.

**Última** La puntuación de la tarea se configurará a la puntuación del intento más reciente para esta tarea.';
$string['scoreweighting'] = 'Ponderación del puntaje';
$string['scoreweighting_help'] = 'La ponderación del puntaje es la contribución del puntaje para esta tarea hacia la calificación del intento de la cadena.

Si varias tareas requieren igual ponderación, entonces debería de dárseles la misma categoría de ponderación.';
$string['securityhdr'] = 'Restricciones de seguridad';
$string['selectattempts'] = 'Seleccionar intentos';
$string['selectedchains'] = 'TaskChains seleccionadas en este curso';
$string['selectedtasks'] = 'Tareas seleccionadas en esta TaskChain';
$string['showerrormessage'] = 'Error de TaskChain: {$a}';
$string['showpopup'] = 'Ventana';
$string['showpopup_help'] = '**Misma ventana**
La actividad TaskChain se mostrará en la misma ventana que la página del curso Moodle

**Nueva ventana**
La actividad TaskChain se mostrará en una ventana emergente. Algunas características de la ventana emergente pueden habilitarse o deshabilitarse con casillas.
El ancho y alto requeridos para la ventana emergente se especifican como el número de pixeles.';
$string['sortdirection'] = 'Dirección de ordenamiento';
$string['sortdirection_help'] = 'La dirección en la que Usted desea ordenar estos registros';
$string['sortfield'] = 'Campo pra ordenar';
$string['sortfield_help'] = 'El campo sobre del que Usted desea ordenar estos registros';
$string['sortincrement'] = 'Incremento para ordenar';
$string['sortincrement_help'] = 'Cuando las tareas sean re-ordenadas, los números de orden se incrementarán por la cantidad auií especificada';
$string['sortorder'] = 'Orden para ordenar';
$string['sortorder_help'] = 'El orden de esta tarea dentro de esta cadena';
$string['sourcefile'] = 'Archivo de orígen';
$string['sourcefilenotfound'] = 'El archivo de orígen no se encontró (o estaba vacío): {$a}';
$string['sourcelocation'] = 'Localización del archivo de orígen';
$string['sourcelocation_help'] = 'La localización del archivo de orígen';
$string['sourcetype'] = 'Tipo del archivo de orígen';
$string['sourcetype_help'] = 'El tipo de este archivo de orígen';
$string['startchainattempt'] = 'Iniciar nuevo intento de cadena';
$string['startofchain'] = 'Inicio de cadena';
$string['starttaskattempt'] = 'Iniciar nuevo intento de tarea';
$string['status'] = 'Status';
$string['stopbutton'] = 'Mostrar botón para detener';
$string['stopbutton_help'] = 'Si se habilita esta configuración, se insertará un botón para \'detener\' dentro de la tarea.

Si un alumno elige el botón para detener, los resultados hasta ese momento se regresarán a Moodle y el status del intento de la tarea se pondrá en \'abandonada\'.

El texto que se muestra en el botón para detener puede ser una de las frases pre-hechas de los paquetes de idioma de Moodle, o el profesor puede especificar su propio texto para el botón.';
$string['stopbuttonlangpack'] = 'Del paquete de idioma';
$string['stopbuttonspecific'] = 'Usar texto específico';
$string['stoptext'] = 'Texto del botón de detener';
$string['storedetails'] = 'Guardar XML con los detalles crudos de los intentos de TaskChain';
$string['studentfeedback'] = 'Retroalimentación al estudiante';
$string['studentfeedbackurl'] = 'URL de retroalimentación al estudiante';
$string['submits'] = 'Envíos';
$string['subplugintype_taskchainattempt'] = 'Formato de salida';
$string['subplugintype_taskchainattempt_plural'] = 'Formatos de salida';
$string['subplugintype_taskchainreport'] = 'Reporte';
$string['subplugintype_taskchainreport_plural'] = 'Reportes';
$string['subplugintype_taskchainsource'] = 'Archivo de orígen';
$string['subplugintype_taskchainsource_plural'] = 'Archivos de orígen';
$string['task'] = 'Tarea';
$string['taskattemptnotinprogress'] = 'Intento de tarea NO en progreso';
$string['taskchain:addinstance'] = 'Añadir una nueva actividad TaskChain';
$string['taskchain:attempt'] = 'Intentar una actividad TaskChain y enviar resultados';
$string['taskchain:deleteallattempts'] = 'Eliminar cualquier intento del usuario en una actividad TaskChain';
$string['taskchain:deletemyattempts'] = 'Eliminar sus propios intentos en una actividad TaskChain';
$string['taskchain:ignoretimelimits'] = 'Ignorar límites de tiempo en una actividad TaskChain';
$string['taskchain:manage'] = 'Cambiar las configuraciones de una actividad TaskChain';
$string['taskchainname'] = 'Nombre de TaskChain';
$string['taskchain:preview'] = 'Previsualizar una actividad TaskChain';
$string['taskchain:reviewallattempts'] = 'Ver cualquier intento de usuario en una actividad TaskChain';
$string['taskchain:reviewmyattempts'] = 'Ver sus propios intentos en una actividad TaskChain';
$string['taskchain:view'] = 'Ver la página de entrada de una actividad TaskChain';
$string['taskclosed'] = 'Lo siento, esta tarea se cerró en {$a}';
$string['taskname'] = 'Nombre de tarea';
$string['taskname_help'] = 'texto de ayuda para nombre de Tarea';
$string['tasknames'] = 'Nombres de Tarea';
$string['tasknotavailable'] = 'Lo siento, esta tarea no estará disponible para Usted sino hasta después de {$a}.';
$string['taskposition'] = 'Posición de tarea';
$string['taskrequirepasswordmessage'] = 'Para intentar esta tarea, Usted necesita conocer la contraseña';
$string['tasks'] = 'Tareas';
$string['tasktype'] = 'Tipo de tarea';
$string['textsourcefile'] = 'Obtener del archivo orígen';
$string['textsourcefilename'] = 'Usar nombre del archivo orígen';
$string['textsourcefilepath'] = 'Usar ruta del archivo orígen';
$string['textsourcespecific'] = 'Texto específico';
$string['textsourcetask'] = 'Obtener de la tarea';
$string['timeclose'] = 'Disponible hasta';
$string['timedout'] = 'Se acabó el tiempo';
$string['timehdr'] = 'Restricciones de tiempo';
$string['timelimit'] = 'Límite de tiempo';
$string['timelimitexpired'] = 'El límite de tiempo para este intento ha caducado';
$string['timelimitspecific'] = 'Usar tiempo específico';
$string['timelimitsummary'] = 'Límite de tiempo para un intento';
$string['timelimittemplate'] = 'Usar configuraciones del archivo de orígen/plantilla';
$string['timeopen'] = 'Disponible a partir de';
$string['timeopenclose'] = 'Horas de aperrtura y cierre';
$string['timeopenclose_help'] = 'Usted puede especificar las horas en que esta tarea sea accesible para quienes hacen intentos. Antes de la hora de apertura, y después de la hora de cierre, la tarea estará no-disponible.';
$string['title'] = 'Título';
$string['titleappendsortorder'] = 'Agregar órden';
$string['title_help'] = 'Esta configuración especifica el título a mostrar en la página web.

**Nombre de la actividad TaskChain** : el nombre de esta actividad TaskChain se mostrará como el título de la página web.

**Obtener del archivo fuente** : el título, si existiera, definido en el archivo fuente, se usará como el título de la página web.

**Usar nombre del archivo fuente** : el nombre del archivo fuente, excluyendo los nombres de las carpetas, se usará como el título para la página web.

**Usar ruta al archivo fuente** : la ruta al archivo fuente, inclyendo cualquier nombre de carpeta, se usará como el título de la página web.';
$string['titleprependchainname'] = 'Anteponer el nombre de la cadena';
$string['totaltaskscores'] = 'Total de puntajes de tarea';
$string['unansweredtask'] = 'Tarea no contestada';
$string['unseentask'] = 'Tarea no vista';
$string['updated'] = 'Actualizada';
$string['usefilters'] = 'Usar filtros';
$string['usefilters_help'] = 'Si se habilita esta configuración, el contenido será pasado a través de los filtros de Moodle antes de enviarse al navegador de internet.';
$string['useglossary'] = 'Usar glosario';
$string['useglossary_help'] = 'Si esta configuración se habilita, el contenido será pasado a través del filtro de Auto-enlazado del Glosario de Moodle antes de enviarse al navegador de internet.

Tome nota de que esta configuración anula la configuración de la administración del sitio para habilitar o deshabilitar el filtro de Auto-enlazar del Glosario.';
$string['usemediafilter'] = 'Usar filtro multimedia';
$string['utilitiesindex'] = 'Índice de Utilerías de TaskChain';
$string['viewreports'] = 'Ver reportes para {$a} usuario(s)';
$string['views'] = 'Vistas';
$string['weighting'] = 'Ponderación';
$string['weightingequal'] = 'Ponderación igual';
$string['weightingnone'] = 'Sin ponderación';
$string['window'] = 'Ventana';
$string['windowdirectories'] = 'Mostrar los enlaces de directorio';
$string['windowheight'] = 'Altura por defecto de la ventana (en pixeles)';
$string['window_help'] = 'Mostrar la actividad en la ventana principal de Moodle, o en una ventana emergente.

**Misma ventana** : La actividad TaskChain se mostrará en la misma ventana que la página del curso Moodle.

**Nueva ventana** : La actividad TaskChain se mostrará en una ventana emergente. Algunas características de la ventana emergente pueden habilitarse o deshabilitarse con casillas seleccionables (check boxes). La altura y ancho requeridos  de la ventana emergente están especificadas como un número de pixeles.';
$string['windowlocation'] = 'Mostrar la barra de localización';
$string['windowmenubar'] = 'Mostrar la barra del menú';
$string['windowmoodlebutton'] = 'Mostrar botón para cerrar ventana';
$string['windowmoodlefooter'] = 'Mostrar pie de página de Moodle';
$string['windowmoodleheader'] = 'Mostrar encabezado de Moodle';
$string['windowmoodlenavbar'] = 'Mostrar barra de navegación de Moodle';
$string['windownew'] = 'Nueva ventana';
$string['windowresizable'] = 'Permitir que a la nueva ventana se le cambie el tamaño';
$string['windowsame'] = 'Misma ventana';
$string['windowscrollbars'] = 'Permitir que la nueva ventana pueda desplazarse';
$string['windowstatus'] = 'Mostrar la barra de status';
$string['windowtoolbar'] = 'Mostrar la barra de herramientas';
$string['windowwidth'] = 'Ancho por defecto de la ventana (en pixeles)';
$string['wrong'] = 'Equivocado';
$string['youneedtoenrol'] = 'Usted necesita inscribirse en este curso antes de poder intentar esta actividad de Cadena-de-Tarea (Taskchain)';
$string['zeroduration'] = 'Sin duración';
$string['zerograde'] = 'Calificación de cero';
$string['zeroscore'] = 'Puntuación de cero';
