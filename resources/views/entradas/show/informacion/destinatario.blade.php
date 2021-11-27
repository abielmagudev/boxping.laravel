<div class="tab-pane fade" id="content-destinatario" role="tabpanel" aria-labelledby="destinatario-tab">
@if( $entrada->hasDestinatario() )
    @component('@.bootstrap.table')
        <tr>
            <td class="text-muted small" style="width:1%">Nombre</td>
            <td>{{ $entrada->destinatario->nombre }}</td>
        </tr>
        <tr>
            <td class="text-muted small">Teléfono</td>
            <td>{{ $entrada->destinatario->telefono }}</td>
        </tr>
        <tr>
            <td class="text-muted small">Dirección</td>
            <td>{{ $entrada->destinatario->direccion }}</td>
        </tr>
        <tr>
            <td class="text-muted small">Postal</td>
            <td>{{ $entrada->destinatario->postal }}</td>
        </tr>
        <tr>
            <td class="text-muted small">Localidad</td>
            <td>{{ $entrada->destinatario->localidad }}</td>
        </tr>
        <tr>
            <td class="text-muted small align-top">Referencias</td>
            <td>{{ $entrada->destinatario->referencias }}</td>
        </tr>
        <tr>
            <td class="text-muted small align-top border-0">Notas</td>
            <td class="border-0">{{ $entrada->destinatario->notas }}</td>
        </tr>
    @endcomponent
    <br>
    <div class="text-end">
        @include('destinatarios.modal-search.trigger', [
            'text' => 'Cambiar destinatario', 
            'classes' => 'btn btn-sm btn-primary',   
        ])
        <a href="{{ route('destinatarios.edit', ['destinatario' => $entrada->destinatario_id, 'entrada' => $entrada->id]) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Editar destinatario">
            <span>Editar destinatario</span>
        </a>
    </div>

@else
    <br>
    <div class="text-center">
        @include('destinatarios.modal-search.trigger', [
            'text' => 'Agregar destinatario',
            'classes' => 'btn btn-sm btn-primary',
        ])
    </div>

@endif

@component('destinatarios.modal-search.modal', [
    'route' => route('entradas.edit', $entrada),    
])
    <input type="hidden" name="editor" value="destinatario">
@endcomponent

</div>
