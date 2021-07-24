@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'title' => 'Usuarios',
    'counter' => $users->count(),
])
    @slot('options')
    <a href="{{ route('usuarios.create') }}" class="btn btn-sm btn-primary">
        <span class="d-block d-md-none fw-bold">+</span>
        <span class="d-none d-md-block">Nuevo usuario</span>
    </a>
    @endslot
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    @component('@.bootstrap.table')
        @slot('thead', [
            'Nombre',
            'Email',
        ])

        @slot('tbody')
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="text-end">
                    <a href="{{ route('usuarios.show', $user) }}" class="btn btn-sm btn-outline-primary">s</a>
                    <a href="{{ route('usuarios.edit', $user) }}" class="btn btn-sm btn-outline-warning">e</a>
                </td>
            </tr>
        @endforeach
        @endslot
    @endcomponent
    @endslot
@endcomponent

@endsection
