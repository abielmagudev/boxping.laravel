<style type="text/css"> 
* {
    -webkit-print-color-adjust: exact;
    print-color-adjust: exact;
}
@page {
    /* orientation: portrait || landscape */
    /* font-size: calc(<?= $guia->tamano_fuente ?> - 7%); */
    size: <?= $guia->medidas_pagina ?>; /* A4, Letter... */
    margin: <?= $guia->margenes_pagina ?>;
    font-family: <?= $guia->nombre_fuente ?>;
    font-size: <?= $guia->medidas_fuente ?>;
}
.break-before {
    page-break-before: always;
}
</style>
