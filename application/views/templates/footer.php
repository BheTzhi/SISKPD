<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-<?= date('Y') ?> <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/') ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/') ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/') ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/') ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url('assets/') ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/') ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/') ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/') ?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?= base_url('assets/') ?>dist/js/pages/dashboard.js"></script> -->

<?php if ($title == 'Dashboard') : ?>
    <script src="<?= base_url('assets/') ?>plugins/chart.js/Chart.min.js"></script>
    <script src="<?= base_url('assets/') ?>pages/pie.js"></script>
<?php elseif ($title == 'Menu') : ?>
    <script src="<?= base_url('assets/') ?>pages/menu.js"></script>
<?php elseif ($title == 'Sub Menu') : ?>
    <script src="<?= base_url('assets/') ?>pages/submenu.js"></script>
<?php elseif ($title == 'Access') : ?>
    <script src="<?= base_url('assets/') ?>pages/access.js"></script>
<?php elseif ($title == 'Role Access') : ?>
    <script src="<?= base_url('assets/') ?>pages/access.js"></script>
<?php elseif ($title == 'User') : ?>
    <script src="<?= base_url('assets/') ?>pages/user.js"></script>
<?php elseif ($title == 'Data SKPD') : ?>
    <script src="<?= base_url('assets/') ?>pages/skpd.js"></script>
<?php elseif ($title == 'Data Program') : ?>
    <script src="<?= base_url('assets/') ?>pages/program.js"></script>
<?php elseif ($title == 'Data Kegiatan') : ?>
    <script src="<?= base_url('assets/') ?>pages/kegiatan.js"></script>
<?php elseif ($title == 'Data Uraian') : ?>
    <script src="<?= base_url('assets/') ?>pages/uraian.js"></script>
<?php elseif ($title == 'Data RKA') : ?>
    <script src="<?= base_url('assets/') ?>pages/rka.js"></script>
    <script src="<?= base_url('assets/') ?>pages/drka.js"></script>
<?php elseif ($title == 'Data Realisasi') : ?>
    <script src="<?= base_url('assets/') ?>pages/realisasi.js"></script>
<?php elseif ($title = 'Edit Profile') : ?>
    <script>
        $('a.sel select').val($('#ijk').val())
    </script>
<?php else : ?>
<?php endif; ?>

<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    $(function() {
        $("#example2").DataTable().buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    $(function() {
        // Summernote
        $('#summernote').summernote()
    });

    // role
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('access/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('access/roleaccess/') ?>" + roleId;
            }
        })
    });

    //Money Euro
    $('[data-mask]').inputmask()
</script>
</body>

</html>