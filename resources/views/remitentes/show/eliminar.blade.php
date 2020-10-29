@component('components.confirm-delete-bundle')
    @slot('route', route('remitentes.destroy', $remitente))
    @slot('text', 'Eliminar remitente')
    @slot('content')
    <p class="lead text-center m-0">Deseas eliminar remitente <b>{{ $remitente->nombre }}</b>?</p>
    @endslot
@endcomponent
