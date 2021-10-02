<?php

namespace App\Models;

use CodeIgniter\Model;

class SekolahModel extends Model
{
    protected $table                = 'sekolah';
    protected $primaryKey           = 'id_sekolah';
    protected $allowedFields        = ['id_sekolah', 'id_user', 'npsn', 'nama_sekolah', 'provinsi', 'kota', 'alamat'];


    public function getSekolah()
    {
        return $this->join('user', 'sekolah.id_user = user.id_user')->findAll();
    }
}
