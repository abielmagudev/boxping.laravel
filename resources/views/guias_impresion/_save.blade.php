@csrf
@include('guias_impresion._save.basico')
@include('guias_impresion._save.formato')
@include('guias_impresion._save.margenes')
@include('guias_impresion._save.tipografia')
@include('guias_impresion._save.informacion')
@include('guias_impresion._save.texto_final')
@includeWhen($guia->isReal(), 'guias_impresion._save.desactivar')
