<?php

Class RoutingManager {

    public function init() :void
    {
        $request = $_SERVER['REQUEST_URI'];
        var_dump($request);
        $productController = new ProductController();
        if ($request != '/')
        {
            $route= explode('/', $request);
            var_dump($route);
            if($route[2] == 'product')
            {
                $productId = $route[3];
                $productController->showDetails($productId);
            }
        }
    }

}