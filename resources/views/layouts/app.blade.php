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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="{{ asset('select2-4.0.13\dist\js\select2.min.js') }}" defer></script>
    <link href="{{ asset('select2-4.0.13\dist\css\select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />
<!-- Or for RTL support -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
    <!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v6.0.0/js/all.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/basico.css') }}" rel="stylesheet">

    @yield('scripts')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('img/Agnes-logo.png')}}" alt="" width="30">
                    COLEGIO AGNES GONXHA
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @auth
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto nav-pills">                        
                        <li>
                            <a class="nav-link menu-a {{ Request::is('home') ? 'active2' : '' }}" href="{{ route('home') }}">Inventario</a>
                        </li>
                        <li>
                            <a class="nav-link menu-a {{ Request::is('prestamosFast') ? 'active2' : '' }}" href="{{ route('prestamosFast') }}">Prestamos</a>
                        </li>
                        <li>
                            <a class="nav-link menu-a {{ Request::is('reservacion') ? 'active2' : '' }}" href="{{ route('reservacion') }}">Reservación</a>
                        </li>
                        @if ( Auth::user()->tipo == "administrador" || Auth::user()->tipo == "programador")
                        <li>
                            <a class="nav-link menu-a {{ Request::is('informes') ? 'active2' : '' }}" href="{{route('informes')}}">Informes</a>
                        </li>
                        @endif
                        @if (Auth::user()->tipo == "programador")
                        <li>
                            <a class="nav-link menu-a {{ Request::is('altadeusuarios') ? 'active2' : '' }}" href="{{route('altadeusuarios')}}">Usuarios</a>
                        </li>
                        <a class="nav-link menu-a {{ Request::is('etiquetas') ? 'active2' : '' }}" href="{{route('etiquetas')}}">Etiquetas</a>
                        <li></li>
                        @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle menu-a" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name}}
                                </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('password') }}">Cambiar contraseña</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                @endauth
                
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        function eliminar($id) {
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
                    document.getElementById("eliminarLibro" + $id).submit();
                }
            })
        }

        function confirmarPrestamo() {
            const {value: accept } = Swal.fire({
                title: 'Estas Seguro de prestar este libro?',
                text: "El prestamo no se puede modificar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Prestar'
            }).then((result) => {
                if (result.isConfirmed) {
                     document.getElementById("PrestamoPOST").submit();
                }
            })
        }

        function confirmarEntrega(id) {
            const { value: accept } = Swal.fire({
                title: 'Estas Seguro de recibir este libro?',
                text: "Esta accion no se puede modificar",
                icon: 'warning',
                input: 'checkbox',
                inputValue:1,
                inputPlaceholder: '¿Agregar al ranking de lectura?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "https://sistemaagnes.com/biblioteca/devuelve/"+id;
                }
            })
            if(accept) {
                window.location.href = "https://sistemaagnes.com/biblioteca/devuelveranking/"+id;
            }
        }
        function renovarPrestamo(id) {
            const { value: accept } = Swal.fire({
                title: 'Estas Seguro de renovar este libro?',
                text: "Se renovara 5 dias mas apartir de hoy",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "https://sistemaagnes.com/biblioteca/renuevaLibro/"+id;
                }
            })
        } 

        function cambioColor() {
            if (document.getElementById("subir").files.length != 0) {
                var fileName = document.getElementById("subir").files[0].name;
                document.getElementById('subirIcono').style.color = '#00ce23';
            }
        }
        $(document).ready(function() {
            $('#idLibro').select2({
                dropdownParent: $('#modalPrestamos'),
            });
            $('#idUsuario').select2({
                dropdownParent: $('#modalPrestamos'),
            });
            $('#idLibroDetalles').select2({
                dropdownParent: $('#offcanvasExample'),
            });
        });

function cambia(event) {
    var codigo = event.key;
    var text = $( "#titulo" ).val();
    $( "#titulo2" ).val(text);
}

function cambiaID(event) {
    var codigo = event.key;
    var text = $( "#identificador" ).val();
    $( "#identificador2" ).val(text);
}

function desaparece(id) {
    $("#libros158").css("position","sticky");
    $('#idLibroDetalles').select2({
                dropdownParent: $('#offcanvasExample'+id),
            });
}
function normalidad() {
    $("#libros158").css("position","relative");
}
    </script>
</body>

</html>