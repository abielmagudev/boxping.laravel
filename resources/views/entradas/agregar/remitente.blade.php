@extends('app')
@section('content')

<div class="d-flex justify-content-between align-items-center">
   <div>
      <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary btn-sm">Regresar</a>
   </div>
   <div>
      <button data-toggle="modal" data-target="#searchRemitentes" type="button" class="btn btn-primary btn-sm">Buscar de nuevo</button>
      <a href="{{ route('remitentes.create', ['entrada' => $entrada->id]) }}" class="btn btn-primary btn-sm">Crear remitente</a>
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
                  <button name="remitente" value="{{ $remitente->id }}" class="btn btn-success btn-sm" form="form-update-remitente" type="submit">Agregar</button>
               </td>
            </tr>
            @endforeach
            </tbody>
         </table>
      </div>
      <form action="{{ route('entradas.update', $entrada) }}" method="post" id="form-update-remitente">
         @method('put')
         @csrf
         <input type="hidden" name="update" value="remitente">
      </form>

      @else
      <div class="text-center py-5 px-3">
         <p class="h3">Sin resultados</p>
         <p class="text-muted">Intenta buscar nuevamente o crea un nuevo remitente.</p>
      </div>

      @endif
   </div>
</div>

@include('entradas.modals.search-remitentes')
@endsection
