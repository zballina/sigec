<?php

//  Display the course home page.

    require_once('../../config.php');
    require_once('lib.php');
    require_once($CFG->dirroot.'/course/semanas/semanas_form.php');

    $id          = optional_param('id', 0, PARAM_INT);

    $carrera = $DB->get_record('course_categories', array('id' => $id), '*', MUST_EXIST);


    $PAGE->set_url('/course/semanas/view.php', array('id' => $id)); // Defined here to avoid notices on errors etc

    // Prevent caching of this page to stop confusion when changing page after making AJAX changes
    $PAGE->set_cacheable(false);

    preload_course_contexts($course->id);
    $contextcat = context_coursecat::instance($id, MUST_EXIST);

    require_login();

    $PAGE->set_pagelayout('course');
    $PAGE->set_pagetype('course-view-' . $course->format);
    $PAGE->set_title(get_string('course') . ': ' . $course->fullname);
    $PAGE->set_heading($course->fullname);
    echo $OUTPUT->header();
    echo $OUTPUT->footer();
?>