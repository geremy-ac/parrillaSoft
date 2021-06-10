@extends("adminlte::page")

@section('content')



    <div id="chart-container">
    </div>

@endsection
@section("js")
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script>
        var datas = <?php echo json_encode ($datas)?>;
        Highcharts.chart('chart-container',{
            tittle: {
                text: 'Incremento de ventas, 2021'

            },
            subtitle:{
                text:'Fuente:  Ventas'
            },
            xAxis:{
                categories:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
            },
            xAxis:{
                title:{
                    text:'Numero de nuevas ventas'

                }
            },
            legend:{
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            ploOptions:{
                series:{
                    alowwPointSelect: true

                }
            },
            series:[{
                name:'Ventas',
                data: datas
            }],
            responsive:{
                rules:{
                    condition:{
                        maxWidth:500
                    },
                    charOptions:{
                        legend:{
                            layout: 'horizontal',
                            align:'center',
                            verticalAlign:'bottom'
                        }
                    }
                }
            }

        })

    </script>
@endsection

