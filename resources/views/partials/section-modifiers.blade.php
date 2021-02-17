<?php 

$info = (object) array(
    'has_creator' => isset($created_by) || isset($created_at),
    'created_by'  => isset($created_by) ? (string) $created_by : null,
    'created_at'  => isset($created_at) ? (string) $created_at : null,
    'has_updater' => isset($updated_by) || isset($updated_at),
    'updated_by'  => isset($updated_by) ? (string) $updated_by : null,
    'updated_at'  => isset($updated_at) ? (string) $updated_at : null,
);

?>

<section class="row rounded my-3 mx-1 text-black-50 small" style="background:rgba(0,0,0,0.02)">
    @if( $info->has_updater )
    <div class="col-sm p-3">
        <span class="d-block text-capitalize">{{ $info->updated_by }}</span>
        <span class="d-block">{{ $info->updated_at }}</span>
        <small class="text-uppercase">Actualizado</small>
    </div>
    @endif

    @if( $info->has_updater && $info->has_creator )
    <div class="col-sm d-md-none">
        <hr class="my-1">
    </div>
    @endif

    @if( $info->has_creator )
    <div class="col-sm p-3">
        <span class="d-block text-capitalize">{{ $info->created_by }}</span>
        <span class="d-block">{{ $info->created_at }}</span>
        <small class="text-uppercase">Creado</small>
    </div>
    @endif
</section>
