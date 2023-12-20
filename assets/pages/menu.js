$(document).ready(function () {

    $('.edit').on('click', function () {
        const id = $(this).data('id')

        $.getJSON('menu/getbyid/' + id, function (data) {
            $('#id2').val(data.id)
            $('#menu2').val(data.menu)
        })

    })

})