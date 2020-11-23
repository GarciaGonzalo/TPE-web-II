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
                    $this->view->RenderError('La contraseña que introdujiste no coincide con el mail', 'si ya estas registrado intenta de nuevo checkeando tu ortografia');
                }
            } else {
                $this->view->RenderError('El mail que ingresaste parece no estar registrado', 'si ya estas registrado intenta de nuevo checkeando tu ortografia');
            }
        } else {
            $this->view->RenderError('Faltan completar campos', 'completa todos los campos y vuelve a intentar');
        }
    }

    function RegisterForm()
    {
        $seasons = $this->season_model->GetSeasons();
        $logged = $this->CheckLoggedIn();
        $admin = $this->user_controller->checkAdmin();
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
                        $_SESSION['user_id'] = $hashAndId->id;
                        $_SESSION['LAST_ACTIVITY'] = time();

                        header("location:" . BASE_URL);
                    } else {
                        $this->view->RenderError('Algo malo ha pasado', 'comunicate con el administrador de la pagina');
                    }
                } else {
                    $this->view->RenderError('ya hay un usuario con este mail', 'por ahora no podemos hacer nada, proba con otro email');
                }
            } else {
                $this->view->RenderError('faltan completar campos obligatorios', 'intenta de nuevo completando todos los campos');
            }
        } else {
            $this->Logout();
            $this->view->RenderError('ya habia un usuario logeado', 'no se preocupe ya cerramos la sesion por usted');
        }
    }
    function LoadUserAdministration()
    {
        $seasons = $this->season_model->GetSeasons();
        $logged = $this->CheckLoggedIn();
        $admin = $this->checkAdmin();
        $user = $this->model->getAllUsers();
        if ($logged && $admin) {
            $this->view->RenderUserAdministration($seasons, $logged, $user, $admin);
        } else {
            $this->view->RenderError('Necesitas permisos de super usuario para realizar esta funcion', 'contacta al administrador del sitio');
        }
    }
    function editUser($params = null)
    {
        if (isset($_POST['email_input']) && isset($_POST['super_user_input'])) {
            $logged = $this->CheckLoggedIn();
            $admin = $this->checkAdmin();
            if ($logged && $admin) {
                $id_edit = $params[':ID'];
                $this->model->UpdateUser($_POST['email_input'], $_POST['super_user_input'], $id_edit);
                header('location:' . BASE_URL . 'user_administration');
            } else {
                $this->view->RenderError('Necesitas permisos de super usuario para realizar esta funcion', 'contacta al administrador del sitio');
            }
        }
    }
    function deleteUser($params = null)
    {
        $logged = $this->CheckLoggedIn();
        $admin = $this->checkAdmin();
        if ($logged && $admin) {
            $id_borrar = $params[':ID'];
            $this->model->DeleteUser($id_borrar);
            header('location:' . BASE_URL . 'user_administration');
        } else {
            $this->view->RenderError('Necesitas permisos de super usuario para realizar esta funcion', 'contacta al administrador del sitio');
        }
    }
    function loadEdit($params = null)
    {
        $logged = $this->CheckLoggedIn();
        $admin = $this->checkAdmin();
        if ($logged && $admin) {
            $id_edit = $params[':ID'];
            $seasons = $this->season_model->GetSeasons();
            $user_edit = $this->model->GetUserId($id_edit);

            $this->view->RenderEditUser($seasons, $logged, $user_edit, $admin);
        } else {
            $this->view->RenderError('Necesitas permisos de super usuario para realizar esta funcion', 'contacta al administrador del sitio');
        }
    }
    function Logout()
    {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL);
    }
}
