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
 * Strings for component 'local_amos', language 'es_mx', branch 'MOODLE_24_STABLE'
 *
 * @package   local_amos
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['about'] = '<p>AMOS significa Manipulación Automatizada de Cadenas (Automated Manipulation Of Strings). AMOS es un repositorio central de las cadenas de Moodle y de su historia. Lleva un registro de la incorporación de cadenas en inglés al código Moodle, agrupa las traducciones, gestiona tareas comunes de traducción y genera paquetes de idioma para ser desplegados en servidores Moodle.</p> <p>Véase <a href="http://docs.moodle.org/en/AMOS">documentación AMOS</a> para más información.</p>';
$string['amos'] = 'AMOS (Herramienta de traducción de Moodle)';
$string['amos:commit'] = 'Implantar las cadenas preparadas al repositorio principal';
$string['amos:execute'] = 'Ejecutar el AMOScript dado';
$string['amos:importfile'] = 'Importar cadenas del archivo subido y ponerlas en el \'stage\'';
$string['amos:importstrings'] = 'Importar cadenas (incluyendo las de Inglés) directamente al repositorio principal';
$string['amos:manage'] = 'Gestionar portal AMOS';
$string['amos:stage'] = 'Usar la herramienta de traducción AMOS y preparar las cadenas';
$string['amos:stash'] = 'Guardar la cadena preparada en espera actual en el almacén persistente';
$string['amos:usegoogle'] = 'Usar los servicios de traducción de Google';
$string['commitbutton'] = 'Implantar y sacar de preparadas';
$string['commitbutton2'] = 'Implantar y permanecer preparadas';
$string['commitmessage'] = 'Mensaje de implantación';
$string['commitstage'] = 'Implantar cadenas preparadas';
$string['commitstage_help'] = 'Guardar permanentemente todas las traducciones preparadas en el repositoro AMOS. El stage se poda automáticamente y se rebasa antes de acometer. Solamente las cadenas que puedan implantarse serán guardadas. Esto significa que solamente las traducciones que estén resaltadas debajo en verde serán guardadas. La stage se limpia después de la implantación.';
$string['committableall'] = 'todos los idiomas';
$string['committablenone'] = 'no se admiten idiomas: por favor, contacte con el coordinador de AMOS';
$string['componentsall'] = 'Todos';
$string['componentsenlarge'] = 'Agrandar';
$string['componentsnone'] = 'Ninguno';
$string['componentsstandard'] = 'Estándar';
$string['confirmaction'] = 'Esta operación no se puede deshacer. ¿Está seguro?';
$string['contribaccept'] = 'Aceptar';
$string['contribactions'] = 'Acciones de traducción contribuídas';
$string['contribactions_help'] = 'Dependiendo de sus derechos y el flujo de trabajo de la contribución, Usted puede tener algunas de las siguientes acciones disponible:

*Aplicar - copiar la traducción contribuída a su stage, no modifica el registro de contribución
* Asignarmela a mí - se pone Usted como el asignatario de la contribución, quien es la persona responsable de la revisión e integración de la contribución
* Renunciar - poner a nadie como asignatario de la contribución
* Empezar revisión - asignar la nueva contribución a Usted mismo, poner el status \'en revisión\' y copiar la traducción sometida a su stage
* Aceptar - marcar la contribución como aceptada
* Rechazar - marcar la contribución como rechazada, por favor describa las razones en un comentario.

El contribuyente es informado por Email cuando cambia el status de su contribución.';
$string['contribapply'] = 'Aplicar';
$string['contribassignee'] = 'Asignatario';
$string['contribassigneenone'] = '-';
$string['contribassigntome'] = 'Asignarme a mi mismo';
$string['contribauthor'] = 'Autor';
$string['contribclosedno'] = 'Ocultar contribuciones resueltas';
$string['contribclosedyes'] = 'Mostrar contribuciones resueltas';
$string['contribcomponents'] = 'Componentes';
$string['contribid'] = 'ID';
$string['contribincomingnone'] = 'No hay contribuciones recibidas';
$string['contribincomingsome'] = 'Contribuciones recibidas ({$a})';
$string['contriblanguage'] = 'Idioma';
$string['contribreject'] = 'Rechazar';
$string['contribresign'] = 'Renunciar';
$string['contribstaged'] = 'Contribuciones preparadas <a href="contrib.php?id={$a->id}">#{$a->id}</a> por {$a->author}';
$string['contribstagedinfo'] = 'Contribución preparada';
$string['contribstagedinfo_help'] = 'El \'stage\' contiene las cadenas preparada que fueron contribuídas por un miembro de la comunidad, Los responsables (mantenedores) del paquete de idioma son los encargados de revisarlas y poner su status en Aceptadas (si fueron implantadas) o Rechazadas (si no se pudieron incluir en el paquete de idioma oficial por alguna razón).';
$string['contribstartreview'] = 'Iniciar revisión';
$string['contribstatus'] = 'Status';
$string['contribstatus0'] = 'Nuevo';
$string['contribstatus10'] = 'En revisión';
$string['contribstatus20'] = 'Rechazado';
$string['contribstatus30'] = 'Aceptado';
$string['contribstatus_help'] = 'El flujo de trabajo de una traducción contribuída consiste de las siguientes etapas:

