<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Verifikasi Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/favicon/favicon-16x16.png" />


    <!-- App css -->
    <link href="<?= base_url() ?>/assets/adminTemplate/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/adminTemplate/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="<?= base_url() ?>/assets/adminTemplate/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

</head>

<body>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6">
            <div class="card widget-flat ">
                <div class="card-body">
                    <h4 class="text-center text-muted fw-normal mt-0 mb-3" title="Number of Orders">
                        <span class="fs-3">Verifikasi Email</span>
                    </h4>
                    <form action="" method="post" id="form-verifikasi">
                        <input type="hidden" value="<?= $token; ?>" name="token">
                        <input type="hidden" value="<?= $dataUser['id_user']; ?>" name="id_user">
                        <input type="hidden" value="<?= $dataUser['email']; ?>" name="email">
                        <input type="hidden" value="<?= $dataUser['nama']; ?>" name="nama">
                        <input type="hidden" value="<?= $dataUser['password']; ?>" name="password">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="token-input" />
                                    <label for="floatingInput">Token</label>
                                    <span class="font-13 text-muted">Token verifikasi telah terkirim ke email kamu. Silakan cek secara berkala.</span>
                                </div>
                            </div>
                            <div class="col-lg-3 text-center">
                                <button type="submit" class="btn btn-primary tombolVerify">Verify</button>
                                <button class="btn btn-primary loading" type="button" disabled style="display: none;">
                                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                            </div>

                    </form>
                    <h4 class="text-center text-muted fw-normal mt-0 mb-0" title="Number of Orders">
                        <a class="font-12" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="Jika tidak mendapat email, Silakan hubungi nomor WA berikut : 087840006063 (Deni Kurnia)"><span style="cursor: pointer;">Bantuan</span></a>
                    </h4>
                </div>
            </div>
            <!-- end card-body-->
        </div>
        <!-- end card-->
    </div>
    </div>

    <!-- bundle -->
    <script src="<?= base_url() ?>/assets/adminTemplate/js/vendor.min.js"></script>
    <script src="<?= base_url() ?>/assets/adminTemplate/js/app.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $(document).on("submit", "#form-verifikasi", function(e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "<?= base_url(); ?>/auth/verifikasi/periksa",
                    data: new FormData(this),
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('.tombolVerify').hide();
                        $('.loading').css('display', 'block');
                    },
                    complete: function() {
                        $('.tombolVerify').show();
                        $('.loading').css('display', 'none');
                    },
                    success: function(response) {
                        if (response.error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Token Salah',
                            })
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Berhasil!',
                                showConfirmButton: true,
                                timer: 0
                            })
                            window.location.href = "<?= base_url(); ?>/auth/login";
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>