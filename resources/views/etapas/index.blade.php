@extends('app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <span>Etapas</span>
            <span class="badge badge-primary">{{ $etapas->count() }}</span>
        </div>
        <div>
            <a href="{{ route('etapas.create') }}" class="btn btn-primary btn-sm">Nueva etapa</a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="small">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th colspan="2">Medición</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($etapas as $etapa)
                    <tr>
                        <td>
                            <a href="{{ route('etapas.show', $etapa) }}">{{ $etapa->nombre }}</a>
                        </td>
                        <td>{{ $etapa->descripcion }}</td>
                        <td>{{ $etapa->realizar_medicion ? 'Si' : 'No' }}</td>
                    </tr>
                    @endforeach
                </tbody>   
            </table>
        </div>
    </div>
</div>
@endsection
