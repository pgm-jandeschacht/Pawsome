<?php

class SearchController extends BaseController {

    protected function index () {
        // $this->viewParams['posts'] = Post::getAll();

        $param = $_GET['search'] ?? '';

        $this->viewParams['postsSearch'] = User::getSearchUsers($param);
        $this->viewParams['param'] = Breed::getSearchValue($param);

        $this->loadView();
    }
}