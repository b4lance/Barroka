@extends('layouts.app')

@section('contenido')
<div class="container">
  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    ¡Email confirmado!. Ingresa los datos requeridos para actualizar su contraseña de acceso.

  </div>
</div>
            <div class="card shadow m-auto rounded-0 p-3 card-auth">
                <div class="card-header bg-white">
                    <h3 class="text-center">Cambio de Password</h3>
                </div>
                
                <div class="card-body px-0">
                    <form method="POST" action="{{ route('password.request') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                           
                                <input id="email" type="email" class="barroka-pink-bg rounded-0 border-0 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group">
                            
                                <input id="password" type="password" class="barroka-pink-bg rounded-0 border-0 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group ">
                                <input id="password-confirm" type="password" class="barroka-pink-bg rounded-0 border-0 form-control" name="password_confirmation" required placeholder="Confirmar Password">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="btn-group w-100 d-fles justify-content-center">
                         <button type="submit" class="w-50 btn barroka-pink-bg rounded-0" style="color:#000;">
                            Cambiar Password
                        </button>
                      </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
