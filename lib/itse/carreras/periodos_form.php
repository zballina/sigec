<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of periodos_form
 *
 * @author francisco
 */
if (!defined('MOODLE_INTERNAL'))
{
    die('Direct access to this script is forbidden.');
    ///  It must be included from a Moodle page
}

require_once ($CFG->libdir . '/formslib.php');
require_once ($CFG->libdir . '/completionlib.php');

class periodos_form extends moodleform
{
    protected function definition()
    {
        global $PAGE, $OUTPUT, $DB;
        $mform = $this->_form;

        $mform->addElement('header', 'generalhdr', get_string('agregarperiodo', 'format_unidades'));
        $mform->addElement('hidden', 'nu_carrera');
        $mform->setType('nu_carrera', PARAM_INT);
        $mform->addElement('hidden', 'ano');
        $mform->setType('ano', PARAM_INT);
        $periodos = array('Febrero - Julio' => 'Febrero - Julio', 'Agosto - Enero' => 'Agosto - Enero');
        $mform->addElement('select', 'periodo', get_string('nombreperiodo', 'format_unidades'), $periodos);
        $mform->setType('periodo', PARAM_TEXT);

        $mform->addElement('date_selector', 'fe_inicio', get_string('fe_inicio', 'format_unidades'));
        $mform->setType('fe_inicio', PARAM_INT);
        $mform->addElement('date_selector', 'fe_final', get_string('fe_final', 'format_unidades'));
        $mform->setType('fe_final', PARAM_INT);

        $mform->disable_form_change_checker();
        $this->add_action_buttons(false);
    }

    public function set_data($default_values)
    {
        if (!is_object($default_values))
        {
            $default_values = (object) $default_values;
        }

        $default_values->nu_carrera = $this->_customdata['category']->id;

        parent::set_data($default_values);
    }

    public
        function get_data()
    {
        $periodo = new stdClass();
        $data = parent::get_data();
        if ($data == null)
            return null;
        $periodo->nu_carrera = $data->nu_carrera;
        $periodo->periodo = $data->periodo;
        $periodo->ano = date('Y', $data->fe_final);
        $periodo->fe_inicio = $data->fe_inicio;
        $periodo->fe_final = $data->fe_final;

        return $periodo;
    }

}

?>
