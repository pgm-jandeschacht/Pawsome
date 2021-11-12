<?php

class BaseModel {

    protected $table;
    protected $pk;
    protected $fk1;
    protected $table2;
    protected $fk2;
    protected $table3;
    protected $fk3;
    
    public static function __callStatic ($method, $arg) {
        $obj = new static;
        $result = call_user_func_array (array ($obj, $method), $arg);
        if (method_exists ($obj, $method))
            return $result;
        return $obj;
    }

    private function getAll() {
        global $db;

        $sql = 'SELECT * FROM `' . $this->table . '`';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();

        $db_items = $pdo_statement->fetchAll(); 
        $items = [] ;

        foreach($db_items as $db_item) {
            $items[] = $this->castDbObjectToModel($db_item);
        }

        return $items;
    }

    private function getById( int $id ) {
        global $db;

        $sql = 'SELECT * FROM `' . $this->table . '` WHERE `' . $this->pk . '` = :p_id';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [ ':p_id' => $id ] );

        $db_item = $pdo_statement->fetchObject();

        return $this->castDbObjectToModel($db_item);
    }

    private function getJoined2() {
        global $db;

        $sql = 'SELECT * FROM `' . $this->table . '` INNER JOIN `' . $this->table2 . '` ON `' . $this->table . '`.`' . $this->fk1 . '` = `' . $this->table2 . '`.`' . $this->fk2 . '` ORDER BY `' . $this->table . '`.`created_on` DESC';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();

        $db_items = $pdo_statement->fetchAll(); 
        $items = [] ;

        foreach($db_items as $db_item) {
            $items[] = $this->castDbObjectToModel($db_item);
        }

        return $items;
    }

    private function getJoined3() {
        global $db;

        $sql = 'SELECT * FROM `' . $this->table . '` 
                INNER JOIN `' . $this->table2 . '` ON `' . $this->table . '`.`' . $this->fk2 . '` = `' . $this->table2 . '`.`' . $this->pk . '` 
                INNER JOIN `' . $this->table3 . '` ON `' . $this->table . '`.`' . $this->fk3 . '` = `' . $this->table3 . '`.`' . $this->pk . '` 
                ORDER BY `' . $this->table . '`.`created_on` ASC';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();

        $db_items = $pdo_statement->fetchAll(); 
        $items = [] ;

        foreach($db_items as $db_item) {
            $items[] = $this->castDbObjectToModel($db_item);
        }

        var_dump($sql);

        return $items;
    }

    private function getJoined2ById( int $id ) {
        global $db;

        $sql = 'SELECT * FROM `' . $this->table . '` INNER JOIN `' . $this->table2 . '` ON `' . $this->table . '`.`' . $this->pk . '` = `' . $this->table2 . '`.`' . $this->fk2 . '` WHERE `' . $this->table . '`.`' . $this->pk . '` = :p_id';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [ ':p_id' => $id ] );

        $db_items = $pdo_statement->fetchAll();
        $items = [] ;

        foreach($db_items as $db_item) {
            $items[] = $this->castDbObjectToModel($db_item);
        }

        return $items;
    }

    public function castDbObjectToModel ($db_item) {

        $db_item = (object) $db_item;
        //Creates new Model
        $model_name = get_class($this);
        $item = new $model_name();
        //Loops through the db columns and 
        
        foreach($db_item as $column => $value) {
            $item->{$column} = $value;
        } 
        return $item;
    }

    //static method to call like: Model::deleteById(1);
    private function deleteById( int $id ) {
        global $db;

        $sql = 'DELETE FROM `' . $this->table . '` WHERE `' . $this->pk . '` = :p_id';
        $pdo_statement = $db->prepare($sql);
        return $pdo_statement->execute( [ ':p_id' => $id ] );
    }

    //public method to call like: $my_model->delete();
    public function delete () {
        $this->deleteById( $this->{$pk} );
    }
}