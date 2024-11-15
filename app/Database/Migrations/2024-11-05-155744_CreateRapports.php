<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRapports extends Migration
{
    public function up()
    {
        
    $this->forge->addField([
        'id'             => ['type' => 'INT','constraint'=> 11, 'auto_increment' => true],
        'titre'          => ['type' => 'VARCHAR', 'constraint' => 255], 
        'description'    => ['type' => 'TEXT', 'null' => true],        
        'type_rapport'   => ['type' => 'ENUM', 'constraint' => ['mensuel', 'annuel', 'journalier', 'personnalise']],
        'donnees'        => ['type' => 'TEXT', 'null' => true],      
        'created_at'     => ['type' => 'DATETIME', 'null' => true],
    ]);
    $this->forge->addPrimaryKey('id');
    $this->forge->createTable('rapports');

    
}

public function down()
{
    $this->forge->dropTable('rapports');
}
}
