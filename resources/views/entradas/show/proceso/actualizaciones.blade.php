<?php

$counter = $actualizaciones->count();

?>
<div class="tab-pane fade" style="max-height:400px" id="actualizaciones" role="tabpanel" aria-labelledby="actualizaciones-tab">
    <div class="table-responsive">
        <table class="table table-striped table-hover table-sm small">
            <tbody>
                @foreach($actualizaciones as $actualizacion)
                <tr>
                    <td class="text-muted">{{ $counter-- }}</td>
                    <td class="fst-italic">{{ $actualizacion->updater->name ?? 'Guest' }} {{ $actualizacion->descripcion }}</td>
                    <td class="">{{ $actualizacion->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
