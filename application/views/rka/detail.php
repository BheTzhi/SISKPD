<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail <?= $title ?> SKPD</h1>
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

            <div class="card">
                <div class="card-header">
                    <div class="post">
                        <div class="user-block">
                            <span>
                                <h4 style="font-style: italic;"><?= kodeskpd($rka['kodeskpd']) . ' - ' . $rka['namaskpd'] ?></h4>
                            </span>
                            <span>Pengguna Anggaran : <?= $rka['nip'] . ' - ' . $rka['nama'] ?></span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-lg-6 mb-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="tgl">Tanggal Pengesahan RKA</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="date" id="tgl" name="tgl" class="form-control" value="<?= $rka['tglpengesahanrka'] ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="ttl">Total RKA</label>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" id="ttl" name="ttl" class="form-control" value="<?= number_format($rka['totalrka']) ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card" style="padding: 30px;">
                    <div class="card-header">
                        <div class="post">
                            <div class="user-block">
                                <span>
                                    <center>
                                        <h4 style="font-style: italic;">Tambah Detail <?= $title ?></h4>
                                    </center>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?= form_open_multipart('rka/adddrka/' . $this->uri->segment(3)) ?>
                    <div class="card-body">
                        <div class="col-lg-12 mb-4">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="kegiatan">Nama Kegiatan</label>
                                </div>
                                <div class="col-lg-9">
                                    <select name="kegiatan" id="kegiatan" class="form-control">
                                        <option value="">- Pilih -</option>
                                        <?php foreach ($kegiatan as $k) : ?>
                                            <option value="<?= $k['id_kegiatan'] ?>"><?= kodekegiatan($k['id_kegiatan']) . ' - ' . $k['namakegiatan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-4 zzz" style="display: none;">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="program">Nama Program</label>
                                </div>
                                <div class="col-lg-9 sel">
                                    <select name="program" id="program" class="form-control">
                                        <?php foreach ($program as $p) : ?>
                                            <option value="<?= $p['kodeprogram'] ?>"><?= $p['kodeprogram'] . ' - ' . $p['namaprogram'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-4 zzz" style="display: none;">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="uraian">Nama Uraian</label>
                                </div>
                                <div class="col-lg-9">
                                    <select name="uraian" id="uraian" class="form-control">
                                        <option value="">- Pilih -</option>
                                        <?php foreach ($uraian as $u) : ?>
                                            <option value="<?= $u['kodeuraian'] ?>"><?= $u['kodeuraian'] . ' - ' . $u['namauraian'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-4 zzz" style="display: none;">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="jumlah">Jumlah RKA</label>
                                </div>
                                <div class="col-lg-3">

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="text" name="jumlah" id="jumlah" class="form-control" maxlength="15">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-4 zzz" style="display: none;">
                            <button style="width: 100%" type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
                <!-- Tabel -->
                <div class="card">

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Kode</th>
                                    <th>Uraian</th>
                                    <th>Jumlah RKA</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($drka as $d) : ?>
                                    <tr>
                                        <th><?= kodeskpd($d['kodeskpd']) . '.' . kodekegiatan($d['id_kegiatan']) ?></th>
                                        <th><?= $d['namakegiatan'] ?></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th><?= kodeskpd($d['kodeskpd']) . '.' . kodekegiatan($d['id_kegiatan']) . '.' . $d['kodeprogram'] ?></th>
                                        <th><?= $d['namaprogram'] ?></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td><?= kodeskpd($d['kodeskpd']) . '.' . kodekegiatan($d['id_kegiatan']) . '.' . $d['kodeprogram'] . '.' . $d['kodeuraian'] ?></td>
                                        <td><?= $d['namauraian'] ?></td>
                                        <td><?= number_format($d['jumlahrka']) ?></td>
                                        <td>
                                            <a href="<?= base_url('rka/deletedrka/' . encrypt_url($d['koderkadetail'])) ?>" class="btn btn-sm- btn-default" onclick="return confirm('Yakin ingin menghapus Detail RKA <?= $d['namauraian'] ?> ?')"><i class="fas fa-fw fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- End Tabel -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>