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
    <div class="alert <?= $color ?> alert-dismissible fade show" role="alert" id="app-notifications">
        <div id="notification-wrapper-content"><?= session($notification) ?></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
@endforeach
