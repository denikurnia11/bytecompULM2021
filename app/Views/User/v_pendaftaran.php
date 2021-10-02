<?= $this->extend('User/template'); ?>

<?= $this->section('content'); ?>
<div class="row justify-content-center">
    <div class="col-lg-12">

        <div class="card widget-flat">
            <div class="card-body">

                <h4 class="text-muted fw-normal mt-0 mb-3" title="Average Revenue">
                    Formulir Pendaftaran
                </h4>

                <form action="" method="post" id="form-pendaftaran" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div id="progressbarwizard">

                        <ul class="nav nav-pills nav-justified form-wizard-header mb-4">
                            <li class="nav-item">
                                <a href="#basictab1" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-school-outline me-1"></i>
                                    <span class="d-none d-sm-inline">Data Sekolah</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#basictab2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-face-profile me-1"></i>
                                    <span class="d-none d-sm-inline">Lomba</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#basictab3" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-face-profile me-1"></i>
                                    <span class="d-none d-sm-inline">Data Diri</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#basictab4" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i>
                                    <span class="d-none d-sm-inline">Selesai</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content b-0 mb-0">
                            <div id="bar" class="progress mb-3" style="height: 7px;">
                                <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                            </div>


                            <div class="tab-pane" id="basictab1">
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="npsn" class="form-label">NPSN</label>
                                        <input type="text" id="npsn" class="form-control" name="npsn" autocomplete="off">
                                        <div class="invalid-feedback errorNpsn"></div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                                        <input type="text" id="nama_sekolah" class="form-control" name="nama_sekolah" autocomplete="off">
                                        <div class="invalid-feedback errorSekolah"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="provinsi" class="form-label">Provinsi</label>
                                        <input type="text" id="provinsi" class="form-control" name="provinsi" autocomplete="off">
                                        <div class="invalid-feedback errorProvinsi"></div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="kota" class="form-label">Kota</label>
                                        <input type="text" id="kota" class="form-control" name="kota" autocomplete="off">
                                        <div class="invalid-feedback errorKota"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_sekolah" class="form-label">Alamat Sekolah</label>
                                    <textarea class="form-control" id="alamat_sekolah" rows="5" name="alamat_sekolah"></textarea>
                                    <div class="invalid-feedback errorAlamat"></div>
                                </div>

                            </div>


                            <div class="tab-pane" id="basictab2">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="name"> Cabang Lomba</label>
                                            <div class="col-md-9">
                                                <select class="form-select" name="lomba">
                                                    <?php foreach ($lomba as $option) : ?>
                                                        <option value="<?= $option['id_lomba']; ?>"><?= $option['nama_lomba']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="jumlah_anggota"> Jumlah Anggota</label>
                                            <div class="col-md-9">
                                                <select class="form-select jumlah_anggota" name="jumlah_anggota" id="jumlah_anggota">
                                                    <option selected value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                                <span class="font-13 text-muted">Maksimal anggota termasuk ketua (Web Desain dan Video Kreatif 3 Orang, Desain Poster dan Olimpiade 1 Orang)</span>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>

                            <div class="tab-pane data-peserta" id="basictab3">
                                <!-- Peserta 1 -->
                                <div class="row">
                                    <div class="col-12">
                                        <h3>Data Peserta</h3>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="nisn1"> NISN </label>
                                            <div class="col-md-9">
                                                <input type="text" id="nisn1" name="nisn[]" class="form-control" autocomplete="off">
                                                <div class="invalid-feedback errorNisn1"></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="nama_peserta1"> Nama Lengkap</label>
                                            <div class="col-md-9">
                                                <input autocomplete="off" type="text" id="nama_peserta1" name="nama_peserta[]" class="form-control">
                                                <div class="invalid-feedback errorNama1"></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                            <div class="col-md-9">
                                                <select name="jenis_kelamin[]" class="form-select">
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="no_telepon1">Nomor Telepon</label>
                                            <div class="col-md-9">
                                                <input autocomplete="off" type="text" id="no_telepon1" name="no_telepon[]" class="form-control">
                                                <span class="font-13 text-muted">e.g "0878***"</span>
                                                <div class="invalid-feedback errorTelepon1"></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="tempat_lahir1">Tempat Lahir</label>
                                            <div class="col-md-9">
                                                <input autocomplete="off" type="text" id="tempat_lahir1" name="tempat_lahir[]" class="form-control">
                                                <div class="invalid-feedback errorTempatLahir1"></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="tanggal_lahir1">Tanggal Lahir</label>
                                            <div class="col-md-9">
                                                <input autocomplete="off" type="date" id="tanggal_lahir1" name="tanggal_lahir[]" class="form-control">
                                                <div class="invalid-feedback errorTanggalLahir1"></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="scan1" class="form-label col-md-3">Kartu Pelajar</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="file" id="scan1" name="scan[]">
                                                <span class="font-13 text-muted">Maks 1mb (jpg, jpeg, png)</span>
                                                <div class="invalid-feedback errorScan1"></div>
                                            </div>
                                        </div>

                                    </div> <!-- end col -->
                                </div>

                            </div>

                            <div class="tab-pane" id="basictab4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center">
                                            <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                            <h3 class="mt-0">Terima Kasih !</h3>

                                            <p class="w-75 mb-2 mx-auto">Silakan periksa kembali data anda dengan benar. Jika sudah merasa yakin silakan pilih tombol "Simpan" di bawah ini.</p>

                                            <div class="mb-3 w-25 mx-auto">
                                                <button type="submit" class="btn btn-success form-control btnSimpan">Simpan</button>
                                                <button class="btn btn-success form-control btnLoading" type="button" disabled style="display: none;">
                                                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                                                    Loading...
                                                </button>
                                                <!-- <input type="submit" value="Simpan" class="btn btn-success form-control btnSimpan"> -->
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>

                            <ul class="list-inline wizard mb-0">
                                <li class="previous list-inline-item">
                                    <a href="#" class="btn btn-info">Previous</a>
                                </li>
                                <li class="next list-inline-item float-end">
                                    <a href="#" class="btn btn-info">Next</a>
                                </li>
                            </ul>

                        </div> <!-- tab-content -->
                    </div> <!-- end #basicwizard-->
                </form>

                <!-- <h3 class="mt-3 mb-3">
                    10000
                </h3> -->
            </div>
            <!-- end card-body-->
        </div>
        <!-- end card-->
    </div>
    <!-- end col-->
