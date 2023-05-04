<?php

Class ProductController{

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
    public static function editProduct($id){
        global $smarty;
        //Carga la info del producto
        $product = new Product();
        $product->load($id);
        $smarty->registerObject('product', $product, null, false);
        $smarty->display('editProduct.tpl');

    }

}