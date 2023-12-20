<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="card">
        <div class="card-body login-card-body">
            <?= $this->session->flashdata('pesan'); ?>

            <p class="login-box-msg">Ganti Pasword Anda.</p>

            <?= form_open_multipart('profile/changepassword') ?>
            <div class="input-group mb-3">
                <input type="password" id="old" name="old" class="form-control" placeholder="Password Lama">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock-open"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" id="new" name="new" class="form-control" placeholder="Password Baru">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" id="confirm" name="confirm" class="form-control" placeholder="Confirm Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" onclick="return confirm('Yakin ingin merubah password.?')" class="btn btn-primary btn-block">Ganti password</button>
                </div>
                <!-- /.col -->
            </div>
            <?= form_close() ?>

        </div>
        <!-- /.login-card-body -->
    </div>
    <!-- /.content -->
</div>