<!-- Large modal -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title justify-content-center" id="myLargeModalLabel">Form Update</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="" method="post" id="form-edit-sekolah">
                <input type="hidden" name="id_sekolah" value="<?= $sekolah['id_sekolah']; ?>">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Ketua</label>
                        <select class="form-select" id="nama" name="nama">
                            <?php foreach ($user as $option) : ?>
                                <option <?= ($option['id_user'] == $sekolah['id_user']) ? 'selected' : ''; ?> value=<?php echo $option['id_user'] ?>><?= $option['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="npsn" class="form-label">NPSN</label>
                        <input type="text" id="npsn" class="form-control" name="npsn" autocomplete="off" required value="<?= $sekolah['npsn']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                        <input type="text" id="nama_sekolah" class="form-control" name="nama_sekolah" autocomplete="off" required value="<?= $sekolah['nama_sekolah']; ?>">
                    </div>
                    <div class=" mb-3">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <input type="text" id="provinsi" class="form-control" name="provinsi" autocomplete="off" required value="<?= $sekolah['provinsi']; ?>">
                    </div>
                    <div class=" mb-3">
                        <label for="kota" class="form-label">Kota</label>
                        <input type="text" id="kota" class="form-control" name="kota" autocomplete="off" required value="<?= $sekolah['kota']; ?>">
                    </div>
                    <div class=" mb-3">
                        <label for="alamat_sekolah" class="form-label">Alamat Sekolah</label>
                        <textarea class="form-control" id="alamat_sekolah" rows="5" name="alamat_sekolah"><?= $sekolah['alamat']; ?></textarea>
                        <!-- <input type="text" id="nama_sekolah" class="form-control" name="nama_sekolah" autocomplete="off" required> -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btnUpdate">Update</button>
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

<script>

</script>