<?php

//  Display the course home page.

    require_once('../../config.php');
    require_once($CFG->dirroot  . '/course/schoolcycle/schoolcycle_form.php');
    require_once($CFG->dirroot  . '/course/schoolcycle/schoolcyclecurrent_form.php');
    require_once($CFG->dirroot  . '/course/schoolcycle/weeks_form.php');

    $id          = required_param('id', PARAM_INT);

    $PAGE->set_url('/course/schoolcycle/view.php', array('id' => $id)); // Defined here to avoid notices on errors etc

    // Prevent caching of this page to stop confusion when changing page after making AJAX changes
    $PAGE->set_cacheable(false);
    
    $contextcat = context_coursecat::instance($id, MUST_EXIST);
    $PAGE->set_context($contextcat);
    require_login();
    
    $forma_periodos = new periodos_form($PAGE->url, array(
        'context' => $contextcat,
        'category' => $id
        )
    );
    $forma_periodoactual = new periodoactual_form($PAGE->url, array(
        'context' => $contextcat,
        'category' => $id
    ));
    
    $o = '';
    if (has_capability('courseformat/periodos:agregar', $contextcat))
    {
        if ($data = $forma_periodos->get_data())
        {
            $DB->insert_record('course_periodos', $data);
            redirect($PAGE->url);
        }

        $o .= $forma_periodos->render();
    }

    if (has_capability('courseformat/periodos:editar', $contextcat))
    {
        if ($dataactual = $forma_periodoactual->get_data())
        {
            foreach ($dataactual as $key => $value)
            {
                $DB->update_record('course_periodos', $value);
            }

            redirect($PAGE->url);
        }
        else {
            $rs = $DB->get_recordset('course_periodos', array('nu_carrera' => $id));
            $periodos = array();
            foreach ($rs as $record)
            {
                $periodos[$record->id] = $record;
            }
            $rs->close();
            $forma_periodoactual->set_data($periodos);
            $o .= $forma_periodoactual->render();
        }
    }

    if (has_capability('courseformat/semanas:editar', $contextcat))
    {
        if($DB->record_exists('course_periodos', array('nu_carrera' => $id, 'actual' => 1)))
        {
            $periodo_actual = $DB->get_record('course_periodos', array('nu_carrera' => $id, 'actual' => 1), '*', MUST_EXIST);
            $forma_semanas = new semanas_form($PAGE->url, array(
                'context' => $contextcat,
                'nu_carrera' => $periodo_actual->nu_carrera,
                'nu_periodo' => $periodo_actual->id
            ));    

            if ($dataactual = $forma_semanas->get_data())
            {
                foreach ($dataactual->semanas as $semana)
                {
                    $semana->nu_carrera = $dataactual->nu_carrera;
                    $semana->nu_periodo = $dataactual->nu_periodo;
                    if($DB->record_exists('course_semanas_efectivas', array('nu_carrera' => $semana->nu_carrera, 'nu_periodo' => $semana->nu_periodo, 'nu_semana' => $semana->nu_semana)))
                    {
                        $DB->update_record('course_semanas_efectivas', $semana);
                    }
                    else
                    {
                        $DB->insert_record('course_semanas_efectivas', $semana);
                    }
                }
                redirect($PAGE->url);
            }
            else
            {
                $forma_semanas->set_data($periodo_actual);
                $o .= $forma_semanas->render();
            }
        }
    }

    $PAGE->set_pagelayout('coursecategory');
    $PAGE->set_title($contextcat->get_context_name());
    $PAGE->set_heading($contextcat->get_context_name(false));
    echo $OUTPUT->header();
    echo $o;
    echo $OUTPUT->footer();
