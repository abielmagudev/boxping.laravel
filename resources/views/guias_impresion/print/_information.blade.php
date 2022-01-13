<div class="information">
    @foreach($page->allInformation($entrada) as $label => $informacion)
    <div class="">
        @if( is_string($label) )
        <span class="text-muted small">{{ $label }}</span>
        @endif
        <span class="">{!! $informacion !!}</span>
    </div>
    @endforeach
    
    @if( $page->hasFinalInformation() )
    <br>
    <p class="m-0">{{ $page->finalInformation() }}</p>
    @endif
</div>

