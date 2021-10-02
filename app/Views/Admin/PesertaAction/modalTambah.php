<!-- Large modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title justify-content-center" id="myLargeModalLabel">Form Tambah</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="" method="post" id="form-tambah-peserta" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Ketua</label>
                        <select class="form-select" id="nama" name="nama">
                            <?php foreach ($user as $option) : ?>
                                <option value="<?= $option['id_user']; ?>"><?= $option['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_sekolah" class="form-label">Sekolah</label>
                        <select class="form-select" id="nama_sekolah" name="nama_sekolah">
                            <?php foreach ($sekolah as $option) : ?>
                                <option value="<?= $option['id_sekolah']; ?>"><?= $option['nama_sekolah']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="number" id="nisn" class="form-control" name="nisn" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_peserta" class="form-label">Tipe Peserta</label>
                        <select class="form-select" id="jenis_peserta" name="jenis_peserta">
                            <option value="ketua">Ketua</option>
                            <option value="peserta1">Peserta 1</option>
                            <option value="peserta2">Peserta 2</option>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="nama_peserta" class="form-label">Nama Peserta</label>
                        <input type="text" id="nama_peserta" class="form-control" name="nama_peserta" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label">Telepon</label>
                        <input type="number" id="no_telepon" class="form-control" name="no_telepon" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kartu Pelajar</label>
                        <input class="form-control" type="file" id="inputKartu" name="scan" onchange="readURL(this);" required>
                        <span class="font-13 text-muted">Maks 1mb (jpg, jpeg, png)</span>
                        <div class="invalid-feedback errorScan"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6 mx-auto">
                            <img id="blah" src="<?= base_url(); ?>/kartu-pelajar/img-not-found.png" alt="preview image" class="img-fluid rounded img-thumbnail" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btnSimpan">Tambah</button>
                        <button class="btn btn-primary mb-2 btnLoading" type="button" disabled style="display: none;">
                            <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->