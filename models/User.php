<?php

class User extends BaseModel {

    protected $table = 'users';
    protected $pk = 'id';
    protected $fk1 = '';
    protected $table2 = 'posts';
    protected $fk2 = 'user_id';
    protected $limit = 6;

    protected function getLogin( $posted ) {

        global $db;

        if(isset($posted['email']) && isset($posted['password'])) {
            $email = $posted['email'];
            $password_from_form = $posted['password'];

            $sql = 'SELECT * FROM `users` WHERE `email` = :email';
            $pdo_statement = $db->prepare($sql);
            $pdo_statement->execute( [ ':email' => $email ] );
            $user = $pdo_statement->fetchObject();

            // var_dump($user->id);

            if($user && password_verify($password_from_form, $user->password)) {
                $_SESSION['user_id'] = $user->id;
                header('location: /');
            } else {
                echo 'email en/ of wachtwoord is verkeerd';
            }
        };
    }

    protected function getLogout() {
        session_start();
        session_destroy();

        header('location: login');
    }

    protected function getRegister( $posted, $check, $img ) {
        global $db;

        $values = [];

        if($check) {
            $values[':firstname'] = trim($posted['firstname']);
            $values[':lastname'] = trim($posted['lastname']);
            $values[':email'] = trim($posted['email']);
            $values[':pwd'] = password_hash( $posted['password'], PASSWORD_DEFAULT );
            $values[':img'] = $img;

            $valid = true;

            if( empty($values[':firstname']) || empty($values[':lastname']) || empty($values[':email']) || empty($values[':pwd']) ) {
                $valid = false;
            }

            if ( $this->emailExists( $values[':email'] ) ) {
                echo "Email bestaat al x" ;
                $valid = false;
            }

            if($valid) {

                $id = $this->createUser($values);
                $_SESSION['user_id'] = $id;
                echo "Succesvol $id aangemaakt";
                header('Location: /');

            } else {
                echo 'FAIL';
            }
        }
    }

    protected function emailExists($email) {
        global $db;
        $sql = "SELECT COUNT(email) FROM users WHERE email = ?";
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [ $email ] );
        $numberOfUsers = (int) $pdo_statement->fetchColumn();
        return ( $numberOfUsers > 0 ) ;
    }

    protected function createUser($values) {
        global $db;
    
        foreach($values as $property => &$value) {
            if($property != ':pwd' || $property != ':img') {
                $value = htmlspecialchars($value);
            }
        }
    
        $sql = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`, `img`)
        VALUES (:firstname, :lastname, :email, :pwd, :img)";
    
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( $values );
    
        return $db->lastInsertId();
    }

    protected function getSearchUsers( $param ) {
        global $db;

        $exec_var = [];

        if($param !== '') {
            $sql = 'SELECT * FROM `users` 
                    INNER JOIN `posts` ON `users`.`user_id` = `posts`.`user_id` 
                    WHERE `firstname` LIKE ?';

            $exec_var[] = "%$param%";

        } else {
            $sql = 'SELECT * FROM `users`
                    INNER JOIN `posts` ON `users`.`user_id` = `posts`.`user_id` ORDER BY `posts`.`created_on` DESC';
        }

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute($exec_var);

        $db_items = $pdo_statement->fetchAll(); 
        $items = [] ;

        foreach($db_items as $db_item) {
            $items[] = $this->castDbObjectToModel($db_item);
        }

        // var_dump($items);

        return $items;
    }

}