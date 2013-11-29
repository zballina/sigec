<?php

define('ACCION_DESCARGA_PLANEACION', 1);
define('ACCION_DESCARGA_DESGLOSE', 2);
define('ACCION_DESCARGA_CALIFICACIONES', 3);
define('ACCION_DESCARGA_CORTES', 4);
define('ACCION_DESCARGA_CURSOS_ESTADISTICAS_DOCENTES', 5);
define('NUMERO_CORTES_SEMESTRE', 5);

define('ESTADO_ACTIVIDAD_ABIERTA', 0);
define('ESTADO_ACTIVIDAD_CERRADA', 1);

define('ASISTENCIA_ALUMNO_NO', 0);
define('ASISTENCIA_ALUMNO_ASISTIO', 1);
define('ASISTENCIA_ALUMNO_JUSTIFICACION', 2);
define('ASISTENCIA_ALUMNO_RETARDO', 3);

require_once ($CFG->dirroot . '/course/moodleform_mod.php');

/*
 * Obtiene el grupo actual seleccionador el selector de grupos y almacenado para 
 * el usuarios activo
 * 
 * @param object $course record de la tabla {course}
 * @return int
 */
function lib_itse_get_grupo($course)
{
        global $SESSION;
        $context = context_course::instance($course->id);
        if (has_capability('moodle/site:accessallgroups', $context)) 
        {
            $groupmode = 'aag';
        }
        else
        {
            $groupmode = $course->groupmode;
        }
        
        return $SESSION->activegroup[$course->id][$groupmode][$course->defaultgroupingid];
}

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

require_once($CFG->libdir . '/itse/asistencia_sesion_form.php');
require_once($CFG->libdir . '/itse/cerrar_actividad_form.php');

class SesionClase
{
    /*
     * instance to cm_info 
     */
    private $coursemoduleid;
    private $sesionclase;
    private $programacion;
    private $asistencias;
    private $asistencia_externa;
    private $usuarios;
    private $tipo;

    /**
     * Constructor de la clase. Asocia una la sección del curso con una unidad
     *
     * @param stdClass $c The course entry from DB
     * @param stdClass $section The course_section entry from DB
     */
    public function __construct($id, $tipo, $coursemoduleid)
    {
        global $DB;

        $this->sesionclase =  $DB->get_record($tipo, array('id' => $id));
        $this->tipo = $tipo;
        $this->coursemoduleid = $coursemoduleid;
        $this->usuarios = new Usuarios($this->sesionclase->course);
        $this->asistencia_externa = false;
        $this->programacion = null;
        $this->asistencias = null;
    }
    
    private function carga_programacion()
    {
        global $DB;
        if($this->programacion == null)
        {
            $this->programacion = array();
            $i = 0;
            $rs = $DB->get_records('sesionclase_programacion', 
                array('course' => $this->sesionclase->course, 'modulename' => $this->tipo,
                    'sesionclaseid' => $this->sesionclase->id));
            foreach ($rs as $programacion)
            {
                $this->programacion[$programacion->groupid] = $programacion;
                $i++;
            }
            try 
            {
                $transaction = $DB->start_delegated_transaction();
                if($i == 0)
                {
                    $grupos = groups_get_all_groups($this->sesionclase->course);
                    foreach ($grupos as $grupo)
                    {
                        $this->agregar_programacion_grupo($grupo->id);
                    }            
                }
                else
                {
                    // Revisar si la lista de grupos en el curso no hay cambiado y actualizar la lista de programacion
                    $grupos = groups_get_all_groups($this->sesionclase->course);
                    foreach ($this->programacion as $prog)
                    {
                        if(!isset($grupos[$prog->groupid]))
                        {
                            // Vericamos de nuevo
                            if(!$DB->record_exists('groups', array('id' => $prog->groupid)))
                            {
                                $grupo = $prog->groupid;
                                $id = $prog->id;
                                unset($this->programacion[$grupo]);
                                $DB->delete_records('sesionclase_programacion', array('id' => $id));
                            }
                        }
                    }
                }
                $grupos = groups_get_all_groups($this->sesionclase->course);
                foreach ($grupos as $grupo)
                {
                    if(!isset($this->programacion[$grupo->id]))
                        $this->agregar_programacion_grupo($grupo->id);
                } 

                $transaction->allow_commit();
            } 
            catch(Exception $e) 
            {
                $transaction->rollback($e);
            }  
        }
    }
    
