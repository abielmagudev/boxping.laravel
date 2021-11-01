@component('@.bootstrap.modal')
    @slot('id', 'modalConfirmDelete')
    @slot('body')
    <div class="text-center"> 
        <div class="display-1 text-danger">
            @include('@.bootstrap.icon', ['icon' => 'trash-fill'])
        </div>
        <form action="{{ $route }}" method="post" id="formConfirmDelete">
            @csrf
            @method('delete')
            {!! $content !!}
            <br>
            <button type="submit" class="btn btn-outline-danger">Si, eliminar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </form>
    </div>
    <br>
    @endslot
@endcomponent
