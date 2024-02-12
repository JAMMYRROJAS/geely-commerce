@extends('layouts.login')
@section('content')
  <form class="pt-3" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
      <label for="email">Correo electrónico</label>
      <div class="input-group">
        <div class="input-group-prepend bg-transparent">
          <span class="input-group-text bg-transparent border-right-0">
            <i class="fa fa-user text-dark"></i>
          </span>
        </div>
        <input id="email" type="email" name="email" class="form-control form-control-lg border-left-0 @error('email') is-invalid @enderror" id="email" placeholder="ejemplo@gmail.com" required>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>
    <div class="form-group">
      <label for="password">Contraseña</label>
      <div class="input-group">
        <div class="input-group-prepend bg-transparent">
          <span class="input-group-text bg-transparent border-right-0">
            <i class="fa fa-lock text-dark"></i>
          </span>
        </div>
        <input id="password" type="password" name="password" class="form-control form-control-lg border-left-0 @error('password') is-invalid @enderror" id="password" placeholder="********" required>   
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror                  
      </div>
    </div>
    <div class="my-3">
      <button class="btn btn-rounded btn-dark btn-lg btn-block" type="submit">
        INICIAR SESIÓN
      </button>
    </div>
  </form>
@endsection