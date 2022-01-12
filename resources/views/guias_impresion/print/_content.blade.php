<div class="content">
    @foreach($page->allInformation($entrada) as $informacion)
    <div>{!! $informacion !!}</div>
    @endforeach
</div>
