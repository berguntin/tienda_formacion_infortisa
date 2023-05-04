<?php
    session_start();
    //Formato de fecha y hora a usar en consultas SQL
    const DATE_FORMAT = 'Y-m-d H:i:s';
    const ROOT_DIR = '/var/www/tienda/';

    require ROOT_DIR . 'vendor/autoload.php';
    require_once ROOT_DIR. 'routes/Router.php';


    //instancia y configuracion inicial de clase Smarty
    $smarty = new Smarty();
    $smarty->setTemplateDir('views');
    $smarty->setCompileDir('views/compile');
    $smarty->setCacheDir('views/cache');
    $smarty->clearAllCache();

    //Autoloader de clases
    spl_autoload_register(function ($classname){
        if(file_exists(ROOT_DIR . 'models/'.$classname . '.php')){
            require ROOT_DIR. 'models/'.$classname . '.php';
        }
    });
    //Autoloader de controladores
    spl_autoload_register(function ($classname){
        if(file_exists(ROOT_DIR .'controllers/'.$classname . '.php')){
            require ROOT_DIR . 'controllers/'.$classname . '.php';
        }
    });

    //Conexion a base de datos
    $conn = new mysqli("localhost", 'root', 'root', 'Users');
    $conn->set_charset("utf8mb4");

    if ($conn->connect_error) {
        die("Conexion con base de datos fallida!") . $conn->connect_error;
    }