@include('@.partials.confirm-delete.trigger', [
    'text' => $text,
])

@include('@.partials.confirm-delete.modal', [
    'content' => $content,
    'route' => $route,
])
