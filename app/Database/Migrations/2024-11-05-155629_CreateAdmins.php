<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdmins extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type'=> 'INT','constraint'=> 11, 'auto_increment' => true],
            'user_id'     => ['type' => 'INT'],
            'permissions' => ['type' => 'TEXT','null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('admins');

    }
    
    public function down()
    {
        $this->forge->dropTable('admins');
    }
}