<?php

namespace App\Models;

use CodeIgniter\Model;

class PelatihUsers extends Model
{
    protected $table = 'pelatih_users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'user_id',
        'name',
        'role',
        'ekskul',
        'password',
        'created_at'
    ];
}
