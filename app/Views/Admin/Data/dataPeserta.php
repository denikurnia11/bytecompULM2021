<table id="basic-datatable" class="table dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Ketua</th>
            <th>Asal Sekolah</th>
            <th>NISN</th>
            <th>Tipe Peserta</th>
            <th>Nama Peserta</th>
            <th>Telepon</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Kartu Pelajar</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1 ?>
        <?php foreach ($peserta as $row) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['nama_sekolah']; ?></td>
                <td><?= $row['nisn']; ?></td>
                <td><?= $row['jenis_peserta']; ?></td>
                <td><?= $row['nama_peserta']; ?></td>
                <td><?= $row['no_telepon']; ?></td>
                <td><?= $row['jenis_kelamin']; ?></td>
                <td><?= $row['tempat_lahir']; ?></td>
                <td><?= $row['tanggal_lahir']; ?></td>
                <td class="text-center"> <a href="<?= base_url(); ?>/admin/peserta/review/<?= $row['scan']; ?>" target="_blank"> <img style="width: 100px;" class="scan" src="/kartu-pelajar/<?= $row['scan']; ?>"></a></td>
                <td class="text-center">
                    <button type="button" id="<?= $row['id_peserta']; ?>" class="btnEdit btn btn-primary me-1"><i class="mdi mdi-square-edit-outline iconEdit"></i>
                    </button><button type="button" id="<?= $row['id_peserta']; ?>" class="btn btn-danger btnHapus"><i class="mdi mdi-trash-can-outline iconHapus"></i> </button>
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