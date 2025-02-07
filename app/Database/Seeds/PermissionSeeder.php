<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'create'],
            ['name' => 'read'],
            ['name' => 'edit'],
            ['name' => 'delete'],
        ];


        $this->db->table('permissions')->insertBatch($data);
    }
}
