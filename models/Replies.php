<?php

class Replies extends BaseModel {

    protected function createReply($param, $check, $posted) {
        global $db;

        $values = [];

        if($check) {
            $values[':user_id'] = $param;
            $values[':post_id'] = $posted['post_id'];
            $values[':comment'] = $posted['comment'];

            $sql = "INSERT INTO `replies` (`user_id`, `post_id`, `comment`)
            VALUES (:user_id, :post_id, :comment)";
    
            $pdo_statement = $db->prepare($sql);
            $pdo_statement->execute( $values );
        }
    }

}