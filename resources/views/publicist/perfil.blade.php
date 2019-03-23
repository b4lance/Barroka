@extends('layouts.app')

@section('contenido')
    <div id="wrapper" class="perfil">
            <div class="lightbox d-flex align-items-center justify-content-center">
               <button type="button" class="close " data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <div class="content">
                    <img src="{{asset('img/photo-1477579266593-ccd7841e4f02.jpg')}}" alt="" class="shadow-lg">
                </div>
            </div>
             <div class="container px-3">
                <div class="row mb-2">
                    <div class="col-12 d-flex align-items-center">
                        <h4 class="mb-0 mr-2">Perfil</h4>
                        @if(auth()->check())
                            
                        @if(auth()->user()->role == 'PUBLICIST' && auth()->user()->publicist->profile_status != null && auth()->user()->id == $publicist->user_id || auth()->user()->role == 'ADMIN')
                        <a href="{{route('editarperfil',$publicist->id)}}" class="text-dark" title="Editar perfil"><i class="fa fa-edit"></i></a>
                        @endif

                        @endif
                    </div>
                </div>
                <div class="owl-carousel column" id="slider">
                            
                </div>
                 <div class="row">
                     <div class="col-12 col-md-6 col-lg-4">
                         <div class="row">
                             @if($publicist->main_photo)
                             <!--foto-->
                            <div class="col-12 mb-2">
                                  <div class="card publicista rounded-0 w-100">
                                    <figure class="card-image">
                                        <img class="rounded-0" src="{{$publicist->main_photo}}" width="100%" alt="">
                                    </figure>
                                    <div class="card-body py-2 position-absolute content-data">
                                        <p class="text-center mt-2">Click para ampliar</p>
                                    </div>
                                    </div>
                              </div>
                              <!--foto-->
                               @endif

                            @if($publicist->img2)
                            <!--foto-->
                            <div class="col-12 mb-2">
                            <div class="card publicista rounded-0 w-100">
                            <figure class="card-image">
                                <img class="rounded-0" src="{{$publicist->img2}}" width="100%" alt="">
                            </figure>
                            <div class="card-body py-2 position-absolute content-data">
                                <p class="text-center mt-2">Click para ampliar</p>
                            </div>
                            </div>
                              </div>
                              <!--foto-->
                            @endif

                            @if($publicist->img3)
                            <!--foto-->
                            <div class="col-12 mb-2">
                                <div class="card publicista rounded-0 w-100">
                                <figure class="card-image">
                                    <img class="rounded-0" src="{{$publicist->img3}}" width="100%" alt="">
                                </figure>
                                <div class="card-body py-2 position-absolute content-data">
                                    <p class="text-center mt-2">Click para ampliar</p>
                                </div>
                                </div>
                              </div> 
                              <!--foto--> 
                            @endif
                            
                            @if($publicist->img4)
                            <!--foto-->
                              <div class="col-12 mb-2">
                                  <div class="card publicista rounded-0 w-100">
                            <figure class="card-image">
                                <img class="rounded-0" src="{{$publicist->img4}}" width="100%" alt="">
                            </figure>
                            <div class="card-body py-2 position-absolute content-data">
                                <p class="text-center mt-2">Click para ampliar</p>
                            </div>
                            </div>
                              </div> 
                              <!--foto-->
                            @endif  
                     </div>
                 </div>
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="row px-3">
                            <div class="card mb-3 rounded-0 col-12 p-3">
                            <div class="card-header border-0 barroka-pink-bg p-3">
                                <h5 class="text-center m-0"><strong>
                                    {{$publicist->fancy_name}}
                                </strong></h5>
                            </div>
                            <div class="card-body py-3 px-0">
                                <h6>Datos</h6>
                                <hr>
                                <div id="data-location">
                                    <ul>
                                        <li><strong>GENERO: </strong>{{$publicist->gender}}</li>
                                        <li><strong>PROVINCIA: </strong>{{$publicist->province->provincia}}</li>
                                        <li><strong>LOCALIDAD: </strong>{{$publicist->city->localidad}}</li>
                                    </ul>
                                    </div>
                                    <h5 class="barroka-bg py-2 px-3">Edad: {{$publicist->age}}</h5>
                                    <h5 class="barroka-bg py-2 px-3 mb-4">Altura: {{$publicist->height}}</h5>
                                    <h5 class="barroka-bg py-2 px-3 mb-4">Medidas: {{$publicist->measurements}}</h5>
                                    <h6>Datos de contacto</h6>
                                <hr>
                                <h5 class="barroka-bg py-2 px-3">Horarios: {{$publicist->schedules}}</h5>
                                <h5 class="barroka-bg py-2 px-3">Telefonos: {{$publicist->phone}}</h5>
                                <h5 class="barroka-bg py-2 px-3">Tarifa:  {{$publicist->rate}}</h5>
                                <h5 class="barroka-bg py-2 px-3 mb-0">Medios de pago: {{$publicist->payment_methods}}</h5>
                            </div>
                        </div>
                        <div class="card rounded-0 mb-3 col-12 p-3">
                            <div class="card-header border-0 barroka-bg p-3">
                                <h5 class="text-center m-0">Valoraciones de experiencia</h5>
                            </div>
                            <div class="card-body py-3 px-0">
                            @if(count($ratings)>0)
                                @foreach($ratings as $r)
                                <div class="rating d-flex justify-content-center">
                                    <span> {{$r->date}} </span>
                                    <div class="content-rating" data-rating="{{$r->valued}}">
                                </div>
                                    <span> - por <p class="text-dark" style="margin-left: 10px;">  {{$r->user->username}}</p></span>
                                </div>
                                 @endforeach
                                @else
                                <div class="rating d-flex justify-content-center">Este publicista no posee valoraciones</div>
                            </div>
                            @endif
                                <hr>
                            @if(auth()->check())
                              @if(auth()->user()->id != $publicist->user_id)
                                @if(auth()->user()->qualification == null)
                                    <form action="{{route('storeRating')}}" method="POST">
                                    @csrf
                                    <div class="mr-3"><strong>{{$publicist->fancy_name}}</strong>-  Valorar:</div>
                                    <div id="preview"> 
                                    <i  class="fa fa-star"></i>
                                    <i  class="fa fa-star"></i>
                                    <i class="fa fa-star"> </i>
                                    <i  class="fa fa-star"></i>
                                    <i  class="fa fa-star"></i>
                                    </div>
                                    <input type="range" id="rating-user" class="form-control-range">
                                    <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                                     <input type="hidden" value="{{$publicist->id}}" name="publicist_id">
                                    <input type="hidden" id="valRating" name="valued">
                                    <button type="submit" class="btn w-100 mt-3 rounded-0 barroka-pink-bg">Valorar</button>
                                </form>
                                @else
                                <div style="display: flex;justify-content: center;">
                                    
                                        <button class="btn btn-primary">
                                        Ya Valoro este perfil
                                    </button>
                                    
                                </div>
                                @endif
                              @endif
                            @else
                            <div>
                            <h5 style="text-align: center;">Inicia Sesión en Barroka para Valorar este perfil</h5><br>
                            <a href="{{route('login')}}" style="display: flex;justify-content: center;" class="btn btn-primary btn-sm text-white">Iniciar Sesion</a>
                            </div>
                        @endif
                        </div>
                        </div>
                        @if(count($ratings)>0)
                         </div>
                        </div>
                        @else      
                        </div>                      
                        @endif

                     <div class="col-sm-12 col-md-12 col-lg-4">
                         <div class="row">

                            @if($publicist->img5)
                              <div class="col-12 mb-2">
                                  <div class="card publicista rounded-0 w-100">
                            <figure class="card-image">
                                <img class="rounded-0" src="{{$publicist->img5}}" width="100%" alt="">
                            </figure>
                            <div class="card-body py-2 position-absolute content-data">
                                <p class="text-center mt-2">Click para ampliar</p>
                            </div>
                            </div>
                              </div> 
                            @endif


                            <div class="col-12 mb-2">
                                  <div class="card  rounded-0 w-100">
                            
                            <div class="card-header py-2 barroka-pink-bg">
                                <h5 class="m-0 border-0"> Saludo</h5>
                            </div>
                            <div class="card-body">
                                <p class="saludo">{{$publicist->presentation}}</p>
                            </div>
                            </div>
                              </div> 
                              <div class="col-12 mt-2">
                                <div class="col-12 d-flex justify-content-around">
                                @if($publicist->facebook != null)
                                <a href="{{$publicist->facebook}}" class="btn social d-flex align-items-center justify-content-center"><i class="fab fa-facebook-f"></i></a>
                                @endif
                                @if($publicist->twitter != null)
                                <a href="{{$publicist->twitter}}" class="btn social d-flex align-items-center justify-content-center"><i class="fab fa-twitter"></i></a>
                                @endif
                                @if($publicist->instagram != null)
                                <a href="{{$publicist->instagram}}" class="btn social d-flex align-items-center justify-content-center"><i class="fab fa-instagram"></i></a>
                                @endif
                            </div>
                              </div>
                     </div>
                 </div>
             </div>
        </div>
          </div>
