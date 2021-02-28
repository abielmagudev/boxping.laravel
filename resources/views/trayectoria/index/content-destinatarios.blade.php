<div class="tab-pane fade show active" id="pills-destinatarios" role="tabpanel" aria-labelledby="pills-destinatarios-tab">
    <p class="text-end">
        <a href="{{ route('destinatarios.create') }}" class="btn btn-sm btn-outline-primary">Nuevo destinatario</a>
    </p>

    @component('components.table')
        @slot('hover', true)
        @slot('thead', ['Nombre','Direccion','Postal','Localidad'])
        @slot('tbody')
        @foreach($destinatarios as $destinatario)
        <tr>
            <td class="text-nowrap">{{ $destinatario->nombre }}</td>
            <td class="text-nowrap">{{ $destinatario->direccion }}</td>
            <td class="text-nowrap">{{ $destinatario->codigo_postal }}</td>
            <td class="text-nowrap">{{ $destinatario->localidad }}</td>
            <td class=" text-nowrap text-end">
                <a href="{{ route('destinatarios.show', $destinatario) }}" class="btn btn-sm btn-primary">
                    @component('components.icon', ['icon' => 'eye'])
                    @endcomponent
                </a>
            </td>
        </tr>
        @endforeach
        @endslot
    @endcomponent
</div>
