<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?> SKPD</h1>
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

            <a data-toggle="modal" data-target="#tambahModal" href="" class="btn btn-sm btn-primary mb-4 add"> <i class="fas fa-fw fa-plus"> </i> Tambah Realisasi</a>

            <?= $this->session->flashdata('pesan'); ?>

            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode / Tgl Realisasi</th>
                                <th>User / Nama SKPD</th>
                                <th>Keterangan</th>
                                <th>Total Realisasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($realisasi as $r) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $r['id_realisasi'] . ' / ' . date('d F Y', strtotime($r['tglrealisasi'])) ?></td>
                                    <td><?= $r['namapengguna'] . ' / ' . $r['namaskpd'] ?></td>
                                    <td><?= $r['keterangan'] ?></td>
                                    <td><?= number_format($r['jumlahrealisasi']) ?></td>
                                    <td>
                                        <a data-toggle="dropdown" class="btn btn-sm btn-success"><i class="fas fa-fw fa-cog"></i></a>
                                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            <a href="<?= base_url('realisasi/detail/' . encrypt_url($r['id_realisasi'])) ?>" class="dropdown-item">
                                                <div class="media-body"><i class="fas fa-fw fa-eye"></i> Detail
                                            </a>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <a data-toggle="modal" data-target="#editModal" class="dropdown-item edit" data-id="<?= $r['id_realisasi'] ?>">
                                            <div class="media-body"><i class="fas fa-fw fa-edit"></i> Edit
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="<?= base_url('realisasi/delete/' . encrypt_url($r['id_realisasi']) . '/' . encrypt_url($r['koderka'])) ?>" class="dropdown-item" onclick="return confirm('Yakin ingin menghapus data kode <?= $r['id_realisasi'] . ' / ' . date('d F Y', strtotime($r['tglrealisasi'])) ?> ?');">
                                            <div class="media-body"><i class="fas fa-fw fa-trash"></i> Delete
                                        </a>
                                        <div class="dropdown-divider"></div>
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
            <?= form_open_multipart('realisasi/add') ?>
            <div class="modal-body">

                <div class="form-group">
                    <label for="kode">Kode Realisasi</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-fw fa-cog"></i></span>
                        </div>
                        <input type="text" id="kode" name="kode" class="form-control" data-inputmask="'mask': ['999']" data-mask readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tgl">Tanggal Realisasi</label>
                    <input type="date" class="form-control" name="tgl" id="tgl">
                </div>

                <div class="form-group">
                    <label for="kodeskpd">Kode SKPD</label>
                    <select name="kodeskpd" id="kodeskpd" class="form-control">
                        <option value="">- Pilih -</option>
                        <?php foreach ($skpd as $s) : ?>
                            <option value="<?= $s['kodeskpd'] ?>"><?= kodeskpd($s['kodeskpd']) . ' - ' . $s['namaskpd'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="rka">RKA</label>
                    <select name="rka" id="rka" class="form-control">

                    </select>
                </div>

                <div class="form-group">
                    <label for="pengguna">Pengguna</label>
                    <select name="pengguna" id="pengguna" class="form-control">
                        <option value="<?= $user['id_pengguna'] ?>"><?= $user['namapengguna'] ?></option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jml">Jumlah Realisasi</label>
                    <input type="text" class="form-control" name="jml" id="jml" autofocus placeholder="1.000.000">
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan" autofocus placeholder="Keterangan">
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
                <h5 class="modal-title" id="editModalLabel">Ubah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('realisasi/edit') ?>
            <div class="modal-body">

                <div class="form-group">
                    <label for="ukode">Kode Realisasi</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-fw fa-cog"></i></span>
                        </div>
                        <input type="text" id="ukode" name="ukode" class="form-control" data-inputmask="'mask': ['999']" data-mask readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="utgl">Tanggal Realisasi</label>
                    <input type="date" class="form-control" name="utgl" id="utgl">
                </div>

                <div class="form-group sel">
                    <label for="ukodeskpd">Kode SKPD</label>
                    <select name="ukodeskpd" id="ukodeskpd" class="form-control">
                        <option value="">- Pilih -</option>
                        <?php foreach ($skpd as $s) : ?>
                            <option value="<?= $s['kodeskpd'] ?>"><?= kodeskpd($s['kodeskpd']) . ' - ' . $s['namaskpd'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group sel2">
                    <label for="urka">RKA</label>
                    <select name="urka" id="urka" class="form-control">

                    </select>
                    <input type="hidden" name="lama" id="lama" class="form-control">
                </div>

                <div class="form-group">
                    <label for="upengguna">Pengguna</label>
                    <select name="upengguna" id="upengguna" class="form-control">
                        <option value="<?= $user['id_pengguna'] ?>"><?= $user['namapengguna'] ?></option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ujml">Jumlah Realisasi</label>
                    <input type="text" class="form-control" name="ujml" id="ujml" autofocus placeholder="1.000.000">
                </div>

                <div class="form-group">
                    <label for="uketerangan">Keterangan</label>
                    <input type="text" class="form-control" name="uketerangan" id="uketerangan" autofocus placeholder="Keterangan">
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