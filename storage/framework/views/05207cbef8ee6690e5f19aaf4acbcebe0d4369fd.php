<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('select2-4.0.13\dist\js\select2.min.js')); ?>" defer></script>
    <link href="<?php echo e(asset("select2-4.0.13\dist\css\select2.min.css")); ?>" rel="stylesheet" type="text/css" />
    <!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.12.0/js/all.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/basico.css')); ?>" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <img src="<?php echo e(asset('img/logo.png')); ?>" alt="" width="200">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto nav-pills">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>   <?php else: ?>
                        <li>
                            <a class="nav-link menu-a <?php echo e(Request::is('home') ? 'active2' : ''); ?>" href="<?php echo e(route('home')); ?>">Inicio</a>
                        </li>
                        <li>
                            <a class="nav-link menu-a <?php echo e(Request::is('prestamos') ? 'active2' : ''); ?>" href="<?php echo e(route('prestamos')); ?>">Prestamos</a>
                        </li>
                        <li>
                            <a class="nav-link menu-a <?php echo e(Request::is('usuarios') ? 'active2' : ''); ?>" href="<?php echo e(route('usuarios')); ?>">Usuarios</a>
                        </li>
                        <li>
                            <a class="nav-link menu-a <?php echo e(Request::is('informes') ? 'active2' : ''); ?>" href="<?php echo e(route('informes')); ?>">Informes</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle menu-a" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
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
            Swal.fire({
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

        function cambioColor() {
            if (document.getElementById("subir").files.length != 0) {
                var fileName = document.getElementById("subir").files[0].name;
                document.getElementById('subirIcono').style.color = '#00ce23';
            }
        }
        $(document).ready(function() {
    $('#idLibro').select2();
    $('#idUsuario').select2();
});
function cambia(event) {
    var codigo = event.key;
    var text = $( "#titulo" ).val();
    $( "#titulo2" ).val(text);
}
    </script>
</body>

</html><?php /**PATH C:\laragon\www\Biblioteca\resources\views/layouts/app.blade.php ENDPATH**/ ?>