<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Permissions extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'unique' => true
            ]
        ]);
        $this->forge->addKey('id',true);
        $this->forge->createTable('permissions');

    }

    public function down()
    {
        $this->forge->dropTable('permissions');
    }
}
