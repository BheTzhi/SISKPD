$(document).ready(function () {

    $('.add').on('click', function () {


        $.getJSON('rka/getkode', function (data) {

            if (data.status == 0) {
                $('#rka').val('1'.toString().padStart(3, '0'))
            } else {
                const value = parseInt(data.res.koderka) + 1
                const kode = value.toString().padStart(3, '0')
                $('#rka').val(kode)
            }
        })

        $('#trka').on('keyup', function () {
            var n = parseInt($(this).val().replace(/\D/g, ''), 10)
            $(this).val(n.toLocaleString())
        })
    })


})