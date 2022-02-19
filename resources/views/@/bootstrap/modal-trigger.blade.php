<?php

$settings = [
    'button' => isset($button) && is_bool($button) ? $button : true,
    'classes' => isset($classes) && is_string($classes) ? $classes : null,
    'dataset' => isset($dataset) && is_array($dataset) ? $dataset : [],
    'modal_id' => isset($modal_id) && is_string($modal_id) ? "#{$modal_id}" : null,
    'text' => isset($slot) ? $slot : (isset($text) ? $text : null),
];

$modal_trigger = new class ($settings)
{
    private $settings = [];

    public function __construct($settings)
    {
        $this->settings = $settings;
    }

    public function __get($name)
    {
        if(! isset($this->settings[$name]) )
            return '';

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

    public function isButton()
    {
        return $this->button === true;
    }
};

?>

@if( $modal_trigger->isButton() )
<button type="button" data-bs-toggle="modal" data-bs-target="<?= $modal_trigger->modal_id ?>" class="<?= $modal_trigger->classes ?>" <?= $modal_trigger->dataset() ?> >{!! $modal_trigger->text !!}</button>

@else
<a href="#!" data-bs-toggle="modal" data-bs-target="<?= $modal_trigger->modal_id ?>" class="<?= $modal_trigger->classes ?>" <?= $modal_trigger->dataset() ?> >{!! $modal_trigger->text !!}</a>

@endif
