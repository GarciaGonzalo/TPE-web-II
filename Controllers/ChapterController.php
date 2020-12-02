<?php
require_once './View/FriendsView.php';
require_once './Model/ChapterModel.php';
require_once 'Model/ratingModel.php';
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
        $admin = $this->user_controller->checkAdmin();
        $this->view->RenderHome($seasons, $logged, $admin);
    }

    function LoadSeason($params = null)
    {
        $seasons = $this->season_controller->GetSeasons();
        $season = $params[':SeasonNumber'];
        if ($season !== 'all') {
            $id_season = $this->season_controller->GetSeasonId($season);
            $chapters = $this->model->GetChapters($id_season->id);
        } else {
            $chapters = $this->model->GetChapters($season);
        }

        $logged = $this->user_controller->CheckLoggedIn();
        $admin = $this->user_controller->checkAdmin();
        $this->view->RenderList($chapters, $season, $seasons, $logged, $admin);
    }

    function LoadDetails($params = null)
    {
        $id_details = $params[':ID'];
        $chapter_details = $this->model->GetChapter($id_details);
        if ($chapter_details) {
            $logged = $this->user_controller->CheckLoggedIn();
            $admin = $this->user_controller->checkAdmin();
            $seasons = $this->season_controller->GetSeasons();
            $season = $this->season_controller->GetSeasons($chapter_details->id_season);
            $ratingModel = new ratingModel();
            if (!isset($_SESSION)) {
                session_start();
            }
            $id_user =  $_SESSION['user_id'];
            $rating = $ratingModel->getRating($id_details, $id_user);
            $season_number = $season[0]->season;

            $this->view->RenderDetails($seasons, $logged, $chapter_details, $season_number, $admin, $rating);
        } else {
            $this->view->RenderError("we can't get your content", "check your link and your connection, then try again");
        }
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

    function LoadEdit($params = null)
    {
        $logged = $this->user_controller->CheckLoggedIn();
        $admin = $this->user_controller->checkAdmin();
        if ($logged) {
            if ($admin) {
                $id_edit = $params[':ID'];
                $seasons = $this->season_controller->GetSeasons();
                $chapter_to_edit = $this->model->GetChapter($id_edit);

                $this->view->RenderEdit($seasons, $logged, $chapter_to_edit, $admin);
            } else {
                $this->view->RenderError("you don't have super-user rights", "if you think this is a mistake contact the page administrator");
            }
        } else {
            $this->view->RenderError("you're not logged in", 'log in and try again');
        }
    }

    function EditChapter($params = null)
    {
        if (isset($_POST['title_edit']) && isset($_POST['chapter_number_edit']) && isset($_POST['director_edit']) && isset($_POST['writer_edit']) && isset($_POST['description_edit']) && isset($_POST['emision_date_edit'])) {
            $logged = $this->user_controller->CheckLoggedIn();
            $admin = $this->user_controller->checkAdmin();
            if ($logged) {
                if ($admin) {
                    $id = $params[':ID'];
                    $thumbnail_path = $this->getThumbnailPath();
                    if (!empty($_FILES['image_input']['name'])) {
                        $old_path = $this->model->getThumbnailPath($id);
                        $this->deleteFile($old_path->thumbnail_path);
                    }
                    $this->model->UpdateChapter($_POST['title_edit'], $_POST['director_edit'], $_POST['writer_edit'], $_POST['description_edit'], $_POST['emision_date_edit'], $_POST['chapter_number_edit'], $id, $thumbnail_path);
                    header('Location:' . BASE_URL . 'detalle/' . $id);
                } else {
                    $this->view->RenderError("you don't have super-user rights", "if you think this is a mistake contact the page administrator");
                }
            } else {
                $this->view->RenderError("you're not logged in", 'log in and try again');
            }
        } else {
            $this->view->RenderError("you didn't complete all fields", "do so and try again");
        }
    }

    function deleteFile($path)
    {
        if (file_exists($path)) {
            return unlink($path);
        } else {
            return true;
        }
    }

    function DeleteChapter($params = null)
    {
        $logged = $this->user_controller->CheckLoggedIn();
        $admin = $this->user_controller->checkAdmin();
        if ($logged) {
            if ($admin) {
                $id = $params[':ID'];
                $rating_model = new ratingModel();
                $rating_model->deleteRatingChapter($id);
                $old_path = $this->model->getThumbnailPath($id);
                $this->deleteFile($old_path->thumbnail_path);
                $id_season = $this->model->DeleteChapter($id);
                $season_model = new SeasonModel();
                $season = $season_model->GetSeasons($id_season->id_season);
                header('location:' . BASE_URL . 'season/' . $season[0]->season);
            } else {
                $this->view->RenderError("you don't have super-user rights", "if you think this is a mistake contact the page administrator");
            }
        } else {
            $this->view->RenderError("you're not logged in", 'log in and try again');
        }
    }

    function UploadModo()
    {
        $logged = $this->user_controller->CheckLoggedIn();
        $admin = $this->user_controller->checkAdmin();
        if ($logged) {
            if ($admin) {
                $seasons = $this->season_controller->GetSeasons();
                $this->view->RenderUploadModo($seasons, $logged, $admin);
            } else {
                $this->view->RenderError("you don't have super-user rights", "if you think this is a mistake contact the page administrator");
            }
        } else {
            $this->view->RenderError("you're not logged in", 'log in and try again');
        }
    }

    function getThumbnailPath()
    {
        $thumbnail_path = null;
        if (isset($_FILES['image_input']) && !empty($_FILES['image_input']['name']) && $_FILES['image_input']['type'] == "image/jpeg") {
            $img_dir = getcwd() . "/images";
            $file = tempnam($img_dir, $_FILES['image_input']['name']);
            move_uploaded_file($_FILES['image_input']['tmp_name'], $file);
            $thumbnail_path = "images/" . basename($file);
        }
        return $thumbnail_path;
    }

    function InsertChapter()
    {
        $thumbnail_path = $this->getThumbnailPath();
        $logged = $this->user_controller->CheckLoggedIn();
        $admin = $this->user_controller->checkAdmin();
        if ($logged) {
            if ($admin) {
                if (isset($_POST['title_input']) && isset($_POST['chapter_number_input']) && isset($_POST['director_input']) && isset($_POST['writer_input']) && isset($_POST['description_input']) && isset($_POST['emision_date_input']) && isset($_POST['season_input'])) {
                    if (!$this->CheckIfExists($_POST['title_input'])) {
                        $season_number = $_POST['season_input'];
                        $season_id = $this->season_controller->GetSeasonId($season_number);
                        $this->model->InsertChapter($_POST['title_input'], $_POST['chapter_number_input'], $_POST['director_input'], $_POST['writer_input'], $_POST['description_input'], $_POST['emision_date_input'], $season_id->id, $thumbnail_path);
                        header('location:season/' . $season_number);
                    } else {
                        $this->view->RenderError('we already had that chapter', 'try with another one');
                    }
                } else {
                    $this->view->RenderError("you didn't complete all fields", 'do so and try again');
                }
            } else {
                $this->view->RenderError("you don't have super-user rights", "if you think this is a mistake contact the page administrator");
            }
        } else {
            $this->view->RenderError("you're not logged in", 'log in and try again');
        }
    }
}
