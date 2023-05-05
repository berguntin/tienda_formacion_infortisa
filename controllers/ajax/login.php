<?php

    require '../../config/global.php';
    global $smarty;


    if (isset($_POST["mail"]) && isset($_POST["password"])) {
        $user = new User();
        $auth = $user->authenticate($_POST["mail"], $_POST['password']);

        if ($auth) {

            $_SESSION['userId'] = $user->getId();
            $_SESSION['name'] = $user->getName();
            $_SESSION['email'] = $user->getEmail();

            if($user->getLastAccess()){
                $_SESSION['lastAccess'] = $user->getLastAccess();
                $user->setLastAccess(date(DATE_FORMAT));
            }
            else $user->setLastAccess(date(DATE_FORMAT));

            http_response_code(200);
            echo json_encode(Array('success'=>true));
            exit;

        }
        else{
            //Asignamos un mensaje de error a la plantilla que se mostrara en login de nuevo
            global $smarty;
            $smarty->assign('error', 'Credenciales incorrectas!');
            //Devolvemos el error y redirigimos
            http_response_code(401);
            echo json_encode(Array('success'=>false, 'message'=>'Credenciales incorrectas!'));
            exit;
            }
    }
