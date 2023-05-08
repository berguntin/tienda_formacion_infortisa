<?php
require_once '../../config/global.php';

if(isset($_POST['productId'])){
    //Convertimos el valor recibido a un entero
    $productId = intval($_POST['productId']);

    $product = new Product();
    $success = $product->delete($productId);

    //Maneja la respuesta
    if($success){
        http_response_code(200);
        echo json_encode(Array('success'=>true, 'message'=> "producto id:". $productId ." eliminado"));
    }
    else{
        http_response_code(304);
        echo json_encode(Array('success'=>false, 'message'=>'Ha ocurrido un error, no se ha eliminado'));
    };
}