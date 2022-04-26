@extends('app')
@section('content')
@component('@.bootstrap.card', [
    'title' => 'Editar usuario'
])
    <form action="{{ route('usuarios.update', $user) }}" method="post" autocomplete="off">
        @method('put')
        @include('users._save')
        <br>

        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning" type="submit">Actualizar usuario</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
                @component('@.partials.modal-delete-confirm', [
                    'route' => route('usuarios.destroy', $user),
                ])
                    <div class="text-center">
                        <p class="m-0 lead text-muted">Se eliminará usuario</p>
                        <p class="m-0 lead fw-bold">{{ $user->name }}</p>
                        <p class="m-0 px-5 small text-muted fst-italic">{{ $user->email }}</p>
                    </div>
                @endcomponent
            @endslot
        @endcomponent
    </form>
@endcomponent
@endsection
