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
 * The main sesionclase configuration form
 *
 * It uses the standard core Moodle formslib. For more info about them, please
 * visit: http://docs.moodle.org/en/Development:lib/formslib.php
 *
 * @package    mod
 * @subpackage sesionclase
 * @copyright  2011 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

require_once ($CFG->dirroot . '/course/moodleform_mod.php');
require_once($CFG->libdir . '/itse/lib.php');

/**
 * Module instance settings form
 */
class mod_sesionclase_mod_form extends mod_sesionpadre_mod_form
{
    /**
     * Defines forms elements
     */
    public function definition()
    {
        parent::definition();
        $this->_form->addElement('header', 'general_intro', get_string('general_intro', 'sesionclase'));
        $this->add_intro_editor(false, get_string('description', 'sesionclase'));

        $this->standard_coursemodule_elements();
        //-------------------------------------------------------------------------------
        // add standard buttons, common to all modules
        $this->add_action_buttons();
    }
}
