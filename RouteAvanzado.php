<?php
    require_once 'Controllers/FriendsController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "FriendsController", "Home");
    $r->addRoute("mermelada", "GET", "FriendsController", "Home");
    $r->addRoute("season/:SeasonNumber","GET","FriendsController","LoadSeason");
    $r->addRoute("New","POST","FriendsController","InputChapter");
    //Ruta por defecto.
    $r->setDefaultRoute("FriendsController", "Home");


    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>