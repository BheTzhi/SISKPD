$(document).ready(function () {
    $('.add').on('click', function () {

        $.getJSON('uraian/getkode', function (data) {
            console.log(data)
            if (data.status == 0) {
                $('#kode').val('1'.toString().padStart(3, '1'))
            } else {
                const value = parseInt(data.result.kodeuraian) + 1
                const kode = value.toString().padStart(3, '1')
                $('#kode').val(kode)
            }
        })

    })

    $('.edit').on('click', function () {
        const id = $(this).data('id')

        $.ajax({
            url: 'uraian/getjson',
            type: 'post',
            dataType: 'json',
            data: { id: id },
            success: function (data) {
                $('#ukode').val(data.result.kodeuraian)
                $('#unama').val(data.result.namauraian)
            }
        })
    })

})