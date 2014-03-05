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


class apertura_form extends moodleform
{

    function definition()
    {
        
    }
    public function set_title($default_values)
    {
        $mform = $this->_form;        
        $mform->addElement('header', 'semestre', $default_values);
    }
     public function set_object($default_values)
    {
        $mform = $this->_form;        
        $mform->addElement('radio', 'curso', $default_values);
    }
}

?>
