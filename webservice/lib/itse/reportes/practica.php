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

class reporte_practica extends reporte_base
{
    private $fechas;
    private $practicalab;
    public function __construct($id, $practicaid)
    {
        global $DB, $CFG;
        parent::__construct($id);

        $this->codigo = 'ITSE-AC-PO-003-01';
        $this->nombreDocumento = 'FORMATO DE REPORTE DE PRÁCTICAS';
        $this->revision = '0';
        $this->normaISO = '';
        $this->fechas = array();
        $this->practicalab = $DB->get_record('practilab', array('id' => $practicaid), '*', MUST_EXIST);        
    }

    public function generar()
    {
        return '';
    }

    public function descargar()
    {
        global $DB;
        $fullname = format_string($this->course->fullname, true, array('context' => context_course::instance($this->course->id)));

        $downloadfilename = clean_filename("$fullname.pdf");
        // Creating a document
        $documento = new mPDF('utf-8', 'LETTER-P', 8, '', 15, 15, 30, 15, 10, 10);
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
        $item = '
        <table>
            <tbody>
                <tr>
                    <td colspan="3">Carrera: ' . $this->carrera() . '</td>
                </tr>
                <tr>
                    <td colspan="3">Nombre de la asignatura: ' . $this->course->fullname . '</td>
                </tr>
                <tr>
                    <td colspan="3">Docente: </td>
                </tr>
                <tr>
                    <td colspan="3">Grupo: </td>
                </tr>
                <tr>
                    <td colspan="3">Participantes H: M:</td>
                </tr>
                <tr>
                    <td colspan="3">Fecha: </td>
                </tr>
                <tr>
                    <td>Nombre de la práctica:</td>
                    <td><br></td>
                    <td><br></td>
                </tr>
                <tr>
                    <td>Lugar donde se realizó la práctica:</td>
                    <td><br></td>
                    <td>Observaciones:</td>
                </tr>
                <tr>
                    <td colspan="3">Fotos:</td>
                </tr>
                <tr>
                    <td>IMAGEN</td>
                    <td><br></td>
                    <td>IMAGEN</td>
                </tr>
                <tr>
                    <td>URL:</td>
                    <td><br></td>
                    <td></td>
                </tr>
            </tbody>            
        </table>
        <small>C.c.e.- jefe del Depto. y/o Coordinador de Carrera</small>';
        
        return $item;
    }
        
    protected function encabezado()
    {
        global $CFG;
        $imagen = "<img src='" . $CFG->libdir . "/itse/reportes/itsescarcega.png' width='96px' height='54px'/>";
        $html = "
        <table>
            <tbody>
                <tr valign='TOP'>
                    <td rowspan='3' width='10%' style='border: 1px solid black;'>
                        $imagen
                    </td>
                    <td rowspan='2' width='45%' style='text-align: center; border: 1px solid black;'>
                        <p>INSTITUTO TECNOLOGICO SUPERIOR DE ESCARCEGA</p>
                    </td>
                    <td width='25%' style='border: 1px solid black;'>
                        <p>C&oacute;digo: $this->codigo</p>
                    </td>
                </tr>
                <tr valign='TOP'>
                    <td width='25%' style='border: 1px solid black;'>
                        <p>Revisi&oacute;n. $this->revision</p>
                    </td>
                </tr>
                <tr valign='TOP'>
                    <td width='45%' style='text-align: center; border: 1px solid black;'>
                        <p>$this->nombreDocumento</p>
                    </td>
                    <td width='25%' style='border: 1px solid black;'>
                        <p>P&aacute;gina {PAGENO} de {nbpg}</p>
                    </td>
                </tr>
            </tbody>
        </table>";

        return $html;
    }
}

?>
