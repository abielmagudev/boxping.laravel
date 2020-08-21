@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span>Entradas</span>
                <span>{{ $entradas->count() }}</span>
            </div>
            <div>
                <a href="{{ route('entradas.create') }}" class="btn btn-primary btn-sm">Agregar</a>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>
                    @foreach($entradas as $entrada)
                    <tr>
                        <td>
                            <a href="{{ route('entradas.show', $entrada) }}">{{ $entrada->numero }}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection