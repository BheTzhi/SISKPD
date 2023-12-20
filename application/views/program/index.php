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

            <a data-toggle="modal" data-target="#tambahModal" href="" class="btn btn-sm btn-primary mb-4 add"> <i class="fas fa-fw fa-plus"> </i> Tambah Program</a>

            <?= $this->session->flashdata('pesan'); ?>

            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Program</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($program as $p) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $p['kodeprogram'] ?></td>
                                    <td><?= $p['namaprogram'] ?></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#editModal" data-id="<?= $p['kodeprogram'] ?>" href="" class="btn btn-sm btn-warning edit"><i class="fas fa-fw fa-edit"></i></a>
                                        <a href="<?= base_url('program/delete/' . encrypt_url($p['kodeprogram'])) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus <?= $p['namaprogram'] ?>?')"><i class="fas fa-fw fa-trash"></i></a>
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
            <?= form_open_multipart('program/add') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="kode">Kode</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-fw fa-cog"></i></span>
                        </div>
                        <input type="text" id="kode" name="kode" class="form-control" data-inputmask="'mask': ['99']" data-mask readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Program</label>
                    <input type="text" class="form-control" name="nama" id="nama" autofocus placeholder="Program Administrasi ...">
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
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('program/edit') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="ukode">Kode</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-fw fa-cog"></i></span>
                        </div>
                        <input type="text" id="ukode" name="ukode" class="form-control" data-inputmask="'mask': ['99']" data-mask readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="unama">Nama Program</label>
                    <input type="text" class="form-control" name="unama" id="unama" autofocus placeholder="Program Administrasi ...">
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