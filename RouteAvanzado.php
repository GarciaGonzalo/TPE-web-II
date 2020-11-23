<?php
    require_once 'Controllers/ChapterController.php';
    require_once 'Controllers/UserController.php';
    require_once 'Controllers/SeasonController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "ChapterController", "Home");
    $r->addRoute("season/:SeasonNumber","GET","ChapterController","LoadSeason");
    $r->addRoute("New","POST","ChapterController","InputChapter");
    $r->addRoute("login","GET","UserController","Login");
    $r->addRoute("verify","POST","UserController","VerifyUser");
    $r->addRoute("logout","GET","UserController","Logout");
    $r->addRoute("detalle/:ID", "GET", "ChapterController", "LoadDetails");
    $r->addRoute("edit/:ID", "POST", "ChapterController", "EditChapter");
    $r->addRoute('delete chapter/:ID','GET',"ChapterController","DeleteChapter");
    $r->addRoute('edit modo/:ID',"GET", "ChapterController", "LoadEdit");
    $r->addRoute("upload modo","GET","ChapterController","UploadModo");
    $r->addRoute("upload chapter","POST","ChapterController","InsertChapter");
    $r->addRoute("seasons","GET","SeasonController","LoadSeasons");
    $r->addRoute("edit_season_modo/:ID","GET","SeasonController","LoadEdit");
    $r->addRoute("edit_season/:ID","POST","SeasonController","EditSeason");
    $r->addRoute("delete season/:ID","GET","SeasonController","DeleteSeason");
    $r->addRoute("upload season modo","GET","SeasonController","UploadSeason");
    $r->addRoute("upload_season","POST","SeasonController","InsertSeason");
    $r->addRoute("register","GET","UserController","RegisterForm");
    $r->addRoute("register","POST","UserController","Register");
    $r->addRoute("edit_user/:ID","GET","UserController","loadEdit");
    $r->addRoute("delete_user/:ID","GET","UserController","deleteUser");
    $r->addRoute("update_user/:ID","GET","UserController","editUser");
    $r->addRoute("user_administration/","GET","UserController","LoadUserAdministration");

    //Ruta por defecto.
    $r->setDefaultRoute("ChapterController", "Home");


    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>