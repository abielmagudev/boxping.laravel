<tbody class="content" id="content-remitente">
    <tr>
        <td class="content__title">Remitente</td>
    </tr>

    @if( $guia->haveContenido('remitente', 'nombre') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Nombre:</td>
        <td class="small">{{ $entrada->remitente->nombre ?? '' }}</td>
    </tr>
    @endif

    @if( $guia->haveContenido('remitente', 'telefono') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Teléfono:</td>
        <td class="small">{{ $entrada->remitente->telefono ?? '' }}</td>
    </tr>
    @endif

    @if( $guia->haveContenido('remitente', 'direccion') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Dirección:</td>
        <td class="small">{{ $entrada->remitente->direccion ?? '' }} - Postal {{ $entrada->remitente->postal ?? '' }}</td>
    </tr>
    @endif

    @if( $guia->haveContenido('remitente', 'localidad') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Localidad:</td>
        <td class="small">{{ $entrada->remitente->localidad ?? '' }}</td>
    </tr>
    @endif

    @if( $guia->haveContenido('remitente', 'notas') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Notas:</td>
        <td class="small">{{ $entrada->remitente->notas ?? '' }}</td>
    </tr>
    @endif
</tbody>
