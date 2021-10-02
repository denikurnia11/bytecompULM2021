<!-- Large modal -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title justify-content-center" id="myLargeModalLabel">Form Update</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="" method="post" id="form-edit-pembayaran" enctype="multipart/form-data">
                <input type="hidden" name="id_pembayaran" value="<?= $pembayaran['id_pembayaran']; ?>">
                <input type="hidden" name="buktiLama" value="<?= $pembayaran['bukti']; ?>">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Ketua</label>
                        <select class="form-select" id="nama" name="nama">
                            <?php foreach ($user as $option) : ?>
                                <option <?= ($pembayaran['id_user'] == $option['id_user']) ? 'selected' : ''; ?> value="<?php echo $option['id_user'] ?>"><?= $option['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="stats" class="form-label">Status</label>
                        <select class="form-select" id="stats" name="stats">
                            <option <?= $pembayaran['status'] == 'pending' ? 'selected' : ''; ?> value="pending">Pending</option>
                            <option <?= $pembayaran['status'] == 'berhasil' ? 'selected' : ''; ?> value="berhasil">Berhasil</option>
                            <option <?= $pembayaran['status'] == 'gagal' ? 'selected' : ''; ?> value="gagal">Gagal</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bukti" class="form-label">Bukti Pembayaran</label>
                        <input class="form-control" type="file" id="bukti" name="bukti" onchange="readURL(this);">
                        <span class="font-13 text-muted">Maks 1mb (jpg, jpeg, png)</span>
                        <div class="invalid-feedback errorBukti"></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6 mx-auto">
                            <img id="blah" src="<?= base_url(); ?>/bukti-pembayaran/<?= $pembayaran['bukti']; ?>" alt="preview image" class="img-fluid rounded img-thumbnail" />
                        </div>
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