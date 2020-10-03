@extends('app')
@section('content')
<div class="row">
    <div class="col-sm">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <span>Etapa</span>
                <span>
                    <a href="{{ route('etapas.edit', $etapa) }}" class="btn btn-warning btn-sm">e</a>
                </span>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td class="small text-muted">Nombre</td>
                            <td>{{ $etapa->nombre }}</td>
                        </tr>
                        <tr>
                            <td class="small text-muted">Descripción</td>
                            <td>{{ $etapa->descripcion }}</td>
                        </tr>
                        <tr>
                            <td class="small text-muted">Realizar medición</td>
                            <td>{{ $etapa->realizar_medicion ? 'Si' : 'No' }}</td>
                        </tr>
                        <tr>
                            <td class="small text-muted">Peso en</td>
                            <td>{{ ucfirst($etapa->peso_en) }}</td>
                        </tr>
                        <tr>
                            <td class="small text-muted text-nowrap">Volúmen en</td>
                            <td>{{ ucfirst($etapa->volumen_en) }}</td>
                        </tr>
                        <tr>
                            <td class="small text-muted">Actualizado</td>
                            <td>
                                <span>{{ $etapa->updater->name }}</span>
                                <br>
                                <span>{{ $etapa->updated_at }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div>
                    <span>Zonas</span>
                    <span class="badge badge-primary">{{ $etapa->zonas->count() }}</span>
                </div>
                <div>
                    <a href="{{ route('zonas.create', $etapa) }}" class="btn btn-primary btn-sm">
                        <b>+</b>
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                @if( $etapa->zonas->count() )
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="small">
                                <th>Nombre</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($etapa->zonas->sortByDesc('id') as $zona)
                            <tr>
                                <td>{{ $zona->nombre }}</td>
                                <td class="text-right">
                                    <a href="{{ route('zonas.edit', [$etapa, $zona]) }}" class="btn btn-warning btn-sm">e</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @else
                <br>
                <p class="text-center text-muted">Sin zonas</p>

                @endif
            </div>
        </div>
    </div>
</div>
@endsection