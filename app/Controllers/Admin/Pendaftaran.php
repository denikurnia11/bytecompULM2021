<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LombaModel;
use App\Models\PendaftaranModel;
use App\Models\SekolahModel;
use App\Models\UserModel;

class Pendaftaran extends BaseController
{
    protected $pendaftaranModel, $userModel, $lombaModel, $sekolahModel;
    public function __construct()
    {
        $this->pendaftaranModel = new PendaftaranModel();
        $this->userModel = new UserModel();
        $this->lombaModel = new LombaModel();
        $this->sekolahModel = new SekolahModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Pendaftaran | Bytecomp 2021',
            'judul' => 'Pendaftaran',
        ];
        return view('Admin/v_pendaftaran', $data);
    }

    public function getData()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'pendaftaran' => $this->pendaftaranModel->getPendaftaran()
            ];
            $msg = [
                'data' => view('Admin/Data/dataPendaftaran', $data)
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
                'user' => $this->userModel->getColUser(),
                'lomba' => $this->lombaModel->getNamaLomba(),
                'sekolah' => $this->sekolahModel->findAll()
            ];
            echo json_encode(view('Admin/PendaftaranAction/modalTambah', $data));
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function save()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'id_user' => $this->request->getVar('nama'),
                'id_sekolah' => $this->request->getVar('nama_sekolah'),
                'id_lomba' => $this->request->getVar('jenis_lomba'),
                'status_pendaftaran' => $this->request->getVar('status_pendaftaran'),
            ];
            $this->pendaftaranModel->insert($data);
            echo json_encode(['status' => 'Berhasil disimpan']);
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
                'lomba' => $this->lombaModel->getNamaLomba(),
                'sekolah' => $this->sekolahModel->findAll(),
                'pendaftaran' => $this->pendaftaranModel->getPendaftaran($id),

            ];
            echo json_encode(view('Admin/PendaftaranAction/modalUpdate', $data));
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'id_pendaftaran' => $this->request->getVar('id_pendaftaran'),
                'id_user' => $this->request->getVar('nama'),
                'id_sekolah' => $this->request->getVar('nama_sekolah'),
                'id_lomba' => $this->request->getVar('jenis_lomba'),
                'status_pendaftaran' => $this->request->getVar('status_pendaftaran'),
            ];
            $this->pendaftaranModel->replace($data);
            echo json_encode(['status' => 'Berhasil disimpan']);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $this->pendaftaranModel->delete($id);
            echo json_encode(['status' => true]);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
