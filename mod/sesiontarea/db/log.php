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
 * @package   mod_sesiontarea
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$logs = array(
    array('module'=>'sesiontarea', 'action'=>'add', 'mtable'=>'sesiontarea', 'field'=>'name'),
    array('module'=>'sesiontarea', 'action'=>'delete mod', 'mtable'=>'sesiontarea', 'field'=>'name'),
    array('module'=>'sesiontarea', 'action'=>'download all submissions', 'mtable'=>'sesiontarea', 'field'=>'name'),
    array('module'=>'sesiontarea', 'action'=>'grade submission', 'mtable'=>'sesiontarea', 'field'=>'name'),
    array('module'=>'sesiontarea', 'action'=>'lock submission', 'mtable'=>'sesiontarea', 'field'=>'name'),
    array('module'=>'sesiontarea', 'action'=>'reveal identities', 'mtable'=>'sesiontarea', 'field'=>'name'),
    array('module'=>'sesiontarea', 'action'=>'revert submission to draft', 'mtable'=>'sesiontarea', 'field'=>'name'),
    array('module'=>'sesiontarea', 'action'=>'submission statement accepted', 'mtable'=>'sesiontarea', 'field'=>'name'),
    array('module'=>'sesiontarea', 'action'=>'submit', 'mtable'=>'sesiontarea', 'field'=>'name'),
    array('module'=>'sesiontarea', 'action'=>'submit for grading', 'mtable'=>'sesiontarea', 'field'=>'name'),
    array('module'=>'sesiontarea', 'action'=>'unlock submission', 'mtable'=>'sesiontarea', 'field'=>'name'),
    array('module'=>'sesiontarea', 'action'=>'update', 'mtable'=>'sesiontarea', 'field'=>'name'),
    array('module'=>'sesiontarea', 'action'=>'upload', 'mtable'=>'sesiontarea', 'field'=>'name'),
    array('module'=>'sesiontarea', 'action'=>'view', 'mtable'=>'sesiontarea', 'field'=>'name'),
    array('module'=>'sesiontarea', 'action'=>'view all', 'mtable'=>'course', 'field'=>'fullname'),
    array('module'=>'sesiontarea', 'action'=>'view confirm submit sesiontareament form', 'mtable'=>'sesiontarea', 'field'=>'name'),
    array('module'=>'sesiontarea', 'action'=>'view grading form', 'mtable'=>'sesiontarea', 'field'=>'name'),
    array('module'=>'sesiontarea', 'action'=>'view submission', 'mtable'=>'sesiontarea', 'field'=>'name'),
    array('module'=>'sesiontarea', 'action'=>'view submission grading table', 'mtable'=>'sesiontarea', 'field'=>'name'),
    array('module'=>'sesiontarea', 'action'=>'view submit sesiontareament form', 'mtable'=>'sesiontarea', 'field'=>'name'),
    array('module'=>'sesiontarea', 'action'=>'view feedback', 'mtable'=>'sesiontarea', 'field'=>'name'),
);
