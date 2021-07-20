<?php $updates_counter = $actualizaciones->count() ?>
<div class="tab-pane fade" style="max-height:380px;" id="actualizaciones" role="tabpanel" aria-labelledby="actualizaciones-tab">
@if( $actualizaciones->count() )
    @component('@.bootstrap.table', [
        'striped' => true,
        'small' => true,
        'classes' => 'small',
        'thead' => ['#', 'Usuario', 'Descripción', 'Fecha'],
    ])
        @slot('tbody')
        @foreach($actualizaciones as $actualizacion)
        <tr class="align-top">
            <td class=""><small>{{ $updates_counter-- }}</small></td>
            <td class="">{{ $actualizacion->updater->name ?? 'Desconocido' }}</td>
            <td class="" style="max-width:320px">{{ ucfirst($actualizacion->descripcion) }}</td>
            <td class="">{{ $actualizacion->created_at }}</td>
        </tr>
        @endforeach
        @endslot
    @endcomponent

@else
<p class="text-muted text-center">Sin actualizaciones hasta el momento.</p>

@endif
</div>
