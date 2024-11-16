<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateImage extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'chambre_id' => [
                'type' => 'INT',
                'constraint'=> 11,
                'null'=>false
            ],
            'image_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('chambre_id', 'chambres', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('images');
        
    }

    public function down()
    {
        $this->forge->dropTable('images');
    }
}
