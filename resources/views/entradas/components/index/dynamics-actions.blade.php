<form action="#" id="<?= $table_settings->checkbox->form_id ?>"></form>
<script type="text/javascript">
const dropdownButtonAction = {
    all: () => document.querySelectorAll('button[data-form-entradas-route]'),
    listening: function () {
        this.all().forEach( function (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault()
                formEntradasHandler.setup( this )
                formEntradasHandler.send()
            })
        })
    }
}

const formEntradasHandler = {
    element: document.querySelector('#formEntradasAction'),
    addTokenElement: function (value) {
        let token_element = document.createElement('input')
        token_element.type = 'hidden'
        token_element.name = '_token'
        token_element.value = value
        this.element.appendChild(token_element)
    },
    addMethodElement: function (value) {
        let method_element = document.createElement('input')
        method_element.type = 'hidden'
        method_element.name = '_method'
        method_element.value = value
        this.element.appendChild(method_element)
    },
    setMethod: function (value) {
        this.element.setAttribute('method', value)
    },
    setAction: function (value) {
        this.element.action = value
    },
    setup: function (trigger) {

        this.setAction( trigger.dataset.formEntradasRoute )

        if( 'formEntradasMethod' in trigger.dataset )
        {
            this.setMethod('POST')
            this.addMethodElement( trigger.dataset.formEntradasMethod )
            this.addTokenElement( '<?= csrf_token() ?>' )
        }
    },  
    send: function () {
        this.element.submit()
    }
}

dropdownButtonAction.listening()
</script>
