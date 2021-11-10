@extends('app')
@section('content')

@component('@.bootstrap.page-header', [

   'goback' => route('entradas.show', $entrada)
])
@endcomponent

@component('@.bootstrap.card', [
   'title' => 'Agregar remitente',
   'subtitle' => "Encontrados con \"{$searched}\": {$remitentes->count()}",
])
   @slot('options')
      @include('@.bootstrap.modal-trigger', [
         'classes' => 'btn btn-primary btn-sm',
         'modal_id' => 'modalSearchToChangeRemitente',
         'text' => 'P',
      ])
      <a href="{{ route('remitentes.create', ['entrada' => $entrada->id]) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Nuevo remitente">
         <b>+</b>
      </a>
      <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Regresar">
         <b>R</b>
      </a>
   @endslot

   @if( $remitentes->count() )
   @component('@.bootstrap.table', [
      'thead' => ['#','Nombre', 'Dirección','Postal', 'Localidad', 'Teléfono'],
   ])
      @foreach($remitentes as $remitente)
      <tr>
         <td class="small text-muted">{{ $loop->iteration }}</td>
         <td class="{{ notHasSearchText($searched, $remitente->nombre) ?: 'table-warning' }}">{{ $remitente->nombre }}</td>
         <td class="{{ notHasSearchText($searched, $remitente->direccion) ?: 'table-warning' }}">{{ $remitente->direccion }}</td>
         <td class="{{ notHasSearchText($searched, $remitente->postal) ?: 'table-warning' }}">{{ $remitente->postal }}</td>
         <td class="{{ notHasSearchText($searched, $remitente->localidad) ?: 'table-warning' }}">{{ $remitente->localidad }}</td>
         <td class="{{ notHasSearchText($searched, $remitente->telefono) ?: 'table-warning' }}">{{ $remitente->telefono }}</td>
         <td class="text-end">
            <button name="remitente" value="{{ $remitente->id }}" class="btn btn-outline-success btn-sm" form="form-update-remitente" type="submit">Agregar</button>
         </td>
      </tr>
      @endforeach
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
@endcomponent

@include('entradas.show.trayectoria.modal-change-remitente')

@endsection
