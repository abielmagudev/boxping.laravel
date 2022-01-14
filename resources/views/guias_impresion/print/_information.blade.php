<div class="information">
    @foreach($page->allInformation($entrada) as $descripcion => $informacion)
    <div @class(['mb-1' => $page->hasTipoDescripcion('completa')])>
        @if( is_string($descripcion) )
        <span @class(['small', 'text-muted', 'd-block' => $page->hasTipoDescripcion('completa')])>{{ $descripcion }}</span>
        @endif
        <span>{!! $informacion !!}</span>
    </div>
    @endforeach
    
    @if( $page->hasInformacionFinal() )
    <br>
    <p class="fw-bold m-0">{{ $page->informacion_final }}</p>
    @endif
</div>
