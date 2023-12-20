$(document).ready(function () {

    $('.edit').on('click', function () {
        $('#editModalLabel').html('Edit Data');
        $('.modal-footer button[type=submit]').html('Simpan');

        const id = $(this).data('id')

        $.getJSON('user/getbyid/' + id, function (data) {
            $('div.rmn select').val(data.role_id)
            $('div.aaa select').val(data.jk)
            $('div.sel select').val(data.kodeskpd)
            $('#uid').val(data.id_pengguna)
            $('#unama').val(data.namapengguna)
            $('#ualamat').val(data.alamat)
            $('#unotelp').val(data.notelp)
            $('#utempatlahir').val(data.tempatlahir)
            $('#utgllahir').val(data.tgllahir)
            $('#uusername').val(data.username)
            $('#ufoto2').val(data.foto)
            $('#ugmb').attr('src', 'assets/images/users/' + data.foto);
        })

    })

    // reset modal
    $('.modal').on('hidden.bs.modal', function () {
        $('#editModal form')[0].reset()
    })

})