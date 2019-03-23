@extends('layouts.app')

@section('contenido')
    <div class="card p-3 shadow m-auto rounded-0 card-auth">
                  <div class="card-header  barroka-pink-bg">
                      <h3 class="text-center">Registro</h3>
                  </div>
                  <div class="card-body px-0">
                    <form action="{{ route('register') }}" method="POST">
                      {{csrf_field()}}
                     <div class="form-group">
                         <select name="role" id="role" class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }} barroka-pink-bg rounded-0 border-0" required d>
                             <option value="">Seleccione tipo de usuario</option>
                             <option value="STANDAR" {{ old('role')=='STANDAR' ? 'selected' : '' }}>Visitante</option>
                             <option value="PUBLICIST" {{ old('role')=='PUBLICIST' ? 'selected' : '' }}>Publicista</option>
                         </select>
                          @if($errors->has('role'))
                        <span class="invalid-feedback">
                          <strong>{{ $errors->first('role') }}</strong>
                        </span>
                          @endif
                     </div>
                     <hr>


                     <div class="form-group" style="display: none;" id="div-usuario">
                          <input type="text" id="username" name="username" placeholder="Usuario" class="barroka-pink-bg rounded-0 border-0 form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" value="{{old('username')}}">
                          @if($errors->has('username'))
                        <span class="invalid-feedback">
                          <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                      </div>

                      <div class="form-group">
                          <input type="text" id="email" name="email" placeholder="Email" class="barroka-pink-bg rounded-0 border-0 form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{old('email')}}" required>
                          @if($errors->has('email'))
                        <span class="invalid-feedback">
                          <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                      </div>

                      

                      <div class="form-group">
                          <input type="text" name="email_confirmation" placeholder="Repetir email" class="barroka-pink-bg rounded-0 border-0 form-control" required>
                      </div>
                      <div class="form-group">
                          <input type="password" id="password" name="password" placeholder="Contrase&ntilde;a" class="barroka-pink-bg rounded-0 border-0 form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" value="{{old('password')}}">
                           @if($errors->has('password'))
                          <span class="invalid-feedback">
                          <strong>{{ $errors->first('password') }}</strong>
                          </span>
                        @endif
                      </div>
                      
                      <div class="form-group">
                          <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repetir Contrase&ntilde;a" class="barroka-pink-bg rounded-0 border-0 form-control" required>
                      </div>

                       <div class="form-group form-check">
                    <label class="form-check-label" for="term_services">                   <input type="checkbox" id="term_services" name="term_services" {{ old('term_services') ? 'checked' : '' }} class="form-check-input {{ $errors->has('term_services') ? 'is-invalid' : '' }}" required>Acepto los <a href="" class="text-dark">Terminos y Condiciones</a>
                          @if($errors->has('term_services'))
                          <span class="invalid-feedback">
                          <strong>{{ $errors->first('term_services') }}</strong>
                          </span>
                        @endif
                        </label>
                        
                      </div>

                    
                      <div class="btn-group w-100">
                          <button type="submit" class="w-100 btn barroka-pink-bg rounded-0">Registrar</button>
                      </div>
                    </form>
                  </div>
              </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
      $('#role').change(function(){      
        if($('#role').val() == 'STANDAR'){
            $('#div-usuario').css('display','block');
        }
        if($('#role').val() == 'PUBLICIST'){
            $('#div-usuario').css('display','none');
        }
      });
    });

</script>
@endsection