<?php
    require_once '../../config/global.php';

    if(isset($_POST['prodId'])){

        $product = new Product();
        $product->load($_POST['prodId']);

        if($product->getStock()>=1) {
            $item = array(
                'id' => $product->getId(),
                'name' => $product->getName(),
                'quantity' => 1,
                'price' => $product->getPrice(),
            );
            //Comprobamos que exista la variable en la sesion
            if(isset($_SESSION['cart'])) {
                $productFound = false;
                /* iteramos sobre el carrito guardado
                 * para comprobar si ya existe
                */
                for($line=0; $line<count($_SESSION['cart']);$line++) {
                    //Si existe, aumentamos la cantidad en el carrito
                    if ($item['id'] === $_SESSION['cart'][$line]['id']) {
                        $_SESSION['cart'][$line]['quantity']++;
                        $productFound = true;
                        break;
                        }
                    }
                //Si no existe, agregamos el producto al array de sesion
                if(!$productFound){
                    $_SESSION['cart'][] = $item;
                    $_SESSION['cart']['totalProducts'] = calculateTotalOrderedItems($_SESSION)['cart'];
                }

            }//Si hay no carrito, lo creamos y guardamos
            else {
                $_SESSION['cart'][] = $item;
                $_SESSION['cart']['totalProducts'] = calculateTotalOrderedItems($_SESSION)['cart'];
            }


            http_response_code(200);
            echo json_encode(Array('success'=>true, 'message' =>'Producto agregado a la cesta!', 'lines'=>calculateTotalOrderedItems($_SESSION['cart'])));
        }
        else {
            http_response_code(304);
            echo json_encode(Array('success'=>false, 'message' => 'Algo ha ido mal, no se ha agregado', 'lines'=>calculateTotalOrderedItems($_SESSION['cart'])));
        }
    }
    else{
        http_response_code(400);
        echo json_encode(Array('success'=>false, 'message'=>'No se ha facilitado una id', 'lines'=>calculateTotalOrderedItems($_SESSION['cart'])));
    }


    function calculateTotalOrderedItems($array){
        $accum = 0;
        foreach ($array as $item){
            $accum += $item['quantity'];
        }
        return $accum;
    }