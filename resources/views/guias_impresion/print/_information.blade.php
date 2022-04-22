<div class="information">
    @foreach($designer->information($entrada) as $informacion)
    <div>
        <span>{!! $informacion !!}</span>
    </div>
    @endforeach
    
    @if( $designer->hasInformacionAdicional() )
    <br>
    <p class="fw-bold m-0">{{ $designer->informacion_adicional }}</p>
    @endif
</div>
