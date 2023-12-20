$(document).ready(function () {

    $('#kegiatan').on('change', function () {
        $('.zzz').css('display', 'block');
    })

    $('#kegiatan').on('change', function () {
        const id = $(this).val()
        const urls = 'rka/getjson'

        $.ajax({
            url: urls,
            type: 'post',
            dataType: 'json',
            data: { id: id },
            success: function (data) {
                $('div.sel select').val(data)
            }
        })

    })

    $('#jumlah').on('keyup', function () {
        var n = parseInt($(this).val().replace(/\D/g, ''), 10)
        $(this).val(n.toLocaleString())
    })



})