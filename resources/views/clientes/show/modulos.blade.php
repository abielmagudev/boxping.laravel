<div class="card">
    <div class="card-body">
        <table class="table table-sm small m-0">
            <tbody>
                <tr>
                    <td class="border-top-0">Consolidados</td>
                    <td class="border-top-0 text-right">
                        <a href="#!">{{ $cliente->consolidados->count() }}</a>
                    </td>
                </tr>
                <tr>
                    <td>Entradas</td>
                    <td class="text-right">
                        <a href="#!">{{ $entradas->count() }}</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
