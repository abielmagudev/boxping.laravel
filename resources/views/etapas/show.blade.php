@extends('app')
@section('content')
<div class="row">
    <div class="col-sm">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <span>Etapa</span>
                <span>
                    <a href="{{ route('etapas.edit', $etapa) }}" class="btn btn-warning btn-sm">e</a>
                </span>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td class="small text-muted" style="width:1%">Nombre</td>
                            <td>{{ $etapa->nombre }}</td>
                        </tr>
                        <tr>
                            <td class="small text-muted">Descripción</td>
                            <td>{{ $etapa->descripcion }}</td>
                        </tr>
                        <tr>
                            <td class="small text-muted">Realizar medición</td>
                            <td>{{ $etapa->realizar_medicion ? 'Si' : 'No' }}</td>
                        </tr>
                        <tr>
                            <td class="small text-muted">Peso en</td>
                            <td>{{ ucfirst($etapa->peso_en) }}</td>
                        </tr>
                        <tr>
                            <td class="small text-muted text-nowrap">Volúmen en</td>
                            <td>{{ ucfirst($etapa->volumen_en) }}</td>
                        </tr>
                        <tr>
                            <td class="small text-muted">Actualizado</td>
                            <td>
                                <span>{{ $etapa->updater->name }}</span>
                                <br>
                                <span>{{ $etapa->updated_at }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm col-sm-8">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <span>Zonas</span>
                <span>
                    <a href="#" class="btn btn-primary btn-sm">Agregar</a>
                </span>
            </div>
            <div class="card-body"></div>
        </div>
    </div>
</div>
@endsection