<?php

class HomeController extends BaseController {

    protected function index () {
        // $this->viewParams['post'] = Post::getAll();

        $this->loadView();
    }

}