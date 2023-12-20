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

            <a data-toggle="modal" data-target="#tambahModal" href="" class="btn btn-sm btn-primary mb-4 add"> <i class="fas fa-fw fa-plus"> </i> Tambah RKA</a>

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
                                <th>Tgl Pengesahan RKA</th>
                                <th>Total Anggaran RKA</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($rka as $r) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= kodeskpd($r['kodeskpd']) ?></td>
                                    <td><?= $r['namaskpd'] ?></td>
                                    <td><?= date('d F Y', strtotime($r['tglpengesahanrka']))  ?></td>
                                    <td><?= number_format($r['totalrka']) ?></td>
                                    <td>
                                        <a href="<?= base_url('rka/detail/' . encrypt_url($r['koderka'])) ?>" class="btn btn-sm btn-success"><i class="fas fa-fw fa-cog"></i></a>
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
            <?= form_open_multipart('rka/add') ?>
            <div class="modal-body">

                <div class="form-group">
                    <label for="rka">Kode RKA</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-fw fa-cog"></i></span>
                        </div>
                        <input type="text" id="rka" name="rka" class="form-control" data-inputmask="'mask': ['999']" data-mask readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="kodespkd">Kode SKPD</label>
                    <select name="kodespkd" id="kodeskpd" class="form-control">
                        <option value="">- Pilih -</option>
                        <?php foreach ($skpd as $s) : ?>
                            <option value="<?= $s['kodeskpd'] ?>"><?=kodeskpd( $s['kodeskpd']) . ' - ' . $s['namaskpd'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="trka">Total RKA</label>
                    <input type="text" class="form-control" name="trka" id="trka" autofocus placeholder="1.000.000.000">
                </div>

                <div class="form-group">
                    <label for="tglrka">Tanggal Pengesahan RKA</label>
                    <input type="date" class="form-control" name="tglrka" id="tglrka">
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