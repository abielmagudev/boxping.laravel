<style type="text/css"> 
* {
    -webkit-print-color-adjust: exact;
    print-color-adjust: exact;
}
@page {
    size: <?= $designer->dimensions() ?>; /* A4, Letter, Legal ... */
    margin: <?= $designer->margins() ?>;
}
.information {
    font-family: "<?= $designer->fontName() ?>";
    font-size: <?= $designer->fontSize() ?>; /* calc(tamano_fuente - ?%); */
    text-align: <?= $designer->textAlign() ?>;
}
.break-before {
    page-break-before: always;
}
</style>
