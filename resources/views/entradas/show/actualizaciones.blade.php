@component('@.bootstrap.card', [
    'title' => 'Actualizaciones',
    'counter' =>  $entrada->actualizaciones->count(),
])
    @if( $entrada->hasActualizaciones() )
        @component('@.bootstrap.table', [
            'striped' => true,
            'thead' => ['#', 'Usuario', 'Descripción', 'Fecha'],
        ])
            @foreach($entrada->actualizaciones as $number => $actualizacion)
            <tr>
                <td class=""><small>{{ ($entrada->actualizaciones->count() - $number) }}</small></td>
                <td class="text-nowrap">{{ $actualizacion->updater->name ?? 'Desconocido' }}</td>
                <td style="max-width:320px">{{ ucfirst($actualizacion->descripcion) }}</td>
                <td class="text-nowrap">{{ $actualizacion->fecha_hora_creado }}</td>
            </tr>
            @endforeach
        @endcomponent

    @else
    <p class="text-muted text-center">Sin actualizaciones hasta el momento.</p>

    @endif
@endcomponent
<br>
