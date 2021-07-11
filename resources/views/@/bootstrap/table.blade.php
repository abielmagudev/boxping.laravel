<?php

$settings = (object) [
    'border_color' => isset($border_color) && is_string($border_color) ? "border-{$border_color}" : '',
    'bordered' => isset($bordered) && $bordered === true ? 'table-bordered' : '',
    'borderless' => isset($borderless) && $borderless === true ? 'table-borderless' : '',
    'caption_top' => isset($caption_top) && $caption_top === true ? 'caption-top' : '',
    'caption' => $caption ?? null,
    'classes' => $classes ?? '',
    'color' => isset($color) && is_string($color) ? "table-{$color}" : '',
    'has_caption' => isset($caption) && is_string($caption),
    'has_tbody' => isset($tbody),
    'has_tfoot' => isset($tfoot) && is_array($tfoot),
    'has_thead' => isset($thead) && is_array($thead),
    'hover' => isset($hover) && $hover === false ? '' : 'table-hover',
    'small' => isset($small) && $small === true ? 'table-sm' : '',
    'striped' => isset($striped) && $striped === true ? 'table-striped' : '',
    'tbody' => $tbody ?? null,
    'tfoot_classes' => isset($tfoot_classes) && is_string($tfoot_classes) ? "table-{$tfoot_classes}" : '',
    'tfoot' => $tfoot ?? false,
    'thead_classes' => isset($thead_classes) && is_string($thead_classes) ? "table-{$thead_classes}" : '',
    'thead' => $thead ?? false,
];

?>

<div class="table-responsive">
    <table class="table {{ $settings->bordered }} {{ $settings->border_color }} {{ $settings->borderless }} {{ $settings->color }} {{ $settings->hover }} {{ $settings->small }} {{ $settings->striped }} {{ $settings->caption_top }} {{ $settings->classes }} align-middle">
        @if( $settings->has_thead )    
        <thead class="{{ $settings->thead_classes }}">
            <tr class="">
                @foreach ($settings->thead as $thead)
                <th class="border-0 small">{!! $thead !!}</th>
                @endforeach
            </tr>
        </thead>
        @endif

        @if( $settings->has_tbody )          
        <tbody>
            {!! $settings->tbody !!}
        </tbody>
        @endif
        
        @if( $settings->has_tfoot )          
        <tfoot class="{{ $settings->tfoot_classes }} border-0">
            @foreach ($settings->tfoot as $tfoot)
            <td class="border-0 small fw-bold">{!! $tfoot !!}</td>
            @endforeach
        </tfoot>
        @endif
    </table>
</div>
