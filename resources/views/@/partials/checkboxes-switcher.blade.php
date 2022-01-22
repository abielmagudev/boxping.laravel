<?php

if(! isset($switcher) ) $switcher = 'button';

$checkboxesSwitcherHandler = new class ($checkboxes_name, $switcher) {
    
    public $settings = [
        'id' => 'is-checkboxes-switcher',
        'switchers' => ['button','checkbox','switch'],
        'titles' => ['activate' => 'Activar todos', 'desactivate' => 'Desactivar todos'],
    ];

    public $checkboxes_name;

    public $switcher;

    public function __construct(string $checkboxes_name, string $switcher)
    {
        $this->checkboxes_name = $checkboxes_name;
        $this->switcher = $this->exists($switcher) ? $switcher : $this->get('switchers')[0];
    }

    public function get(string $key)
    {
        return ! isset($this->settings[$key]) ?: $this->settings[$key];
    }

    public function exists(string $switcher)
    {
        return in_array($switcher, $this->get('switchers'));
    }

    public function is(string $switcher)
    {
        return $this->switcher === $switcher;
    }

    public function title(string $state)
    {
        return ! isset($this->get('titles')[$state]) ?: $this->get('titles')[$state];
    }

    public function checkboxesName()
    {
        return $this->checkboxes_name;
    }
}

?>

<span data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $checkboxesSwitcherHandler->title('activate') ?>">
    @if( $checkboxesSwitcherHandler->is('button') ) 
    <button class="btn btn-sm btn-outline-primary <?= $checkboxesSwitcherHandler->get('id') ?>" type="button">
        {!! $graffiti->design('ui-checks')->svg() !!}
    </button>
    @endif

    @if( $checkboxesSwitcherHandler->is('checkbox') ) 
    <div class="form-check">
        <input class="form-check-input <?= $checkboxesSwitcherHandler->get('id') ?>" type="checkbox" id="inlineCheckboxSwitcher">
    </div>
    @endif

    @if( $checkboxesSwitcherHandler->is('switch') ) 
    <div class="form-check form-switch">
        <input class="form-check-input <?= $checkboxesSwitcherHandler->get('id') ?>" type="checkbox" id="flexSwitchCheckDefaultSwitcher">
    </div>
    @endif
</span>

@push('scripts')
<script>

// CHECKBOXES SWITCHER - BEGIN
const Checkboxes = {
    all: document.querySelectorAll("input[type=checkbox][name='<?= $checkboxesSwitcherHandler->checkboxesName() ?>']"),
    allChecked: function () {
        return this.all.forEach(item => item.checked = true); // element.dataset.selected 
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

        return this.all.forEach( function (checkbox) { 
            checkbox.addEventListener('change', function (e) {
                e.stopPropagation;

                if( self.hasAllChecked() )
                    return theSwitcher.activate()

                return theSwitcher.desactivate()
            })
        })
    }
}

const theSwitcher = {
    triggers: document.querySelectorAll('.<?= $checkboxesSwitcherHandler->get('id') ?>'),
    trigger: null,
    isActive: function () {
        return this.trigger.classList.contains('active')
    },
    activate: function () {
        this.trigger.checked = true
        this.trigger.classList.add('active')
        this.toggleParentTitle()
    },
    desactivate: function () {
        this.trigger.checked = false
        this.trigger.classList.remove('active')
        this.toggleParentTitle()
    },
    toggleStatus: function () {
        this.trigger.classList.toggle('active')
        this.trigger.blur()
        this.toggleParentTitle()
        // document.activeElement.blur()
    },
    toggleParentTitle: function () 
    {
        let title = this.isActive() 
                    ? "<?= $checkboxesSwitcherHandler->title('desactivate') ?>" 
                    : "<?= $checkboxesSwitcherHandler->title('activate') ?>";

        this.trigger.closest('span[data-bs-toggle=tooltip]')
                    .setAttribute('data-bs-original-title', title)
    },
    stopEvent: function (e) {
        if( e.target.type === 'submit' )
            e.preventDefault()
        
        e.stopPropagation()
    },
    listening: function () {
        let self = this;

        this.triggers.forEach( function (trigger) {
            self.trigger = trigger
            trigger.addEventListener('click', function (e) {
                self.stopEvent(e)
                self.toggleStatus()

                return self.isActive()
                        ? Checkboxes.allChecked()
                        : Checkboxes.allUnchecked();
            })
        })
    },
}

Checkboxes.listenChange();
theSwitcher.listening();
// CHECKBOXES SWITCHER - END

</script>    
@endpush
