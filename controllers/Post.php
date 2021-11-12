<?php

class PostController extends BaseController {
    protected $table = 'posts';

    protected function add () {

        $user_id = $_SESSION['user_id'];
        $check = (isset($_POST['create']));
        $posted = $_POST;

        if(isset($_FILES['image_upload']) && $_FILES['image_upload']['size'] > 0) {
            $tmp_file = $_FILES['image_upload']['tmp_name'];
            $file_name = $_FILES['image_upload']['name'];

            move_uploaded_file($tmp_file, './images/posts/' . $file_name);

            $img = $file_name;
            var_dump($img);
            
            $this->viewParams['post'] = Post::createPost( $user_id, $check, $img, $posted );
        }


        $this->viewParams['breeds'] = Breed::getAll();

        $this->viewParams['user'] = User::getById($user_id);

        $this->loadView();
    }

    protected function detail () {
        // $this->viewParams['post'] = Post::getById();

        $this->loadView();
    }
}