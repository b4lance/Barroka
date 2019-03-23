@extends('layouts.app')

@section('contenido')
<div class="card shadow m-auto rounded-0 card-auth p-3">
                  <div class="card-header bg-white">
                      <h3 class="text-center">Editar cuenta</h3>
                  </div>
                  <form action="{{route('CuentaReset')}}" method="POST">
                    @csrf
                  <div class="card-body px-0">
                      @if(session('error'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert"" style="margin-bottom: 10px">
                            {{session('error')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                    </div>
                    @endif
                     @if(session('nice'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert"" style="margin-bottom: 10px">
                            {{session('nice')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                    </div>
                    @endif
                      <div class="form-group">
                          <input type="password" name="pass_reset" placeholder="Contraseña actual" class="barroka-pink-bg rounded-0 border-0 form-control {{$errors->first('pass_reset') ? 'is-invalid' : ''}}" >
                           @if($errors->has('pass_reset'))
                          <span class="invalid-feedback">
                              <strong>{{$errors->first('pass_reset')}}</strong>
                          </span>
                          @endif
                      </div>
                      <div class="form-group">
                          <input type="password" name="password" placeholder="Nueva contraseña" class="barroka-pink-bg rounded-0 border-0 form-control {{$errors->has('password') ? 'is-invalid' : ''}}" >
                          @if($errors->has('password'))
                          <span class="invalid-feedback">
                              <strong>{{$errors->first('password')}}</strong>
                          </span>
                          @endif
                      </div>
                      <div class="form-group">
                          <input type="password" name="password_confirmation" placeholder="Repetir contraseña" class="barroka-pink-bg rounded-0 border-0 form-control" >
                      </div>
                      <div class="btn-group w-100">
                          <button type="submit" class="w-100 btn barroka-pink-bg rounded-0">Guardar cambios</button>
                      </div>
                  </div>
                </form>
              </div>
        </div>
@endsection