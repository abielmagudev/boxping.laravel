@extends('app')
@section('content')
<div class="card">
    @component('components.card-header-with-link', [
        'tooltip' => 'Nuevo transportadora',
        'link' => route('transportadoras.create'),
    ])
        @slot('title')
        <span>Transportadoras</span>
        <span class="badge badge-primary">{{ $transportadoras->count() }}</span>
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
