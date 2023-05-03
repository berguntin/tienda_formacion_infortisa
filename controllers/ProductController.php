<?php

Class ProductController{
    //Muestra la vista principal con todos los productos
    public static function showAll(){
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
    //Muestra la vista de detalles del producto
    public static function showDetails($id){
        global $smarty;
        $product = new Product();
        $data = $product->load($id);
        if($data)
        {
            $smarty->assign('product', $data);
            $smarty->display('product.tpl');
        }
        else {
            $smarty->display('error404.tpl');
        }
    }

}