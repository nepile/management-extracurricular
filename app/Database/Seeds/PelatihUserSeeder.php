<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PelatihUserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => '20000',
                'name' => 'Mahmud',
                'password' => password_hash('20000', PASSWORD_DEFAULT),
                'role' => 'pelatih',
                'ekskul' => 'BTQ'
            ]
        ];
        $this->db->table('pelatih_users')->insertBatch($data);
    }
}
