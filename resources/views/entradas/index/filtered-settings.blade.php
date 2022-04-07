<div class="alert alert-info small" role="alert">
    <h5 class="alert-heading fw-bold">Filtrado de entradas</h5>
    <p class="">
        <span>Por página:</span>
        <b>{{ $filtered->get('mostrar')->content() }}</b>
    </p>
    <hr>
    
    <div>
        <ul class="list-unstyled mb-0">
        @foreach($filtered->request(['mostrar', 'filtered_token']) as $display)
            <li class="mb-2">
                <span class="small">{{ $display->title() }}</span>
                <span class="d-block fw-bold">{!! $display->content() !!}</span>
            </li>
        @endforeach
        </ul>
    </div>
</div>
