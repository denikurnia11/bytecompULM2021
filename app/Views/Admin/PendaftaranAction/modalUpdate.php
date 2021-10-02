<!-- Large modal -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title justify-content-center" id="myLargeModalLabel">Form Update</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="" method="post" id="form-update-pendaftaran">
                <input type="hidden" value="<?= $pendaftaran['id_pendaftaran']; ?>" name="id_pendaftaran">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Ketua</label>
                        <select class="form-select" id="nama" name="nama">
                            <?php foreach ($user as $option) : ?>
                                <option <?= ($pendaftaran['id_user'] == $option['id_user'] ? 'selected' : ''); ?> value="<?php echo $option['id_user'] ?>"><?= $option['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_sekolah" class="form-label">Asal Sekolah</label>
                        <select class="form-select" id="nama_sekolah" name="nama_sekolah">
                            <?php foreach ($sekolah as $option) : ?>
                                <option <?= ($pendaftaran['id_sekolah'] == $option['id_sekolah'] ? 'selected' : ''); ?> value="<?php echo $option['id_sekolah'] ?>"><?= $option['nama_sekolah']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_lomba" class="form-label">Jenis Lomba</label>
                        <select class="form-select" id="jenis_lomba" name="jenis_lomba">
                            <?php foreach ($lomba as $option) : ?>
                                <option <?= ($pendaftaran['id_lomba'] == $option['id_lomba'] ? 'selected' : ''); ?> value="<?= $option['id_lomba'] ?>"><?= $option['nama_lomba']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status_pendaftaran" class="form-label">Status</label>
                        <select class="form-select" id="status_pendaftaran" name="status_pendaftaran">
                            <option <?= $pendaftaran['status_pendaftaran'] == 'valid' ? 'selected' : ''; ?> value="valid">Valid</option>
                            <option <?= $pendaftaran['status_pendaftaran'] == 'belum_valid' ? 'selected' : ''; ?> value="belum_valid">Belum Valid</option>
                        </select>
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