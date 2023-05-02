<?php
    session_start();
    require '/var/www/tienda/vendor/autoload.php';
    const DATE_FORMAT = 'Y-m-d H:i:s';
    //instancia y configuracion inicial de clase Smarty
    $smarty = new Smarty();
    $smarty->setTemplateDir('views');
    $smarty->setCompileDir('views/compile');
    $smarty->setCacheDir('views/cache');
    $smarty->clearAllCache();

    //Autoloader de clases
    spl_autoload_register(function ($classname){
        if(file_exists('models/'.$classname . '.php')){
            require 'models/'.$classname . '.php';
        }
    });
    //Autoloader de controladores
    spl_autoload_register(function ($classname){
        if(file_exists('controllers/'.$classname . '.php')){
            require 'controllers/'.$classname . '.php';
        }
    });
    //Conexion a base de datos
    $conn = new mysqli("localhost", 'root', 'root', 'Users');
    $conn->set_charset("utf8mb4");

    if ($conn->connect_error) {
        die("Conexion con base de datos fallida!") . $conn->connect_error;
    }