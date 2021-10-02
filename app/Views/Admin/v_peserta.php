<?= $this->extend('Admin/template'); ?>

<?= $this->section('content'); ?>
<button type="button" class="btn btn-primary mb-2 tombolTambah">Tambah Data</button>
<button class="btn btn-primary mb-2 loading" type="button" disabled style="display: none;">
    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
    Loading...
</button>

<!-- Isi tabel -->
<div class="isi-tabel">

</div>

<!-- Modal -->
<div class="view-modal"></div>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    function getData() {
        $.ajax({
            url: "<?= base_url(); ?>/admin/peserta/getData",
            dataType: "json",
            success: function(response) {
                $(".isi-tabel").html(response.data);
            }
        })
    }

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
        getData();
        $(document).on("click", ".tombolTambah", function() {
            $.ajax({
                url: "<?= base_url(); ?>/admin/peserta/tambah",
                dataType: "json",
                beforeSend: function() {
                    $('.tombolTambah').hide();
                    $('.loading').css('display', 'block');
                },
                complete: function() {
                    $('.tombolTambah').show();
                    $('.loading').css('display', 'none');

                },
                success: function(response) {
                    $('.view-modal').html(response)
                    $(".modal").modal("show");
                }
            })
        });

        $(document).on("submit", "#form-tambah-peserta", function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url(); ?>/admin/peserta/save',
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
                        if (response.error.scan) {
                            $('#inputKartu').addClass('is-invalid')
                            $('.errorScan').html(response.error.scan)
                        } else {
                            $('#inputKartu').removeClass('is-invalid')
                            $('.errorScan').html('')
                        }
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data Telah Tersimpan.',
                            showConfirmButton: true,
                            timer: 0
                        })
                        $(".modal").modal("hide");
                        getData();
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

        $(document).on("click", ".btnEdit", function() {
            $.ajax({
                url: "<?= base_url(); ?>/admin/peserta/edit",
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

        });

        $(document).on("submit", "#form-edit-peserta", function(e) {
            e.preventDefault();

            $.ajax({
                url: '<?= base_url(); ?>/admin/peserta/update',
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
                            showConfirmButton: true,
                            timer: 0
                        })
                        $(".modal").modal("hide");
                        getData();
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

        $(document).on('click', '.btnHapus', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).attr('id');
                    $.ajax({
                        type: 'POST',
                        url: "<?= base_url(); ?>/admin/peserta/hapus",
                        data: {
                            id: id
                        },
                        beforeSend: function() {
                            $('.iconHapus').removeClass('mdi mdi-trash-can-outline');
                            $('.iconHapus').addClass('spinner-border spinner-border-sm');

                        },
                        complete: function() {
                            $('.iconHapus').removeClass('spinner-border spinner-border-sm');
                            $('.iconHapus').addClass('mdi mdi-trash-can-outline');
                        },
                        success: function() {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Data Berhasil Dihapus.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            getData();
                        },
                        error: function(response) {
                            console.log(response.responseText);
                        }
                    });
                }
            })

        });
    })
</script>

<?= $this->endSection(); ?>