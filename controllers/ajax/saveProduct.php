<?php
    require_once '../../config/global.php';

    if(isset($_POST['productId'])){
        $productId = intval($_POST['productId']);

        $newName = $_POST['newName'];
        $newPrice = floatval($_POST['newPrice']);

        $product = new Product();
        $product->load($productId);
        $product->setName($newName);
        $product->setPrice($newPrice);
        $success = $product->save($productId);

        if($success){
            http_response_code(200);
            echo json_encode(Array('success'=>true, 'message'=> "producto id:". $productId ." modificado correctamente"));
        }
        else{
            http_response_code(304);
            echo json_encode(Array('success'=>false, 'message'=>'Ha ocurrido un error, no se ha modificado'));
        };
    }
