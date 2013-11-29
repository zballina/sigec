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
 * Strings for component 'block', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   block
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtodock'] = 'Mover a la orilla (dock)';
$string['anypagematchingtheabove'] = 'Cualquier página que coincida con lo de arriba';
$string['appearsinsubcontexts'] = 'Aparece en sub-contextos';
$string['assignrolesinblock'] = 'Asignar roles en el bloque {$a}';
$string['blocksettings'] = 'Configuraciones del bloque';
$string['bracketfirst'] = '{$a} (primero)';
$string['bracketlast'] = '{$a} (último)';
$string['configureblock'] = 'Configurar bloque {$a}';
$string['contexts'] = 'Contextos de página';
$string['contexts_help'] = 'Los contextos son tipos de páginas más específicas, donde este bloque puede mostrarse dentro de la ubicación original del bloque. Usted tendrá diferentes opciones aquí, dependiendo de la localización original del bloque y su localización actual de Usted. Por ejemplo, Usted puede restringir un bloque para que solamente aparezca en páginas del foro en un curso al añadir el bloque al curso (haciéndolo aparecer en todas las sub-páginas), y después yendo a un foro y editando las configuraciones del bloque de nuevo, para restringir la visualización a solamente páginas de foro.';
$string['createdat'] = 'Localización original del bloque';
$string['createdat_help'] = 'La localización original donde se creó el bloque. La configuración del bloque pueden ocasionar que este bloque aparezca en otras localizaciones (contextos) dentro de la localización original. Por ejemplo: un bloque creado dentro de una página de un curso podría mostrarse en las actividades dentro de ese curso. Un bloque creado en la portada del sitio puede mostrarse en todo el sitio.';
$string['defaultregion'] = 'Región por defecto';
$string['defaultregion_help'] = 'Los temas pueden definir una o más regiones de bloques nombrados en donde se desplieguen los bloques. Estas configuraciones definen en cuales de estas regiones quiere Usted que aparezca por defecto este bloque. La región puede ser anulada en páginas específicas si se requiere.';
$string['defaultweight'] = 'Peso por defecto';
$string['defaultweight_help'] = 'El peso por defecto le permite elegir aproximadamente donde quiere que se muestre el bloque dentro de la región elegida, sea arriba o abajo. El lugar final se calcula de todos los bloques en esa región (por ejemplo: solamente un bloque puede estar realmente hasta arriba). Este valor puede anularse en páginas específicas si se requiere.';
$string['deleteblock'] = 'Eliminar bloque {$a}';
$string['deleteblockcheck'] = '¿Está seguro de querer eliminar este bloque llamado {$a}?';
$string['deleteblockwarning'] = '<p>Usted está a punto de eliminar un bloque que aparece en otro lado.</p><p>Localización original del bloque: {$a->location}<br />Mostrar en tipos de páginas: {$a->pagetype}</p><p>¿Está seguro de querer continuar?</p>';
$string['deletecheck'] = '¿Eliminar bloque {$a} ?';
$string['dockblock'] = 'Orillar bloque {$a}';
$string['hideblock'] = 'Ocultar bloque {$a}';
$string['hidedockpanel'] = 'Ocultar Panel Dock';
$string['hidepanel'] = 'Ocultar panel';
$string['moveblock'] = 'Mover bloque {$a}';
$string['moveblockafter'] = 'Mover bloque después del bloque {$a}';
$string['moveblockbefore'] = 'Mover bloque antes del bloque {$a}';
$string['movingthisblockcancel'] = 'Moviendo este bloque ({$a})';
$string['onthispage'] = 'En esta página';
$string['pagetypes'] = 'Tipos de página';
$string['pagetypewarning'] = 'La página previamente especificada ya no es elegible. Por favor elija el tipo de página más apropiado debajo.';
$string['region'] = 'Región';
$string['restrictpagetypes'] = 'Mostrar en tipos de página';
$string['showblock'] = 'Mostrar bloque {$a}';
$string['showoncontextandsubs'] = 'Mostrar en \'{$a}\' y las páginas en su interior';
$string['showoncontextonly'] = 'Mostrar en \'{$a}\' solamente';
$string['showonentiresite'] = 'Mostrar a todo lo ancho del sitio';
$string['showonfrontpageandsubs'] = 'Mostrar en la portada y en cualquier página agregada a ésta';
$string['showonfrontpageonly'] = 'Mostrar sólo en la portada';
$string['subpages'] = 'Páginas seleccionadas';
$string['thisspecificpage'] = 'Esta página específica';
$string['undockall'] = 'Des-orillar todo';
$string['undockblock'] = 'Desacoplar bloque {$a}';
$string['undockitem'] = 'Des-orillar este item';
$string['visible'] = 'Visible';
$string['weight'] = 'Peso';
$string['wherethisblockappears'] = 'Donde aparece el bloque';
