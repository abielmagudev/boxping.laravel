@csrf
@include('guias_impresion._save.base')
@include('guias_impresion._save.formato')
@include('guias_impresion._save.margenes')
@include('guias_impresion._save.tipografia')
@include('guias_impresion._save.contenido')
@include('guias_impresion._save.texto_final')
@includeWhen($guia->isReal(), 'guias_impresion._save.desactivar')
