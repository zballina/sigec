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
require_once($CFG->libdir . '/modinfolib.php');
require_once($CFG->libdir . '/gradelib.php');
require_once($CFG->libdir . '/moodlelib.php');

class reporte_planeacion extends reporte_base
{
    private $estado;
    public function __construct($id, $groupid)
    {
        parent::__construct($id);

        $this->groupid = $groupid;
        $this->codigo = 'ITSE-AC-PO-003-01';
        $this->nombreDocumento = 'Formato para la Planeación e Instrumentación Didáctica del Curso';
        $this->revision = '0';
        $this->normaISO = '<p>Referencia a la Norma ISO 9001:2008</p><p>7.1, 7.2.1, 7.5.1, 7.6, 8.1, 8.2.4</p>';
        $this->prefijoArchivo = 'Planeacion-';
        $this->estado = PLANEACION_NOREALIZADA;
    }

    public function descargar()
    {
        global $DB;
        $fullname = format_string($this->course->fullname, true, array('context' => context_course::instance($this->course->id)));
        $nombre_grupo = $this->nombre_grupo();
        $downloadfilename = clean_filename("$this->prefijoArchivo$fullname-$nombre_grupo.pdf");
        $documento = new mPDF('utf-8', 'LETTER-L', 8, '', 15, 15, 30, 15, 10, 10);
        $documento->WriteHTML($this->stylesheet, 1);
        
        $documento->SetHTMLHeader($this->encabezado());
        $documento->SetHTMLFooter($this->pie_pagina(false));
        $documento->AddPage();

        $documento->WriteHTML('<body>');        
        $rs = $DB->get_recordset('course_sections', array('course' => $this->course->id, 'visible' => '1'), 'section');
        
        foreach ($rs as $section) 
        {
            $unidad = new Unidad($this->course->id, $section->id);
            if($unidad->nu_unidad == 0)
            {
                $this->estado = $unidad->estado;
                $html = $this->caratula($unidad);
                $documento->WriteHTML($html);
            }
            else
            {
                $documento->AddPage();
                $html = $this->deglose_unidad($unidad);                
                $documento->WriteHTML($html);
            }
        }
        $rs->close();
                
        $documento->AddPage();
        $documento->WriteHTML($this->calendarizacion());
        
        $html = '</body>';
        $documento->WriteHTML($html);
        $documento->Close();
        $documento->Output($downloadfilename, 'D');
        exit;
    }

    protected function caratula(Unidad & $unidad)
    {
        $item = "<p style='text-align: center;'><b>Instituto Tecnológico Superior de Escárcega</b><br>";
        $item .= "Subdirección Académica<br>";
        $item .= "División de la Carrera de " . $this->carrera() . "<br>";
        $item .= "Instrumentación Didáctica para la Formación y el Desarrollo de Competencias<br>";
        $item .= "Del periodo " . $this->periodo($unidad->nu_periodo) . "<br>";
        $item .= "</p>";
        
        $item .= $this->encabezadoHojaUno($unidad->clave, $unidad->satca);
        $item .= $this->caracterizacionCompetencias($unidad->caracterizacion, $unidad->objetivocurso);
        
        return $item;
    }
    
