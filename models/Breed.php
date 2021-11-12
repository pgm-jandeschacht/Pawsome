<?php

class Breed extends BaseModel {

    protected $table = 'breed';
    protected $pk = 'breed_id';

    protected function getSearch( $search ) {
        global $db;

        $exec_var = [];

        if($search !== '') {
            $sql = 'SELECT * FROM `' . $this->table . '` WHERE `name` LIKE ?';

            $exec_var[] = "%$search%";

        } else {
            $sql = 'SELECT * FROM `' . $this->table . '`';
        }

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute($exec_var);

        $db_items = $pdo_statement->fetchAll(); 
        $items = [] ;

        foreach($db_items as $db_item) {
            $items[] = $this->castDbObjectToModel($db_item);
        }

        return $items;
    }

    protected function getSearchValue ( $search ) {
        global $db;

        return $search;
    }
}