<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-800 leading-tight">
           Parrilla Yoha
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="row">
                <div class="card col" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('img/user.png')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Usuarios</h5>

                        <a href="{{route('users.index')}}" class="btn btn-danger">Ir al sitio</a>
                    </div>
                </div>
                <div class="card col" style="width: 18rem;">
                    <img class="card-img-top " src="{{asset('img/insumos.jpg')}}"  alt="Card image cap ">
                    <div class="card-body">
                        <h5 class="card-title">Insumos</h5>

                        <a href="{{route('listarInsumo')}}" class="btn btn-danger">Ir al sitio</a>
                    </div>
                </div>
                <div class="card col" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('img/productos.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Productos</h5>

                        <a href="{{route('ListarProducto')}}" class="btn btn-danger">Ir al sitio</a>
                    </div>
                </div>
                <div class="card col" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('img/ventas.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Ventas</h5>

                        <a href="{{route('VistaListarV')}}" class="btn btn-danger">Ir al sitio</a>
                    </div>
                </div>
                   </div>
            </div>
        </div>
    </div>
</x-app-layout>
