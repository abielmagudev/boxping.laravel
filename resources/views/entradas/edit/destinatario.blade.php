@extends('app')
@section('content')

<p class="">
   <a href="{{ route('entradas.show', $entrada) }}" class="link-primary text-decoration-none small">&laquo; Regresar</a>
   <br>
   <b>{{ $entrada->numero }}</b>
</p>

@component('@.bootstrap.card', [
   'subtitle' => "Encontrados con \"{$searched}\": {$destinatarios->count()}",
   'title' => 'Agregar destinatario',
])
   @slot('options')
      @component('@.partials.modal-search-endpoints', [
         'id' => 'modalSearchDestinatarios',
         'title' => 'Buscar destinatarios',
         'form' => [
            'route' => route('entradas.edit', $entrada),
         ],
         'trigger' => [
            'classes' => 'btn btn-primary btn-sm',
            'text' => $graffiti->design('search')->svg(),
         ],
      ])
         @slot('inputs')
         <input type="hidden" name="editor" value="destinatario">
         @endslot 
      @endcomponent
      
      <a href="{{ route('destinatarios.create', ['entrada' => $entrada->id]) }}" class="btn btn-primary btn-sm ms-1" data-toggle="tooltip" data-placement="left" title="Nuevo destinatario">
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
         @if( $destinatario->id <> $entrada->destinatario_id )
            <button name="destinatario" value="{{ $destinatario->id }}" class="btn btn-outline-primary btn-sm" form="formUpdateDestinatario" type="submit">Agregar</button>
            
         @else
            <button class="btn btn-sm btn-secondary disabled">Agregado</button>

         @endif
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

@endsection
