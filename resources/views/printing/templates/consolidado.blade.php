<!-- Impresion de informacion - Inicio -->
<div class="mt-3" style="font-size:9pt;page-break-before:always">
    <table class="table table-sm table-bordered m-0 align-middle">
        <!-- App & Entrada -->
        <tbody>
            <tr class="table-dark">
                <td class="fw-bold text-white px-2" colspan="4">
                    <div class="d-flex align-items-middle justify-content-between">
                        <div>BOXPING | {{ config('app.name') }}</div>
                        <div>Consolidado</div>
                    </div>
                </td>
            </tr>
        </tbody>

        <tbody>
            <tr>
                <td class="bg-light fw-bold px-2" colspan="4">Información</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:12%">Número</td>
                <td class="px-2" colspan="3">{{ $consolidado->numero }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" >Status</td>
                <td class="text-capitalize px-2" colspan="3">{{ $consolidado->status }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" >Tarimas</td>
                <td class="px-2" colspan="3">{{ $consolidado->tarimas }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" >Cliente</td>
                <td class="px-2" colspan="3">{{ $cliente->nombre }} ({{ $cliente->alias }})</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" >Notas</td>
                <td class="px-2" colspan="3">{{ $consolidado->notas }}</td>
            </tr>
        </tbody>

        <tbody>
            <tr>
                <td class="bg-light fw-bold px-2" colspan="4">Entradas</td>
            </tr>
            <tr>
                <td style="width:12%">Registradas</td>
                <td style="width:12%">Pendientes</td>
                <td style="width:12%">Entregadas</td>
                <td>Total</td>
            </tr>
            <tr>
                <td>{{ $entradas->whereNotNull('importado_fecha')->count() }}</td>
                <td>{{ $entradas->whereNull('importado_fecha')->count() }}</td>
                <td>0</td>
                <td>{{ $entradas->count() }}</td>
            </tr>
        </tbody>
    </table>
</div>
<br>
<p class="text-center">QR Scan</p>
<!-- Impresion de informacion - Final -->
