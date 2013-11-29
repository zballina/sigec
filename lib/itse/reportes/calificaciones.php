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
require_once($CFG->libdir . '/itse/lib.php');
require_once($CFG->libdir . '/moodlelib.php');

class reporte_calificaciones extends reporte_base
{
    protected $unidad;
    protected $docente;
    
    /*
     * Constructor de la clase para generar la lista de calificaciones y asistencias
     * 
     * @param int $id id del curso en la tabla {course}
     * @param int $groupid id del grupo del cual se va a generar el reporte. Se obtiene en la tabla {groups}
     * @param int $nu_unidad numero de la unidad que se va a generar el reporte
     */
    public function __construct($id, $groupid, $nu_unidad)
    {
        global $CFG;
        parent::__construct($id);

        $this->groupid = $groupid;
        $modinfo = get_fast_modinfo($this->course);
        $section = $modinfo->get_section_info($nu_unidad);
        $this->unidad = new Unidad($this->course->id, $section->id);
        $this->codigo = 'ITSE-AC-PO-003-10';
        $this->prenombreDoc = '';
        $this->nombreDocumento = 'INSTITUTO TECNOLÓGICO SUPERIOR DE ESCÁRCEGA';
        $this->revision = '0';
        $this->normaISO = 'LISTA DE ASISTENCIA Y CALIFICACIONES POR COMPETENCIAS';
        $this->prefijoArchivo = 'Calificaciones-';
        $this->stylesheet = file_get_contents($CFG->libdir . '/itse/stylecalif.css');
    }

    public function generar()
    {
        return '';
    }
  
    public function descargar()
    {
        $fullname = format_string($this->course->fullname, true, array('context' => context_course::instance($this->course->id)));
        $nombre_grupo = $this->nombre_grupo();
        $downloadfilename = clean_filename("$this->prefijoArchivo$fullname-$nombre_grupo.pdf");
        // Creating a document
        $documento = new mPDF('utf-8', 'LETTER', 8, '', 15, 15, 30, 15, 10, 10);
        $documento->WriteHTML($this->stylesheet, 1);
        
        $documento->SetHTMLHeader($this->encabezado());
        $documento->SetHTMLFooter($this->pie_pagina());
        $documento->AddPage();
        $documento->WriteHTML('<body>');
        $documento->WriteHTML($this->caratula());
        $documento->WriteHTML($this->desglose());
        $documento->WriteHTML($this->firma());
        $documento->WriteHTML('</body>');

        $documento->Output($downloadfilename, 'D');
        exit;
    }

    protected function caratula()
    {
        $asignatura = format_string($this->course->fullname, true, array('context' => context_course::instance($this->course->id)));;
        $grupo = $this->nombre_grupo();
        $fecha = $this->unidad->fecha_unidad($this->groupid);
        $fecha_periodo = $this->unidad->fecha_periodo($this->groupid);
        $nu_unidad = $this->unidad->nu_unidad;
        $section = get_fast_modinfo($this->course->id)->get_section_info(0);
        $unidad = new Unidad($this->course->id, $section->id);
        $periodo = $this->periodo($unidad->nu_periodo);
        if($this->docente != null)
            $docente = $this->docente->firstname . ' '  .$this->docente->lastname;
        else
            $docente = '<br>';
        $item = "<table style='width: 100%;'>
            <tr>
                <td style='width: 11%;'>ASIGNATURA:</td>
                <td style='width: 50%; border-bottom: 1px solid black;'>$asignatura</td>
                <td style='width: 8%;'>GRUPO:</td>
                <td style='border-bottom: 1px solid black;'>$grupo</td>
                <td style='width: 6%;'>UNIDAD:</td>
                <td style='border-bottom: 1px solid black; text-align: center;'>$nu_unidad</td>
            </tr>
            <tr>
                <td>CATEDRÁTICO:</td>
                <td style='border-bottom: 1px solid black;'>$docente</td>
                <td>PERIODO<br>ESCOLAR:</td>
                <td colspan='3' style='border-bottom: 1px solid black;'>$periodo</td>
            </tr>
            <tr>
                <td>PERIODO<br>DE UNIDAD:</td>
                <td style='border-bottom: 1px solid black;'>$fecha_periodo</td>
                <td>FECHA:</td>
                <td colspan='3' style='border-bottom: 1px solid black;'>$fecha</td>
            </tr>
        </table>";
        
        return $item;
    }
    
