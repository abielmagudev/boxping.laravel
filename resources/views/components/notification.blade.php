<?php
$notifications = array(
    'success' => 'alert-success',
    'warning' => 'alert-warning',
    'failure' => 'alert-danger',
    'message' => 'alert-info',
);
?>

@foreach($notifications as $notification => $color)
    @if( session()->has($notification) )
    <div class="alert {{ $color }} alert-dismissible fade show" role="alert">
        <span><?= session($notification) ?></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
@endforeach