$(document).ready(function () {

    $.getJSON('dashboard/getallrkabyskpd', function (data) {
        var rka = data.rka
        var realisasi = data.realisasi

        var donutData = {
            labels: [
                'Realisasi',
                'Jumlah RKA'
            ],
            datasets: [{
                data: [realisasi, rka],
                backgroundColor: ['#f56954', '#3c8dbc'],
            }]
        }
        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData = donutData;
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })
    })
})