    protected function firma()
    {
        $html = "<table>
            <tr>
                <td style='width: 7%;'><br></td>
                <td style='border-bottom: 1px solid black;'>CATEDRÁTICO</td>
                <td><br></td>
            </tr>
            <tr>
                <td style='width: 7%;'><br></td>
                <td style='font-size: 7pt;'>
                    <br>
                    * LAS CALIFICACIONES SON DEL 0 AL 100 SIN UTILIZAR DECIMALES
                    <br>
                    * LA FIRMA DE CATEDRÁTICO CERTIFICA LAS CALIFICACIONES EXPEDIDAS EN ESTE DOCUMENTO
                </td>
                <td style='width: 20%;'><br></td>
            </tr>
        </table>";
        
        return $html;
    }
    
    private function dia($dia)
    {
        switch ($dia)
        {
            case 1:
                return 'L';
            case 2:
                return 'M';
            case 3:
                return 'M';
            case 4:
                return 'J';
            case 5:
                return 'V';
            case 6:
                return 'S';
            case 7:
                return 'D';
            default:
                return '<br>';
        }
    }

    protected function desglose()
    {
        $fseleccionada = 'fprogramada';
        $filas = 2;
        $categoria = $this->get_categoria();
        $alumnos = $this->usuarios->get_alumnos($this->groupid);
        $sesiones = $this->unidad->get_sesiones($this->groupid);
        $actividades = $this->unidad->get_actividades();
        $nu_sesiones = count($sesiones);
        $html = "<table>
            <thead>
                <tr>
                    <td rowspan='3' style='width: 3%;'>No.</td>
                    <td rowspan='3'>Matrícula</td>
                    <td rowspan='3'>Nombre</td>
                    <td colspan='$nu_sesiones'>Asistencias</td>
                    <td><br></td>
                </tr>
                <tr>";
        foreach ($sesiones as $sesion)
        {
            $programacion = $sesion->programacion($this->groupid);
            if($programacion != null)
            {
                $fecha = $programacion->$fseleccionada > 0 ? usergetdate($programacion->$fseleccionada): null;
                $fdia = $fecha != null ? $this->dia($fecha['wday']): '<br>';
                $html .= "<td style='width: 4%;'>$fdia</td>";
            }
            else
            {
                $html .= "<td><br></td>";                
            }
        }
        $html .= "<td>TOTAL</td>
                </tr>
                <tr>";
        foreach ($sesiones as $sesion)
        {
            $programacion = $sesion->programacion($this->groupid);
            if($programacion != null)
            {
                $fecha = $programacion->$fseleccionada > 0 ? usergetdate($programacion->$fseleccionada): null;
                $fdia = $fecha != null ? $fecha['mday']: '<br>';
                $html .= "<td>$fdia</td>";
            }
            else
            {
                $html .= "<td><br></td>";                
            }
        }
        $html .= "<td>100%</td>
                </tr>
                <tr>";
        $html .= "</thead>
            <tbody>";
        $cantidad = 1;

        $total = 0;
        foreach ($alumnos as $alumno)
        {
            $nombre = strtoupper("$alumno->lastname $alumno->firstname");
            $html .= '<tr>';
            $html .= "<td>$cantidad</td>";
            $html .= "<td class='alumnosmatricula'>$alumno->username</td>";
            $html .= "<td class='alumnos'>$nombre</td>";
            $total_alumno = 0;
            foreach ($actividades as $actividad)
            {
                if(Sesiones::modulo_calificable_valido($actividad->modulename()))
                {
                    $cal = $this->calificacion_alumno($alumno->id, $actividad->modulename(), $actividad->sesionclaseid());
                    $total_alumno += $cal;
                }
            }
            foreach ($sesiones as $sesion)
            {
                $asistencias = $sesion->asistencias($this->groupid);
                $estado = $this->estado_asistencia($asistencias[$alumno->id]->asistencia->asistio);
                $html .= "<td>$estado</td>";
            }            
            $calificacion_cat = $this->get_calificacion_categoria($alumno->id, $categoria->id);
            if($calificacion_cat['overridden'] == 0)
            {
                $total_alumno = format_float($total_alumno, 0);
            }
            else
            {
                $total_alumno = format_float($calificacion_cat['grade'], 0);
            }
            
            $total += $total_alumno;
            // Aqui va la calificacion del alumno
            $color = $total_alumno < 70 ? 'red': 'black';
            $color = "style='text-align: right; color: $color;'";
            $html .= "<td $color>$total_alumno</td>";
            $html .= '</tr>';
            $cantidad++;
        }
        
        for($i = $cantidad; $i <= ($cantidad + $filas); $i++)
        {
            $html .= '<tr>';
            for($j = 0; $j < $nu_sesiones + 4; $j++)
            {
                if($j == 0)
                    $html .= "<td>$i</td>";
                else
                    $html .= "<td><br></td>";
            }
            $html .= '</tr>';
        }
        $html .= "</tbody>
            <tfoot>
                <tr>";
        for($j = 0; $j < $nu_sesiones + 1; $j++)
        {
            if($j == 0)
                $html .= "<td>$i</td>";
            else if($j == ($nu_sesiones - 1))
                $html .= "<td colspan='4' style='background-color: lightgray;'>TOTAL</td>";
            else if($j == ($nu_sesiones))
                $html .= "<td style='text-align: right;'>$total</td>";
            else
                $html .= "<td><br></td>";
        }
        $html .= "</tr>
                </tfoot>
            </table>";
        return $html;
    }
    
