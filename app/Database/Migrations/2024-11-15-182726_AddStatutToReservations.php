<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatutToReservations extends Migration
{
    public function up()
    {
        $fields = [
            'statut' => [
                'type'       => 'ENUM',
                'constraint' => ['en attente', 'confirmée', 'annulée', 'terminée'],
                'default'    => 'en attente',
                'null'       => false,
                'after'      => 'date_fin', // Ajoute la colonne après `date_fin`
            ],
        ];

        $this->forge->addColumn('reservations', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('reservations', 'statut');
    }
}
