<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="<?= base_url('assets/images/logo.png') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">

    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #ccc;
        }

        .rangkasurat {
            width: 980px;
            margin: 0 auto;
            background-color: #fff;
            height: 180;
            padding: 20px;
        }

        .tengah {
            text-align: center;
            line-height: 5px;
        }
    </style>
</head>

<body>

    <div class="rangkasurat">
        <table width="100%" style="border-bottom: 5px solid #000; padding: 2px;">
            <tr>
                <td><img src="<?= base_url('assets/images/logo.png') ?>" width="120px"></td>
                <td class="tengah">
                    <h2>PEMERINTAH DAERAH KABUPATEN BANYUWANGI</h2>
                    <h4>DINAS BADAN PERENCANAAN PEMBANGUNAN DAERAH</h4>
                    <p>Jl. Agung Suprapto No.140, Mojopanggung, Giri, Kabupaten Banyuwangi, Jawa Timur 68425, Indonesia</p>
                </td>
            </tr>
        </table>
        <div class="card mt-4">
            <div class="card-title">
                <center>
                    <h4>Laporan Rencana Kerja Anggaran</h4>
                </center>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <table>
                            <tr>
                                <th>Nama</th>
                                <th>:</th>
                                <th><?= $skpd['namaskpd'] ?></th>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <th>:</th>
                                <th><?= $skpd['alamatskpd'] ?></th>
                            </tr>
                            <tr>
                                <th>No Telp</th>
                                <th>:</th>
                                <th><?= notelp($skpd['notelp']) ?></th>
                            </tr>
                            <tr>
                                <th>Anggaran</th>
                                <th>:</th>
                                <th><?= number_format($skpd['totalrka']) ?></th>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table>
                            <tr>
                                <td>Nama Pengguna Anggaran</td>
                                <td>:</td>
                                <td><?= $skpd['nama'] ?></td>
                            </tr>
                            <tr>
                                <td>Nip Pengguna Anggaran</td>
                                <td>:</td>
                                <td><?= kodenip($skpd['nip']) ?></td>
                            </tr>
                            <tr>
                                <td>Bendahara</td>
                                <td>:</td>
                                <td><?= $skpd['bendahara'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="abc">
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
                            <th colspan="2" style="text-align: end;">Total</th>
                            <th><?= number_format($jumlah['jml']) ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('assets/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('assets/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/') ?>dist/js/adminlte.js"></script>
    <script>
        $(function() {
            $("#example2").DataTable();
        });
    </script>

    <script type="text/javascript">
        setTimeout(function() {
            window.print();
        }, 500)
        window.onfocus = function() {
            setTimeout(function() {
                window.close
            }, 500)
        }
    </script>

</body>

</html>
<?php header("refresh:5;url='" . base_url('laporan') . "'"); ?>