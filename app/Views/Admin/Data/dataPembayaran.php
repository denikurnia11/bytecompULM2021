<table id="basic-datatable" class="table dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Ketua</th>
            <th class="text-center">Bukti Pembayaran</th>
            <th>Created At</th>
            <th>Status</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1 ?>
        <?php foreach ($pembayaran as $row) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td class="text-center"> <a href="<?= base_url(); ?>/admin/pembayaran/review/<?= $row['bukti']; ?>" target="_blank"> <img style="width: 100px;" class="bukti" src="<?= base_url(); ?>/bukti-pembayaran/<?= $row['bukti']; ?>"></a></td>
                <td><?= $row['created_at']; ?></td>
                <td class="text-uppercase"><span class="badge bg-<?= $row['status'] == 'berhasil' ? 'success' : ($row['status'] == 'pending' ? 'warning' : 'danger'); ?> rounded-pill"><?= $row['status']; ?></span></td>
                <td class="text-center">
                    <button type="button" id="<?= $row['id_pembayaran']; ?>" class="btnEdit btn btn-primary me-1"><i class="mdi mdi-square-edit-outline iconEdit"></i>
                    </button><button type="button" id="<?= $row['id_pembayaran']; ?>" class="btn btn-danger btnHapus"><i class="mdi mdi-trash-can-outline iconHapus"></i> </button>
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