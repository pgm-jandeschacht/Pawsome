<?php

class HomeController extends BaseController {

    protected function index () {
        // $this->viewParams['posts'] = Post::getAll();

        $this->loadView();
    }

}