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
 * Strings for component 'tool_installaddon', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   tool_installaddon
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['acknowledgement'] = 'Declaratoria';
$string['acknowledgementmust'] = 'Usted debe aceptar esto';
$string['acknowledgementtext'] = 'Yo entiendo que es mi responsabilidad el tener respaldos (copias de seguridad) completos de este sitio, antes de instalar complementos. Yo acepto y entiendo que los complementos (especialmente, aunque no limitado a, aquellos originarios de fuentes no-oficiales) pueden contener agujeros de seguridad, pueden hacer no-disponible al sitio, o causar fugas o pérdidas de datos privados.';
$string['featuredisabled'] = 'El instalador de complementos está deshabilitado en este sitio.';
$string['installaddon'] = '¡Instalar complemento!';
$string['installaddons'] = 'Instalar complementos';
$string['installexception'] = 'Órale... Ocurrió un error al tratar de instalar el complemento. Active el modo de depuración (debugging) para ver más detalles acerca del error.';
$string['installfromrepo'] = 'Instalar complementos desde el directorio de plugins de Moodle';
$string['installfromrepo_help'] = 'Usted será redireccionado hacia el directorio de plugins de Moodle para buscar e instalar un complemento. Tome nota de que el nombre completo de su sitio, URL y versión principal serán enviados, para hacerle más sencillo el proceso de instación.';
$string['installfromzip'] = 'Instalar complemento desde archivo ZIP';
$string['installfromzipfile'] = 'Paquete ZIP';
$string['installfromzipfile_help'] = 'El paquete ZIP del plugin debe contener exactamente un directorio que concuerda con el nombre del plugin. El ZIP será extraído hacia la localización apropiada para el tipo dado de plugin. Los paquetes descargados desde el directorio de plugins de Moodle tienen este formato.';
$string['installfromzip_help'] = 'Una alternativa a instalar complementos directamente desde el directorio de plugins de Moodle, es subir un paquete ZIP del complemento. Este paquete ZIP debería de tener la misma estructura que un paquete descargado desde el directorio de plugins de Moodle.';
$string['installfromziprootdir'] = 'Renombrar el directorio raíz';
$string['installfromziprootdir_help'] = 'Algunos paquetes ZIP, tales como los generados por Github, pueden contener un nombre incorrecto del directorio raíz. Si así fuera, Usted puede escribir aquí el nombre correcto.';
$string['installfromzipsubmit'] = 'Instalar complemento desde el archivo ZIP';
$string['installfromziptype'] = 'Tipo de plugin';
$string['installfromziptype_help'] = 'Elija el tipo correcto de plugin que está a punto de instalar. Advertencia: El procedimiento de instalación puede fallar feamente cuando se especifica un tipo incorrecto de plugin.';
$string['permcheck'] = 'Asegúrese de que la localización de la raíz del tipo de plugin sea escribible por el proceso del servidor web';
$string['permcheckerror'] = 'Error al revisar los permisos de escritura';
$string['permcheckprogress'] = 'Revisando los permisos de escritura ...';
$string['permcheckresultno'] = 'La localización del tipo de plugin <em>{$a->path}</em> no es escribible';
$string['permcheckresultyes'] = 'La localización del tipo de plugin <em>{$a->path}</em> si es escribible';
$string['pluginname'] = 'Instalador de complementos';
$string['remoterequestalreadyinstalled'] = 'Hay una solicitud para instalar el complemento {$a->name} ({$a->component}) versión {$a->version} desde el directorio de plugins de Moodle hacia este sitio. Sin embargo, éste plugin <strong>ya está instalado</strong> en este sitio.';
$string['remoterequestconfirm'] = 'Hay una solicitud para instalar el complemento  <strong>{$a->name}</strong> ({$a->component}) versión {$a->version} desde el directorio de plugins de Moodle hacia este sitio. Si continúa, el paquete ZIP del complemento será descargado para validación. Todavía no se instalará nada.';
$string['remoterequestinvalid'] = 'Hay una solicitud para instalar un complemento desde el directorio de plugins de Moodle hacia este sitio. Desafortunadamente, esta solicitud no es válida, por lo que el complemento no puede ser instalado.';
$string['remoterequestpermcheck'] = 'Hay una solicitud para instalar el complemento {$a->name} ({$a->component}) versión {$a->version} desde el directorio de plugins de Moodle hacia este sitio. Sin embargo, la localización del tipo de plugin <strong>{$a->typepath}</strong> es <strong>no escribible</strong>. Uste necesita darle el acceso completo para escritura al servidor web para la localización del tipo del plugin ahora. Una vez que se otorgue el acceso de escritura, presione el botón de continuar para repetir la revisión.';
$string['remoterequestpluginfoexception'] = 'Órale...Ocurrió un error al tratar de obtener información acerca del complemento {$a->name} ({$a->component}) versión {$a->version}. El complemento no puede ser instalado. Active el modo de depuración (debugging) para ver más detalles acerca de este error.';
$string['validation'] = 'Validación del paquete del complemento';
$string['validationmsg_componentmatch'] = 'Nombre completo del componente';
$string['validationmsg_componentmismatchname'] = 'No concuerda nombre del complemento';
$string['validationmsg_componentmismatchname_help'] = 'Algunos paquetes ZIP, tales como los generados por Github, pueden contener el nombre incorrecto del directorio raíz. Usted tiene que arreglar el nopmbre del directorio raíz para que coincida con el nombre declarado del complemento.';
$string['validationmsg_componentmismatchname_info'] = 'El complemento declara que su nombre es \'{$a}\' pero eso no coincide con el nombre del directorio raíz';
$string['validationmsg_componentmismatchtype'] = 'No coincide el tipo de complemento';
$string['validationmsg_componentmismatchtype_info'] = 'Usted ha seleccionado el tipo \'{$a->expected}\' pero el complemento declara que su tipo es \'{$a->found}\'.';
$string['validationmsg_filenotexists'] = 'No se encontró el archivo extraído';
$string['validationmsg_filesnumber'] = 'No se encontraron suficientes archivos en el paquete';
$string['validationmsg_filestatus'] = 'No se pudieron extraer todos los archivos';
$string['validationmsg_filestatus_info'] = 'Al intentar extraer el archivo {$a->file} resultó en error \'{$a->status}\'.';
$string['validationmsglevel_debug'] = 'Depuración (debug)';
$string['validationmsglevel_error'] = 'Error';
$string['validationmsglevel_info'] = 'OK';
$string['validationmsglevel_warning'] = 'Advertencia';
$string['validationmsg_maturity'] = 'Nivel de madurez declarado';
$string['validationmsg_maturity_help'] = 'El complemento puede declarar su nivel de madurez. Si el mantenedor considera que el complemento es estable, el nivel de madurez declarado leerá MATURITY_STABLE. Todos los demás niveles de madurez (como alfa o beta) deberían de considerarse inestables y se levantará una advertencia.';
$string['validationmsg_missingexpectedlangenfile'] = 'No coincide nombre del archivo de idioma Inglés';
$string['validationmsg_missingexpectedlangenfile_info'] = 'Al tipo de complemento dado le falta el archivo de idioma Inglés esperado {$a}.';
$string['validationmsg_missinglangenfile'] = 'No se encontró el archivo del idioma Inglés';
$string['validationmsg_missinglangenfolder'] = 'Falta la carpeta del idioma inglés';
$string['validationmsg_missingversion'] = 'El complemento no declara su versión';
$string['validationmsg_missingversionphp'] = 'No se encontró el archivo version.php';
$string['validationmsg_multiplelangenfiles'] = 'Se encontraron múltiples archivos de idioma Inglés';
$string['validationmsg_onedir'] = 'Estructura inválida del paquete ZIP.';
$string['validationmsg_onedir_help'] = 'El paquete ZIP debe contener exactamente un directorio raíz que contiene el código del complemento. El nombre de ese directorio raíz debe de coincidir con el nombre del plugin.';
$string['validationmsg_pathwritable'] = 'Revisión de acceso de escritura';
$string['validationmsg_pluginversion'] = 'Versión del complemento';
$string['validationmsg_release'] = 'Lote del complemento';
$string['validationmsg_requiresmoodle'] = 'Versión de Moodle requerida';
$string['validationmsg_rootdir'] = 'Nombre del complemento a ser instalado';
$string['validationmsg_rootdir_help'] = 'El nombre del directorio raíz dentro del paquete ZIP forma el nombre del complemento a ser instalado. Si el nombre no es correcto, Usted puede desear renombrar el directorio raíz dentro del ZIP anes de instalar el complemento.';
$string['validationmsg_rootdirinvalid'] = 'Nombre del complemento inválido';
$string['validationmsg_rootdirinvalid_help'] = 'El nombre del directorio raíz dentro del paquete ZIP viola los requerimientos formales de sintaxis. Algiunos paquetes ZIP, tales como los generados por Github, pueden contener un nombre incorrecto del directorio raíz. Usted tendrá que arreglar el nombre del directorio raíz, para que coincida con el nombre del complemento.';
$string['validationmsg_targetexists'] = 'Ya existía previamente la localización del destino';
$string['validationmsg_targetexists_help'] = 'El directorio al cual se instalará el complemento, no  debe de existir previamente.';
$string['validationmsg_unknowntype'] = 'Tipo de plugin desconocido';
$string['validationresult0'] = '¡Falló la validación!';
$string['validationresult0_help'] = 'Se detectó un problema serio, por lo que no es seguro instalar el complemento. Vea los mensajes de la bitácora de validación para más detalles.';
$string['validationresult1'] = '¡Pasó la validación!';
$string['validationresult1_help'] = 'El paquete del complemento ha sido validado y no se detectaron problemas serios.';
$string['validationresultinfo'] = 'Información';
$string['validationresultmsg'] = 'Mensaje';
$string['validationresultstatus'] = 'Status';
