<?php

class BreedsController extends BaseController {

    protected function index () {

        $url = $_SERVER['QUERY_STRING'];
        $exploded = explode("=", $url);        
        $param = $exploded[2] ?? '';
        
        $this->viewParams['breeds'] = Breed::getSearch($param);
        $this->viewParams['param'] = Breed::getSearchValue($param);

        $this->loadView();
    }

}