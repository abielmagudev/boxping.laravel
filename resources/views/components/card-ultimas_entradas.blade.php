<?php

$settings = (object) array(
    'entradas' => $entradas,
    'take' => isset($take) && is_int($take) ? $take : 10,
);

$ultimas_entradas = $entradas->take( $settings->take );

?>

<div class="card">
    <div class="card-header">
        <span class="badge badge-primary align-middle">{{ $settings->take }}</span>
        <span class="align-middle">Últimas entradas</span>
    </div>
    <div class="card-body p-0">
        @if( $entradas->count() )
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="small">
                    <tr>
                        <th>Número</th>
                        <th>Destinatario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ultimas_entradas as $entrada)
                    <tr>
                        <td class="align-middle">
                            <a href="{{ route('entradas.show', $entrada) }}">{{ $entrada->numero }}</a>
                        </td>
                        <td class="align-middle">
                            @if( $entrada->destinatario )
                            <span>{{ $entrada->destinatario->direccion ?? '' }}</span>
                            <br>
                            <span>{{ $entrada->destinatario->localidad }}</span>

                            @else
                            <small class="text-muted">PENDIENTE</small>

                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @else
        <br>
        <p class="text-center text-muted">
            <small>SIN ENTRADAS</small>
        </p>

        @endif
    </div>
</div>
