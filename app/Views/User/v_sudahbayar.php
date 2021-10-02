<?= $this->extend('User/template'); ?>

<?= $this->section('content'); ?>
<div class="bs-example" data-example-id="simple-jumbotron">
    <div class="jumbotron">
        <h2>Bukti pembayaran sudah di upload!</h2>
        <h3>"Silakan menunggu konfirmasi dari panitia"</h3>
        <a href="<?= base_url(); ?>/User/Pembayaran/riwayat" class="btn btn-danger mt-2">Lihat Bukti Pembayaran</a>
    </div>
</div>
<?= $this->endSection(); ?>