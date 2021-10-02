<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LombaModel;

class Lomba extends BaseController
{
    protected $lombaModel;
    public function __construct()
    {
        $this->lombaModel = new LombaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Lomba | Bytecomp 2021',
            'judul' => 'Lomba',
        ];
        return view('Admin/v_lomba', $data);
    }

    public function getData()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'lomba' => $this->lombaModel->findAll()
            ];
            $msg = [
                'data' => view('Admin/Data/dataLomba', $data)
            ];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function tambah()
    {
        if ($this->request->isAJAX()) {
            echo json_encode(view('Admin/LombaAction/modalTambah'));
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function save()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'nama_lomba' => $this->request->getVar('nama_lomba'),
                'deskripsi_lomba' => $this->request->getVar('deskripsi_lomba'),
                'jenis_lomba' => $this->request->getVar('jenis_lomba'),
                'maks_anggota' => $this->request->getVar('maks_anggota'),
            ];
            $this->lombaModel->insert($data);
            echo json_encode(['status' => 'Berhasil disimpan']);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $this->lombaModel->delete($id);
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
                'lomba' => $this->lombaModel->find($id)
            ];
            echo json_encode(view('Admin/LombaAction/modalUpdate', $data));
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'id_lomba' => $this->request->getVar('id_lomba'),
                'nama_lomba' => $this->request->getVar('nama_lomba'),
                'deskripsi_lomba' => $this->request->getVar('deskripsi_lomba'),
                'jenis_lomba' => $this->request->getVar('jenis_lomba'),
                'maks_anggota' => $this->request->getVar('maks_anggota'),
            ];
            $this->lombaModel->replace($data);
            echo json_encode(['status' => 'Berhasil disimpan']);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
