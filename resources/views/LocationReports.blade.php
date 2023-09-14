@extends('layouts.header')
@extends('layouts.sidebar')
@extends('layouts.footer')
@section('content')


<!-- <style type="text/css">

</style>

<body style="margin:0px;padding:0px;overflow:hidden">
    <iframe src="https://app.powerbi.com/reportEmbed?reportId=c41e88e1-d1c9-4764-aabc-f815e7fcf9b8&autoAuth=true&ctid=83f3c435-3424-4d68-80a3-5d82581b1cee&config=eyJjbHVzdGVyVXJsIjoiaHR0cHM6Ly93YWJpLXVrLXNvdXRoLWMtcHJpbWFyeS1yZWRpcmVjdC5hbmFseXNpcy53aW5kb3dzLm5ldC8ifQ%3D%3D" frameborder="0" style="overflow:hidden;height:100vh;width:100%;margin-top:70px" height="100%" width="100%"></iframe>
</body> -->

<!-- Show Graph Data -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"></script>

<style>
    .map_canvas {
        width: 100%;
        margin-top:60px;
        height: calc(100vh - 90px); /* Adjust as needed */
        background: rgba(54, 162, 235, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .chart-container {
        width: 100%;
        max-width: 1100px; /* Adjust the maximum width as needed */
        padding: 10px;
        border-radius: 20px;
        border: solid 3px rgba(54, 162, 235, 1);
        background: white;
    }
</style>


<div class="map_canvas">
    <div class="chart-container">
    <canvas id="myChart"></canvas>
    </div>
</div>

<script>
 Chart.register(ChartDataLabels);
const ctx = document.getElementById('myChart').getContext('2d');
const locations = <?php echo json_encode($locations); ?>;
const issueTypes = <?php echo json_encode($issueTypes); ?>;
const data = <?php echo json_encode($data); ?>;

const labels = locations.map(location => location.location_name);
const colors = [
    'rgba(54, 162, 235, 0.6)',
    'rgba(137, 235, 137, 0.5)',
    'rgba(235, 162, 137, 0.6)',
    'rgba(235, 137, 235, 0.5)',
    'rgba(137, 235, 235, 0.6)',
    'rgba(137, 137, 235, 0.6)'
];

const borders = [
    'rgba(54, 162, 235, 1.5)',
    'rgba(137, 235, 137, 1.5)',
    'rgba(235, 162, 137, 1.5)',
    'rgba(235, 137, 235, 1.5)',
    'rgba(137, 235, 235, 1.5)',
    'rgba(137, 137, 235, 1.5)'
]


const filteredData = data.map(locationData => locationData.data.map(value => value !== 0 ? value : null));

const datasets = issueTypes.map((issueType, index) => ({
    label: issueType.type_name,
    data: filteredData.map(locationData => locationData[index]),
    backgroundColor: colors[index],
    borderColor: borders[index],
    borderWidth: 1
}));

const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: datasets
    },
    options: {
        scales: {
            x: {
                barPercentage: 1.2, // Adjust this value to make bars wider or narrower
                categoryPercentage: 1.2, // Adjust this value to make bars wider or narrower
                stacked: false,
                grid: {
                    display: false
                }
            },
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value, index, values) {
                        return issueTypes[index].type_name;
                    }
                }
            }
        },
        plugins: {
            legend: {
                display: true,
                position: 'top'
            }
        },
        layout: {
            padding: {
                left: 20,
                right: 20,
                top: 20,
                bottom: 20
            }
        },
        scales: {
            x: {
                barPercentage: 0.8,
                categoryPercentage: 0.9,
                stacked: false,
                grid: {
                    display: false
                }
            },
            y: {
                beginAtZero: true
            }
        }
    }
});



</script>
 @endsection('content')
