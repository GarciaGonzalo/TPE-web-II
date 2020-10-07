<?php
    require_once 'Controllers/FriendsController.php';
    require_once 'Controllers/UserController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "FriendsController", "Home");
    $r->addRoute("mermelada", "GET", "FriendsController", "Home");
    $r->addRoute("season/:SeasonNumber","GET","FriendsController","LoadSeason");
    $r->addRoute("New","POST","FriendsController","InputChapter");
    $r->addRoute("login","GET","UserController","Login");
    $r->addRoute("verify","POST","UserController","VerifyUser");
    $r->addRoute("logout","GET","UserController","Logout");
    $r->addRoute("edit", "GET", "FriendsController", "LoadEdit");
    $r->addRoute("edit", "POST", "FriendsController", "EditChapter");
    //Ruta por defecto.
    $r->setDefaultRoute("FriendsController", "Home");


    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>