    private function agregar_programacion_grupo($groupid)
    {
        global $DB;
        $programacion = new stdClass();
        $programacion->course = $this->sesionclase->course;
        $programacion->modulename = $this->tipo;
        $programacion->sesionclaseid = $this->sesionclase->id;
        $programacion->groupid = $groupid;
        $programacion->estado = ESTADO_ACTIVIDAD_ABIERTA;
        $programacion->fprogramada = 0;
        $programacion->hprogramada = 0;
        $DB->insert_record('sesionclase_programacion', $programacion);        
    }
    
    private function carga_asistencias()
    {
        global $DB;
        if($this->asistencias == null)
        {
            $this->asistencias = array();
            $grupos = groups_get_all_groups($this->sesionclase->course);
            foreach ($grupos as $grupo)
            {
                $lista = $this->usuarios->get_alumnos($grupo->id);
                $sesion = $this->existe_asistencia($grupo->id);
                $alumnos = array();
                foreach ($lista as $alumno)
                {
                    $perfil = $alumno;
                    $sesionid = $sesion !== false ? $sesion->sesionclaseid: $this->sesionclase->id;
                    $modulename = $sesion !== false ? $sesion->modulename: $this->tipo;
                    $condiciones = array('course' => $this->sesionclase->course,
                        'modulename' => $modulename, 
                        'sesionclaseid' => $sesionid, 'groupid' => $grupo->id,
                        'userid' => $alumno->id);
                    if($DB->record_exists('sesionclase_asistencias', $condiciones))
                        $perfil->asistencia = $DB->get_record('sesionclase_asistencias', $condiciones, '*', MUST_EXIST);
                    else
                        $perfil->asistencia = null;

                    $alumnos[$alumno->id] = $perfil;
                }
                $this->asistencias[$grupo->id] = $alumnos;
            }
        }
    }
    
    /*
     * Devuelve un arreglo que contiene las asistencias de un grupo determinado
     * Si es 0 devuelve el bloque completo de asistencias de todos los grupos
     * involucrados con la sesión de clase
     * 
     * @param int $groupid ID del grupo
     * @return array | null
     */
    public function asistencias($groupid)
    {
        $this->carga_asistencias();
        if(array_key_exists($groupid, $this->asistencias))
            return $this->asistencias[$groupid];
        else if($groupid == 0)
            return $this->asistencias;
        return null;
    }
    
    public function asistencia_externa()
    {
        return $this->asistencia_externa;
    }

    public function get_estado($groupid)
    {
        $programacion = $this->programacion($groupid);
        return $programacion->estado;
    }

    public function string_estado($groupid, $leyendacorta = false)
    {
        $ley = '';
        if($leyendacorta)
            $ley = 'corta';
        return get_string($this->programacion($groupid)->estado == ESTADO_ACTIVIDAD_CERRADA ? "estado_cerrada$ley": "estado_abierta$ley", 'sesionclase');
    }
    
    public function programacion($groupid)
    {
        $this->carga_programacion();
        if(array_key_exists($groupid, $this->programacion))
            return $this->programacion[$groupid];
        else if($groupid == 0)
            return $this->programacion;
        return null;
    }
    
    public function sesionclase()
    {
        return $this->sesionclase;
    }
    
    public function sesionclaseid()
    {
        return $this->sesionclase->id;
    }
    
    public function modulename()
    {
        return $this->tipo;
    }

    public function coursemoduleid()
    {
        return $this->coursemoduleid;
    }

    public function nombre_grupo($id)
    {
        global $DB;
        $grupo = $DB->get_record('groups', array('id' => $id), '*', MUST_EXIST);
        return $grupo->name;
    }

    public static function nombre_modulos()
    {
        return array('sesionclase', 'sesiontarea', 'practicalab');
    }

    public static function nombre_modulos_calificables()
    {
        return array('asistencias', 'sesiontarea', 'practicalab', 'assign', 'quiz');
    }

