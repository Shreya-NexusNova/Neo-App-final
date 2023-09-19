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
      * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
      }
      .chartMenu {
        width: 100vw;
        height: 40px;
        background: #1A1A1A;
        color: rgba(54, 162, 235, 1);
      }
      .chartMenu p {
        padding: 10px;
        font-size: 20px;
      }
      .chartCard {
        width: 100vw;
        height: calc(100vh - 40px);
        background: rgba(54, 162, 235, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .chartBox {
        width: 75%;
        height: 80%;
        padding: 20px;
        border-radius: 20px;
        border: solid 3px rgba(54, 162, 235, 1);
        background: white;
      }
    </style>

<div class="chartMenu">
</div>
<div class="chartCard">
    <div class="chartBox">
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
const backgroundColor = 'rgb(30,81,123,0.6)'; // #34495E with 0.2 alpha
const borderColor = 'rgb(30,81,123,1)'; // #34495E with full alpha



const filteredData = data.map(locationData => locationData.data.map(value => value !== 0 ? value : null));

const datasets = issueTypes.map((issueType, index) => ({
    label: issueType.type_name,
    data: filteredData.map(locationData => locationData[index]),
    backgroundColor: backgroundColor,
    borderColor: borderColor,
    borderWidth: 1
}));

const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: datasets
    },
    options: {
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: true,
                position: 'top'
            },
            datalabels: {
            color: 'white'
        },
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
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
            xAxes: [{
                // Change here
            	barPercentage: 0.9
            }]
        }
    }
});



</script>
 @endsection('content')
