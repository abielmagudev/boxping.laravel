<!-- Modal confirmacion -->
@component('@.bootstrap.modal', [
  'backdrop' => true,
  'body_classes' => 'p-5',
  'centered' => true,
  'id' => 'modalConfirmacion',
])
    @slot('body')
    <p class="h4 text-nowrap">¿Se ha realizado los siguientes pasos?</p>
    <br>
    <ol class="lead">
        <li>Contactar al destinatario.</li>
        <li>Verificar la información de destino.</li>
        <li>Confirmar el envio del paquete con éxito.</li>
    </ol>
    <br>
    <form action="{{ route('entradas.update', $entrada) }}" method="post" autocomplete="off">
        @method('put')
        @csrf
        <input type="hidden" name="confirmado" value="yes">
        <div class="text-center">
            <button class="btn btn-success" type="submit" name="actualizar" value="confirmacion">Si, realizé cada paso</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, aún no</button>
        </div>
    </form>
    @endslot
@endcomponent