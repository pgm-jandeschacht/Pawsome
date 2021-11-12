<?php

class User extends BaseModel {

    protected $table = 'users';
    protected $pk = 'id';
    protected $fk1 = '';
    protected $table2 = 'posts';
    protected $fk2 = 'user_id';

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

    protected function getRegister( $posted, $check ) {
        global $db;

        $values = [];

        if($check) {
            $values[':firstname'] = trim($posted['firstname']);
            $values[':lastname'] = trim($posted['lastname']);
            $values[':email'] = trim($posted['email']);
            $values[':pwd'] = password_hash( $posted['password'], PASSWORD_DEFAULT );

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
            if($property != ':pwd') {
                $value = htmlspecialchars($value);
            }
        }
    
        $sql = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`)
        VALUES (:firstname, :lastname, :email, :pwd)";
    
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( $values );
    
        return $db->lastInsertId();
    }
}