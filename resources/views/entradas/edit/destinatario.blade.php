@extends('app')
@section('content')

<p>
   <a href="{{ route('entradas.show', $entrada) }}" class="link-primary text-decoration-none">Regresar</a>
</p>

@component('@.bootstrap.card', [
   'subtitle' => "Encontrados con \"{$searched}\": {$destinatarios->count()}",
   'title' => 'Agregar destinatario',
])
   @slot('options')
      @include('destinatarios.modal-search.trigger', [
         'classes' => 'btn btn-sm btn-primary',
         'text' => $graffiti->design('search')->svg()
      ])

      <a href="{{ route('destinatarios.create', ['entrada' => $entrada->id]) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Nuevo destinatario">
         {!!  $graffiti->design('plus-lg')->svg() !!}
      </a>
   @endslot

   @if( $destinatarios->count() )
   @component('@.bootstrap.table', [
      'thead' => ['#','Nombre', 'Dirección','Postal', 'Localidad', 'Teléfono'],
   ])
      @foreach($destinatarios as $destinatario)
      <tr>
         <td class="small text-muted">{{ $loop->iteration }}</td>
         <td class="{{ notHasSearchText($searched, $destinatario->nombre) ?: 'table-warning' }}">{{ $destinatario->nombre }}</td>
         <td class="{{ notHasSearchText($searched, $destinatario->direccion) ?: 'table-warning' }}">{{ $destinatario->direccion }}</td>
         <td class="{{ notHasSearchText($searched, $destinatario->postal) ?: 'table-warning' }}">{{ $destinatario->postal }}</td>
         <td class="{{ notHasSearchText($searched, $destinatario->localidad) ?: 'table-warning' }}">{{ $destinatario->localidad }}</td>
         <td class="{{ notHasSearchText($searched, $destinatario->telefono) ?: 'table-warning' }}">{{ $destinatario->telefono }}</td>
         <td class="text-end">
            <button name="destinatario" value="{{ $destinatario->id }}" class="btn btn-outline-success btn-sm" form="formUpdateDestinatario" type="submit">Agregar</button>
         </td>
      </tr>
      @endforeach
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
@endcomponent

@component('destinatarios.modal-search.modal', [
    'route' => route('entradas.edit', $entrada),    
])
    <input type="hidden" name="editor" value="destinatario">
@endcomponent

@endsection
