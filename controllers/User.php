<?php

class UserController extends BaseController {

    protected function detail ($params) {
        $this->viewParams['user'] = User::getById($params[0]);

        $this->viewParams['posts'] = User::getJoined2ById($params[0]);

        $this->loadView();
    }

    protected function edit () {
        // $this->viewParams['post'] = Post::getAll();

        $this->loadView();
    }

}