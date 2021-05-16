<script>
    let printingButtonSelect = document.getElementById('<?= $settings->identifiers->button_select_all ?>')
    let printingButtonSheets = document.getElementById('<?= $settings->identifiers->button_dropdown_sheets ?>')
    let printingList = document.querySelectorAll('[id^="<?= $settings->identifiers->checkbox_prefix_printing ?>"]')

    printingButtonSelect.addEventListener('click', function (e) {
        e.stopPropagation;
        buttonSelectActiveToggle()
        let is_button_active = this.dataset.selected == 1;
        checkboxesTickToggle( is_button_active )
    })

    printingList.forEach( function (checkbox, index) {
        checkbox.addEventListener('change', function (e) {
            let are_all_selected_checkboxes = checkboxesCheckedCount() === printingList.length;
            buttonSelectActiveToggle( are_all_selected_checkboxes )
        })
    })

    function buttonSelectActiveToggle(flag = null)
    {
        if( flag === null )
        {
            printingButtonSelect.dataset.selected = printingButtonSelect.dataset.selected == 0 ? 1 : 0
            return printingButtonSelect.classList.toggle('active')
        }

        if( flag === true )
        {
            printingButtonSelect.classList.add('active')
            return printingButtonSelect.dataset.selected = 1;
        }

        printingButtonSelect.classList.remove('active')
        printingButtonSelect.dataset.selected = 0;
    }

    function checkboxesTickToggle(flag = null)
    {
        if( flag === null )
            return printingList.forEach( item => item.checked = !item.checked )
            
        printingList.forEach( item => item.checked = flag )
    }

    function checkboxesCheckedCount()
    {
        return [...printingList].filter(item => item.checked).length
    }
</script>
