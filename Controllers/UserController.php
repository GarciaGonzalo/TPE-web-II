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
        $this->season_controller = new SeasonController();
    }

    function CheckLoggedIn()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
    }

    function Login()
    {
        $seasons = $this->season_controller->GetSeasons();
        $logged = $this->CheckLoggedIn();
        $this->view->RenderLogin($seasons,$logged);
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
                    header("location:".BASE_URL);
                } else {
                    $this->view->RenderError('La contraseña que introdujiste no coincide con el mail','si ya estas registrado intenta de nuevo checkeando tu ortografia');
                    
                }
            } else {
                $this->view->RenderError('El mail que ingresaste parece no estar registrado','si ya estas registrado intenta de nuevo checkeando tu ortografia');    
                echo ('');
            }
        } else {
            $this->view->RenderError('Faltan completar campos','completa todos los campos y vuelve a intentar');
            //echo ('');
        }
    }
}
