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

class periodos_cortes_form extends moodleform
{
    private $cortes = 5;
    private $semanas = 16;
    protected function definition()
    {
        $mform = $this->_form;
       
        $mform->addElement('header', 'generalhdr', get_string('asignarfechascortes', 'format_unidades'));
        for($i = 1; $i <= $this->cortes; $i++)
        {
            $mform->addElement('hidden', "id_$i");
            $mform->setType("id_$i", PARAM_INT);
            $mform->addElement('hidden', "nu_carrera_$i");
            $mform->setType("nu_carrera_$i", PARAM_INT);
            $mform->addElement('hidden', "nu_periodo_$i");
            $mform->setType("nu_periodo_$i", PARAM_INT);
            $mform->addElement('hidden', "nu_corte_$i");
            $mform->setType("nu_corte_$i", PARAM_INT);

            $label = get_string('corte', 'format_unidades') . " " . ($i == 5 ? 'Final': $i);
            $fechas = array();
            $fechas[] = $mform->createElement('static', "corte_$i", null, $label);
            $fechas[] = $mform->createElement('date_selector', "fe_inicio_$i", get_string('fe_inicio', 'format_unidades'));
            $fechas[] = $mform->createElement('date_selector', "fe_final_$i", get_string('fe_final', 'format_unidades'));
            $mform->addGroup($fechas, "fechas_$i", '', array(' '), false);
            $mform->setType("fe_inicio_$i", PARAM_INT);
            $mform->setType("fe_final_$i", PARAM_INT);
        }
        
        $mform->disable_form_change_checker();
        $this->add_action_buttons(true);
    }

    public function set_data($datos)
    {
        global $DB;
        $default_values = new stdClass();

        $rs = $DB->get_recordset('course_cortes_periodo', array('nu_carrera' => $datos->nu_carrera, 'nu_periodo' => $datos->id));
        $rs->close();

        parent::set_data($default_values);
    }

    public function get_data()
    {
        $data = parent::get_data();
        if ($data == null)
            return null;

        $datos = new stdClass();
        $datos->nu_carrera = $this->_customdata['nu_carrera'];
        $datos->nu_periodo = $this->_customdata['nu_periodo'];
        $datos->semanas = array();
        
        for($i = 1; $i <= $this->semanas; $i++)
        {
            $semana = new stdClass();
            $id = "id_$i";
            $semana->id = $data->$id;
            $semana->nu_semana = $i;
            $fe_inicio = "fe_inicio_$i";
            $fe_final = "fe_final_$i";
            $semana->fe_inicio = $data->$fe_inicio;
            $semana->fe_final = $data->$fe_final;

            $datos->semanas[$i] = $semana;
        }

        return $datos;
    }

}

?>
