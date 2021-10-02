<?= $this->extend('User/template'); ?>

<?= $this->section('content'); ?>
<table id="basic-datatable" class="table dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Ketua</th>
            <th class="text-center">Bukti Pembayaran</th>
            <th>Created At</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td><?= $pembayaran['nama']; ?></td>
            <td class="text-center"> <img style="width: 100px;" class="bukti" src="/bukti-pembayaran/<?= $pembayaran['bukti']; ?>"></td>
            <td><?= $pembayaran['created_at']; ?></td>
            <td class="text-uppercase"><span class="badge bg-<?= $pembayaran['status'] == 'berhasil' ? 'success' : ($pembayaran['status'] == 'pending' ? 'warning' : 'danger'); ?> rounded-pill"><?= $pembayaran['status']; ?></span></td>
        </tr>

    </tbody>
</table>




<?= $this->endSection(); ?>