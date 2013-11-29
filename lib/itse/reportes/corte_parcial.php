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
//require_once ('../../../config.php');
require_once($CFG->libdir . '/itse/reportes/base.php');
require_once($CFG->libdir . '/itse/libunidades.php');
require_once($CFG->libdir . '/itse/libsesiones.php');
require_once($CFG->libdir . '/itse/cortes/lib.php');
require_once($CFG->libdir . '/itse/cortes/romanos.php');
require_once($CFG->libdir . '/moodlelib.php');

class reporte_corte_parcial extends reporte_base
{
    protected $nu_carrera;
    protected $cursos;
    protected $numero;
    protected $periodo;
    protected $total_cortes;
    protected $desertores;
    
    /*
     * Constructor de la clase para generar la lista de calificaciones y asistencias
     * 
     * @param int $id id del curso en la tabla {course}
     * @param int $groupid id del grupo del cual se va a generar el reporte. Se obtiene en la tabla {groups}
     * @param int $nu_unidad numero de la unidad que se va a generar el reporte
     */
    public function __construct($course, $nu_carrera, $numero, $desertores)
    {
        global $CFG, $DB;
        parent::__construct($course);

        $this->nu_carrera = $nu_carrera;
        $this->numero = $numero;
        $this->desertores = $desertores;
        $curso = get_fast_modinfo($course);
        $seccion = $curso->get_section_info(0);
        $unidad = $DB->get_record('course_unidades', array('nu_curso' => $course, 'id' => $seccion->id, 'nu_unidad' => 0));
        $this->periodo = $unidad->nu_periodo;
        $this->total_cortes = 5;
        $this->codigo = ' ITSE-AC-PO-003-04';
        $this->prenombreDoc = 'Nombre del Documento: ';
        $this->nombreDocumento = 'Formato para el Reporte Parcial y final de semestre';
        $this->revision = '0';
        $this->normaISO = 'Referencia a la Norma ISO 9001-2008<br>7.1, 7.2.1, 7.5.1, 7.6, 8.1, 8.2.4';
        $this->prefijoArchivo = 'CorteParcial-';
        $this->stylesheet = file_get_contents($CFG->libdir . '/itse/stylecortes.css');
        $this->obtener_cursos();
    }
  
    public function generar()
    {
        ini_set('max_execution_time', 300);
        $html = $this->caratula();
        $html .= $this->desglose();
        $html .= $this->explicacion();
        $html .= $this->firma();
        
        return $html;
    }

    public function descargar()
    {
        ini_set('max_execution_time', 300);
        $carrera = $this->nombre_carrera();
        $periodo = $this->periodo($this->periodo);
        $fullname = "Numero_$this->numero" . "-$carrera-$periodo-" . $this->docente->lastname . ' ' .$this->docente->firstname;
        $downloadfilename = clean_filename("$this->prefijoArchivo$fullname.pdf");
        $documento = new mPDF('utf-8', 'LETTER', 8, '', 15, 15, 30, 15, 10, 10);
        $documento->WriteHTML($this->stylesheet, 1);
        
        $documento->SetHTMLHeader($this->encabezado());
        $documento->SetHTMLFooter($this->pie_pagina());
        $documento->WriteHTML('<body>');
        $documento->WriteHTML($this->generar());
        $documento->WriteHTML('</body>');

        $documento->Output($downloadfilename, 'D');
        exit;
    }

    protected function nombre_carrera()
    {
        $contextcat = context_coursecat::instance($this->nu_carrera);
        return format_string($contextcat->get_context_name(false), true, array('context' => $contextcat));
    }

    protected function caratula()
    {
        $html = '<h1>INSTITUTO TECNOLÓGICO SUPERIOR DE ESCÁRCEGA</h1>';
        $html .= '<h1>SUBDIRECCIÓN ACADÉMICA</h1>';
        $carrera = strtoupper($this->nombre_carrera());
        $periodo = $this->periodo($this->periodo);
        $docente = strtoupper($this->docente->firstname . ' ' . $this->docente->lastname);
        $html .= "<h2>COORDINACIÓN DE $carrera</h2>";
        
        $style = "style='background-color: gray;'";
        
        $html .= "
            <table>
                <tbody>
                    <tr>
                        <td class='sinborde' style='width: 15%;'>REPORTE PARCIAL</td>";
        for($i = 1; $i <= $this->total_cortes; $i++)
        {
            if($i == $this->numero)
                $html .= "<td $style>" . ($i == $this->total_cortes ? 'F': $i) . "</td>";
            else
                $html .= "<td>" . ($i == $this->total_cortes ? 'F': $i) . "</td>";
            $html .= "<td class='sinborde'><br></td>";
        }
        $html .= "<td class='sinborde' style='width: 15%;'>DEL SEMESTRE:</td>";
        $html .= "<td class='sinborde' style='border-bottom: 1px solid black;'>$periodo</td>";
        
        $html .= "</tr>
                </tbody>
            </table>";
        
        $html .= "
            <table>
                <tbody>
                    <tr>
                        <td class='sinborde'>Docente:</td>
                        <td class='sinborde' style='border-bottom: 1px solid black;'>$docente</td>
                    </tr>
                </tbody>
            </table>";
        $nu_materias = $this->nu_asignaturas_diferentes();
        $nu_grupos = $this->nu_grupos_atentidos();
        
        $html .= "
            <table>
                <tbody>
                    <tr>
                        <td class='sinborde' style='width: 18%;'>No de Grupos Atendidos:</td>
                        <td class='sinborde' style='border-bottom: 1px solid black;'>$nu_grupos</td>
                        <td class='sinborde' style='width: 5%;'><br></td>
                        <td class='sinborde' style='width: 20%;'>No de Asignaturas diferentes</td>
                        <td class='sinborde' style='border-bottom: 1px solid black;'>$nu_materias</td>
                    </tr>
                </tbody>
            </table>";

        return $html;
    }
    
