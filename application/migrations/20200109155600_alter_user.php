<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_user extends CI_Migration
{
    public function up()
    {
        $this->dbforge->modify_column(
         'users',  
         array(            
            'email' => array(
               'type' => 'TEXT',
               'null' => false,
            ),
           )
        );           
    }

    public function down()
    {
        
    }
}