<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>pdf</title>
</head>
<body>
    
<div class="card">
       
        <a href="{{route('descargarPDFInsumos')}}">Descargar PDF</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Medida</th>
                    <th>Stock_Minimo</th>
                    <th>cantidad</th>
                    <th>estado</th>                   
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($insumos as $insumo)

                    <tr>
                        <td>{{$insumo->id}}</td>
                        <td>{{$insumo->nombre}}</td>
                        <td>{{$insumo->medida}}</td>
                        <td>{{$insumo->stock_minimo}}</td>
                        <td>{{$insumo->cantidad}}</td>
                        <td id="resp{{ $insumo->id }}">
                        <br>
                        @if($insumo->estatus == 1)
                            <button type="button" class="btn btn-sm btn-success">Activa</button>
                        @else
                            <button type="button" class="btn btn-sm btn-danger">Inactiva</button>
                        @endif

                    </td>
                      
                       
                                @endforeach
        <div class="card-footer">



          
        </div>

    </div>


</div>

</body>
</html>
<div>
