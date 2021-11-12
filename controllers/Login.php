<?php

class LoginController extends BaseController {

    protected function index () {
        $posted = $_POST;
        // $check = isset($_POST['create']);
        // var_dump($check);
        
        $this->viewParams['login'] = User::getLogin( $posted );

        $this->loadView();
    }
}