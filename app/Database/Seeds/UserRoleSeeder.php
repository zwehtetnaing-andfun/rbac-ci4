<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['user_id' => 1, 'role_id' => 1], 
            ['user_id' => 2, 'role_id' => 2], 
            ['user_id' => 3, 'role_id' => 3], 
        ];

        $this->db->table('user_roles')->insertBatch($data);
    }
}
