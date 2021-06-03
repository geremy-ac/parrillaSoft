<div>

    <div class="card">

        <div class="card-header">
            <input wire:model="search" ire:model="search" class="form-control" placeholder="ingrese nombre del producto">
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>estado</th>

                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($producto as $productov)

                <tr>
                    <td>{{$productov->id}}</td>
                    <td>{{$productov->Nombre}}</td>
                    <td>{{$productov->descripcion}}</td>
                    <td>{{$productov->precio}}</td>
                    <td id="resp{{ $productov->status }}">
                        <br>
                        @if($productov->status == 1)
                            <button type="button" class="btn btn-sm btn-success">Activo</button>
                        @else
                            <button type="button" class="btn btn-sm btn-danger">Inactivo</button>
                        @endif

                    </td>
                    <td>
                        <a class="btn btn-info" href="/producto/Listar?id={{$productov->id}}">Ver insumos</a>

                    </td>
                    <td>
                        <br>
                        <label class="switch">
                        <input data-id="{{"$productov->id}}" class="mi_chexkbox" type="checkbox" data-onstyle="succes" data-onstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive"{{"$productov->status ? 'checked' :''}}>
                            <span class="slider round"></span>
                        </label>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    @if(count($insumos)<0)

        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                    <tr>
                        <th colspan="2" class="text-center">Insumos</th>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                    </tr>

                    </thead>
                    @foreach($insumos as $value)
                        <tr>
                            <td><{{$value->nombre}}/td>
                            <td><{{$value->cantidad}}/td>
                        </tr>
                    @endforeach
                    <tbody>

                    </tbody>

                </table>


            </div>


        </div>
    @endif
    <script type="text/javascript">
        $('.mi_chexkbox').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');
        console.log(status);
        $ajax({
        type:"GET",
        dataType:"json",
        url:'{{route('Cestado')}}',
        data: {'status':estatus,'id':id},
        succes: function(data){
        $('#resp'+ id).html(data.var);
        console.log(data.var)
        }
        });
})

    </script>


</div>
