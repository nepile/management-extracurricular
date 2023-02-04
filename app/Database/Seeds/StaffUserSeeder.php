<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StaffUserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => '22000',
                'name' => 'Syahrin',
                'password' => password_hash('22000', PASSWORD_DEFAULT),
                'role' => 'staff',
            ]
        ];
        $this->db->table('staff_users')->insertBatch($data);
    }
}
