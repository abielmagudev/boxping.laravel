<tbody class="content" id="content-destinatario">
    <tr>
        <td class="content__title">Destinatario</td>
    </tr>
    
    @if( $guia->haveContenido('destinatario', 'nombre') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Nombre:</td>
        <td class="small">{{ $entrada->destinatario->nombre ?? '' }}</td>
    </tr>
    @endif

    @if( $guia->haveContenido('destinatario', 'telefono') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Teléfono:</td>
        <td class="small">{{ $entrada->destinatario->telefono ?? '' }}</td>
    </tr>
    @endif

    @if( $guia->haveContenido('destinatario', 'direccion') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Dirección:</td>
        <td class="small">{{ $entrada->destinatario->direccion ?? '' }} - Postal {{ $entrada->destinatario->postal ?? '' }}</td>
    </tr>
    @endif

    @if( $guia->haveContenido('destinatario', 'localidad') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Localidad:</td>
        <td class="small">{{ $entrada->destinatario->localidad ?? '' }}</td>
    </tr>
    @endif

    @if( $guia->haveContenido('destinatario', 'referencias') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Referencias:</td>
        <td class="small">{{ $entrada->destinatario->referencias ?? '' }}</td>
    </tr>
    @endif

    @if( $guia->haveContenido('destinatario', 'notas') )
    <tr class="content__text align-top">
        <td class="small text-muted" style="width:1%">Notas:</td>
        <td class="small">{{ $entrada->destinatario->notas ?? '' }}</td>
    </tr>
    @endif
</tbody>
