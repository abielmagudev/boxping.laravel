@extends('app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <span>Remitentes</span>
            <span class="badge badge-primary">{{ $remitentes->total() }}</span>
        </div>
        <div>
            <a href="{{ route('remitentes.create') }}" class="btn btn-primary btn-sm">
                <b>+</b>
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        @if( $remitentes->count() )
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="small">
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Localidad</th>
                        <th>Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($remitentes as $remitente)
                    <tr>
                        <td>
                            <a href="{{ route('remitentes.show', $remitente) }}">{{ $remitente->nombre }}</a>
                        </td>
                        <td>{{ $remitente->direccion }}</td>
                        <td>{{ $remitente->localidad }}</td>
                        <td>{{ $remitente->telefono }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
<br>
@component('components.pagination-simple')
    @slot('collection', $remitentes)
@endcomponent
<br>
@endsection
