@extends('layouts.app')

@section('contenido')
    <div class="card shadow m-auto rounded-0 p-3 card-auth">
                  <div class="card-header barroka-pink-bg">
                      <h3 class="text-center">Login</h3>
                  </div>
                  <div class="card-body px-0">
                  
                  <form action="{{ route('login') }}" method="POST">
                      {{csrf_field()}}
                      <div class="form-group">
                          <input type="text" id="email" name="email" placeholder="Email" class="barroka-pink-bg rounded-0 border-0 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{old('email')}}" required autofocus>
                           @if ($errors->has('email'))
                          <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                          </span>
                          @endif
                      </div>
                      <div class="form-group">
                          <input type="password" id="password" name="password" placeholder="Contraseña" class="barroka-pink-bg rounded-0 border-0 form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" required autofocus>
                           @if ($errors->has('password'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                        @endif
                      </div>
      
                       <div class="form-group form-check d-flex justify-content-between">
                        
                        <a href="{{route('password.request')}}" class="text-dark">¿Olvide mi contraseña?</a>
                      </div>

                      <div class="btn-group w-100">
                          <a href="{{route('register')}}" class="w-50 btn barroka-pink-bg rounded-0" style="color:#000;">Registrar</a>
                          <button type="submit" class="w-50 btn barroka-pink-bg rounded-0">Ingresar</button>
                      </div>
                  </div>

              </div>
@endsection
