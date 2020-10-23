@extends('app')
@section('content')
<div class="row">
    <div class="col-sm col-sm-4">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <span>Etapa</span>
                <span>
                    <a href="{{ route('etapas.edit', $etapa) }}" class="btn btn-warning btn-sm">e</a>
                </span>
            </div>
            <div class="card-body">
                <p>
                    <span>{{ $etapa->nombre }}</span>
                    <br>
                    <small class="text-muted">Nombre</small>
                </p>

                <p>
                    <span>{{ $etapa->realiza_medicion ? 'Si' : 'No' }}</span>
                    <br>
                    <small class="text-muted">Realiza medición</small>
                </p>

                <p>
                    <span class="text-capitalize">{{ $etapa->unica_medida_peso ?? 'Opcional' }}</span>
                    <br>
                    <small class="text-muted">Única medida de peso</small>
                </p>

                <p>
                    <span class="text-capitalize">{{ $etapa->unica_medida_volúmen ?? 'Opcional' }}</span>
                    <br>
                    <small class="text-muted">Única medida de volúmen</small>
                </p>

                <p>
                    <span>{{ $etapa->updater->name }}</span>
                    <br>
                    <span>{{ $etapa->updated_at }}</span>
                    <br>
                    <small class="text-muted">Actualización</small>
                </p>
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
                                <th>Descripción</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($etapa->zonas->sortByDesc('id') as $zona)
                            <tr>
                                <td>{{ $zona->nombre }}</td>
                                <td>{{ $zona->descripcion }}</td>
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