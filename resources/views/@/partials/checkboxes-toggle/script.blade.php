<script>

let checkboxes_query = '[name^="<?= $checkbox_name ?>"]';
const Checkboxes = {
    all: document.querySelectorAll(checkboxes_query),
    allChecked: function () {
        return this.all.forEach(item => item.checked = true);
    },
    allUnchecked: function () {
        return this.all.forEach(item => item.checked = false);
    },
    total: function () {
        return this.all.length;
    },
    totalChecked: function () {
        return [...this.all].filter(item => item.checked).length;
    },
    totalUnchecked: function () {
        return [...this.all].filter(item => !item.checked).length;
    },
    hasChecked: function () {
        return this.totalChecked > 0;
    },
    hasAllChecked: function () {
        return this.total() === this.totalChecked();
    },
    listenChange: function () {
        let self = this;

        return this.all.forEach( function (checkbox, index) { 
            checkbox.addEventListener('change', function (e) {
                e.stopPropagation;

                if( self.hasAllChecked() )
                    return theToggle.activate()

                return theToggle.desactivate()
            })
        })
    }
}

const theToggle = {
    trigger: document.getElementById('theToggleCheckboxes'),
    isActive: function () {
        return this.trigger.classList.contains('active');
    },
    activate: function () {
        this.trigger.classList.add('active');
        return this.toggleParentTitle();
    },
    desactivate: function () {
        this.trigger.classList.remove('active');
        return this.toggleParentTitle();
    },
    toggle: function () {
        this.trigger.classList.toggle('active');
        return this.toggleParentTitle();
    },
    toggleParentTitle: function () 
    {
        let title = this.isActive() ? 'Deseleccionar todo' : 'Seleccionar todo';

        return this
                .trigger
                .parentNode
                .setAttribute('data-bs-original-title', title);
    },
    listenClick: function () {
        let self = this;

        this.trigger.addEventListener('click', function (e) {
            e.stopPropagation;
            
            self.toggle();

            if( self.isActive() )
                return Checkboxes.allChecked();

            return Checkboxes.allUnchecked();
        })
    }
}

Checkboxes.listenChange();
theToggle.listenClick();

// element.dataset.selected 
// element.classList.toggle

</script>
