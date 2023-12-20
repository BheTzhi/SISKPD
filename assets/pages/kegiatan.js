$(document).ready(function () {
    $('.add').on('click', function () {

        $.getJSON('kegiatan/getkode', function (data) {

            if (data.status == 0) {
                $('#kode').val('1'.toString().padStart(4, '0'))
            } else {
                const value = parseInt(data.result.id_kegiatan) + 1
                const kode = value.toString().padStart(4, '0')
                $('#kode').val(kode)
            }
        })

    })

    $('.edit').on('click', function () {

        const id = $(this).data('id')

        const url = 'kegiatan/getjson'

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: { id: id },
            success: function (data) {
                $('#ukode').val(data.result.id_kegiatan)
                $('#ukegiatan').val(data.result.namakegiatan)
                $('div.sel select').val(data.result.kodeprogram)
            }
        })
    })
})