* Nueva - la contribución ha sido enviada pero aún no ha sido revisada
* En revisión - la contribución ha sido asignada a un responsable (mantenedor) del paquete de idioma y ha sido preparada para revisión
* Rechazada - el responsable (mantenedor) del paquete de idioma ha rechazado su contribución y probablemente dejó una explicación en un comentario
* Aceptada - la contribución ha sido aceptada por el responsable (mantenedor) del paquete de idioma';
$string['contribstrings'] = 'Cadenas';
$string['contribstringseq'] = '{$a->orig} nuevas';
$string['contribstringsnone'] = '{$a->orig} (todas están ya traducidas en el paquete de idioma)';
$string['contribstringssome'] = '{$a->orig} ({$a->same} de ellas ya tienen una traducción más reciente)';
$string['contribsubject'] = 'Asunto';
$string['contribsubmittednone'] = 'No se han enviado contribuciones';
$string['contribsubmittedsome'] = 'Sus contribuciones ({$a})';
$string['contribtimemodified'] = 'Modificada';
$string['contributions'] = 'Contribuciones';
$string['diff'] = 'Comparar';
$string['diffaction'] = 'Si se detectara una diferencia';
$string['diffaction1'] = 'Ponga en preparación ambas traducciones en sus ramas';
$string['diffaction2'] = 'Prepare la traducción más reciente en ambas ramas';
$string['diffmode'] = 'Prepare las cadenas si';
$string['diffmode1'] = 'Las cadenas en inglés han cambiado, pero las traducidas no';
$string['diffmode2'] = 'Las cadenas en inglés no han cambiado, pero las traducidas si';
$string['diffmode3'] = 'O las cadenas en inglés han cambiado, o las traducidas (pero no ambas)';
$string['diffmode4'] = 'Tanto las cadenas en inglés como las traducidas han cambiado';
$string['diffprogress'] = 'Comparando ramas seleccionadas';
$string['diffprogressdone'] = 'Se encontraron en total {$a} diferencias';
$string['diffstaged'] = 'dif';
$string['diffstrings'] = 'Comparar cadenas en dos ramas';
$string['diffstrings_help'] = 'Esto comparará todas las cadenas en las dos ramas seleccionadas. Si hubiera diferencia en cadenas entre las ramas, ambas versiones serán preparadas. Usted podrá entonces emplear la función de "Editar cadenas preparadas" para revisar y arreglar los cambios necesarios';
$string['diffversions'] = 'Versiones';
$string['emailacceptbody'] = 'El responsable del paquete de idioma {$a->assignee} ha aceptado su contribución a la traducción #{$a->id} {$a->subject}.

Ver detalles en {$a->url}.';
$string['emailacceptsubject'] = '[Contribución AMOS] Aceptada';
$string['emailcontributionbody'] = 'El usuario {$a->author} ha enviado una nueva traducción #{$a->id} {$a->subject}.

Ver detalles en {$a->url}.';
$string['emailcontributionsubject'] = '[Contribución AMOS] Nueva traducción enviada';
$string['emailrejectbody'] = 'El responsable del paquete de idioma {$a->assignee} ha rechazado su contribución a la traducción #{$a->id} {$a->subject}.

Ver detalles en {$a->url}.';
$string['emailrejectsubject'] = '[Contribución AMOS] Rechazada';
$string['emailreviewbody'] = 'El responsable del paquete de idioma {$a->assignee} ha comenzado a revisar su contribución a la traducción #{$a->id} {$a->subject}.

