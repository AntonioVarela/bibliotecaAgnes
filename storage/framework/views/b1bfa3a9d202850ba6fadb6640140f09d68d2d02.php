<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
        <!-- Styles -->
        <style>
           body {
               background-image: url("img/biblioteca.jpg");
               background-repeat: no-repeat;
               background-position: center center;
               background-attachment: fixed;
               -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                }

                .carta {
                    background-color: #ffffff85;
                    padding: 12%;
                    margin-top: 50px;
                }
        </style>
    </head>
    <body>        
        <div class="container">
            <div class="row">
                <div class="col-8-md text-center carta">
                    <img src="img\logo.png" alt="" width="500" >
                    <p class="h1 text-dark">
                        Sistema Virtual de Biblioteca 
                    </p>
                    <?php if(Route::has('login')): ?>
                    <div class="text-right links">
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(url('/home')); ?>" class="btn btn-warning">Home</a>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="btn btn-primary">Iniciar Sesion</a>
      
                            
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </body>
</html>
<?php /**PATH C:\laragon\www\Biblioteca\resources\views/welcome.blade.php ENDPATH**/ ?>