<tbody class="content" id="content-entrada">
    <tr>
        <td class="content__title">Entrada</td>
    </tr>
    
    @if( $guia->haveContenido('entrada', 'numero') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Número:</td>
        <td class="small">{{ $entrada->numero ?? '' }}</td>
    </tr>
    @endif

    @if( $guia->haveContenido('entrada', 'consolidado') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Consolidado:</td>
        <td class="small">{{ $entrada->consolidado->numero ?? '' }}</td>
    </tr>
    @endif

    @if( $guia->haveContenido('entrada', 'cliente') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Cliente:</td>
        <td class="small">{{ $entrada->cliente->nombre ?? '' }}</td>
    </tr>
    @endif

    @if( $guia->haveContenido('entrada', 'contenido') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Contenido:</td>
        <td class="small">{{ $entrada->contenido ?? '' }}</td>
    </tr>
    @endif

    @if( $guia->haveContenido('entrada', 'importado') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Importado:</td>
        <td class="small">
            <span>{{ $entrada->conductor->nombre ?? '' }}</span>
            <span>|</span>
            <span>{{ $entrada->vehiculo->nombre ?? '' }}</span>
            <span>|</span>
            <span>{{ $entrada->importado_horario ?? '' }}</span>
        </td>
    </tr>
    @endif

    @if( $guia->haveContenido('entrada', 'reempacado') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Reempacado:</td>
        <td class="small">
            <span>{{ $entrada->reempacador->nombre ?? '' }}</span>
            <span>|</span>
            <span>{{ $entrada->codigor->nombre ?? '' }}</span>
            <span>|</span>
            <span>{{ $entrada->reempacado_horario ?? '' }}</span>
        </td>
    </tr>
    @endif
</tbody>
