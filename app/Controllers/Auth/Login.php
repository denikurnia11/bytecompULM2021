<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    protected $userModel;
    public function __construct()
    {

        $this->userModel = new UserModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Login | Bytecomp 2021',
        ];
        return view('Auth/v_login', $data);
    }
    public function cek_login()
    {
        $data = $this->request->getVar();
        // Ambil data user di database yang email sama 
        $user = $this->userModel->where('email', $data['email'])->first();

        // Cek email
        if (!$user) {
            // Jika email tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('pesan', 'Email tidak ditemukan');
            return redirect()->to('/login');
        }

        // Cek password
        if ($user['password'] != md5($data['pass'])) {
            session()->setFlashdata('pesan', 'Password salah');
            return redirect()->to('/login');
        }

        // Cek status akun
        if ($user['status_akun'] == 'off') {
            session()->setFlashdata('pesan', 'Email belum terverivikasi');
            return redirect()->to('auth/verifikasi');
        }

        // Jika benar, arahkan user masuk ke aplikasi 
        $sessLogin = [
            'isLogin' => true,
            'idUser' => $user['id_user'],
            'nama' => $user['nama'],
            'role' => $user['role']
        ];
        session()->set($sessLogin);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
