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
class cerrar_actividad_form extends moodleform
{
    function definition()
    {
        $mform = $this->_form;

        $estados = array(ESTADO_ACTIVIDAD_ABIERTA => get_string('estado_abierta', 'sesionclase'), 
            ESTADO_ACTIVIDAD_CERRADA => get_string('estado_cerrada', 'sesionclase'));
        
        $mform->addElement('header', 'cierre_header', get_string('cierre_actividad', 'sesionclase'));
        $mform->addElement('select', 'estado', get_string('estado', 'sesionclase'), $estados);
        $this->add_fechas_editor('real');
        $this->add_caja_editor('observaciones', 'observaciones');

        $mform->disable_form_change_checker();
        $this->add_action_buttons(false);
    }
    
    function add_fechas_editor($nombre, $required = false)
    {
        $mform = $this->_form;

//        $mform->addElement('date_selector', "f$nombre", get_string("f$nombre", 'sesionclase'));
        $mform->addElement('static', "ff$nombre", get_string('freal', 'sesionclase'));
//        $mform->addElement('hidden', "f$nombre");
        $mform->addElement('duration', "h$nombre", get_string("h$nombre", 'sesionclase'));

        $mform->setType("f$nombre", PARAM_INT);
        $mform->setType("h$nombre", PARAM_INT);

        if ($required)
        {
            $mform->addRule("f$nombre", get_string('required'), 'required', null, 'client');
            $mform->addRule("h$nombre", get_string('required'), 'required', null, 'client');
        }
    }

    function add_caja_editor($nombre, $etiqueta, $required = false, $collapsed = false, $customlabel = null)
    {
        global $CFG;
        $mform = $this->_form;
        $label = is_null($customlabel) ? get_string($etiqueta, 'sesionclase') : $customlabel;

        $editoroptions = array(
            'context' => $this->_customdata['context'],
            'maxfiles' => EDITOR_UNLIMITED_FILES,
            'maxbytes' => $CFG->maxbytes,
            'noclean' => true, 
            'trusttext' => false,
            'collapsed' => true);

        $mform->addElement('editor', $nombre . '_editor', $label, null, $editoroptions);

        $mform->setType($nombre . '_editor', PARAM_RAW);

        if ($required)
        {
            $mform->addRule($nombre . '_editor', get_string('required'), 'required', null, 'client');
        }
    }
    
    /**
     * Load in existing data as form defaults
     *
     * @param stdClass|array $default_values object or array of default values
     */
    function set_data($default_values)
    {
        global $CFG;
        if (!is_object($default_values))
        {
            // we need object for file_prepare_standard_editor
            $default_values = (object) $default_values;
        }
        $editoroptions = array(
            'context' => $this->_customdata['context'],
            'maxfiles' => EDITOR_UNLIMITED_FILES,
            'maxbytes' => $CFG->maxbytes,
            'noclean' => true, 
            'trusttext' => false,
            'collapsed' => true);

        $default_values = file_prepare_standard_editor($default_values, 'observaciones', $editoroptions);
        $default_values->ffreal = userdate($default_values->freal);

        parent::set_data($default_values);
    }
    
    public function get_data()
    {
        global $CFG;
        $datos = parent::get_data();
        
        if($datos == null)
            return null;

        $editoroptions = array(
            'context' => $this->_customdata['context'],
            'maxfiles' => EDITOR_UNLIMITED_FILES,
            'maxbytes' => $CFG->maxbytes,
            'noclean' => true, 
            'trusttext' => false,
            'collapsed' => true);

        $datos = file_postupdate_standard_editor($datos, 'observaciones', $editoroptions, $editoroptions['context']);
        
        return $datos;
    }
}

?>