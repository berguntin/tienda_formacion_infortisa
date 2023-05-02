<?php

Class ProductController{

    function showDetails($id){
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