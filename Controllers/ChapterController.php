<?php
require_once './View/FriendsView.php';
require_once './Model/ChapterModel.php';
require_once 'UserController.php';
require_once 'seasonController.php';

class ChapterController
{
    private $view;
    private $model;
    private $season_controller;
    private $user_controller;
    function __construct()
    {
        $this->view = new FriendsView();
        $this->model = new ChapterModel();
        $this->season_controller = new SeasonController();
        $this->user_controller = new UserController();
    }

    function Home()
    {
        $logged = $this->user_controller->CheckLoggedIn();
        $seasons = $this->season_controller->GetSeasons();
        $this->view->RenderHome($seasons, $logged);
    }

    function LoadSeason($params = null)
    {
        $seasons = $this->season_controller->GetSeasons();
        $season = $params[':SeasonNumber'];
        if ($season !== 'all') {
            $id_season = $this->season_controller->GetSeasonId($season);
            $chapters = $this->model->GetChapters($id_season->id);
        } else {
            $chapters = $this->model->GetChapters('all');
        }
        $logged = $this->user_controller->CheckLoggedIn();
        $this->view->RenderList($chapters, $season, $seasons, $logged);
    }

    function CheckIfExists($new_title)
    {
        $chapters = $this->model->GetChapters("all");
        foreach ($chapters as $chapter) {
            $title = $chapter->title;
            if ($title == $new_title) {
                return true;
            }
        }
    }

    function InputChapter()
    {
        if (isset($_POST['title_input']) && isset($_POST['director_input']) && isset($_POST['writer_input']) && isset($_POST['description_input']) && isset($_POST['emision_date_input']) && isset($_POST['season_input'])) {
            $existence = $this->CheckIfExists($_POST['title_input']);
            if (!isset($existence)) {
                $this->model->InsertChapter($_POST['title_input'], $_POST['chapter_count_input'], $_POST['director_input'], $_POST['writer_input'], $_POST['description_input'], $_POST['emision_date_input'], $_POST['season_input']);
            } else {
                $this->view->RenderError('El capitulo que intentas ingresar ya existia', 'Revisa que capitulos estan cargados antes de cargar uno nuevo');
            }
        }
    }
    function LoadEdit($params = null)
    {
        $logged = $this->user_controller->CheckLoggedIn();
        if ($logged) {
            $id_edit = $params[':ID'];
            $seasons = $this->season_controller->GetSeasons();
            $chapter_to_edit = $this->model->GetChapter($id_edit);

            $this->view->RenderEdit($seasons, $logged, $chapter_to_edit);
        } else {
            $this->view->RenderError('no estas loggeado', 'logueate e intenta de nuevo');
        }
    }

    function EditChapter($params = null)
    {
        if (isset($_POST['title_edit']) && isset($_POST['chapter_number_edit']) && isset($_POST['director_edit']) && isset($_POST['writer_edit']) && isset($_POST['description_edit']) && isset($_POST['emision_date_edit'])) {
            $logged = $this->user_controller->CheckLoggedIn();
            if ($logged) {
                $id_toedit = $params[':ID'];
                $this->model->UpdateChapter($_POST['title_edit'], $_POST['director_edit'], $_POST['writer_edit'], $_POST['description_edit'], $_POST['emision_date_edit'], $_POST['chapter_number_edit'], $id_toedit);
                $this->Home();
            } else {
                $this->view->RenderError('El Numero del capitulo que intentas editar no existe', 'Revisa que capitulos estan cargados antes de editar');
            }
        }
    }
    function DeleteChapter($params = null)
    {
        $logged = $this->user_controller->CheckLoggedIn();
        if ($logged) {
            $id_borrar = $params[':ID'];

            $this->model->DeleteChapter($id_borrar);
            header('location:'.BASE_URL.'season/all');
        } else {
            $this->view->RenderError('no estas loggeado', 'logueate e intenta de nuevo');
        }
    }
    function UploadModo()
    {
        $logged = $this->user_controller->CheckLoggedIn();
        if ($logged) {
            $seasons = $this->season_controller->GetSeasons();
            $this->view->RenderUploadModo($seasons, $logged);
        } else {
            $this->view->RenderError('no estas loggeado', 'logueate e intenta de nuevo');
        }
    }
    function InsertChapter()
    {
        $logged = $this->user_controller->CheckLoggedIn();
        if ($logged) {
            if (isset($_POST['title_input']) && isset($_POST['chapter_number_input']) && isset($_POST['director_input']) && isset($_POST['writer_input']) && isset($_POST['description_input']) && isset($_POST['emision_date_input']) && isset($_POST['season_input'])) {
                $season_number=$_POST['season_input'];
                $season_id = $this->season_controller->GetSeasonId($season_number);
                $this->model->InsertChapter($_POST['title_input'],$_POST['chapter_number_input'], $_POST['director_input'], $_POST['writer_input'], $_POST['description_input'], $_POST['emision_date_input'], $season_id->id);
                header('location:season/'.$season_number);
            }
        } else {
            $this->view->RenderError('no estas loggeado', 'logueate e intenta de nuevo');
        }
    }
}
