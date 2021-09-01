<script>

let buttonsPrinting = document.querySelectorAll('button[form="formEntradasPrinting"]'); 
let formPrinting = document.getElementById('formEntradasPrinting');
let formPrintingAction = formPrinting.action;

buttonsPrinting.forEach( function (item, index) {
    item.addEventListener('click', function (e) {
        formPrinting.action = formPrintingAction + "/" + item.value;
        formPrinting.submit();
    })
});

</script>
