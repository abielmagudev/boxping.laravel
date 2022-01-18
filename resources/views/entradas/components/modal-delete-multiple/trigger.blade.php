@include('@.bootstrap.modal-trigger', [
    'classes' => 'dropdown-item',
    'modal_id' => 'modalDeleteMultiple',
    'data' => ['id' => 'buttonModalDeleteMultiple'],
    'text' => "<span>{$graffiti->design('trash')->svg()}</span><span class='align-middle ms-1'>Eliminar</span>",
])    
