<?php

$settings = [
    'model' => $model ?? null,
    'created' => $created ?? null,
    'updated' => $updated ?? null,
];

$block = new class($settings)
{
    public $icon_name = 'clock-history';
    
    public $title_color = '#B5B5B5';

    public function __construct(array $settings)
    {
        $this->model = $settings['model'] ?? new \stdClass;

        $this->displays = [
            'created' => isset($settings['created']) && is_bool($settings['created']) ? $settings['created'] : true,
            'updated' => isset($settings['updated']) && is_bool($settings['updated']) ? $settings['updated'] : true,
        ];
    }

    public function hasModel()
    {
        return $this->model instanceof \Illuminate\Database\Eloquent\Model;
    }

    public function hasModifiers()
    {
        return $this->model instanceof \App\Ahex\Zowner\Domain\Contracts\ModifierIdentifiable;
    }

    public function hasTimestamps()
    {
        return property_exists($this->model, 'timestamps') && $this->model->timestamps;
    }

    public function hasDisplay(string $display)
    {
        return (bool) $this->displays[$display];
    }

    public function isAvailable()
    {
        return $this->hasModel() && $this->hasModifiers() && $this->hasTimestamps();
    }
    
    public function created(string $format)
    {
        return $this->model->created_at->format($format);
    }

    public function updated(string $format)
    {
        return $this->model->updated_at->format($format);
    }

    public function creator()
    {
        return $this->model->creator->name;
    }

    public function updater()
    {
        return $this->model->updater->name;
    }
}

?>

@if( $block->isAvailable() )
<div class="d-md-flex align-items-center justify-content-evenly text-muted text-uppercase text-center my-3" style="font-size:0.75rem">

    @if( $block->hasDisplay('updated') )      
    <!-- Updated -->
    <div>
        <div class="mb-1" style="color:<?= $block->title_color ?>">
            {!! $graffiti->design( $block->icon_name )->svg() !!}
            <span class="align-middle">Actualizado</span>
        </div>

        @if( $block->hasTimestamps() )
        <div>{{ $block->updated('d M, Y h:i:s a') }}</div> 
        @endif

        @if( $block->hasModifiers() )
        <div>{{ $block->updater() }}</div> 
        @endif
    </div>
    @endif

    <!-- Space in display mobile -->
    <div class="d-block d-md-none my-3"></div>

    @if( $block->hasDisplay('created') )      
    <!-- Created -->
    <div class="">
        <div class="mb-1" style="color:<?= $block->title_color ?>">
            {!! $graffiti->design( $block->icon_name )->svg() !!}
            <span class="align-middle">Creado</span>
        </div>

        @if( $block->hasTimestamps() )
        <div>{{ $block->created('d M, Y h:i:s a') }}</div> 
        @endif

        @if( $block->hasModifiers() )
        <div>{{ $block->creator() }}</div> 
        @endif
    </div>
    @endif

</div>
@endif
