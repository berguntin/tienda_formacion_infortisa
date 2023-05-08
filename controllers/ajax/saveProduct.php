<?php
    require_once '../../config/global.php';

    if(isset($_POST['productId'])){
        //Convertimos el valor recibido a un entero
        $productId = intval($_POST['productId']);

        $newName = $_POST['newName'];
        $newPrice = floatval($_POST['newPrice']);
        //Instancia un product, lo carga en el objeto y modifica sus propiedades
        $product = new Product();
        $product->load($productId);
        $product->setName($newName);
        $product->setPrice($newPrice);
        $success = $product->save($productId);
        //Maneja la respuesta
        if($success){
            http_response_code(200);
            echo json_encode(Array('success'=>true, 'message'=> "producto id:". $productId ." modificado correctamente"));
        }
        else{
            http_response_code(304);
            echo json_encode(Array('success'=>false, 'message'=>'Ha ocurrido un error, no se ha modificado'));
        };
    }
