@extends('entradas.edit')
@section('update','entrada')
@section('form_content')
    @include('entradas.includes.save')
    <br>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input align-middle" type="checkbox" name="recibido" value="1" id="checkbox-recibido" {{ ! is_null( old('recibido', $entrada->recibido_at)  ) ? 'checked' : '' }}>
            <label class="form-check-label align-middle" for="checkbox-recibido"><b>Recibido</b>. La entrada ha sido recibida fisicamente como paquete en nuestras instalaciones.</label>
        </div>
    </div>
@endsection