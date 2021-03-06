<div>

    <div class="card">
        <div class="card-header">
            <input wire:model="search" ire:model="search" class="form-control" placeholder="ingrese nombre del insumo">
        </div>
  
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
                        <td id="resp{{ $insumo->estatus }}">
                        <br>
                        @can('CestadoI')
                        @if($insumo->estatus == 1)
                        <a  class="btn btn-sm btn-success" href="/insumos/cambiarestado/{{$insumo->id}}/0">Activo</a>
                        @else
                        <a  class="btn btn-sm btn-danger" href="/insumos/cambiarestado/{{$insumo->id}}/1">inActivo</a>
                        @endif
                        @endcan

                    </td>
                    <td>
                    @can('showInsumo')
                        <a class="btn btn-info" href="{{route('showInsumo')}}"">Ver insumos</a>
                        @endcan 

                    </td>
                        <td>
                        @can('insumoEliminar')
                            <form action="{{route('insumoEliminar', $insumo->id)}}" method="post" class="formulario-eliminar">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="border: none"><i class="fas fa-trash-alt fa-lg"></i></button>   
                                @endcan   
                                @can('FormularioEntrada')             
                                <a class="btn btn-primary"  href="{{route('FormularioEntrada', $insumo ->id)}}"><i class="fas fa-plus-square"></i></a>  
                                @endcan  
                                @can('FormularioEntrada')                          
                                <a class="btn btn-info" href="/insumos/Listar?id={{$insumo->id}}">Ver</a>
                                @endcan
                                @endforeach

        <div class="card-footer">



            {{$insumos -> links()}}
        </div>

    </div>


</div>
