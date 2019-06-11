<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Users extends CI_Migration
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
            'name' => array(
                'type' => 'varchar',
                'constraint' => 255,
            ),
            'last_name' => array(
                'type' => 'varchar',
                'constraint' => 255,
            ),
            'email' => array(
                'type' => 'varchar',
                'constraint' => 255,
            ),
            'password' => array(
                'type' => 'varchar',
                'constraint' => 255,
            ),
            'image' => array(
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
        $this->dbforge->create_table('users');

        $data = array(
            array(
                'id' => '1',
                'name' => 'Jesus',
                'last_name' => 'Padilla',
                'password' => $this->encryption->encrypt('123123'),
                'email' => 'jpadilla@setinfo.cl',
                'image' => '',
                'created_at' => '2018-02-22 00:43:00'
            ),
            array(
                'id' => '2',
                'name' => 'Hugo',
                'last_name' => 'Paez',
                'password' => $this->encryption->encrypt('123123'),
                'email' => 'hapj@outlook.cl',
                'image' => '',
                'created_at' => '2018-02-22 00:42:00'
            ),
        );

        $this->db->insert_batch('users', $data);
        
        echo "Migracion 1 - Usuarios: OK <br/>";
    }
    
    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}