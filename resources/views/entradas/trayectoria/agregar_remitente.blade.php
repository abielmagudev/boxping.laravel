@extends('app')
@section('content')

<p class="text-end">
   <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-sm btn-secondary">Regresar</a>
</p>

@component('components.card', [
   'header_title' => 'Remitentes encontrados',
   'header_title_badge' => $remitentes->count(),
])
   @slot('header_options')
   <button data-bs-toggle="modal" data-bs-target="#modal-search-remitentes" type="button" class="btn btn-primary btn-sm">
      {!! $icons->search !!}
   </button>
   <a href="{{ route('remitentes.create', ['entrada' => $entrada->id]) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Nuevo remitente">
      <span>{!! $icons->plus !!}</span>
   </a>
   @endslot

   @slot('body')
   @if( $remitentes->count() )

   @component('components.table', [
      'thead' => ['Nombre', 'Dirección','Postal', 'Localidad', 'Teléfono',''],
   ])
      @slot('tbody')
         @foreach($remitentes as $remitente)
         <tr>
            <td class="text-nowrap">{{ $remitente->nombre }}</td>
            <td class="text-nowrap">{{ $remitente->direccion }}</td>
            <td class="text-nowrap">{{ $remitente->codigo_postal }}</td>
            <td class="text-nowrap">{{ $remitente->localidad }}</td>
            <td class="text-nowrap">{{ $remitente->telefono }}</td>
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
   <p class="text-center lead">
      <span class="text-muted">Sin resultados de</span>
      <b class="">{{ $searched }}</b>
   </p>

   @endif
   @endslot
@endcomponent

@include('entradas.trayectoria.modal-search-remitentes')
@endsection
