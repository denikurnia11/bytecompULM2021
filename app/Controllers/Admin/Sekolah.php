<?php

namespace App\Controllers\Admin;

use App\Models\SekolahModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class Sekolah extends BaseController
{
    protected $sekolahModel;
    public function __construct()
    {
        $this->sekolahModel = new SekolahModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Sekolah | Bytecomp 2021',
            'judul' => 'Sekolah',
        ];

        return view('Admin/v_sekolah', $data);
    }

    public function getData()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'sekolah' => $this->sekolahModel->getSekolah()
            ];
            $msg = [
                'data' => view('Admin/Data/dataSekolah', $data)
            ];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function tambah()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'user' => $this->userModel->getColUser()
            ];
            echo json_encode(view('Admin/SekolahAction/modalTambah', $data));
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function save()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'id_user' => $this->request->getVar('nama'),
                'npsn' => $this->request->getVar('npsn'),
                'nama_sekolah' => $this->request->getVar('nama_sekolah'),
                'provinsi' => $this->request->getVar('provinsi'),
                'kota' => $this->request->getVar('kota'),
                'alamat' => $this->request->getVar('alamat_sekolah'),
            ];
            $this->sekolahModel->insert($data);
            echo json_encode(['status' => true]);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $data = [
                'user' => $this->userModel->getColUser(),
                'sekolah' => $this->sekolahModel->join('user', 'sekolah.id_user = user.id_user')->find($id)
            ];
            echo json_encode(view('Admin/SekolahAction/modalUpdate', $data));
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'id_sekolah' => $this->request->getVar('id_sekolah'),
                'id_user' => $this->request->getVar('nama'),
                'npsn' => $this->request->getVar('npsn'),
                'nama_sekolah' => $this->request->getVar('nama_sekolah'),
                'provinsi' => $this->request->getVar('provinsi'),
                'kota' => $this->request->getVar('kota'),
                'alamat' => $this->request->getVar('alamat_sekolah'),
            ];
            $this->sekolahModel->replace($data);
            echo json_encode(['status' => true]);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $this->sekolahModel->delete($id);
            echo json_encode(['status' => true]);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
