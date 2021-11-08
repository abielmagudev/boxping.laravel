@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Usuarios',
    'counter' => $users->count(),
])
    @slot('options')
    <a href="{{ route('usuarios.create') }}" class="btn btn-sm btn-primary">
        <span class="fw-bold">+</span>
    </a>
    @endslot
    @component('@.bootstrap.table', [
        'thead' =>  ['Nombre','Email'] 
    ])
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td class="text-end">
                <a href="{{ route('usuarios.show', $user) }}" class="btn btn-sm btn-outline-primary">
                    @include('@.bootstrap.icon', ['icon' => 'eye'])
                </a>
                <a href="{{ route('usuarios.edit', $user) }}" class="btn btn-sm btn-outline-warning">
                    @include('@.bootstrap.icon', ['icon' => 'pencil-fill'])
                </a>
            </td>
        </tr>
        @endforeach
    @endcomponent
@endcomponent

@endsection
