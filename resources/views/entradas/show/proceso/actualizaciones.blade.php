<?php

$counter = $actualizaciones->count();

?>
<div class="tab-pane fade" style="max-height:380px;" id="actualizaciones" role="tabpanel" aria-labelledby="actualizaciones-tab">
        @component('@.bootstrap.table', [
            'striped' => true,
            'small' => true,
            'classes' => 'small',
            'thead' => ['No.','Descripción', 'Fecha'],
        ])
            @slot('tbody')
            @foreach($actualizaciones as $actualizacion)
            <tr class="align-top">
                <td class="text-muted">{{ $counter-- }}</td>
                <td class="fst-italic">{{ $actualizacion->updater->name ?? 'Guest' }} {{ $actualizacion->descripcion }}</td>
                <td class="">{{ $actualizacion->created_at }}</td>
            </tr>
            @endforeach
            @endslot
        @endcomponent
</div>
