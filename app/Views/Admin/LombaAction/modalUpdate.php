<!-- Large modal -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title justify-content-center" id="myLargeModalLabel">Form Update</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="" method="post" id="form-update-lomba">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" name="id_lomba" value="<?= $lomba['id_lomba']; ?>">
                    <div class="mb-3">
                        <label for="nama_lomba" class="form-label">Nama Lomba</label>
                        <input type="text" id="nama_lomba" class="form-control" name="nama_lomba" autocomplete="off" required value="<?= $lomba['nama_lomba']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_lomba" class="form-label">Deskripsi Lomba</label>
                        <input type="text" id="deskripsi_lomba" class="form-control" name="deskripsi_lomba" autocomplete="off" required value="<?= $lomba['deskripsi_lomba']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_lomba" class="form-label">Jenis Lomba</label>
                        <select class="form-select" id="jenis_lomba" name="jenis_lomba">
                            <option value="individu" <?= ($lomba['jenis_lomba'] == 'individu') ? 'selected' : ''; ?>>Individu</option>
                            <option value="tim" <?= ($lomba['jenis_lomba'] == 'tim') ? 'selected' : ''; ?>>Tim</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="maks_anggota" class="form-label">Maksimal Anggota</label>
                        <input type="number" id="maks_anggota" class="form-control" name="maks_anggota" autocomplete="off" required value="<?= $lomba['maks_anggota']; ?>">
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