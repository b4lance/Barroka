@extends('layouts.app')

@section('contenido')
            <div class="card shadow m-auto rounded-0 p-3 card-auth">
                <div class="card-header  bg-white">
                    <h3 class="text-center">Cambio de Password</h3>
                </div>

                <div class="card-body px-0">
                   @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            
                                <input id="email" type="email" class="barroka-pink-bg rounded-0 border-0 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                          
                        </div>
                        <div class="btn-group w-100 d-fles justify-content-center">
                         <button type="submit" class="w-50 btn barroka-pink-bg rounded-0" style="color:#000;">
                            Enviar
                        </button>
                      </div>
                        
                    </form>
                </div>
            </div>
    
@endsection