@endsection

@section('scripts')
    <script>
        (function($){
            $(document).ready(function(){
                var imagenes = $('.card-image img');
                
                var copias = imagenes.clone();
                $('#slider').append(copias);
                
                $('.perfil .publicista').click(function(){
                    var source = $(this).find('.card-image img').attr('src');
                    var lightbox = $('.lightbox');                    
                    lightbox.find('img').attr('src',source);
                    lightbox.addClass('open');
                });
                
                $(".owl-carousel").owlCarousel({
                autoplay: true,
                loop: true,
                nav:true
                    ,
                 responsive:{
                            0:{
                                items:1
                            }
                  }
            });
                
                var ratings = $('.rating');
                
                $.each(ratings,function(index){
                    var rating = $(this).find('.content-rating'),
                           value = rating.data('rating');
                    var render = "<i class='fa fa-star'><i>";
                    for(var i=0;i<5;i++){
                        rating.append(render);
                    }
                    for(var i=0;i < value;i++){
                        rating.find('i').eq(i*2).addClass('checked');
                    }
                });
                
                $('#rating-user').change(function(){
                    var ratingPreview = $(this).siblings('#preview');
                    var newRatingUser = $(this).val()/20;
                    var redondear = Math.ceil(newRatingUser);
                    console.log('Rating asignado: '+redondear);
                    ratingPreview.children('svg.checked').removeClass('checked');
                    for(var i=0;i < redondear;i++){
                        ratingPreview.children('svg').eq(i).addClass('checked');
                    }
                    $('#valRating').val(redondear);
                });
                
                $('.lightbox .close').click(function(){
                    $(this).parent('.lightbox').removeClass('open');
                });
            });
        }(jQuery));    
    </script>
@endsection