<div class="tab-pane fade show active" id="pills-reempacadores" role="tabpanel" aria-labelledby="pills-reempacadores-tab">
    <p class="text-end">
        <a href="{{ route('reempacadores.create') }}" class="btn btn-sm btn-outline-primary">
            <span class="">Nuevo reempacador</span>
        </a>
    </p>

    @component('components.table')
        @slot('hover', true)
        @slot('thead', ['Nombre', ''])
        @slot('tbody')
            @foreach($reempacadores as $reempacador)
            <tr>
                <td>{{ $reempacador->nombre }}</td>
                <td class="text-end">
                    <a href="{{ route('reempacadores.show', $reempacador) }}" class="btn btn-sm btn-primary">
                        @component('components.icon', ['icon' => 'eye'])
                        @endcomponent
                    </a>
                    <a href="{{ route('reempacadores.edit', $reempacador) }}" class="btn btn-sm btn-warning">
                        @component('components.icon', ['icon' => 'pencil'])
                        @endcomponent
                    </a>
                </td>
            </tr>
            @endforeach
        @endslot
    @endcomponent
</div>
