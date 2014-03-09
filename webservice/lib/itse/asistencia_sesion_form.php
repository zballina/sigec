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
require_once ($CFG->libdir . '/itse/lib.php');

/**
 * Default form for editing course section
 *
 * Course format plugins may specify different editing form to use
 */
class asistencia_sesion_form extends moodleform
{
    function definition()
    {
        $mform = $this->_form;
        $context = $this->_customdata['context'];
        $alumnos = $this->_customdata['alumnos'];
        $externa = $this->_customdata['externa'];

        $mform->addElement('header', 'asistencias_header', get_string('asistencias_sesion', 'sesionclase'));
        if(has_capability('mod/sesionclase:setrealdate', $context))
                //&& $this->_customdata['programacion'] != null && $this->_customdata['programacion']->estado != ESTADO_ACTIVIDAD_CERRADA)
        {
            $mform->addElement('date_time_selector', "freal", get_string("freal", 'sesionclase'));
            $mform->setType('freal', PARAM_INT);
        }
        if($externa)
        {
            $mform->addElement('advcheckbox', 'asistencia_nueva', get_string('leyendacapturaasistencianueva', 'sesionclase'), get_string('capturaasistencianueva', 'sesionclase'), null, array(0, 1));
            $mform->setType('asistencia_nueva', PARAM_INT);
        }
        $cuenta = 0;
        foreach ($alumnos as $alumno)
        {
            $grupo_alumno = array();
            $grupo_alumno[] = $mform->createElement('text', "name$alumno->id", '', array('maxlength' => 255, 'size' => 40));
            $grupo_alumno[] = $mform->createElement('radio', "asistio$alumno->id", '', get_string('alumno_asistio', 'sesionclase'), ASISTENCIA_ALUMNO_ASISTIO);            
            $grupo_alumno[] = $mform->createElement('radio', "asistio$alumno->id", '', get_string('alumno_asistio_no', 'sesionclase'), ASISTENCIA_ALUMNO_NO);            
            $grupo_alumno[] = $mform->createElement('radio', "asistio$alumno->id", '', get_string('alumno_asistio_jutificacion', 'sesionclase'), ASISTENCIA_ALUMNO_JUSTIFICACION);
            $grupo_alumno[] = $mform->createElement('radio', "asistio$alumno->id", '', get_string('alumno_asistio_retardo', 'sesionclase'), ASISTENCIA_ALUMNO_RETARDO);
            $mform->addGroup($grupo_alumno, "alumno$alumno->id", "$alumno->username", array(' '), false);
            $mform->addElement('hidden', "id$alumno->id");
            $mform->setType("id$alumno->id", PARAM_INT);
            $mform->setType("asistio$alumno->id", PARAM_INT);
            $mform->setType("name$alumno->id", PARAM_TEXT);
            $cuenta++;
        }
        $mform->disable_form_change_checker();
        if($cuenta > 0)
        {
//            if($this->_customdata['programacion'] != null && $this->_customdata['programacion']->estado != ESTADO_ACTIVIDAD_CERRADA)
                $this->add_action_buttons(false);
        }
    }

    /**
     * Load in existing data as form defaults
     *
     * @param stdClass|array $default_values object or array of default values
     */
    function set_data($values)
    {
        $default_values = new stdClass();
        
        foreach ($values as $usuario)
        {
            $id = "id$usuario->id";
            $default_values->$id = $usuario->id;
            $name = "name$usuario->id";
            $default_values->$name = "$usuario->lastname $usuario->firstname";
            $asistio = "asistio$usuario->id";
            $default_values->$asistio = isset($usuario->asistencia) ? $usuario->asistencia->asistio: ASISTENCIA_ALUMNO_ASISTIO;
            
            if($this->_customdata['programacion'] != null && $this->_customdata['programacion']->freal != null)
                $default_values->freal = $this->_customdata['programacion']->freal;
            else
                $default_values->freal = $this->_customdata['fprogramada'] +  800;
            
        }

        parent::set_data($default_values);
    }
    
    function get_data()
    {
        global $USER;
        $data = parent::get_data();
        
        if($data == null)
            return null;
        $asistencias = new stdClass();
        $alumnos = $this->_customdata['alumnos'];
        if(!isset($data->asistencia_nueva) && $this->_customdata['programacion'] !== false)
        {
            $asistencias->programacion = $this->_customdata['programacion'];
            $asistencias->asistencia_nueva = 0;
        }
        else if(isset($data->asistencia_nueva) && $data->asistencia_nueva == 0 && $this->_customdata['programacion'] !== false)
        {
            $asistencias->programacion = $this->_customdata['programacion'];
            $asistencias->asistencia_nueva = 0;
        }
        else
        {
            $asistencias->asistencia_nueva = 1;
            $asistencias->programacion = $this->_customdata['programacion_propia'];
        }
        $context = $this->_customdata['context'];            
        if(has_capability('mod/sesionclase:setrealdate', $context))
        {
            $asistencias->programacion->freal = $data->freal;
        }
        else
        {
            $asistencias->programacion->freal = $asistencias->programacion->freal == null 
                || $asistencias->programacion->freal == 0 ? time() : $asistencias->programacion->freal;
        }
        
        foreach ($alumnos as $alumno)
        {
            $nu_alumno = "id$alumno->id";
            $asistio = "asistio$alumno->id";
//            $observaciones = "observaciones$alumno->id";
            if(isset($alumnos[$alumno->id]->asistencia) && $asistencias->asistencia_nueva == 0)
            {
                $alumnos[$alumno->id]->asistencia->asistio = $data->$asistio;
                $alumnos[$alumno->id]->asistencia->freal = $asistencias->programacion->freal;
//                $alumnos[$alumno->id]->asistencia->observaciones = $asistencias->programacion->$observaciones;
            }
            else
            {
                $asistencia = new stdClass();
                $asistencia->teacher = $USER->id;
                $asistencia->course = $asistencias->programacion->course;
                $asistencia->modulename = $asistencias->programacion->modulename;
                $asistencia->sesionclaseid = $asistencias->programacion->sesionclaseid;
                $asistencia->groupid = $asistencias->programacion->groupid;
                $asistencia->fprogramada = $asistencias->programacion->fprogramada;
                $asistencia->freal = $asistencias->programacion->freal;
                $asistencia->userid = $data->$nu_alumno;
                $asistencia->asistio = $data->$asistio;
//                $asistencia->observaciones = $data->$observaciones;
                $alumnos[$alumno->id]->asistencia = $asistencia;
            }
        }
        $asistencias->alumnos = $alumnos;
        return $asistencias;
    }
}

?>