<?php
require_once 'config/config.php';
//Load Libraries

//autoload core libraries
spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
});