    protected function calendarizacion()
    {
        global $CFG, $DB;
        $coordinador = $this->coordinador();
        $docente = $this->docente->firstname . ' ' . $this->docente->lastname;
        // Fecha preestablecida
        $fecha = userdate(make_timestamp(2014, 01, 23), '%d/%m/%Y');
        $filas = 3;
        $numero_semanas = 16;

        $imagen_evalDiagnostica = "<img src='" . $CFG->libdir . "/itse/reportes/triangulito.png' width='12px' height='12px'/>";
        $imagen_evalFormativa = "<img src='" . $CFG->libdir . "/itse/reportes/cuadrito.png' width='12px' height='12px'/>";
        $imagen_evalSumativa = "<img src='" . $CFG->libdir . "/itse/reportes/circulito.png' width='12px' height='12px'/>";

        $html = '
        <p style="text-align: justify; font-weight: bold;">V. Calendarización de evaluación</p>
        <table>
            <tbody>';

        $modinfo = get_fast_modinfo($this->course->id);
        $section = $modinfo->get_section_info(0);
        $car = new Unidad($this->course->id, $section->id);
        $semanas_efectivas = array();
        $rss = $DB->get_recordset('course_semanas_efectivas', array('nu_carrera' => $this->course->category, 'nu_periodo' => $car->nu_periodo), 'nu_semana');
        foreach ($rss as $semana) 
        {
            $semanas_efectivas[$semana->nu_semana] = $semana;
        }
        $rss->close();

        $rs = $DB->get_recordset('course_sections', array('course' => $this->course->id, 'visible' => '1'), 'section');
        $semanas_indicadores = array();
        foreach ($rs as $section) 
        {
            if($section->section == 0)
                continue;

            $unidad = new Unidad($this->course->id, $section->id);
            $sesiones = $unidad->get_actividades();
            $sesion = $sesiones[count($sesiones) - 1];
            if(Sesiones::modulo_calificable_valido($sesion->modname))
            {
                $programacion = $sesion->programacion($this->groupid);
                $array_dia = usergetdate($programacion->fprogramada);
                $fprogramada = make_timestamp($array_dia['year'], $array_dia['mon'], $array_dia['mday']);
                foreach ($semanas_efectivas as $semana)
                {
                    if($fprogramada >= $semana->fe_inicio && $fprogramada <= $semana->fe_final)
                        $semanas_indicadores[$semana->nu_semana] = true;
                }
            }
            else if(Sesiones::modulo_calificable_valido_moodle ($sesion->modname))
            {
                $modinfo = $DB->get_record($sesion->modname, array('course' => $this->course->id, 'id' => $sesion->instance), '*', MUST_EXIST);
                if($sesion->modname == 'assign')
                    $fecha = 'duedate';
                else if($sesion->modname == 'quiz')
                    $fecha = 'timeclose';
                $array_dia = usergetdate($modinfo->$fecha);
                $fprogramada = make_timestamp($array_dia['year'], $array_dia['mon'], $array_dia['mday']);
                
                foreach ($semanas_efectivas as $semana)
                {
                    if($fprogramada >= $semana->fe_inicio && $fprogramada <= $semana->fe_final)
                        $semanas_indicadores[$semana->nu_semana] = true;
                }
            }
        }
        $rs->close();        
        
        for($fila = 0; $fila < $filas; $fila++)
        {
            $html .= '<tr>';
            for($i = 0; $i <= $numero_semanas; $i++)
            {
                $html .= '<td style="border: 1px solid black;">';
                switch ($fila)
                {
                    case 0:
                        $html .= $i == 0 ? 'Semana': $i;
                        break;
                    case 1:
                        if($i == 0)
                            $html .= 'T.P.'; 
                        if ($i == 1)
                            $html .= $imagen_evalDiagnostica;
                        if ($i == 16)
                            $html .= $imagen_evalSumativa;
                        if($semanas_indicadores[$i] == true)
                            $html .= $imagen_evalFormativa;
                        else
                            $html .= '<br>';
                        break;
                    case 2:
                        $html .= $i == 0 ? 'T.R.': '<br>';
                        break;
                }
                $html .='</td>';
            }            
            $html .= '</tr>';
        }
        $html .= '</tbody>
        </table>';
        
        $html .="
            <table>
            <tbody>
                <tr>
                    <td style='width: 30px;'><br></td>
                    <td style='width: 30px;'>$imagen_evalDiagnostica</td>
                    <td>= Evaluación diagnostica</td>
                    <td style='width: 30px;'>$imagen_evalFormativa</td>
                    <td>=Evaluación formativa</td>
                    <td style='width: 30px;'>$imagen_evalSumativa</td>
                    <td>=Evaluación sumativa Evaluación ordinaria</td>
                    <td>T.P. = Tiempo Planeado</td>
                    <td>T.R. = Tiempo Real</td>
                </tr>                
            </tbody>
        </table>
        
        <table>
            <tbody>
                <tr>
                    <td style='text-align: right;'>Fecha de elaboración: </td>
                    <td style='border-bottom: 1px solid black; width: 30px;'>$fecha</td>
                </tr>                
            </tbody>
        </table>
        
        <table>
            <tbody>
                <tr>
                    <td style='text-align: center; border-bottom: 1px solid black; width: 45%;'>
                        $docente
                    </td>                    
                    <td style='width: 10%;'><br></td>
                    <td style='text-align: center; border-bottom: 1px solid black;'>Vo. Bo.</td>
                </tr>
                <tr>
                    <td style='text-align: center;'>Nombre y firma del Docente</td>                    
                    <td><br></td>
                    <td style='text-align: center;'><p>$coordinador</p><p>Coordinador de Carrera</p></td>
                </tr>
            </tbody>
        </table>";

        return $html;
    }

