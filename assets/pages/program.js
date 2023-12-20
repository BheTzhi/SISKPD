$(document).ready(function () {

    $('.add').on('click', function () {

        $.getJSON('program/getkode', function (data) {
            if (data.status == 0) {
                $('#kode').val('1'.toString().padStart(2, '0'))
            } else {
                const value = parseInt(data.result.kodeprogram) + 1
                const kode = value.toString().padStart(2, '0')
                $('#kode').val(kode)
            }
        })

    })

    $('.edit').on('click', function () {
        const id = $(this).data('id')

        $.ajax({
            url: 'program/getjson',
            type: 'post',
            dataType: 'json',
            data: { id: id },
            success: function (data) {
                $('#ukode').val(data.result.kodeprogram)
                $('#unama').val(data.result.namaprogram)
            }
        })
    })

})