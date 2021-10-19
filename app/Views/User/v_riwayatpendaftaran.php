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
                <td class="text-center"> <img style="width: 100px;" class="scan" src="<?= base_url(); ?>/kartu-pelajar/<?= $row['scan']; ?>"></td>
                <td class="text-center">
                    <button type="button" id="<?= $row['id_peserta']; ?>" class="btnEdit btn btn-primary me-1"><i class="mdi mdi-square-edit-outline iconEdit"></i>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!-- Modal -->
<div class="view-modal"></div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    function readURL(input, id) {
        id = id || '#blah';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(id)
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
        $('#basic-datatable').DataTable();
        $(document).on("click", ".btnEdit", function() {
            $.ajax({
                url: "<?= base_url(); ?>/user/pendaftaran/editPeserta",
                dataType: "json",
                data: {
                    id: $(this).attr('id')
                },
                beforeSend: function() {
                    $('.iconEdit').removeClass('mdi mdi-square-edit-outline');
                    $('.iconEdit').addClass('spinner-border spinner-border-sm');

                },
                complete: function() {
                    $('.iconEdit').removeClass('spinner-border spinner-border-sm');
                    $('.iconEdit').addClass('mdi mdi-square-edit-outline');
                },
                success: function(response) {
                    $('.view-modal').html(response)
                    $(".modal").modal("show");
                }
            })

        })
        $(document).on("submit", "#form-edit-peserta", function(e) {
            e.preventDefault();

            $.ajax({
                url: '<?= base_url(); ?>/user/pendaftaran/updatePeserta',
                type: 'post',
                dataType: 'json',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btnUpdate').hide();
                    $('.btnLoading').css('display', 'block');
                },
                complete: function() {
                    $('.btnUpdate').show();
                    $('.btnLoading').css('display', 'none');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.scan) {
                            $('#inputKartu').addClass('is-invalid')
                            $('.errorScan').html(response.error.scan)
                        } else {
                            $('#scan').removeClass('is-invalid')
                            $('.inputKartu').html('')
                        }
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data Telah Terupdate.',
                            showConfirmButton: false,
                            timer: 0
                        })
                        $(".modal").modal("hide");
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    }
                },
                error: function(jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    alert(msg);
                },
            })
        });

    });
</script>
<!-- Datatables js -->
<script src="<?= base_url() ?>/assets/adminTemplate/js/vendor/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/adminTemplate/js/vendor/dataTables.bootstrap5.js"></script>
<script src="<?= base_url() ?>/assets/adminTemplate/js/vendor/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/adminTemplate/js/vendor/responsive.bootstrap5.min.js"></script>
<?= $this->endSection(); ?>