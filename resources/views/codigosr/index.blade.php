@extends('app')
@section('content')
<div class="card">
    @component('components.card-header-with-link', [
        'title' => 'Códigos de reempacado',
        'link' => route('codigosr.create'),
        'content' => '+',
        'tooltip' => 'Nuevo código'
    ])
    @endcomponent
    
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="small">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($codigosr as $codigor)
                    <tr>
                        <td>
                            <a href="{{ route('codigosr.show', $codigor) }}">{{ $codigor->nombre }}</a>
                        </td>
                        <td>{{ $codigor->descripcion }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
