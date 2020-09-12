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
                    <a href="{{ route('consolidados.create') }}" class="btn btn-primary btn-sm">Nuevo</a>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-container">
                <table class="table table-hover">
                    <thead class="small">
                        <tr>
                            <th class="border-0">Número</th>
                            <th class="border-0">Cliente</th>
                            <th class="border-0">Tarimas</th>
                            <th class="border-0">Entradas</th>
                            <th class="border-0">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($consolidados as $consolidado)
                        <tr>
                            <td>
                                <a href="{{ route('consolidados.show', $consolidado) }}">{{ $consolidado->numero }}</a>
                            </td>
                            <td>
                                <span>{{ $consolidado->cliente->nombre }}</span>
                            </td>
                            <td>
                                <span>{{ $consolidado->tarimas }}</span>
                            </td>
                            <td>
                                <span>{{ $consolidado->entradas->count() }}</span>
                            </td>
                            <td style="width:1%">
                                @include('consolidados.includes.badge-abierto')
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
