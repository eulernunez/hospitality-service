<?php
//die('Testing ...');
error_reporting(E_ALL);
error_reporting(-1);
//die('Trabajando ...');
// Define path to application directory
//echo 'PRIMERO -> ' . dirname(__FILE__) . '<br>';
//die();
//PRIMERO -> /home/alquilertop/www
//PRIMERO -> /homepages/11/d715800188/htdocs   1and1
//
//
//
//echo 'PRIMERO -> ' . ( dirname(__FILE__) . '/../application' ) . '<br>';
//echo 'TERCERO OK 2 -> ' . (realpath(dirname(__FILE__) . '/../zfinmobiliaria3/application')  ) . '<br>';
//defined('APPLICATION_PATH')
//    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../zfinmobiliaria3/application'));
//echo 'URL: ' . realpath(APPLICATION_PATH . '/../../library');
//die('END');

//echo 'PRIMERO -> ' . ( dirname(__FILE__) . '/../application' ) . '<br>';
//echo 'SEGUNDO OK -> ' . (realpath(dirname(__FILE__) . '/cache')  ) . '<br>';
//echo 'TERCERO OK -> ' . (realpath(dirname(__FILE__) . '/../../zfinmobiliaria/application')  ) . '<br>';
//echo 'CUARTO OK -> ' . (realpath(dirname(__FILE__) . '/../../library')  ) . '<br>';
//die('Testing ...');
//die('RUTA ' . dirname(__FILE__) . '/../application' );
// 1    '/../../zfinmobiliaria3/application'
// 2    '/../../library'

// 1a   '/../../application'
//2a    '/../library'


defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/sellers/application'));

defined('LIBRARY_PATH')
    || define('LIBRARY_PATH', realpath(dirname(__FILE__) . '/library'));



//die('Testing ...' . APPLICATION_PATH);


// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(LIBRARY_PATH),
    get_include_path(),
)));


/*echo(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../../library'),
    get_include_path(),
)));
die();*/

/** Zend_Application */
require_once 'Zend/Application.php';

//echo ('<br/> Loaded Zend/Application.php ...');

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);



$application->bootstrap()
            ->run();