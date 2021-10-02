<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bytecomp ULM</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/favicon/favicon-16x16.png" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/auth/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/auth/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/auth/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/auth/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/auth/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/auth/css/main.css">

</head>

<body>
    <?= $this->renderSection('content'); ?>

    <script src="<?= base_url() ?>/assets/auth/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url() ?>/assets/auth/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url() ?>/assets/auth/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/auth/vendor/select2/select2.min.js"></script>
    <script src="<?= base_url() ?>/assets/auth/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <script src="<?= base_url() ?>/assets/auth/js/main.js"></script>

    <script>
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }
        $(document).ready(function() {
            $("#confirm_password").change(function() {
                const password = $("#password").val();
                const confirm_password = $("#confirm_password").val();
                if (password != confirm_password) {
                    $("#confirm_password").addClass("errorClass");
                } else {
                    $("#confirm_password").removeClass("errorClass");

                }
            }) // tinggal pesan eror nya
        })
    </script>
</body>

</html>