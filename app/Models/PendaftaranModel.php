<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table                = 'pendaftaran';
    protected $primaryKey           = 'id_pendaftaran';
    protected $allowedFields        = ['id_pendaftaran', 'id_user', 'id_sekolah', 'id_lomba', 'status_pendaftaran'];

    public function getPendaftaran($id = null)
    {
        if ($id) {
            return $this->join('user', 'pendaftaran.id_user = user.id_user')->join('lomba', 'pendaftaran.id_lomba = lomba.id_lomba')->join('sekolah', 'pendaftaran.id_sekolah = sekolah.id_sekolah')->find($id);
        } else {
            return $this->join('user', 'pendaftaran.id_user = user.id_user')->join('lomba', 'pendaftaran.id_lomba = lomba.id_lomba')->join('sekolah', 'pendaftaran.id_sekolah = sekolah.id_sekolah')->findAll();
        }
    }
}
