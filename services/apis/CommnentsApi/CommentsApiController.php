<?php
include_once 'Model/CommentModel.php';
include_once 'services/apis/ApiView.php';
include_once 'Controllers/UserController.php';
class CommentsApiController
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new CommentModel();
        $this->view = new ApiView();
    }

    function getComments($params = null)
    {
        $chapter_id = $params[':ID'];
        $comments = $this->model->selectCommentsOfChapter($chapter_id);
        $this->view->response($comments, 200);
    }

    function DeleteComment($params = null)
    {
        $user_controller = new UserController();
        
        if ($user_controller->CheckLoggedIn()) {
            $user_model = new UserModel();
            $user = $user_model->getUser($_SESSION['user']);
            if ($user->super_user == 1) {
                $id_delete = $params[':ID'];
               $result = $this->model->deleteComment($id_delete);
               if ($result > 0 ) {
                $this->view->response('The request is accepted.',202);
            }else{
                $this->view->response('The server can not find the requested page.',404);
               }
            }else {
                $this->view->response("The method specified in the request is not allowed.", 405 );
            }

        } else {
            $this->view->response("The requested page needs a username and a password.", 401);
        }
    }
}
