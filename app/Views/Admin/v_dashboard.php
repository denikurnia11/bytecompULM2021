<?= $this->extend('Admin/template'); ?>

<?= $this->section('content'); ?>

<div class="row justify-content-center">
    <div class="col">
        <div class="row">
            <div class="col-lg-4">
                <div class="card widget-flat">
                    <div class="card-body">
                        <h4 class="text-muted fw-normal mt-0" title="Number of Customers">
                            <span class="badge badge-warning-lighten">Pembayaran Pending</span>
                        </h4>
                        <h3 class="mt-3 mb-3">
                            <?php $totalPending = 0;
                            foreach ($pembayaran as $row) : ?>
                                <?php
                                if ($row['status'] == 'pending') {
                                    $totalPending++;
                                }
                                ?>
                            <?php endforeach; ?>
                            <?= $totalPending; ?>
                        </h3>
                    </div>
                    <!-- end card-body-->
                </div>
                <!-- end card-->
            </div>
            <!-- end col-->
            <div class="col-lg-4">
                <div class="card widget-flat">
                    <div class="card-body">
                        <h4 class="text-muted fw-normal mt-0" title="Number of Orders">
                            <span class="badge badge-success-lighten"> Pembayaran Berhasil</span>
                        </h4>
                        <h3 class="mt-3 mb-3">
                            <?php $totalBerhasil = 0;
                            foreach ($pembayaran as $row) : ?>
                                <?php
                                if ($row['status'] == 'berhasil') {
                                    $totalBerhasil++;
                                }
                                ?>
                            <?php endforeach; ?>
                            <?= $totalBerhasil; ?>
                        </h3>
                    </div>
                    <!-- end card-body-->
                </div>
                <!-- end card-->
            </div>
            <!-- end col-->

            <div class="col-lg-4">
                <div class="card widget-flat">
                    <div class="card-body">
                        <h4 class="text-muted fw-normal mt-0" title="Number of Orders">
                            <span class="badge badge-danger-lighten">Pembayaran Gagal</span>
                        </h4>
                        <h3 class="mt-3 mb-3">
                            <?php $totalGagal = 0;
                            foreach ($pembayaran as $row) : ?>
                                <?php
                                if ($row['status'] == 'gagal') {
                                    $totalGagal++;
                                }
                                ?>
                            <?php endforeach; ?>
                            <?= $totalGagal; ?>
                        </h3>
                    </div>
                    <!-- end card-body-->
                </div>
                <!-- end card-->
            </div>
            <!-- end col-->


        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <h4 class="text-muted fw-normal mt-0" title="Number of Orders">
                            <span class="badge badge-warning-lighten">Pendaftaran Belum Valid</span>
                        </h4>
                        <h3 class="mt-3 mb-3">
                            <?php $totalInvalid = 0;
                            foreach ($pendaftaran as $row) : ?>
                                <?php
                                if ($row['status_pendaftaran'] == 'belum_valid') {
                                    $totalInvalid++;
                                }
                                ?>
                            <?php endforeach; ?>
                            <?= $totalInvalid; ?>
                        </h3>
                    </div>
                    <!-- end card-body-->
                </div>
                <!-- end card-->
            </div>
            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <h4 class="text-muted fw-normal mt-0" title="Number of Orders">
                            <span class="badge badge-success-lighten">Pendaftaran Valid</span>
                        </h4>
                        <h3 class="mt-3 mb-3">
                            <?php $totalValid = 0;
                            foreach ($pendaftaran as $row) : ?>
                                <?php
                                if ($row['status_pendaftaran'] == 'valid') {
                                    $totalValid++;
                                }
                                ?>
                            <?php endforeach; ?>
                            <?= $totalValid; ?>
                        </h3>
                    </div>
                    <!-- end card-body-->
                </div>
                <!-- end card-->
            </div>

        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <h4 class="text-muted fw-normal mt-0" title="Average Revenue">
                            <span class="badge badge-info-lighten">Peserta</span>
                        </h4>
                        <h3 class="mt-3 mb-3">
                            <?= $peserta; ?>
                        </h3>
                    </div>
                    <!-- end card-body-->
                </div>
                <!-- end card-->
            </div>
            <!-- end col-->

            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <h4 class="text-muted fw-normal mt-0" title="Growth">
                            <span class="badge badge-info-lighten">Sekolah</span>
                        </h4>
                        <h3 class="mt-3 mb-3">
                            <?= $sekolah; ?>
                        </h3>
                    </div>
                    <!-- end card-body-->
                </div>
                <!-- end card-->
            </div>
            <!-- end col-->
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <h4 class="text-muted fw-normal mt-0" title="Average Revenue">
                            <span class="badge badge-primary-lighten">Akun User</span>
                        </h4>
                        <h3 class="mt-3 mb-3">
                            <?php $totalUser = 0;
                            foreach ($user as $row) : ?>
                                <?php
                                if ($row['role'] == 'user') {
                                    $totalUser++;
                                }
                                ?>
                            <?php endforeach; ?>
                            <?= $totalUser; ?>
                        </h3>
                    </div>
                    <!-- end card-body-->
                </div>
                <!-- end card-->
            </div>
            <!-- end col-->

            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <h4 class="text-muted fw-normal mt-0" title="Growth">
                            <span class="badge badge-primary-lighten">Akun Admin</span>
                        </h4>
                        <h3 class="mt-3 mb-3">
                            <?php $totalAdmin = 0;
                            foreach ($user as $row) : ?>
                                <?php
                                if ($row['role'] == 'admin') {
                                    $totalAdmin++;
                                }
                                ?>
                            <?php endforeach; ?>
                            <?= $totalAdmin; ?>
                        </h3>
                    </div>
                    <!-- end card-body-->
                </div>
                <!-- end card-->
            </div>
            <!-- end col-->
        </div>
    </div>
    <!-- end col -->
    <!-- end col -->
</div>
<!-- end row -->

</div>
<!-- container -->
<?= $this->endSection(); ?>