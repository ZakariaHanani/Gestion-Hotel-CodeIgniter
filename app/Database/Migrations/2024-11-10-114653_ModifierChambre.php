<?php
// /app/Database/Migrations/2024-11-08-ModifyChambreTableAddType.php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifierChambre extends Migration
{
    public function up()
    {
        $this->forge->addColumn('chambres', [
            'type_chambre_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
        ]);


        $this->forge->addForeignKey('type_chambre_id', 'type_chambre', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropForeignKey('chambres', 'chambre_type_chambre_id_foreign');
        $this->forge->dropColumn('chambres', 'type_chambre_id');
    }
}
