@extends("adminlte::page")

@section('content')

    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>estado</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($producto as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->Nombre}}</td>
                        <td>{{$value->descripcion}}</td>
                        <td>{{$value->precio}}</td>
                        <td id="resp{{ $value->status }}">
                            <br>
                            @if($value->status == 1)
                                <a  class="btn btn-sm btn-success" href="/producto/cambiarestado/{{$value->id}}/0">Activo</a>
                            @else
                                <a  class="btn btn-sm btn-danger" href="/producto/cambiarestado/{{$value->id}}/1">InActivo</a>
                            @endif

                        </td>
                        <td>
                            <a class="btn btn-info" href="/producto/Listar?id={{$value->id}}">Ver insumos</a>

                        </td>

                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if(count($insumos) > 0)
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                    <tr>
                        <th colspan="4" class="text-center">Insumos</th>
                        </tr>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            </tr>
                    </thead>
                    <tbody>
                    @foreach($insumos as $value)
                        <tr>
                            <td>{{$value->nombre}}</td>
                            <td>{{$value->cantidad}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif


@endsection
@section('css')

@stop
