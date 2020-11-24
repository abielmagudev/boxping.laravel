@extends('app')
@section('content')
<div class="card">
    @component('components.card-header-with-link', [
        'tooltip' => 'Nueva entrada',
        'link' => route('vehiculos.create'),
    ])
        @slot('title')
        <span>Entradas</span>
        <span class="badge badge-primary">{{ $entradas->total() }}</span>
        @endslot

        @slot('content')
        <b>+</b>
        @endslot
    @endcomponent
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="small">
                        <th>Número</th>
                        <th>Consolidado</th>
                        <th>Cliente</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($entradas as $entrada)
                    <tr>
                        <td>
                            <a href="{{ route('entradas.show', $entrada) }}">{{ $entrada->numero }}</a>
                        </td>
                        <td>{{ $entrada->consolidado->numero ?? '' }}</td>
                        <td>{{ $entrada->cliente->nombre }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
@component('components.pagination-simple')
    @slot('collection', $entradas)
@endcomponent
<br>
@endsection
