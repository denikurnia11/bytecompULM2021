<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\PembayaranModel;
use App\Models\PendaftaranModel;


class Pembayaran extends BaseController
{
    protected  $pembayaranModel, $pendaftaranModel;
    public function __construct()
    {
        $this->pembayaranModel = new PembayaranModel();
        $this->pendaftaranModel = new PendaftaranModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Pembayaran | Bytecomp 2021',
            'judul' => 'Pembayaran Lomba',
            'validasi' => \Config\Services::validation()
        ];

        if (!$this->pendaftaranModel->where('id_user', session()->idUser)->first()) {
            return view('User/v_prabayar', $data);
        } else if (!$this->pembayaranModel->where('id_user', session()->idUser)->first()) {
            return view('User/v_pembayaran', $data);
        } else {
            return view('User/v_sudahbayar', $data);
        }

        if (!$this->pembayaranModel->where('id_user', session()->idUser)->first()) {
            return view('User/v_pembayaran', $data);
        } else if (!$this->pendaftaranModel->where('id_user', session()->idUser)->first()) {
            return view('User/v_pembayaran', $data);
        } else {
            return view('User/v_sudahbayar', $data);
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
                    'id_user' => session()->idUser,
                    'status' => 'pending',
                    'created_at' => date("Y-m-d"),
                    'bukti' => $namaFoto,
                ];
                dd($data);
                $this->pembayaranModel->insert($data);
                echo json_encode(['status' => true]);
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function riwayat()
    {
        $data = [
            'pembayaran' => $this->pembayaranModel->where('pembayaran.id_user', session()->idUser)->join('user', 'pembayaran.id_user = user.id_user')->first(),

            'title' => 'Riwayat Pembayaran',
            'judul' => 'Riwayat Pembayaran',
        ];
        // dd($data);
        return view('User/v_riwayatbayar', $data);
    }
}
