<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Biblioteca Virtual</title>

        <!-- Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        {{-- <link href="{{ asset('css/basico.css') }}" rel="stylesheet"> --}}
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
               background-image: url("img/fondo.svg");
               background-repeat: no-repeat;
               background-position: center center;
               background-attachment: fixed;
               -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                /* -webkit-animation: color-change-5x 8s linear infinite alternate both;
                animation: color-change-5x 8s linear infinite alternate both; */
                }
            .titulos {
                    background-color: #03247c;
                    border-radius: 23px 23px 0 0;
                    font-weight: bold;
                    color: white;
                }
            .recuadro {
                    background-color: #ffffff86;
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
            transition: border-color 0.2s;
        }

        .input-search::placeholder {
            color: rgb(158, 158, 158);
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
        }

        .button-search:hover {
            background-color: #085a7a!important;
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
        </style>
        
    </head>
    <body>        
        <div class="container">
            <div class="row p-2 text-end titulos">
                <div class="col-8 pb-2">
                    <img src="img\Agnes-logo.png" width="80">
                    <span class="text-black">COLEGIO AGNES GONXHA</span>
                </div>
                <div class="col-4">
                    <a href="Reglamento-biblioteca-resumen.pdf" class="link-light" download="Reglamento-biblioteca-2022">
                        Reglamento
                        </a>
                </div>
                <div class="row" style="margin-top: auto; margin-bottom:auto;">
                    <form action="{{route('buscar')}}" method="POST">
                        @csrf
                        <input type="search" class="input-search col-md-5 col-sm-5" width="800px" name="buscar" id="buscar" autocomplete="off" placeholder="    BUSCAR POR TITULO, AUTOR, EDITORIAL O TEMA" value="{{$buscar != ''?$buscar:''}}">
                        @if ($libros->count() == 0)
                          <button type="submit" class="button-search" disabled><i class="fas fa-search"></i> Buscar</button>
                          @if ($buscar != '' || $libros->count() == 0)
                          <a class=" button-search-cancelar" href="{{route('home')}}"><i class="fas fa-times"></i> Cancelar</a>
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
            <div class="row text-center mt-4">
                <div class="col-md-6">
                    <div class="titulos">
                        <span>Recomendacion del mes</span>
                    </div>
                    <div class="recuadro">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="img\semana.jpeg" width="200" data-bs-toggle="modal" data-bs-target="#modelId" class="zoom heartbeat">
                              </div>
                              <div class="carousel-item">
                                <img src="img\semana2.png" width="200" data-bs-toggle="modal" data-bs-target="#modelId2" class="zoom heartbeat">
                              </div>
                              <div class="carousel-item">
                                <img src="img\semana.jpeg" width="200" data-bs-toggle="modal" data-bs-target="#modelId" class="zoom heartbeat">
                              </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="titulos">
                        <span>Top 10 mas leidos</span>
                    </div>
                    
                    <div id="global" class="recuadro table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Autor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error, unde!</td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                </tr>
                                <tr>
                                    <td scope="row">Lorem ipsum dolor sit amet consectetur. </td>
                                    <td>Lorem ipsum dolor sit. </td>
                                </tr>
                                <tr>
                                    <td scope="row">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error, unde!</td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                </tr>
                                <tr>
                                    <td scope="row">Lorem ipsum dolor sit amet consectetur. </td>
                                    <td>Lorem ipsum dolor sit. </td>
                                </tr>
                                <tr>
                                    <td scope="row">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error, unde!</td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            
            <!-- Modal imagen 1 -->
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
            <div class="modal fade" id="modelId2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
            
            
        </div>
        <footer class="bg-light mt-4 text-center fixed-bottom text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
              Encargadas: Iliana Orduño, Norma Martínez.
              <br>
              <span style="font-size:10px">© 2022 Copyright Colegio Agnes Gonxha</span>
              @if (Route::has('login'))
              <div class="text-right links">
                  @auth
                      <a href="{{ url('/home') }}" class="btn btn-sm btn-warning">Inicio</a>
                  @else
                      <a href="{{ route('login') }}" class="btn btn-sm btn-primary">INICIAR SESION</a>
                  @endauth
              </div>
          @endif
            </div>
            <!-- Copyright -->
          </footer>
    </body>
</html>
