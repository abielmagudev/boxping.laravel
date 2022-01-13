<div class="information">
    @foreach($page->allInformation($entrada) as $informacion)
    <div>{!! $informacion !!}</div>
    @endforeach
    @if( $page->hasFinalInformation() )
    <br>
    <div class="">{{ $page->finalInformation() }}</div>
    @endif
</div>
