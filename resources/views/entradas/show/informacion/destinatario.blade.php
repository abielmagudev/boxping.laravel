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
        @component('@.partials.modal-search-endpoints', [
            'id' => 'modalSearchDestinatarios',
            'title' => 'Buscar destinatarios',
            'form' => [
                'route' => route('entradas.edit', $entrada),
            ],
            'trigger' => [
                'text' => 'Cambiar destinatario',
            ],
        ])
            @slot('inputs')
            <input type="hidden" name="editor" value="destinatario">
            @endslot 
        @endcomponent

        <a href="{{ route('destinatarios.edit', ['destinatario' => $entrada->destinatario_id, 'entrada' => $entrada->id]) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Editar destinatario">
            <span>Editar destinatario</span>
        </a>
    </div>

@else
    <br>
    <div class="text-center">
        @component('@.partials.modal-search-endpoints', [
            'id' => 'modalSearchDestinatarios',
            'title' => 'Buscar destinatarios',
            'form' => [
                'route' => route('entradas.edit', $entrada),
            ],
            'trigger' => [
                'text' => 'Agregar destinatario',
            ],
        ])
            @slot('inputs')
            <input type="hidden" name="editor" value="destinatario">
            @endslot 
        @endcomponent
    </div>

@endif

</div>
