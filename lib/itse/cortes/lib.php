<?php

require_once($CFG->libdir . '/moodlelib.php');

class Generador_Cortes
{
    private $nu_carrera;
    private $cursos;
    private $docente;
    private $nu_periodo;
    private $corte;
    
    /**
     * Constructor de la clase. Asocia una la sección del curso con una unidad
     *
     * @param stdClass $c The course entry from DB
     * @param stdClass $section The course_section entry from DB
     */
    public function __construct($docente, $carrera, $periodo, $corte)
    {
        global $DB;

        $this->nu_carrera = $carrera;
        $this->docente = $docente;
        $this->nu_periodo = $periodo;
        $this->corte = $corte;
        $this->obtener_cursos();
    }
    
    protected function obtener_cursos()
    {   
        global $DB;
        $cursos = get_courses($this->nu_carrera);
        foreach ($cursos as $curso)
        {
            $usuarios = new Usuarios($curso->id);
            $docentes = $usuarios->get_docentes();
            if(array_key_exists($this->docente, $docentes))
            {
                if($curso->visible != 0)
                {
                    $modinfo = get_fast_modinfo($curso->id);
                    $seccion = $modinfo->get_section_info(0);
                    $unidad = $DB->get_record('course_unidades', array('id' => $seccion->id, 'nu_curso' => $curso->id));
                    $curso->unidad = $unidad;
                    if($unidad->nu_periodo == $this->nu_periodo)
                        $this->cursos[$curso->id] = $curso;
                }
            }
        }
    }
    
    protected function get_categoria($courseid, $nu_unidad)
    {
        $coursecat = grade_category::fetch_course_category($courseid);

        // Categorias
        $categorias = grade_category::fetch_all(array('courseid' => $courseid, 
            'parent' => $coursecat->id, 'type' => 'category'));
        $categoria = null;
        foreach ($categorias as $valor)
        {
            $fullname = strtolower($valor->fullname);
            $split = explode(' ', $fullname);
            if($split[1] == $nu_unidad)
            {
                $categoria = $valor;
                break;
            }
        }
        return $categoria;
    }

    
    protected function get_calificacion_categoria($courseid, $userid, $categoryid)
    {
        $grades = grade_get_grades($courseid, 'category', null, $categoryid, $userid);
        foreach ($grades->items as $item)
        {
            if($item->grades != null)
            {
                $cal = $item->grades[$userid];
                $resultado = array('grade' => $cal->grade != null ? $cal->grade: 0, 'overridden' => $cal->overridden != null? $cal->overridden: 0);
                return $resultado;
            }
        }
        return array('grade' => null, 'overridden' => 0);
    }    

    public function total_alumnos($course, $group)
    {
        $usuarios = new Usuarios($course);
        return $usuarios->cantidad_alumnos($group);
    }
    
    public function total_alumnos_aprobados($course, $group, $nu_unidad)
    {
        $categoria = $this->get_categoria($course, $nu_unidad);
        $usuarios = new Usuarios($course);
        $alumnos = $usuarios->get_alumnos($group);
        $modinfo = get_fast_modinfo($course);
        $section = $modinfo->get_section_info($nu_unidad);
        $unidad = new Unidad($course, $section->id);
        $actividades = $unidad->get_actividades();

        $aprobados = 0;
        foreach ($alumnos as $alumno)
        {
            $total_alumno = 0;
            foreach ($actividades as $actividad)
            {
                if(Sesiones::modulo_calificable_valido($actividad->modulename()))
                {
                    $cal = $this->calificacion_alumno($course, $alumno->id, $actividad->modulename(), $actividad->sesionclaseid());
                    $total_alumno += $cal;
                }
            }
            $calificacion_cat = $this->get_calificacion_categoria($course, $alumno->id, $categoria->id);
            if($calificacion_cat['overridden'] == 0)
            {
                $total_alumno = format_float($total_alumno, 0);
            }
            else
            {
                $total_alumno = format_float($calificacion_cat['grade'], 0);
            }
//            $total_alumno = format_float($total_alumno, 0);            

            $aprobados += $total_alumno < 70 ? 0: 1;
        }        
        return $aprobados;
    }

    protected function calificacion_alumno($course, $userid, $modulename, $sesionclaseid)
    {
        $grades = grade_get_grades($course, 'mod', $modulename, $sesionclaseid, $userid);

        $objeto = $grades->items[0];
        $cal = $objeto->grades[$userid];
        
        return $cal->grade != null ? $cal->grade: 0;
    }
    
}

?>
