<?php
//DB Params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'form_builder');
define('DB_TYPE', 'MYSQL');
//App Root
define('APPROOT', dirname(dirname(__FILE__)));
// define('URLROOT', $_ENV['URL_ROOT']);



$url = $_SERVER['REQUEST_URI'];
$host = $_SERVER['HTTP_HOST'];

if (isset($_ENV['URL_ROOT'])) {
    define('URLROOT', $_ENV['URL_ROOT']);
    define('DB_HOST', 'ec2-50-19-32-202.compute-1.amazonaws.com');
    define('DB_USER', 'rftwqjxawxxjla');
    define('DB_PASS', 'ce30a3c2859822efd2b558fad5f249a96d2c694cdf2568225784d3bb1eefefde');
    define('DB_NAME', 'd6t78llm8ie80f');
    define('DB_PORT', '5432');

    define('DB_URL', 'postgres://rftwqjxawxxjla:ce30a3c2859822efd2b558fad5f249a96d2c694cdf2568225784d3bb1eefefde@ec2-50-19-32-202.compute-1.amazonaws.com:5432/d6t78llm8ie80f');
    define('DB_TYPE', 'PGSQL');
    // define('APPROOT', dirname(__FILE__));
} else {

    define('URLROOT', 'https://localhost/formsystem/');
}
//site name
define('SITENAME', 'FORMBUILDER');


// $myPDO = new PDO('pgsql:host=localhost;dbname=dbname', 'username', 'password');