<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserRoles extends Migration
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
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'role_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ]
        ]);
        $this->forge->addKey('id',true);
        $this->forge->addForeignKey('user_id','users','id');
        $this->forge->addForeignKey('role_id','roles','id');
        $this->forge->createTable('user_roles');
    }

    public function down()
    {
        $this->forge->dropTable('user_roles');
    }
}
