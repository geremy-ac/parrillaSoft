@extends("adminlte::page")

@section('content')

    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Medida</th>
                    <th>Cantidad</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($insumos as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->nombre}}</td>
                        <td>{{$value->medida}}</td>
                        <td>{{$value->cantidad}}</td>


                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>



@endsection
@section('css')

@stop
