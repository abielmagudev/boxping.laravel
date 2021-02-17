<?php

$table_colors = array(
    'primary'   => 'table-primary',
    'secondary' => 'table-secondary',
    'success'   => 'table-success',
    'danger'    => 'table-danger',
    'warning'   => 'table-warning',
    'info'      => 'table-info',
    'light'     => 'table-light',
    'dark'      => 'table-dark',
);

$table_borders = array(
    'less' => 'table-borderless',
    'full' => 'table-bordered',
);

$table = (object) array(
    'caption'      => isset($caption) && is_string($caption) ? $caption : false,
    'caption_top'  => isset($caption_top) && $caption_top === true ? 'caption-top' : null,
    'classes'      => isset($classes) && is_string($classes) ? $classes : null,
    'border'       => isset($border) && array_key_exists($border, $table_borders) ? $table_borders[ $border ] : null,
    'color'        => isset($color) && array_key_exists($color, $table_colors) ? $table_colors[ $color ] : null,
    'hover'        => isset($hover) && $hover === true ? 'table-hover' : null,
    'small'        => isset($small) && $small === true ? 'table-sm' : null,
    'striped'      => isset($striped) && $striped === true ? 'table-striped' : null,
    'thead'        => isset($thead) && is_array($thead) ? $thead : false,
    'thead_color'  => isset($thead_color) && array_key_exists($thead_color, $table_colors) ? $table_colors[ $thead_color ] : null,
    'tbody'        => isset($tbody) ? $tbody : false,
    'tfoot'        => isset($tfoot) && is_array($tfoot) ? $tfoot : false,
    'tfoot_color'  => isset($tfoot_color) && array_key_exists($tfoot_color, $table_colors) ? $table_colors[ $tfoot_color ] : null,
);

?>

<div class="table-responsive">
    <table class="align-middle table {{ $table->border }} {{ $table->small }} {{ $table->color }} {{ $table->striped }}  {{ $table->hover }}  {{ $table->caption_top }} {{ $table->classes }}">
        @if( ! is_bool($table->caption) )
        <caption>{{ $table->caption }}</caption>
        @endif

        @if( ! is_bool($table->thead) )
        <thead>
            <tr class="{{ $table->thead_color }} small">
                @foreach($table->thead as $title)
                <th class="border-0">{{ $title }}</th>
                @endforeach
            </tr>
        </thead>
        @endif

        @if( ! is_bool($table->tbody) )
        <tbody>
            {{ $table->tbody }}
        </tbody>
        @endif

        @if( ! is_bool($table->tfoot) )
        <tfoot>
            <tr class="{{ $table->tfoot_color }} small">
                @foreach($tfoot as $title)
                <td>{{ $title }}</td>
                @endforeach
            </tr>
        </tfoot>
        @endif
    </table>
</div>
