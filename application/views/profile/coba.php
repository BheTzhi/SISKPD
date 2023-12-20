<html>

<head>
    <title> <?= $title ?> </title>
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/jqvmap/jqvmap.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/summernote/summernote-bs4.min.css">
</head>

<body>

    <style type="text/css">
        @media print and (width: 8.5in) and (height: 11in) {
            @page {
                margin: 1in;
            }
        }

        body {
            font-family: arial;
            background-color: #ccc;
            font-family: 'Times New Roman', Times, serif;
        }

        .rangkasurat {
            width: 980px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
        }

        table {
            padding: 2px;
        }

        .tengah {
            text-align: center;
            line-height: 5px;
        }

        hr {
            height: 5px;
            background-color: black;
            box-shadow: 0 5px 5px -5px #8c8c8c inset;

        }
    </style>

    <div class="rangkasurat">
        <table width="100%" style="border-bottom: 5px solid #000; ">
            <tr>
                <td> <img src="<?= base_url('assets/images/logo.png') ?>" width="140px"> </td>
                <td class="tengah">
                    <h3>PEMERINTAH DAERAH KABUPATEN SITUBONDO</h3>
                    <h3>DINAS BADAN PUSAT STATISTIK DAERAH</h3>
                    <h2>KABUPATEN SITUBONDO</h2>
                    <b>Jalan Tarikolot Jatinunggal Telp . ( 0262 ) 428590 Sumedang 45376</b>
                </td>
            </tr>
        </table>
    </div>

    <!-- ISI SURAT -->
    <!-- <div class="left" style="text-align: end; margin-right:1cm; margin-top:20px;">
        <p class="card-text">Cetak : <small class=" text-muted"><?= date('d, F Y'); ?></small></p>
    </div> -->

    <div class="rangkasurat" style="margin-top:20px; font-size: 12sp;">
        <table width="100%">
            <tr>
                <div class="row">
                    <div class="col-md-2">

                        <div class="text-justify">
                            <h6>Nomor</h6>
                        </div>

                        <div class="text-justify">
                            <h6>Sifat</h6>
                        </div>

                        <div class="text-justify">
                            <h6>Lampiran</h6>
                        </div>

                        <div class="text-justify">
                            <h6>Hal</h6>
                        </div>
                    </div>
                    <!-- <div class="col-md-1">

                        <div class="text-justify">
                            <h6>:</h6>
                        </div>


                        <div class="text-justify">
                            <h6>:</h6>
                        </div>


                        <div class="text-justify">
                            <h6>:</h6>
                        </div>


                        <div class="text-justify">
                            <h6>:</h6>
                        </div>

                    </div> -->

                    <div class="col-md-4">
                        <div class="text-justify">
                            <h6>: &nbsp 026/021/XII/2023</h6>
                        </div>
                        <div class="text-justify">
                            <h6>: &nbsp Biasa</h6>
                        </div>
                        <div class="text-justify">
                            <h6>: &nbsp -</h6>
                        </div>
                        <div class="text-justify">
                            <h6>: &nbsp Pengajuan Kendaraan</h6>
                        </div>
                    </div>

                    <div class="col-md-5 text-justify">
                        <h6>Kepada Yth.</h6>
                        <h6>Kepala Dinas Perdagangan dan Perindusterian Kota Bekasi</h6>
                        <h6>di-</h6>
                        <h6 style="margin-left: 1cm;">Tempat</h6>
                    </div>
                </div>
            </tr>
        </table>
    </div>

    <div class="rangkasurat">
        <table width="100%">
            <tr>
                <td class="text-justify">
                    <!-- <h6 class="text-justify">Dengan Hormat,</br>
                        </br>
                        Berdasarkan :</br>
                        </br>
                        1. Penetapan Pemenang Lelang Nomor: 511.2/422.Disdagperin.Pasar tanggal 7 Februari 2018 tentang penetapan Pemenang Lelang Pengadaan Badan Usaha untuk pekerjaan revitalisasi Pasar Baru Jatiasih adalah PT. Mukti Sarana Abadi.</br>
                        </br>
                        </br>
                        2. Surat Perjanjian Kerja Sama (PKS) antara pemerintah Kota Bekasi dengan PT. Mukti Sarana Abadi Nomor 1151/2019 dan Nomor: 022/MSA-MOU/X/2019 tanggal 17 Oktober 2019 tentang Revitalisasi dan Pengelolaan Pasar Baru Jatiasih Kota Bekasi.</br>
                        </br>
                        </br>
                        3. Surat Sekertariat Daerah Pemerintah Kota Bekasi Nomor: 511.2/7962/BPKAD tentang Penyerahan Lahan Pasar Baru Jatiasih.</br>
                        </br>
                        </br>
                        Sehubung perihal tersebut diatas, kami memohon kepada Plt. Kepala Dinas Perdagangan dan Perindustrian Kota Bekasi adalah sebagai berikut :</br>
                        </br>
                        </br>
                        a) Balik Nama Hak Pakai Tempat Dasaran /HPTD Kios/Los atas nama PT. Mukti Sarana Abadi kepada atas nama masing-masing Pedagang Pasar Baru Jatiasih dengan Daftar ( ---Terlampir--- ).</br>
                        </br>
                        </br>
                        Demikian Surat Permohonan ini kami sampaikan, atas perhatiannya kami ucapkan Terima Kasih.
                    </h6> -->
                    <?= $surat['isi'] ?>
                </td>
            </tr>
        </table>
    </div>

    <div class="rangkasurat">
        <table width="100%">
            <tr>
                <td>
                    <div class="row">

                        <div class="col-md-7">
                            <div class="text-justify">

                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="text-justify">
                                <div class="left" style="text-align: start; margin-top:40px;">
                                    <h6><?= date('l, d F Y'); ?></h6>
                                </div>
                                <br>
                                <h5><b>Kepala Dinas Badan Pusat Statistik</b></h5>
                                <h5><b>Kabupaten Situbondo</b></h5>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <h5 style="border-bottom: 1px solid #000; text-align: start;"><b>Prof. Dr. KH. Afifudin Muhajir, M.Ag</b></h5>
                                <h5 style="text-align: start;"><b>NID : 05012443357898884</b></h5>
                            </div>
                        </div>
                    </div>
                </td>

            </tr>
        </table>
    </div>

    <footer class="sticky-footer">
        <div class="col-sm-6">
            <p style="margin-left: 2cm;">Tembusan : </p>
            <p style="margin-left: 4.3cm;">
                1. Dinas Pendidikan Kabupaten Situbondo <br>
                2. Dinas PM-PTSP Kabupaten Situbondo <br>
                3. Dinas PM-PTSP Kabupaten Situbondo <br>
                4. Dinas PM-PTSP Kabupaten Situbondo <br>
                5. Dinas PM-PTSP Kabupaten Situbondo <br>
            </p>
        </div>
        <script type="text/javascript">
            window.print();
        </script>

    </footer>
</body>

</html>