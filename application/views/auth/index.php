<style>
    .selamat {
        font-family: 'Times New Roman', Times, serif;
        margin-bottom: 5px;
    }

    .logos {
        margin-bottom: 5px;
        height: 150px;
        width: 350px;
    }
</style>

<div class="login-box">
    <div class="login-logo">
        <!-- <h4 class="selamat">Selamat Datang</h4> -->
        <img src="<?= base_url('assets/images/logo.png') ?>" class="logos" alt="Kabupaten Situbondo">
        <h4 class="selamat">Sistem Informasi SKPD</h4>
    </div>
    <!-- /.login-logo -->
    <div class="card">

        <div class="card-body login-card-body">
            <?= $this->session->flashdata('pesan'); ?>
            <p class="login-box-msg">Selamat Datang</p>

            <form action="<?= base_url('auth/proseslogin') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->