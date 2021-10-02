<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\PembayaranModel;
use App\Models\PendaftaranModel;
use App\Models\PesertaModel;
use App\Models\SekolahModel;
use App\Models\UserModel;

class Register extends BaseController
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
            'title' => 'Register | Bytecomp 2021',
            'validasi' => \Config\Services::validation()
        ];
        return view('Auth/v_register', $data);
    }
    public function save()
    {
        //Validasi
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong.'
                ]
            ],
            'email' => [
                'rules' => 'is_unique[user.email]|required',
                'errors' => [
                    'is_unique' => 'Email sudah digunakan.',
                    'required' => 'Email tidak boleh kosong.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[15]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong.',
                    'min_length' => 'Password minimal terdiri dari 5 huruf',
                    'max_length' => 'Password maksimal terdiri dari 15 huruf',
                ]
            ],
            'confirm_password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong.',
                ]
            ],
        ])) {
            return redirect()->to('/register')->withInput();
        }
        // Cek confirm password
        $password = $this->request->getVar('password');
        $cpassword = $this->request->getVar('confirm_password');
        if ($password !== $cpassword) {
            session()->setFlashdata('pesan', 'Konfirmasi password tidak sama.');
            return redirect()->to('/register');
        }
        $emailUser = $this->request->getVar('email');

        $this->userModel->save([
            'email' => $emailUser,
            'nama' => $this->request->getVar('nama'),
            'password' => md5($password),
        ]);

        $idUser = $this->userModel->where('email', $emailUser)->first();
        // Token verifikasi
        $token = md5($emailUser);

        // $random_string = "";
        // $valid_chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        // $num_valid_chars = strlen($valid_chars);

        // for ($i = 0; $i < 6; $i++) {
        //     $random_pick = mt_Rand(1, $num_valid_chars);
        //     $random_char = $valid_chars[$random_pick - 1];
        //     $random_string .= $random_char;
        // }


        // Kirim email verifikasi
        $email = \Config\Services::email();
        $email->setFrom('bytecomp2021@gmail.com', 'Bytecomp 2021');
        $email->setTo($this->request->getVar('email'));
        $email->setSubject('Verifikasi akun');
        $email->setMessage('Terimakasih sudah mendaftar. Silakan klik tombol verifikasi dibawah ini.</br> <a class="btn btn-primary" href="' . base_url() . '/auth/verifikasi/confirm/' . $idUser['id_user'] . '/' . $token . '">Verifikasi</a>');

        $email->send();


        session()->setFlashdata('pesanRegis', '<div class="alert alert-info" role="alert">Silakan cek email anda untuk verifikasi.</div>');
        return redirect()->to('/login');
    }
}
