<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table                = 'user';
    protected $primaryKey           = 'id_user';
    protected $allowedFields        = ['id_user', 'email', 'nama', 'password', 'role', 'status_akun'];

    public function getColUser()
    {
        return $this->select('id_user, nama')->findAll();
    }
}
