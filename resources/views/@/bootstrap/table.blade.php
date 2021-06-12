<?php

$settings = (object) [
    'bordered' => isset($bordered) && $bordered === true ? 'table-bordered' : '',
    'border_color' => isset($border_color) && is_string($border_color) ? "border-{$border_color}" : '',
    'borderless' => isset($borderless) && $borderless === true ? 'table-borderless' : '',
    'color' => isset($color) && is_string($color) ? "table-{$color}" : '',
    'has_tbody' => isset($tbody),
    'has_thead' => isset($thead) && is_array($thead),
    'hover' => isset($hover) && $hover === false ? '' : 'table-hover',
    'small' => isset($small) && $small === true ? 'table-sm' : '',
    'striped' => isset($striped) && $striped === true ? 'table-striped' : '',
    'tbody' => $tbody ?? null,
    'thead' => $thead ?? false,
];

?>

<div class="table-responsive">
    <table class="table {{ $settings->bordered }} {{ $settings->border_color }} {{ $settings->borderless }} {{ $settings->color }} {{ $settings->hover }} {{ $settings->small }} {{ $settings->striped }} align-middle">
        @if( $settings->has_thead )    
        <thead>
            <tr class="">
                @foreach ($settings->thead as $thead)
                <th class="border-0 py-3 small">{{ $thead }}</th>
                @endforeach
            </tr>
        </thead>
        @endif

        @if( $settings->has_tbody )          
        <tbody>
            {!! $tbody !!}
        </tbody>
        @endif
    </table>
</div>
