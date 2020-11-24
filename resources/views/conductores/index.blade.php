@extends('app')
@section('content')
<div class="card">
    @component('components.card-header-with-link', [
        'link'  => route('conductores.create'),
        'tooltip' => 'Nuevo conductor',
    ])
        @slot('title')
        <span>Conductores</span>
        <span class="badge badge-primary">{{ $conductores->count() }}</span>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($conductores as $conductor)
                    <tr>
                        <td>
                            <a href="{{ route('conductores.show', $conductor) }}">{{ $conductor->nombre }}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
