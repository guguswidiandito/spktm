@extends('layouts.backend')
@section('content')
<div class="span12">
    <div class="widget widget-nopad">
        <div class="widget-header text-center">
            <h3></h3>
        </div>
        <div class="widget-content">
            <div class="widget big-stats-container">
                <div class="widget-content">
                    <div class="container-fluid">
                        <table>
                            <tr>
                                <td>
                                    <h3 class="text-center">IPK Semester 1</h3>
                                    <canvas id="chartipk1" class="chart-holder" height="250" width="538"> </canvas>
                                </td>
                                <td>
                                    <h3 class="text-center">IPK Semester 2</h3>
                                    <canvas id="chartipk2" class="chart-holder" height="250" width="538"> </canvas>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3 class="text-center">IPK Semester 3</h3>
                                    <canvas id="chartipk3" class="chart-holder" height="250" width="538"> </canvas>
                                </td>
                                <td>
                                    <h3 class="text-center">IPK Semester 4</h3>
                                    <canvas id="chartipk4" class="chart-holder" height="250" width="538"> </canvas>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/chart.min.js')}}" type="text/javascript"></script>
<script>
var lineChartData = {
labels: {!! json_encode($jml1) !!},
datasets: [
{
fillColor: "rgba(220,220,220,0.5)",
strokeColor: "rgba(220,220,220,1)",
pointColor: "rgba(220,220,220,1)",
pointStrokeColor: "#fff",
data: {!! json_encode($com) !!}
}
]
}
var myLine = new Chart(document.getElementById("chartipk1").getContext("2d")).Bar(lineChartData);
</script>
<script>
var lineChartData = {
labels: {!! json_encode($jml2) !!},
datasets: [
{
fillColor: "rgba(220,220,220,0.5)",
strokeColor: "rgba(220,220,220,1)",
pointColor: "rgba(220,220,220,1)",
pointStrokeColor: "#fff",
data: {!! json_encode($com2) !!}
}
]
}
var myLine = new Chart(document.getElementById("chartipk2").getContext("2d")).Bar(lineChartData);
</script>
<script>
var lineChartData = {
labels: {!! json_encode($jml3) !!},
datasets: [
{
fillColor: "rgba(220,220,220,0.5)",
strokeColor: "rgba(220,220,220,1)",
pointColor: "rgba(220,220,220,1)",
pointStrokeColor: "#fff",
data: {!! json_encode($com3) !!}
}
]
}
var myLine = new Chart(document.getElementById("chartipk3").getContext("2d")).Bar(lineChartData);
</script>
<script>
var lineChartData = {
labels: {!! json_encode($jml4) !!},
datasets: [
{
fillColor: "rgba(220,220,220,0.5)",
strokeColor: "rgba(220,220,220,1)",
pointColor: "rgba(220,220,220,1)",
pointStrokeColor: "#fff",
data: {!! json_encode($com4) !!}
}
]
}
var myLine = new Chart(document.getElementById("chartipk4").getContext("2d")).Bar(lineChartData);
</script>
@endsection