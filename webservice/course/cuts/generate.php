<?php

//  Display the course home page.

    require_once('../../config.php');
    require_once($CFG->dirroot  . '/course/cuts/schoolcycle_cuts_form.php');

    $id          = required_param('id', PARAM_INT);

    $PAGE->set_url('/course/cuts/generate.php', array('id' => $id)); // Defined here to avoid notices on errors etc

    // Prevent caching of this page to stop confusion when changing page after making AJAX changes
    $PAGE->set_cacheable(false);
    
    $contextcat = context_coursecat::instance($id, MUST_EXIST);
    $PAGE->set_context($contextcat);
    require_login();

    $cursos = get_courses($id);
    
    $o = '';
    if (has_capability('courseformat/cortes:generate', $contextcat))
    {
        $docentes = array();
        foreach ($cursos as $courseid => $course)
        {
            $usuarios = new Usuarios($courseid);
            $d = $usuarios->get_docentes();
            foreach ($d as $docente)
            {
                if(array_key_exists($docente->id, $docentes))
                {
                    
                }
            }
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

    $PAGE->set_pagelayout('coursecategory');
    $PAGE->set_title($contextcat->get_context_name());
    $PAGE->set_heading($contextcat->get_context_name(false));
    echo $OUTPUT->header();
    echo $o;
    echo $OUTPUT->footer();
