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
            <input type="text" class="form-control" name="lote" id="lote" placeholder="Ingrese el lote" value="{{old('lote')}}">
            <small class="text-danger">{{$errors->first('lote')}}</small>
        </div>
        <div class="form-group">
            <label for="caducidad">Caducidad</label>
            <input type="text" class="form-control" name="caducidad" id="caducidad" placeholder="Ingrese la caducidad" value="{{old('caducidad')}}">
            <small class="text-danger">{{$errors->first('caducidad')}}</small>
        </div>

        <div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
    <div>
    <table class="table ">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Lote</th>
            <th scope="col">Caducidad</th>
        </tr>
        </thead>
            <tbody>
            @foreach($entradas as $entrada)
            <tr>
                <td>{{$entrada->id}}</td>
                <td>{{$entrada->cantidad}}</td>
                <td>{{$entrada->lote}}</td>
                <td>{{$entrada->caducidad}}</td>
                <td>
                    <form action="{{route('entradaEliminar', $entrada->id)}}" method="post" class="formulario-eliminar">
                        @csrf @method('DELETE')

                        <button type="submit" class="btn btn-danger" style="border: none"><i class="fas fa-trash-alt fa-lg"></i></button>
                    <a href="{{route('entradaEditar', $entrada ->id)}}"><i class="fas fa-user-edit fa-lg" ></i></a>
                        </form>
                </td>
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
    <script>   <script>
    
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
    

     </script> </script>
@stop
