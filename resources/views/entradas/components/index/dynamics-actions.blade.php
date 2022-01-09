<form action="#" method="get" id="<?= $table_settings->checkbox->form_id ?>"></form>
<script type="text/javascript">
const dropdownButtonAction = {
    all: () => document.querySelectorAll('button[data-action]'),
    listening: function () {
        this.all().forEach( function (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault()
                formEntradasHandler.send( button.dataset.action )
            })
        })
    }
}

const formEntradasHandler = {
    form_entradas: document.querySelector('#formEntradasAction'),
    send: function (route_action) {
        this.form_entradas.action = route_action
        this.form_entradas.submit()
    }
}

dropdownButtonAction.listening()
</script>
