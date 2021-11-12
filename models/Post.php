<?php

class Post extends BaseModel {

    protected $table = 'posts';
    protected $pk = '';
    protected $fk1 = 'user_id';
    protected $table2 = 'users';
    protected $fk2 = 'id';

    // public function getShortContent () {
    //     return substr($this->content, 0, 100);
    // }
}