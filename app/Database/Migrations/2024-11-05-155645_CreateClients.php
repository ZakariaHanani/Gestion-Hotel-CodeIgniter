<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClients extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id'          => ['type' => 'INT', 'constraint' => 11,'unsigned' => true, 'null' => false],
            'nom'              => ['type' => 'VARCHAR', 'constraint' => 255],
            'prenom'           => ['type' => 'VARCHAR', 'constraint' => 255],
            'telephone'        => ['type' => 'VARCHAR', 'constraint' => 15],
            'adresse'          => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at'       => ['type' => 'DATETIME', 'null' => true],
            'updated_at'       => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('user_id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');  // Clé étrangère reliant `user_id` à `id` dans `users`
        $this->forge->createTable('clients');
    }

    public function down()
    {
        $this->forge->dropTable('clients');
    }
}
