<?php

class RegisterController extends BaseController {

    protected function index () {
        $posted = $_POST;
        $check = isset($_POST['create']);

        if(isset($_FILES['img']) && $_FILES['img']['size'] > 0) {
            $tmp_file = $_FILES['img']['tmp_name'];
            $file_name = $_FILES['img']['name'];

            // var_dump($tmp_file);
            move_uploaded_file($tmp_file, './images/profilePictures/' . $file_name);

            $img = $file_name;
            
            $this->viewParams['register'] = User::getRegister( $posted, $check, $img );
        }
        

        $this->loadView();
    }
}