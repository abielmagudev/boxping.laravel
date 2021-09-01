<tbody>
    <tr>
        <td class="content__title">Etapas</td>
    </tr>
    @foreach ($entrada->etapas->sortBy('orden') as $etapa)
    <tr class="content__text align-top">
        <td class="small text-muted text-nowrap" style="width:1%">{{ $etapa->nombre ?? '' }}:</td>
        <td class="small">
        @if( $etapa->entrada_etapa->havePesoOrVolumen() )
            <span>{{ $etapa->entrada_etapa->havePeso() ? $etapa->entrada_etapa->peso_completo : '' }}</span>
            <span>|</span>
            <span>{{ $etapa->entrada_etapa->haveVolumen() ? $etapa->entrada_etapa->volumen_completo : '' }}</span>
        
        @else
            <span class="">Registrado</span>
        
        @endif
        </td>
    </tr>
    @endforeach
</tbody>