@extends("adminlte::page")

@section('content')



    <div class="row col-5">
                <canvas id="myChart" width="400" height="400"></canvas>
    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js"></script>
                <script>
                    var productos=[];
                    var valores=[];
                var ctx = document.getElementById('myChart');
                var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                labels: productos,
                datasets:[
                { label:'Ventas al año',
                    data:valores,
                    backgroundColor: ['#F54E2A', '#36110A', '#A62007'],
                borderColor: ['#FF2800'],
                borderWidth: 3}]
                },
                options: {
                scales: {
                y: {
                beginAtZero: true
                }
                }
                }
                });
                </script>

@endsection

