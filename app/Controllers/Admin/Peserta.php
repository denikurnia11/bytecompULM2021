<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PesertaModel;
use App\Models\SekolahModel;
use App\Models\UserModel;

class Peserta extends BaseController
{
    protected $pesertaModel, $userModel;
    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();
        $this->userModel = new UserModel();
        $this->sekolahModel = new SekolahModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Peserta | Bytecomp 2021',
            'judul' => 'Peserta',
        ];

        return view('Admin/v_peserta', $data);
    }

    public function getData()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'peserta' => $this->pesertaModel->getPeserta()
            ];
            $msg = [
                'data' => view('Admin/Data/dataPeserta', $data)
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
                'sekolah' => $this->sekolahModel->findAll()
            ];
            echo json_encode(view('Admin/PesertaAction/modalTambah', $data));
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function save()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            if (!$this->validate([
                'scan' => [
                    'rules' => 'is_image[scan]|mime_in[scan,image/jpg,image/jpeg,image/png]|max_size[scan,1024]',
                    'errors' => [
                        'max_size' => 'Ukuran maksimal 1mb.',
                        'is_image' => 'File harus berupa gambar.',
                        'mime_in' => 'File harus berupa gambar.'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'scan' => $validation->getError('scan')
                    ]
                ];
                echo json_encode($msg);
            } else {
                // Mengambil foto
                $fileFoto = $this->request->getFile('scan');
                // Membuat nama random untuk fotonya
                $namaFoto = $fileFoto->getRandomName();
                // Move ke folder public/kartu-pelajar
                $fileFoto->move('kartu-pelajar', $namaFoto);

                $data = [
                    'id_user' => $this->request->getVar('nama'),
                    'id_sekolah' => $this->request->getVar('nama_sekolah'),
                    'nisn' => $this->request->getVar('nisn'),
                    'jenis_peserta' => $this->request->getVar('jenis_peserta'),
                    'nama_peserta' => $this->request->getVar('nama_peserta'),
                    'no_telepon' => $this->request->getVar('no_telepon'),
                    'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                    'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                    'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                    'scan' => $namaFoto,
                ];
                $this->pesertaModel->insert($data);
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
                'user' => $this->userModel->getColUser(),
                'sekolah' => $this->sekolahModel->findAll(),
                'peserta' => $this->pesertaModel->find($id)
            ];
            echo json_encode(view('Admin/PesertaAction/modalUpdate', $data));
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            if (!$this->validate([
                'scan' => [
                    'rules' => 'is_image[scan]|mime_in[scan,image/jpg,image/jpeg,image/png]|max_size[scan,1024]',
                    'errors' => [
                        'max_size' => 'Ukuran maksimal 1mb.',
                        'is_image' => 'File harus berupa gambar.',
                        'mime_in' => 'File harus berupa gambar.'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'scan' => $validation->getError('scan')
                    ]
                ];
                echo json_encode($msg);
            } else {
                // Mengambil foto
                $fileFotoLama = $this->request->getVar('scanLama');
                $fileFotoBaru = $this->request->getFile('scan');
                if ($fileFotoBaru->getError() == 4) {
                    $namaFoto = $fileFotoLama;
                } else {
                    // Membuat nama random untuk fotonya
                    $namaFoto = $fileFotoBaru->getRandomName();
                    // Move ke folder public/kartu-pelajar
                    $fileFotoBaru->move('kartu-pelajar', $namaFoto);
                    unlink('kartu-pelajar/' . $fileFotoLama);
                }
                $data = [
                    'id_peserta' => $this->request->getVar('id_peserta'),
                    'id_user' => $this->request->getVar('nama'),
                    'id_sekolah' => $this->request->getVar('nama_sekolah'),
                    'nisn' => $this->request->getVar('nisn'),
                    'jenis_peserta' => $this->request->getVar('jenis_peserta'),
                    'nama_peserta' => $this->request->getVar('nama_peserta'),
                    'no_telepon' => $this->request->getVar('no_telepon'),
                    'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                    'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                    'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                    'scan' => $namaFoto,
                ];
                $this->pesertaModel->replace($data);
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
            $this->pesertaModel->delete($id);
            echo json_encode(['status' => true]);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function review($id)
    {
        $data = [
            'id' => $id
        ];
        return view('Admin/PesertaAction/modalReview', $data);
    }
}
