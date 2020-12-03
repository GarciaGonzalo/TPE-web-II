<?php
include_once 'Model/ratingModel.php';
include_once 'View/FriendsView.php';
require_once 'UserController.php';
class ratingController
{
    private $model;
    private $view;
    private $user_controller;
    function __construct()
    {
        $this->model = new ratingModel();
        $this->view = new FriendsView;
        $this->user_controller = new UserController();
    }

    function rateChapter($params = null)
    {
        $logged = $this->user_controller->CheckLoggedIn();
        if ($logged) {
            $id_chapter = $params[':ID'];
            if (!isset($_SESSION)) {
                session_start();
            }
            $id_user =  $_SESSION['user_id'];
            if (isset($_POST['rating'])) {


                if ($this->model->getRating($id_chapter, $id_user)) {
                    $done = $this->model->updateRating($_POST['rating'], $id_user, $id_chapter);
                    if ($done) {
                        header('location:' . BASE_URL . 'detalle/' . $id_chapter);
                    } else {
                        $this->view->RenderError("something went wrong", "check your internet connection and try again");
                    }
                } else {
                    $done = $this->model->insertRating($_POST['rating'], $id_user, $id_chapter);
                    if ($done) {
                        header('location:' . BASE_URL . 'detalle/' . $id_chapter);
                    } else {
                        $this->view->RenderError("something went wrong", "check your internet connection and try again");
                    }
                }
            } else {
                $this->view->RenderError("we couldn't get your rating", 'try again');
            }
        } else {
            header('location:' . BASE_URL . 'login');
        }
    }
}
