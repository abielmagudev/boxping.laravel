@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Configuración'    
])
    <form action="{{ route('configuraciones.update', $configuracion) }}" method="post">
        @csrf
        @method('put')
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="cliente_alias_numero" value="1" id="checkbox-cliente-alias-numero" onchange="submit()" {{ toggleChecked(1, $configuracion->cliente_alias_numero) }}>
            <label class="form-check-label" for="checkbox-cliente-alias-numero">Iniciar el número de entrada con el alias del cliente para impresión.</label>
        </div>
    </form>
@endcomponent

@endsection
