<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of libsesiones
 *
 * @author francisco
 */

require_once ($CFG->libdir . '/itse/lib.php');

define('SESIONESCLASE_TODAS', 0);
define('SESIONESCLASE_CALIFICABLES', 1);


class Sesiones
{
    private $course;
    private $unidad;
    private $sesiones;
    private $actividades;
    
    public function __construct($course, $unidad)
    {
        $this->course = $course;
        $this->unidad = $unidad;
        $this->sesiones = null;
        $this->load_all_sessions();
        $this->load_all_activities();
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
        
    public function get_sesiones($groupid)
    {
        $sesiones = array();
        $fecha = 'freal';
        $fechaanterior = 0;
        
        foreach ($this->sesiones as $sesionclase)
        {
            $programacion = $sesionclase->programacion($groupid);
            if($programacion != null)
            {
                if(!$sesionclase->compare_fecha($fechaanterior, $programacion->$fecha, array('yday')))
                {
                    $sesiones[] = $sesionclase;
                    $fechaanterior = $programacion->$fecha;
                }
                else if($fechaanterior == 0)
                {
                    $sesiones[] = $sesionclase;
                }
            }
        }
        return $sesiones;
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
