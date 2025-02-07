<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['username' => 'admin', 'email' => 'admin@gmail.com', 'password' => password_hash('password', PASSWORD_BCRYPT)],
            ['username' => 'manager', 'email' => 'manager@gmail.com', 'password' => password_hash('password', PASSWORD_BCRYPT)],
            ['username' => 'accountant', 'email' => 'accountant@gmail.com', 'password' => password_hash('password', PASSWORD_BCRYPT)],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
