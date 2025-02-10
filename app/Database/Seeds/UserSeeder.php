<?php

namespace App\Database\Seeds;

use App\Libraries\Hash;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['username' => 'admin', 'email' => 'admin@gmail.com', 'password' => Hash::make('password')],
            ['username' => 'manager', 'email' => 'manager@gmail.com', 'password' => Hash::make('password')],
            ['username' => 'accountant', 'email' => 'accountant@gmail.com', 'password' => Hash::make('password')],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
