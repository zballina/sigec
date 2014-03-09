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

class reporte_desglose extends reporte_base
{
    public function __construct($id)
    {
        global $DB, $CFG;
        parent::__construct($id);

        $this->nombreDocumento = 'CONCENTRADO DE CRÍTERIOS DE EVALUACIÓN';
        $this->prefijoArchivo = 'Críterios-';
        $this->stylesheet = file_get_contents($CFG->libdir . '/itse/stylerubri.css');
    }

    public function generar()
    {
        return '';
    }

    public function descargar()
    {
        global $DB;
        $fullname = format_string($this->course->fullname, true, array('context' => context_course::instance($this->course->id)));

        $downloadfilename = clean_filename("$this->prefijoArchivo$fullname.pdf");
        // Creating a document
        $documento = new mPDF('utf-8', 'LETTER', 8, '', 15, 15, 30, 15, 10, 10);
        $documento->WriteHTML($this->stylesheet, 1);
        $documento->SetHTMLHeader($this->encabezado());        
        $documento->WriteHTML('<body>');
        $documento->WriteHTML($this->reporte());        
        $documento->WriteHTML('</body>');

        $documento->Output($downloadfilename, 'D');
        exit;
    }

    protected function reporte()
    {
        global $DB;
        ini_set('max_execution_time', 300);
        $rs = $DB->get_recordset('course_sections', array('course' => $this->course->id, 'visible' => '1'), 'section');
        
        $html = '';
        foreach ($rs as $section) 
        {
            if($section->section > 0)
            {
                $unidad = new Unidad($this->course->id, $section->id);
                $html .= "<h1>Unidad $section->section</h1>
                <table>
                    <thead>
                        <tr>
                            <td><i>Instrumentos</i></td>
                            <td><i>Porcentaje</i></td>
                        </tr>
                    </thead>
                    <tbody>";
                $sesiones = $unidad->get_actividades();
                foreach ($sesiones as $sesion)
                {            
                    $calif = grade_get_grades($this->course->id, 'mod', $sesion->modname, $sesion->sesionclaseid());
                    $html .= '
                        <tr>
                            <td>' .
                                $sesion->name
                         . '</td>
                            <td style="text-align: center; ">' .
                                format_float($calif->items[0]->grademax, 0) . "%"
                         . '</td>
                        </tr>';
                }
                $html .= "</tbody>
                    </table>";                
            }
        }
        $rs->close();
        
        return $html;
    }        
    
    protected function encabezado()
    {
        $fullname = format_string($this->course->fullname, true, array('context' => context_course::instance($this->course->id)));
        $section = get_fast_modinfo($this->course->id)->get_section_info(0);
        $unidad = new Unidad($this->course->id, $section->id);
        return '<p style="text-align: center;">Periodo escolar ' . $this->periodo($unidad->nu_periodo) . '</p>
                <h4 style="text-align: center;">' . $this->nombreDocumento . '</h4>'
                . '<h2>' . $fullname . '</h2>';
    }
}

?>
