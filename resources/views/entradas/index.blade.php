@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span>Entradas</span>
                <span>{{ $entradas->total() }}</span>
            </div>
            <div>
                <a href="{{ route('entradas.create') }}" class="btn btn-primary btn-sm">Agregar</a>
            </div>
        </div>
    </div>
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