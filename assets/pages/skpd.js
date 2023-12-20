$(document).ready(function () {

    $('.add').on('click', function () {

        $.getJSON('skpd/getkode', function (data) {
            console.log(data)

            const kode = data.result.kode

            $('#kode').val(kode)

        })

    })

    $('.edit').on('click', function () {
        const id = $(this).data('id')
        const url = 'skpd/getjson'

        $.ajax({
            type: 'post',
            dataType: 'json',
            url: url,
            data: { 'id': id },
            success: function (data) {
                $('#uid').val(data.kodeskpd)
                $('#unama').val(data.namaskpd)
                $('#ualamat').val(data.alamatskpd)
                $('#unotelp').val(data.notelp)
                $('#upengguna').val(data.namapenggunaananggaran)
                $('#unippengguna').val(data.nippenggunaananggaran)
                $('#ubendahara').val(data.namabendahara)
                $('#unipbendahara').val(data.nipbendahara)
            }
        })

    })

})