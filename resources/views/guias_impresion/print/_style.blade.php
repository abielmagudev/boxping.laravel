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
    font-family: "<?= $page->fontName() ?>";
    font-size: <?= $page->fontSize() ?>; /* calc(tamano_fuente - ?%); */
    text-align: <?= $page->textAlign() ?>;
}
.break-before {
    page-break-before: always;
}
</style>
