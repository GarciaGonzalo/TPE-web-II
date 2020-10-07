<?php
    require_once 'Controllers/ChapterController.php';
    require_once 'Controllers/UserController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "ChapterController", "Home");
    $r->addRoute("mermelada", "GET", "ChapterController", "Home");
    $r->addRoute("season/:SeasonNumber","GET","ChapterController","LoadSeason");
    $r->addRoute("New","POST","ChapterController","InputChapter");
    $r->addRoute("login","GET","UserController","Login");
    $r->addRoute("verify","POST","UserController","VerifyUser");
    $r->addRoute("logout","GET","UserController","Logout");
    $r->addRoute("edit/:ID", "POST", "ChapterController", "EditChapter");
    $r->addRoute('delete chapter/:ID','GET',"ChapterController","DeleteChapter");
    $r->addRoute('edit modo/:ID',"GET", "ChapterController", "LoadEdit");
    //Ruta por defecto.
    $r->setDefaultRoute("ChapterController", "Home");


    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>