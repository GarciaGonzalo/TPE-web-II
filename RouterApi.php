<?php
    require_once 'RouterClass.php';
    require_once 'services/apis/CommnentsApi/CommentsApiController.php';

    $r = new Router();
    $r->addRoute('comments/:ID','GET','CommentsApiController','GetComments');
    $r->addRoute('comment/:ID','DELETE','CommentsApiController','DeleteComment');



    //run
    $r->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
