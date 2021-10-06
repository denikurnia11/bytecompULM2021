<!-- Large modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title justify-content-center" id="myLargeModalLabel">Form Edit</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="" method="post" id="form-edit-user">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                    <input type="hidden" name="emailLama" value="<?= $user['email']; ?>">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" class="form-control" name="nama" autocomplete="off" required value="<?= $user['nama']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" id="email" class="form-control" name="email" autocomplete="off" required value="<?= $user['email']; ?>">
                        <div class="invalid-feedback errorEmail"></div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" id="password" class="form-control" name="password" autocomplete="off" required placeholder="Masukkan password baru/lama">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role">
                            <option value="admin" <?= ($user['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                            <option value="user" <?= ($user['role'] == 'user') ? 'selected' : ''; ?>>User</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status_akun" class="form-label">Status Akun</label>
                        <select class="form-select" id="status_akun" name="status_akun">
                            <option value="on" <?= ($user['status_akun'] == 'on') ? 'selected' : ''; ?>>On</option>
                            <option value="off" <?= ($user['status_akun'] == 'off') ? 'selected' : ''; ?>>Off</option>
                        </select>
                    </div>
                    <div class=" modal-footer">
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