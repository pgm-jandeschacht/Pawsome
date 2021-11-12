<?php

class PostController extends BaseController {

    protected function add () {

        $user_id = $_SESSION['user_id'];
        $check = (isset($_POST['create']));
        $posted = $_POST;
        var_dump($posted);

        if(isset($_FILES['image_upload']) && $_FILES['image_upload']['size'] > 0) {
            $tmp_file = $_FILES['image_upload']['tmp_name'];
            $file_name = $_FILES['image_upload']['name'];

            var_dump($tmp_file);
            move_uploaded_file($tmp_file, './images/posts/' . $file_name);

            $img = $file_name;
        } else {
            $img = '';
        }

        $this->viewParams['post'] = Post::createPost( $user_id, $check, $img, $posted );

        $this->viewParams['breeds'] = Breed::getAll();

        $this->loadView();
    }

    protected function detail () {
        // $this->viewParams['post'] = Post::getAll();

        $this->loadView();
    }

}