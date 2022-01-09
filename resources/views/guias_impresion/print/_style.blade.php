<style type="text/css"> 
* {
    -webkit-print-color-adjust: exact;
    print-color-adjust: exact;
}
@page {
    size: <?= $guia->medidas_pagina ?>; /* A4, Letter... */
    margin: <?= $guia->margenes_pagina ?>;
    font-family: <?= $guia->nombre_fuente ?>;
    font-size: <?= $guia->medidas_fuente ?>;
    /* font-size: calc($guia->tamano_fuente - 7%); */
}
.break-before {
    page-break-before: always;
}
</style>
