<style type="text/css"> 
* {
    -webkit-print-color-adjust: exact;
    print-color-adjust: exact;
}
@page {
    size: <?= $guia->medidas_pagina ?>; /* A4, Letter, Legal ... */
    margin: <?= $guia->margenes_pagina ?>;
}
.content {
    font-family: "<?= $guia->nombre_fuente ?>";
    font-size: <?= $guia->medidas_fuente ?>; /* calc($guia->tamano_fuente - ?%); */
}
.break-before {
    page-break-before: always;
}
</style>
