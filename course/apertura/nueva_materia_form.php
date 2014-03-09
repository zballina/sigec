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

class nueva_materia_form extends moodleform
{
   function definition()
    {
        $mform = $this->_form;
        $mform->addElement('header', 'Nueva_Materia', 'Registro de Nuevas Materias');        
        $mform->addElement('text', "clave", 'Clave de la Materia');  
        $mform->setType("clave", PARAM_TEXT);
        $mform->addElement('text', "fullname", 'Nombre Completo');    
        $mform->setType("fullname", PARAM_TEXT);
        $mform->addElement('text', "horas_teoricas", 'Horas teoricas'); 
        $mform->setType("horas_teoricas", PARAM_INT);
        $mform->addElement('text', "horas_practicas", 'Horas Practicas'); 
        $mform->setType("horas_practicas", PARAM_INT);
        $mform->addElement('text', "creditos", 'Creditos');
        $mform->setType("creditos", PARAM_INT);        
        $mform->addElement('text', "semestre", 'Semestre');
        $mform->setType("semestre", PARAM_INT);
        
        $mform->disable_form_change_checker();
        $mform->_registerCancelButton('cancel');
        $this->add_action_buttons(true, 'Guardar');
    }    
}
?>
