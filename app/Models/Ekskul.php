<?php

namespace App\Models;

use CodeIgniter\Model;

class Ekskul extends Model
{
    protected $table = 'ekskul';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'nama_ekskul',
        'nama_pelatih',
        'hari',
        'pukul',
        'kuota',
    ];

    public function kurangKuota($ekskul_updt)
    {
        $kuota_sebelumnya = $this->db->table('ekskul')->where('nama_ekskul', $ekskul_updt)->select('kuota')->get()->getResultArray();
        return $this->db->table('ekskul')
            ->where('nama_ekskul', $ekskul_updt)
            ->update(['kuota' =>  $kuota_sebelumnya[0]['kuota'] - 1]);
    }

    public function tambahKuota($ekskul_updt)
    {
        $kuota_sebelumnya = $this->db->table('ekskul')->where('nama_ekskul', $ekskul_updt)->select('kuota')->get()->getResultArray();
        return $this->db->table('ekskul')
            ->where('nama_ekskul', $ekskul_updt)
            ->update(['kuota' => $kuota_sebelumnya[0]['kuota'] + 1]);
    }
}
