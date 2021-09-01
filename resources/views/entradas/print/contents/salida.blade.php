<tbody>
    <tr>
        <td class="content__title">Salida</td>
    </tr>

    @if( $guia->haveContenido('salida', 'transportadora') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Transportadora:</td>
        <td class="small">{{ $entrada->salida->transportadora->nombre ?? '' }}</td>
    </tr>
    @endif

    @if( $guia->haveContenido('salida', 'rastreo') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Rastreo:</td>
        <td class="small">{{ $entrada->salida->rastreo ?? '' }}</td>
    </tr>
    @endif

    @if( $guia->haveContenido('salida', 'confirmacion') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Confirmación:</td>
        <td class="small">{{ $entrada->salida->confirmacion ?? '' }}</td>
    </tr>
    @endif 

    @if( $guia->haveContenido('salida', 'cobertura') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Cobertura:</td>
        <td class="small">{{ ucfirst($entrada->salida->cobertura) ?? '' }}</td>
    </tr>
    @endif

    @if( $entrada->salida && $entrada->salida->isCoberturaOcurre() )
    @if( $guia->haveContenido('salida', 'direccion') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Dirección:</td>
        <td class="small">{{ $entrada->salida->direccion ?? '' }} - {{ 'Postal ' . $entrada->salida->postal ?? '' }}</td>
    </tr>
    @endif

    @if( $guia->haveContenido('salida', 'localidad') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Localidad:</td>
        <td class="small">{{ $entrada->salida->localidad ?? '' }}</td>
    </tr>
    @endif
    @endif

    @if( $guia->haveContenido('salida', 'notas') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Notas:</td>
        <td class="small">{{ $entrada->salida->notas ?? '' }}</td>
    </tr>
    @endif
</tbody>