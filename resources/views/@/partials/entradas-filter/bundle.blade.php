@include('@.partials.entradas-filter.trigger')
@include('@.partials.entradas-filter.modal', [
    'results_route' => $results_route,
    'except' => $except ?? false,
])
