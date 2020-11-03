@if( $errors->any() )
<div class="alert alert-warning" role="alert">
    <p class="alert-heading">Revisa lo siguiente:</p>
    <ul class="m-0">
        @foreach( $errors->all() as $message )
        <li>{{ $message }}</li>
        @endforeach
    </ul>
    <button type="button" class="close d-none" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif