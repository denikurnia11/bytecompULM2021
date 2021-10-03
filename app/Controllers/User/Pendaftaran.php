<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\LombaModel;
use App\Models\SekolahModel;
use App\Models\PesertaModel;
use App\Models\PendaftaranModel;
use App\Models\UserModel;


class Pendaftaran extends BaseController
{
    protected $userModel, $lombaModel, $sekolahModel, $pesertaModel, $pendaftaranModel;
    public function __construct()
    {
        $this->lombaModel = new LombaModel();
        $this->sekolahModel = new SekolahModel();
        $this->pesertaModel = new PesertaModel();
        $this->pendaftaranModel = new PendaftaranModel();
        $this->userModel = new UserModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Pendaftaran | Bytecomp 2021',
            'judul' => 'Pendaftaran Lomba',
            'lomba' => $this->lombaModel->findAll(),
            'validasi' => \Config\Services::validation()
        ];
        if (!$this->pendaftaranModel->where('id_user', session()->idUser)->first()) {
            return view('User/v_pendaftaran', $data);
        } else {
            return view('User/v_sudahdaftar', $data);
        }
    }

    public function save()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            if (!$this->validate([
                // Data sekolah
                'npsn' => [
                    'rules' => 'required|integer',
                    'errors' => [
                        'required' => 'NPSN tidak boleh kosong',
                        'integer' => 'Harus berupa angka.'
                    ]
                ],
                'nama_sekolah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama sekolah tidak boleh kosong',
                    ]
                ],
                'provinsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Provinsi tidak boleh kosong',
                    ]
                ],
                'kota' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kota tidak boleh kosong',
                    ]
                ],
                'alamat_sekolah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Alamat tidak boleh kosong',
                    ]
                ],

                // Data peserta
                'nisn' => [
                    'rules' => 'required|integer',
                    'errors' => [
                        'required' => 'NISN tidak boleh kosong',
                        'integer' => 'Harus berupa angka.'
                    ]
                ],
                'nama_peserta' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama tidak boleh kosong',
                    ]
                ],
                'no_telepon' => [
                    'rules' => 'required|integer',
                    'errors' => [
                        'required' => 'Nomor telepon tidak boleh kosong',
                        'integer' => 'Harus berupa angka',
                    ]
                ],
                'tempat_lahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tempat lahir tidak boleh kosong',
                    ]
                ],
                'tanggal_lahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal lahir tidak boleh kosong',
                    ]
                ],
                'scan' => [
                    'rules' => 'uploaded[scan]|is_image[scan]|mime_in[scan,image/jpg,image/jpeg,image/png]|max_size[scan,1024]',
                    'errors' => [
                        'uploaded' => 'File tidak boleh kosong.',
                        'max_size' => 'Ukuran maksimal 1mb.',
                        'is_image' => 'File harus berupa gambar.',
                        'mime_in' => 'File harus berupa gambar.'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'npsn' => $validation->getError('npsn'),
                        'nama_sekolah' => $validation->getError('nama_sekolah'),
                        'provinsi' => $validation->getError('provinsi'),
                        'kota' => $validation->getError('kota'),
                        'alamat_sekolah' => $validation->getError('alamat_sekolah'),
                        'nisn' => $validation->getError('nisn'),
                        'nama_peserta' => $validation->getError('nama_peserta'),
                        'no_telepon' => $validation->getError('no_telepon'),
                        'tempat_lahir' => $validation->getError('tempat_lahir'),
                        'tanggal_lahir' => $validation->getError('tanggal_lahir'),
                        'scan' => $validation->getError('scan')
                    ]
                ];
                echo json_encode($msg);
            } else {
                // Data sekolah
                // Cek apakah sekolah sudah terdaftar
                $npsn = $this->request->getVar('npsn');
                $sekolah = $this->sekolahModel->select('id_sekolah, nama_sekolah, npsn')->where('npsn', $npsn)->findAll();
                if (!$sekolah) {
                    $this->sekolahModel->insert([
                        'id_user' => session()->idUser,
                        'npsn' => $npsn,
                        'nama_sekolah' => $this->request->getVar('nama_sekolah'),
                        'provinsi' => $this->request->getVar('provinsi'),
                        'kota' => $this->request->getVar('kota'),
                        'alamat' => $this->request->getVar('alamat_sekolah'),
                    ]);
                }

                $idSekolah = $this->sekolahModel->where('npsn', $npsn)->first();
                //  Data peserta
                $nisn = $this->request->getVar('nisn');
                $nama_peserta = $this->request->getVar('nama_peserta');
                $jenis_kelamin = $this->request->getVar('jenis_kelamin');
                $no_telepon = $this->request->getVar('no_telepon');
                $tempat_lahir = $this->request->getVar('tempat_lahir');
                $tanggal_lahir = $this->request->getVar('tanggal_lahir');
                $scan = $this->request->getFiles('scan');

                $jenisPeserta = array('ketua', 'peserta1', 'peserta2');

                $jmlData = count($nisn);
                for ($i = 0; $i < $jmlData; $i++) {
                    // Membuat nama random untuk fotonya
                    $namaFoto = $scan['scan'][$i]->getRandomName();
                    // Move ke folder public/kartu-pelajar
                    $scan['scan'][$i]->move('kartu-pelajar', $namaFoto);

                    $this->pesertaModel->insert([
                        'id_user' => session()->idUser,
                        'id_sekolah' => $idSekolah['id_sekolah'],
                        'nisn' => $nisn[$i],
                        'jenis_peserta' => $jenisPeserta[$i],
                        'nama_peserta' => $nama_peserta[$i],
                        'jenis_kelamin' => $jenis_kelamin[$i],
                        'no_telepon' => $no_telepon[$i],
                        'tempat_lahir' => $tempat_lahir[$i],
                        'tanggal_lahir' => $tanggal_lahir[$i],
                        'scan' => $namaFoto,
                    ]);
                }

                // Pendaftaran
                $this->pendaftaranModel->insert([
                    'id_user' => session()->idUser,
                    'id_sekolah' => $idSekolah['id_sekolah'],
                    'id_lomba' => $this->request->getVar('lomba'),
                    'status_pendaftaran' => 'belum_valid'
                ]);

                echo json_encode(['status' => true]);
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function riwayat()
    {
        $data = [
            'pendaftaran' => $this->pendaftaranModel->where('pendaftaran.id_user', session()->idUser)->join('user', 'pendaftaran.id_user = user.id_user')->join('lomba', 'pendaftaran.id_lomba = lomba.id_lomba')->join('sekolah', 'pendaftaran.id_sekolah = sekolah.id_sekolah')->first(),
            'peserta' => $this->pesertaModel->where('peserta.id_user', session()->idUser)->join('user', 'peserta.id_user = user.id_user')->join('sekolah', 'peserta.id_sekolah = sekolah.id_sekolah')->findAll(),
            'title' => 'Riwayat Pendaftaran',
            'judul' => 'Riwayat Pendaftaran',
        ];
        // dd($data);
        return view('User/v_riwayatpendaftaran', $data);
    }

    public function editPeserta()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $data = [
                'user' => $this->userModel->getColUser(),
                'sekolah' => $this->sekolahModel->findAll(),
                'peserta' => $this->pesertaModel->find($id)
            ];
            echo json_encode(view('User/PesertaAction/modalUpdate', $data));
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function updatePeserta()
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
                    'id_user' => $this->request->getVar('id_user'),
                    'id_sekolah' => $this->request->getVar('id_sekolah'),
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
}
