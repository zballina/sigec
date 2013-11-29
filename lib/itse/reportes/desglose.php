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

        $this->nombreDocumento = 'CONCENTRADO DE CRITERIOS DE EVALUACIÓN';
        $this->prefijoArchivo = 'Desglose-';
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
        
        $html = '</body>';
        $html .= '</html>';
        $documento->WriteHTML($html);

        $documento->Output($downloadfilename, 'D');
        exit;
    }

    protected function reporte()
    {
        global $USER;
        ini_set('max_execution_time', 300);
        $cm = get_fast_modinfo($this->course->id);
        $unidades = $this->numero_unidades();
        $html = '';
        for($i = 1; $i <= $unidades; $i++)
        {
            $html .= "<h1>Unidad $i</h1>".
            '<table>
                <thead>
                    <tr>
                        <td><i>Instrumentos</i></td>
                        <td><i>Porcentaje</i></td>
                    </tr>
                </thead>
                <tbody>';
            foreach ($cm->get_cms() as $value)
            {            
                if($i == $value->sectionnum 
                    && ($value->modname == 'assign' 
                        || $value->modname == 'quiz' 
                        || $value->modname == 'practicalab'
                        || $value->modname == 'sesiontarea'
                        || $value->modname == 'asistencias'))
                {
                    $calif = grade_get_grades($this->course->id, 'mod', $value->modname, $value->instance);
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
        }
                
        return $html;
    }        
    
    protected function encabezado()
    {
        $section = get_fast_modinfo($this->course->id)->get_section_info(0);
        $unidad = new Unidad($this->course->id, $section->id);
        return '<p style="text-align: center;">Periodo escolar ' . $this->periodo($unidad->nu_periodo) . '</p>
                <h4 style="text-align: center;">' . $this->nombreDocumento . '</h4>';
    }
}

?>
