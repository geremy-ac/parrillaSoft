@extends('adminlte::page')

@section('title', 'Index')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <form action="{{route('CrearEntrada')}}" method="post">
        <input type="hidden" name="idInsumo" value="{{$insumo->id}}">
        @method("POST")
        @csrf
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Ingrese la cantidad" value="{{old('cantidad')}}">
            <small class="text-danger">{{$errors->first('cantidad')}}</small>
        </div>
        <div class="form-group">
            <label for="lote">Lote</label>
            <input type="text" class="form-control" name="nombre_entrada" id="lote" placeholder="Ingrese el nombre" value="{{old('nombre_entrada')}}">
            <small class="text-danger">{{$errors->first('nombre_entrada')}}</small>
        </div>
        <div class="form-group">
            <label for="caducidad">Caducidad</label>
            <input type="date" class="form-control" name="caducidad" id="caducidad" placeholder="Ingrese la caducidad" value="{{old('caducidad')}}">
            <small class="text-danger">{{$errors->first('caducidad')}}</small>
        </div>

        <div>
          
            <button type="submit" class="btn btn-danger">Guardar</button>
        </div>
    </form>
    <div>
    <table class="table ">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Cantidad</th>
            <th scope="col">nombre_entrada</th>
            <th scope="col">Caducidad</th>
        </tr>
        </thead>
            <tbody>
            @foreach($entradas as $entrada)
            <tr>
                <td>{{$entrada->id}}</td>
                <td>{{$entrada->cantidad}}</td>
                <td>{{$entrada->nombre_entrada}}</td>
                <td>{{$entrada->caducidad}}</td>              
            </tr>
            @endforeach
            </tbody>

    </table>


    </div>
    <h5>total cantidad: <span> {{$total}}</span></h5>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>

    $('.formulario-eliminar').submit(function(e){
      e.preventDefault();
      Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
   /* Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )*/
    this.submit();
  }
})
    })


   </script>
@stop
