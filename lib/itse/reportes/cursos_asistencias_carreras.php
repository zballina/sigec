<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reporte_planeacion
 *
 * @author francisco
 */
require_once ('../../../config.php');
require_once($CFG->libdir . '/itse/reportes/base.php');
require_once($CFG->libdir . '/itse/libunidades.php');
require_once($CFG->libdir . '/itse/libsesiones.php');
require_once($CFG->libdir . '/moodlelib.php');

class reporte_cursos_est_asistencias_carreras extends reporte_base
{
    protected $nu_carrera;
    protected $cursos;
    protected $docentes;
    /*
     * Constructor de la clase para generar la lista de calificaciones y asistencias
     * 
     * @param int $id id del curso en la tabla {course}
     * @param int $groupid id del grupo del cual se va a generar el reporte. Se obtiene en la tabla {groups}
     * @param int $nu_unidad numero de la unidad que se va a generar el reporte
     */
    public function __construct($carrera)
    {
        global $CFG;
        parent::__construct(1);

        $this->nu_carrera = $carrera;
        $this->groupid = 0;
        $this->codigo = '';
        $this->prenombreDoc = '';
        $this->nombreDocumento = 'INSTITUTO TECNOLÓGICO SUPERIOR DE ESCÁRCEGA';
        $this->revision = '0';
        $contextcat = context_coursecat::instance($carrera);
        $nombre = $contextcat->get_context_name();
        $this->normaISO = 'Informe de Asistencias por Grupos de la Carrera: <br>' . $nombre;
        $this->prefijoArchivo = 'AsistenciasGlobales-';
        $this->stylesheet = file_get_contents($CFG->libdir . '/itse/style.css');
        $this->cursos = get_courses($this->nu_carrera, 'fullname');
        $this->docentes = array();
        $this->obtener_docentes();
    }

    public function generar()
    {
        return '';
    }
  
    public function descargar()
    {
        $contextcat = context_coursecat::instance($this->nu_carrera);
        $nombre = $contextcat->get_context_name();
        $fullname = format_string($nombre, true, array('context' => $contextcat));
        $nombre_grupo = $this->nombre_grupo();
        $downloadfilename = clean_filename("$this->prefijoArchivo$fullname-$nombre_grupo.pdf");
        // Creating a document
        $documento = new mPDF('utf-8', 'LETTER', 8, '', 15, 15, 30, 15, 10, 10);
        $documento->WriteHTML($this->stylesheet, 1);
        
        $documento->SetHTMLHeader($this->encabezado());
        $documento->SetHTMLFooter($this->pie_pagina());
        $documento->WriteHTML('<body>');
        $documento->WriteHTML($this->desglose());
        $documento->WriteHTML('</body>');

        $documento->Output($downloadfilename, 'D');
        exit;
    }

    protected function desglose()
    {
        $html = "
            <table style='width: 100%;'>
                <thead>
                    <tr>
                        <td style='width: 20%;'>Docente</td>
                        <td style='width: 80%;'>Detalle</td>
                    </tr>
                </thead>
                <tbody>";
        foreach ($this->docentes as $docente)
        {
            $nombre = "$docente->lastname $docente->firstname";
            $html .= "
                    <tr>
                        <td>$nombre</td>
                        <td>" . $this->desglose_cursos($docente->cursos) . "</td>
                    </tr>";
        }
        $html .= "</tbody>
            </table>";
        return $html;
    }
    
    protected function curso($i, $courseid)
    {
        $curso = get_course($courseid);
        $asignatura = format_string($curso->fullname, true, array('context' => context_course::instance($courseid)));
        $periodo = $this->get_periodo_curso($courseid);
        $nu_unidades = $this->get_numero_unidades($courseid);
        $estado_unidades = $this->get_estado_curso($courseid);
        $modinfo = get_fast_modinfo($courseid);
        $grupos = groups_get_all_groups($courseid);
        $infog = '';
        
        foreach ($grupos as $grupo)
        {
            $miembros = groups_get_members($grupo->id);
            $cantidad = count($miembros);
            $infog .= "<p>Grupo: $grupo->name, Alumnos: $cantidad</p>";
            $programaciones = $this->get_numero_programaciones($courseid, $grupo->id);
            $asistencias = $this->get_numero_asistencias($courseid, $grupo->id);
            $infog .= "<p>Programación: $programaciones Asistencias: $asistencias</p>";
            $infog .= '<br>';
        }
        $actividades = $modinfo->get_cms();
        $actividades_programables = 0;
        
        foreach ($actividades as $actividad)
        {
            if(Sesiones::modulo_valido($actividad->modname))
                $actividades_programables++;
        }

        $actividades_calificables = 0;
        
        foreach ($actividades as $actividad)
        {
            if(Sesiones::modulo_calificable_valido($actividad->modname))
                $actividades_calificables++;
        }
        $cantidad_a = count($actividades);
        $html = "
            <tr>
                <td>$i</td>
                <td>$courseid</td>
                <td>$asignatura</td>
                <td>$periodo</td>
                <td>$nu_unidades</td>
                <td style='text-align: justify;'>$estado_unidades</td>
                <td style='text-align: justify;'>$infog</td>
                <td>$actividades_programables</td>
                <td>$actividades_calificables</td>
                <td>$cantidad_a</td>
            </tr>";
        
        return $html;
        
    }

