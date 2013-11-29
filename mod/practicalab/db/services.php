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
 * Web service for mod practicalab
 * @package    mod_practicalab
 * @subpackage db
 * @since      Moodle 2.4
 * @copyright  2012 Paul Charsley
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$functions = array(

        'mod_practicalab_get_grades' => array(
                'classname'   => 'mod_practicalab_external',
                'methodname'  => 'get_grades',
                'classpath'   => 'mod/practicalab/externallib.php',
                'description' => 'Returns grades from the practicalabment',
                'type'        => 'read'
        ),

        'mod_practicalab_get_practicalabments' => array(
                'classname'   => 'mod_practicalab_external',
                'methodname'  => 'get_practicalabments',
                'classpath'   => 'mod/practicalab/externallib.php',
                'description' => 'Returns the courses and practicalabments for the users capability',
                'type'        => 'read'
        ),

        'mod_practicalab_get_submissions' => array(
                'classname' => 'mod_practicalab_external',
                'methodname' => 'get_submissions',
                'classpath' => 'mod/practicalab/externallib.php',
                'description' => 'Returns the submissions for practicalabments',
                'type' => 'read'
        )
);
