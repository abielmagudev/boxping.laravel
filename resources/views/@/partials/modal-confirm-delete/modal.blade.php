<?php

$settings = (object) [
    'warning' => isset($warning) && is_bool($warning) ? $warning: false,
];

?>
@component('@.bootstrap.modal', [
    'id' => 'modalConfirmDelete',
])
    <div class="text-center my-4"> 
        <div class="text-danger mb-4">
            @include('@.bootstrap.icon', [
                'icon' => 'exclamation-triangle',
                'square' => 104
            ])
        </div>

        <div class="text-secondary">
            <div class="h3 mb-4">¿Estás seguro?</div>
            <div class="px-4">
                {!! $slot !!}

                @if( $settings->warning )
                <p>
                    <small class="text-danger text-uppercase">* Eliminación permanente, no es recuperable</small>
                </p>
                @endif
            </div>
        </div>

        <form action="{{ $route }}" method="post" id="formConfirmDelete">
            @csrf
            @method('delete')
            <br>
            <button type="submit" class="btn btn-danger">Eliminar</button>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
        </form>
    </div>
@endcomponent
