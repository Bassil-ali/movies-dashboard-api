<div id="movies-chart"></div>

<script>
    $(function () {
        var options = {
            chart: {
                type: 'bar',
                height: 350,
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                    borderRadius: 20,
                }

            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                colors: ['#009688']
            },
            series: [{
                name: "@lang('movies.total_movies')",
                data: @json($movies->pluck('total_movies')->toArray())
            }],
            xaxis: {
                categories: @json($movies->pluck('month')->toArray())
            }
        }

        var moviesChart = new ApexCharts(document.querySelector("#movies-chart"), options);

        moviesChart.render();
    });//end of document ready
</script>