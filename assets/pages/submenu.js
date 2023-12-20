$(document).ready(function () {
    $('.edit').on('click', function () {
        $('#editModalLabel').html('Edit Data');
        $('.modal-footer button[type=submit]').html('Simpan');

        const id = $(this).data('id')


        $.getJSON('submenu/getbyid/' + id, function (data) {
            $('div.sel select').val(data.menu_id)
            $('#utitle').val(data.title)
            $('#uurl').val(data.url)
            $('#uicon').val(data.icon)
            $('#uid').val(data.id)
        })

    })

    // reset modal
    $('.modal').on('hidden.bs.modal', function () {
        $('#editModal form')[0].reset()
    })

})