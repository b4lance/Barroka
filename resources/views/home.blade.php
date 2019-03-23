@extends('layouts.app')

@section('contenido')
@if(auth()->check() && auth()->user()->role =='PUBLICIST' && auth()->user()->profile == null)
    @include('publicist.nuevoperfil')
@else
                @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
                @endif
 <div id="filters">
            <div class="container px-3">
                <form action="{{route('home')}}" method="GET">
                <ul class="nav bg-light mb-2 ">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><select class="rounded-0 form-control barroka-bg form-control-sm" id="gender" name="gender">
                          <option value="">Genero</option>
                           <option value="HOMBRE">Hombre</option>
                           <option value="MUJER">Mujer</option>
                        </select></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <select id="select-province" name="province_id" class="rounded-0 form-control barroka-bg form-control-sm">
                                <option value="">Provincia</option>
                                <option value="todos">Todos</option>
                                @foreach($provinces as $p)
                                    <option value="{{$p->id}}">{{$p->provincia}}</option>
                                @endforeach
                            </select></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <select id="select-city" name="city_id" class="rounded-0 form-control barroka-bg form-control-sm">
                                <option value="">Localidad</option>
                                <option value="todos">Todos</option>
                                 @foreach($cities as $c)
                                    <option value="{{$c->id}}">{{$c->localidad}}</option>
                                @endforeach
                            </select></a>
                    </li>
                    <li class="nav-item">
                         <button style="margin-top: 7px;" class="btn btn-sm barroka-bg" type="submit"><i class="fa fa-search"></i></button>
                    </li>
                </ul>
            </form>
            </div>
        </div>

<div class="container px-3">
                <div class="row">
                    @foreach($publicist as $p)
                    <div class="col-12 col-md-6 col-lg-4 col-sm-6 my-2">
                        <a href="{{route('perfil',$p->id)}}" class="card publicista rounded-0">
                            <figure class="card-image">
                                <img class="rounded-0" src="{{$p->main_photo}}" width="100%" alt="">
                            </figure>
                            <div class="card-body py-2 position-absolute content-data d-flex justify-content-between">
                                <div>
                                {{$p->fancy_name}}
                                </div>
                                <div>{{$p->city->localidad}}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
</div>
<div class="container" style="display: flex;justify-content: center;">
    {{$publicist->render()}}
</div>
    @endif
@endsection

@section('scripts')
    <script>
      $(function(){
          $('#select-province').on('change',onSelectProvinceChange);
      });

      function onSelectProvinceChange(){
        var province_id=$(this).val();

        if(! province_id){
          $('#select-city').html(html_select);
        }

        if(province_id == 'todos'){
            return false;
        }else{

        //AJAX
        $.get('api/provinces/'+province_id+'/cities',function(data){
            var html_select = '<option value="">Localidad</option>';
            for (var i =0; i<data.length; ++i){
              html_select +='<option value="'+data[i].id+'">'+data[i].localidad+'</option>';
            }
              $('#select-city').html(html_select);
            
        });
        }
      } 
    </script>
  @endsection