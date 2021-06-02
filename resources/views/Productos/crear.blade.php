@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
    <div class="row">
        <div class="col">
    <h3 class="text-center">Productos crear</h3>
    @if(session('status'))
            @if(session('status') == '1')
            <div class="alert alert-success">
                Se guardo
            </div>
                @else

                    <div class="alert alert-danger">
                       {{session('status')}}
                    </div>
                @endif
            @endif
        </div>
    </div>


@stop

@section('content')

<body>

<script>

</script>
<div class="container">
    <form action="/producto/create" method="post">
        @csrf
    <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-head"><h4 class="text-center">Producto</h4></div>

                         <div class="row card-body">
                                        <div class="form-group col-6">
                                        <label for="">Nombre</label>
                                        <input type="text" class="form-control" name="nombre">
                                        </div>

                                        <div class="form-group col-6">
                                        <label for="">Estado</label>
                                        <input type="text" class="form-control" name="status">
                                        </div>
                                        <div class="form-group col-6">
                                        <label for="">Precio</label>
                                        <input type="number" class="form-control" name="precio">
                                         </div>
                                         <div class="form-group col-6">
                                        <label for="">Descripción</label>
                                        <input type="longtext" class="form-control" name="descripcion">
                                         </div>
                                         <div class="form-group col-6">
                                        <label for="">Categorias</label>
                                        <select name="categorias" class="form-control">
                                            <option value="">Seleccione</option>
                                            @foreach ($categorias as $value)
                                                <option value="{{$value->id}}">{{$value->nombre}}</option>
                                            @endforeach
                                        </select>

                                        </div>


                            </div>
                    <div class="col-12" style="margin-top:3%">
                        <button type="submit" class="btn btn-success btn-block">Guardar</button>
                    </div>
                </div>
            </div>

                    <div class="col-6">

                            <div class="card">
                                <div class="card-head"> <h4 class="text-center">Insumos</h4></div>

                                    <div class="row card-body">

                                            <div class="form-group col-6">
                                            <label for="">Nombre</label>
                                                <select id="insumos" name="insumos" class="form-control">
                                                    <option value="">Seleccione</option>
                                                    @foreach ($insumos as $value)
                                                        <option  value="{{$value->id}}">{{$value->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="">Cantidad</label>
                                                <input type="number" class="form-control" id="cantidad">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button onclick="agregar_insumo()" type="button" class="btn btn-success float-right">Agregar</button>
                                        </div>
                                    </div>
                                <table class="table">

                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>

                                    <tbody id="tblInsumos">

                                    </tbody>

                                </table>

                    </div>


    </div>
    </form>
    </div>
</body>

@stop

@section('css')

@stop

@section('js')

    <script>
        function agregar_insumo(){
            let Insumo_id = $("#insumos option:selected").val();
            let insumos_text= $("#insumos option:selected").text();
            let cantidad =$("#cantidad").val();

            if(cantidad > 0){

                $("#tblInsumos").append(`
                        <tr id="tr-${Insumo_id}">
                                 <td>
                                     <input type="hidden" name="Insumo_id[]" value="${Insumo_id}"/>
                                      <input type="hidden" name="cantidad[]" value="${cantidad}"/>
                                       ${insumos_text}

                                 </td>
                                 <td>
                                        ${cantidad}
                                 </td>
                                 <td>
                                        <button type="button" class="btn btn-danger" onclick="eliminar_insumo(${Insumo_id})">X</button>
                                 </td>


                        </tr>
                `);

            } else {
                alert("Se debe ingresar una cantidad");
            }

        }
        function eliminar_insumo(id) {
            $("#tr-" + id).remove();
        }
    </script>
@stop