</div>




<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#jumlah_anggota').on('change', function() {
            // console.log('Changed option value ' + this.value);
            // console.log('Changed option text ' + $(this).find('option').filter(':selected').text());
            const jumlah_anggota = this.value;
            if (jumlah_anggota == 1) {
                $('.tambahPeserta').remove();
            } else if (jumlah_anggota == 2) {
                $('.tambahPeserta').remove();
                var jumlah = 1;
            } else {
                $('.tambahPeserta').remove();
                var jumlah = 2;
            }
            let no = 1;
            for (let x = 1; x <= jumlah; x++) {
                $('#basictab3').append(`
                                <div class="row tambahPeserta">
                                    <div class="col-12">
                                        <h3>Data Peserta ` + ++no + `</h3>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="nisn` + no + `"> NISN </label>
                                            <div class="col-md-9">
                                                <input autocomplete="off" type="text" id="nisn` + no + `" name="nisn[]" class="form-control">
                                                <div class=" invalid-feedback errorNisn` + no + `"></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="nama_peserta` + no + `"> Nama Lengkap</label>
                                            <div class="col-md-9">
                                                <input autocomplete="off" type="text" id="nama_peserta` + no + `" name="nama_peserta[]" class="form-control">
                                                <div class=" invalid-feedback errorNama` + no + `"></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                            <div class="col-md-9">
                                                <select name="jenis_kelamin[]" class="form-select">
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="no_telepon` + no + `">Nomor Telepon</label>
                                            <div class="col-md-9">
                                                <input autocomplete="off" type="text" id="no_telepon` + no + `" name="no_telepon[]" class="form-control">
                                                <span class="font-13 text-muted">e.g "0878***"</span>
                                                <div class=" invalid-feedback errorTelepon` + no + `"></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="tempat_lahir` + no + `">Tempat Lahir</label>
                                            <div class="col-md-9">
                                                <input autocomplete="off" type="text" id="tempat_lahir` + no + `" name="tempat_lahir[]" class="form-control">
                                                <div class=" invalid-feedback errorTempatLahir` + no + `"></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="tanggal_lahir` + no + `">Tanggal Lahir</label>
                                            <div class="col-md-9">
                                                <input autocomplete="off" type="date" id="tanggal_lahir` + no + `" name="tanggal_lahir[]" class="form-control">
                                                <div class=" invalid-feedback errorTanggalLahir` + no + `"></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="scan" class="form-label col-md-3">Kartu Pelajar</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="file" id="scan` + no + `" name="scan[]">
                                                <span class="font-13 text-muted">Maks 1mb (jpg, jpeg, png)</span>
                                                <div class=" invalid-feedback errorScan` + no + `"></div>
                                            </div>
                                        </div>

                                    </div> <!-- end col -->
                                </div>
                             `);
            }
            $("input").focus(function() {
                $(this).removeClass('is-invalid');
            });
        });

        $(document).on('submit', '#form-pendaftaran', function(e) {
            e.preventDefault();

            $.ajax({
                url: '<?= base_url(); ?>/user/pendaftaran/save',
                type: 'post',
                dataType: 'json',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btnSimpan').hide();
                    $('.btnLoading').css('display', 'block');
                },
                complete: function() {
                    $('.btnSimpan').show();
                    $('.btnLoading').css('display', 'none');
                },
                success: function(response) {
                    if (response.error) {
                        // Data sekolah
                        if (response.error.npsn) {
                            $(`#npsn`).addClass('is-invalid')
                            $(`.errorNpsn`).html(response.error.npsn)
                        } else {
                            $(`#npsn`).removeClass('is-invalid')
                            $(`.errorNpsn`).html('')
                        }
                        if (response.error.nama_sekolah) {
                            $(`#nama_sekolah`).addClass('is-invalid')
                            $(`.errorSekolah`).html(response.error.nama_sekolah)
                        } else {
                            $(`#nama_sekolah`).removeClass('is-invalid')
                            $(`.errorSekolah`).html('')
                        }
                        if (response.error.provinsi) {
                            $(`#provinsi`).addClass('is-invalid')
                            $(`.errorProvinsi`).html(response.error.provinsi)
                        } else {
                            $(`#provinsi`).removeClass('is-invalid')
                            $(`.errorProvinsi`).html('')
                        }
                        if (response.error.kota) {
                            $(`#kota`).addClass('is-invalid')
                            $(`.errorKota`).html(response.error.kota)
                        } else {
                            $(`#kota`).removeClass('is-invalid')
                            $(`.errorKota`).html('')
                        }
                        if (response.error.alamat_sekolah) {
                            $(`#alamat_sekolah`).addClass('is-invalid')
                            $(`.errorAlamat`).html(response.error.alamat_sekolah)
                        } else {
                            $(`#alamat_sekolah`).removeClass('is-invalid')
                            $(`.errorAlamat`).html('')
                        }

                        // Data peserta
                        if (response.error.nisn) {

                            for (let x = 1; x <= 3; x++) {
                                $(`#nisn${x}`).addClass('is-invalid')
                                $(`.errorNisn${x}`).html(response.error.nisn)
                            }
                        } else {
                            for (let x = 1; x <= 3; x++) {
                                $(`#nisn${x}`).removeClass('is-invalid')
                                $(`.errorNisn${x}`).html('')
                            }
                        }

                        if (response.error.nama_peserta) {
                            for (let x = 1; x <= 3; x++) {
                                $(`#nama_peserta${x}`).addClass('is-invalid')
                                $(`.errorNama${x}`).html(response.error.nama_peserta)
                            }
                        } else {
                            for (let x = 1; x <= 3; x++) {
                                $(`#nama_peserta${x}`).removeClass('is-invalid')
                                $(`.errorNama${x}`).html('')
                            }
                        }

                        if (response.error.no_telepon) {
                            for (let x = 1; x <= 3; x++) {
                                $(`#no_telepon${x}`).addClass('is-invalid')
                                $(`.errorTelepon${x}`).html(response.error.no_telepon)
                            }
                        } else {
                            for (let x = 1; x <= 3; x++) {
                                $(`#no_telepon${x}`).removeClass('is-invalid')
                                $(`.errorTelepon${x}`).html('')
                            }
                        }

                        if (response.error.tempat_lahir) {
                            for (let x = 1; x <= 3; x++) {
                                $(`#tempat_lahir${x}`).addClass('is-invalid')
                                $(`.errorTempatLahir${x}`).html(response.error.tempat_lahir)
                            }
                        } else {
                            for (let x = 1; x <= 3; x++) {
                                $(`#no_telepon${x}`).removeClass('is-invalid')
                                $(`.errorTempatLahir${x}`).html('')
                            }
                        }

                        if (response.error.tanggal_lahir) {
                            for (let x = 1; x <= 3; x++) {
                                $(`#tanggal_lahir${x}`).addClass('is-invalid')
                                $(`.errorTanggalLahir${x}`).html(response.error.tanggal_lahir)
                            }
                        } else {
                            for (let x = 1; x <= 3; x++) {
                                $(`#tanggal_lahir${x}`).removeClass('is-invalid')
                                $(`.errorTanggalLahir${x}`).html('')
                            }
                        }

                        if (response.error.scan) {
                            for (let x = 1; x <= 3; x++) {
                                $(`#scan${x}`).addClass('is-invalid')
                                $(`.errorScan${x}`).html(response.error.scan)
                            }
                        } else {
                            for (let x = 1; x <= 3; x++) {
                                $(`#scan${x}`).removeClass('is-invalid')
                                $(`.errorScan${x}`).html('')
                            }
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Periksa kembali data anda!',
                        })
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data Telah Tersimpan.',
                            showConfirmButton: false,
                            timer: 0
                        })
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    }
                }
            });
        });

        $("input").focus(function() {
            $(this).removeClass('is-invalid');
        });
        $("#alamat_sekolah").focus(function() {
            $(this).removeClass('is-invalid');
        });
    })
</script>

<?= $this->endSection(); ?>