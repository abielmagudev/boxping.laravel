<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span>Entradas</span>
                <span class="badge badge-primary">{{ $consolidado->entradas->count() }}</span>
            </div>
            <div>
                <a href="#!" class="btn btn-primary btn-sm">Imprimir</a>
                @if(! $consolidado->cerrado )
                <a href="{{ route('entradas.create', ['consolidado' => $consolidado]) }}" class="btn btn-primary btn-sm">Agregar</a>
                @endif
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="small">
                        <td>Número</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consolidado->entradas as $entrada)
                    <tr>
                        <td>
                            <a href="{{ route('entradas.show', $entrada) }}">{{ $entrada->numero }}</a>
                        </td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>