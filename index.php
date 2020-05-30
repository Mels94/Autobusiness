<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/application/config/define.php';
session_start();
use application\components\Router;

spl_autoload_register(function ($className){
    $fileName = str_replace("\\", "/", $className.".php");
    if (file_exists($fileName)){
        require $fileName;
    }
});

$router = new Router;
$router->run();

