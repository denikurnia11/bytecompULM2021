<?= $this->extend('Auth/template'); ?>

<?= $this->section('content'); ?>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?= base_url(); ?>/assets/img/logo/logo2.png" alt="IMG">
                <div class="text-center p-t-12">
                    <span class="txt1">
                        Kembali ke
                    </span>
                    <a class="txt2" href="<?= base_url(); ?>/">
                        Home
                    </a>
                </div>
            </div>

            <form action="<?= base_url(); ?>/Auth/Login/cek_login" method="post">
                <span class="login100-form-title">
                    Form Login
                </span>
                <?= session()->getFlashdata('pesanRegis'); ?>

                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="pass" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="errorInput">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Login
                    </button>
                </div>
                <div class="text-center p-t-12">
                    <span class="txt1">
                        Lupa
                    </span>
                    <a class="txt2" href="<?= base_url(); ?>/lupaPassword">
                        Password?
                    </a>
                </div>
                <div class="text-center p-t-136">
                    <a class="txt2" href="<?= base_url(); ?>/register">
                        Buat Akun
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>