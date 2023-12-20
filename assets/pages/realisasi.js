$(document).ready(function () {


    $('.add').on('click', function () {

        $.getJSON('realisasi/getkode', function (data) {

            if (data.status == 0) {
                $('#kode').val('1'.toString().padStart(3, '0'))
            } else {
                const value = parseInt(data.result.id_realisasi) + 1
                const kode = value.toString().padStart(3, '0')
                $('#kode').val(kode)
            }
        })

        $('#tgl, #kodeskpd').on('change', function () {
            var tgl = $('#tgl').val()
            var skpd = $('#kodeskpd').val()

            const url = 'realisasi/getrka';

            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                data: {
                    tgl: tgl,
                    kodeskpd: skpd
                },
                success: function (data) {
                    $('#rka').html(data.html)
                }
            })

        })

    })

    $('.edit').on('click', function () {

        const url = 'realisasi/getjson'

        const id = $(this).data('id')

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: { id: id },
            success: function (data) {
                $('#ukode').val(data.result.id_realisasi)
                $('#utgl').val(data.result.tglrealisasi)
                $('div.sel select').val(data.result.kodeskpd)
                $('#ujml').val(data.result.jumlahrealisasi)
                $('#uketerangan').val(data.result.keterangan)
                $('#lama').val(data.result.koderka)

                var tgl = $('#utgl').val()
                var skpd = $('#ukodeskpd').val()
                var rka = $('#lama').val()

                const url = 'realisasi/getrka';

                $.ajax({
                    url: url,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        tgl: tgl,
                        kodeskpd: skpd,
                        rka: rka
                    },
                    success: function (data) {
                        $('#urka').html(data.html)
                        $('div.sel2 select').val(rka)
                    }
                })

                $('#utgl, #ukodeskpd').on('change', function () {
                    var tgl = $('#utgl').val()
                    var skpd = $('#ukodeskpd').val()

                    const url = 'realisasi/getrka';

                    $.ajax({
                        url: url,
                        type: 'post',
                        dataType: 'json',
                        data: {
                            tgl: tgl,
                            kodeskpd: skpd
                        },
                        success: function (data) {
                            $('#urka').html(data.html)
                        }
                    })

                })


            }
        })


    })
    $('#jml, #ujml').on('keyup', function () {
        var n = parseInt($(this).val().replace(/\D/g, ''), 10)
        $(this).val(n.toLocaleString())
    })

})