    protected function caracterizacionCompetencias($caracterizacion, $objetivocurso)
    {
        return "
            <table>
                <thead>
                    <tr>
                        <td class='encabezado'>" . get_string("caracterizacion", 'format_unidades'). "</td>" .
                    "</tr>
                </thead>
                <tbody>
                     <tr>
                        <td class='fuenteapoyo'>" . $caracterizacion . "</td>" .
                     "</tr>
                </tbody>
            </table>
            <table>
                <thead>
                    <tr>
                        <td class='encabezado'>" . get_string("objetivocurso", 'format_unidades'). "</td>" .
                    "</tr>
                </thead>
                <tbody>
                     <tr>
                        <td class='fuenteapoyo'>" . $objetivocurso . "</td>" .
                     "</tr>
                </tbody>
            </table>";
    }

    protected function encabezadoHojaUno($clave, $satca)
    {
        $nombre = $this->course->fullname . ' (' . $this->nombre_grupo() . ')';
        $html = '        
        <table>
            <tbody>
                <tr>
                    <td style="width: 17%; text-align: left;">
                        Nombre de la asignatura:
                    </td>
                    <td colspan="3" style="text-align: left;">' .
                       $nombre
                 . '</td>
                </tr>
                <tr>
                    <td>
                        Clave de la asignatura:
                    </td>
                    <td style="width: 17%; text-align: left;">' .
                        $clave
                 . '</td>
                    <td style="width: 25%; text-align: left;">
                        Horas teóricas- Horas prácticas- Créditos:
                    </td>
                    <td style="text-align: left;">' .
                        $satca
                 . '</td>
                </tr>
                <tr>
                    <td style="text-align: left;">
                        Número de Unidades: 
                    </td>
                    <td colspan="3" style="text-align: left;">' .
                        $this->numero_unidades()
                  . '</td>
                </tr>
                    
            </tbody>
        </table>';
        
        return $html;
    }
    
    protected function deglose_unidad(Unidad &$unidad)
    {
        $html = $this->encabezado_unidad($unidad);
        $html .= $this->desglose_actividades($unidad);
        $html .= $this->pie_unidad($unidad->fuentesinformacion, $unidad->apoyosdidacticos);
        
        return $html;
    }
    
    protected function pie_unidad($fuentesinformacion, $apoyosdidacticos)
    {
        $html = '
        <table>
            <tr>
                <td style="text-align: right;">
                    <p>Firma del Responsable Académico de Revisión en Grupo</p>
                </td>
            </tr>
        </table>
        <table>
            <thead>
                <tr>
                    <td class="encabezado">
                        IV. Fuentes de información
                    </td>
                    <td>
                        <br>
                    </td>
                    <td>
                        Apoyos didácticos
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="fuenteapoyo">' .
                        $fuentesinformacion
                  . '</td>
                    <td>
                        <br>
                    </td>
                    <td class="fuenteapoyo">' .
                        $apoyosdidacticos
                  . '</td>
                </tr>
            </tbody>
        </table>';
        
        return $html;
    }

