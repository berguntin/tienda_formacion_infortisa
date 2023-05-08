<?php
    require_once 'config/global.php';
    require 'vendor/autoload.php';

    global $smarty;

    //En caso de existir una sesion, cargamos el router
    if(isset($_SESSION['userId'])){
        //Iniciamos el router para gestionar las peticiones
        $router = new Router();
        $router->init();
    }
    //En caso de no existir sesion activa, cargamos la vista de login
    else{
        global $smarty;
        $smarty->assign('error', '');
        $smarty->display('login.tpl');
    }







