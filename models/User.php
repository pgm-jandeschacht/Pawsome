<?php

class User extends BaseModel {

    protected $table = 'users';
    protected $pk = 'id';
    protected $fk1 = '';
    protected $table2 = 'posts';
    protected $fk2 = 'user_id';
}