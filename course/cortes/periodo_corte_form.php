<?php

if (!defined('MOODLE_INTERNAL'))
{
    die('Direct access to this script is forbidden.');
    ///  It must be included from a Moodle page
}

require_once ($CFG->libdir . '/formslib.php');
require_once ($CFG->libdir . '/filelib.php');
require_once ($CFG->libdir . '/completionlib.php');
require_once ($CFG->libdir . '/gradelib.php');

/**
 * Default form for editing course section
 *
 * Course format plugins may specify different editing form to use
 */
class periodo_corte_form extends moodleform
{
    protected function definition()
    {
        $mform = $this->_form;

        $mform->addElement('header', 'periodo_corte_header', get_string('periodo_corte', 'format_unidades'));
        $mform->addElement('text', "desertores", get_string('numero_desertores', 'format_unidades'));        
        $mform->setType("desertores", PARAM_INT);

        $mform->disable_form_change_checker();
        $mform->_registerCancelButton('cancel');
        $this->add_action_buttons(true, 'Descargar PDF');
    } 
}

?>