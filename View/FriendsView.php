<?php
require_once('./libs/smarty/Smarty.class.php');

class FriendsView
{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function RenderHome($seasons, $logged,$admin)
    {
        $this->smarty->assign('seasons', $seasons);
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('admin', $admin);

        $this->smarty->display('templates/home.tpl');
    }

    function RenderList($chapters, $season, $all_seasons, $logged, $admin)
    {
        $this->smarty->assign('chapters', $chapters);
        $this->smarty->assign('season', $season);
        $this->smarty->assign('seasons', $all_seasons);
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('admin', $admin);

        $this->smarty->display('templates/dinamicList.tpl');
    }

    function RenderLogin($seasons, $logged,$admin)
    {
        $this->smarty->assign('seasons', $seasons);
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('admin', $admin);

        $this->smarty->display('templates/login.tpl');
    }
    function RenderResgisterForm($seasons, $logged,$admin)
    {
        $this->smarty->assign('seasons', $seasons);
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('admin', $admin);

        $this->smarty->display('templates/register.tpl');
    }
    function RenderError($error_message, $error_solution)
    {
        $this->smarty->assign('error_message', $error_message);
        $this->smarty->assign('error_solution', $error_solution);

        $this->smarty->display('templates/error.tpl');
    }
    function RenderEdit($seasons, $logged, $chapter,$admin)
    {
        $this->smarty->assign('seasons', $seasons);
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('chapter', $chapter);
        $this->smarty->assign('admin', $admin);
        $this->smarty->display('templates/edit.tpl');
    }
    function RenderUploadModo($seasons, $logged,$admin)
    {
        $this->smarty->assign('seasons', $seasons);
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('admin', $admin);

        $this->smarty->display('templates/uploadform.tpl');
    }
    function RenderSeasons($seasons, $logged,$admin)
    {
        $this->smarty->assign('seasons', $seasons);
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('admin', $admin);

        $this->smarty->display('templates/seasons_list.tpl');
    }
    function RenderSeasonEdit($seasons, $logged, $season_to_edit,$admin)
    {
        $this->smarty->assign('seasons', $seasons);
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('season_edit', $season_to_edit[0]);
        $this->smarty->assign('admin', $admin);

        $this->smarty->display('templates/edit_season_form.tpl');
    }
    function RenderUploadSeasonModo($logged, $seasons,$admin)
    {
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('seasons', $seasons);
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('admin', $admin);

        $this->smarty->display('templates/upload_season_form.tpl');
    }
    function RenderDetails($seasons, $logged, $chapter, $season_number,$admin)
    {
        $this->smarty->assign('seasons', $seasons);
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('chapter', $chapter);
        $this->smarty->assign('season_number', $season_number);
        $this->smarty->assign('admin', $admin);

        $this->smarty->display('templates/chapter_details.tpl');
    }
    function RenderUserAdministration($seasons,$logged,$user,$admin){
        $this->smarty->assign('seasons', $seasons);
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('admin', $admin);

        $this->smarty->display('templates/user_administration.tpl');
    }
    function RenderEditUser($seasons,$logged,$user,$admin){
        $this->smarty->assign('seasons', $seasons);
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('admin', $admin);

        $this->smarty->display('templates/edit_user.tpl');
    }
}
