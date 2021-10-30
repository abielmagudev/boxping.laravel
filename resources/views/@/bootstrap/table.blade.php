<?php

$settings = (object) [
    'color' => isset($color) && is_string($color) ? "table-{$color}" : '',
    'caption_top' => isset($caption_top) && $caption_top === true ? 'caption-top' : '',
    'caption' => $caption ?? null,
    'has_caption' => isset($caption) && is_string($caption),
    'has_thead' => isset($thead) && is_array($thead),
    'has_tbody' => $slot->isNotEmpty(),
    'has_tfoot' => isset($tfoot) && is_array($tfoot),
    'thead' => $thead ?? false,
    'tbody' => $slot,
    'tfoot' => $tfoot ?? false,
];

?>

<div class="table-responsive">
    <table class="table table-hover {{ $settings->color }} {{ $settings->caption_top }} align-middle ">
        @if( $settings->has_caption )
        <caption>{{ $settings->caption }}</caption>
        @endif

        @if( $settings->has_thead )    
        <thead>
            <tr>
                @foreach ($settings->thead as $thead)
                <th class="small">{!! $thead !!}</th>
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
        <tfoot>
            @foreach ($settings->tfoot as $tfoot)
            <td class="small">{!! $tfoot !!}</td>
            @endforeach
        </tfoot>
        @endif
    </table>
</div>
