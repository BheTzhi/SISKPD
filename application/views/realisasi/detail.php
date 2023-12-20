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
                                <h4 style="font-style: italic;"><?= kodeskpd($result['kodeskpd']) . ' - ' . $result['namaskpd'] ?></h4>
                            </span>
                            <span>Pengguna Anggaran : <?= kodenip($result['nip']) . ' - ' . $result['nama'] ?></span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-lg-12 mb-4">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="tglrka">Tanggal RKA</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="date" id="tglrka" name="tglrka" class="form-control" value="<?= $result['tglpengesahanrka'] ?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="tglrealisasi">Tanggal Realisasi Anggaran</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="date" id="tglrealisasi" name="tglrealisasi" class="form-control" value="<?= $result['tglrealisasi'] ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mb-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="jmlrka">Jumlah RKA</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="text" id="jmlrka" name="jmlrka" class="form-control" value="<?= number_format($result['totalrka']) ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="jmlrealisasi">Jumlah Realisasi</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="text" id="jmlrealisasi" name="jmlrealisasi" class="form-control" value="<?= number_format($result['jumlahrealisasi']) ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mb-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="sisa">Sisa RKA</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="text" id="sisa" name="sisa" class="form-control" value="<?= number_format($result['totalrka'] - $result['jumlahrealisasi']) ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="kkp">Kebutuhan Kegiatan & Program</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="text" id="kkp" name="kkp" class="form-control" value="<?= number_format($result['ttl']) ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <!-- Tabel -->
                <div class="card collapsed-card">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i> Detail
                            </button>
                        </div>
                        <div class="post">
                            <div class="user-block">
                                <span>
                                    <center>
                                        <h4 style="font-style: italic;">Detail Kebutuhan Kegiatan RKA dan Realisasi</h4>
                                    </center>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Kode</th>
                                    <th>Uraian</th>
                                    <th>Jumlah RKA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($drka as $d) : ?>
                                    <tr>
                                        <th><?= kodeskpd($d['kodeskpd']) . '.' . kodekegiatan($d['id_kegiatan']) ?></th>
                                        <th><?= $d['namakegiatan'] ?></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th><?= kodeskpd($d['kodeskpd']) . '.' . kodekegiatan($d['id_kegiatan']) . '.' . $d['kodeprogram'] ?></th>
                                        <th><?= $d['namaprogram'] ?></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td><?= kodeskpd($d['kodeskpd']) . '.' . kodekegiatan($d['id_kegiatan']) . '.' . $d['kodeprogram'] . '.' . $d['kodeuraian'] ?></td>
                                        <td><?= $d['namauraian'] ?></td>
                                        <td><?= number_format($d['jumlahrka']) ?></td>

                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <th colspan="4" style="text-align: center;"><i>Realisasi</i></th>
                                </tr>
                                <tr>
                                    <th>Realisasi Kode</th>
                                    <th>Tanggal</th>
                                    <th colspan="2" style="text-align: center;">Total</th>
                                </tr>
                                <tr>
                                    <th><?= $result['id_realisasi'] ?></th>
                                    <th><?= date('d F Y', strtotime($result['tglrealisasi'])) ?></th>
                                    <th colspan="2" style="text-align: center;"><?= number_format($result['jumlahrealisasi']) ?></th>
                                </tr>
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