    protected function encabezado_unidad(Unidad &$unidad)
    {
        $html = '<b>III. Análisis por unidad</p>';
        
        $html .= "
        <table>
            <tbody>
                <tr>
                    <td>
                        Unidad:
                    </td>
                    <td>
                        $unidad->nu_unidad
                    </td>
                    <td>
                        Nombre:
                    </td>
                    <td>
                        $unidad->nombre
                    </td>
                </tr>
            </tbody>
        </table>";
                
        $html .= "
        <table style='padding: 0px; margin: 0px;' width=100%>
            <tr>
                <td valign='TOP'>
                    <table width='492px'>
                        <thead>
                            <tr>
                                <td>" . get_string("competenciasgenericas", 'format_unidades') . "</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style='border: 1px solid #000000; padding: 4px; margin: 0px;' >
                                    $unidad->competenciasgenericas
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td width=8px></td>
                <td valign='TOP'>
                    <table width='492px'>
                        <thead>
                            <tr>
                                <td>" . get_string("criteriosevaluacion", 'format_unidades') . "</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style='border: 1px solid #000000; padding: 4px; margin: 0px;' >" .
                                    $this->instrumentos_evaluacion($unidad)
                             . "</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>";
        
        return $html;
    }
    
    private function instrumentos_evaluacion(Unidad &$unidad)
    {
        ini_set('max_execution_time', 300);
        $cm = get_fast_modinfo($this->course->id);

        $html = '<table>
                    <thead>
                        <tr>
                            <td><i>Instrumentos</i></td>
                            <td><i>Porcentaje</i></td>
                        </tr>
                    </thead>
                    <tbody>';
        
        foreach ($cm->get_cms() as $value)
        {            
            if($unidad->nu_unidad == $value->sectionnum 
                && Sesiones::modulo_calificable_valido($value->modname) == true)
            {
                $calif = grade_get_grades($unidad->nu_curso, 'mod', $value->modname, $value->instance);
                $html .= '
                    <tr>
                        <td>' .
                            $value->name
                     . '</td>
                        <td style="text-align: center; ">' .
                            format_float($calif->items[0]->grademax, 0) . "%"
                     . '</td>
                    </tr>';
            }
        }
        $html .= "</tbody>
            </table>";
                
        return $html;
    }
    
