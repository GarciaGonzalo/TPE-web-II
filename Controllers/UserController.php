<?php
require_once './View/FriendsView.php';
require_once './Model/UserModel.php';
require_once 'seasonController.php';

class UserController
{
    private $model;
    private $view;
    private $season_controller;

    function __construct()
    {
        $this->model = new UserModel();
        $this->view = new FriendsView();
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

    function Login()
    {
        $this->season_controller = new SeasonController();
        $seasons = $this->season_controller->GetSeasons();
        $logged = $this->CheckLoggedIn();
        $this->view->RenderLogin($seasons, $logged);
    }

    function VerifyUser()
    {
        if (isset($_POST['email_input']) && isset($_POST['pass_input']) && !empty($_POST['email_input']) && !empty($_POST['pass_input'])) {
            $email = $_POST['email_input'];
            $password = $_POST['pass_input'];
            $hash = $this->model->GetHash($email);
            if ($hash) {
                if (password_verify($password, $hash->password)) {
                    session_start();
                    $_SESSION['user'] = $email;
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
        $season_model = new SeasonModel();
        $seasons = $season_model->GetSeasons();
        $logged = $this->CheckLoggedIn();
        $this->view->RenderResgisterForm($seasons, $logged);
    }
    function Register()
    {
        //              algun otro error handling ya estoy re quemado
        if (!$this->CheckLoggedIn()) 
        {

            if (isset($_POST['email_input']) && isset($_POST['pass_input'])) 
            {
                if (!$this->model->GetHash($_POST['email_input'])) 
                {
                    $hash = password_hash($_POST['pass_input'], PASSWORD_DEFAULT);
                    $response = $this->model->InsertUser($_POST['email_input'], $hash);

                    if ($response) 
                    {
                        session_start();
                        $_SESSION['user'] = $_POST['email_input'];
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

    function Logout()
    {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL);
    }
}
