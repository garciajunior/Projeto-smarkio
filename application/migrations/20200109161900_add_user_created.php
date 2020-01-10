<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user_created extends CI_Migration {
    public function up()
    {
        $fields = array(
            'created_at' => array(
                'type' => 'datetime'
            ),
            'updated_at' => array(
                'type' => 'datetime'
            ),
        );
        $this->dbforge->add_column('users',$fields);
    }
    public function down()
    {
        $this->dbforge->drop_column('users', 'created_at');
        $this->dbforge->drop_column('users', 'updated_at');
      
    }
}