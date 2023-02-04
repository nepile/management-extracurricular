<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaUsers extends Model
{
    protected $table = 'siswa_users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'user_id',
        'name',
        'role',
        'password',
        'ekskul',
        'nilai_ekskul',
        'created_at'
    ];
}
