<?php
require_once 'config/config.php';

// Load Helpers

require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';

if(ERROR_REPORTING){
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
}

//Autoload Core Librariies

spl_autoload_register(function($className){
    require_once 'libraries/'.$className.'.php';
});