Ver detalles en {$a->url}.';
$string['emailreviewsubject'] = '[Contribución AMOS] Revisión iniciada';
$string['err_exception'] = 'Error: {$a}';
$string['err_invalidlangcode'] = 'Código de idioma no válido';
$string['err_parser'] = 'Error de análisis: {$a}';
$string['filtercmp'] = 'Componentes';
$string['filtercmp_desc'] = 'Mostrar cadenas de estos componentes';
$string['filterlng'] = 'Idiomas';
$string['filterlng_desc'] = 'Mostrar traducciones en estos idiomas';
$string['filtermis'] = 'Misceláneos';
$string['filtermis_desc'] = 'Condiciones adicionales en las cadenas a mostrar.';
$string['filtermisfglo'] = 'solo cadenas en lista gris';
$string['filtermisfhlp'] = 'solo cadenas de ayuda';
$string['filtermisfmis'] = 'solo cadenas faltantes u obsoletas';
$string['filtermisfstg'] = 'cadenas preparadas solamente';
$string['filtermisfwog'] = 'sin cadenas en lista gris';
$string['filtersid'] = 'Identificador de cadena';
$string['filtersid_desc'] = 'La clave en la matriz de cadenas';
$string['filtersidpartial'] = 'coincidencia parcial';
$string['filtertxt'] = 'Sub-cadena';
$string['filtertxtcasesensitive'] = 'sensible a minúscula/MAYÚSCULA';
$string['filtertxt_desc'] = 'La cadena debe contener el texto dado';
$string['filtertxtregex'] = 'regex';
$string['filterver'] = 'Versiones';
$string['filterver_desc'] = 'Mostrar cadenas de estas versiones de Moodle';
$string['found'] = 'Encontradas: {$a->found} &nbsp;&nbsp;&nbsp; Faltantes: {$a->missing} ({$a->missingonpage})';
$string['foundinfo'] = 'Número de cadenas encontradas';
$string['foundinfo_help'] = 'Muestra el número total de filas en la tabla de traducción, el número de traducciones que faltan y el número de traducciones que faltan en la página actual.';
$string['gotofirst'] = 'ir a la primera página';
$string['gotoprevious'] = 'ir a la página anterior';
$string['greylisted'] = 'Cadenas en lista gris';
$string['greylisted_help'] = 'Por razones de antiguedad, un paquete de idioma de Moodle puede contener cadenas que ya no se emplean más pero que no han sido eliminadas. Estas cadenas están en la "lista gris". Una vez que haya sido confirmado que una cadena en lista gris ya no se usa más, será removida del paquete de idioma.

Si Usted observa una cadena de lista gris que aún se utiliza en Moodle, por favor informe al repecto en una comunicación del foro en el curso de Traduciendo Moodle en este sitio. De otra manera, Usted puede ahorrar tiempo valioso al traducir cadenas que sea más probable que se usen en Moodle e ignorar las cadenas en lista gris.';
$string['greylistedwarning'] = 'la cadena está en lista gris';
$string['importfile'] = 'Importar cadenas traducidas desde un archivo';
$string['importfile_help'] = 'Si Usted tiene sus cadenas traducidas fuera de linea, Usted puede meterlas al sistema mediante este formato.

* El archivo debe ser un archivo de definición de cadenas PHP válido. Busque en el directorio `/lang/en/` de su instalación de Moodle los ejemplos.
* El nombre del archivo debe coincidir con el que tiene las definiciones en el idioma inglés para el componente dado (por ejemplo `moodle.php`, `assignment.php` o `enrol_manual.php`).

Todas las cadenas encontradas en el archivo serán puestas en espera para la versión e idioma seleccionados.

