@extends('app')
@section('content')
<div class="card">
    @component('components.card-header-with-link',[
        'title' => 'Reempacadores',
        'link' => route('reempacadores.create'),
        'tooltip' => 'Nuevo reempacador'
    ])
        @slot('content')
        <b>+</b>
        @endslot
    @endcomponent
    
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover m-0">
                <tbody>
                    @foreach($reempacadores as $reempacador)
                    <tr>
                        <td>
                            <a href="{{ route('reempacadores.show', $reempacador) }}">{{ $reempacador->nombre }}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
