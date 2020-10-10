@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="float-right">
            <a href="{{ route('transportadoras.create') }}" class="btn btn-primary btn-sm">
                <b>+</b>
            </a>
        </div>
        <div>
            <span>Transportadora</span>
            <span class="badge badge-primary">{{ $transportadoras->count() }}</span>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="small">
                        <th>Nombre</th>
                        <th>Sitio web</th>
                        <th colspan="2">Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transportadoras as $transportadora)
                    <tr>
                        <td>{{ $transportadora->nombre }}</td>
                        <td>
                            <a href="{{ '//' . $transportadora->web }}" target="_blank">{{ $transportadora->web }}</a>
                        </td>
                        <td>{{ $transportadora->telefono }}</td>
                        <td class="text-right">
                            <a href="{{ route('transportadoras.edit', $transportadora) }}" class="btn btn-warning btn-sm">e</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection