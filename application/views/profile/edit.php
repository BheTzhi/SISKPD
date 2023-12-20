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
                        <li class="breadcrumb-item"><a href="<?= base_url($this->uri->segment(1)) ?>"><?= ucfirst($this->uri->segment(1)); ?></a></li>
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

            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <?= form_open_multipart('profile/editprofile/' . encrypt_url($user['id_pengguna'])) ?>
                        <div class="text-center">
                            <img id="gmb" class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/images/users/' . $user['foto']) ?>" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?= $user['namapengguna'] ?></h3>

                        <p class="text-muted text-center"><?= $user['username'] ?></p>

                        <div class="row">

                            <div class="col-md-12">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <label for="username">Username : </label>
                                        <a class="float-right">
                                            <input type="hidden" name="ijk" id="ijk" value="<?= $user['jk'] ?>">
                                            <input type="text" name="username" id="username" value="<?= $user['username'] ?>" class="form-control" autofocus>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <label for="nama">Nama : </label>
                                        <a class="float-right">
                                            <input type="text" name="nama" id="nama" class="form-control" value="<?= $user['namapengguna'] ?>">
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <label for="alamat">Alamat : </label>
                                        <a class="float-right"><input type="text" name="alamat" id="alamat" class="form-control" value="<?= $user['alamat'] ?>">
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <label for="jk">Jenis Kelamin : </label>
                                        <a class="float-right sel">
                                            <select name="jk" id="jk" class="form-control">
                                                <option value="l">Laki-Laki</option>
                                                <option value="p">Perempuan</option>
                                            </select>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <label for="notelp">No Telp : </label>
                                        <a class="float-right">
                                            <input type="text" id="notelp" name="notelp" class="form-control" value="<?= $user['notelp'] ?>" data-inputmask="'mask': ['9999-9999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <label for="tmplahir">Tempat Lahir : </label>
                                        <a class="float-right">
                                            <input type="text" name="tmplahir" id="tmplahir" class="form-control" value="<?= $user['tempatlahir'] ?>">
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <label for="tgllahir">Tanggal Lahir : </label>
                                        <a class="float-right">
                                            <input type="date" name="tgllahir" id="tgllahir" class="form-control" value="<?= $user['tgllahir'] ?>">
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <a class="float-right">
                                            <input type="file" class="form-control" id="foto" name="foto" onchange="document.getElementById('gmb').src = window.URL.createObjectURL(this.files[0])">
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= base_url('profile') ?>" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> <b>Kembali</b></a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-block"><b>Simpan</b></button>
                            </div>
                        </div>
                        <?= form_close() ?>
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