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

            <a data-toggle="modal" data-target="#tambahModal" href="" class="btn btn-sm btn-primary mb-4"> <i class="fas fa-fw fa-plus"> </i> Tambah User</a>

            <?= $this->session->flashdata('pesan'); ?>

            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>TTL</th>
                                <th>No Telp</th>
                                <th>Foto</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>SKPD</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($users as $u) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $u['namapengguna'] ?></td>
                                    <td><?= $u['alamat'] ?></td>
                                    <td><?= jk($u['jk']) ?></td>
                                    <td><?= $u['tempatlahir'] . ', ' . date('d F Y', strtotime($u['tgllahir'])) ?></td>
                                    <td><?= notelp($u['notelp']) ?></td>
                                    <td>
                                        <img style="height: 3cm; weight:2cm;" src="<?= base_url('assets/images/users/') . $u['foto']; ?>" class="img-thumbnail">
                                    </td>
                                    <td><?= $u['username'] ?></td>
                                    <td><?= $u['role'] ?></td>
                                    <td><?= $u['namaskpd'] ?></td>
                                    <td>
                                        <a data-id="<?= $u['id_pengguna'] ?>" data-toggle="modal" data-target="#editModal" href="" class="btn btn-sm btn-warning edit"><i class="fas fa-fw fa-edit"></i></a>
                                        <a href="<?= base_url('user/delete/' . encrypt_url($u['id_pengguna'])) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus user <?= $u['namapengguna'] ?> ?');"><i class="fas fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Tambah modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('user/add/') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="....">
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" placeholder="....">
                </div>

                <div class="form-group">
                    <label for="notelp">No Telp</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" id="notelp" name="notelp" class="form-control" data-inputmask="'mask': ['9999-9999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                    </div>
                    <!-- /.input group -->
                </div>

                <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control">
                        <option value="">- Pilih -</option>
                        <option value="l">Laki-laki</option>
                        <option value="p">Perempuan</option>
                    </select>
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tempatlahir">Tempat Lahir</label>
                            <input type="text" name="tempatlahir" id="tempatlahir" class="form-control" placeholder="....">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tgllahir">Tanggal Lahir</label>
                            <input type="date" name="tgllahir" id="tgllahir" class="form-control" placeholder="....">
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="....">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" class="form-control" placeholder="....">
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="">- Pilih -</option>
                        <?php foreach ($role as $r) : ?>
                            <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="skpd">Nama SKPD</label>
                    <select name="skpd" id="skpd" class="form-control">
                        <option value="">- Pilih -</option>
                        <?php foreach ($skpd as $s) : ?>
                            <option value="<?= $s['kodeskpd'] ?>"><?= kodeskpd($s['kodeskpd']) . ' - ' . $s['namaskpd'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <img id="gmb" src="" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto" onchange="document.getElementById('gmb').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<!-- Edit modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('user/edit') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="unama">Nama</label>
                    <input type="text" name="unama" id="unama" class="form-control" placeholder="....">
                    <input type="hidden" name="uid" id="uid" class="form-control" placeholder="....">
                </div>

                <div class="form-group">
                    <label for="ualamat">Alamat</label>
                    <input type="text" name="ualamat" id="ualamat" class="form-control" placeholder="....">
                </div>

                <div class="form-group">
                    <label for="unotelp">No Telp</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" id="unotelp" name="unotelp" class="form-control" data-inputmask="'mask': ['9999-9999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                    </div>
                    <!-- /.input group -->
                </div>

                <div class="form-group aaa">
                    <label for="ujk">Jenis Kelamin</label>
                    <select name="ujk" id="ujk" class="form-control">
                        <option value="l">Laki-laki</option>
                        <option value="p">Perempuan</option>
                    </select>
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="utempatlahir">Tempat Lahir</label>
                            <input type="text" name="utempatlahir" id="utempatlahir" class="form-control" placeholder="....">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="utgllahir">Tanggal Lahir</label>
                            <input type="date" name="utgllahir" id="utgllahir" class="form-control" placeholder="....">
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label for="uusername">Username</label>
                    <input type="text" name="uusername" id="uusername" class="form-control" placeholder="....">
                </div>

                <div class="form-group rmn">
                    <label for="urole">Role</label>
                    <select name="urole" id="urole" class="form-control">
                        <?php foreach ($role as $r) : ?>
                            <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group sel">
                    <label for="skpd">Nama SKPD</label>
                    <select name="uskpd" id="uskpd" class="form-control">
                        <?php foreach ($skpd as $s) : ?>
                            <option value="<?= $s['kodeskpd'] ?>"><?= kodeskpd($s['kodeskpd']) . ' - ' . $s['namaskpd'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <img id="ugmb" src="" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <label for="ufoto">Foto</label>
                                <input type="file" class="form-control" id="ufoto" name="ufoto" onchange="document.getElementById('ugmb').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success" type="submit">Simpan</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>