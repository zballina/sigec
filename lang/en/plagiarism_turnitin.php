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
 * Strings for component 'plagiarism_turnitin', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   plagiarism_turnitin
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adminlogin'] = 'Entrar a Turnitin como Admin';
$string['anonymity'] = 'Hacer anónimos los envíos de estudiantes dentro de Turnitin';
$string['anonymity_help'] = 'Esto evitará que los profesores puedan ver cuales estudiantes son cuales al ir a la interfase Turnitin en submit.ac.uk. Es esencial en el caso de que el módulo esté tratando de instaurar anonimato.';
$string['beingprocessed'] = 'El archivo fue subido exitosamente y actualmente está siendo procesado por Turnitin';
$string['compareinstitution'] = 'Comparar archivos enviados con publicaciones enviadas dentro de esta institución';
$string['compareinstitution_help'] = 'Esta opción solamente está disponible si Usted ha configurado/comprado un nodo personalizado. Debería de ponerse en "No" si no está seguro.';
$string['compareinternet'] = 'Comparar archivos enviados con internet';
$string['compareinternet_help'] = 'Esta opción permite que los envíos se comparen con contenido de internet que actualmente indexa Turnitin';
$string['comparejournals'] = 'Comparar archivos enviados con revistas, periódicos, publicaciones';
$string['comparejournals_help'] = 'Esta opción permite que los envíos se comparen con revistas, periódicos y publicaciones que actualmente indexa Turnitin';
$string['comparestudents'] = 'Comparar archivos enviados con archivos de otros estudiantes';
$string['comparestudents_help'] = 'Esta opción permite comparar archivos enviados con archivos de otros estudiantes';
$string['configdefault'] = 'Esta es una configuración estándar para la página de creación de tarea. Solamente los usuarios con con el premiso plagiarism/turnitin:enableturnitin pueden cambiar esta configuración para una tarea individual';
$string['configusetiimodule'] = 'Habilitar envío a Turnitin.';
$string['defaultsdesc'] = 'Las siguientes configuraciones son las que están por defecto al habilitar Turnitin dentro de un Módulo de Actividad';
$string['defaultupdated'] = 'Configuraciones por defecto de Turnitin actualizadas';
$string['draftsubmit'] = 'Cuando el archivo debería ser enviado a Turnitin';
$string['errorassigninguser'] = 'Ocurrió un error al tratar de asignar este usuario al sistema externo Turnitin - Las ligas Turnitin a esta página puede que no funcionen.';
$string['excludebiblio'] = 'Excluir bibliografía';
$string['excludebiblio_help'] = 'El material bibliográfico también puede ser incluido y excluido al ver el Reporte de Originalidad. Esta configuración no puede modificarse después de haber enviado el primer archivo.';
$string['excludematches'] = 'Excluir coincidencias pequeñas';
$string['excludematches_help'] = 'Usted puede excluir coincidencias pequeñas por porcentaje o por número de palabras - seleccione el tipo que desea usar y escriba el porcentaje o número de palabras en la caja debajo.';
$string['excludequoted'] = 'Excluir material citado';
$string['excludequoted_help'] = 'El material citado también puede ser incluido o excluido al ver el Reporte de Originalidad. Esta configuración no puede modificarse después de haber enviado el primer archivo.';
$string['file'] = 'Archivo.';
$string['filedeleted'] = 'Archivo borrado de la cola';
$string['fileopenerror'] = '¡Error al tratar de abrir el archivo XML de plagio! {$a}';
$string['fileresubmitted'] = 'Archivo formado en cola para re-envío';
$string['id'] = 'ID';
$string['missingkey'] = '¡No se configuró la Clave Secreta de Turnitin!';
$string['module'] = 'Módulo';
$string['name'] = 'Nombre';
$string['percentage'] = 'Porcentaje';
$string['pluginname'] = 'Plugin de plagio Turnitin';
$string['reportgen'] = 'Cuando generar los Reportes de Originalidad';
$string['reportgenduedate'] = 'En la fecha esperada';
$string['reportgen_help'] = 'Esta opción le permite seleccionar cuando debería generarse el Reporte de Originalidad';
$string['reportgenimmediate'] = 'Inmediatamente (el primer reporte es final)';
$string['reportgenimmediateoverwrite'] = 'Inmediatamente (se pueden sobre-escribir los reportes)';
$string['resubmit'] = 'Re-enviar';
$string['savedconfigfailure'] = 'No se pudo conectar/autenticar con Turnitin - Usted puede tener una combinación incorrecta de Clave Secreta/ID de cuenta o este servidor no se puede conectar al API';
$string['savedconfigsuccess'] = 'Configuraciones de Turnitin guardadas, y cuenta de profesor creada';
$string['showstudentsreport'] = 'Mostrar reporte de similitud al estudiante';
$string['showstudentsreport_help'] = 'El reporte de similitud da un desglose de que partes del envío fueron plagios y el lugar donde Turnitin vió por primera vez este contenido';
$string['showstudentsscore'] = 'Mostrar puntaje de similitud al estudiante';
$string['showstudentsscore_help'] = 'El puntaje de similitud es el porcentaje del envío que ha coincidido con otro contenido - un puntaje alto es malo usualmente.';
$string['showwhenclosed'] = 'Cuando la actividad se cierre';
$string['similarity'] = 'Similitud';
$string['status'] = 'Status';
$string['studentdisclosure'] = 'Declaración para estudiantes';
$string['studentdisclosuredefault'] = 'Todos los archivos subidos serán enviados al servicio de detección de plagio de Turnitin.com';
$string['studentdisclosure_help'] = 'Este textose mostrará a todos los estudiantes en la página de subida de archivo';
$string['submitondraft'] = 'Enviar archivo cuando se suba por primera vez';
$string['submitonfinal'] = 'Enviar archivo cuando el estudiante lo envíe para ser calificado';
$string['teacherlogin'] = 'Entrar a Turnitin como Maestro';
$string['tii'] = 'Turnitin';
$string['tiiaccountid'] = 'ID cuenta Turnitin';
$string['tiiaccountid_help'] = 'Esta es la ID de su cuenta tal como se la proporcionó Turnitin.com';
$string['tiiapi'] = 'API de Turnitin';
$string['tiiapi_help'] = 'Esta es la dirección del APIde Turnitin - usualmente https://api.turnitin.com/api.asp';
$string['tiiconfigerror'] = 'Ocurrió un error de configuración del sitio al intentar enviar este archivo a Turnitin';
$string['tiiemailprefix'] = 'prefijo de Email del alumno';
$string['tiiemailprefix_help'] = 'Usted debe configurar esto si no quiere que sus estudiantes puedan  entrar al sitio de turnitin.com y ver resportes completos.';
$string['tiienablegrademark'] = 'Habilitar Grademark (Experimental)';
$string['tiienablegrademark_help'] = 'Grademart es una característtica opcional dentro de Turnitin - Usted debe haberla incluido en su suscripción a Turnitin para usarla. Habilitarla causará que las páginas de ver envíos se cargen lentamente.';
$string['tiierror'] = 'Error TII:';
$string['tiierror1007'] = 'Turnitin no pudo procesar este archivo porque es demasiado grande';
$string['tiierror1008'] = 'Ocurrió un error al intentar enviar este archivo a Turnitin';
$string['tiierror1009'] = 'Turnitin no pudo procesar este archivo - es un tipo de archivo no soportado. Los tipos de archivo válidos son MS Word, Acrobat PDF, Postscript, Texto, HTML, WordPerfect y Rich Text Format (Formato de Texto Enriquecido). Este error también puede significar que Usted tiene la extensión del archivo equivocada.';
$string['tiierror1010'] = 'Turnitin no pudo procesar este archivo - debe tener más de 100 caracteres que no sean espacios blancos';
$string['tiierror1011'] = 'Turnitin no pudo procesar este archivo - está formateado incorrectamente y parece que tiene espacios entre las letras';
$string['tiierror1012'] = 'Turnitin no pudo procesar este archivo - su tamaño escede los límites de Turnitin';
$string['tiierror1013'] = 'Turnitin no pudo procesar este archivo - debe contener más de 20 palabras';
$string['tiierror1020'] = 'Turnitin no pudo procesar este archivo - contiene caracteres de un juego de caracteres que no está soportado';
$string['tiierror1023'] = 'Turnitin no pudo procesar este PDF- asegúrese de que no esté protegido por contraseña y que contenga texto seleccionable en lugar de imágenes escaneadas';
$string['tiierror1024'] = 'Turnitin no pudo procesar este archivo - no reune el criterio de Turnitin para un artículo legítimo';
$string['tiierrorpaperfail'] = 'Turnitin no pudo procesar este archivo';
$string['tiierrorpending'] = 'Archivo pendiente de envío a Turnitin';
$string['tiiexplain'] = 'Turnitin es un producto comercial y Usted necesita tener una suscripción pagada para usar este servicio; para mayor información vea <a href="http://docs.moodle.org/en/Turnitin_administration">http://docs.moodle.org/en/Turnitin_administration</a>';
$string['tiiexplainerrors'] = 'Esta página enlista los archivos enviados a Turnitin que actualmente están en un estado de error. Una lista de los códigos de error de turnitin y su descripción se encuentra disponible aquí:<a href="http://docs.moodle.org/en/Turnitin_errors">docs.moodle.org/en/Turnitin_errors</a><br/> Cuando los archivos son reseteados, el programa cron intentará enviar de nuevo el archivo a turnitin.<br/> Cuando los archivos sean borrados en esta página no podrán ser re-enviados a turnitin y ya no se mostrarán errores a los maestros ni a los alumnos';
$string['tiisecretkey'] = 'Clave Secreta Turnitin';
$string['tiisecretkey_help'] = 'Entrar a Turnitin.com como su administrador de sitio para obtener esto.';
$string['tiisenduseremail'] = 'Mandar E-mail Usuario';
$string['tiisenduseremail_help'] = 'Mandarle un correo electrónico a cada estudiante creado en el sistema TII con un enlace para permitirles entrar a www.turnitin.com con una contraseña temporal';
$string['turnitin'] = 'Turnitin';
$string['turnitin_attemptcodes'] = 'Códigos de Error para re-enviar';
$string['turnitin_attemptcodes_help'] = 'Códigos de error que Turnitin generalmente acepta al segundo intento (Cambios en este campo pueden causar mayores cargas sobre su servidor)';
$string['turnitin_attempts'] = 'Número de re-intentos';
$string['turnitin_attempts_help'] = 'Número de veces que los códigos especificados son re-enviados a Turnitin, 1 reintento significa que los archivos con los códigos de error especificados serán re-enviados dos veces.';
$string['turnitindefaults'] = 'Configuraciones por defecto de Turnitin';
$string['turnitin:enable'] = 'Permitirle al maestro habilitar/deshabilitar Turnitin dentro de un módulo';
$string['turnitinerrors'] = 'Errores de Tunitin';
$string['turnitin_institutionnode'] = 'Habilitar Nodo Institucional';
$string['turnitin_institutionnode_help'] = 'Si Usted ha configurado/comprado un nodo Institucional con su cuenta, habilítelo para permitir que el nodo sea seleccionado al crear asignaciones. NOTA: Si Usted no tiene un nodo Institucional, el habilitar esta configuración causará que sus envíos de artículos fallen.';
$string['turnitin:viewfullreport'] = 'Permitirle al maestro ver el reporte completo regresado por Turnitin';
$string['turnitin:viewsimilarityscore'] = 'Permitirle al maestro ver el puntaje de similitud regresado por Turnitin';
$string['userprofileteachercache'] = 'Caché del curso para profesor Turnitin';
$string['userprofileteachercache_desc'] = 'Este campo es usado por el plugin de Turnitin para mantener un registro de todos los cursos a los que ha sido asignado un profesor. Usted puede vaciar este campo pero esto puede afectar el rendimiento.';
$string['useturnitin'] = 'Habilitar Turnitin';
$string['wordcount'] = 'Número de palabras';
