<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SiswaUserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => '21000',
                'name' => 'Ajin',
                'password' => password_hash('21000', PASSWORD_DEFAULT),
                'role' => 'siswa',
                'ekskul' => null,
                'nilai_ekskul' => null
            ],
            [
                'user_id' => '25000',
                'name' => 'Alpi',
                'password' => password_hash('25000', PASSWORD_DEFAULT),
                'role' => 'siswa',
                'ekskul' => null,
                'nilai_ekskul' => null
            ],
        ];
        $this->db->table('siswa_users')->insertBatch($data);
    }
}
