<?php

define('ACCION_DESCARGA_PLANEACION', 1);
define('ACCION_DESCARGA_DESGLOSE', 2);
define('ACCION_DESCARGA_CALIFICACIONES', 3);
define('ACCION_DESCARGA_CORTES', 4);
define('ACCION_DESCARGA_RUBRICAS', 5);
define('ACCION_DESCARGA_CURSOS_ESTADISTICAS_DOCENTES', 6);
define('ACCION_DESCARGA_CURSOS_ESTADISTICAS_ASISTENCIAS_CARRERAS', 7);

define('NUMERO_CORTES_SEMESTRE', 5);

define('ESTADO_ACTIVIDAD_ABIERTA', 0);
define('ESTADO_ACTIVIDAD_CERRADA', 1);

define('ASISTENCIA_ALUMNO_NO', 0);
define('ASISTENCIA_ALUMNO_ASISTIO', 1);
define('ASISTENCIA_ALUMNO_JUSTIFICACION', 2);
define('ASISTENCIA_ALUMNO_RETARDO', 3);

require_once ($CFG->dirroot . '/course/moodleform_mod.php');
require_once($CFG->libdir . '/messagelib.php');
require_once($CFG->libdir . '/itse/libsesionclase.php');

class Botones_Descarga
{  
    public static function boton_planeacion($courseid, $groupid)
    {
        $url = new moodle_url('/lib/itse/reportes/descargar.php', array('id' => $courseid, 'groupid' => $groupid, 'accion' => ACCION_DESCARGA_PLANEACION));
        return $url;
    }

    public static function boton_desglose($courseid, $groupid)
    {
        $url = new moodle_url('/lib/itse/reportes/descargar.php', array('id' => $courseid, 'groupid' => $groupid, 'accion' => ACCION_DESCARGA_DESGLOSE));
        return $url;
    }

    public static function boton_rubricas($courseid, $groupid)
    {
        $url = new moodle_url('/lib/itse/reportes/descargar.php', array('id' => $courseid, 'groupid' => $groupid, 'accion' => ACCION_DESCARGA_RUBRICAS));
        return $url;
    }

    public static function boton_corte($courseid, $corte, $sesskey)
    {
//        $url = new moodle_url('/lib/itse/reportes/descargar.php', array('id' => $courseid, 'corte' => $corte, 'accion' => ACCION_DESCARGA_CORTES));
        $url = new moodle_url('/course/cortes/genera_corte.php', array('id' => $courseid, 'corte' => $corte, 'sesskey' => $sesskey));        
        return $url;
    }

    public static function boton_calificaciones($courseid, $groupid, $unidad)
    {
        $url = new moodle_url('/lib/itse/reportes/descargar.php', array('id' => $courseid, 'groupid' => $groupid, 'unidad' => $unidad, 'accion' => ACCION_DESCARGA_CALIFICACIONES));
        return $url;
    }

    public static function boton_cursos_estadisticas_docentes($carrera)
    {
        $url = new moodle_url('/lib/itse/reportes/descarga_est.php', array('id' => $carrera, 'accion' => ACCION_DESCARGA_CURSOS_ESTADISTICAS_DOCENTES));
        return $url;
    }
    
    public static function boton_cursos_estadisticas_asistencias_carreras($carrera)
    {
        $url = new moodle_url('/lib/itse/reportes/descarga_est.php', array('id' => $carrera, 'accion' => ACCION_DESCARGA_CURSOS_ESTADISTICAS_ASISTENCIAS_CARRERAS));
        return $url;
    }
    
    public static function boton_semanas($carrera)
    {
        $url = new moodle_url('/course/semanas/view.php', array('id' => $carrera));
        return $url;
    }
    
}

