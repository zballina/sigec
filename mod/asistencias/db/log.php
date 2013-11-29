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
 * Definition of log events
 *
 * @package   mod_asistencias
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$logs = array(
    array('module'=>'asistencias', 'action'=>'add', 'mtable'=>'asistencias', 'field'=>'name'),
    array('module'=>'asistencias', 'action'=>'delete mod', 'mtable'=>'asistencias', 'field'=>'name'),
    array('module'=>'asistencias', 'action'=>'download all submissions', 'mtable'=>'asistencias', 'field'=>'name'),
    array('module'=>'asistencias', 'action'=>'grade submission', 'mtable'=>'asistencias', 'field'=>'name'),
    array('module'=>'asistencias', 'action'=>'lock submission', 'mtable'=>'asistencias', 'field'=>'name'),
    array('module'=>'asistencias', 'action'=>'reveal identities', 'mtable'=>'asistencias', 'field'=>'name'),
    array('module'=>'asistencias', 'action'=>'revert submission to draft', 'mtable'=>'asistencias', 'field'=>'name'),
    array('module'=>'asistencias', 'action'=>'submission statement accepted', 'mtable'=>'asistencias', 'field'=>'name'),
    array('module'=>'asistencias', 'action'=>'submit', 'mtable'=>'asistencias', 'field'=>'name'),
    array('module'=>'asistencias', 'action'=>'submit for grading', 'mtable'=>'asistencias', 'field'=>'name'),
    array('module'=>'asistencias', 'action'=>'unlock submission', 'mtable'=>'asistencias', 'field'=>'name'),
    array('module'=>'asistencias', 'action'=>'update', 'mtable'=>'asistencias', 'field'=>'name'),
    array('module'=>'asistencias', 'action'=>'upload', 'mtable'=>'asistencias', 'field'=>'name'),
    array('module'=>'asistencias', 'action'=>'view', 'mtable'=>'asistencias', 'field'=>'name'),
    array('module'=>'asistencias', 'action'=>'view all', 'mtable'=>'course', 'field'=>'fullname'),
    array('module'=>'asistencias', 'action'=>'view confirm submit asistenciasment form', 'mtable'=>'asistencias', 'field'=>'name'),
    array('module'=>'asistencias', 'action'=>'view grading form', 'mtable'=>'asistencias', 'field'=>'name'),
    array('module'=>'asistencias', 'action'=>'view submission', 'mtable'=>'asistencias', 'field'=>'name'),
    array('module'=>'asistencias', 'action'=>'view submission grading table', 'mtable'=>'asistencias', 'field'=>'name'),
    array('module'=>'asistencias', 'action'=>'view submit asistenciasment form', 'mtable'=>'asistencias', 'field'=>'name'),
    array('module'=>'asistencias', 'action'=>'view feedback', 'mtable'=>'asistencias', 'field'=>'name'),
);
