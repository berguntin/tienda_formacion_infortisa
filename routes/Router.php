<?php

class Router
{
    function init(){

        $request= $_SERVER['QUERY_STRING'];

        if($request === ''){
            HomeController::home();
        }
        else {
            $controller = $_GET['ctrl'];
            $action = $_GET['action'];
            $id = intval($_GET['id']);

            //Gestionamos la ruta de productos [Editar y ver detalles]
            if($controller == 'product' && isset($id)){

                if(isset($action) && $action === 'edit'){
                    ProductController::editProduct($id);
                }
                else ProductController::showDetails($id);
            }
            if($controller == 'cart'){
                HomeController::cart();
            }
        }
    }
}
