<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'pgsql';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'educativ_moodle';
$CFG->dbuser    = 'educativ_moodle';
$CFG->dbpass    = '(6k&cq~2HAK!m-XliU';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => '',
  'dbsocket' => '',
);

$CFG->wwwroot   = 'http://localhost/moodle';
$CFG->dataroot  = '/var/www/localhost/moodledata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 02777;

require_once(dirname(__FILE__) . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
