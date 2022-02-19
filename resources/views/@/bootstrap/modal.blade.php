<?php

$settings = [
    'animation' => isset($animation) && is_bool($animation) ? $animation : false,
    'backstatic' => isset($backstatic) && is_bool($backstatic) ? $backstatic : false,
    'centered' => isset($centered) && is_bool($centered) ? $centered : false,
    'scrollable' => isset($scrollable) && is_bool($scrollable) ? $scrollable : false,
    'id' => isset($id) && is_string($id) ? $id : null,
    'size' => isset($size) && is_string($size) ? $size : null,
    'fullscreen' => isset($fullscreen) && is_string($fullscreen) ? $fullscreen : null,

    'body' => [
        'classes' => isset($body['classes']) && is_string($body['classes']) ? $body['classes'] : null,
        'content' => isset($body_content) ? $body_content : null,
    ],

    'header' => [
        'button_close' => isset($header['button_close']) && is_bool($header['button_close']) ? $header['button_close'] : true,
        'classes' => isset($header['classes']) && is_string($header['classes']) ? $header['classes'] : null,
        'content' => isset($header_content) ? $header_content : null,
        'title' => isset($header['title']) && is_string($header['title']) ? $header['title'] : null,
    ],

    'footer' => [
        'classes' => isset($footer['classes']) && is_string($footer['classes']) ? $footer['classes'] : null,
        'content' => isset($footer_content) ? $footer_content : null,
        'button_close' => isset($footer['button_close']) && boolval($footer['button_close']) ? [
            'classes' => isset($footer['button_close']['classes']) && is_string($footer['button_close']['classes']) ? $footer['button_close']['classes'] : 'btn btn-secondary',
            'text' => isset($footer['button_close']['text']) && is_string($footer['button_close']['text']) ? $footer['button_close']['text'] : 'Cerrar',
        ] : null,
    ],
];

$modal = new class ($settings)
{
    private $fullscreens = [
        'sm' => 'modal-fullscreen-sm-down', // Below 576px
        'md' => 'modal-fullscreen-md-down', // Below 768px
        'lg' => 'modal-fullscreen-lg-down', // Below 992px
        'xl' => 'modal-fullscreen-xl-down', // Below 1200px
        'xxl' => 'modal-fullscreen-xxl-down', // Below 1400px
        'always' => 'modal-fullscreen',
    ];

    private $sizes = [
        'sm' => 'modal-sm', // Small
        'lg' => 'modal-lg', // Large
        'xl' => 'modal-xl', // Extra large
    ];

    private $settings = [];

    public function __construct(array $settings)
    {
        $this->settings = $settings;
    }

    public function __get(string $name)
    {
        if(! $this->has($name) )
            return;

        return $this->settings[$name];
    }

    public function has(string $setting)
    {
        return isset($this->settings[$setting]);
    }

    public function id(string $postfix = null)
    {
        return isset($postfix) && is_string($postfix) ? $this->id . $postfix : $this->id;
    }

    public function animation()
    {
        return $this->animation ? 'fade' : '';
    }

    public function backstatic()
    {
        return $this->backstatic ? 'data-bs-backdrop="static" data-bs-keyboard="false"' : '';
    }

    public function centered()
    {
        return $this->centered ? 'modal-dialog-centered' : '';
    }

    public function scrollable()
    {
        return $this->scrollable ? 'modal-dialog-scrollable' : '';
    }

    public function fullscreen()
    {
        if(! $this->has('fullscreen') ||! array_key_exists($this->fullscreen, $this->fullscreens) )
            return '';

        return $this->fullscreens[ $this->fullscreen ];
    }

    public function size()
    {
        if(! $this->has('size') )
            return '';

        return array_key_exists($this->size, $this->sizes) ? $this->sizes[ $this->size ] : '';
    }

    public function header(string $key)
    {
        if(! isset( $this->header[$key] ) )
            return '';

        return $this->header[$key];
    }

    public function body(string $key)
    {
        if(! isset( $this->body[$key] ) )
            return '';

        return $this->body[$key];
    }

    public function footer(string $key, string $subkey = null)
    {
        if( isset($subkey, $this->footer[$key][$subkey]) )
            return $this->footer[$key][$subkey];

        if( isset($this->footer[$key]) && is_null($subkey) )
            return $this->footer[$key];

        return '';
    }

    public function hasHeader()
    {
        return $this->header('close') === true ||! empty($this->header('title')) ||! empty($this->header('content'));
    }

    public function hasBody()
    {
        return ! empty($this->body('content'));
    }

    public function hasFooter()
    {
        return $this->footer('button_close') ||! empty($this->footer('content'));
    }
}

?>

@if( $modal->has('id') )
<div class="modal fade" tabindex="-1" aria-hidden="true" id="<?= $modal->id() ?>" aria-labelledby="<?= $modal->id('Label') ?>" <?= $modal->backstatic() ?>>
    <div class="modal-dialog <?= $modal->size() ?> <?= $modal->centered() ?> <?= $modal->scrollable() ?> <?= $modal->fullscreen() ?>">
        <div class="modal-content">
            @if( $modal->hasHeader() )             
            <div class="modal-header border-0 <?= $modal->header('classes') ?>">
                @if( $modal->header('title') )
                <h5 class="modal-title" id="<?= $modal->id('Label') ?>">{!! $modal->header('title') !!}</h5>
                @endif

                {!! $modal->header('content') !!}

                @if( $modal->header('button_close') )
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                @endif
            </div>
            @endif

            @if( $modal->hasBody() )             
            <div class="modal-body <?= $modal->body('classes') ?>">
                {!! $modal->body('content') !!}
            </div>
            @endif
            
            @if( $modal->hasFooter() )
            <div class="modal-footer <?= $modal->footer('classes') ?>">
                {!! $modal->footer('content') !!}

                @if( is_array($modal->footer('button_close')) ) 
                <button type="button" class="<?= $modal->footer('button_close', 'classes') ?>" data-bs-dismiss="modal">{{ $modal->footer('button_close', 'text') }}</button>
                @endif
            </div>
            @endif
        </div>
    </div>
</div>
@endif
