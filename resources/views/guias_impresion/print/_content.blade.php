<div class="content">
    @foreach($guia->obtenerContenidos($entrada) as $contenido)
    <div>{!! $contenido !!}</div>
    @endforeach
</div>
