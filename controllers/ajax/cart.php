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
                 * para comprobar si ya existe el articulo
                */
                for($line=0; $line<count($_SESSION['cart']);$line++) {
                    //Si existe, aumentamos la cantidad en el carrito
                    if ($item['id'] === $_SESSION['cart'][$line]['id']) {
                        $_SESSION['cart'][$line]['quantity']++; //Aumentamos la cantidad en el array de sesion
                        $productFound = true;
                        break;
                        }
                    }
                //Si no existe el id en el carrito, lo agregamos al array de sesion
                if(!$productFound){
                    $_SESSION['cart'][] = $item;
                }
                //Calculamos el total de articulos y lo guardamos en el array de sesion
                $_SESSION['totals'] = calculateTotals($_SESSION['cart']);
            }//Si no hay carrito, lo creamos y guardamos
            else {
                $_SESSION['cart'][] = $item;
                //Guardamos el total de articulos y precio en el array de sesion
                $_SESSION['totals']['totalItems'] = $item['quantity'];
                $_SESSION['totals']['totalPrice'] = $item['price'];
            }
            //Respuesta OK
            http_response_code(200);
            echo json_encode(Array('success'=>true, 'message' =>'Producto agregado a la cesta!', 'lines'=>$_SESSION['totals']['totalItems']));
            exit;
        }
        //Si no hay stock, devolvemos un error
        else {
            http_response_code(304);
            echo json_encode(Array('success'=>false, 'message' => 'No hay suficiente stock del producto', 'lines'=>$_SESSION['totals']['totalItems']));
            exit;
        }
    }
    //ELIMINAR PRODUCTO DEL CARRITO
    if(isset($_POST['deleteFromCart'])){

        $target = intval($_POST['deleteFromCart']);
        $cart = $_SESSION['cart'];

        //Buscamos el id en el carrito
        for($index=0; $index<count($cart);$index++){

            //Si se encuentra, lo eliminamos
            if($cart[$index]['id'] === $target){

                array_splice($_SESSION['cart'], $index, 1);
                //Recalculamos el total de articulos si hay alguno en el carrito
                if (count($_SESSION['cart'])>0){
                    $_SESSION['totals'] = calculateTotals($_SESSION['cart']);
                }
                //Si no, eliminamos la variable de la sesion
                else unset($_SESSION['totals']);

                http_response_code(200);
                echo json_encode(Array('success'=>true, 'message'=>'eliminado del carrito'));
                exit;
            }
        }
    }
    //Si no se facilita la id, devolvemos un error
    else{
        http_response_code(400);
        echo json_encode(Array('success'=>false, 'message'=>'No se ha facilitado una id', 'lines'=>$_SESSION['totals']));
        exit;
    }


    function calculateTotals($array){
        $totalItems = 0;
        $totalPrice = 0;

        foreach ($array as $item){
            $totalItems+= $item['quantity'];
            $totalPrice += $item['price']*$item['quantity'];
        }

        return Array('totalPrice'=>$totalPrice, 'totalItems'=>$totalItems);
    }