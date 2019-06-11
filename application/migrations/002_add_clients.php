<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Clients extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ),
            'rut' => array(
                'type' => 'varchar',
                'constraint' => 255,
                'unsigned' => true,
            ),
            'name' => array(
                'type' => 'varchar',
                'constraint' => 255,
            ),
            'last_name_p' => array(
                'type' => 'varchar',
                'constraint' => 255,
            ),
            'last_name_m' => array(
                'type' => 'varchar',
                'constraint' => 255,
            ),
            'email' => array(
                'type' => 'varchar',
                'constraint' => 255,
            ),
            'gender' => array(
                'type' => 'varchar',
                'constraint' => 255,
            ),
            'age' => array(
                'type' => 'varchar',
                'constraint' => 255,
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
        $this->dbforge->create_table('clients');
        
        echo "Migracion 2 - Clientes: OK <br/>";
    }
    
    public function down()
    {
        $this->dbforge->drop_table('clients');
    }
}