@if( $errors->any() )
<div class="alert alert-warning" role="alert">
    <p class="alert-heading lead">Hmm! Algo sucedio...</p>
    <ul>
        @foreach( $errors->all() as $message )
        <li>{{ $message }}</li>
        @endforeach
    </ul>
    <button type="button" class="close d-none" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif