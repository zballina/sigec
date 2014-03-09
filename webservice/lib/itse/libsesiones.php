<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of libsesiones
 *
 * @author francisco ballina
 */

require_once ($CFG->libdir . '/itse/libsesionclase.php');

define('SESIONESCLASE_TODAS', 0);
define('SESIONESCLASE_CALIFICABLES', 1);
define('SESIONESCLASE_CALIFICABLES_MOODLE', 1);


class Sesiones
{
    private $course;
    private $unidad;
    private $sesiones;
    private $actividades;
    private $cms;
    
    public function __construct($course, $unidad)
    {
        $this->course = $course;
        $this->unidad = $unidad;
        $this->sesiones = null;
        $this->cms = null;
        $this->actividades = null;
        $this->load_all_sessions();
        $this->load_all_activities();
        $this->load_cms();
    }

    public static function modulo_valido($modulename)
    {
        foreach (SesionClase::nombre_modulos() as $m)
        {
            if($modulename == $m)
                return true;
        }
        return false;
    }
        
    public static function modulo_calificable_valido($modulename)
    {
        foreach (SesionClase::nombre_modulos_calificables() as $m)
        {
            if($modulename == $m)
                return true;
        }
        return false;
    }
        
    public static function modulo_calificable_valido_moodle($modulename)
    {
        foreach (SesionClase::nombre_modulos_calificables_moodle() as $m)
        {
            if($modulename == $m)
                return true;
        }
        return false;
    }

    public function get_sesiones($groupid, $filtrarFechasIguales = false)
    {
        $sesiones = array();
        
        foreach ($this->sesiones as $sesionclase)
        {
            $programacion = $sesionclase->programacion($groupid);
            if($programacion != null)
            {
                if($filtrarFechasIguales)
                {
                    $array_dia = usergetdate($programacion->fprogramada);
                    $dia = $array_dia['yday'];
                    if(array_key_exists($dia, $sesiones))
                    {
                        if($sesiones[$dia]->programacion($groupid)->freal == null)
                        {
                            $sesiones[$dia] = $sesionclase;
                        }
                    }
                    else 
                    {
                        $sesiones[$dia] = $sesionclase;
                    }
                }
                else
                {
                    $sesiones[] = $sesionclase;
                }
            }
        }
        
        return $sesiones;
    }

    public function get_cms()
    {
        return $this->cms;
    }

    public function get_all_sesiones()
    {
        return $this->sesiones;
    }

    public function get_actividades()
    {
        return $this->actividades;
    }

    private function load_all_sessions()
    {
        if($this->sesiones == null)
        {
            $cm = get_fast_modinfo($this->course);
            $this->sesiones = array();
            foreach ($cm->get_cms() as $value)
            {
                if($this->unidad == $value->sectionnum && Sesiones::modulo_valido($value->modname) == true)
                {
                    $sesionclase = new SesionClase($value->instance, $value->modname, $value->id);
                    $this->sesiones[] = $sesionclase;
                }
            }
        }
    }

    private function load_cms()
    {
        if($this->cms == null)
        {
            $cm = get_fast_modinfo($this->course);
            $this->cms = array();
            foreach ($cm->get_cms() as $value)
            {
                if($this->unidad == $value->sectionnum)
                {
                    if(Sesiones::modulo_valido($value->modname) == true)
                    {
                        $sesionclase = new SesionClase($value->instance, $value->modname, $value->id);
                        $this->cms[] = $sesionclase;
                    }
                    else if(Sesiones::modulo_calificable_valido_moodle($value->modname) == true)
                    {
                        $this->cms[] = $value;
                    }
                }
            }
        }
    }

    private function load_all_activities()
    {
        if($this->actividades == null)
        {
            $cm = get_fast_modinfo($this->course);
            $this->actividades = array();
            foreach ($cm->get_cms() as $value)
            {
                if($this->unidad == $value->sectionnum && Sesiones::modulo_calificable_valido($value->modname) == true)
                {
                    $sesionclase = new SesionClase($value->instance, $value->modname, $value->id);
                    $this->actividades[] = $sesionclase;
                }
            }
        }
    }
}

?>
