@extends('adminlte::page')

@section('title', 'Index')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <form action="{{route('entradaActualizar', $entrada)}}" method="post">

        @method("PUT")
        @csrf
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif

        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Ingrese la cantidad" value="{{old('cantidad', $entrada->cantidad)}}">
            <small class="text-danger">{{$errors->first('cantidad')}}</small>
        </div>
        <div class="form-group">
            <label for="lote">Lote</label>
            <input type="text" class="form-control" name="lote" id="lote" placeholder="Ingrese el lote" value="{{old('lote', $entrada->lote)}}">
            <small class="text-danger">{{$errors->first('lote')}}</small>
        </div>
        <div class="form-group">
            <label for="caducidad">Caducidad</label>
            <input type="text" class="form-control" name="caducidad" id="caducidad" placeholder="Ingrese la caducidad" value="{{old('caducidad', $entrada ->caducidad )}}">
            <small class="text-danger">{{$errors->first('caducidad')}}</small>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <div class="form-group">
            <label for="idInsumo">Insumo</label>
            <select class="form-control" name="idInsumo" id="idInsumo">
                @forelse($insumos as $insumo)
                    <option value="{{$insumo->id}}">{{$insumo->nombre}}</option>
                @empty
            </select>

            <option>No existen</option>
            @endforelse

        </div>

    </form>
    <div>


    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
