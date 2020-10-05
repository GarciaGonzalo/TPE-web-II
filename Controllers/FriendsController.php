<?php
require_once './View/FriendsView.php';
require_once './Model/ChapterModel.php';
require_once './Model/SeasonModel.php';
require_once 'UserController.php';
require_once 'seasonController.php';

class FriendsController
{
    private $view;
    private $chapter_model;
    private $season_controller;
    private $user_controller;
    function __construct()
    {
        $this->view = new FriendsView();
        $this->chapter_model = new ChapterModel();
        $this->season_controller = new SeasonController();
        $this->user_controller = new UserController();

    }

    function Home()
    {
        $logged = $this->user_controller->CheckLoggedIn();
        $seasons = $this->season_controller->GetSeasons();
        $this->view->RenderHome($seasons,$logged);
    }

    function LoadSeason($params = null)
    {
        $seasons = $this->season_controller->GetSeasons();
        $season = $params[':SeasonNumber'];
        $chapters = $this->chapter_model->GetChapters($season);
        $logged = $this->user_controller->CheckLoggedIn();
        $this->view->RenderList($chapters, $season, $seasons,$logged);
    }

    function CheckIfExists($new_title)
    {
        $chapters = $this->chapter_model->GetChapters("all");
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
                $this->chapter_model->InsertChapter($_POST['title_input'], $_POST['chapter_count_input'], $_POST['director_input'], $_POST['writer_input'], $_POST['description_input'], $_POST['emision_date_input'], $_POST['season_input']);
            } else {
                $this->view->RenderError('El capitulo que intentas ingresar ya existia','Revisa que capitulos estan cargados antes de cargar uno nuevo');
            }
        }
    }
}
