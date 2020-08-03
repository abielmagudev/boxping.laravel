<?php 

$settings = (object) array(
    'colors'   => config('system.consolidated.colors'),
    'closed'   => $closed,
    'expanded' => isset($expanded) ? $expanded : false,
);

?>

<span 
    class="badge text-white rounded-pill p-2 {{ $settings->expanded ? 'd-block' : '' }}" 
    style="background-color: {{ $settings->colors[ $settings->closed ] }}">
    {{ $settings->closed ? 'Cerrado' : 'Abierto' }}
</span>
