<?php
require_once './View/FriendsView.php';
require_once './Model/FriendsModel.php';
class FriendsController
{
    private $view;
    private $model;
    function __construct()
    {
        $this->view = new FriendsView;
        $this->model = new FriendsModel;
    }

    function Home()
    {
        $this->view->RenderHome();
    }

    function LoadSeason($params = null)
    {
        $season = $params[':SeasonNumber'];
        $chapters = $this->model->GetChapters($season);
        $this->view->RenderList($chapters,$season);
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
            if (!isset($existence)) 
            {
                $this->model->InsertChapter($_POST['title_input'],$_POST['chapter_count_input'],$_POST['director_input'],$_POST['writer_input'],$_POST['description_input'],$_POST['emision_date_input'],$_POST['season_input']);
            }
            else
            {
                echo(' ya existia ');
            }
        }
    }
}
