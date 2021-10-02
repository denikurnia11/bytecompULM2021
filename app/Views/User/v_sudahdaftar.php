<?= $this->extend('User/template'); ?>

<?= $this->section('content'); ?>
<div class="bs-example" data-example-id="simple-jumbotron">
    <div class="jumbotron">
        <h2>Formulir pendaftaran sudah diterima!</h2>
        <h3>"Silakan lanjutkan ke proses pembayaran"</h3>
        <a href="<?= base_url(); ?>/User/Pendaftaran/riwayat" class="btn btn-danger mt-2">Lihat Riwayat Pendaftaran</a>
    </div>
</div>
<?= $this->endSection(); ?>