<?php
include_once 'Model/CommentModel.php';
include_once 'services/apis/ApiView.php';
include_once 'Controllers/UserController.php';
include_once 'services/apis/apiController.php';
class CommentsApiController extends apiController
{
    function __construct()
    {
        parent::__construct();
        $this->model = new CommentModel();
        $this->view = new ApiView();
    }

    function getComments($params = null)
    {
        $chapter_id = $params[':ID'];
        if (!empty($chapter_id)) {
            $comments = $this->model->selectCommentsOfChapter($chapter_id);
            if ($comments != null) {
                $this->view->response($comments, 200);
            } else {
                $this->view->response('The server can not find the requested page.', 404);
            }
        } else {
            $this->view->response('The server did not understand the request.', 400);
        }
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
                if ($result > 0) {
                    $this->view->response('The request is accepted.', 202);
                } else {
                    $this->view->response('The server can not find the requested page.', 404);
                }
            } else {
                $this->view->response("The method specified in the request is not allowed.", 405);
            }
        } else {
            $this->view->response("The requested page needs a username and a password.", 401);
        }
    }

    function insertComment()
    {
        $user_controller = new UserController();
        if ($user_controller->CheckLoggedIn()) {
            $data = $this->getData();
            if(!empty($data->content)){
                $content = $data->content;
                $rating = $data->rating;
                $id_chapter = $data->id_chapter;
                $id_user = $_SESSION['user_id'];
                $inserted = $this->model->insertComment($content,$rating,$id_chapter,$id_user);
                if ($inserted) {
                    $this->view->response("The request is complete, and a new resource is created.", 201);
                } else {
                    $this->view->response("The server can not find the requested page.", 404);
                }
            }else{
                $this->view->response("The request could not be completed because of a conflict.", 409); 
            }
        } else {
            $this->view->response("The requested page needs a username and a password.", 401);
        }
    }
}
