<?php

class Post extends BaseModel {

    protected $table = 'posts';
    protected $pk = 'id';

    // public function getShortContent () {
    //     return substr($this->content, 0, 100);
    // }
}