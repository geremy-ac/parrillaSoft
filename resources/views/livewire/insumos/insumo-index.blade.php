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
                        <td id="resp{{ $insumo->id }}">
                        <br>
                        @if($insumo->estatus == 1)
                            <button type="button" class="btn btn-sm btn-success">Activa</button>
                        @else
                            <button type="button" class="btn btn-sm btn-danger">Inactiva</button>
                        @endif

                    </td>
                        <td>
                            <form action="{{route('insumoEliminar', $insumo->id)}}" method="post" class="formulario-eliminar">
                                @csrf @method('DELETE')

                                <button type="submit" class="btn btn-danger" style="border: none"><i class="fas fa-trash-alt fa-lg"></i></button>
                                <a href="{{route('insumoEditar', $insumo ->id)}}"><i class="fas fa-user-edit fa-lg" ></i></a>                             
                                <a href="{{route('FormularioEntrada', $insumo ->id)}}"><i class="fas fa-plus-square"></i></a>                            
                                <a class="btn btn-info" href="/insumos/Listar?id={{$insumo->id}}">Ver</a>
                                @endforeach

        <div class="card-footer">



            {{$insumos -> links()}}
        </div>

    </div>


</div>
