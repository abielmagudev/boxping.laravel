<?php

$settings = (object) [
    'checkbox_prefix' => isset($checkbox_prefix) && is_string($checkbox_prefix) ? $checkbox_prefix : 'checkbox-noid-',
    'checker_id' => isset($checker_id) && is_string($checker_id) ? $checker_id : 'trigger-noid',
];

?>

<script>

const Checker = {
    trigger: document.getElementById("<?= $settings->checker_id ?>"),
    isActive: function () {
        return this.trigger.classList.contains('active');
    },
    activate: function () {
        return this.trigger.classList.add('active');
    },
    desactivate: function () {
        return this.trigger.classList.remove('active');
    },
    toggle: function () {
        return this.trigger.classList.toggle('active');
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

const Checkboxes = {
    all: document.querySelectorAll('[id^="<?= $settings->checkbox_prefix ?>"]'),
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
                    return Checker.activate()

                return Checker.desactivate()
            })
        })
    }
}

Checker.listenClick();
Checkboxes.listenChange();

// element.dataset.selected 
// element.classList.toggle

</script>
