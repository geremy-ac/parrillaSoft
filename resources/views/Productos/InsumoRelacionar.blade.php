@extends('adminlte::page')

@section('title', 'Enlazar')

@section('content_header')
    <h1>Productos relacionar</h1>
@stop

@section('content')
    <table class="table">
        <h5>Insumos disponibles</h5>
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Medida</th>
            <th scope="col">Stock Mínimo</th>
            <th scope="col">Estado</th>


            <th scope="col"> Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($producto->insumos as $productos)
            <tr>
            <td>{{$productos->id}}</td>
            <td>{{$productos->nombre}}</td>
            <td>{{$productos->medida}}</td>
            <td>{{$productos->stock_minimo}}</td>

            <br>
            <td id="resp{{ $productos->id }}">
                @if($productos->estatus == 1)
                    <button type="button" class="btn btn-sm btn-success">Activa</button>
                @else
                    <button type="button" class="btn btn-sm btn-danger">Inactiva</button>
                @endif

            </td>
            <td>

                <form action="{{route('UnirInsumo', $productos->id)}}" method="post" class="unir">
                    @csrf @method('POST')

                    <button type="submit" class="btn btn-danger" style="border: none"><i class="fas fa-plus fa-lg"></i></button>
                </form>
            </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <!--
    <table class="table">
        <h5>Insumos  relacionados</h5>
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Medida</th>
            <th scope="col">Stock Mínimo</th>
            <th scope="col">Estado</th>


            <th scope="col"> Añadir el insumo</th>
        </tr>
        </thead>
       <tbody>
        @foreach($insumo as $insumos)
            <tr>
            <td>{{$insumos->id}}</td>
            <td>{{$insumos->nombre}}</td>
            <td>{{$insumos->medida}}</td>
            <td>{{$insumos->stock_minimo}}</td>

            <br>
            <td id="resp{{ $insumos->id }}">
                @if($insumos->estatus == 1)
                    <button type="button" class="btn btn-sm btn-success">Activa</button>
                @else
                    <button type="button" class="btn btn-sm btn-danger">Inactiva</button>
                @endif

            </td>
            <td> <button type="submit" class="btn btn-danger" style="border: none"><i class="fas fa-trash-alt fa-lg"></i></button></td>


        @endforeach
            </tr>
        </tbody>
    </table>
    -->
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
