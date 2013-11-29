<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of periodoactual_form
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

class periodoactual_form extends moodleform
{
    protected function definition()
    {
        global $DB;
        $mform = $this->_form;
        $mform->addElement('header', 'generalhdr', get_string('seleccionarperiodoactual', 'format_unidades'));

        $rs = $DB->get_recordset('course_periodos', array('nu_carrera' => $this->_customdata['category']->id));        
        foreach ($rs as $record)
        {
            $periodos = array();
            $periodos[] = &$mform->createElement('advcheckbox', "actual_$record->id", '', $record->periodo . " " . date('Y', $record->fe_final), 1);;
            $periodos[] = $mform->createElement('date_selector', "fe_inicio_$record->id", get_string('fe_inicio', 'format_unidades'));
            $periodos[] = $mform->createElement('date_selector', "fe_final_$record->id", get_string('fe_final', 'format_unidades'));
            $mform->addGroup($periodos, 'periodos', '', array(' '), false);
        }
  //      $mform->addGroup($radioarray, 'radioar', '', array(' '), false);
        
        $rs->close();

        $mform->disable_form_change_checker();        
        $this->add_action_buttons(false);
    }

    public function set_data($default_values)
    {
        if (!is_object($default_values))
        {
            $default_values = (object) $default_values;
        }
        $data = new stdClass();

        foreach ($default_values as $fila)
        {
            $valactual = "actual_$fila->id";
            $valfe_inicio = "fe_inicio_$fila->id";
            $valfe_final = "fe_final_$fila->id";
            $data->$valactual = $fila->actual;
            $data->$valfe_inicio = $fila->fe_inicio;
            $data->$valfe_final = $fila->fe_final;
        }

        parent::set_data($data);
    }
    public function get_data()
    {
        global $DB;
        $data = parent::get_data();
        if($data == null)
            return null;
        $data = convert_to_array($data);
        $a = array();
        $rs = $DB->get_recordset('course_periodos', array('nu_carrera' => $this->_customdata['category']->id));        
        foreach ($rs as $record)
        {
            $record->actual = $data["actual_$record->id"];
            $record->fe_inicio = $data["fe_inicio_$record->id"];
            $record->fe_final = $data["fe_final_$record->id"];
            $a[$record->id] = $record;
        }
        return $a;
    }    
}

?>
