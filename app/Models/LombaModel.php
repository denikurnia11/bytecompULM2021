<?php

namespace App\Models;

use CodeIgniter\Model;

class LombaModel extends Model
{
    protected $table                = 'lomba';
    protected $primaryKey           = 'id_lomba';
    protected $allowedFields        = ['id_lomba', 'nama_lomba', 'deskripsi_lomba', 'jenis_lomba', 'maks_anggota'];


    public function getNamaLomba()
    {
        return $this->select('id_lomba, nama_lomba')->findAll();
    }
}
