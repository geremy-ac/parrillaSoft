@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
    <div class="row">
        <div class="col">
            <h3 class="text-center">Vender</h3>
            @if(session('status'))
                @if(session('status') == '1')
                    <div class="alert alert-success">
                        Se guardo
                    </div>
                @elseif(session('status')=='2')
                    <div class="alert alert-danger">

                        Recuerde agregar por lo menos un  producto a la venta

                    </div>
                @elseif(session('status')=='3')
                    <div class="alert alert-danger">

                       Insumos insuficientes

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
        <form action="/ventas/vendido" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-head"><h4 class="text-center">Venta</h4></div>

                        <div class="row card-body">

                            <div class="form-group col-6">
                                <label for="">Total</label>
                                <input id="total" type="text" class="form-control" name="total" readonly>
                            </div>



                        </div>
                        <div class="col-12" style="margin-top:3%">
                            <button type="submit" class="btn btn-success btn-block">Guardar</button>
                        </div>
                    </div>
                </div>

                <div class="col-6">

                    <div class="card">
                        <div class="card-head"> <h4 class="text-center">Productos</h4></div>

                        <div class="row card-body">

                            <div class="form-group col-6">
                                <label for="">Nombre</label>
                                <select id="productos" name="productos" class="form-control" onchange="colocar_precio()">
                                    <option value="">Seleccione</option>
                                    @foreach ($productos as $value)
                                        <option  precio="{{$value->precio}}"value="{{$value->id}}">{{$value->Nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Cantidad</label>
                                <input type="number" class="form-control" id="cantidad">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Precio</label>
                                <input type="number" class="form-control" id="precio" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <button onclick="agregar_producto()" type="button" class="btn btn-success float-right">Agregar</button>
                        </div>
                    </div>
                    <table class="table">

                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>

                        <tbody id="tblProductos">

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
        function colocar_precio() {

            let precio = $("#productos option:selected").attr("precio");
            $("#precio").val(precio);


        }
        function agregar_producto(){
            let Producto_id = $("#productos option:selected").val();
            let productos_text= $("#productos option:selected").text();
            let cantidad =$("#cantidad").val();
            let precio =$("#precio").val();


            if(cantidad > 0 && precio > 0){

                $("#tblProductos").append(`
                        <tr id="tr-${Producto_id}">
                                 <td>
                                     <input type="hidden" name="Producto_id[]" value="${Producto_id}"/>
                                      <input type="hidden" name="cantidades[]" value="${cantidad}"/>
                                       ${productos_text}

                                 </td>
                                 <td>
                                        ${cantidad}
                                 </td>
                                     <td>
                                        ${precio}
                                 </td>
                                 <td>
                                        ${parseInt(cantidad) * parseInt(precio)}
                                 </td>
                                 <td>
                                        <button type="button" class="btn btn-danger" onclick="eliminar_producto((${Producto_id}), ${parseInt(cantidad) * parseInt(precio)})">X</button>
                                 </td>


                        </tr>
                `);
                let total =$("#total").val() || 0;
                $("#total").val(parseInt(total) + parseInt(cantidad) * parseInt(precio));

            } else {
                alert("Se debe ingresar una cantidad y el precio debe de ser mayor a 0");
            }

        }
        function eliminar_producto(id,subtotal) {
            $("#tr-" + id).remove();
            let total = $("#total").val() || 0;
            $("#total").val(parseInt(total) - subtotal);
        }

    </script>
@stop
