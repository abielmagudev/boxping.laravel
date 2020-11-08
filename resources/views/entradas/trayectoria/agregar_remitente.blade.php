@extends('app')
@section('content')
@include('components.notification')

<div class="d-flex justify-content-between align-items-center">
   <div>
      <button data-toggle="modal" data-target="#searchRemitentes" type="button" class="btn btn-primary btn-sm">Buscar remitente</button>
   </div>
   <div>
      <a href="{{ route('remitentes.create', ['entrada' => $entrada->id]) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Nuevo remitente">
         <b>+</b>
      </a>
   </div>
</div>
<br>

<div class="card">
   <div class="card-header">
         <span>Remitentes</span>
         <span class="badge badge-primary">{{ $remitentes->count() }}</span>
   </div>
   <div class="card-body p-0">
      @if( $remitentes->count() )
      <div class="table-responsive">
         <table class="table table-hover">
            <thead>
               <tr class="small">
                  <th>Nombre</th>
                  <th>Dirección</th>
                  <th class="text-nowrap">Código postal</th>
                  <th>Localidad</th>
                  <th>Teléfono</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
            @foreach($remitentes as $remitente)
            <tr>
               <td class="align-middle">{{ $remitente->nombre }}</td>
               <td class="align-middle">{{ $remitente->direccion }}</td>
               <td class="align-middle">{{ $remitente->codigo_postal }}</td>
               <td class="align-middle">{{ $remitente->localidad }}</td>
               <td class="align-middle">{{ $remitente->telefono }}</td>
               <td class="align-middle">
                  <button name="remitente" value="{{ $remitente->id }}" class="btn btn-outline-success btn-sm" form="form-update-remitente" type="submit">Agregar</button>
               </td>
            </tr>
            @endforeach
            </tbody>
         </table>
      </div>
      <form action="{{ route('entradas.update', $entrada) }}" method="post" id="form-update-remitente">
         @method('put')
         @csrf
         <input type="hidden" name="actualizar" value="remitente">
      </form>

      @else
      <div class="text-center py-5 px-3">
         <p class="h3">Sin resultados</p>
         <p class="text-muted">Intenta buscar nuevamente o crea un nuevo remitente.</p>
      </div>

      @endif
   </div>
</div>

@include('entradas.trayectoria.modal-search-remitentes')
@endsection
