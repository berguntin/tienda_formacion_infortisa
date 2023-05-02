<?php

    require 'config/global.php';
    global $smarty;
    $userController = new UserController();

    if (isset($_POST["submit"]) && isset($_POST["mail"]) && isset($_POST["password"])) {
        $user = new User();
        $auth = $user->authenticate($_POST["mail"], $_POST['password']);
    if ($auth) {
        session_start();
        $_SESSION['userId'] = $user->getId();
        $_SESSION['name'] = $user->getName();
        $_SESSION['email'] = $user->getEmail();
        if($user->getLastAccess()){
        $_SESSION['lastAccess'] = $user->getLastAccess();
        $user->setLastAccess(date(DATE_FORMAT));
        }
        else $user->setLastAccess(date(DATE_FORMAT));

        header("Location: index.php");
        exit();
    }
    else{
        global $smarty;
        $smarty->assign('error', 'Credenciales incorrectas!');
        $smarty->display('login.tpl');
        }
    }