    protected function get_categoria()
    {
        $coursecat = grade_category::fetch_course_category($this->course->id);

        // Categorias
        $categorias = grade_category::fetch_all(array('courseid' => $this->course->id, 
            'parent' => $coursecat->id, 'type' => 'category'));
        $categoria = null;
        foreach ($categorias as $valor)
        {
            $fullname = strtolower($valor->fullname);
            $split = explode(' ', $fullname);
            if($split[1] == $this->unidad->nu_unidad)
            {
                $categoria = $valor;
                break;
            }
        }
        return $categoria;
    }
    
    protected function get_calificacion_categoria($userid, $categoryid)
    {
//        global $CFG;
        $grades = grade_get_grades($this->course->id, 'category', null, $categoryid, $userid);
//        $handle = fopen($CFG->dataroot . '/catcalif' . $userid, 'w+');

        foreach ($grades->items as $item)
        {
            if($item->grades != null)
            {
                $cal = $item->grades[$userid];
                $resultado = array('grade' => $cal->grade != null ? $cal->grade: 0, 'overridden' => $cal->overridden != null? $cal->overridden: 0);
//                fwrite($handle, "Calificacion categoria usuario | " . print_r($resultado, true));
//                fwrite($handle, "Calificacion categoria usuario | " . print_r($cal, true));
//                fwrite($handle, "\nCalificacion categoria | " . print_r($grades, true));
//                fclose($handle);
                return $resultado;
            }
        }
//        fclose($handle);
        return array('grade' => null, 'overridden' => 0);
    }    
    
    protected function calificacion_alumno($userid, $modulename, $sesionclaseid)
    {
        global $CFG;
        $grades = grade_get_grades($this->course->id, 'mod', $modulename, $sesionclaseid, $userid);
        $handle = fopen($CFG->dataroot . '/calif' . $userid, 'w+');
        fwrite($handle, "$modulename $sesionclaseid $userid | " . print_r($grades, true));
        fclose($handle);

        $objeto = $grades->items[0];
        $cal = $objeto->grades[$userid];
        
        $categoria = $this->get_categoria();
        $handle = fopen($CFG->dataroot . '/categorias', 'w+');
        fwrite($handle, "Categorias | " . print_r($categoria, true));
        fclose($handle);
        
        return $cal->grade != null ? $cal->grade: 0;
    }
    
    protected function estado_asistencia($estado)
    {
        if(!isset($estado))
            return '/';
        switch ($estado)
        {
            case ASISTENCIA_ALUMNO_NO:
                return '/';
            case ASISTENCIA_ALUMNO_ASISTIO:
                return '·';
            case ASISTENCIA_ALUMNO_JUSTIFICACION:
                return 'J';
            case ASISTENCIA_ALUMNO_RETARDO:
                return 'R';
            default:
                return 'N/A';
        }
    }
}

?>
