@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
   'pretitle' => 'Agregar remitente',
   'title' => "Busqueda: \"{$searched}\" ",
   'goback' => route('entradas.show', $entrada)
])
@endcomponent

@component('@.bootstrap.card-headers')
   @slot('header_left')
   <div>
      <span class="badge bg-dark text-white">{{ $remitentes->count() }}</span>
      <span class="align-middle">Remitentes</span>
   </div>
   @endslot

   @slot('header_right')
   @include('@.bootstrap.modal-trigger', [
      'classes' => 'btn btn-primary btn-sm',
      'modal_id' => 'modalSearchToChangeRemitente',
      'text' => $svg->search,
   ])
   <a href="{{ route('remitentes.create', ['entrada' => $entrada->id]) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Nuevo remitente">
      <span>{!! $svg->plus !!}</span>
   </a>
   @endslot

   @slot('body')
   @if( $remitentes->count() )

   @component('@.bootstrap.table', [
      'thead' => ['#','Nombre', 'Dirección','Postal', 'Localidad', 'Teléfono'],
   ])
      @slot('tbody')
         @foreach($remitentes as $remitente)
         <tr>
            <td class="small text-muted">{{ $loop->iteration }}</td>
            <td class="{{ notHasSearchText($searched, $remitente->nombre) ?: 'table-warning' }}">{{ $remitente->nombre }}</td>
            <td class="{{ notHasSearchText($searched, $remitente->direccion) ?: 'table-warning' }}">{{ $remitente->direccion }}</td>
            <td class="{{ notHasSearchText($searched, $remitente->codigo_postal) ?: 'table-warning' }}">{{ $remitente->codigo_postal }}</td>
            <td class="{{ notHasSearchText($searched, $remitente->localidad) ?: 'table-warning' }}">{{ $remitente->localidad }}</td>
            <td class="{{ notHasSearchText($searched, $remitente->telefono) ?: 'table-warning' }}">{{ $remitente->telefono }}</td>
            <td class="text-end">
               <button name="remitente" value="{{ $remitente->id }}" class="btn btn-success btn-sm" form="form-update-remitente" type="submit">Agregar</button>
            </td>
         </tr>
         @endforeach
      @endslot
   @endcomponent

   <form action="{{ route('entradas.update', $entrada) }}" method="post" id="form-update-remitente">
      @method('put')
      @csrf
      <input type="hidden" name="actualizar" value="remitente">
   </form>
   
   @else
   <div class="text-center lead">
      <span class="text-muted">Sin resultados de</span>
      <b class="">{{ $searched }}</b>
   </div>

   @endif
   @endslot
@endcomponent

@include('entradas.show.trayectoria.modal-change-remitente')

@endsection
