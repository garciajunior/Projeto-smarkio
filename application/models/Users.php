<?php

class Users extends MY_Model
{
    public function __construct()
    {
        $this->table = 'users';
        $this->primary_key = 'id';
        $this->fillable = array('name', 'email', 'password');
        $this->protected = array('created_at','updated_at');
        parent::__construct();
    }   
}
