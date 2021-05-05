<div class="table-responsive">
    <table class="table table-hover">
        <thead class="small">
            <tr>
                @if($card->printing_enable)
                <th></th>
                @endif
                <th>
                    <p class="m-0">Número</p>
                    <small class="text-muted fw-light">Consolidado</small>
                </th>
                <th>
                    <p class="m-0">Destino</p>
                    <small class="text-muted fw-light">Localidad</small>
                </th>
                <th>
                    <p class="m-0">Cliente</p>
                    <small class="text-muted fw-light">Alias</small>
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($card->entradas as $entrada)
            <?php $checkbox_id = $card->checkbox_prefix_id . $entrada->id ?>
            <tr>
                @if($card->printing_enable)
                <td style="width:1%">
                    <input type="checkbox" name="lista[]" value="{{ $entrada->id }}" id="{{ $checkbox_id }}" class="form-check-input" form="{{ $card->printing_form_id }}">
                </td>
                @endif

                <?php // Numero de entrada con numero de consolidado ?>
                <td>
                    <label for="{{ $checkbox_id }}" class="d-block">{{ $entrada->numero }}</label>
                    @if( $card->has_consolidado )
                    <small class="text-muted">{{ $card->consolidado->numero }}</small>

                    @else
                        @if( isset($entrada->consolidado->id) )
                        <a href="{{ route('consolidados.show', $entrada->consolidado) }}">{{ $entrada->consolidado->numero }}</a>

                        @else
                        <small class="text-muted">SIN CONSOLIDAR</small>

                        @endif
                    @endif
                </td>

                <?php // Destinatario domicilio/ocurre con localidad ?>
                <td>
                    <p class="m-0">{{ $entrada->destinatario->direccion ?? 'Sin dirección' }}</p>
                    <small class="text-muted">{{ $entrada->destinatario->localidad ?? 'Sin localidad' }}</small></p>
                </td>

                <?php // Alias del cliente ?>
                <td>
                    <p class="m-0">{{ $entrada->cliente->alias }}</p>
                </td>

                <td class="text-end" style="width:1%">
                    <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-sm btn-primary">{!! $icons->eye !!}</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
