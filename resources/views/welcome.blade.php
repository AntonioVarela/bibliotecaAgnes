<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Biblioteca Virtual</title>

    <!-- Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- Styles -->
    <style>
        .heartbeat {
            -webkit-animation: heartbeat 1.5s ease-in-out infinite both;
            animation: heartbeat 1.5s ease-in-out infinite both;
        }

        @-webkit-keyframes heartbeat {
            from {
                -webkit-transform: scale(1);
                transform: scale(1);
                -webkit-transform-origin: center center;
                transform-origin: center center;
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out;
            }

            10% {
                -webkit-transform: scale(0.91);
                transform: scale(0.91);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in;
            }

            17% {
                -webkit-transform: scale(0.98);
                transform: scale(0.98);
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out;
            }

            33% {
                -webkit-transform: scale(0.87);
                transform: scale(0.87);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in;
            }

            45% {
                -webkit-transform: scale(1);
                transform: scale(1);
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out;
            }
        }

        @keyframes heartbeat {
            from {
                -webkit-transform: scale(1);
                transform: scale(1);
                -webkit-transform-origin: center center;
                transform-origin: center center;
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out;
            }

            10% {
                -webkit-transform: scale(0.91);
                transform: scale(0.91);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in;
            }

            17% {
                -webkit-transform: scale(0.98);
                transform: scale(0.98);
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out;
            }

            33% {
                -webkit-transform: scale(0.87);
                transform: scale(0.87);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in;
            }

            45% {
                -webkit-transform: scale(1);
                transform: scale(1);
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out;
            }
        }

        body {
            /* background-image: url("img/fondo.svg");
               background-repeat: no-repeat;
               background-position: center center;
               background-attachment: fixed;
               -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover; */
            /* -webkit-animation: color-change-5x 8s linear infinite alternate both;
                animation: color-change-5x 8s linear infinite alternate both; */
        }

        .titulos {
            background-color: #03247c;
            border-radius: 7px 7px 0 0;
            font-weight: bold;
            color: white;
        }

        .recuadro {
            background-color: #b1c4f9;
            box-shadow: 12px 12px 20px -12px rgba(0, 0, 0, 0.55);
        }

        img.zoom:hover {
            cursor: pointer;
        }

        .transition {
            -webkit-transform: scale(1.8);
            -moz-transform: scale(1.8);
            -o-transform: scale(1.8);
            transform: scale(1.8);
        }

        .input-search {
            font-family: inherit;
            width: 80%;
            border: 0;
            border-bottom: 2px solid black;
            outline: 0;
            font-size: 1rem;
            color: rgb(0, 0, 0);
            padding: 7px 0;
            background: rgba(255, 255, 255, 0);
            transition: border-color 0.2s;
        }

        .input-search::placeholder {
            color: rgb(255, 255, 255) !important;
        }

        .input-search:focus {
            padding-bottom: 6px;
            padding-left: 10px;
            border-width: 3px;
            border-image: linear-gradient(to right, #085a7a, #11aeec);
            border-image-slice: 1;
        }

        .button-search {
            background-color: #11aeec;
            color: white !important;
            font-weight: bold;
            padding: 7px 9px;
            border: none;
            border-radius: 6px;
        }

        .button-search:hover {
            background-color: #085a7a !important;
        }

        .button-search-cancelar {
            background-color: #3f109e;
            color: white !important;
            font-weight: bold;
            padding: 10px 9px;
            border: none;
        }

        .button-search-cancelar:hover {
            background-color: #4447e9 !important;
            text-decoration: none;
        }

        #global {
            height: 355px;
            border: 1px solid #ddd;
            background: #f1f1f1;
            overflow-y: scroll;
        }

        /* nuevos */
        .imagenLogo {
            height: 80px;
        }

        .botonPrincipal {
            border-radius: 6px;
            background-color: #03247c;
            color: white;
            padding: 3px 16px;
            border: #03247c 1px solid;
            font-weight: 700;
            text-decoration: none;
        }

        .botonPrincipal:hover {
            border-radius: 6px;
            background-color: #ffffff;
            color: #03247c;
            padding: 3px 16px;
            border: #03247c 1px solid;
            font-weight: 700;
        }

        .linkSecundario {
            text-decoration: none;
            color: #ebebeb;
            border-radius: 6px;
            padding: 3px 16px;
            margin-right: 12px;
            border: #68737e 1px solid;
            background-color: #68737e;
            font-weight: 600;

        }

        .linkSecundario:hover {
            text-decoration: none;
            color: #ffffff;
            border-radius: 6px;
            padding: 3px 16px;
            margin-right: 12px;
            border: #4f5860 1px solid;
            background-color: #4f5860;
            font-weight: 600;
        }

        .cuadroBusqueda {
            padding: 100px 100px;
            color: white;
            border-radius: 7px;
            margin-top: 37px;
        }

        .navsRankingButton {
            border-left: 1px solid white !important;
            padding: 0 20px;
            background: #03247c;
            color: white;
            font-weight: 400;
        }

        .navsRankingButton:hover {
            border: 2px solid;
            padding: 0 20px;
            background: white;
            color: black;
            font-weight: 600;
        }

        .logoIniciosesion {
            display: block;
            margin-left: auto;
            margin-right: auto;
            height: 150px;
            margin-bottom: 20px;
        }

        .nav-link.active {
            background-color: #b1c4f9 !important;
        }
    </style>

