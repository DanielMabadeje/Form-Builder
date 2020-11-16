<?php
// Load Config
require_once '../app/config/config.php';

//Loading Libraries

// loading helpers
require_once '../app/helpers/form_field_builder.php';


spl_autoload_register(function($className){
    require_once 'libraries/'.$className.'.php';
});