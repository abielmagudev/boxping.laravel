<?php

$settings = [
    'button' => isset($button) && is_bool($button) ? $button : true,
    'classes' => isset($classes) && is_string($classes) ? $classes : '',
    'dataset' => isset($dataset) && is_array($dataset) ? $dataset : [],
    'disabled' => isset($disabled) && is_bool($disabled) ? $disabled : false,
    'modal_id' => isset($modal_id) && is_string($modal_id) ? "#{$modal_id}" : null,
    'text' => isset($text) ? $text : (isset($slot) ? $slot : $modal_id),
];

$component = new class ($settings)
{
    const DEFAULT_SETTING_VALUE = null;

    private $settings = [];

    public function __construct($settings)
    {
        $this->settings = $settings;
    }

    public function __get($name)
    {
        if(! isset($this->settings[$name]) )
            return self::DEFAULT_SETTING_VALUE;

        return $this->settings[$name];
    }

    public function dataset()
    {
        $props = [];

        foreach($this->dataset as $key => $value)
        {
            if(! is_numeric($key) )
                array_push($props, "{$key}=\"{$value}\"") ;
        }

        return implode(' ', $props);
    }

    public function isAvailable()
    {
        return ! $this->disabled;
    }

    public function isButton()
    {
        return $this->button === true;
    }
};

?>

@if( $component->isButton() )
<button type="button" data-bs-toggle="modal" data-bs-target="<?= $component->modal_id ?>" class="<?= $component->classes ?>" <?= $component->dataset() ?> <?= $component->isAvailable() ?: 'disabled' ?>>{!! $component->text !!}</button>

@else
<a href="#!" data-bs-toggle="modal" data-bs-target="<?= $component->modal_id ?>" class="<?= $component->classes ?>" <?= $component->dataset() ?> <?= $component->isAvailable() ?: 'disabled' ?>>{!! $component->text !!}</a>

@endif
