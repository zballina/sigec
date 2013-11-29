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
 * Web service for mod sesiontarea
 * @package    mod_sesiontarea
 * @subpackage db
 * @since      Moodle 2.4
 * @copyright  2012 Paul Charsley
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$functions = array(

        'mod_sesiontarea_get_grades' => array(
                'classname'   => 'mod_sesiontarea_external',
                'methodname'  => 'get_grades',
                'classpath'   => 'mod/sesiontarea/externallib.php',
                'description' => 'Returns grades from the sesiontareament',
                'type'        => 'read'
        ),

        'mod_sesiontarea_get_sesiontareaments' => array(
                'classname'   => 'mod_sesiontarea_external',
                'methodname'  => 'get_sesiontareaments',
                'classpath'   => 'mod/sesiontarea/externallib.php',
                'description' => 'Returns the courses and sesiontareaments for the users capability',
                'type'        => 'read'
        ),

        'mod_sesiontarea_get_submissions' => array(
                'classname' => 'mod_sesiontarea_external',
                'methodname' => 'get_submissions',
                'classpath' => 'mod/sesiontarea/externallib.php',
                'description' => 'Returns the submissions for sesiontareaments',
                'type' => 'read'
        )
);
