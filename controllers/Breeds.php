<?php

class BreedsController extends BaseController {

    protected function index () {
       
        $param = $_GET['search_breeds'] ?? '';
        
        $this->viewParams['breeds'] = Breed::getSearch($param);
        $this->viewParams['param'] = Breed::getSearchValue($param);

        $this->loadView();
    }

}