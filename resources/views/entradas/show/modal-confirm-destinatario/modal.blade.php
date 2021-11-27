<!-- Modal confirmacion -->
@component('@.bootstrap.modal', [
  'backdrop' => true,
  'body_classes' => 'p-5',
  'centered' => true,
  'id' => 'modalConfirmDestinatario',
])
    <p class="h4 text-center">¿Se han realizado los siguientes pasos de confirmación?</p>
    <br>
    <ol class="lead text-start ms-5">
        <li class="">Contactar al destinatario.</li>
        <li class="">Verificar la información de destino.</li>
        <li class="">Confirmar el envio del paquete.</li>
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
@endcomponent
