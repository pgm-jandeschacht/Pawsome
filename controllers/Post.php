<?php

class PostController extends BaseController {

    protected function index () {
        $this->viewParams['posts'] = Post::getAll();

        $this->loadView();
    }

    protected function detail ($params) {
        $this->viewParams['post'] = Post::getById($params[0]);
        
        $this->loadView();
    }

}