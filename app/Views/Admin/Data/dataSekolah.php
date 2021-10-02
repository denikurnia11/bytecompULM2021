<table id="basic-datatable" class="table dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Ketua</th>
            <th>NPSN</th>
            <th>Nama Sekolah</th>
            <th>Provinsi</th>
            <th>Kota</th>
            <th>Alamat</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1 ?>
        <?php foreach ($sekolah as $row) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['npsn']; ?></td>
                <td><?= $row['nama_sekolah']; ?></td>
                <td><?= $row['provinsi']; ?></td>
                <td><?= $row['kota']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td class="text-center">
                    <button type="button" id="<?= $row['id_sekolah']; ?>" class="btnEdit btn btn-primary me-1"><i class="mdi mdi-square-edit-outline iconEdit"></i>
                    </button><button type="button" id="<?= $row['id_sekolah']; ?>" class="btn btn-danger btnHapus"><i class="mdi mdi-trash-can-outline"></i> </button>
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