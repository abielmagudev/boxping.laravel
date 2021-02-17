<div class="tab-pane fade show active" id="pills-conductores" role="tabpanel" aria-labelledby="pills-conductores-tab">
    <p class="text-end">
        <a href="{{ route('conductores.create') }}" class="btn btn-sm btn-outline-primary">
            <span class="">Nuevo conductor</span>
        </a>
    </p>

    @component('components.table')
        @slot('hover', true)
        @slot('thead', ['Nombre', ''])
        @slot('tbody')
            @foreach($conductores as $conductor)
            <tr>
                <td>{{ $conductor->nombre }}</td>
                <td class="text-end">
                    <a href="{{ route('conductores.show', $conductor) }}" class="btn btn-sm btn-primary">
                        @component('components.icon', ['icon' => 'eye'])
                        @endcomponent
                    </a>
                    <a href="{{ route('conductores.edit', $conductor) }}" class="btn btn-sm btn-warning">
                        @component('components.icon', ['icon' => 'pencil'])
                        @endcomponent
                    </a>
                </td>
            </tr>
            @endforeach
        @endslot
    @endcomponent
</div>
