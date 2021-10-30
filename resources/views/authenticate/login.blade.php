@extends('app')
@section('classes', 'bg-primary bg-gradient vh-100')
@section('content')
<div class="container-fluid h-100">
    <div class="row align-items-center justify-content-center h-100">
        <div class="col-sm col-sm-4">
            <div class="p-5 bg-white shadow">
                <p class="lead text-center"><b>Bienvenido</b></p>
                <form action="{{ route('login') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="input-email" class="d-none">Email</label>
                        <input type="email" class="form-control rounded-pill {{ ! $errors->has('email') ?: 'is-invalid' }}" id="input-email" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" autofocus>
                        @error('email')
                        <small class="form-text text-danger ms-3">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="input-password" class="d-none">Contraseña</label>
                        <input type="password" class="form-control rounded-pill {{ ! $errors->has('password') ?: 'is-invalid' }}" id="input-password" name="password" placeholder="Password">
                        @error('password')
                        <small class="form-text text-danger ms-3">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill w-100">Iniciar sesión</button>
                </form>
                <hr class="my-4">
                <p class="text-center">
                    <a href="{{ route('reempaque.index') }}">Área de reempaque</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
