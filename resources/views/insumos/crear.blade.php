@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
    <h1>Insumos crear</h1>
@stop

@section('content')
    <div class="container">

        <form action="{{route('CrearInsumo')}}" method="post">


            @method("POST")
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary ">Guardar</button>
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
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre" value="{{old('nombre')}}">
                <small class="text-danger">{{$errors->first('nombre')}}</small>
            </div>
            <div class="form-group">
                <label for="medida">Medida</label>
                <input type="text" class="form-control" name="medida" id="medida" placeholder="Ingrese la medida del insumo" value="{{old('medida')}}">
                <small class="text-danger">{{$errors->first('medida')}}</small>
            </div>
            <div class="form-group">
                <label for="stock_minimo">Stock_minimo</label>
                <input type="text" class="form-control" name="stock_minimo" id="stock_minimo" rows="2" value="{{old('stock_minimo')}}">
                <small class="text-danger">{{$errors->first('stock_minimo')}}</small>
            </div>

            <div class="form-group">
                <label for="estatus">Marque (1 si esta activo) (0 si esta desactivo)</label>
                <select class="form-control" id="estatus" name="estatus">
                    <option>0</option>
                    <option>1</option>
                </select>
            </div>


            </div>
        </form>

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
