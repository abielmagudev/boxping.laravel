@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="float-right">
            <a href="{{ route('observaciones.create') }}" class="btn btn-primary btn-sm">
                <b>+</b>
            </a>
        </div>
        <div>
            <span>Observaciones</span>
            <span class="badge badge-primary">{{ $observaciones->count() }}</span>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="small">
                        <th>Tipo</th>
                        <th>Nombre</th>
                        <th colspan="2">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($observaciones as $observacion)
                    <tr>
                        <td style="width:1%">
                            <span class="badge d-block" style="background-color:{{ $config[$observacion->tipo]['color'] }}">
                                {{ ucfirst($observacion->tipo) }}
                            </span>
                        </td>
                        <td>{{ $observacion->nombre }}</td>
                        <td>{{ $observacion->descripcion }}</td>
                        <td class="text-right">
                            <a href="{{ route('observaciones.edit', $observacion) }}" class="btn btn-warning btn-sm">e</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
