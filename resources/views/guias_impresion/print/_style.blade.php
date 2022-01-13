<style type="text/css"> 
* {
    -webkit-print-color-adjust: exact;
    print-color-adjust: exact;
}
@page {
    size: <?= $page->size() ?>; /* A4, Letter, Legal ... */
    margin: <?= $page->margins() ?>;
}
.information {
    font-family: "<?= $page->fontname() ?>";
    font-size: <?= $page->fontsize() ?>; /* calc($guia->tamano_fuente - ?%); */
}
.break-before {
    page-break-before: always;
}
</style>
