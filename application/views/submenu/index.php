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

            <a data-toggle="modal" data-target="#tambahModal" href="" class="btn btn-sm btn-primary mb-4"> <i class="fas fa-fw fa-plus"> </i> Tambah Sub Menu</a>

            <?= $this->session->flashdata('pesan'); ?>

            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Menu</th>
                                <th>Title</th>
                                <th>Url</th>
                                <th>icon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($sub as $sms) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $sms['menu'] ?></td>
                                    <td><?= $sms['title'] ?></td>
                                    <td><?= $sms['url'] ?></td>
                                    <td><?= $sms['icon'] ?></td>
                                    <td>
                                        <a data-id="<?= $sms['id'] ?>" data-toggle="modal" data-target="#editModal" href="" class="btn btn-sm btn-warning edit"><i class="fas fa-fw fa-edit"></i></a>
                                        <a href="<?= base_url('submenu/delete/' . encrypt_url($sms['id'])) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus sub menu <?= $sms['title'] ?> ?');"><i class="fas fa-fw fa-trash"></i></a>
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
            <?= form_open_multipart('submenu/add') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="menu">Menu</label>
                    <select name="menu" id="menu" class="form-control">
                        <option value="">- Pilih -</option>
                        <?php foreach ($menus as $m) : ?>
                            <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>

                <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" class="form-control" name="url" id="url" required>
                </div>

                <div class="form-group">
                    <label for="icon">Icon</label>
                    <input type="text" class="form-control" name="icon" id="icon" required>
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
            <?= form_open_multipart('submenu/edit') ?>
            <div class="modal-body">
                <div class="form-group sel">
                    <label for="umenu">Menu</label>
                    <select class="form-control" name="umenu" id="umenu">
                        <?php foreach ($menus as $m) : ?>
                            <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="utitle">Title</label>
                    <input type="text" name="utitle" id="utitle" class="form-control" placeholder=" . . . .">
                    <input type="hidden" name="uid" id="uid" class="form-control" placeholder=" . . . .">
                </div>

                <div class="form-group">
                    <label for="uurl">Url</label>
                    <input type="text" name="uurl" id="uurl" class="form-control" placeholder=" . . . .">
                </div>

                <div class="form-group">
                    <label for="uicon">Icon</label>
                    <input type="text" name="uicon" id="uicon" class="form-control" placeholder=" . . . .">
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