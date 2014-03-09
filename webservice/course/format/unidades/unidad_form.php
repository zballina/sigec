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
class unidad_form extends moodleform
{

    function definition()
    {
        global $PAGE;
        $mform = $this->_form;
        $unidad = $this->_customdata['unidad'];
        $context = $this->_customdata['context'];
        
        if ($unidad->nu_unidad > 0)
        {
            $mform->addElement('static', 'nombre', get_string('nombre', 'format_unidades'));
            $mform->setType('nombre', PARAM_TEXT);
            $mform->addElement('header', 'generalhdr', get_string('competencias', 'format_unidades'));

            $mform->addElement('static', 'competenciasgenericas', get_string('competenciasgenericas', 'format_unidades'));
            $mform->setType('competenciasgenericas', PARAM_TEXT);

            $mform->addElement('static', 'competenciaespecifica', get_string('competenciaespecifica', 'format_unidades'));
            $mform->setType('competenciaespecifica', PARAM_TEXT);

            $mform->addElement('header', 'generalhdr', get_string('fuenteyapoyo', 'format_unidades'));
            $mform->addElement('static', 'fuentesinformacion', get_string('fuentesinformacion', 'format_unidades'));
            $mform->setType('fuentesinformacion', PARAM_TEXT);

            $mform->addElement('static', 'apoyosdidacticos', get_string('apoyosdidacticos', 'format_unidades'));
            $mform->setType('apoyosdidacticos', PARAM_TEXT);

            $opciones_coordinacion = false;
            if (has_capability('courseformat/unidades:observaciones', $context) && 
                $unidad->estado == PLANEACION_APROBADA && $PAGE->user_is_editing())
            {
                if(!$opciones_coordinacion)
                {
                    $mform->addElement('header', 'header_coordinacion', get_string('opciones_coordinacion', 'format_unidades'));
                    $opciones_coordinacion = true;
                }
                $mform->addElement('textarea', 'observaciones_revision', get_string('observaciones_unidad', 'format_unidades'), array('rows' => "7", 'cols' => "70"));
                $mform->setType('observaciones_revision', PARAM_TEXT);
            }
            if (has_capability('courseformat/unidades:desbloquear_unidad', $context) && $PAGE->user_is_editing())
            {
                if(!$opciones_coordinacion)
                {
                    $mform->addElement('header', 'header_coordinacion', get_string('opciones_coordinacion', 'format_unidades'));
                    $opciones_coordinacion = true;
                }

                $mform->addElement('advcheckbox', 'desbloquear_unidad', get_string('desbloquear_unidad', 'format_unidades'), '', array('group' => 1), array(0, 1));
                $mform->setType('desbloquear_unidad', PARAM_INT);
                $mform->setType('observaciones_revision', PARAM_TEXT);
            }
            if($opciones_coordinacion)
                $this->add_action_buttons(false);                
        }
        else
        {

            $mform->addElement('static', 'estado_caratula', get_string('estado_plan', 'format_unidades'));
            $mform->addElement('header', 'generalhdr', get_string('caratula', 'format_unidades'));
            $mform->addElement('static', 'periodo', get_string('periodo', 'format_unidades'));
            $mform->setType('periodo', PARAM_TEXT);
            $mform->addElement('static', 'clave', get_string('clave', 'format_unidades'));
            $mform->setType('clave', PARAM_TEXT);
            $mform->addElement('static', 'satca', get_string('satca', 'format_unidades'));
            $mform->setType('satca', PARAM_TEXT);

            $mform->addElement('static', 'caracterizacion', get_string('caracterizacion', 'format_unidades'));
            $mform->setType('caracterizacion', PARAM_TEXT);

            $mform->addElement('static', 'objetivocurso', get_string('objetivocurso', 'format_unidades'));
            $mform->setType('objetivocurso', PARAM_TEXT);

            if ($PAGE->user_is_editing() &&
                    (has_capability('courseformat/unidades:aprobar', $context) 
                || has_capability('courseformat/unidades:revisar', $context)
                || has_capability('courseformat/unidades:rechazar', $context)
                || has_capability('courseformat/unidades:enviar', $context)
                || has_capability('courseformat/unidades:cambiarestado', $context)))
            {

                $mform->addElement('header', 'acciones_header', get_string('acciones', 'format_unidades'));
                $mform->setExpanded('acciones_header', false);
                $mform->addElement('static', 'estado_plan', get_string('estado_plan', 'format_unidades'));
                $mform->setType('estado_plan', PARAM_TEXT);
                if($unidad->estado != PLANEACION_APROBADA)
                {
                    $mform->addElement('textarea', 'observaciones_revision', get_string('observaciones', 'format_unidades'), array('rows' => "7", 'cols' => "70"));
                    $mform->setType('observaciones_revision', PARAM_TEXT);
                }
                $estados = array();
                if (has_capability('courseformat/unidades:aprobar', $context) && $unidad->estado == PLANEACION_ENVIADA)
                {
                    $estados[] = & $mform->createElement('radio', 'estado', '', get_string('accion_aprobar', 'format_unidades'), PLANEACION_APROBADA);
                }

                if ((has_capability('courseformat/unidades:revisar', $context) && $unidad->estado == PLANEACION_ENVIADA)
                    || (has_capability('courseformat/unidades:cambiarestado', $context) && $unidad->estado == PLANEACION_APROBADA))
                {
                    $estados[] = & $mform->createElement('radio', 'estado', '', get_string('accion_revisar', 'format_unidades'), PLANEACION_REVISADA);
                }
                if (has_capability('courseformat/unidades:rechazar', $context) && $unidad->estado == PLANEACION_ENVIADA)
                {
                    $estados[] = & $mform->createElement('radio', 'estado', '', get_string('accion_rechazar', 'format_unidades'), PLANEACION_RECHAZADA);
                }

                if (has_capability('courseformat/unidades:enviar', $context) 
                    && ($unidad->estado == PLANEACION_REALIZADA || $unidad->estado == PLANEACION_REVISADA))
                {
                    $estados[] = & $mform->createElement('radio', 'estado', '', get_string('accion_enviar', 'format_unidades'), PLANEACION_ENVIADA);
                }
                if (has_capability('courseformat/unidades:editar', $context))
                {
                    if($unidad->estado == PLANEACION_APROBADA || $unidad->estado == PLANEACION_RECHAZADA || $unidad->estado == PLANEACION_NOREALIZADA)
                    {
                        if(!has_capability('courseformat/unidades:cambiarestado', $context))
                        {
                            $mform->disabledIf('estados', 'id', 'eq', $unidad->id);
                            $mform->disabledIf('observaciones_revision', 'id', 'eq', $unidad->id);
                            $mform->disabledIf('submitbutton', 'id', 'eq', $unidad->id);
                        }
                    }
                }
                if(count($estados) > 0)
                {
                    $mform->addGroup($estados, 'estados', '', array(' '), false);
//                    $mform->addRule('estados', '', 'required');
                }
                else
                {
                    $mform->disabledIf('observaciones_revision', 'id', 'eq', $unidad->id);
                    $mform->disabledIf('submitbutton', 'id', 'eq', $unidad->id);                    
                }
                $mform->addElement('hidden', 'sesskey');
                $mform->setType('sesskey', PARAM_RAW);
                $this->add_action_buttons(false);
            }
        }

        $mform->addElement('hidden', 'id');
        $mform->setType('id', PARAM_INT);
        //$mform->_registerCancelButton('cancel');
        $mform->setExpanded('generalhdr', false);
        
        $mform->disable_form_change_checker();
    }

    /**
     * Load in existing data as form defaults
     *
     * @param stdClass|array $default_values object or array of default values
     */
    function set_data($default_values)
    {
        global $DB;
        if (!is_object($default_values))
        {
            $default_values = (object) $default_values;

        }
        $default_values->estado_caratula = $this->_customdata['unidad']->get_estado();
        $periodo = $DB->get_record('course_periodos', array('id' => $this->_customdata['unidad']->nu_periodo));
        $default_values->estado_plan = $this->_customdata['unidad']->get_estado();
        $default_values->desbloquear_unidad = $this->_customdata['unidad']->estado > 0 ? 0: 1;
        if($this->_customdata['unidad']->nu_unidad == 0 && $this->_customdata['unidad']->estado != PLANEACION_NOREALIZADA)
        {
            if($periodo != null)
                $default_values->periodo = "$periodo->periodo $periodo->ano";
            else
                $default_values->periodo = '';

        }
        parent::set_data($default_values);
    }
}

?>