    protected function desglose()
    {
        $desglose = $this->desglose_cursos();
        $html = "
        <table>
            <thead>
                <tr>
                    <td rowspan='2'>ASIGNATURA</td>
                    <td rowspan='2'>UNIDAD<br>/<br>SEMESTRE</td>
                    <td rowspan='2'>CARRERA</td>
                    <td rowspan='2'>A</td>
                    <td colspan='3'>B</td>
                    <td>C</td>
                    <td>D</td>
                    <td>E</td>
                    <td>F</td>
                    <td>G</td>
                </tr>
                <tr>
                    <td>EP<br>O</td>
                    <td>ES<br>R</td>
                    <td>E</td>
                    <td><br></td>
                    <td><br></td>
                    <td><br></td>
                    <td><br></td>
                    <td><br></td>
                </tr>
             </thead>
             <tbody>
                $desglose
             </tbody>
             <tfoot>
                <tr>
                    <td>TOTAL</td>
                    <td><br></td>
                    <td><br></td>
                    <td><br></td>
                    <td><br></td>
                    <td><br></td>
                    <td><br></td>
                    <td><br></td>
                    <td><br></td>
                    <td><br></td>
                    <td><br></td>
                    <td><br></td>
                </tr>
             </tfoot>
        </table>";
        
        return $html;
    }
    
    protected function desglose_cursos()
    {
        $html = '';
        $carrera = $this->nombre_carrera();
        foreach ($this->cursos as $curso)
        {
            if($curso->unidad->nu_periodo == $this->periodo)
            {
                $nombre = $curso->fullname;
                $modinfo = get_fast_modinfo($curso);
                $sections = $modinfo->get_section_info_all();
                $groups = groups_get_all_groups($curso->id);
                foreach ($groups as $grupo)
                {
                    $generador = new Generador_Cortes($this->docente->id, $this->nu_carrera, $this->periodo, $this->numero);
                    $total = $generador->total_alumnos($curso->id, $grupo->id);
                    $nombre_grupo = groups_get_group_name($grupo->id);
                    $semestre = $this->semestre($nombre_grupo);
                    foreach ($sections as $section)
                    {
                        if($section->section == 0)
                            continue;
                        $unidad = new Unidad($curso->id, $section->id);
                        $romano = new romanos($unidad->nu_unidad);
                        $unidad_romano = $romano->getRomano();
                        if($unidad->concluida($grupo->id) && $section->section > 1)
                        {
                            $aprobados = $generador->total_alumnos_aprobados($curso->id, $grupo->id, $unidad->nu_unidad);
                            $porcentaje = format_float(($aprobados / $total) * 100, 0);
                            $html .= "
                                <tr>
                                    <td>$nombre<br>$nombre_grupo</td>
                                    <td>$unidad_romano/$semestre</td>
                                    <td>$carrera</td>
                                    <td>$total</td->
                                    <td>$aprobados<br>$porcentaje %</td->
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                </tr>
                                ";
                        }
                        else if($unidad->nu_unidad == -1)
                        {
                            $html .= "
                                <tr>
                                    <td>$nombre<br>$nombre_grupo</td>
                                    <td>--/$semestre</td>
                                    <td>$carrera</td>
                                    <td>$total</td->
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                </tr>
                                ";
                        }
                    }
                }
            }
        }
        
        return $html;
    }
    
    protected function semestre($grupo)
    {
        return preg_replace("/[^0-9]/", "", $grupo);
    }

    protected function nu_grupos_atentidos()
    {
        $grupos = $this->grupos_cursos_atentidos();
//        return print_r($grupos, true);
        return count($grupos);
    }
    
