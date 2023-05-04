<?php

Class HomeController{
    //Muestra la vista principal con todos los productos
    public static function home(){

        global $smarty;
        $product = new Product();
        $user = new User();
        $user->load($_SESSION['userId']);
        $allProducts = $product->load_all();
        $smarty->assign('name',
            $user->getName() );
        $smarty->assign('products', $allProducts);
        $smarty->display('home.tpl');

    }
}