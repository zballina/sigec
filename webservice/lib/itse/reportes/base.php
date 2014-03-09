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
require_once($CFG->libdir . '/mpdf/mpdf.php');

abstract class reporte_base
{
    protected $course;
    protected $groupid;
    protected $docente;    
    protected $codigo;
    protected $prenombreDoc;
    protected $nombreDocumento;
    protected $revision;
    protected $normaISO;
    protected $stylesheet;
    protected $prefijoArchivo;
    protected $usuarios;

    /*
     * Constructor de la clase base para reportes
     * 
     * @param int $id id del curso en la tabla {course}
     */
    public function __construct($id)
    {
        global $DB, $CFG;
        $this->course = $DB->get_record('course', array('id' => $id), '*', MUST_EXIST);
        $this->codigo = '';
        $this->prenombreDoc = 'Nombre del Documento';
        $this->nombreDocumento = '';
        $this->revision = '';
        $this->normaISO = '';
        $this->prefijoArchivo = '';
        $this->groupid = 0;
        $this->stylesheet = file_get_contents($CFG->libdir . '/itse/style.css');
        $this->docente = null;
        $this->obtener_docente($this->course->id);
    }

    protected function obtener_docente($courseid)
    {
        global $USER;
        $this->usuarios = new Usuarios($courseid);
        $docentes = $this->usuarios->get_docentes();
        foreach ($docentes as $id => $datos)
        {
            if($USER->id == $id)
            {
                $this->docente = $datos;        
                break;
            }
        }
        
        if($this->docente == null)
        {
            foreach ($docentes as $id => $datos)
            {
                $this->docente = $datos;
                break;
            }
        }                
    }
        
    public abstract function descargar();

    public function nombre_grupo()
    {
        global $DB;
        if($this->groupid != 0)
        {
            $grupo = $DB->get_record('groups', array('id' => $this->groupid), '*', MUST_EXIST);
            return $grupo->name;
        }
        return '';
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
                    <td rowspan='2' width='45%' style='text-align: center; border: 1px solid black; vertical-align: central;'>
                        $this->prenombreDoc
                        <p>$this->nombreDocumento</p>
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
                        <p>$this->normaISO</p>
                    </td>
                    <td width='25%' style='border: 1px solid black;'>
                        <p>P&aacute;gina {PAGENO} de {nbpg}</p>
                    </td>
                </tr>
            </tbody>
        </table>";

        return $html;
    }

    protected function pie_pagina($documento_registro = true)
    {
        $html = "<table style='width: 100%;'>
            <tr>
                <td style='text-align: left;'>$this->codigo</td>
                <td style='text-align: right;'>Rev. $this->revision</td>
            </tr>";
        $html .= $documento_registro ? "
            <tr>
                <td colspan='2' style='text-align: center; color: gray;'>\"Este Documento ha sido registrado y validado por el Controlador de Documentos\"</td>
            </tr>": '';
        $html .= "</table>";
        
        return $html;
    }

    protected function carrera()
    {
        global $DB;

        $carrera = $DB->get_field('course_categories', 'name', array('id' => $this->course->category));

        return $carrera;
    }

    protected function periodo($nu_periodo)
    {
        global $DB;
        $periodo = $DB->get_record('course_periodos', array('id' => $nu_periodo));

        if($periodo == null)
            return '<br>';
        
        if($periodo->periodo == 'Agosto - Enero')
        {
            $ano = $periodo->ano - 1;
            return "Agosto $ano - Enero $periodo->ano";
        }
        return "$periodo->periodo $periodo->ano";
    }

    protected function numero_unidades()
    {
        global $DB;
        $numero = $DB->count_records_select('course_sections', 
            'course = :course AND visible = :visible AND section <> :section', 
            array('course' => $this->course->id, 'visible' => 1, 'section' => 0));

        return $numero;
    }    
}

?>