    protected function grupos_cursos_atentidos()
    {
        $grupos = array();
        foreach ($this->cursos as $curso)
        {
            if($curso->unidad->nu_periodo == $this->periodo)
            {
                $groups = groups_get_all_groups($curso->id);
                foreach ($groups as $grupo)
                {
                    $nombre = str_ireplace(' ', '', str_ireplace('-', '', strtoupper($grupo->name)));
                    if(!array_key_exists($nombre, $grupos))
                    {
                        $cursos = array();
                        $cursos[$curso->id] = $grupo->id;
                        $grupos[$nombre] = $cursos;
                    }
                    else
                    {
                        $grupos[$nombre][$curso->id] = $grupo->id;
                    }
                }
            }
        }
        
//        return print_r($grupos, true);
        return $grupos;
    }

    protected function nu_asignaturas_diferentes()
    {
        $claves = array();
        
        foreach ($this->cursos as $curso)
        {
            if($curso->unidad->nu_periodo == $this->periodo)
                $claves[$curso->unidad->clave] = "$curso->id -> $curso->fullname";
        }
        
//        return print_r($claves, true);
        return count($claves);
    }
    
    protected function obtener_cursos()
    {   
        global $DB;
        $cursos = get_courses($this->nu_carrera);
        foreach ($cursos as $curso)
        {
            $usuarios = new Usuarios($curso->id);
            $docentes = $usuarios->get_docentes();
            if(array_key_exists($this->docente->id, $docentes))
            {
                if($curso->visible != 0)
                {
                    $modinfo = get_fast_modinfo($curso->id);
                    $seccion = $modinfo->get_section_info(0);
                    $unidad = $DB->get_record('course_unidades', array('id' => $seccion->id, 'nu_curso' => $curso->id));
                    $curso->unidad = $unidad;
                    if($unidad->nu_periodo == $this->periodo)
                        $this->cursos[$curso->id] = $curso;
                }
            }
        }
    }
    
    protected function coordinador()
    {
        $coordinadores = $this->usuarios->get_coordinador();
        $coordinador = null;
        foreach ($coordinadores as $datos)
        {
            $coordinador = $datos;        
            break;
        }
        return $coordinador != null ? "$coordinador->firstname $coordinador->lastname": '<br>';
    }

    protected function explicacion()
    {
        return '<br>
        <p>A = TOTAL DE ESTUDIANTES POR MATERIA</p>
        <p>B = NO. DE ESTUDIANTES QUE ALCANZARON LAS COMPETENCIAS (EP= EVALUACIÓN DE PRIMERA OPORTUNIDAD, ES=
        EVALUACIÓN DE SEGUNDA OPORTUNIDAD) (O=ORDINARIO, R= REGULARIZACIÓN, E= EXTRAORDINARIO)</p>
        <p>C = % DE ESTUDIANTES QUE ALCANZARON LAS COMPETENCIAS EN AMBAS OPORTUNIDADES (EP+ES) (O+R+E)</p>
        <p>D = NO. DE ESTUDIANTES QUE NO ALCANZARON LAS COMPETENCIAS EN AMBAS OPORTUNIDADES</p>
        <p>E = % DE ESTUDIANTES QUE NO ALCANZARON LAS COMPETENCIAS EN AMBAS OPORTUNIDADES</p>
        <p>F = NO. DE ESTUDIANTES QUE DESERTARON DURANTE EL SEMESTRE EN LA MATERIA</p>
        <p>G = % DE ESTUDIANTES QUE DESERTARON EN LA MATERIA</p>
        <br>
        <p>NOTAS<p>
        <ol>
            <li>La sumatoria de todas las columnas C+E+G deberá dar el 100%</li>
            <li>Los/las ESTUDIANTES que se incluirán incluirá en le columna D son todos los/las estudiantes no acreditados incluyendo los/las desertores/as</li>
            <li>Este registro deberá de acompañarse con sus respectivas listas de calificaciones que avalen los datos presentados</li>
        </ol>
        
        <p>* Este registro deberá de acompañarse con sus respectivas listas de calificaciones que avalen los datos presentados.</p>
        <br>
        ';
    }
    
    protected function firma()
    {
        $coordinador = $this->coordinador();
        $contextcat = context_coursecat::instance($this->nu_carrera);
        $carrera = strtoupper(format_string($contextcat->get_context_name(false), true, array('context' => $contextcat)));
        
        $html = '<table>
            <tbody>
                <tr>
                    <td class="sinborde" style="text-align: center; border-bottom: 1px solid black; width: 45%;">
                        DOCENTE
                    </td>                    
                    <td class="sinborde" style="width: 10%;"><br></td>
                    <td  class="sinborde" style="text-align: center; border-bottom: 1px solid black;">
                        COORDINADOR DE LA CARRERA DE ' . $carrera . '
                    </td>
                </tr>
                <tr>
                    <td  class="sinborde" style="text-align: center;">
                        ' . $this->docente->firstname . ' '  .$this->docente->lastname . '
                    </td>                    
                    <td class="sinborde"><br></td>
                    <td class="sinborde" style="text-align: center;"><p>' . $coordinador . '</td>
                </tr>
            </tbody>
        </table>';
        
        return $html;
    }
}

?>
