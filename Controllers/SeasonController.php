<?php
require_once './Model/SeasonModel.php';
require_once './Model/ChapterModel.php';
require_once './View/FriendsView.php';
require_once 'UserController.php';
class SeasonController
{
    private $model;
    private $view;
    private $user_controller;
    private $chapterModel;
    function __construct()
    {
        $this->model = new SeasonModel();
        $this->chapterModel = new ChapterModel();
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
    function EditSeason($params = null)
    {
    if (isset($_POST['season_number_input']) && isset($_POST['chapter_count_input'])) {
        $logged = $this->user_controller->CheckLoggedIn();
        if ($logged) {
            $id_edit = $params[':ID'];
            $this->model->UpdateSeason($_POST['season_number_input'],$_POST['chapter_count_input'],$id_edit);
            header('location:'.BASE_URL.'seasons');
        } else {
            $this->view->RenderError('no estas loggeado', 'logueate e intenta de nuevo');
        }
    }
}
    function DeleteSeason($params = null)
    {
        $logged = $this->user_controller->CheckLoggedIn();
        if ($logged) {
            $id_borrar = $params[':ID'];
            $this->chapterModel->DeleteAllChapters($id_borrar);
            $this->model->DeleteSeason($id_borrar);
            header('location:'.BASE_URL.'seasons');
        } else {
            $this->view->RenderError('no estas loggeado', 'logueate e intenta de nuevo');
        }
    }
    function UploadSeason()
    {
        $logged = $this->user_controller->CheckLoggedIn();
        $seasons = $this->model->GetSeasons();
        if ($logged) {
            $this->view->RenderUploadSeasonModo($logged,$seasons);
        } else {
            $this->view->RenderError('no estas loggeado', 'logueate e intenta de nuevo');
        }
    }
    function InsertSeason()
    {
        $logged = $this->user_controller->CheckLoggedIn();
        if ($logged) {
            if (isset($_POST['season_number_input']) && isset($_POST['chapter_count_input'])) {
                $this->model->InsertSeason($_POST['season_number_input'],$_POST['chapter_count_input']);
                header('location:'.BASE_URL.'seasons');
            }
        } else {
            $this->view->RenderError('no estas loggeado', 'logueate e intenta de nuevo');
        }
    }
}
