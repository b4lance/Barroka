@extends('layouts.app')

@section('contenido')
	<div id="wrapper" class="Editperfil">
            <div class="lightbox d-flex align-items-center justify-content-center">
               <button type="button" class="close " data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form action="{{route('storePublicist')}}" method="POST" enctype="multipart/form-data">
            </div>
            @csrf
             <div class="container px-3">
                <div class="row">
                    <div class="col-12">
                        <h4>Nuevo perfil</h4>
                    </div>
                </div>
              
                 <div class="row">
                     <div class="col-12 col-md-6 col-lg-4">
                         <div class="row">
                              <div class="col-12 mb-2">
                                  <div class="card {{ $errors->has('main_photo') ? 'border-danger' : '' }} publicista rounded-0 w-100">
                                  <input type="file" class="cargarImagen" name="main_photo">
                            <figure class="card-image">
                                <img class="rounded-0" src="" width="100%" alt="">
                            </figure>
                            <div class="card-body py-2 position-absolute content-data">
                                <p class="text-center mt-2">Click para cambiar</p>
                            </div>
                            </div>
                              @if ($errors->has('main_photo'))
                                  <p class="text-danger" style="font-weight: bold;font-size: 12px;">{{$errors->first('main_photo')}}</p>
                                @endif
                              </div> 

                              <div class="col-12 mb-2">
                                  <div class="card {{ $errors->has('img2') ? 'border-danger' : '' }} publicista rounded-0 w-100">
                                  <input type="file" class="cargarImagen" name="img2">
                            <figure class="card-image">
                                <img class="rounded-0" src="" width="100%" alt="">
                            </figure>
                            <div class="card-body py-2 position-absolute content-data">
                                <p class="text-center mt-2">Click para cambiar</p>
                            </div>
                            </div>
                            @if ($errors->has('img2'))
                                  <p class="text-danger" style="font-weight: bold;font-size: 12px;">{{$errors->first('img2')}}</p>
                                @endif
                              </div> 
                               <div class="col-12 mb-2">
                                  <div class="card {{ $errors->has('img3') ? 'border-danger' : '' }} publicista rounded-0 w-100">
                                  <input type="file" class="cargarImagen" name="img3">
                            <figure class="card-image">
                                <img class="rounded-0" src="" width="100%" alt="">
                            </figure>
                            <div class="card-body py-2 position-absolute content-data">
                                <p class="text-center mt-2">Click para cambiar</p>
                            </div>
                            </div>
                            @if ($errors->has('img3'))
                                  <p class="text-danger" style="font-weight: bold;font-size: 12px;">{{$errors->first('img3')}}</p>
                                @endif
                              </div> 
                               <div class="col-12 mb-2">
                                  <div class="card {{ $errors->has('img4') ? 'border-danger' : '' }} publicista rounded-0 w-100">
                                  <input type="file" class="cargarImagen" name="img4">
                            <figure class="card-image">
                                <img class="rounded-0" src="" width="100%" alt="">
                            </figure>
                            <div class="card-body py-2 position-absolute content-data">
                                <p class="text-center mt-2">Click para cambiar</p>
                            </div>
                            </div>
                            @if ($errors->has('img4'))
                                  <p class="text-danger" style="font-weight: bold;font-size: 12px;">{{$errors->first('img4')}}</p>
                            @endif
                              </div> 
                     </div>
                 </div>
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="row px-3">
                            <div class="card mb-3 rounded-0 col-12 p-3">
                            <div class="card-header border-0  p-3">
                                <h5 class="text-center m-0"><strong class="mr-3">Mi Perfil</strong></h5>
                            </div>

                            <div class="card-body py-3 px-0">
                              <div class="form-group">
                                  <select class="custom-select rounded-0 barroka-bg {{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender">
                                  <option value="">Genero</option>
                                    <option value="HOMBRE" {{ old('gender') == 'HOMBRE' ? 'selected' : ''}}>Hombre</option>
                                    <option value="MUJER" {{ old('gender') == 'MUJER' ? 'selected' : '' }}>Mujer</option>
              
                                </select>
                                 @if ($errors->has('gender'))
                                  <span class="invalid-feedback">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                                @endif
                              </div>
                            <div class="form-group">
                    <select class="custom-select rounded-0 barroka-bg{{ $errors->has('province_id') ? ' is-invalid' : '' }}" id="select-province" name="province_id">
                                  <option value="">Provincia</option>
                                  @foreach($provinces as $province)
                                  <option  value="{{$province->id}}" {{ old('province_id') ? 'selected' : ''}}>{{$province->provincia}}</option>
                                  @endforeach
                                </select> 
                                @if ($errors->has('province_id'))
                                  <span class="invalid-feedback">
                                    <strong>{{ $errors->first('province_id') }}</strong>
                                </span>
                                @endif
                              </div>
                                   <div class="form-group">
                                  <select class="custom-select rounded-0 barroka-bg{{ $errors->has('city_id') ? ' is-invalid' : '' }}" id="select-city" name="city_id">
                                  <option value="">Ciudad</option>
                                </select>
                                 @if ($errors->has('city_id'))
                                  <span class="invalid-feedback">
                                    <strong>{{ $errors->first('city_id') }}</strong>
                                </span>
                                @endif
                              </div>
                                   <div class="form-group">
                                       <input type="text" placeholder="Zona" class="barroka-pink-bg form-control rounded-0{{ $errors->has('zone') ? ' is-invalid' : '' }}" name="zone" value="{{old('zone')}}">
                                        @if ($errors->has('zone'))
                                          <span class="invalid-feedback">
                                            <strong>{{ $errors->first('zone') }}</strong>
                                        </span>
                                      @endif
                                   </div>
                                   <div class="form-group">
                                       <input type="text" placeholder="Nombre de fantasia" class="barroka-pink-bg form-control rounded-0{{ $errors->has('fancy_name') ? ' is-invalid' : '' }}" name="fancy_name" value="{{old('fancy_name')}}">
                                        @if ($errors->has('fancy_name'))
                                          <span class="invalid-feedback">
                                            <strong>{{ $errors->first('fancy_name') }}</strong>
                                          </span>
                                        @endif
                                   </div>
                                   <div class="form-group">
                                       <input type="text" placeholder="Edad" class="barroka-pink-bg form-control rounded-0{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{old('age')}}">
                                       @if ($errors->has('age'))
                                          <span class="invalid-feedback">
                                            <strong>{{ $errors->first('age') }}</strong>
                                          </span>
                                        @endif
                                   </div>
                                   <div class="form-group">
                                       <input type="text" placeholder="Altura" class="barroka-pink-bg form-control rounded-0{{ $errors->has('height') ? ' is-invalid' : '' }}" name="height" value="{{old('height')}}">
                                        @if ($errors->has('height'))
                                          <span class="invalid-feedback">
                                            <strong>{{ $errors->first('height') }}</strong>
                                          </span>
                                        @endif
                                   </div>
                                   <div class="form-group">
                                       <input type="text" placeholder="Medidas" class="barroka-pink-bg form-control rounded-0{{ $errors->has('measurements') ? ' is-invalid' : '' }}" name="measurements" value="{{old('measurements')}}">
                                       @if ($errors->has('measurements'))
                                          <span class="invalid-feedback">
                                            <strong>{{ $errors->first('measurements') }}</strong>
                                          </span>
                                        @endif
                                   </div>
                                    <h6>Datos de contacto para los visitantes</h6>
                                    <hr>
                                    <div class="form-group">
                                       <input type="text" placeholder="Horarios" class="barroka-pink-bg form-control rounded-0{{ $errors->has('schedules') ? ' is-invalid' : '' }}" name="schedules" value="{{old('schedules')}}">
                                       @if ($errors->has('schedules'))
                                          <span class="invalid-feedback">
                                            <strong>{{ $errors->first('schedules') }}</strong>
                                          </span>
                                        @endif
                                   </div>
                                   <div class="form-group">
                                       <input type="text" placeholder="Telefono" class="barroka-pink-bg form-control rounded-0{{ $errors->has('age') ? ' is-invalid' : '' }}"" name="phone" value="{{old('phone')}}">
                                       @if ($errors->has('age'))
                                          <span class="invalid-feedback">
                                            <strong>{{ $errors->first('age') }}</strong>
                                          </span>
                                        @endif
                                   </div>
                                   <div class="form-group">
                                       <input type="text" placeholder="Tarifa" class="barroka-pink-bg form-control rounded-0{{ $errors->has('rate') ? ' is-invalid' : '' }}" name="rate" value="{{old('rate')}}">
                                       @if ($errors->has('rate'))
                                          <span class="invalid-feedback">
                                            <strong>{{ $errors->first('rate') }}</strong>
                                          </span>
                                        @endif
                                   </div>
                                   <div class="form-group">
                                       <input type="text" placeholder="Medios de pago" class="barroka-pink-bg form-control rounded-0{{ $errors->has('payment_methods') ? ' is-invalid' : '' }}" name="payment_methods" value="{{old('payment_methods')}}">
                                       @if ($errors->has('payment_methods'))
                                          <span class="invalid-feedback">
                                            <strong>{{ $errors->first('payment_methods') }}</strong>
                                          </span>
                                        @endif
                                   </div>
                                   <div class="btn-group w-100">
                                       <button type="submit" class="barroka-bg btn w-100 rounded-0">Guardar y enviar</button>
                                       <input type="hidden" name="standar_id" value="{{auth()->user()->id}}">
                                   </div>
                            </div>
                        </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-4">
                         <div class="row">
                              <div class="col-12 mb-2">
                                  <div class="card {{ $errors->has('img5') ? 'border-danger' : '' }} publicista rounded-0 w-100">
                                  <input type="file" class="cargarImagen" name="img5">
                            <figure class="card-image">
                                <img class="rounded-0" src="" width="100%" alt="">
                            </figure>
                            <div class="card-body py-2 position-absolute content-data">
                                <p class="text-center mt-2">Click para cambiar</p>
                            </div>
                            </div>
                            @if ($errors->has('img5'))
                                  <p class="text-danger" style="font-weight: bold;font-size: 12px;">{{$errors->first('img5')}}</p>
                                @endif
                              </div> 
                              <div class="col-12 mb-2">
                                  <div class="card  rounded-0 w-100">
                            
                            <div class="card-header py-2">
                                <h5 class="m-0 border-0"> Saludo</h5>
                            </div>
                            <div class="card-body">
                                <div class="saludo">
                                    <textarea name="presentation" class="form-control rounded-0{{ $errors->has('presentation') ? ' is-invalid' : '' }}" placeholder="Escribe tu mensaje..." id="" cols="30" rows="10">{{old('presentation')}}</textarea>
                                     @if ($errors->has('presentation'))
                                          <span class="invalid-feedback">
                                            <strong>{{ $errors->first('presentation') }}</strong>
                                          </span>
                                        @endif
                                </div>
                            </div>
                            </div>
                              </div> 
                              <div class="col-12">
                                  <!-- Button trigger modal -->
						<button type="button" class="btn barroka-bg w-100 rounded-0" data-toggle="modal" data-target="#exampleModal">
     					Administrar redes sociales
						</button>
                              </div>
                     </div>
                 </div>
             </div>
        </div>
        <hr>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Redes Sociales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
  <li class="list-group-item"><i class="fab fa-facebook-f"></i> Facebook - URL: <input type="text" placeholder="Escribe la URL de tu perfil" class="form-control" name="facebook" value="{{old('facebook')}}"></li>
    <li class="list-group-item"><i class="fab fa-twitter"></i> Twitter - URL: <input type="text" placeholder="Escribe la URL de tu perfil" class="form-control" name="twitter" value="{{old('twitter')}}"></li>
    <li class="list-group-item"><i class="fab fa-instagram"></i> Instagram - URL: <input type="text" placeholder="Escribe la URL de tu perfil" class="form-control" name="instagram" value="{{old('instagram')}}"></li>