class mod_sesionpadre_mod_form extends moodleform_mod
{
    /**
     * Defines forms elements
     */
    public function definition()
    {
        global $CFG, $COURSE;
        $mform = $this->_form;
        $mform->addElement('header', 'general', get_string('general', 'form'));
        // Adding the standard "name" field
        $mform->addElement('text', 'name', get_string($this->_modname . "mentname", $this->_modname), array('size' => '64'));
        if (!empty($CFG->formatstringstriptags))
        {
            $mform->setType('name', PARAM_TEXT);
        }
        else
        {
            $mform->setType('name', PARAM_CLEAN);
        }
        
        $mform->addRule('name', null, 'required', null, 'client');
        $mform->addRule('name', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');
        $mform->addHelpButton('name', $this->_modname . "mentname", $this->_modname);

        $this->add_caja_editor('aprendizaje', 'aprendizaje');
        $this->add_caja_editor('ensenanza', 'ensenanza');
        $this->add_caja_editor('portafolio', 'portafolio');

        $grupos = groups_get_all_groups($COURSE->id);
        $encabezado = get_string('fechasprogramadasreales', 'sesionclase');
        $i = 0;
        foreach ($grupos as $grupo)
        {
            $mform->addElement('header', "fechasprogramadasreales$grupo->id", "$encabezado para el grupo $grupo->name");
            $this->add_fechas_editor("programada$grupo->id", 'programada', true);                        
            $i++;
        }
        if($i == 0)
        {
            $mform->addElement('header', "fechasprogramadasreales", get_string('nohaygruposver', 'sesionclase'));
        }
    }

    function add_fechas_editor($nombre, $etiqueta, $required = false)
    {
        $mform = $this->_form;
        //$label = is_null($customlabel) ? : $customlabel;

        $mform->addElement('date_time_selector', "f$nombre", get_string("f$etiqueta", 'sesionclase'));
        $mform->addElement('duration', "h$nombre", get_string("h$etiqueta", 'sesionclase'));

        $mform->setType("f$nombre", PARAM_INT);
        // no XSS prevention here, users must be trusted
        $mform->setType("h$nombre", PARAM_INT);
        // no XSS prevention here, users must be trusted

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
            'context' => $this->context, 
            'maxfiles' => EDITOR_UNLIMITED_FILES,
            'maxbytes' => $CFG->maxbytes,
            'noclean' => true, 
            'trusttext' => false,
            'collapsed' => true);
        
        $mform->addElement('editor', $nombre . '_editor', $label, array('rows' => 10), $editoroptions);

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
        global $CFG, $COURSE;
        if (!is_object($default_values))
        {
            // we need object for file_prepare_standard_editor
            $default_values = (object) $default_values;
        }
        
        $editoroptions = array(
            'context' => $this->context, 
            'maxfiles' => EDITOR_UNLIMITED_FILES,
            'maxbytes' => $CFG->maxbytes,
            'noclean' => true, 
            'trusttext' => false,
            'collapsed' => true);
        
        $default_values = file_prepare_standard_editor($default_values, 'aprendizaje', $editoroptions);
        $default_values = file_prepare_standard_editor($default_values, 'ensenanza', $editoroptions);
        $default_values = file_prepare_standard_editor($default_values, 'portafolio', $editoroptions);

        if(isset($this->_cm->id))
        {
            $sesion = new SesionClase($this->_instance, $this->_modname, $this->_cm->id);
            $grupos = groups_get_all_groups($COURSE->id);
            $i = 0;
            foreach ($grupos as $grupo)
            {
                $programacion = $sesion->programacion($grupo->id);
                if($programacion != null)
                {
                    $fprogramada = "fprogramada$grupo->id";
                    $default_values->$fprogramada = $programacion->fprogramada;
                    $hprogramada = "hprogramada$grupo->id";
                    $default_values->$hprogramada = $programacion->hprogramada;
                }
            }
        }
        parent::set_data($default_values);
    }

    /**
     * Return submitted data if properly submitted or returns NULL if validation
     * fails or
     * if there is no submitted data.
     *
     * @return object submitted data; NULL if not valid or not submitted or cancelled
     */
    function get_data()
    {
        global $CFG;
        $data = parent::get_data();
        if ($data !== null)
        {
            $editoroptions = array(
                'context' => $this->context, 
                'maxfiles' => EDITOR_UNLIMITED_FILES,
                'maxbytes' => $CFG->maxbytes,
                'noclean' => true, 
                'trusttext' => false,
                'collapsed' => true);
 
            $data = file_postupdate_standard_editor($data, 'aprendizaje', $editoroptions, $editoroptions['context']);
            $data = file_postupdate_standard_editor($data, 'ensenanza', $editoroptions, $editoroptions['context']);
            $data = file_postupdate_standard_editor($data, 'portafolio', $editoroptions, $editoroptions['context']);
        }
        
        return $data;
    }
    
}

class Usuarios
{
    private $course;

    public function __construct($courseid)
    {
        $this->course = $courseid;        
    }

    public function get_alumnos($groupid)
    {
        global $DB;
        $context = context_course::instance($this->course);
        $role = $DB->get_record('role', array('shortname' => 'student'), '*', MUST_EXIST);
        
        $users = get_role_users($role->id, $context, false, '', null, true, $groupid);
        return $users;
    }
    
    public function cantidad_alumnos($groupid)
    {
        $i = 0;
        foreach ($this->get_alumnos($groupid) as $value)
        {
            $i++;
        }
        return $i;
    }

    public function get_docentes()
    {
        global $DB;
        $context = context_course::instance($this->course);
        $role = $DB->get_record('role', array('shortname' => 'editingteacher'), '*', MUST_EXIST);
        
        $users = get_role_users($role->id, $context);
        return $users;
    }

    public function get_coordinador()
    {
        global $DB;
        $course = get_course($this->course);
        $context = context_coursecat::instance($course->category);
        $role = $DB->get_record('role', array('shortname' => 'coordinador'), '*', MUST_EXIST);
        
        $users = get_role_users($role->id, $context, false, '', 'lastname DESC');
        return $users;
    }    

}

/**
 * Send a message from one user to another using events_trigger
 *
 * @param object $touser
 * @param object $fromuser
 * @param string $name
 * @param string $subject
 * @param string $message
 */
function notificacion_email($touser, $fromuser, $name='courserequested', $subject, $message) {
    $eventdata = new stdClass();
    $eventdata->component         = 'moodle';
    $eventdata->name              = $name;
    $eventdata->userfrom          = $fromuser;
    $eventdata->userto            = $touser;
    $eventdata->subject           = $subject;
    $eventdata->fullmessage       = $message;
    $eventdata->fullmessageformat = FORMAT_PLAIN;
    $eventdata->fullmessagehtml   = '';
    $eventdata->smallmessage      = '';
    $eventdata->notification      = 1;
    message_send($eventdata);
}    

?>
