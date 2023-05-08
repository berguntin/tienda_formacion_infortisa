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
        if(isset($_SESSION['cart']['totalProducts'])){
            $smarty->assign('totalProducts', $_SESSION['cart']['totalProducts']);
        }
        $smarty->display('home.tpl');

    }
    public static function cart(){

        global $smarty;

        if(isset($_SESSION['cart'])){
            $smarty->assign('products', $_SESSION['cart']);
            $smarty->display('cart.tpl');
        }
        else{
            $smarty->display('emptyCart.tpl');
        }


    }
}