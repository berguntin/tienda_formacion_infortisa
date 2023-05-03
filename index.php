<?php
    require_once 'config/global.php';
    require 'vendor/autoload.php';
    require 'RoutingManager.php';

    global $smarty;


    //En caso de exixtir una sesion, cargamos la vista principal
    if(isset($_SESSION['userId'])){
        global $smarty;
        $router = new RoutingManager();
        $router->init();

    }
    //En caso de no existir sesion activa, cargamos la vista de login
    else{
        global $smarty;
        $smarty->assign('error', '');
        $smarty->display('login.tpl');
    }







