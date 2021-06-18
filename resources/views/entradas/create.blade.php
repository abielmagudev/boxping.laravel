@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'title' => 'Nueva entrada'
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('entradas.store') }}" method="post" autocomplete="off">
        @csrf
        @include('entradas.create.' . $template)
        @include('entradas._save')
        <br>
        <div class="dropdown d-inline-block">
            <button type="button" class="btn btn-success dropdown-toggle" id="dropdownMenuButtonSave" data-bs-toggle="dropdown" aria-expanded="false">
                <span>Guardar entrada</span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonSave">
                <li>
                    <div class="dropdown-header">Continua para...</div>
                </li>
                <li>
                    <button type="submit" class="dropdown-item" name="siguiente" value="crear">Crear nueva entrada</button>
                </li>
                <li>
                    <button type="submit" class="dropdown-item" name="siguiente" value="terminar">Finalizar</button>
                </li>
            </ul>
        </div>

        <a href="{{ $goback }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent
<br>

@endsection
