<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanEkskul extends Model
{
    protected $table = 'kegiatan_ekskul';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'kegiatan',
        'ekskul',
        'created_at'
    ];
}
