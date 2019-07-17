<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Tickets extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'int',
                'constraint' => 11,
                'auto_increment' => true,
            ),
            'name' => array(
                'type' => 'varchar',
                'constraint' => 45,
            ),
            'type' => array(
                'type' => 'varchar',
                'constraint' => 45,
            ),
            'price' => array(
                'type' => 'int',
                'constraint' => 11,
            ),
            'quantity' => array(
                'type' => 'int',
                'constraint' => 11,
            ),
            'event_id' => array(
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
                'foreign_key' => array(
                    'table' => 'event',
                    'field' => 'id'
                )
            ),
            'created_at' => array(
                'type' => 'timestamp',
                'null' => true,
            ),
            'updated_at' => array(
                'type' => 'timestamp',
                'null' => true,
            ),
            'deleted_at' => array(
                'type' => 'timestamp',
                'null' => true,
            ),
        ));

        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('ticket');
        
        echo "Migracion 4 - Entradas: OK <br/>";
    }
    
    public function down()
    {
        $this->dbforge->drop_table('ticket');
    }
}