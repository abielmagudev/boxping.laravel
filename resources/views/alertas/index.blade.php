@extends('app')
@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <div class="align-middle">
            <span>Alertas</span>
            <span class="badge badge-primary">{{ $alertas->count() }}</span>
        </div>
        <div>
            <a href="{{ route('alertas.create') }}" class="btn btn-primary btn-sm">
                <b>+</b>
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="small">
                    <tr>
                        <th>Nivel</th>
                        <th>Nombre</th>
                        <th colspan="2">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alertas as $alerta)
                    <tr>
                        <td class="align-middle text-center" style="width:1%">
                            @component('components.icon-alert')
                                @slot('color', $config[$alerta->nivel]['color'])
                                @slot('nombre', ucfirst($alerta->nivel))
                            @endcomponent
                        </td>
                        <td class="align-middle">{{ $alerta->nombre }}</td>
                        <td class="align-middle">{{ $alerta->descripcion }}</td>
                        <td class="align-middle text-right">
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
