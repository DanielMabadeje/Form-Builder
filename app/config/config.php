<?php
//DB Params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'form_builder');
//App Root
define('APPROOT', dirname(dirname(__FILE__)));
// define('URLROOT', $_ENV['URL_ROOT']);



$url = $_SERVER['REQUEST_URI'];
$host = $_SERVER['HTTP_HOST'];

if (isset($_ENV['URL_ROOT'])) {
    define('URLROOT', $_ENV['URL_ROOT']);
    // define('APPROOT', dirname(__FILE__));
} else {

    define('URLROOT', 'https://localhost/formsystem/');
}
//site name
define('SITENAME', 'FORMBUILDER');
