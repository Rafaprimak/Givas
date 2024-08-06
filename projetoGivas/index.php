<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
$autoload = function($class){
        include($class.'.php');
};


spl_autoload_register($autoload);

$app = new Aplication();
$app->executar();

