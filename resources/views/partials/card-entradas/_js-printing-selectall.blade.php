<script>
    let printingButtonSelect = document.getElementById('<?= $card->button_selectall_id ?>')
    let printingButtonSheets = document.getElementById('<?= $card->button_dropdown_sheets_id ?>')
    let printingList = document.querySelectorAll('[id^="<?= $card->checkbox_prefix_id ?>"]')

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
