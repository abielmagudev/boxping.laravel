<div class="card">
    <div class="card-body text-center">
        <p class="m-0">ENTRADAS</p>
        <p class="display-4 m-0">{{ $entradas->count() }}</p>
    </div>
</div>
<br>
@if( count($codigosr) )
<div class="card">
    <div class="card-body">
        <table class="table small m-0">
            <thead>
                <tr>
                    <th class="border-top-0">Código de reempacado</th>
                    <th class="border-top-0">Entradas</th>
                </tr>
            </thead>
            <tbody>
                @foreach($codigosr as $codigor)
                <tr>
                    <td>{{ $codigor->nombre }}</td>
                    <td>{{ $codigor->counter }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
