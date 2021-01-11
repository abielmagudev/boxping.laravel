@extends('app')
@section('content')
<div class="card">
    @component('components.card-header-with-link', [
        'tooltip' => 'Nuevo incidente',
        'link' => route('incidentes.create'),
    ])
        @slot('title')
        <span>Incidentes</span>
        <span class="badge badge-primary">{{ $incidentes->count() }}</span>
        @endslot

        @slot('content')
        <b>+</b>
        @endslot
    @endcomponent
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="small">
                    <tr>
                        <th>Título</th>
                        <th colspan="2">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($incidentes as $incidente)
                    <tr>
                        <td class="text-nowrap align-middle">
                            <a href="{{ route('incidentes.show', $incidente) }}">{{ $incidente->titulo }}</a>
                        </td>
                        <td class="align-middle">{{ $incidente->descripcion }}</td>
                        <td class="align-middle text-right">
                            <a href="{{ route('incidentes.edit', $incidente) }}" class="btn btn-warning btn-sm">
                                <b>e</b>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
