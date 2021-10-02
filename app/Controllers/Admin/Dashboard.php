<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PembayaranModel;
use App\Models\PendaftaranModel;
use App\Models\PesertaModel;
use App\Models\SekolahModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    protected $pembayaranModel, $pendaftaranModel, $userModel, $pesertaModel, $sekolahModel;
    public function __construct()
    {
        $this->pembayaranModel = new PembayaranModel();
        $this->pendaftaranModel = new PendaftaranModel();
        $this->userModel = new UserModel();
        $this->pesertaModel = new PesertaModel();
        $this->sekolahModel = new SekolahModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Dashboard | Bytecomp 2021',
            'judul' => 'Dashboard',
            'pembayaran' => $this->pembayaranModel->select('status')->findAll(),
            'pendaftaran' => $this->pendaftaranModel->select('status_pendaftaran')->findAll(),
            'user' => $this->userModel->select('role')->findAll(),
            'peserta' => $this->pesertaModel->countAllResults(),
            'sekolah' => $this->sekolahModel->countAllResults(),
        ];
        return view('Admin/v_dashboard', $data);
    }
}
