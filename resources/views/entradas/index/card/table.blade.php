@component('@.bootstrap.table')
    @slot('thead')
    <tr>
        @if( $component->allow('checkboxes') )
        <th class="align-middle text-center ps-3" style="width:1%">
            @include('@.partials.checkboxes-switcher', [
                'checkboxes_name' => $component->form('checkboxes', 'name'),
                'switcher' => $component->form('checkboxes', 'switcher'),
            ])
        </th>

        @endif

        <th>Entrada<small class="d-block fw-normal">Consolidado</small></th>
        <th>Destinatario <small class="d-block fw-normal">Domicilio</small></th>
        <th>Cliente <small class="d-block fw-normal">Alias</small></th>
        <th></th>
    </tr>
    @endslot

    @foreach($component->entradas() as $entrada)
    <?php $checkbox_id = $component->form('checkboxes', 'prefix') . $entrada->id ?>

    <tr>
        <?php // Checkboxes ?>
        @if( $component->allow('checkboxes') )
        <td class="text-center" style="width:1%">
            <input 
                type="checkbox" 
                class="form-check-input" 
                id="<?= $checkbox_id ?>" 
                form="<?= $component->form('id') ?>"
                name="<?= $component->form('checkboxes', 'name') ?>" 
                value="<?= $entrada->id ?>"
            >
        </td>
        @endif

        <?php // Numero Entrada / Numero consolidado ?>
        <td>
            <label for="<?= $checkbox_id ?>">{{ $entrada->numero }}</label>
            <small class="d-block">
            @if( $component->hasCache('consolidado') || $entrada->hasConsolidado() )
                <?php $route = route('consolidados.show', $component->cache('consolidado')->id ?? $entrada->consolidado->id) ?>
                <a href="<?= $route ?>">{{ $component->cache('consolidado')->numero ?? $entrada->consolidado->numero }}</a>
                
            @else
                <span class="small" style="color:#BBBBBB">SIN CONSOLIDAR</span>
                
            @endif
            </small>
        </td>

        <?php // Domicilio destinatario / Localidad destinatario ?>
        <td>
            @if( $component->hasCache('destinatario') || $entrada->hasDestinatario() )
            <span class="d-block">{{ $component->cache('destinatario')->direccion ?? $entrada->destinatario->direccion ?? '-' }}</span>
            <small>{{ $component->cache('destinatario')->localidad ?? $entrada->destinatario->localidad }}</small>

            @endif
        </td>

        <?php // Alias cliente ?>
        <td>
            @if( $component->hasCache('cliente') || $entrada->hasCliente() )
            <span class="d-block">{{ $component->cache('cliente')->alias ?? $entrada->cliente->alias }}</span>
            
            @else
            <span class="text-muted">-</span>

            @endif
        </td>

        <?php // Opciones ?>
        <td class="text-end">
            <a href="<?= route('entradas.show', $entrada) ?>" class="btn btn-sm btn-outline-primary">
                {!! $graffiti->design('eye')->svg() !!}
            </a>
        </td>
    </tr>
    @endforeach
@endcomponent
