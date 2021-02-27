<?php 

$modifiers = [
    'creator',
    'updater',
];

$has_concept = isset($concept) && is_object($concept);
$has_only = isset($only) && in_array($only, $modifiers);

$info = (object) array(
    'has_concept' => $has_concept,
    'concept'     => $has_concept ? $concept : false,
    'has_only'    => $has_only,
    'only'        => $has_only ? [$only] : $modifiers,
);

?>

@if( $info->has_concept )
<section class="row rounded my-3 mx-1 p-5" style="background:rgba(0,0,0,0.02)">
    @if( in_array('creator', $info->only) )
    <div class="col-sm text-center text-md-end">
        <small class="d-block text-black-50">Actualizado</small>
        <span class="d-block text-capitalize">{{ $info->concept->updater->name }}</span>
        <span class="">{{ $info->concept->updated_at }}</span>
    </div>
    @endif

    <div class="col-sm d-md-none">
        <hr class="my-4">
    </div>

    @if( in_array('updater', $info->only) )
    <div class="col-sm text-center text-md-start">
        <small class="d-block text-black-50">Creado</small>
        <span class="d-block text-capitalize">{{ $info->concept->creator->name }}</span>
        <span class="">{{ $info->concept->created_at }}</span>
    </div>
    @endif
</section>
<br>
@endif
