<?php

require_once ('../../config.php');
require_once($CFG->dirroot . '/course/apertura/apertura_form.php');
require_once($CFG->libdir . '/itse/lib.php');


$nu_carrera = required_param('nu_carrera', PARAM_INT);


$PAGE->set_url('/course/apertura/apertura.php', array(
    'nu_carrera' => $nu_carrera      
));

$materias = $DB->get_recordset('itse_sigec_materias',array('carrera' => $nu_carrera),'semestre');
if($materias == null){
    echo"No existen datos en la Base de datos.";
}  
else{
   $forma_apertura = new apertura_form($PAGE->url, array());
   $forma_apertura->materias = $materias;
   $forma_apertura->set_data(array($materias));
   $semestre=0;
   
   foreach ($materias as $materia)
       {            
           if($materia->semestre != $semestre ){
                $semestre = $materia->semestre;
               $forma_apertura->set_title("Semestre ".$materia->semestre);               
           }
              $forma_apertura->set_object($materia->fullname);                
       }
   if ($forma_apertura->is_cancelled())
    {
             
    }
   else if($data = $forma_apertura->get_data())
    {
        
    }    
    
}
     
    
    $PAGE->set_title('Apertura de Nueva Materia');
    $PAGE->set_heading();
    $PAGE->navbar->add('Apertura de Nueva Materia');
    $PAGE->set_pagelayout('incourse');

    echo $OUTPUT->header();
     
    $forma_apertura->display();
    
    echo $OUTPUT->footer();
//}
