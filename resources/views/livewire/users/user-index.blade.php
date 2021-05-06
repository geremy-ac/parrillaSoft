<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" ire:model="search" class="form-control" placeholder="ingrese nombre o correo de un usuario">
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td width="10px">
                            <a class="btn btn-primary" href="{{route('users.edit', $user)}}">editar</a>
                        </td>
                    </tr>


                </tbody>
                @endforeach
            </table>


        </div>

        <div class="card-footer">
            {{$users -> links()}}
        </div>

    </div>


</div>
