<?php

/*Class UserController
{
    function __construct(){

    }
    function autenticate(){
        global $smarty;
        $smarty->assign('error', '');
        $smarty->display('login.tpl');
    }
    function authError(){
        global $smarty;
        $smarty->assign('error', 'Credenciales incorrectas!');
        $smarty->display('login.tpl');
    }
    function start($id)
    {
        global $smarty;
        $product = new Product();
        $user = new User();
        $user->load($id);
        $allProducts = $product->load_all();
        $smarty->assign('name',
            $user->getName() );
        $smarty->assign('products', $allProducts);
        $smarty->display('sesion.tpl');
    }

}*/