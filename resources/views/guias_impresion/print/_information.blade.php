<div class="information">
    @foreach($page->allInformation($entrada) as $informacion)
    <div>{!! $informacion !!}</div>
    @endforeach
</div>
