<?php

class Router {
    public function init() {
        $request = $_SERVER['REQUEST_URI'];
        $basePath = '/';
        $requestPath = substr($request, strlen($basePath));

        $productController = new ProductController();

        if($requestPath == ''){

            $productController = new ProductController();
            $productController->showAll();
        }
        if (isset($_GET['product'])) {
            // Logica de enrutamiento para  "product"
            $productId = $_GET['product'];
            $productController->showDetails($productId);

            if(isset($_GET['edit'])){
                echo 'editar';
            }
        }

    }
}
