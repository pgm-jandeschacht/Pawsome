<?php

class RegisterController extends BaseController {

    protected function index () {
        $posted = $_POST;
        $check = isset($_POST['create']);
        
        $this->viewParams['register'] = User::getRegister( $posted, $check );

        $this->loadView();
    }
}