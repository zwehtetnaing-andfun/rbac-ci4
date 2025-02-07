<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'admin'],
            ['name' => 'manager'],
            ['name' => 'accountant'],
        ];

        $this->db->table('roles')->insertBatch($data);
    }
}
