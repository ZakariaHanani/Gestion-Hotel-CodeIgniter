<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePaiements extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'constraint'=> 11,'auto_increment' => true],
            'reservation_id'   => ['type' => 'INT','constraint'=> 11],
            'montant'          => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'methode'          => ['type' => 'VARCHAR', 'constraint' => 50],
            'date'             => ['type' => 'DATETIME'],
            'statut'           => ['type' => 'ENUM', 'constraint' => ['en_attente', 'effectue', 'echoue'], 'default' => 'en_attente'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('reservation_id', 'reservations', 'id', 'CASCADE','CASCADE');
        $this->forge->createTable('paiements');
        
    }

    public function down()
    {
        $this->forge->dropTable('paiements');
        }
}

