<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      body {
	background: #fafafa url(https://jackrugile.com/images/misc/noise-diagonal.png);
	color: #444;
	font: 100%/30px 'Helvetica Neue', helvetica, arial, sans-serif;
	text-shadow: 0 1px 0 #fff;
}

strong {
	font-weight: bold; 
}

em {
	font-style: italic; 
}

table {
	background: #f5f5f5;
	border-collapse: separate;
	box-shadow: inset 0 1px 0 #fff;
	font-size: 12px;
	line-height: 24px;
	margin: 30px auto;
	text-align: left;
	width: 800px;
}	

td {
	border-right: 1px solid #fff;
	border-left: 1px solid #e8e8e8;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #e8e8e8;
	padding: 10px 15px;
	position: relative;
	transition: all 300ms;
}

td:first-child {
	box-shadow: inset 1px 0 0 #fff;
}	

td:last-child {
	border-right: 1px solid #e8e8e8;
	box-shadow: inset -1px 0 0 #fff;
}	

tr {
	background: url(https://jackrugile.com/images/misc/noise-diagonal.png);	
}

tr:nth-child(odd) td {
	background: #f1f1f1 url(https://jackrugile.com/images/misc/noise-diagonal.png);	
}

tr:last-of-type td {
	box-shadow: inset 0 -1px 0 #fff; 
}

tr:last-of-type td:first-child {
	box-shadow: inset 1px -1px 0 #fff;
}	

tr:last-of-type td:last-child {
	box-shadow: inset -1px -1px 0 #fff;
}	

tbody:hover td {
	color: transparent;
	text-shadow: 0 0 3px #aaa;
}

tbody:hover tr:hover td {
	color: #444;
	text-shadow: 0 1px 0 #fff;
}
    </style>
    <title>pdf</title>
</head>
<body>
        <a href="{{route('descargarPDFInsumos')}}">Descargar PDF</a>
        <table>
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
  </tbody>
</table>
</body>
</html>
<div>
