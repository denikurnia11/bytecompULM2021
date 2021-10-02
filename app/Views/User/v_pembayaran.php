<?= $this->extend('User/template'); ?>

<?= $this->section('content'); ?>
<div class="row justify-content-center">
    <div class="col-lg-12">

        <div class="card widget-flat">
            <div class="card-body">

                <h4 class="text-muted fw-normal mt-0 mb-3" title="Average Revenue">
                    Upload Bukti Pembayaran
                </h4>

                <form action="" method="post" id="form-pembayaran" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row mt-3">
                        <div class="col-3">
                            <label for="example-fileinput" class="form-label">Bukti Pembayaran</label>
                        </div>
                        <div class="col-9">
                            <input type="file" id="bukti" class="form-control" name="bukti" onchange="readURL(this)">
                            <span class="font-13 text-muted">Ukuran maksimal 1mb (jpg, jpeg, png).</span>
                            <div class="invalid-feedback errorBukti"></div>
                        </div>

                    </div>


                    <div class="row mt-3 justify-content-end">
                        <div class="col-md-2"> <button type="submit" class="btn btn-primary form-control btnSimpan">Upload</button>
                            <button class="btn btn-primary form-control btnLoading" type="button" disabled style="display: none;">
                                <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2">
                        <div class="col-md-4 preview">
                            <img id="blah" src="<?= base_url(); ?>/kartu-pelajar/img-not-found.png" alt="preview image" class="img-fluid rounded img-thumbnail" />
                        </div>
                    </div>

                </form>
            </div>
            <!-- end card-body-->
        </div>
        <!-- end card-->
    </div>
    <!-- end col-->
</div>




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
        $(document).on('submit', '#form-pembayaran', function(e) {
            e.preventDefault();

            $.ajax({
                url: '<?= base_url(); ?>/user/pembayaran/save',
                type: 'post',
                dataType: 'json',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btnSimpan').hide();
                    $('.btnLoading').css('display', 'block');
                },
                complete: function() {
                    $('.btnSimpan').show();
                    $('.btnLoading').css('display', 'none');
                },
                success: function(response) {
                    if (response.error) {
                        // Data sekolah
                        if (response.error.bukti) {
                            $(`#bukti`).addClass('is-invalid')
                            $(`.errorBukti`).html(response.error.bukti)
                        } else {
                            $(`#bukti`).removeClass('is-invalid')
                            $(`.errorBukti`).html('')
                        }
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data Telah Tersimpan.',
                            showConfirmButton: false,
                            timer: 0
                        })
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    }
                }
            });
        });
    })
</script>

<?= $this->endSection(); ?>