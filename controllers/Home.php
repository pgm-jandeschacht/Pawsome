<?php

class HomeController extends BaseController {

    protected function index ($params) {

        $param = $_SESSION['user_id'];
        $check = (isset($_POST['create']));
        $posted = $_POST;

        $this->viewParams['posts'] = Post::getJoined3();

        $this->viewParams['user'] = User::getById($param);

        $this->viewParams['postsUser'] = User::getJoined2ByIdLimited($param);

        $this->viewParams['comments'] = Post::getAllComments();

        $this->viewParams['upload'] = Replies::createReply( $param, $check, $posted );

        // $this->viewParams['replies'] = Replies::

        $this->loadView();
    }

}