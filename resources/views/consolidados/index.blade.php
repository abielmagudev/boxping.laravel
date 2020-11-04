@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span>Consolidados</span>
                <span class="badge badge-primary">{{ $consolidados->count() }}</span>
            </div>
            <div>
                <a href="{{ route('consolidados.create') }}" class="btn btn-primary btn-sm">
                    <b>+</b>
                </a>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-container">
            <table class="table table-hover">
                <thead class="small">
                    <tr>
                        <th class="border-0">Status</th>
                        <th class="border-0">Número</th>
                        <th class="border-0">Cliente</th>
                        <th class="border-0">Tarimas</th>
                        <th class="border-0">Entradas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consolidados as $consolidado)
                    <tr>
                        <td class="align-middle text-center" style="width:1%">
                            <?php $status = $consolidado->abierto ? 'abierto' : 'cerrado' ?>
                            @component('components.tooltip-shape')
                                @slot('title', ucfirst($status))
                                @slot('shape', 'circle')
                                @slot('color', $config_consolidados['colores'][$status])
                            @endcomponent
                        </td>
                        <td class="align-middle">
                            <a href="{{ route('consolidados.show', $consolidado) }}">{{ $consolidado->numero }}</a>
                        </td>
                        <td class="align-middle">
                            <span>{{ $consolidado->cliente->nombre }}</span>
                        </td>
                        <td class="align-middle">
                            <span>{{ $consolidado->tarimas }}</span>
                        </td>
                        <td class="align-middle">
                            <span>{{ $consolidado->entradas->count() }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
@component('components.pagination-simple')
    @slot('collection', $consolidados)
@endcomponent
<br>
@endsection
