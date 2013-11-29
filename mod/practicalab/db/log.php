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
 * @package   mod_practicalab
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$logs = array(
    array('module'=>'practicalab', 'action'=>'add', 'mtable'=>'practicalab', 'field'=>'name'),
    array('module'=>'practicalab', 'action'=>'delete mod', 'mtable'=>'practicalab', 'field'=>'name'),
    array('module'=>'practicalab', 'action'=>'download all submissions', 'mtable'=>'practicalab', 'field'=>'name'),
    array('module'=>'practicalab', 'action'=>'grade submission', 'mtable'=>'practicalab', 'field'=>'name'),
    array('module'=>'practicalab', 'action'=>'lock submission', 'mtable'=>'practicalab', 'field'=>'name'),
    array('module'=>'practicalab', 'action'=>'reveal identities', 'mtable'=>'practicalab', 'field'=>'name'),
    array('module'=>'practicalab', 'action'=>'revert submission to draft', 'mtable'=>'practicalab', 'field'=>'name'),
    array('module'=>'practicalab', 'action'=>'submission statement accepted', 'mtable'=>'practicalab', 'field'=>'name'),
    array('module'=>'practicalab', 'action'=>'submit', 'mtable'=>'practicalab', 'field'=>'name'),
    array('module'=>'practicalab', 'action'=>'submit for grading', 'mtable'=>'practicalab', 'field'=>'name'),
    array('module'=>'practicalab', 'action'=>'unlock submission', 'mtable'=>'practicalab', 'field'=>'name'),
    array('module'=>'practicalab', 'action'=>'update', 'mtable'=>'practicalab', 'field'=>'name'),
    array('module'=>'practicalab', 'action'=>'upload', 'mtable'=>'practicalab', 'field'=>'name'),
    array('module'=>'practicalab', 'action'=>'view', 'mtable'=>'practicalab', 'field'=>'name'),
    array('module'=>'practicalab', 'action'=>'view all', 'mtable'=>'course', 'field'=>'fullname'),
    array('module'=>'practicalab', 'action'=>'view confirm submit practicalabment form', 'mtable'=>'practicalab', 'field'=>'name'),
    array('module'=>'practicalab', 'action'=>'view grading form', 'mtable'=>'practicalab', 'field'=>'name'),
    array('module'=>'practicalab', 'action'=>'view submission', 'mtable'=>'practicalab', 'field'=>'name'),
    array('module'=>'practicalab', 'action'=>'view submission grading table', 'mtable'=>'practicalab', 'field'=>'name'),
    array('module'=>'practicalab', 'action'=>'view submit practicalabment form', 'mtable'=>'practicalab', 'field'=>'name'),
    array('module'=>'practicalab', 'action'=>'view feedback', 'mtable'=>'practicalab', 'field'=>'name'),
);