    private function desglose_actividades(Unidad &$unidad)
    {
        global $DB, $CFG;
        $html = '
         <table >
            <thead> 
                <tr>
                    <td rowspan="2" width="170" class="celdaencabezadoinicial" >
                        <p>Competencia específica (Objetivo Educacional)</p>
                    </td>
                    <td rowspan="2" width="210" class="celdaencabezado" >
                        <p>Actividades de Aprendizaje</p>
                    </td>
                    <td rowspan="2" width="210" class="celdaencabezado" >
                        <p>Actividades de Enseñanza</p>
                    </td>
                    <td rowspan="2" width="200" class="celdaencabezado" >
                        <p>Portafolio de Evidencia (Productode Aprendizaje)</p>
                    </td>
                    <td rowspan="1" colspan="2" width="220" class="celdaencabezado" >
                        <p>Fechas para adquisición de Competencias (Objetivos educacionales)</p>
                    </td>
                </tr>
                <tr>
                    <td class="celdaenc_fechas" >
                        <p>Programada</p>
                    </td>
                    <td class="celdaenc_fechas" >
                        <p>Real</p>
                    </td>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <td colspan="6" class="celdapie" >
                        <br>
                    </td>
                </tr>
            </tfoot>

            <tbody>';
        $i = 0;
        ini_set('max_execution_time', 300);
        $horas = 0;

        $sesiones = $unidad->get_cms();
        foreach ($sesiones as $sesion)
        {
            if(Sesiones::modulo_valido($sesion->modname))
            {
                $programacion = $sesion->programacion($this->groupid);
                $fprog = userdate($programacion->fprogramada, "%d/%m");
                if($this->estado != PLANEACION_APROBADA)
                    $fprog .= $programacion->hprogramada > 0 ? ' (' . format_time($programacion->hprogramada) . ')': '';
                $horas += $programacion->hprogramada;

                $html .= '
                    <tr>
                        <td class="celdacompetencias" >' .
                            ($i == 0 ? $unidad->competenciaespecifica: "<br>") 
                     . '</td>
                        <td class="celdaactividades" >' .
                            "$sesion->aprendizaje"
                     . '</td>
                        <td class="celdaactividades" >' .
                            "$sesion->ensenanza"
                     . '</td>
                        <td class="celdaactividades" >' .
                            "$sesion->portafolio"
                     . '</td>
                        <td class="celdaactividadesfecha" style="text-align: center;">' .
                            "$fprog"
                     . '</td>
                        <td class="celdafinal" >
                            <br>
                        </td>
                    </tr>';
                if($sesion->modname == 'practicalab')
                {
                $html .= '
                    <tr>
                        <td class="celdacompetencias" >
                            <br>
                        </td>
                        <td class="celdaactividades" >' .
                            get_string('actividad_aprendizaje', 'practicalab')
                     . '</td>
                        <td class="celdaactividades" >' .
                            get_string('actividad_ensenanza', 'practicalab')
                     . '</td>
                        <td class="celdaactividades" >' .
                            $sesion->name
                     . '</td>
                        <td class="celdaactividadesfecha" >
                            <br>
                        </td>
                        <td class="celdafinal" >
                            <br>
                        </td>
                    </tr>';
                }
            }
            else if(Sesiones::modulo_calificable_valido_moodle ($sesion->modname))
            {
                $modinfo = $DB->get_record($sesion->modname, array('course' => $this->course->id, 'id' => $sesion->instance), '*', MUST_EXIST);
                if($sesion->modname == 'assign')
                    $fecha = 'duedate';
                else if($sesion->modname == 'quiz')
                    $fecha = 'timeclose';
                
                $html .= '
                    <tr>
                        <td class="celdacompetencias" >
                            <br>
                        </td>
                        <td class="celdaactividades" >' .
                            get_string('actividad_aprendizaje', $sesion->modname)
                     . '</td>
                        <td class="celdaactividades" >' .
                            get_string('actividad_ensenanza', $sesion->modname)
                     . '</td>
                        <td class="celdaactividades" >' .
                            $sesion->name
                     . '</td>
                        <td class="celdaactividadesfecha" style="text-align: center;">' .
                            userdate($modinfo->$fecha, "%d/%m")
                     . ' </td>
                        <td class="celdafinal" >
                            <br>
                        </td>
                    </tr>';                
            }
            $i++;
        }

        $horas = format_time($horas, "%d");
        $html .= '
                <tr>
                    <td width="170" class="celdaobservaciones">
                        Observaciones:
                    </td>
                    <td colspan="5" class="celdaobservacionesfinal">' .
                        $unidad->observaciones
                  . '</td>
                </tr>
                <tr>
                    <td rowspan="2" width="170" class="celdatotales">
                        Fecha de Revisión:
                    </td>
                    <td rowspan="2" width="200" class="celdatotales">
                        <br>
                    </td>
                    <td rowspan="2" width="200" class="celdatotales">
                        Firma del Docente:
                    </td>
                    <td rowspan="2" width="127" class="celdatotales">
                        <br>
                    </td>
                    <td width="110" class="celdahorastotales">
                        T.H.P.
                    </td>
                    <td width="110" class="celdahorastotalesfinal">
                        T.H.R.
                    </td>
                </tr>
                <tr>
                    <td width="110" class="celdatotales" style="text-align: center;">' .
                        $horas
                 . '</td>
                    <td width="110" class="celdatotalesfinal">
                        <br>
                    </td>                    
                </tr>';
        
        $html .= '
            </tbody>
        </table>';
                
        return $html;
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
}

?>