    /*
     * Determina si existe asistencia para esta actividad, con base a una fecha programada. 
     * Si las fechas reales son diferentes para actividades programadas en la mismas fechas
     * programadas da la posibilidad de ingresar una nueva asistencia
     * 
     * @param int $grupo id del grupo. Indica ID de la tabla {groups}
     * @return array | false
     */
    public function existe_asistencia($grupo = 0)
    {
        global $DB;
        $grupo = $grupo == 0 ? $this->grupo(): $grupo;
        $programada = $this->programacion($grupo);
        $sesiones = array();

        $condicion = array('course' => $programada->course, 
                'modulename' => $programada->modulename,
                'sesionclaseid' => $programada->sesionclaseid, 'groupid' => $grupo);
        if($DB->record_exists('sesionclase_asistencias', $condicion))
        {
            $this->asistencia_externa = false;
            return $programada;
        }
        
        $condicion = array('course' => $this->sesionclase->course, 'groupid' => $grupo);

        $fechas_grupos = $DB->get_records('sesionclase_programacion', $condicion);
        foreach ($fechas_grupos as $fila)
        {
            if($this->compare_fecha($fila->fprogramada, $programada->fprogramada, array('yday')))
            {
                $sesiones[$fila->id] = $fila;                
            }
        }
        foreach ($sesiones as $sesion)
        {
            $condicion = array('course' => $this->sesionclase->course, 
                    'modulename' => $sesion->modulename,
                    'sesionclaseid' => $sesion->sesionclaseid, 'groupid' => $grupo);
            if($DB->record_exists('sesionclase_asistencias', $condicion))
            {
                $this->asistencia_externa = $programada->id != $sesion->id ? true: false;
                return $sesion;
            }
        }
        $this->asistencia_externa = false;
        return false;
    }
    
    public function compare_fecha($diaa, $diab, $compare = array('mday', 'mon', 'year'))
    {
        $a = usergetdate($diaa);
        $b = usergetdate($diab);
        foreach ($compare as $parte)
        {
            if($a[$parte] != $b[$parte])
                return false;
        }
        return true;
    }

    public function display($context)
    {
        global $OUTPUT;
        $out = '';
        $grupo = $this->grupo();
        if($grupo == 0)
            return '';
        if (has_capability('mod/sesionclase:view', $context))
        {
            $out .= $OUTPUT->notification($this->string_estado($grupo));
            $out .= "<table style='border: 1px solid; width=100%'>";
            $out .= '<tr>';
            $out .= "<th style='border: 1px solid;'>" . get_string('aprendizaje', 'sesionclase') . "</th>";
            $out .= "<th style='border: 1px solid;'>" . get_string('ensenanza', 'sesionclase') . "</th>";
            $out .= "<th style='border: 1px solid;'>" . get_string('portafolio', 'sesionclase') . "</th>";
            $out .= '</tr>';
            $out .= '<tr>';
            $out .= "<td style='border: 1px solid;'>" . $this->sesionclase->aprendizaje . "</td>";
            $out .= "<td style='border: 1px solid;'>" . $this->sesionclase->ensenanza . "</td>";
            $out .= "<td style='border: 1px solid;'>" . $this->sesionclase->portafolio . "</td>";
            $out .= '</tr>';
            $out .= '</table>';
            $programacion = $this->programacion($grupo);
            $fecha = userdate($programacion->fprogramada);
            $hora = format_time($programacion->hprogramada);

            $out .= "<p>La fecha programada para esta actividad es <strong>$fecha</strong>. ";
            $out .= $programacion->hprogramada > 0 ? "Para esta actividad se programaron <strong>$hora</strong>.</p>": '</p>';
            if (has_capability('mod/sesionclase:viewobservacion', $context) && !empty($programacion->observaciones))
            {
                $out .= "<p>Observaciones: <strong>" . $programacion->observaciones . "</strong></p>";
            }
        }
        if (has_capability('mod/sesionclase:cerrar', $context) || has_capability('mod/sesionclase:desbloquear', $context)) 
        {
            if ($programacion->hreal > 0 && $programacion->estado == ESTADO_ACTIVIDAD_CERRADA)
            {
                $fecha = userdate($programacion->freal);
                $hora = format_time($programacion->hreal);
                $out .= "<p>La fecha real en la cual se desarrollo esta actividad es <strong>$fecha</strong>. ";
                $out .= $programacion->hreal > 0 ? "Esta actividad se desarrollo en <strong>$hora</strong>.</p>": '</p>';
            }
        }
        
        return $out;        
    }
    
    public function display_selector_grupos($context)
    {
        global $DB, $CFG;
        require_once ($CFG->libdir . '/grouplib.php');
        $o = '';
        if (has_capability('moodle/site:accessallgroups', $context)) 
        {
            $url = new moodle_url("/mod/$this->tipo/view.php", array('id' => $this->coursemoduleid));

            $course = $DB->get_record('course', array('id' => $this->sesionclase->course), '*', MUST_EXIST);
            $o .= groups_print_course_menu($course, $url, true);
        }
        return $o;        
    }
    
