<?php

define('PLANEACION_NOREALIZADA', 0);
define('PLANEACION_REALIZADA', 1);
define('PLANEACION_ENVIADA', 2);
define('PLANEACION_REVISADA', 3);
define('PLANEACION_RECHAZADA', 4);
define('PLANEACION_APROBADA', 5);

require_once ($CFG->libdir . '/itse/lib.php');
require_once($CFG->libdir . '/itse/libsesiones.php');

class Unidad
{
    private $course;
    private $unidad;
    private $groups;
    private $sesiones;

    /**
     * Constructor de la clase. Asocia una la sección del curso con una unidad
     *
     * @param stdClass $course The course entry from DB
     * @param stdClass $section The course_section entry from DB
     */
    public function __construct($course, $section)
    {
        global $DB;
        $course = is_object($course) ? $course->id : $course;
        $sectionid = is_object($section) ? $section->id : $section;

        if (!$DB->record_exists('course_unidades', array('id' => $sectionid)))
        {
            $unidad = new stdClass();
            $unidad->id = $sectionid;
            $unidad->nu_curso = $course;
            $unidad->nu_unidad = is_object($section) ? $section->section : 0;
            $unidad->caracterizacionformat = 1;
            $unidad->objetivocursoformat = 1;
            $unidad->caracterizacionformat = 1;
            $unidad->competenciaespecificaformat = 1;
            $unidad->competenciasgenericasformat = 1;
            $unidad->apoyosdidacticosformat = 1;
            $unidad->fuentesinformacionformat = 1;
            $DB->insert_record_raw('course_unidades', $unidad, false, false, true);
        }

        $this->unidad = $DB->get_record('course_unidades', array('id' => $sectionid,
            'nu_curso' => $course), '*', MUST_EXIST);
        $this->course = get_course($this->unidad->nu_curso);
        $this->groups = groups_get_all_groups($this->course->id);
        $this->sesiones = new Sesiones($this->course->id, $this->unidad->nu_unidad);
    }

    /**
     * Obtiene la unidad asociada con la sección del curso
     *
     * @return stdClass unidad asociada con la sección del curso
     */
    public function get_unidad()
    {
        return $this->unidad;
    }

    public function __get($name)
    {
        return $this->unidad->$name;
    }

    public function __set($name, $value)
    {
        $this->unidad->$name = $value;
    }

    public function puedeSerEditada()
    {
        return ($this->unidad->estado == PLANEACION_NOREALIZADA || $this->unidad->estado == PLANEACION_REALIZADA || $this->unidad->estado == PLANEACION_REVISADA);
    }
    
    public function get_estado()
    {
        switch ($this->unidad->estado)
        {
            case PLANEACION_NOREALIZADA:
                return get_string('plan_norealizado', 'format_unidades');
            case PLANEACION_REALIZADA:
                return get_string('plan_realizado', 'format_unidades');
            case PLANEACION_ENVIADA:
                return get_string('plan_enviado', 'format_unidades');
            case PLANEACION_REVISADA:
                return get_string('plan_revisado', 'format_unidades');
            case PLANEACION_RECHAZADA:
                return get_string('plan_rechazado', 'format_unidades');
            case PLANEACION_APROBADA:
                return get_string('plan_aprobado', 'format_unidades');
        }
    }

    public function concluida($groupid)
    {
        $concluida = false;
        foreach ($this->get_sesiones($groupid) as $sesion)
        {
            if ($sesion->get_estado($groupid) == ESTADO_ACTIVIDAD_CERRADA)
            {
                $concluida = true;
            }
            else
            {
                $concluida = false;
                break;
            }
        }

        return $concluida;
    }

    public function get_all_sesiones()
    {
        return $this->sesiones->get_all_sesiones();
    }

    public function get_sesiones($groupid)
    {
        return $this->sesiones->get_sesiones($groupid);
    }

    public function get_actividades()
    {
        return $this->sesiones->get_actividades();
    }

    /*
     * Obtiene a
     */
    private function get_fecha_unidad($groupid, $posicion='first', $tipo = 'fprogramada')
    {
        $sesiones = $this->get_sesiones($groupid);
//        $nu_sesiones = count($sesiones);
        $fecha = 0;
        $serie = 0;
        foreach ($sesiones as $sesion)
        {
            $programacion = $sesion->programacion($groupid);
            if($programacion->$tipo > 0)
            {
                $fecha = $programacion->$tipo;
            }
            if($serie == 0 && $fecha > 0 && $posicion == 'first')
                return $fecha;
            $serie++;
        }
        if($fecha != 0)
            return $fecha;
/*        
        if($nu_sesiones > 0)
        {
            $pos = $posicion == 'first' ? 0: $nu_sesiones - 1;
            $sesion = $sesiones[$pos];
            $programacion = $sesion->programacion($groupid);
            return $programacion->$tipo;
        }
 */
        return false;
    }
    
    public function fecha_programada_inicial($groupid)
    {
        return $this->get_fecha_unidad($groupid, 'first', 'fprogramada');
    }
    
    public function fecha_programada_final($groupid)
    {
        return $this->get_fecha_unidad($groupid, 'last', 'fprogramada');
    }
    
    public function fecha_real_inicial($groupid)
    {
        return $this->get_fecha_unidad($groupid, 'first', 'freal');
    }
    
    public function fecha_real_final($groupid)
    {
        return $this->get_fecha_unidad($groupid, 'last', 'freal');
    }
    
    public function fecha_unidad($groupid)
    {
        $fecha = $this->fecha_real_final($groupid);
        if($fecha !== false)
            return userdate($fecha, '%d/%m/%Y');
        
        return '<br>';
    }

    public function fecha_periodo($groupid)
    {
        $fecha_ini = $this->fecha_real_inicial($groupid);
        $fecha_fin = $this->fecha_real_final($groupid);
        if($fecha_ini !== false)
            return userdate($fecha_ini, '%d/%m/%Y') . ' al ' . userdate($fecha_fin, '%d/%m/%Y');

        return '<br>';
    }    
}

?>
