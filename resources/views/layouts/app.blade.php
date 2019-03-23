<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Barroka</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('dataTables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('dataTables/Responsive-2.2.1/css/responsive.dataTables.min.css')}}">    
    <link rel="stylesheet" href="{{asset('css/fuente.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    <div id="main">
      <header>
            <nav class="navbar mt-3 navbar-expand-lg navbar-light">
                <div class="container px-3">
                    <a class="navbar-brand" href="{{route('home')}}">
                        <h3>Barroka</h3>
                    </a>
                    <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}">Ingresar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('register')}}">Registrarse</a>
                            </li>
                        @endguest
                        @if(auth()->check())
                            @if(auth()->user()->role == 'PUBLICIST' && auth()->user()->profile != null && auth()->user()->publicist->profile_status == 'ACTIVO')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('perfil',auth()->user()->publicist->id)}}">Perfil</a>
                            </li>
                            @endif
            
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="#">Info</a>
                            </li>
                            @endguest
                            @if(auth()->user()->role =='ADMIN')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin')}}">Administrar</a>
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(auth()->user()->role == 'STANDAR' || auth()->user()->role == 'ADMIN')
                                    {{ Auth::user()->username}} 
                                    @endif
                                    @if(auth()->user()->role == 'PUBLICIST')
                                        @if(isset(auth()->user()->publicist->fancy_name))
                                            {{auth()->user()->publicist->fancy_name}}
                                        @else
                                            {{auth()->user()->email}}
                                        @endif
                                    @endif
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('cuenta')}}">Cuenta</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
       
        <hr>
        <div id="wrapper">
            
            @if(session('success'))
            <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert"" style="margin-bottom: 10px">
                  {{session('success')}}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
             </div>
            @endif

            @yield('contenido')
        </div>
        <hr>
      <footer>
            <div id="copy">
                <div class="container px-3">
                    <p class="small">Barroka &copy; 2018 - (Todos los derechos reservados)</p>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('dataTables/datatables.min.js')}}"></script>
    <script src="{{asset('dataTables/Responsive-2.2.1/js/responsive.datatables.min.js')}}"></script>
    <script src="{{asset('fontawesome-free-5.0.8/svg-with-js/js/fontawesome-all.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.js')}}"></script>
    @yield('scripts')
</body>

</html>