</head>

<body>
    <!-- barra de navegacion -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark"
        style="border-bottom: #b7b7b7 2px solid !important; color:white;">
        <div class="container">
            <img src="{{asset('img/Agnes-logo.png')}}" alt="" width="30">
            COLEGIO AGNES GONXHA
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavId">
                <ul class="nav">
                    <li><a href="Reglamento-biblioteca-resumen.pdf" class="nav-item linkSecundario"
                            download="Reglamento-biblioteca-2022"><i class="fa-regular fa-file"></i> Reglamento</a></li>
                </ul>
                @if (Route::has('login'))
                <div class="links">
                    @auth
                    <!-- <a href="{{ url('/home') }}" class="btn btn-sm btn-warning">Inicio</a> -->
                    <a href="{{ url('/home') }}" class="botonPrincipal"><i class="fa-solid fa-house"></i> Inicio</a>
                    @else
                    <!-- <a href="{{ route('login') }}" class="btn btn-sm btn-primary">INICIAR SESION</a> -->
                    <button class="botonPrincipal" data-bs-toggle="modal" data-bs-target="#modalId"><i
                            class="fa-regular fa-user"></i> Iniciar sesión</button>
                    @endauth
                </div>
                @endif
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="cuadroBusqueda" style="background-color:#68737e!important">
                <h1>¿Qué libro estás buscando?</h1>
                <form action="{{route('buscar')}}" method="POST">
                    @csrf
                    <input type="search" class="input-search col-md-5 col-sm-5" width="800px" name="buscar" id="buscar"
                        autocomplete="off" placeholder="    BUSCAR POR TITULO, AUTOR, EDITORIAL O TEMA"
                        value="{{$buscar != ''?$buscar:''}}">
                    @if ($libros->count() == 0)
                    <button type="submit" class="button-search" disabled><i class="fas fa-search"></i> Buscar</button>
                    @if ($buscar != '' || $libros->count() == 0)
                    <a class=" button-search-cancelar" href="{{route('home')}}"><i class="fas fa-times"></i>
                        Cancelar</a>
                    @endif
                    @else
                    <button type="submit" class="button-search"><i class="fas fa-search"></i> Buscar</button>
                    @if ($buscar != '')
                    <a class="button-search-cancelar" href="{{route('home')}}"><i class="fas fa-times"></i> Cancelar</a>
                    @endif
                    @endif
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row text-center mt-4">
            <div class="col-md-6">
                <div class="titulos">
                    <span>Recomendación del mes</span>
                </div>
                <div class="recuadro">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                aria-current="true" class="active" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img\semana.jpeg" width="200" data-bs-toggle="modal" data-bs-target="#modelId"
                                    class="zoom heartbeat">
                            </div>
                            <div class="carousel-item">
                                <img src="img\semana2.png" width="200" data-bs-toggle="modal" data-bs-target="#modelId2"
                                    class="zoom heartbeat">
                            </div>
                            <div class="carousel-item">
                                <img src="img\semana.jpeg" width="200" data-bs-toggle="modal" data-bs-target="#modelId"
                                    class="zoom heartbeat">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="titulos">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link navsRankingButton active" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                aria-selected="true">Top 10 más leídos</button>
                            <button class="nav-link navsRankingButton" id="nav-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                aria-selected="false">Ranking por grupo</button>
                            <button class="nav-link navsRankingButton" id="nav-contact-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                                aria-selected="false">Top 5 mejores lectores</button>
                        </div>
                    </nav>
                </div>

                <div id="global" class="recuadro table-responsive">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <table class="table table-striped">
                                <!-- <thead style="background:#b1c4f9"> -->
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Titulo</th>
                                        <th>Autor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($informe as $tupla)
                                    @foreach ($libros as $libro)
                                    @if($tupla->idLibro == $libro->id)
                                    <tr>
                                        <td>{{$tupla->cuenta}}</td>
                                        <td scope="row">{{$libro->titulo}}</td>
                                        <td>{{$libro->autor}}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Libros prestados</th>
                                        <th>Grupo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rankingGrupo as $tupla)
                                    <tr>
                                        <td>{{$tupla->librosPrestados}}</td>
                                        <td scope="row">{{$tupla->grado}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Libros prestados</th>
                                        <th>Nombre del alumno</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alumnosLectores as $tupla)
                                    <tr>
                                        <td>{{$tupla->librosPrestados}}</td>
                                        <td scope="row">{{$tupla->nombre}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        <!-- Modal imagen 1 -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-xl text-center" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <img src="img\semana.jpeg">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal imagen 2 -->
        <div class="modal fade" id="modelId2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-xl text-center" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <img src="img\semana2.png">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- ModalLogin -->
        <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Iniciar Sesión</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- <img src="img\Agnes-logo-azul.png" class="logoIniciosesion"> -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">


                                <div class="">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Usuario
                                        Knotion') }}</label>
                                    <input id="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="Usuario"
                                        name="email" value="{{ old('email') }}" required autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Usuario o contraseña invalido</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mt-2 row">
                                <div class="">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{
                                        __('Contraseña') }}</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="contraseña" name="password" required
                                        autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Usuario o contraseña invalido</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class=" d-grid gap-2 mt-3">
                                    <button type="submit" class="botonPrincipal">
                                        {{ __('Iniciar Sesion') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>