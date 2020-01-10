<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user_password extends CI_Migration {
    public function up()
    {
        $fields = array(
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => 64
            )
        );
        $this->dbforge->add_column('users',$fields);
    }
    public function down()
    {
        $this->dbforge->drop_column('users', 'password');
      
    }
}