    public function display_asistencias($context)
    {
        global $DB, $OUTPUT;
        $o = '';
        if (has_capability('mod/sesionclase:addattendance', $context) || has_capability('mod/sesionclase:editattendance', $context)) 
        {        
            $url = new moodle_url("/mod/$this->tipo/view.php", array('id' => $this->coursemoduleid));
            $grupo = $this->grupo();
            if($grupo == 0)
                return $OUTPUT->notification('Debe seleccionar un grupo para el pase de lista y cerrar la sesión');
            if($this->usuarios->cantidad_alumnos($grupo) > 0)
            {
                $alumnos = $this->asistencias($grupo);
                $programacion = $this->existe_asistencia($grupo);
                if($programacion === false)
                    $o .= $OUTPUT->notification('La asistencia no se ha capturado');
                else 
                    $o .= $OUTPUT->notification('La asistencia se ha capturado', 'notifysuccess');
                
                $forma_asistencias = new asistencia_sesion_form($url, array('context' => $context, 
                    'programacion' => $programacion, 
                    'alumnos' => $alumnos, 
                    'externa' => $this->asistencia_externa,
                    'programacion_propia' => $this->programacion($grupo)));
                $forma_asistencias->set_data($alumnos);

                if ($forma_asistencias->is_cancelled())
                {
                    redirect($url);
                }
                if($data = $forma_asistencias->get_data())
                {
                    $DB->update_record('sesionclase_programacion', $data->programacion);

                    foreach ($data->alumnos as $alumno)
                    {
                        if(isset($alumno->asistencia->id) && $data->asistencia_nueva == 0)
                            $DB->update_record('sesionclase_asistencias', $alumno->asistencia);
                        else
                            $DB->insert_record('sesionclase_asistencias', $alumno->asistencia);
                    }
                    redirect($url);
                }        
                $o .= '<div class="listasalumnos">' . $forma_asistencias->render() . '</div>';
            }
            else
                return $OUTPUT->notification(get_string('nohayalumnosver', 'sesionclase'));
        }
        return $o;
    }    

    public function display_cerrar_actividad($context)
    {
        global $DB;
        $grupo = $this->grupo();
        if($grupo == 0)
            return '';
        $out = '';
        $cierre = $this->existe_asistencia();
        if($cierre !== false)
        {
            $url = new moodle_url("/mod/$this->tipo/view.php", array('id' => $this->coursemoduleid));
            $forma_cerrar_actividad = new cerrar_actividad_form($url, array('context' => $context, 
                'sesionclase' => $cierre));
            $forma_cerrar_actividad->set_data($cierre);
            if((has_capability('mod/sesionclase:cerrar', $context) && $cierre->estado == ESTADO_ACTIVIDAD_ABIERTA)
                || (has_capability('mod/sesionclase:desbloquear', $context) && $cierre->estado == ESTADO_ACTIVIDAD_CERRADA))
            {
                if ($forma_cerrar_actividad->is_cancelled())
                {
                    redirect($url);
                }
                if($data = $forma_cerrar_actividad->get_data())
                {
                    $cierre_propio = $this->programacion($grupo);
                    $cierre_propio->hreal = $data->hreal;
                    $cierre_propio->estado = $data->estado;
                    $cierre_propio->observaciones = $data->observaciones_editor['text'];
                    $cierre_propio->observacionesformat = $data->observaciones_editor['format'];
                    $DB->update_record('sesionclase_programacion', $cierre_propio);
                    redirect($url);
                }
                $out = $forma_cerrar_actividad->render();
            }
        }

        return $out;
    }
    
    
    public function grupo()
    {
        global $SESSION, $DB;
        $course = $DB->get_record('course', array('id' => $this->sesionclase->course), '*', MUST_EXIST);
        $context = context_course::instance($course->id);
        if (has_capability('moodle/site:accessallgroups', $context)) 
        {
            $groupmode = 'aag';
        }
        else
        {
            $groupmode = $course->groupmode;
        }
        
        return $SESSION->activegroup[$course->id][$groupmode][$course->defaultgroupingid];
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
        
        $users = get_role_users($role->id, $context);
        return $users;
    }    
}

?>
