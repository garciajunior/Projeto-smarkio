<?php

class Messages extends MY_Model
{
    public function __construct()
    {
        $this->table = 'messages';
        $this->primary_key = 'id';
        $this->fillable = array('id_user', 'text_message');
        $this->protected = array('created_at','updated_at');
        parent::__construct();
    }   
}
