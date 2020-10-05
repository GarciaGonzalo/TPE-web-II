<?php
require_once('./libs/smarty/Smarty.class.php');

class FriendsView
{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();   
    }

    function RenderHome($seasons,$logged)
    {
        $this->smarty->assign('seasons',$seasons);
        $this->smarty->assign('logged',$logged);

        $this->smarty->display('templates/home.tpl');
    }

    function RenderList($chapters,$season,$all_seasons,$logged)
    { 
        $this->smarty->assign('chapters',$chapters);
        $this->smarty->assign('season',$season);
        $this->smarty->assign('seasons',$all_seasons);
        $this->smarty->assign('logged',$logged);

        $this->smarty->display('templates/dinamicList.tpl');
    }

    function RenderLogin($seasons,$logged)
    {
        $this->smarty->assign('seasons',$seasons);
        $this->smarty->assign('logged',$logged);

        $this->smarty->display('templates/login.tpl');
    }
    function RenderError($error_message,$error_solution)
    {
        $this->smarty->assign('error_message', $error_message);
        $this->smarty->assign('error_solution', $error_solution);

        $this->smarty->display('templates/error.tpl');
    }
}
