<?php
/* Modulo Aignacion.
 * permite seleccionar un usuario para asignarles materias
*/
    require_once ('../../config.php');
    require_once($CFG->libdir.'/adminlib.php');
    require_once($CFG->libdir.'/authlib.php');
    require_once($CFG->dirroot.'/user/filters/lib.php');
    
    $delete       = optional_param('delete', 0, PARAM_INT);
    $confirm      = optional_param('confirm', '', PARAM_ALPHANUM);   //md5 confirmation hash
    $confirmuser  = optional_param('confirmuser', 0, PARAM_INT);
    $sort         = optional_param('sort', 'name', PARAM_ALPHANUM);
    $dir          = optional_param('dir', 'ASC', PARAM_ALPHA);
    $page         = optional_param('page', 0, PARAM_INT);
    $perpage      = optional_param('perpage', 30, PARAM_INT);        // how many per page
    $ru           = optional_param('ru', '2', PARAM_INT);            // show remote users
    $lu           = optional_param('lu', '2', PARAM_INT);            // show local users
    $acl          = optional_param('acl', '0', PARAM_INT);           // id of user to tweak mnet ACL (requires $access)
    $suspend      = optional_param('suspend', 0, PARAM_INT);
    $unsuspend    = optional_param('unsuspend', 0, PARAM_INT);
    $unlock       = optional_param('unlock', 0, PARAM_INT);
    
    $sitecontext = context_system::instance();
    $context = context_system::instance(); 
    $site = get_site();
  
    if (!has_capability('moodle/user:update', $sitecontext) and !has_capability('moodle/user:delete', $sitecontext)) {
        print_error('nopermissions', 'error', '', 'edit/delete users');
    }
    if (empty($CFG->loginhttps)) {
        $securewwwroot = $CFG->wwwroot;
    } else {
        $securewwwroot = str_replace('http:','https:',$CFG->wwwroot);
    }
    
     // create the user filter form
    $ufiltering = new user_filtering();
    $PAGE->set_url('/course/asignacion/asignacion.php');
    $PAGE->set_pagelayout('incourse');
    $PAGE->set_context($context);
    echo $OUTPUT->header();
     // add filters
    
    $ufiltering->display_add();
    $ufiltering->display_active();   
    
    // obtiene los filtros para bsuqueda de usuario
    list($extrasql, $params) = $ufiltering->get_sql_filter();
    //$users = get_users_listing($sort, $dir, $page*$perpage, $perpage, '', '', '', $extrasql, $params, $context);
      $usercount = get_users(false);

    //muestra el listado de numeros de usuarios
    if ($extrasql !== '') {
      
        $usersearchcount = get_users(false, '', false, null, "", '', '', '', '', '*', $extrasql, $params);
        $users = get_users(true, '', false, null, "", '', '', '', '', '*', $extrasql, $params);
        echo $OUTPUT->heading("$usersearchcount / $usercount ".get_string('users'));
        $usercount = $usersearchcount;
        foreach($users as $user){
            echo "<a href=\"../asignacion/asignacion_curso.php?nu_docente=$user->id&amp;nu_carrera=$site->id\">
                    $user->firstname  $user->lastname </a><br>";
        }   
    } else {
        echo $OUTPUT->heading("$usercount ".get_string('users'));
    }
    //imprimimos el lsitado de usuarios 
      
?>
