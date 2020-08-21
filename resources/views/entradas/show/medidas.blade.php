<div class="table-responsive">
    <table class="table table-hover small">
        <thead>
            <tr class="bg-white">
                <th>Etapa</th>
                <th>Peso</th>
                <th>Pesaje</th>
                <th>Ancho</th>
                <th>Altura</th>
                <th>Profundidad</th>
                <th>Vólumen</th>
                <th>Actualizado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @for($i = 1; $i < 11; $i++)
            <tr>
                <td class="align-middle">
                    <a href="#!" data-toggle="tooltip" data-placement="right" title="Edicion">Etapa {{ $i }}</a>
                </td>
                <td class="align-middle">0.00</td>
                <td class="align-middle">kilogramos</td>
                <td class="align-middle">0.00</td>
                <td class="align-middle">0.00</td>
                <td class="align-middle">0.00</td>
                <td class="align-middle">centimetros</td>
                <td class="align-middle">0000-00-00 00:00:00</td>
                <td class="align-middle">Fulano Mengano</td>
            </tr>
            @endfor
        </tbody>
    </table>
</div>