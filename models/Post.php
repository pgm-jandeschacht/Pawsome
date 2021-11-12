<?php

class Post extends BaseModel {

    protected $table = 'posts';
    protected $pk = 'post_id';
    protected $table2 = 'users';
    protected $fk2 = 'user_id';
    protected $table3 = 'breed';
    protected $fk3 = 'breed_id';

    // public function getShortContent () {
    //     return substr($this->content, 0, 100);
    // }

    protected function getAllComments () {
        global $db;

        $sql = 'SELECT * FROM `replies` INNER JOIN `users` ON `replies`.`user_id` = `users`.`user_id`';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();

        $db_items = $pdo_statement->fetchAll(); 
        $items = [] ;

        foreach($db_items as $db_item) {
            $items[] = $this->castDbObjectToModel($db_item);
        }

        return $items;
    }

    protected function createPost( $user_id, $check, $img, $posted ) {
        global $db;

        $values = [];
    
        if($check) {
            $values[':user_id'] = $user_id;
            $values[':breed_id'] = $posted['breed_id'];
            $values[':media'] = $img;
            $values[':description'] = $posted['description'];
            
            foreach($values as &$value) {
                $value = htmlspecialchars($value);
            }

            $sql = "INSERT INTO `posts` (`user_id`, `breed_id`, `media`, `description`)
            VALUES (:user_id, :breed_id, :media, :description)";
    
            $pdo_statement = $db->prepare($sql);
            $pdo_statement->execute( $values );

            header('location: /');
        } 
    }
}