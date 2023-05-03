<?php

class RoutingManager {
    public function init() {
        $request = $_SERVER['REQUEST_URI'];
        $basePath = '/';
        $requestPath = substr($request, strlen($basePath));

        if($requestPath == ''){

            $productController = new ProductController();
            $productController->showAll();
        }
        if (strpos($requestPath, 'product') === 0) {
            // Lógica de enrutamiento para la ruta "/product"
            $productController->showDetails($_GET['Id']);
        }

    }
}
