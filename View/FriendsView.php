<?php
require_once('./libs/smarty/Smarty.class.php');

class FriendsView
{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();   
    }

    function RenderHome()
    {
        $this->smarty->display('templates/home.tpl');
    }

    function RenderList($chapters,$season)
    { 
        $this->smarty->assign('chapters',$chapters);
        $this->smarty->assign('season',$season);

        $this->smarty->display('templates/dinamicList.tpl');
    }
}
