@extends('app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <span>Destinatarios</span>
            <span class="badge badge-primary">{{ $destinatarios->total() }}</span>
        </div>
        <div>
            <a href="{{ route('destinatarios.create') }}" class="btn btn-primary btn-sm">
                <b>+</b>
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="small">
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th class="text-nowrap">Código postal</th>
                        <th>Localidad</th>
                        <th>Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($destinatarios as $destinatario)
                    <tr>
                        <td class="align-middle">
                            <a href="{{ route('destinatarios.show', $destinatario) }}">{{ $destinatario->nombre }}</a>
                        </td>
                        <td class="align-middle">{{ $destinatario->direccion }}</td>
                        <td class="align-middle">{{ $destinatario->codigo_postal }}</td>
                        <td class="align-middle">{{ $destinatario->localidad }}</td>
                        <td class="align-middle">{{ $destinatario->telefono }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
@component('components.pagination-simple')
    @slot('collection', $destinatarios)
@endcomponent
<br>
@endsection
