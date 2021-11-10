<style type="text/css"> 

* {
    -webkit-print-color-adjust: exact;
    print-color-adjust: exact;
}
@page {
    margin: <?= $guia->page_margins ?>;
    size: <?= $guia->page_size ?>; 
    /* size: A4; */
    /* orientation: portrait || landscape */
}
.break-before {
    page-break-before: always;
}
.content {
    margin-bottom:0.25rem;
}
.content__text {
    font-family: <?= $guia->font ?>;
    font-size: <?= $guia->font_size ?>;
}
.content__title {
    font-size: calc(<?= $guia->font_size ?> - 7%);
    font-weight: bold;
}

</style>
