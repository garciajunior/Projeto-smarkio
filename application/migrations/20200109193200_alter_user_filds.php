<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_user_filds extends CI_Migration
{
    public function up()
    {
        $this->dbforge->modify_column(
         'users',  
         array(            
            'email' => array(
               'type' => 'VARCHAR',
               'constraint' => 256,
               'null' => false,
               'unique' =>TRUE
            ),
           )
        );           
    }

    public function down()
    {
        
    }
}