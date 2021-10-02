<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table                = 'pembayaran';
    protected $primaryKey           = 'id_pembayaran';
    protected $allowedFields        = ['id_pembayaran', 'id_user', 'bukti', 'created_at', 'status'];

    public function getPembayaran()
    {
        return $this->join('user', 'pembayaran.id_user = user.id_user')->findAll();
    }
}
