<?php

class UserController extends BaseController {

    protected function detail () {
        $param = $_SESSION['user_id'];

        $this->viewParams['user'] = User::getById($param);

        $this->viewParams['posts'] = User::getJoined2ById($param);

        $this->loadView();
    }

    protected function edit () {
        // $this->viewParams['post'] = Post::getAll();

        $this->loadView();
    }
}