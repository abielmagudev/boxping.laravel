<table>
    @includeWhen($guia->haveContenido('entrada'), 'entradas.print.contents.entrada')
    @includeWhen($guia->haveContenido('destinatario'), 'entradas.print.contents.destinatario')
    @includeWhen($guia->haveContenido('remitente'), 'entradas.print.contents.remitente')
    @includeWhen($guia->haveContenido('salida'), 'entradas.print.contents.salida')
    @includeWhen($guia->haveContenido('etapas'), 'entradas.print.contents.etapas')
</table>
