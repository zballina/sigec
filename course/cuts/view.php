<?php

//  Display the course home page.

    require_once('../../config.php');
    require_once($CFG->dirroot  . '/course/cuts/schoolcycle_cuts_form.php');

    $id          = required_param('id', PARAM_INT);

    $PAGE->set_url('/course/cuts/view.php', array('id' => $id)); // Defined here to avoid notices on errors etc

    // Prevent caching of this page to stop confusion when changing page after making AJAX changes
    $PAGE->set_cacheable(false);
    
    $contextcat = context_coursecat::instance($id, MUST_EXIST);
    $PAGE->set_context($contextcat);
    require_login();
    
    $forma_cortes = new periodos_cortes_form($PAGE->url, array(
        'context' => $contextcat,
        'nu_carrera' => $id
        )
    );

    $o = '';
    if (has_capability('courseformat/cortes_periodo:add', $contextcat))
    {
        if ($data = $forma_cortes->get_data())
        {
            $DB->insert_record('course_periodos', $data);
            redirect($PAGE->url);
        }

        $o .= $forma_cortes->render();
    }

    $PAGE->set_pagelayout('coursecategory');
    $PAGE->set_title($contextcat->get_context_name());
    $PAGE->set_heading($contextcat->get_context_name(false));
    echo $OUTPUT->header();
    echo $o;
    echo $OUTPUT->footer();
