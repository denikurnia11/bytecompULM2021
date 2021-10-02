<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaModel extends Model
{
    protected $table                = 'peserta';
    protected $primaryKey           = 'id_peserta';
    protected $allowedFields        = ['id_peserta', 'nisn', 'jenis_peserta', 'nama_peserta', 'no_telepon', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'scan', 'id_user', 'id_sekolah'];

    public function getPeserta($id = null)
    {
        if ($id) {
            return $this->join('user', 'peserta.id_user = user.id_user')->join('sekolah', 'peserta.id_sekolah = sekolah.id_sekolah')->find($id);
        } else {
            return $this->join('user', 'peserta.id_user = user.id_user')->join('sekolah', 'peserta.id_sekolah = sekolah.id_sekolah')->findAll();
        }
    }
}
