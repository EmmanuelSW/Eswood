<?php

define('ROOT', __DIR__ . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);

if (file_exists(ROOT . 'vendor/autoload.php')) {
    require ROOT . 'vendor/autoload.php';
}

require APP . '/config/config.php';


//Script para establecer la conexión con la BD
require APP . '/core/controller.php';

//Script para cargar los controladores, metodos y argumentos
require APP . '/core/application.php';


$app = new Application();
