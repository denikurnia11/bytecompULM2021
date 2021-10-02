<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PembayaranModel;
use App\Models\UserModel;

class Pembayaran extends BaseController
{
    protected $pembayaranModel, $userModel;
    public function __construct()
    {
        $this->pembayaranModel = new PembayaranModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Pembayaran | Bytecomp 2021',
            'judul' => 'Pembayaran',
        ];
        return view('Admin/v_pembayaran', $data);
    }

    public function getData()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'pembayaran' => $this->pembayaranModel->getPembayaran()
            ];
            $msg = [
                'data' => view('Admin/Data/dataPembayaran', $data)
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
            ];
            echo json_encode(view('Admin/PembayaranAction/modalTambah', $data));
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function save()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            if (!$this->validate([
                'bukti' => [
                    'rules' => 'is_image[bukti]|mime_in[bukti,image/jpg,image/jpeg,image/png]|max_size[bukti,1024]',
                    'errors' => [
                        'max_size' => 'Ukuran maksimal 1mb.',
                        'is_image' => 'File harus berupa gambar.',
                        'mime_in' => 'File harus berupa gambar.'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'bukti' => $validation->getError('bukti')
                    ]
                ];
                echo json_encode($msg);
            } else {
                // Mengambil foto
                $fileFoto = $this->request->getFile('bukti');
                // Membuat nama random untuk fotonya
                $namaFoto = $fileFoto->getRandomName();
                // Move ke folder public/kartu-pelajar
                $fileFoto->move('bukti-pembayaran', $namaFoto);

                $data = [
                    'id_user' => $this->request->getVar('nama'),
                    'status' => $this->request->getVar('stats'),
                    'created_at' => date("Y-m-d"),
                    'bukti' => $namaFoto,
                ];
                $this->pembayaranModel->insert($data);
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
                'pembayaran' => $this->pembayaranModel->join('user', 'pembayaran.id_user = user.id_user')->find($id),
            ];
            echo json_encode(view('Admin/PembayaranAction/modalUpdate', $data));
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            if (!$this->validate([
                'bukti' => [
                    'rules' => 'is_image[bukti]|mime_in[bukti,image/jpg,image/jpeg,image/png]|max_size[bukti,1024]',
                    'errors' => [
                        'max_size' => 'Ukuran maksimal 1mb.',
                        'is_image' => 'File harus berupa gambar.',
                        'mime_in' => 'File harus berupa gambar.'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'bukti' => $validation->getError('bukti')
                    ]
                ];
                echo json_encode($msg);
            } else {
                // Mengambil foto
                $fileBuktiLama = $this->request->getVar('buktiLama');
                $fileBuktiBaru = $this->request->getFile('bukti');
                if ($fileBuktiBaru->getError() == 4) {
                    $namaBukti = $fileBuktiLama;
                } else {
                    // Membuat nama random untuk fotonya
                    $namaBukti = $fileBuktiBaru->getRandomName();
                    // Move ke folder public/kartu-pelajar
                    $fileBuktiBaru->move('bukti-pembayaran', $namaBukti);
                    unlink('bukti-pembayaran/' . $fileBuktiLama);
                }
                $data = [
                    'id_pembayaran' => $this->request->getVar('id_pembayaran'),
                    'id_user' => $this->request->getVar('nama'),
                    'status' => $this->request->getVar('stats'),
                    'created_at' => date("Y-m-d"),
                    'bukti' => $namaBukti,
                ];
                $this->pembayaranModel->replace($data);
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
            $this->pembayaranModel->delete($id);
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
        return view('Admin/PembayaranAction/modalReview', $data);
    }
}
