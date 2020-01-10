<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_message extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(
           array(
              'id' => array(
                 'type' => 'INT',
                 'constraint' => 11,
                 'unsigned' => true,
                 'auto_increment' => true
              ),
              'id_user' => array(
                 'type' => 'int',
                 'constraint' => 11,
              ),
              'text_message' => array(
                 'type' => 'TEXT',
                 'null' => true,
              ),
              'created_at' => array(
                'type' => 'datetime'
            ),
            'updated_at' => array(
                'type' => 'datetime'
            ),
           )
        );

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('messages');
    }

    public function down()
    {
        $this->dbforge->drop_table('messages');
    }
}