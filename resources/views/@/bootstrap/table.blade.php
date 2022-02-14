<?php

$settings = (object) [
    'color' => isset($color) && is_string($color) ? "table-{$color}" : '',
    'caption_top' => isset($caption_top) && $caption_top === true ? 'caption-top' : '',
    'caption' => $caption ?? null,
    'has_caption' => isset($caption) && is_string($caption),
    'has_thead_items' => isset($thead_items) && is_array($thead_items),
    'has_thead' => isset($thead),
    'has_tbody' => $slot->isNotEmpty(),
    'has_tfoot_items' => isset($tfoot_items) && is_array($tfoot_items),
    'has_tfoot' => isset($tfoot),
    'thead_items' => $thead_items ?? false,
    'thead' => $thead ?? false,
    'tbody' => $slot,
    'tfoot_items' => $tfoot_items ?? false,
    'tfoot' => $tfoot ?? false,
];

?>

<div class="table-responsive">
    <table class="table table-hover {{ $settings->color }} {{ $settings->caption_top }} align-middle ">
        @if( $settings->has_caption )
        <caption>{{ $settings->caption }}</caption>
        @endif

        @if( $settings->has_thead || $settings->has_thead_items )    
        <thead>
            @if( $settings->has_thead_items  )
            <tr>
                @foreach ($settings->thead_items as $thead)
                <th class="small">{!! $thead !!}</th>
                @endforeach
            </tr>

            @else
            {!! $settings->thead !!}

            @endif
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
