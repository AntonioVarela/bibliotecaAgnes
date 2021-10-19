<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.12.0/js/all.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html {
   min-height: 100%;
}
         body {
               background-image: url("{{asset('img/biblioteca.jpg')}}");
               background-repeat: no-repeat;
               background-position: center center;
               background-attachment: fixed;
               -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                }
                .btn-usuario {
                    background-color: #E91E63; 
                    color: white;
                    font-weight: bold; /* Fuente en negrita o bold */
                    font-size: 16px; /* Cambiar el tamaño de la tipografia */
                }
                .btn-flotante {
                font-size: 16px; /* Cambiar el tamaño de la tipografia */
                text-transform: uppercase; /* Texto en mayusculas */
                font-weight: bold; /* Fuente en negrita o bold */
                color: #ffffff; /* Color del texto */
                border-radius: 5px; /* Borde del boton */
                letter-spacing: 2px; /* Espacio entre letras */
                background-color: #E91E63; /* Color de fondo */
                padding: 18px 30px; /* Relleno del boton */
                position: fixed;
                bottom: 40px;
                right: 40px;
                transition: all 300ms ease 0ms;
                box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
                z-index: 99;
            }
            .btn-flotante:hover {
                background-color: #2c2fa5; /* Color de fondo al pasar el cursor */
                color: white;
                box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
                transform: translateY(-7px);
            }
            @media only screen and (max-width: 600px) {
                .btn-flotante {
                    font-size: 14px;
                    padding: 12px 20px;
                    bottom: 20px;
                    right: 20px;
                }
} 
.menu-a:hover {
background-color: #3f109e;
color:white !important;
font-weight: bold;
}
.menu-a:active {
    background-color:#E91E63 !important;
}
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('img/logo.png')}}" alt="" width="200" >
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li> --}}
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                        <li>
                            <a class="nav-link menu-a" href="{{ route('home') }}">Inicio</a>
                            </li>
                            <li>
                                <a class="nav-link menu-a" href="{{ route('prestamos') }}">Prestamos</a>
                            </li>
                            <li>
                                <a class="nav-link menu-a" href="{{route('usuarios')}}">Usuarios</a>
                            </li>
                            <li>
                                <a class="nav-link menu-a" href="home">Informes</a>
                            </li>
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        function eliminar(){
          Swal.fire({
        title: 'Esta seguro que desea eliminar?',
        text: "Los cambios son irreversibles",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar'
      }).then((result) => {
        if (result.isConfirmed) {
          document.eliminarLibro.submit()
        }
      })
        }
        </script>
</body>
</html>
