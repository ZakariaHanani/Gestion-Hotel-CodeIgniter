<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateChambres extends Migration
{
    public function up()
    {
            $this->forge->addField([
                'id'        => ['type' => 'INT','constraint'=> 11, 'auto_increment' => true],
                'numero'    => ['type' => 'VARCHAR','constraint' => 10, 'unique' => true] ,
                'type'      => ['type' => 'VARCHAR','constraint' => 100],
                'prix'      => ['type' => 'FLOAT'],
                'description'=>['type' => 'TEXT' ,'null'=> true] ,
                'statut'    => ['type' => 'ENUM', 'constraint' => ['disponible', 'occupe'], 'default' => 'disponible']
            ]
            );

            $this->forge->addPrimaryKey('id');
            $this->forge->createTable('chambres');

    }

    public function down()
    {
        $this->forge->dropTable('chambres');
    }
}