Se pueden procesar múltiples archivos PHP a la vez si los pone dentro de un archivo ZIP.';
$string['language'] = 'Idioma';
$string['languages'] = 'Idiomas';
$string['languagesall'] = 'Todos';
$string['languagesnone'] = 'Ninguno';
$string['log'] = 'Bitácora';
$string['logfilterbranch'] = 'Versiones';
$string['logfiltercommithash'] = 'hash GIT';
$string['logfiltercommitmsg'] = 'Mensaje de implantación contiene';
$string['logfiltercommits'] = 'Filtro de implantación';
$string['logfiltercommittedafter'] = 'Implantada después de';
$string['logfiltercommittedbefore'] = 'Implantadas antes de';
$string['logfiltercomponent'] = 'Componentes';
$string['logfilterlang'] = 'Idiomas';
$string['logfiltershow'] = 'Mostrar implantadas y cadenas filtradas';
$string['logfiltersource'] = 'Orígen';
$string['logfiltersourceamos'] = 'amos (traductor basado en web)';
$string['logfiltersourcebot'] = 'bot (operaciones en lote ejecutadas por un script)';
$string['logfiltersourcecommitscript'] = 'commitscript (AMOSscript en el mensaje de implantación)';
$string['logfiltersourcefixdrift'] = 'fixedrift (AMOS-git drift fijo)';
$string['logfiltersourcegit'] = 'git (espejo git del código fuente de Moodle y paquetes  1.x)';
$string['logfiltersourceimport'] = 'Importar (cadenas importadas para un plugin contribuído)';
$string['logfiltersourcerevclean'] = 'revclean (proceso de limpieza reverso)';
$string['logfilterstringid'] = 'Identificador de la cadena';
$string['logfilterstrings'] = 'Filtro de la cadena';
$string['logfilterusergrp'] = 'Persona que implanta';
$string['logfilterusergrpor'] = 'o';
$string['maintainers'] = 'Mantenedores';
$string['markuptodate'] = 'Marcar la traducción como actualizada';
$string['markuptodate_help'] = 'AMOS ha detectado que la cadena puede estar obsoleta, puesto que la versión inglesa fue modificada después de haber sido traducida. Por favor, revise la traducción. Si está actualizada, marque la casilla de cotejo. En caso contrario, edítela.';
$string['merge'] = 'Juntar';
$string['mergestrings'] = 'Juntar cadenas desde otra rama';
$string['mergestrings_help'] = 'Esto eligirá y preparará todas las cadenas de la rama orígen que no hayan sido traducidas aún en la rama destino y que se emplean allí. Usted puede usar esta herramienta para copiara una cadena traducida hacia todas las otras versiones del paquete. Solamente los responsables (mantenedores) del paquete de idioma pueden usar esta herramienta.';
$string['newlanguage'] = 'Nuevo idioma';
$string['nodiffs'] = 'No se encontraron diferencias';
$string['nofiletoimport'] = 'Por favor proporcione un archivo desde donde se importará.';
$string['nologsfound'] = 'No se han encontrado cadenas, por favor modifique los filtros';
$string['nostringsfound'] = 'No se encontraron cadenas';
$string['nostringsfoundonpage'] = 'No se encontraron cadenas en la página {$a}';
$string['nostringtoimport'] = 'No se encontró cadena válida en el archivo. Asegúrese de que el archivo tiene un nombre y está formateado correctamente';
$string['nothingtomerge'] = 'La rama orígen no contiene ninguna cadena nueva que estuviese ausente en la rama destino. Nada para juntar.';
$string['nothingtostage'] = 'La operación  no regreso ninguna cadena que pudiese ser preparada.';
$string['novalidzip'] = 'No puede extraerse el archivo ZIP';
$string['numofcommitsabovelimit'] = 'Se encontraron {$a->found} implantadas que coincidieron con el filtro de impantar, se usan las  {$a->limit} más recientes';
$string['numofcommitsunderlimit'] = 'Se encontraron {$a->found} implantadas que coincidieron con el filtro de implantar';
$string['numofmatchingstrings'] = 'Con esta, {$a->strings} modificaciones en  {$a->commits} implantadas coinciden con el filtro de cadena';
$string['outdatednotcommitted'] = 'Cadena obsoleta';
$string['outdatednotcommitted_help'] = 'AMOS ha detectado que la cadena puede estar obsoleta, puesto que la versión inglesa fue modificada después de haber sido traducida. Por favor, revise la traducción.';
$string['outdatednotcommittedwarning'] = 'obsoleta';
$string['ownstashactions'] = 'Acciones del almacén';
$string['ownstashactions_help'] = '* Aplicar - copiar las cadenas traducidas desde el almacén hacia el stage y mantener el almacén sin modificar. si la cadena ya estuviera en el stage, se sobre-escribe con la del almacén.
* Pop - mover la cadena traducida desde el almacén hacia el stage y limpiar el almacén (esto es aplicar y dejar caer).
* Dejar caer -tirar las cadenas del almacén.
* Someter - abre un formato para someter el almacén a los responsables (mantenedores) oficiales del idioma para que puedan incluir su contribución en el paquete de idioma oficial.';
$string['ownstashes'] = 'Sus almacenes';
$string['ownstashes_help'] = 'Esta es una lista de todos sus almacenes';
$string['ownstashesnone'] = 'No se encontraron almacenes';
$string['permalink'] = 'permaenlace';
$string['placeholder'] = 'Remplazables (placeholders)';
$string['placeholder_help'] = 'Los remplazables (placeholders) son frases especiales como `{$a}` o `{$a->algo}` dentro de la cadena. Estos son remplazados con un valor cuando la cadena de hecho se imprima .

