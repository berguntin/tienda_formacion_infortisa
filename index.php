<?php
    require_once 'config/global.php';
    require 'vendor/autoload.php';
    require 'RoutingManager.php';

    global $smarty;
    $router = new RoutingManager();
    $router->init();


    if(isset($_SESSION['userId'])){
        global $smarty;
        $product = new Product();
        $user = new User();
        $user->load($_SESSION['userId']);
        $allProducts = $product->load_all();
        $smarty->assign('name',
            $user->getName() );
        $smarty->assign('products', $allProducts);
        $smarty->display('sesion.tpl');
    }
    else{
        global $smarty;
        $smarty->assign('error', '');
        $smarty->display('login.tpl');
    }







