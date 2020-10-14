@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="float-right">
            <a href="{{ route('alertas.create') }}" class="btn btn-primary btn-sm">
                <b>+</b>
            </a>
        </div>
        <div>
            <span>Alertas</span>
            <span class="badge badge-primary">{{ $alertas->count() }}</span>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="small">
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th colspan="2">Nivel</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alertas as $alerta)
                    <tr>
                        <td>{{ $alerta->nombre }}</td>
                        <td>{{ $alerta->descripcion }}</td>
                        <td>{{ ucfirst($alerta->nivel) }}</td>
                        <td class="text-right">
                            <a href="{{ route('alertas.edit', $alerta) }}" class="btn btn-warning btn-sm">e</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
