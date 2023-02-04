<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranEkskul extends Model
{
    protected $table = 'pendaftaran_ekskul';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'siswa_id',
        'name',
        'id_ekskul',
        'created_at'
    ];

    public function getEkskulPendaftaran()
    {
        return $this->db->table('pendaftaran_ekskul')
            ->join('ekskul', 'pendaftaran_ekskul.id_ekskul=ekskul.nama_ekskul')
            ->get()->getResultArray();
    }
}
