<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUser extends Migration
{ 
    
    public function up()
    {
     $this->forge->addField([
            'id'             => ['type' => 'INT','constraint'=> 11,'unsigned' => true,'auto_increment' => true,'null' => false],
            'email'          => ['type' => 'VARCHAR', 'constraint' => 150],
            'password'       => ['type' => 'VARCHAR', 'constraint' => 255],
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