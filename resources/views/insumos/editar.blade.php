@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>insumo</h1>
    <title>insumo editar</title>
@stop

@section('content')
    <div class="container">
        <form action="{{route('insumoActualizar', $insumo)}}" method="post">


            @method("PUT")
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <button type="submit" class="btn btn-danger ">Guardar</button>
                </div>
            </div>
            @csrf
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            @endif
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre" value="{{old('nombre', $insumo->nombre)}}">
                <small class="text-danger">{{$errors->first('nombre')}}</small>
            </div>
            <div class="form-group">
                <label for="medida">Medida</label>
                <input type="text" class="form-control" name="medida" id="medida" placeholder="Ingrese la medida del insumo" value="{{old('medida', $insumo->medida)}}">
                <small class="text-danger">{{$errors->first('medida')}}</small>
            </div>
            <div class="form-group">
                <label for="stock_minimo">Stock_minimo</label>
                <input type="text" class="form-control" name="stock_minimo" id="stock_minimo" rows="2" value="{{old('stock_minimo',$insumo->stock_minimo)}}">
                <small class="text-danger">{{$errors->first('stock_minimo')}}</small>
            </div>

            <div class="form-group">
                <label for="estado">estado</label>
                <input type="text" class="form-control" name="estado" id="estado" placeholder="Ingrese el estado" value="{{old('estado',$insumo->estado)}}">
                <small class="text-danger">{{$errors->first('estado')}}</small>
            </div>


        </form>

    </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