</ul>
      </div>
      <div class="modal-footer">
       <p class="small">Luego de hacer los cambios recuerde presionar el boton de "Guardar y Enviar"</p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Listo</button>
      </div>
    </div>
  </div>
</div>
</form>

@endsection

@section('scripts')
	<script>
        (function($){
            $(document).ready(function(){
                var imagenes = $('.card-image img');
                
                $.each(imagenes,function(key){
                    var image = $(this).attr('src');
                    if(image == ''){
                        $(this).css('background-image','url(img/-add-a-photo_90549.svg)');
                    }
                    
                    $('.Editperfil .cargarImagen').change(function(event){
                        var file = event.target.files[0];
                        var reader = new FileReader();
                        var imgTarget = $(this).siblings('.card-image').children('img');
                        reader.onload = function(event) {
                            console.log('Cargando imagen');
                            imgTarget.attr('src',event.target.result);
                            imgTarget.css('background-image','');
                      }
                      reader.readAsDataURL(file);
                    });
                });
            });
        }(jQuery));    
    </script>

    <script>
      $(function(){
          $('#select-province').on('change',onSelectProvinceChange);
      });

      function onSelectProvinceChange(){
        var province_id=$(this).val();

        if(! province_id){
          $('#select-city').html(html_select);
        }

        //AJAX
        $.get('api/provinces/'+province_id+'/cities',function(data){
            var html_select = '';
            for (var i =0; i<data.length; ++i){
              html_select +='<option value="'+data[i].id+'">'+data[i].localidad+'</option>';
            }
              $('#select-city').html(html_select);
            
        });

      } 
    </script>
@endsection