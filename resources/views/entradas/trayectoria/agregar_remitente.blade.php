@extends('app')
@section('content')

@component('@.bootstrap.header', [
   'title' => 'Buscar remitentes',
   'goback' => route('entradas.show', $entrada)
])
@endcomponent

@component('@.bootstrap.card-headers')
   @slot('header_left')
   <p class="m-0">Encontrados <span class="badge bg-dark text-white">{{ $remitentes->count() }}</span></p>
   @endslot

   @slot('header_right')
   <button data-bs-toggle="modal" data-bs-target="#modal-search-remitentes" type="button" class="btn btn-primary btn-sm">
      {!! $svg->search !!}
   </button>
   <a href="{{ route('remitentes.create', ['entrada' => $entrada->id]) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Nuevo remitente">
      <span>{!! $svg->plus !!}</span>
   </a>
   @endslot

   @slot('body')
   @if( $remitentes->count() )

   @component('@.bootstrap.table', [
      'thead' => ['Nombre', 'Dirección','Postal', 'Localidad', 'Teléfono'],
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
