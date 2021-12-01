@extends('app')
@section('content')

<p>
   <a href="{{ route('entradas.show', $entrada) }}" class="link-primary text-decoration-none">Regresar</a>
</p>

@component('@.bootstrap.card', [
   'title' => 'Agregar remitente',
   'subtitle' => "Encontrados con \"{$searched}\": {$remitentes->count()}",
])
   @slot('options')
      @include('remitentes.modal-search.trigger', [
         'classes' => 'btn btn-sm btn-primary',
         'text' => $graffiti->design('search')->svg()
      ])

      <a href="{{ route('remitentes.create', ['entrada' => $entrada->id]) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Nuevo destinatario">
         {!!  $graffiti->design('plus-lg')->svg() !!}
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

@component('remitentes.modal-search.modal', [
    'route' => route('entradas.edit', $entrada),    
])
    <input type="hidden" name="editor" value="remitente">
@endcomponent

@endsection
