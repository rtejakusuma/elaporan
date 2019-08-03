<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['post_controller'] = array(
    'class' => 'Db_log',
    'function' => 'logQueries',
    'filename' => 'Db_log.php',
    'filepath' => 'hooks'
);
