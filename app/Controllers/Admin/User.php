<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;

class User extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'User | Bytecomp 2021',
            'judul' => 'User',
        ];
        return view('Admin/v_user', $data);
    }

    public function getData()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'user' => $this->userModel->findAll()
            ];
            $msg = [
                'data' => view('Admin/Data/dataUser', $data)
            ];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function tambah()
    {
        if ($this->request->isAJAX()) {
            echo json_encode(view('Admin/UserAction/modalTambah'));
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function save()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            if (!$this->validate([
                'email' => [
                    'rules' => 'is_unique[user.email]',
                    'errors' => [
                        'is_unique' => 'Email sudah terdaftar.'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'email' => $validation->getError('email')
                    ]
                ];
                echo json_encode($msg);
            } else {
                $data = [
                    'nama' => $this->request->getVar('nama'),
                    'email' => $this->request->getVar('email'),
                    'password' => md5($this->request->getVar('password')),
                    'role' => $this->request->getVar('role'),
                    'status_akun' => $this->request->getVar('status_akun'),
                ];
                $this->userModel->insert($data);
                echo json_encode(['status' => true]);
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $data = [
                'user' => $this->userModel->find($id)
            ];
            echo json_encode(view('Admin/UserAction/modalUpdate', $data));
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();

            // Cek apakah merubah email
            $emailLama = $this->request->getVar('emailLama');
            $emailBaru = $this->request->getVar('email');
            if ($emailLama == $emailBaru) {
                $rules = 'required';
            } else {
                $rules = 'is_unique[user.email]';
            }

            if (!$this->validate([
                'email' => [
                    'rules' => $rules,
                    'errors' => [
                        'is_unique' => 'Email sudah terdaftar.'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'email' => $validation->getError('email')
                    ]
                ];
                echo json_encode($msg);
            } else {
                $data = [
                    'id_user' => $this->request->getVar('id_user'),
                    'nama' => $this->request->getVar('nama'),
                    'email' => $emailBaru,
                    'password' => md5($this->request->getVar('password')),
                    'role' => $this->request->getVar('role'),
                    'status_akun' => $this->request->getVar('status_akun'),
                ];
                $this->userModel->replace($data);
                echo json_encode(['status' => true]);
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $this->userModel->delete($id);
            echo json_encode(['status' => true]);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
