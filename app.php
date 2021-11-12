<?php
session_start();

require 'config.php';

require BASE_DIR . '/libs/db.php';

require BASE_DIR . '/models/BaseModel.php';
require BASE_DIR . '/models/Breed.php';
require BASE_DIR . '/models/Post.php';
require BASE_DIR . '/models/User.php';
require BASE_DIR . '/models/Replies.php';

require BASE_DIR . '/controllers/BaseController.php';

$current_user_id = $_SESSION['user_id'] ?? 0;

if ($current_user_id) {
    $sql = 'SELECT * FROM `users` WHERE `id` = :user_id';
    $pdo_statement = $db->prepare($sql);
    $pdo_statement->execute( [ ':user_id' => $current_user_id ] );
    $user = $pdo_statement->fetchObject();
} else {
    if( strpos($_SERVER['REQUEST_URI'], 'login') === false && 
        strpos($_SERVER['REQUEST_URI'], 'register') === false ) {
        header('location: login');
    }
}
