<?php

class HomeController extends BaseController {

    protected function index ($params) {
        $this->viewParams['posts'] = Post::getJoined2();

        // $this->viewParams['user'] = User::getById($params[0]);

        // $this->viewParams['userPost'] = User::getJoined2ById($params[0]);

        $this->loadView();
    }

}