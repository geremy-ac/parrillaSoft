@extends('adminlte::page')

@section('title', 'Index')

@section('content_header')
    <h1>Insumos</h1>

@stop
@method("POST")
@section('content')
    @if(session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}
        </div>
    @endif
    @livewire('insumos.insumo-index')


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
 $('.formulario-eliminar').submit(function(e){
      e.preventDefault();
const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-danger',
    cancelButton: 'btn btn-success'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: '¿Esta seguro que quiere eliminar estos datos?',
  text: "no podras revertir esto!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'No, cancelar',
  cancelButtonText: 'si, eliminarlo!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    this.submit();
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    this.submit();
  }
})     })   </script>
@stop
