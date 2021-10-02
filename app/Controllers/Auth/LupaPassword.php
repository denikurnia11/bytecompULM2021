<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LupaPassword extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Lupa Password | Bytecomp 2021',
        ];
        return view('Auth/v_lupaPassword', $data);
    }

    public function periksa()
    {

        $emailUser = $this->request->getVar('email');
        // Ambil data user di database yang email sama 
        $user = $this->userModel->where('email', $emailUser)->first();
        // Cek email
        if (!$user) {
            session()->setFlashdata('pesan', 'Email tidak ditemukan');
            return redirect()->to('/lupaPassword');
        } else {
            // Token reset password
            $random_string = "";
            $valid_chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $num_valid_chars = strlen($valid_chars);

            for ($i = 0; $i < 6; $i++) {
                $random_pick = mt_Rand(1, $num_valid_chars);
                $random_char = $valid_chars[$random_pick - 1];
                $random_string .= $random_char;
            }

            // Kirim email verifikasi
            $email = \Config\Services::email();
            $email->setFrom('bytecomp2021@gmail.com', 'Bytecomp 2021');
            $email->setTo($emailUser);
            $email->setSubject('Reset Password');
            $email->setMessage('Berikut adalah token untuk melakukan reset password anda : <b>' . $random_string . '</b>');

            $email->send();
            $data = [
                'dataUser' => $this->userModel->where('email', $emailUser)->first(),
                'token' => $random_string
            ];
            return view('Auth/v_resetPassword', $data);
        }
    }

    public function proses()
    {
        if ($this->request->isAJAX()) {
            $token = $this->request->getVar('token');
            $tokenInput = $this->request->getVar('token-input');
            if (strcmp($token, $tokenInput) !== 0) {
                $msg = [
                    'error' => 'Token salah'
                ];
                echo json_encode($msg);
            } else {
                // Cek confirm password
                $password = $this->request->getVar('password');
                $cpassword = $this->request->getVar('confirm-password');
                if ($password !== $cpassword) {
                    $msg = [
                        'error' => 'Konfirmasi password tidak sama!'
                    ];
                    echo json_encode($msg);
                } else {
                    $this->userModel->replace([
                        'id_user' => $this->request->getVar('id_user'),
                        'email' => $this->request->getVar('email'),
                        'nama' => $this->request->getVar('nama'),
                        'password' => md5($password),
                        'status_akun' => 'on'
                    ]);
                    echo json_encode(['status' => true]);
                }
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
