<?php
//DB Params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'form_builder');
//App Root
define('APPROOT', dirname(dirname(__FILE__)));
// define('URLROOT', $_ENV['URL_ROOT']);
// echo $_ENV;

// $url=$_ENV;

// var_dump($url);
// die;


$url = $_SERVER['REQUEST_URI'];
$host = $_SERVER['HTTP_HOST'];
// $env = getenv();
// var_dump($env);


// $env = json_encode($env);
// $url = json_encode($url);
// var_dump($url);
// die($url);
// die($env);

if (isset($_ENV['URL_ROOT'])) {
    define('URLROOT', $_ENV['URL_ROOT']);
} else {

    define('URLROOT', 'http://localhost/formsystem/');
}
//site name
define('SITENAME', 'FORMBUILDER');
