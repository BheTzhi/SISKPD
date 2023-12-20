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
    <section class="content">
        <div class="container-fluid">

            <?= $this->session->flashdata('pesan'); ?>

            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/images/users/' . $user['foto']) ?>" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?= $user['namapengguna'] ?></h3>

                        <p class="text-muted text-center"><?= $user['username'] ?></p>

                        <div class="row">

                            <div class="col-md-6">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Nama : </b> <a class="float-right"><?= $user['namapengguna'] ?></a>
                                    </li>
                                </ul>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Jenis Kelamin : </b> <a class="float-right"><?= jk($user['jk']) ?></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Alamat : </b> <a class="float-right"><?= $user['alamat'] ?></a>
                                    </li>
                                </ul>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>TTL : </b> <a class="float-right"><?= $user['tempatlahir'] . ", " . date('d F Y', strtotime($user['tgllahir'])) ?></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>No Telp : </b> <a class="float-right"><?= notelp($user['notelp']) ?></a>
                                    </li>
                                </ul>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <!-- TO DO WHAT -->
                                </ul>
                            </div>

                        </div>

                        <a href="<?= base_url('profile/edit') ?>" class="btn btn-success btn-block"><b>Edit</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>