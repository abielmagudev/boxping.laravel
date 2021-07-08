<?php

$counter = $actualizaciones->count();

?>
<div class="tab-pane fade overflow-auto h-100" id="actualizaciones" role="tabpanel" aria-labelledby="actualizaciones-tab">
    <div class="table-responsive">
        <table class="table table-striped table-hover table-sm small">
            <tbody>
                @foreach($actualizaciones as $actualizacion)
                <tr>
                    <td class="text-muted">{{ $counter-- }}</td>
                    <td>
                        <div class="fst-italic mb-2">{{ $actualizacion->updater->name ?? 'Guest' }} {{ $actualizacion->descripcion }}</></div>
                        <div class="text-muted text-end">{{ $actualizacion->created_at }}</div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
