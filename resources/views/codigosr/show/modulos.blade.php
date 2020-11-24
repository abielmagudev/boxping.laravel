<div class="card">
    <div class="card-body text-center">
        <p class="m-0">ENTRADAS</p>
        <p class="display-4 m-0">{{ $entradas->count() }}</p>
    </div>
</div>
<br>
@if( $entradas->count() )
<div class="card">
    <div class="card-body">
        <p>Reempacadores</p>
        <table class="table small m-0">
            @foreach($reempacadores as $id => $reempacador)
            <tr>
                <td>{{ $reempacador->nombre }}</td>
                <td>{{ $reempacador->counter }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endif
