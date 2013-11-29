<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of apertura_form
 *
 * @author francisco
 */

if (!defined('MOODLE_INTERNAL'))
{
    die('Direct access to this script is forbidden.');
    ///  It must be included from a Moodle page
}

require_once ($CFG->libdir . '/formslib.php');
require_once ($CFG->libdir . '/filelib.php');

class apertura_form extends moodleform
{
    private $nu_carrera;
    function definition()
    {
        $this->add_action_buttons();
    }
    
    public function definition_after_data()
    {
        parent::definition_after_data();
        $mform = $this->_form;
        $carrera = context_coursecat::instance($this->nu_carrera);
        $nombre_carrera = $carrera->get_context_name(false);
        $mform->addElement('header', 'header_apertura', $nombre_carrera);
        if($this->nu_carrera != null)
        {
            $cursos = get_courses($this->nu_carrera);
            foreach ($cursos as $curso)
            {
                $grupo = array();
//                $grupo[] =& $mform->createElement('static', 'nombre_curso', '', $curso->fullname);
                $grupo[] =& $mform->createElement('radio', "activo$curso->id", '', get_string('habilitar_curso', 'format_unidades'), 1, $attributes);
                $grupo[] =& $mform->createElement('radio', "activo$curso->id", '', get_string('deshabilitar_curso', 'format_unidades'), 0, $attributes);
                $mform->addGroup($grupo, "grupo_curso$curso->id", $curso->fullname, ' ', false);
            }
        }
        $this->add_action_buttons();
    }
    
    public function set_data($default_values)
    {
        $this->nu_carrera = $default_values[0];
        parent::set_data($default_values);
    }
}

?>
