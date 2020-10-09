<?php
require_once './Model/SeasonModel.php';
require_once './View/FriendsView.php';
require_once 'UserController.php';
class SeasonController
{
    private $model;
    private $view;
    private $user_controller;
    function __construct()
    {
        $this->model = new SeasonModel();
        $this->view = new FriendsView();
        $this->user_controller = new UserController();
    }

    function GetSeasons()
    {
       return $this->model->GetSeasons();
    }
    function GetSeasonId($season){
       return $this->model->GetSeasonId($season);
    }
    function LoadSeasons(){
        $seasons=$this->GetSeasons();
        $logged = $this->user_controller->CheckLoggedIn();
        $this->view->RenderSeasons($seasons,$logged);
    }
    function LoadEdit($params = null)
    {
        $logged = $this->user_controller->CheckLoggedIn();
        if ($logged) {
            $id_edit = $params[':ID'];
            $seasons = $this->model->GetSeasons();
            $season_to_edit =  $this->model->GetSeasons($id_edit);
            
            $this->view->RenderSeasonEdit($seasons, $logged,$season_to_edit );
        } else {
            $this->view->RenderError('no estas loggeado', 'logueate e intenta de nuevo');
        }
    }
}