    protected function desglose_cursos($cursos)
    {
        $html = "
            <table style='width: 900px;'>
                <thead>
                    <tr>
                        <td style='width: 2%;'>No.</td>
                        <td style='width: 3%;'>ID</td>
                        <td style='width: 21%;'>Materia</td>
                        <td style='width: 5%;'>Periodo</td>
                        <td style='width: 5%;'>Unidades</td>
                        <td style='width: 24%;'>Estado de<br>por Unidades</td>
                        <td style='width: 24%;'>Grupos</td>
                        <td style='width: 6%;'>Numero de<br>Actividades<br>en el curso<br>Programables</td>
                        <td style='width: 6%;'>Numero de<br>Actividades<br>en el curso<br>Calificables</td>
                        <td style='width: 10%;'>Numero de<br>Actividades<br>en el curso</td>
                    </tr>
                </thead>
                <tbody>";

        $i = 0;
        foreach ($cursos as $curso)
        {
            $i++;
            $html .= $this->curso($i, $curso->id);
        }
        $html .= '</tbody>
            </table>';
        return $html;
    }
    
    protected function obtener_docentes()
    {
        foreach ($this->cursos as $curso)
        {
            $usuarios = new Usuarios($curso->id);
            $docentes = $usuarios->get_docentes();
            foreach ($docentes as $docente)
            {
                if(!array_key_exists($docente->id, $this->docentes))
                {
                    $docente->cursos = array();
                    $docente->cursos[] = $curso;
                    $this->docentes[$docente->id] = $docente;
                }
                else
                {
                    $this->docentes[$docente->id]->cursos[] = $curso;
                }
            }
        }        
    }
    
    protected function get_numero_unidades($courseid)
    {
        global $DB;
        $numero = $DB->count_records_select('course_sections', 
            'course = :course AND visible = :visible AND section <> :section', 
            array('course' => $courseid, 'visible' => 1, 'section' => 0));

        return $numero;
    }
    
    protected function get_numero_programaciones($courseid, $groupid)
    {
        global $DB;
        $programaciones = $DB->count_records_select('sesionclase_programacion', 
            'course = :course and groupid = :groupid', 
            array('course' => $courseid, 'groupid' => $groupid));

        return $programaciones;
    }

    protected function get_numero_asistencias($courseid, $groupid)
    {
        global $DB;
        $asistencias = $DB->count_records_select('sesionclase_asistencias', 
            'course = :course and groupid = :groupid', 
            array('course' => $courseid, 'groupid' => $groupid));

        return $asistencias;
    }

    protected function get_periodo_curso($courseid)
    {
        global $DB;
        $curso = get_fast_modinfo($courseid);
        $seccion = $curso->get_section_info(0);
        $unidad = $DB->get_record_select('course_unidades', 
            'nu_curso = :course and id = :id and nu_unidad = :nu_unidad', 
            array('course' => $courseid, 'id' => $seccion->id, 'nu_unidad' => 0));

        if($unidad != null)
        {
            return $unidad->nu_periodo != null && $unidad->nu_periodo > 0 ? $this->periodo($unidad->nu_periodo): '<br>';
        }
        
        return '<br>';
    }    
    
    protected function get_estado_curso($courseid)
    {
        global $DB;
        $curso = get_fast_modinfo($courseid);
        $secciones = $curso->get_section_info_all();
        
        $html = '';
        foreach ($secciones as $seccion)
        {
            if(!$seccion->visible)
                continue;
            $unidad = $DB->get_record_select('course_unidades', 
                'nu_curso = :course and id = :id',
                    array('course' => $courseid, 'id' => $seccion->id));

            if($unidad != null)
            {
                $resultado = '';
                if($unidad->nu_unidad == 0)
                {
                    $valor = $this->get_estado($unidad->estado);
                    $resultado .= "<p>Caratula: $valor</p>"; 
                }
                else
                {
                    $valor = $this->get_estado($unidad->estado);
                    $resultado .= "<p>Unidad $unidad->nu_unidad:  $valor</p>"; 
                }
                $html .= $resultado;
            }
            
        }
        
        return $html;
    }
    
    private function get_estado($estado)
    {
        switch ($estado)
        {
            case PLANEACION_APROBADA:
                return 'Planeación Aprobada';
                break;
            case PLANEACION_ENVIADA:
                return 'Planeación Enviada';
                break;
            case PLANEACION_NOREALIZADA:
                return 'Planeación No Realizada';
                break;
            case PLANEACION_REALIZADA:
                return 'Planeación Realizada';
                break;
            case PLANEACION_RECHAZADA:
                return 'Planeación Rechazada';
                break;
            case PLANEACION_REVISADA:
                return 'Planeación Revisada';
                break;
            default:
                return '<br>';
        }
    }
}

?>
