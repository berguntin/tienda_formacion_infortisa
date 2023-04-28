<?php
    require_once 'config/global.php';
    require 'vendor/autoload.php';

    global $smarty;

    $sessionController = new UserController();

    if(isset($_SESSION['userId'])){
        $sessionController->start($_SESSION['userId']);
    }
    else{
        $sessionController->autenticate();
    }







