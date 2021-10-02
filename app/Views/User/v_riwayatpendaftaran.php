<?= $this->extend('User/template'); ?>

<?= $this->section('content'); ?>
<table id="basic-datatable1" class="table dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Ketua</th>
            <th>Asal Sekolah</th>
            <th>Jenis Lomba</th>
            <th>Status Pendaftaran</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td><?= $pendaftaran['nama']; ?></td>
            <td><?= $pendaftaran['nama_sekolah']; ?></td>
            <td><?= $pendaftaran['nama_lomba']; ?></td>
            <td class="text-uppercase"><span class="badge bg-<?= $pendaftaran['status_pendaftaran'] == 'valid' ? 'success' : 'danger'; ?> rounded-pill"><?= $pendaftaran['status_pendaftaran'] == 'valid' ? 'Terverifikasi' : 'Dalam Tahap Verifikasi';  ?></span></td>
        </tr>
    </tbody>
</table>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Data Peserta</h4>
        </div>
    </div>
</div>
<table id="basic-datatable" class="table dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th>No</th>
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
                <td><?= $row['nisn']; ?></td>
                <td><?= $row['jenis_peserta']; ?></td>
                <td><?= $row['nama_peserta']; ?></td>
                <td><?= $row['no_telepon']; ?></td>
                <td><?= $row['jenis_kelamin']; ?></td>
                <td><?= $row['tempat_lahir']; ?></td>
                <td><?= $row['tanggal_lahir']; ?></td>
                <td class="text-center"> <img style="width: 100px;" class="scan" src="/kartu-pelajar/<?= $row['scan']; ?>"></td>
                <td class="text-center">
                    <button type="button" id="<?= $row['id_peserta']; ?>" class="btnEdit btn btn-primary me-1"><i class="mdi mdi-square-edit-outline iconEdit"></i>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
<?= $this->endSection(); ?>