<table id="basic-datatable" class="table dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Password (md5)</th>
            <th>Role</th>
            <th>Status Akun</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>


    <tbody>
        <?php $no = 1 ?>
        <?php foreach ($user as $row) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['password']; ?></td>
                <td><?= $row['role']; ?></td>
                <td class="text-uppercase"><span class="badge bg-<?= $row['status_akun'] == 'on' ? 'success' :  'danger'; ?> rounded-pill"><?= $row['status_akun']; ?></span></td>
                <td class="text-center">
                    <button type="button" id="<?= $row['id_user']; ?>" class="btnEdit btn btn-primary me-1"><i class="mdi mdi-square-edit-outline iconEdit"></i>
                    </button><button type="button" id="<?= $row['id_user']; ?>" class="btn btn-danger btnHapus"><i class="mdi mdi-trash-can-outline iconHapus"></i> </button>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#basic-datatable').DataTable();
    });
</script>
<!-- Datatables js -->
<script src="<?= base_url() ?>/assets/adminTemplate/js/vendor/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/adminTemplate/js/vendor/dataTables.bootstrap5.js"></script>
<script src="<?= base_url() ?>/assets/adminTemplate/js/vendor/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/adminTemplate/js/vendor/responsive.bootstrap5.min.js"></script>