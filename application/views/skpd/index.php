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

            <a data-toggle="modal" data-target="#tambahModal" href="" class="btn btn-sm btn-primary mb-4 add"> <i class="fas fa-fw fa-plus"> </i> Tambah SKPD</a>

            <?= $this->session->flashdata('pesan'); ?>

            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode SKPD</th>
                                <th>Nama SKPD</th>
                                <th>Alamat SKPD</th>
                                <th>No Telp SKPD</th>
                                <th>Nama Pengguna Anggaran</th>
                                <th>NIP Pengguna Anggaran</th>
                                <th>Nama Bendahara</th>
                                <th>Nip Bendahara</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($skpd as $s) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= kodeskpd($s['kodeskpd']) ?></td>
                                    <td><?= $s['namaskpd'] ?></td>
                                    <td><?= $s['alamatskpd'] ?></td>
                                    <td><?= notelp($s['notelp']) ?></td>
                                    <td><?= $s['namapenggunaananggaran'] ?></td>
                                    <td><?= kodenip($s['nippenggunaananggaran']) ?></td>
                                    <td><?= $s['namabendahara'] ?></td>
                                    <td><?= kodenip($s['nipbendahara']) ?></td>
                                    <td>

                                        <a data-toggle="modal" data-target="#editModal" data-id="<?= $s['kodeskpd'] ?>" class="btn btn-sm btn-warning edit"><i class="fas fa-fw fa-edit"></i></a>
                                        <a href="<?= base_url('skpd/delete/' . encrypt_url($s['kodeskpd'])) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus <?= $s['namaskpd'] ?>?')"><i class="fas fa-fw fa-trash"></i></a>

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
            <?= form_open_multipart('skpd/add') ?>
            <div class="modal-body">

                <div class="form-group">
                    <label for="kode">Kode SKPD</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-fw fa-cog"></i></span>
                        </div>
                        <input type="text" id="kode" name="kode" class="form-control" data-inputmask="'mask': ['99.99.999']" data-mask readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama">SKPD</label>
                    <input type="text" class="form-control" name="nama" id="nama" autofocus placeholder="Dinas Pendidikan" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" autofocus placeholder="Jalan ...." required>
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
                    <label for="pengguna">Nama Pengguna Anggaran</label>
                    <input type="text" class="form-control" name="pengguna" id="pengguna" autofocus placeholder="Budiman" required>
                </div>

                <div class="form-group">
                    <label for="nippengguna">Nip Pengguna Anggaran</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="text" id="nippengguna" name="nippengguna" class="form-control" data-inputmask="'mask': ['9999999 999999 9 999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                    </div>
                    <!-- /.input group -->
                </div>

                <div class="form-group">
                    <label for="bendahara">Nama Bendahara</label>
                    <input type="text" class="form-control" name="bendahara" id="bendahara" autofocus placeholder="Waluyo" required>
                </div>

                <div class="form-group">
                    <label for="nipbendahara">Nip Bendahara</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="text" id="nipbendahara" name="nipbendahara" class="form-control" data-inputmask="'mask': ['9999999 999999 9 999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                    </div>
                    <!-- /.input group -->
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- Edit modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('skpd/edit') ?>
            <div class="modal-body">

                <div class="form-group">
                    <label for="uid">Kode SKPD</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-fw fa-cog"></i></span>
                        </div>
                        <input type="text" id="uid" name="uid" class="form-control" data-inputmask="'mask': ['99.99.999']" data-mask readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="unama">SKPD</label>
                    <input type="text" class="form-control" name="unama" id="unama" autofocus placeholder="Dinas Pendidikan" required>
                </div>

                <div class="form-group">
                    <label for="ualamat">Alamat</label>
                    <input type="text" class="form-control" name="ualamat" id="ualamat" autofocus placeholder="Jalan ...." required>
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

                <div class="form-group">
                    <label for="upengguna">Nama Pengguna Anggaran</label>
                    <input type="text" class="form-control" name="upengguna" id="upengguna" autofocus placeholder="Budiman" required>
                </div>

                <div class="form-group">
                    <label for="unippengguna">Nip Pengguna Anggaran</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="text" id="unippengguna" name="unippengguna" class="form-control" data-inputmask="'mask': ['9999999 999999 9 999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                    </div>
                    <!-- /.input group -->
                </div>

                <div class="form-group">
                    <label for="ubendahara">Nama Bendahara</label>
                    <input type="text" class="form-control" name="ubendahara" id="ubendahara" autofocus placeholder="Waluyo" required>
                </div>

                <div class="form-group">
                    <label for="unipbendahara">Nip Bendahara</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="text" id="unipbendahara" name="unipbendahara" class="form-control" data-inputmask="'mask': ['9999999 999999 9 999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                    </div>
                    <!-- /.input group -->
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>