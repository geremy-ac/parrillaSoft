@extends("adminlte::page")

@section('content')
    <div class="row">
        <div class="col">
            <h3 class="text-center">Ventas  </h3>

        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Total</th>
                    <th>Detalle</th>

                </tr>
                </thead>
                <tbody>
                @foreach($ventas as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->total }}</td>

                        <td>
                            <a class="btn btn-info" href="/ventas/Listar?id={{ $value->id }}">Ver Detalle</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if(count($productos) > 0)
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                    <tr>
                        <th colspan="4" class="text-center">Detalle de la venta</th>
                        </tr>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                            </tr>
                    </thead>
                    <tbody>
                    @foreach($productos as $detalle)
                        <tr>
                            <td>{{$detalle->Nombre}}</td>
                            <td>{{$detalle->cantidad}}</td>
                            <td>{{$detalle->precio}}</td>
                            <td>{{$detalle->precio * $detalle->cantidad}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
   @endsection
