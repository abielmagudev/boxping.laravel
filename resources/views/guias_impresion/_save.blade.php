@csrf
<input type="hidden" name="transportadora" value="{{ $transportadora->id }}">
@include('guias_impresion._save.nombre')
@include('guias_impresion._save.formato')
@include('guias_impresion._save.margenes')
@include('guias_impresion._save.tipografia')
@include('guias_impresion._save.contenido')
