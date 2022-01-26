<?php include resource_path('views/entradas/components/index/_entradas_form_config.php') ?>

<form action='<?= $entradas_form_config->action ?>' id='<?= $entradas_form_config->id ?>'></form>

@push('scripts')
<script type="text/javascript">
const formActionButton = {
    all: () => document.querySelectorAll('<?= $entradas_form_config->button_data_action ?>'),
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
    element: document.querySelector('#<?= $entradas_form_config->id ?>'),
    addMethodElement: function (value) {
        let method_element = document.createElement('input')
        method_element.type = 'hidden'
        method_element.name = '_method'
        method_element.value = value
        this.element.appendChild(method_element)
    },
    addTokenElement: function (value) {
        let token_element = document.createElement('input')
        token_element.type = 'hidden'
        token_element.name = '_token'
        token_element.value = value
        this.element.appendChild(token_element)
    },
    setMethod: function (value) {
        this.element.setAttribute('method', value)
    },
    setAction: function (value) {
        this.element.action = value
    },
    setup: function (trigger) {

        this.setAction( trigger.dataset.entradasFormAction )

        if( 'entradasFormMethod' in trigger.dataset )
        {
            this.setMethod('POST')
            this.addMethodElement( trigger.dataset.entradasFormMethod )
            this.addTokenElement( '<?= csrf_token() ?>' )
        }
    },  
    send: function () {
        this.element.submit()
    }
}

formActionButton.listening()

</script>
@endpush
