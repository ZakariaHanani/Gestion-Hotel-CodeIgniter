<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTypeChambreTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nom' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('type_chambre');
    }

    public function down()
    {
        $this->forge->dropTable('type_chambre');
    }
}
