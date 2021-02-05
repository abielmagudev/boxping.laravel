@extends('app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <span>Etapas</span>
            <span class="badge badge-primary">{{ $etapas->count() }}</span>
        </div>
        <div>
            <a href="{{ route('etapas.create') }}" class="btn btn-primary btn-sm">
                <b>+</b>
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="small">
                    <tr>
                        <th>Orden</th>
                        <th>Nombre</th>
                        <th>Realiza medición</th>
                        <th>Única medida de peso</th>
                        <th>Única medida de volúmen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($etapas as $etapa)
                    <tr>
                        <td>{{ $etapa->orden }}</td>
                        <td>
                            <a href="{{ route('etapas.show', $etapa) }}">{{ $etapa->nombre }}</a>
                        </td>
                        <td>{{ $etapa->realiza_medicion ? 'Si' : 'No' }}</td>
                        <td class="text-capitalize {{ $etapa->unica_medida_peso ? '' : 'text-muted' }}">{{ $etapa->unica_medida_peso ?? 'opcional' }}</td>
                        <td class="text-capitalize {{ $etapa->unica_medida_volumen ? '' : 'text-muted' }}">{{ $etapa->unica_medida_volumen ?? 'opcional' }}</td>
                    </tr>
                    @endforeach
                </tbody>   
            </table>
        </div>
    </div>
</div>
@endsection
