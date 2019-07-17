<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Invoice extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'folio' => array(
                'type' => 'int',
                'constraint' => 11,
                'auto_increment' => true,
            ),
            'price' => array(
                'type' => 'int',
                'constraint' => 11,
            ),
            'date' => array(
                'type' => 'timestamp',
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
        $this->dbforge->create_table('invoice');
        
        echo "Migracion 5 - Boleta: OK <br/>";
    }
    
    public function down()
    {
        $this->dbforge->drop_table('invoice');
    }
}