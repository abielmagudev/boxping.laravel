@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
   'pretitle' => 'Agregar destinatario',
   'title' => "Busqueda: \"{$searched}\" ",
   'goback' => route('entradas.show', $entrada),
])
@endcomponent

@component('@.bootstrap.card-headers')
   @slot('header_left')
   <div>
      <span class="badge bg-dark text-white">{{ $destinatarios->count() }}</span>
      <span class="align-middle">Destinatarios</span>
   </div>
   @endslot

   @slot('header_right')
   @include('@.bootstrap.modal-trigger', [
      'classes' => 'btn btn-primary btn-sm',
      'modal_id' => 'modalSearchToChangeDestinatario',
      'text' => $svg->search,
   ])

   <a href="{{ route('destinatarios.create', ['entrada' => $entrada->id]) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Nuevo destinatario">
      <span>{!! $svg->plus !!}</span>
   </a>
   @endslot

   @slot('body')
   @if( $destinatarios->count() )

   @component('@.bootstrap.table', [
      'thead' => ['#','Nombre', 'Dirección','Postal', 'Localidad', 'Teléfono'],
   ])
      @slot('tbody')
         @foreach($destinatarios as $destinatario)
         <tr>
            <td class="small text-muted">{{ $loop->iteration }}</td>
            <td class="{{ notHasSearchText($searched, $destinatario->nombre) ?: 'table-warning' }}">{{ $destinatario->nombre }}</td>
            <td class="{{ notHasSearchText($searched, $destinatario->direccion) ?: 'table-warning' }}">{{ $destinatario->direccion }}</td>
            <td class="{{ notHasSearchText($searched, $destinatario->codigo_postal) ?: 'table-warning' }}">{{ $destinatario->codigo_postal }}</td>
            <td class="{{ notHasSearchText($searched, $destinatario->localidad) ?: 'table-warning' }}">{{ $destinatario->localidad }}</td>
            <td class="{{ notHasSearchText($searched, $destinatario->telefono) ?: 'table-warning' }}">{{ $destinatario->telefono }}</td>
            <td class="text-end">
               <button name="destinatario" value="{{ $destinatario->id }}" class="btn btn-success btn-sm" form="formUpdateDestinatario" type="submit">Agregar</button>
            </td>
         </tr>
         @endforeach
      @endslot
   @endcomponent

   <form action="{{ route('entradas.update', $entrada) }}" method="post" id="formUpdateDestinatario">
      @method('put')
      @csrf
      <input type="hidden" name="actualizar" value="destinatario">
   </form>
   
   @else
   <div class="text-center lead">
      <span class="text-muted">Sin resultados de</span>
      <b class="">{{ $searched }}</b>
   </div>

   @endif
   @endslot
@endcomponent

@include('entradas.show.trayectoria.modal-change-destinatario')

@endsection
