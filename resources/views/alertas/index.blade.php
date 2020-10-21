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
                        <th>Nivel</th>
                        <th>Nombre</th>
                        <th colspan="2">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alertas as $alerta)
                    <tr>
                        <td style="width:1%">
                            <span class="badge d-block" style="background-color:{{ $config[$alerta->nivel]['color'] }}">
                                {{ ucfirst($alerta->nivel) }}
                            </span>
                        </td>
                        <td>{{ $alerta->nombre }}</td>
                        <td>{{ $alerta->descripcion }}</td>
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
