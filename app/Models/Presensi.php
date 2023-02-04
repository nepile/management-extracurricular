<?php

namespace App\Models;

use CodeIgniter\Model;

class Presensi extends Model
{
    protected $table = 'presensi_ekskul';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'user_id',
        'name',
        'ekskul',
        'role',
        'tgl_presensi'
    ];
}
