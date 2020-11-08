@extends('app')
@section('content')
@include('components.notification')

<div class="d-flex justify-content-between align-items-center">
   <div>
      <button data-toggle="modal" data-target="#searchDestinatarios" type="button" class="btn btn-primary btn-sm">Buscar destinatario</button>
   </div>
   <div>
      <a href="{{ route('destinatarios.create', ['entrada' => $entrada->id]) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Nuevo destinatario">
         <b>+</b>
      </a>
   </div>
</div>
<br>

<div class="card">
   <div class="card-header">
         <span>Destinatarios</span>
         <span class="badge badge-primary">{{ $destinatarios->count() }}</span>
   </div>
   <div class="card-body p-0">
      @if( $destinatarios->count() )
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
            @foreach($destinatarios as $destinatario)
            <tr>
               <td class="align-middle">{{ $destinatario->nombre }}</td>
               <td class="align-middle">{{ $destinatario->direccion }}</td>
               <td class="align-middle">{{ $destinatario->codigo_postal }}</td>
               <td class="align-middle">{{ $destinatario->localidad }}</td>
               <td class="align-middle">{{ $destinatario->telefono }}</td>
               <td class="align-middle text-right">
                  <button name="destinatario" value="{{ $destinatario->id }}" class="btn btn-outline-success btn-sm" form="form-update-destinatario" type="submit">Agregar</button>
               </td>
            </tr>
            @endforeach
            </tbody>
         </table>
      </div>
      <form action="{{ route('entradas.update', $entrada) }}" method="post" id="form-update-destinatario">
         @method('put')
         @csrf
         <input type="hidden" name="actualizar" value="destinatario">
      </form>

      @else
      <div class="text-center py-5 px-3">
         <p class="h3">Sin resultados</p>
         <p class="text-muted">Intenta buscar nuevamente o crea un nuevo destinatario.</p>
      </div>

      @endif
   </div>
</div>

@include('entradas.trayectoria.modal-search-destinatarios')
@endsection
