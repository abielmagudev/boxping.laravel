<?php

$settings = (object) [
    'name' => $name,
    'category' => isset($category) && is_string($category) ? strtolower($category) : null,
    'custom' => $slot ?? null,
    'is_hard' => isset($is_hard) && is_bool($is_hard) ? $is_hard: false,
    'is_soft' => isset($is_soft) && is_bool($is_soft) ? $is_soft : true,
    'route' => $route,
];

?>
@component('@.bootstrap.modal', [
    'id' => 'modalConfirmDelete',
])
    <div class="text-center my-4"> 
        <div class="text-danger mb-3">
            @include('@.bootstrap.icon', [
                'icon' => 'exclamation-triangle',
                'square' => 104
            ])
        </div>

        <div class="text-secondary">
            <div class="h2 mb-4">¿Estás seguro?</div>
            <div class="px-4">
                <p>
                    Al eliminar {{ $settings->category }} <em>{{ $settings->name }}</em>
                    <br> no estará disponible para próximas operaciones.
                </p>

                {!! $settings->custom !!}

                @if( $settings->is_hard || $settings->is_soft )
                <p>
                    @if( $settings->is_hard )
                    <small class="text-danger text-uppercase">* Eliminación permanente, no es recuperable</small>

                    @else
                    <small class="fw-bold">(Se mantendrá en las operaciones existentes)</small>

                    @endif
                </p>
                @endif
            </div>
        </div>

        <form action="{{ $settings->route }}" method="post" id="formConfirmDelete">
            @csrf
            @method('delete')
            <br>
            <button type="submit" class="btn btn-danger">Eliminar</button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
        </form>
    </div>
@endcomponent
