$(document).ready(function () {

    $('.edit').on('click', function () {
        const id = $(this).data('id')

        $.getJSON('access/getbyid/' + id, function (data) {
            $('#id2').val(data.id)
            $('#role2').val(data.role)
        })

    })

})