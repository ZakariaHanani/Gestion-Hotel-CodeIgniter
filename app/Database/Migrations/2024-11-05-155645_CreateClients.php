<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClients extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'constraint'=> 11,'auto_increment' => true],
            'nom'              => ['type' => 'VARCHAR', 'constraint' => 255],
            'prenom'           => ['type' => 'VARCHAR', 'constraint' => 255],
            'telephone'        => ['type' => 'VARCHAR', 'constraint' => 15],
            'adresse'          => ['type' => 'VARCHAR', 'constraint' => 255],
            'user_id'          => ['type' => 'INT']

        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('clients');
    }

    public function down()
    {
        $this->forge->dropTable('clients') ;
    }
}