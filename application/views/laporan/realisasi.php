<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?> - SKPD</h1>
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
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <center>
                        <h2>Pilih Periode Laporan</h2>
                    </center>
                    <form action="<?= base_url('laporan/printrealisasi') ?>" method="get">
                        <div class="col-lg-7 mt-4" style="margin: 0 auto;">
                            <div class="row">
                                <div class="col-lg-5">
                                    <input type="date" name="awal" id="awal" class="form-control">
                                </div>

                                <div class="col-lg-2" style="text-align: center;">
                                    <label for="awal">S/D</label>
                                </div>

                                <div class="col-lg-5">
                                    <input type="date" name="akhir" id="akhir" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 mt-4" style="margin: 0 auto;">
                            <div class="row">
                                <label for="skpd">Nama SKPD</label>
                                <select type="text" name="skpd" id="skpd" class="form-control">
                                    <option value="">- Pilih -</option>
                                    <?php foreach ($skpd as $s) : ?>
                                        <option value="<?= $s['kodeskpd'] ?>"><?= kodeskpd($s['kodeskpd']) . ' - ' . $s['namaskpd'] ?></option>
                                    <?php endforeach; ?>
                                </select>

                                <button type="submit" style="width: 100%" class="btn btn-secondary mt-4">Cetak</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>