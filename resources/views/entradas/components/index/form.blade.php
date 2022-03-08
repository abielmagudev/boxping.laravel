
<form action='<?= $efc->action ?>' id='<?= $efc->id ?>'></form>

@push('scripts')
<script type="text/javascript">
const entradasFormHandler = {
    element: document.getElementById('<?= $efc->id ?>'),
    append: function (type, name, value) {
        let input = document.createElement('input')
        input.type = type
        input.name = name
        input.value = value
        this.element.appendChild(input)
    },
    set: function (attr, value) {
        this.element.setAttribute(attr, value)
    },
    setup: function (trigger) {
        console.log(trigger)
        this.set('action', trigger.dataset.entradasFormAction)

        if( 'entradasFormVerb' in trigger.dataset )
        {
            this.set('method', 'post')
            this.append('hidden', '_method', trigger.dataset.entradasFormVerb)
            this.append('hidden', '_token', '<?= csrf_token() ?>' )
        }
    },
    send: function () { 
        this.element.submit()
    },
    triggers: () => document.querySelectorAll('button[data-entradas-form-action]'),
    listening: function () {
        let self = this

        self.triggers().forEach( function (trigger) {
            trigger.addEventListener('click', function (e) {
                e.preventDefault()
                self.setup(this)
                self.send()
            })
        })
    },
}
entradasFormHandler.listening()

const formEntradasCounter = {
    shows: document.querySelectorAll('.show-count-checked-entradas'),
    triggers: document.querySelectorAll('.trigger-count-checked-entradas'),
    allCheckedEntradas: function () {
        return document.querySelectorAll('input[type=checkbox][id^=<?= $efc->checkbox->prefix ?>]:checked');
    },
    countCheckedEntradas: function () {
        return this.allCheckedEntradas().length
    },
    hasCheckedEntradas: function () {
        return this.countCheckedEntradas() > 0
    },
    show: function () {
        this.shows.forEach( show => {
            show.innerText = this.countCheckedEntradas()
        })
    },
    listening: function () {
        let self = this;

        this.triggers.forEach( trigger => {
            trigger.addEventListener('click', () => self.show())
        })
    }
}
formEntradasCounter.listening()

</script>
@endpush
