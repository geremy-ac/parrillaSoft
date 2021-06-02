@extends('adminlte::page')

@section('title', 'Index')

@section('content_header')
    <h1>Insumos</h1>
    <style>
        .select2-selection {
            height: calc(1.5em + .75rem + 2px) !important;
        }
    </style>
@stop

@section('content')
    @if(session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}
        </div>
    @endif
    <div class="row">
        <div class="col">
            <h3 class="text-center">Crear insumo <a href="/producto/listar"> Listar</a></h3>
        </div>
    </div>
   
    <form action="{{route('insumoActualizar', $insumo)}}" method="post">
    @method("POST")
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-head">
                        <h4 class="text-center">1. Info insumos</h4>
                    </div>
                    <div class="row card-body">
                        <div class="form-group col-6">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" name="nombre"  value="{{old('nombre', $insumo->nombre)}}" readonly>
                        </div>
                   
                        <div class="form-group col-6">
                            <label for="">Medida</label>
                            <input type="text" class="form-control" name="medida" value="{{old('medida', $insumo->medida)}}" readonly>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Stock_minimo</label>
                            <input type="number" class="form-control" name="stock_minimo" value="{{old('stock_minimo', $insumo->stock_minimo)}}" readonly>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Cantidad</label>
                            <input type="number" id="cantidad_total" class="form-control" name="cantidad" value="{{old('cantidad', $insumo->cantidad)}}"  readonly>
                        </div>
                    </div>
                </div>
                <div class="col-12" style="margin-top: 3%;">
                    <button type="submit" class="btn btn-success btn-block">Guardar</button>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-head">
                        <h4 class="text-center">2. Info entradas</h4>
                    </div>
                    <div class="row card-body">
                   
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">nombre_entrada</label>
                                <input type="text" id="nombre_entrada"  class="form-control"  >
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Cantidad</label>
                                <input type="number" id="cantidad"  class="form-control" >
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="">Caducidad</label>
                                <input id="caducidad" type="date"  class="form-control"  >
                            </div>
                        </div>
                        <div class="col-12">
                            <button onclick="agregar_entrada()" type="button"
                                    class="btn btn-success float-right">Agregar</button>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>nombre_entrada</th>
                            <th>Cantidad</th>
                            <th>Caducidad</th>
                            <th>Subtotal</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody id="tblEntradas">
                        

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

@stop

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function(){
            $("select").select2();
        });
       
function agregar_entrada(){

   
    let nombre_entrada = $("#nombre_entrada").val();
    let cantidad = $("#cantidad").val();
    let caducidad = $("#caducidad").val();
        if (cantidad>0) {
            $("#tblEntradas").append(`
                    <tr id="tr-${nombre_entrada}">
                        <td>
                            <input type="hidden" name="cantidades[]" value="${cantidad}" />
                            <input type="hidden" name="caducidades[]" value="${caducidad}" />
                            <input type="hidden" name="nombre_entradas[]" value="${nombre_entrada}" />
                            ${nombre_entrada}
                        </td>
                        <td>${cantidad}</td>
                        <td>${caducidad}</td>
                        <td>${parseInt(cantidad)} </td>
                        <td>
                        <input type="button" value="Actualizar" onclick="location.reload()"/>
                        </td>
                    </tr>
                `);
            let cantidad_total = $("#cantidad_total").val() || 0;
            $("#cantidad_total").val(parseInt(cantidad_total) + parseInt(cantidad) );
            console.log(cantidad_total);

        } else {
            alert("Se debe ingresar una cantidad ");
        }
       }
        function eliminar_entrada(id, subtotal) {
            $("#tr-" + id).remove();
            let cantidad_total = $("#cantidad_total").val() || 0;
            $("#cantidad_total").val(parseInt(cantidad_total) - parseInt(subtotal) );
            console.log(cantidad_total);
        }
    </script>
@stop