Es importante copiarlos exactamente como aparecen en la cadena original. No los traduzca ni cambie la orientación de-izquierda-a-derecha.';
$string['placeholderwarning'] = 'la cadena contiene un remplazable (placeholder)';
$string['pluginclasscore'] = 'Subsistemas del núcleo';
$string['pluginclassnonstandard'] = 'Plugins no estándar';
$string['pluginclassstandard'] = 'Plugins estándar';
$string['pluginname'] = 'AMOS';
$string['presetcommitmessage'] = 'Traducción contribuída #{$a->id} por {$a->author}';
$string['presetcommitmessage2'] = 'Se juntaron cadenas faltantes desde {$a->source} hacia {$a->target} branch';
$string['presetcommitmessage3'] = 'Arreglando diferencias entre {$a->versiona} y {$a->versionb}';
$string['privileges'] = 'Sus privilegios';
$string['privilegesnone'] = 'Usted solamente tiene acceso de solo-lectura a información pública.';
$string['propagate'] = 'Propagar traducciones';
$string['propagatednone'] = 'No se propagaron traducciones';
$string['propagatedsome'] = '{$a} traducciones preparadas propagadas';
$string['propagate_help'] = 'Las traducciones preparadas se pueden propagar a ramas seleccionadas. AMOS iteracctua sobre la lista de traducciones preparadas y trata de aplicarlas a cada rama seleccionada.
La propagación no es posible si:

* los originales en inglés de la cadena son diferentes en las ramas orígen y destino,
* la cadena está preparada varias veces con diferentes traducciones';
$string['propagaterun'] = 'Propagar';
$string['requestactions'] = 'Acción';
$string['requestactions_help'] = '* Aplicar - copia las cadenas traducidas desde la solicitud de jalarlas hacia su stage para prepararlas. Si la cadena ya estaba preparada en el stage, se sobre-escribe con la que estaba en el almacén.
* Ocultar - bloquea la solicitud de jalar de forma que no se le muestra más a Usted.';
$string['savefilter'] = 'Guardar configuraciones de filtro';
$string['script'] = 'AMOScript';
$string['scriptexecute'] = 'Ejecutar y preparar resultado';
$string['script_help'] = 'AMOScript es un conjunto de instrucciones a ejecutar sobre el repositorio de cadenas.';
$string['sourceversion'] = 'Versión orígen';
$string['stage'] = 'Preparadas';
$string['stageactions'] = 'Acciones sobre preparadas';
$string['stageactions_help'] = '* Editar cadenas preparadas - modifica las configuraciones del filtro del traductor de forma que solamente se muestran traducciones preparadas.
* Podar no-implantables- des-prepara todas las traducciones que no se le permiten implantar a Usted. El \'stage\' se poda automáticamente antes de acometer.
* Rebasar - des-preparar todas las traducciones que o no modifican la traducción actual o que sean más antiguas que la traducción más reciente en el repositorio. El \'stage\' es rebasado automáticamente antes de implantar.
* Des-preparar todas - limpia el \'stage\', todas las traducciones preparadas se pierden.';
$string['stageedit'] = 'Editar cadenas preparadas';
$string['stagelang'] = 'Idioma';
$string['stageoriginal'] = 'Original';
$string['stageprune'] = 'Podar las no-implantables';
$string['stagerebase'] = 'Rebasar';
$string['stagestring'] = 'Cadena';
$string['stagestringsnocommit'] = 'Hay {$a->staged} cadenas preparadas';
$string['stagestringsnone'] = 'No hay cadenas preparadas';
$string['stagestringssome'] = 'Hay {$a->staged} cadenas preparadas, {$a->committable} de ellas pueden implantarse';
$string['stagesubmit'] = 'Someter a responsables (mantenedores)';
$string['stagetranslation'] = 'Traducción';
$string['stagetranslation_help'] = 'Muestra la traducción preparada para ser implantada. El color del fondo de las celdas significa:

