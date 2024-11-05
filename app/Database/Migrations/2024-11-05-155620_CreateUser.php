<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUser extends Migration
{ 
    
    public function up()
    {
     $this->forge->addField([
            'id'             => ['type' => 'INT','constraint'=> 11, 'auto_increment' => true],
            'username'       => ['type' => 'VARCHAR', 'constraint' => 100],
            'password'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'email'          => ['type' => 'VARCHAR', 'constraint' => 150],
            'role'           => ['type' => 'ENUM', 'constraint' => ['client', 'admin'], 'default' => 'client'],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],

     ]);

     $this->forge->addPrimaryKey('id');
     $this->forge->createTable('users');
    }

    public function down()
    {
    $this->forge->dropTable('users');
    }
}