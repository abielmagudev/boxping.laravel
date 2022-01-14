<div class="information">
    @foreach($page->allInformation($entrada) as $label => $informacion)
    <div class="">
        @if( is_string($label) )
        <span class="text-muted small">{{ $label }}</span>
        @endif
        <span class="">{!! $informacion !!}</span>
    </div>
    @endforeach
    
    @if( $page->hasInformacionFinal() )
    <br>
    <p class="m-0">{{ $page->informacion_final }}</p>
    @endif
</div>

