<?= $this->extend('Auth/template'); ?>

<?= $this->section('content'); ?>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?= base_url(); ?>/assets/img/logo/logo2.png" alt="IMG">
            </div>
            <form action="<?= base_url(); ?>/auth/register/save" method="post">
                <span class="login100-form-title">
                    Form Pendaftaran
                </span>
                <div class="wrap-input100 validate-input">
                    <input class="input100 <?= ($validasi->hasError('nama')) ? 'errorClass' : ''; ?>" type="text" name="nama" placeholder="Nama lengkap" value="<?= old('nama'); ?>">
                    <span class=" focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="errorInput">
                    <?= $validasi->getError('nama'); ?>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100 <?= ($validasi->hasError('email')) ? 'errorClass' : ''; ?>" type="email" name="email" placeholder="Email" value="<?= old('email'); ?>">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="errorInput">
                    <?= $validasi->getError('email'); ?>
                </div>
                <div class="wrap-input100 validate-input">
                    <input class="input100 <?= ($validasi->hasError('password')) ? 'errorClass' : ''; ?>" type="password" name="password" placeholder="Password" id="password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="errorInput">
                    <?= $validasi->getError('password'); ?>
                </div>
                <div class="wrap-input100 validate-input">
                    <input class="input100 <?= ($validasi->hasError('confirm_password')) ? 'errorClass' : ''; ?>" type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="errorInput">
                    <?= $validasi->getError('confirm_password'); ?>
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Daftar
                    </button>
                </div>
                <div class="text-center p-t-90">
                    <a class="txt2" href="<?= base_url(); ?>/login">
                        Login
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>