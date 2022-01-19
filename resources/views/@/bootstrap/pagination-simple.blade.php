<?php

$settings = [
    'size'  => $size ?? false,
    'align' => $align ?? false,
];

$paginationHandler = new class ($collection, $settings) {

    public $all_sizes = [
        'sm' => 'pagination-sm',
        'lg' => 'pagination-lg',
    ];

    public $all_alignments = [
        'center' => 'justify-content-center',
        'right'  => 'justify-content-end',
    ];

    public $collection;

    public $settings;

    public function __construct(object $collection, array $settings)
    {
        $this->collection = $collection;
        $this->settings = [
            'size' => $this->existsSize( $settings['size'] ?? null ) ? $this->getSize($settings['size']) : '',
            'align' => $this->existsSize( $settings['size'] ?? null ) ? $this->getSize($settings['size']) : '',
        ];
    }

    public function existsSize(string $size)
    {
        return array_key_exists($size, $this->all_sizes);
    }

    public function getSize(string $size)
    {
        return $this->all_sizes[$size];
    }

    public function size()
    {
        return $this->settings['size'];
    }

    public function existsAlign(string $align)
    {
        return array_key_exists($align, $this->all_alignments);
    }

    public function getAlign(string $align)
    {
        return $this->all_alignments[$align];
    }

    public function align()
    {
        return $this->settings['align'];
    }

    public function hasPrev()
    {
        return method_exists($this->collection, 'previousPageUrl') &&! is_null($this->collection->previousPageUrl());
    }

    public function hasNext()
    {
        return method_exists($this->collection, 'nextPageUrl') &&! is_null($this->collection->nextPageUrl());
    }

    public function hasPagination()
    {
        return $this->hasPrev() || $this->hasNext();
    }

    public function prev()
    {
        return $this->collection->previousPageUrl() ?? null;
    } 

    public function next()
    {
        return $this->collection->nextPageUrl() ?? null;
    } 
}

?>

@if( $paginationHandler->hasPagination() ) 
<div id="wrapper-pagination-simple">
    <ul class="pagination <?= $paginationHandler->size() ?> <?= $paginationHandler->align() ?>">
        <li class="page-item <?= ! $paginationHandler->hasPrev() ? 'disabled' : '' ?>">
            <a href="<?= $paginationHandler->prev() ?? '#anterior' ?>" class="page-link">Anterior</a>
        </li>
        <li class="page-item <?= ! $paginationHandler->hasNext() ? 'disabled' : '' ?>">
            <a href="<?= $paginationHandler->next() ?? '#siguiente' ?>" class="page-link">Siguiente</a>
        </li>
    </ul>
</div>
@endif
