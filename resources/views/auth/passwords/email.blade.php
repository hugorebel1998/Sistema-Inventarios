@extends('layouts.app')

@section('content')
<div class="hold-transition login-page portada">
    <div class="login-box">
      <div class="login-logo">
       
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
          <p class="login-box-msg">¿Olvidaste tu contraseña?</p>
    
          <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="input-group mb-3">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
               @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-sm btn-primary cold-md-2 bg-boton"><i
                        class="fas fa-sign-out-alt"></i> Enviar mensaje</button>
            </div>
          </form>
    
          <p class="mt-3 mb-1">
            <a href="{{ route('login') }}">Login</a>
          </p>
          <p class="mb-0">
            <a href="{{ route('register') }}" class="text-center">Registrar nuevo usuario</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
 
</div>
@endsection
