<?php

$settings = [
    'id' => isset($id) && is_string($id) ? $id : null,
    'animation' => isset($animation) && is_bool($animation) ? $animation : false,
    'backstatic' => isset($backstatic) && is_bool($backstatic) ? $backstatic : false,
    'centered' => isset($centered) && is_bool($centered) ? $centered : false,
    'fullscreen' => isset($fullscreen) && is_string($fullscreen) ? $fullscreen : null,
    'scrollable' => isset($scrollable) && is_bool($scrollable) ? $scrollable : false,
    'size' => isset($size) && is_string($size) ? $size : null,
    'header' => isset($header) &&! is_array($header) ? $header : null,
    'body' => isset($body) &&! is_array($body) ? $body : null,
    'footer' => isset($footer) &&! is_array($footer) ? $footer : null,
    'header_settings' => [
        'classes' => isset($header_settings['classes']) && is_string($header_settings['classes']) ? $header_settings['classes'] : null,
        'close' => isset($header_settings['close']) && is_bool($header_settings['close']) ? $header_settings['close'] : true,
        'title' => isset($header_settings['title']) && is_string($header_settings['title']) ? $header_settings['title'] : null,
    ],
    'body_settings' => [
        'classes' => isset($body_settings['classes']) && is_string($body_settings['classes']) ? $body_settings['classes'] : null,
    ],
    'footer_settings' => [
        'classes' => isset($footer_settings['classes']) && is_string($footer_settings['classes']) ? $footer_settings['classes'] : null,
        'close' => isset($footer_settings['close']) && (is_bool($footer_settings['close']) || is_array($footer_settings['close'])) ? $footer_settings['close'] : true,
    ],
];

$component = new class ($settings)
{
    const DEFAULT_SETTING_VALUE = null;

    const EMPTY_SETTING_VALUE = '';

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
            return self::DEFAULT_SETTING_VALUE;

        return $this->settings[$name];
    }

    public function has(string $name, string $subname = null)
    {
        if(! is_null($subname) )
            return isset($this->settings[$name][$subname]);

        return isset($this->settings[$name]);
    }

    public function id(string $after_id = null)
    {
        return isset($after_id) && is_string($after_id) ? ($this->id . $after_id) : $this->id;
    }

    public function animation()
    {
        return $this->animation ? 'fade' : self::EMPTY_SETTING_VALUE;
    }

    public function backstatic()
    {
        return $this->backstatic ? 'data-bs-backdrop="static" data-bs-keyboard="false"' : self::EMPTY_SETTING_VALUE;
    }

    public function centered()
    {
        return $this->centered ? 'modal-dialog-centered' : self::EMPTY_SETTING_VALUE;
    }

    public function scrollable()
    {
        return $this->scrollable ? 'modal-dialog-scrollable' : self::EMPTY_SETTING_VALUE;
    }

    public function fullscreen()
    {
        if(! $this->has('fullscreen') ||! array_key_exists($this->fullscreen, $this->fullscreens) )
            return self::EMPTY_SETTING_VALUE;

        return $this->fullscreens[ $this->fullscreen ];
    }

    public function size()
    {
        if(! $this->has('size') ||! array_key_exists($this->size, $this->sizes))
            return self::EMPTY_SETTING_VALUE;

        return $this->sizes[ $this->size ];
    }

    public function header(string $setting = null)
    {
        if( is_null($setting) )
            return $this->header;
        
        return $this->has('header_settings', $setting) 
                ? $this->header_settings[$setting] 
                : self::EMPTY_SETTING_VALUE;
    }

    public function body(string $setting = null)
    {
        if( is_null($setting) )
            return $this->body;

        return $this->has('body_settings', $setting) 
                ? $this->body_settings[$setting] 
                : self::EMPTY_SETTING_VALUE;
    }

    public function footer(string $setting = null, string $sub = null)
    {
        if( is_null($setting) )
            return $this->footer;

        if( $this->has('footer_settings', $setting) && is_null($sub) )
            return $this->footer_settings[$setting];
        
        if( $setting === 'close' && $sub === 'classes' )
            return $this->footer_settings['close']['classes'] ?? 'btn btn-secondary';
            
        if( $setting === 'close' && $sub === 'text' )
            return $this->footer_settings['close']['text'] ?? 'Cerrar';

        return $this->footer_settings[$setting][$sub] ?? self::EMPTY_SETTING_VALUE;
    }

    public function hasHeader()
    {
        return ! empty($this->header()) || $this->header_settings['title'] || $this->header_settings['close'];
    }

    public function hasBody()
    {
        return ! empty($this->body());
    }

    public function hasFooter()
    {
        return ! empty($this->footer()) || isset($this->footer_settings['close']);
    }
};

?>

@if( $component->has('id') )
@push('modals')
<div class="modal fade" tabindex="-1" aria-hidden="true" id="<?= $component->id() ?>" aria-labelledby="<?= $component->id('Label') ?>" <?= $component->backstatic() ?>>
    <div class="modal-dialog <?= $component->size() ?> <?= $component->centered() ?> <?= $component->scrollable() ?> <?= $component->fullscreen() ?>">
        <div class="modal-content">
            @if( $component->hasHeader() )             
            <div class="modal-header border-0 <?= $component->header('classes') ?>">
                @if( $component->header('title') )
                <h5 class="modal-title" id="<?= $component->id('Label') ?>">{!! $component->header('title') !!}</h5>
                @endif

                {!! $component->header() !!}

                @if( $component->header('close') )
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                @endif
            </div>
            @endif

            @if( $component->hasBody() )             
            <div class="modal-body <?= $component->body('classes') ?>">
                {!! $component->body() !!}
            </div>
            @endif
            
            @if( $component->hasFooter() )
            <div class="modal-footer border-0 bg-light <?= $component->footer('classes') ?>">
                {!! $component->footer() !!}

                @if( $component->footer('close') ) 
                <button type="button" class="<?= $component->footer('close', 'classes') ?>" data-bs-dismiss="modal">{{ $component->footer('close', 'text') }}</button>
                @endif
            </div>
            @endif
        </div>
    </div>
</div>
@endpush
@endif
