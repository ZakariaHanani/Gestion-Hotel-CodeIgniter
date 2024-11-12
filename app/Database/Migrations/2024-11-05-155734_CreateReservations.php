<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReservations extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'client_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => false],
            'chambre_id'    => ['type' => 'INT', 'constraint' => 11],
            'date_debut'    => ['type' => 'DATE'],
            'date_fin'      => ['type' => 'DATE'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('client_id', 'clients', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('chambre_id', 'chambres', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('reservations');
    }

    public function down()
    {
        $this->forge->dropTable('reservations');
    }

    /* ajouter cette query a lDB manuallement
    ALTER TABLE reservations
    ADD COLUMN created_at DATETIME DEFAULT CURRENT_TIMESTAMP; 
    */
}
