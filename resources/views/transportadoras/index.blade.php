@extends('app')
@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <div>
            <span>Transportadoras</span>
            <span class="badge badge-primary">{{ $transportadoras->count() }}</span>
        </div>
        <div class="text-right">
            <a href="{{ route('transportadoras.create') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Nueva transportadora">
                <b>+</b>
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="small">
                    <tr>
                        <th>Nombre</th>
                        <th>Sitio web</th>
                        <th>Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transportadoras as $transportadora)
                    <tr>
                        <td class="align-middle">
                            <a href="{{ route('transportadoras.show', $transportadora) }}">{{ $transportadora->nombre }}</a>
                        </td>
                        <td class="align-middle">
                            <a href="{{ $transportadora->web }}" target="_blank">{{ $transportadora->web }}</a>
                        </td>
                        <td class="align-middle">{{ $transportadora->telefono }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
