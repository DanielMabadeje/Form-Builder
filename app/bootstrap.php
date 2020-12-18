<?php

// load .env
// use Dotenv\Dotenv;

require_once '../vendor/vlucas/phpdotenv/src/Dotenv.php';

require_once '../Vendor/autoload.php';

// $calledEnv= new Dotenv\Dotenv();
// $dotenv=$calledEnv::createImmutable(__DIR__);
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();
// Load Config
require_once '../app/config/config.php';


//Loading Libraries

// loading helpers
require_once '../app/helpers/form_field_builder.php';
require_once '../app/helpers/value_generator_helper.php';
require_once '../app/helpers/form_template_helper.php';

require_once '../app/helpers/session_helper.php';
require_once '../app/helpers/url_helper.php';

require_once '../app/mails/template/template.php';

// require_once '../app/config/autoload.php';


require_once 'helpers/mail_helper.php';


spl_autoload_register(function($className){
    require_once 'libraries/'.$className.'.php';
});


