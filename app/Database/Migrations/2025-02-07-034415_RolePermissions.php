<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RolePermissions extends Migration
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
            'role_id' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'permission_id' => [
                'type' => 'INT',
                'unsigned' => true
            ],
        ]);
        $this->forge->addKey('id',true);
        $this->forge->addForeignKey('role_id','roles','id');
        $this->forge->addForeignKey('permission_id','permissions','id');
        $this->forge->createTable('role_permissions');
    }

    public function down()
    {
        $this->forge->dropTable('role_permissions');
    }
}
