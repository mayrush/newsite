<?php

define('BASE_PATH', realpath(dirname(__FILE__)));
define('APPLICATION_PATH', BASE_PATH . '/application');

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

    
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(BASE_PATH . '/library'),
    get_include_path(),
    )));
    

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);




$application->bootstrap()
            ->run();