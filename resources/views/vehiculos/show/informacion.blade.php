<div class="card">
    @component('components.card-header-with-link', [
        'title' => 'Vehículo',
        'link'  => route('vehiculos.edit', $vehiculo),
        'color' => 'warning',
        'tooltip' => 'Editar'
    ])
        @slot('content')
        <b>e</b>
        @endslot
    @endcomponent
    <div class="card-body">
        <p>
            <span>{{ $vehiculo->alias }}</span>
            <br>
            <small class="text-muted">Alias</small>
        </p>
        <p>
            <span>{{ $vehiculo->descripcion }}</span>
            <br>
            <small class="text-muted">Descripción</small>
        </p>
        <p>
            <span>{{ $vehiculo->creator->name }}</span>
            <br>
            <span>{{ $vehiculo->created_at }}</span>
            <br>
            <small class="text-muted">Creado</small>
        </p>
        <p>
            <span>{{ $vehiculo->updater->name }}</span>
            <br>
            <span>{{ $vehiculo->updated_at }}</span>
            <br>
            <small class="text-muted">Actualizado</small>
        </p>
    </div>
</div>
<br>

<div class="card">
    <div class="card-body text-center">
        <p class="small m-0">ENTRADAS</p>
        <p class="display-4 m-0">{{ $entradas->count() }}</p>
    </div>
</div>
<br>

<div class="card">
    <div class="card-body">
        <table class="table table-borderless table-sm small m-0">
            <thead>
                <tr>
                    <th>Conductor</th>
                    <th>Entradas</th>
                </tr>
            </thead>
            <tbody>
                @foreach($conductores as $id => $conductor)
                <tr>
                    <td>{{ $conductor['nombre'] }}</td>
                    <td>{{ $conductor['cruces'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
