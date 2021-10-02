<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\PembayaranModel;
use App\Models\PendaftaranModel;
use App\Models\PesertaModel;
use App\Models\SekolahModel;
use App\Models\UserModel;

class Verifikasi extends BaseController
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
            'title' => 'Verifikasi Email',
            'judul' => 'Verifikasi Email',
            'validasi' => \Config\Services::validation()
        ];
        return view('Auth/v_verifikasi', $data);
    }

    public function confirm($id, $tokenInput)
    {
        $user = $this->userModel->find($id);
        $token = md5($user['email']);
        if (strcmp($token, $tokenInput) !== 0) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $this->userModel->replace([
                'id_user' => $id,
                'email' => $user['email'],
                'nama' => $user['nama'],
                'password' => $user['password'],
                'status_akun' => 'on'
            ]);

            session()->setFlashdata('pesanRegis', '<div class="alert alert-info" role="alert">Akun anda berhasil terverifikasi!</div>');
            return redirect()->to('/login');
        }
    }

    // public function periksa()
    // {
    //     if ($this->request->isAJAX()) {
    //         $token = $this->request->getVar('token');
    //         $tokenInput = $this->request->getVar('token-input');
    //         if (strcmp($token, $tokenInput) !== 0) {
    //             $msg = [
    //                 'error' => 'Token salah'
    //             ];
    //             echo json_encode($msg);
    //         } else {
    //             $this->userModel->replace([
    //                 'id_user' => $this->request->getVar('id_user'),
    //                 'email' => $this->request->getVar('email'),
    //                 'nama' => $this->request->getVar('nama'),
    //                 'password' => $this->request->getVar('password'),
    //                 'status_akun' => 'on'
    //             ]);
    //             // Kirim email verifikasi
    //             $email = \Config\Services::email();
    //             $email->setFrom('bytecomp2021@gmail.com', 'Bytecomp 2021');
    //             $email->setTo($this->request->getVar('email'));
    //             $email->setSubject('Registrasi Sukses');
    //             $email->setMessage('Selamat akun anda sudah aktif!');

    //             $email->send();
    //             echo json_encode(['status' => true]);
    //         }
    //     } else {
    //         throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    //     }
    // }

}