* Verde - Usted ha añadido una traducción faltante y se le permite implantarla.
* Amarillo . Usted ha modificado una cadena y se le permite implantarel cambio.
* Azul - Usted ha modificado la traducción o añadido una traducción faltante, pero no se le permite implantarla dentro del idioma dado.
* Sin color - la traducción preparada es la misma que la actual y por lo tanto no será implantada.';
$string['stageunstageall'] = 'Des-preparar todas';
$string['stashactions'] = 'Acciones del almacén';
$string['stashactions_help'] = 'El almacen (\'stash\') es una instantánea del \'stage\' actual. Los almacenes se pueden enviar a los responsables (mantenedores) oficiales del paquete de idioma para incluirse en el paquete de idioma.';
$string['stashapply'] = 'Aplicar';
$string['stashautosave'] = 'Almacén de respaldo guardado automáticamente';
$string['stashautosave_help'] = 'El almacén (\'stash\') contiene la instantánea más reciente de su \'stage\'. Usted puede usarla como un respaldo para casos en donde todas las cadenas sean des-preparadas por accidente, por ejemplo. Use la acción de \'Aplicar\' para copiar todas las cadenas almacenadas en el almacén de regreso a la zona de preparación del \'stage\' (sobre-escribirá la cadena si ya estuviera preparada).';
$string['stashcomponents'] = '<span>Componentes:</span> {$a}';
$string['stashdrop'] = 'Dejar caer';
$string['stashes'] = 'Almacenes';
$string['stashlanguages'] = '<span>Idiomas:</span> {$a}';
$string['stashpop'] = 'pop';
$string['stashpush'] = 'Empujar todas las cadenas preparadas hacia un nuevo almacén';
$string['stashstrings'] = '<span>Número de cadenas:</span> {$a}';
$string['stashsubmit'] = 'Someter a responsables (mantenedores)';
$string['stashsubmitdetails'] = 'Detalles de lo que somete';
$string['stashsubmitmessage'] = 'Mensaje';
$string['stashsubmitsubject'] = 'Asunto';
$string['stashtitle'] = 'Título del almacén';
$string['stashtitledefault'] = 'WIP - {$a->time}';
$string['stringhistory'] = 'Historia';
$string['strings'] = 'Cadenas';
$string['submitting'] = 'Enviando una contribución';
$string['submitting_help'] = 'Esto mandará las cadenas traducidas a los responsables (mantenedores) oficiales del idioma. Ellos podrán aplicar su trabajo hacia la zona de preparación, revisarlo y eventualmente implantarlo. Por favor escriba un mensaje para ellos que describa su trabajo y porqué a Usted le gustaría ver que su contribución sea incluída.';
$string['targetversion'] = 'Versión destino';
$string['translatorlang'] = 'Idioma';
$string['translatorlang_help'] = 'Muestra el código del idioma al que traducirá la cadena. Elija el enlace <strong>+-</strong> para mostrar la historia en línea de tiempo de la cadena..';
$string['translatororiginal'] = 'Original';
$string['translatororiginal_help'] = 'Mustra el inglés original de la cadena. Debajo, Usted puede ver un enlace para traducuirlo automáticamente mediante Google (si el idioma es soportado y su navegador tiene Javascript habilitado). También, Usted puede encontrar información adicional anexa, como por ejemplo, si la cadena tuviera un remplazable (placeholder).';
$string['translatorstring'] = 'Cadena';
$string['translatorstring_help'] = 'Muestra la versión de Moodle, el identificador de la cadena de texto y el componente al que pertenece esta cadena.';
$string['translatortool'] = 'Traductor';
$string['translatortranslation'] = 'Traducción';
$string['translatortranslation_help'] = 'Elija la celda para convertirla en el editor de entrada. Inserte la traducción y haga click fuera de la celda para preparar la traducción en el \'stage\'. El color del fondo de las celdas significa:


* Verde - la cadena ya ha sido traducida, Usted puede eventualmente modificar la traducción
* Amarillo . la cadena puede estar des-actualizada. El original en inglés fue probablemente modificado después de que la cadena fuera traducida..
* Rojo la cadena aún no ha sido traducida.
* Azul - Usted ha modificado la traducción y ahora está preparada en el \'stage\'.
* Gris - No puede emplearse AMOS para traducir esta cadena. Por ejemplo: las cadenas para Moodle 1.9 deben ser editadas mediante el antiguo acceso CVS exclusivamente.

Los responsables (mantenedores) del idioma pueden ver un pequeño símbolo rojo en la esquina de las celdas que se les permite implantar.';
$string['typecontrib'] = 'Plugins no-estándard';
$string['typecore'] = 'Subsistemas del núcleo';
$string['typestandard'] = 'Plugins estándar';
$string['unstage'] = 'Des-preparar';
$string['unstageconfirm'] = '¿Realmente?';
$string['unstaging'] = 'Des-preparando';
$string['version'] = 'Versión';
