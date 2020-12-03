<?php
require_once './View/FriendsView.php';
require_once './Model/UserModel.php';
require_once 'seasonController.php';

class UserController
{
    private $model;
    private $view;
    private $season_controller;
    private $season_model;

    function __construct()
    {
        $this->model = new UserModel();
        $this->view = new FriendsView();
        $this->season_model = new SeasonModel();
    }

    function CheckLoggedIn()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
    }

    function checkAdmin()
    {
        if ($this->CheckLoggedIn()) {
            $user = $this->model->getUser($_SESSION['user']);
            if ($user->super_user == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function Login()
    {
        $this->season_controller = new SeasonController();
        $seasons = $this->season_controller->GetSeasons();
        $logged = $this->CheckLoggedIn();
        $admin = $this->checkAdmin();
        $this->view->RenderLogin($seasons, $logged, $admin);
    }

    function VerifyUser()
    {
        if (isset($_POST['email_input']) && isset($_POST['pass_input']) && !empty($_POST['email_input']) && !empty($_POST['pass_input'])) {
            $email = $_POST['email_input'];
            $password = $_POST['pass_input'];
            $hashAndId = $this->model->getHashAndId($email);
            if ($hashAndId) {
                if (password_verify($password, $hashAndId->password)) {
                    session_start();
                    $_SESSION['user'] = $email;
                    $_SESSION['user_id'] = $hashAndId->id;
                    $_SESSION['LAST_ACTIVITY'] = time();
                    header("location:" . BASE_URL);
                } else {
                    $this->view->RenderError('you introduced a wrong password', 'please check your spelling and try again');
                }
            } else {
                $this->view->RenderError('this mail is not registered', 'please check your spelling and try again');
            }
        } else {
            $this->view->RenderError("you didn't complete all fields", "do so and try again");
        }
    }

    function RegisterForm()
    {
        $seasons = $this->season_model->GetSeasons();
        $logged = $this->CheckLoggedIn();
        $admin = $this->checkAdmin();
        $this->view->RenderResgisterForm($seasons, $logged, $admin);
    }
    function Register()
    {
        if (!$this->CheckLoggedIn()) {

            if (isset($_POST['email_input']) && isset($_POST['pass_input'])) {
                $hashAndId = $this->model->getHashAndId($_POST['email_input']);
                if (!$hashAndId) {
                    $hash = password_hash($_POST['pass_input'], PASSWORD_DEFAULT);
                    $response = $this->model->InsertUser($_POST['email_input'], $hash);

                    if ($response) {
                        session_start();
                        $_SESSION['user'] = $_POST['email_input'];
                        $_SESSION['user_id'] = $this->model->getHashAndId($_POST['email_input'])->id;
                        $_SESSION['LAST_ACTIVITY'] = time();

                        header("location:" . BASE_URL);
                    } else {
                        $this->view->RenderError('something went wrong', 'try again later. If the problem persists contact the page administrator');
                    }
                } else {
                    $this->view->RenderError('this mail was already in use', 'contact the page administrator');
                }
            } else {
                $this->view->RenderError("you didn't complete all fields", "do so and try again");
            }
        } else {
            $this->Logout();
            $this->view->RenderError('there was a user logged in already', "don't worry we already closed it for you");
        }
    }
    function LoadUserAdministration()
    {
        $seasons = $this->season_model->GetSeasons();
        $logged = $this->CheckLoggedIn();
        $admin = $this->checkAdmin();
        $users = $this->model->getAllUsers();
        if ($logged) {
            if ($admin) {
                if (!isset($_SESSION)) {
                    session_start();
                }
                $id_user =  $_SESSION['user_id'];
                $this->view->RenderUserAdministration($seasons, $logged, $users, $admin, $id_user);
            } else {
                $this->view->RenderError("you don't have super-user rights", "if you think this is a mistake contact the page administrator");
            }
        } else {
            $this->view->RenderError("you're not logged in", 'log in and try again');
        }
    }
    function editUser($params = null)
    {
        if (isset($_POST['email_input']) && isset($_POST['super_user_input'])) {
            $logged = $this->CheckLoggedIn();
            $admin = $this->checkAdmin();
            if ($logged) {
                if ($admin) {
                    $id_edit = $params[':ID'];
                    $this->model->UpdateUser($_POST['email_input'], $_POST['super_user_input'], $id_edit);
                    header('location:' . BASE_URL . 'user_administration');
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
    function deleteUser($params = null)
    {
        $logged = $this->CheckLoggedIn();
        $admin = $this->checkAdmin();
        if ($logged) {
            if ($admin) {
                if ($this->model->superUserCount() > 1) {
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    $id_user =  $_SESSION['user_id'];
                    $id_borrar = $params[':ID'];
                    $rating_model = new ratingModel();
                    $rating_model->deleteRatingUser($id_borrar);
                    $this->model->DeleteUser($id_borrar);

                    if ($id_borrar == $id_user) {
                        $this->Logout();
                    } else {
                        header('location:' . BASE_URL . 'user_administration');
                    }
                }else{
                    $this->view->RenderError("you're the last super user","contact the page administrator");
                }
            } else {
                $this->view->RenderError("you don't have super-user rights", "if you think this is a mistake contact the page administrator");
            }
        } else {
            $this->view->RenderError("you're not logged in", 'log in and try again');
        }
    }

    function Logout()
    {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL);
    }

    function changeSuperUser($params = null)
    {
        $logged = $this->CheckLoggedIn();
        $admin = $this->checkAdmin();
        if ($logged) {
            if ($admin) {
                $id = $params[':ID'];
                if (!isset($_SESSION)) {
                    session_start();
                }
                if ($id == $_SESSION['user_id']) {
                    $this->view->RenderError("you can't take your own super user out", "contact page administrator");
                } else {
                    $this->model->changeSuperUser($id);
                    header('Location: ' . BASE_URL . '/user_administration');
                }
            } else {
                $this->view->RenderError("you don't have super-user rights", "if you think this is a mistake contact the page administrator");
            }
        } else {
            $this->view->RenderError("you're not logged in", 'log in and try again');
        }
    }
}
