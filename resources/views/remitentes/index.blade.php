@extends('app')
@section('content')
<div class="card">
    @component('components.card-header-with-link', [
        'tooltip' => 'Nuevo remitente',
        'link' => route('remitentes.create'),
    ])
        @slot('title')
        <span>Remitentes</span>
        <span class="badge badge-primary">{{ $remitentes->total() }}</span>
        @endslot

        @slot('content')
        <b>+</b>
        @endslot
    @endcomponent
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
                        <td class="align-middle">
                            <a href="{{ route('remitentes.show', $remitente) }}">{{ $remitente->nombre }}</a>
                        </td>
                        <td class="align-middle">{{ $remitente->direccion }}</td>
                        <td class="align-middle">{{ $remitente->localidad }}</td>
                        <td class="align-middle">{{ $remitente->telefono }}</td>
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
