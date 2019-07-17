<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Events extends CI_Migration
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
            'date' => array(
                'type' => 'timestamp',
                'null' => true,
            ),
            'capacity' => array(
                'type' => 'int',
                'constraint' => 11,
            ),
            'address' => array(
                'type' => 'varchar',
                'constraint' => 255,
            ),
            'city' => array(
                'type' => 'varchar',
                'constraint' => 45,
            ),
            'country' => array(
                'type' => 'varchar',
                'constraint' => 45,
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
        $this->dbforge->create_table('event');
        
        echo "Migracion 3 - Eventos: OK <br/>";
    }
    
    public function down()
    {
        $this->dbforge->drop_table('event');
    }
}