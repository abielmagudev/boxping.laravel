@extends('app')
@section('content')

@include('@.partials.page-header', [
    'subtitle' => 'Sin consolidado',
    'title' => 'Nueva entrada',
])

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('entradas.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="mb-1">
            <label for="selectCliente" class="form-label small">Cliente</label>
            <select name="cliente" id="selectCliente" class="form-select" required>
                <option disabled selected></option>
                @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ toggleSelected($cliente->id, old('cliente', $entrada->cliente_id)) }}>{{ $cliente->nombre }} ({{ $cliente->alias }})</option>
                @endforeach
            </select>
        </div>
        @include('entradas._save.bundle')
        <br>
        
        <div class="">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-success dropdown-toggle" id="dropdownMenuButtonSave" data-bs-toggle="dropdown" aria-expanded="false">
                    <span>Guardar entrada</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonSave">
                    <li>
                        <span class="dropdown-header">Posteriormente</span>
                    </li>
                    <li>
                        <button type="submit" class="dropdown-item" name="siguiente" value="crear">Agregar nueva entrada</button>
                    </li>
                    <li>
                        <button type="submit" class="dropdown-item" name="siguiente" value="crear">Crear nueva entrada</button>
                    </li>
                    <li>
                        <button type="submit" class="dropdown-item" name="siguiente" value="terminar">Finalizar</button>
                    </li>
                </ul>
            </div>
            <a href="{{ route('entradas.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
    @endslot
@endcomponent

@endsection
