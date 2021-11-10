<?php $updates_counter = $actualizaciones->count() ?>
@component('@.bootstrap.card', [
    'title' => 'Actualizaciones',
    'counter' =>  $updates_counter,
])
    @if( $actualizaciones->count() )
        @component('@.bootstrap.table', [
            'striped' => true,
            'thead' => ['#', 'Usuario', 'Descripción', 'Fecha'],
        ])
            @foreach($actualizaciones as $actualizacion)
            <tr class="align-top">
                <td class=""><small>{{ $updates_counter-- }}</small></td>
                <td class="">{{ $actualizacion->updater->name ?? 'Desconocido' }}</td>
                <td class="" style="max-width:320px">{{ ucfirst($actualizacion->descripcion) }}</td>
                <td class="">{{ $actualizacion->created_at }}</td>
            </tr>
            @endforeach
        @endcomponent

    @else
    <p class="text-muted text-center">Sin actualizaciones hasta el momento.</p>

    @endif
@endcomponent
<br>
