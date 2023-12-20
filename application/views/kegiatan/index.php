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

            <a data-toggle="modal" data-target="#tambahModal" href="" class="btn btn-sm btn-primary mb-4 add"> <i class="fas fa-fw fa-plus"> </i> Tambah Kegiatan</a>

            <?= $this->session->flashdata('pesan'); ?>

            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Kegiatan</th>
                                <th>Nama Kegiatan</th>
                                <th>Program</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($kegiatan as $k) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= kodekegiatan($k['id_kegiatan']) ?></td>
                                    <td><?= $k['namakegiatan'] ?></td>
                                    <td><?= $k['kodeprogram'] . ' - ' . $k['namaprogram'] ?></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#editModal" data-id="<?= $k['id_kegiatan'] ?>" href="" class="btn btn-sm btn-warning edit"><i class="fas fa-fw fa-edit"></i></a>
                                        <a href="<?= base_url('kegiatan/delete/' . encrypt_url($k['id_kegiatan'])) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus <?= $k['namakegiatan'] ?>?')"><i class="fas fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
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
            <?= form_open_multipart('kegiatan/add') ?>
            <div class="modal-body">

                <div class="form-group">
                    <label for="kode">Kode Kegiatan</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-fw fa-cog"></i></span>
                        </div>
                        <input type="text" id="kode" name="kode" class="form-control" data-inputmask="'mask': ['99.99']" data-mask readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="kegiatan">Kegiatan</label>
                    <input type="text" class="form-control" name="kegiatan" id="kegiatan" autofocus required placeholder="Kegiatan Program ...">
                </div>

                <div class="form-group">
                    <label for="program">Program</label>
                    <select name="program" id="program" class="form-control">
                        <option value="">- Pilih -</option>
                        <?php foreach ($program as $p) : ?>
                            <option value="<?= $p['kodeprogram'] ?>"><?= $p['kodeprogram'] . ' - ' . $p['namaprogram'] ?></option>
                        <?php endforeach; ?>
                    </select>
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
            <?= form_open_multipart('kegiatan/edit') ?>
            <div class="modal-body">

                <div class="form-group">
                    <label for="kode">Kode Kegiatan</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-fw fa-cog"></i></span>
                        </div>
                        <input type="text" id="ukode" name="ukode" class="form-control" data-inputmask="'mask': ['99.99']" data-mask readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ukegiatan">Kegiatan</label>
                    <input type="text" class="form-control" name="ukegiatan" id="ukegiatan" autofocus required placeholder="Kegiatan Program ...">
                </div>

                <div class="form-group sel">
                    <label for="program">Program</label>
                    <select name="uprogram" id="uprogram" class="form-control">
                        <?php foreach ($program as $p) : ?>
                            <option value="<?= $p['kodeprogram'] ?>"><?= $p['kodeprogram'] . ' - ' . $p['namaprogram'] ?></option>
                        <?php endforeach; ?>
                    </select>
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