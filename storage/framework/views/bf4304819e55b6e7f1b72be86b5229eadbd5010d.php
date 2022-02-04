

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container p-4" >
    <div class="row text-center" >
    <h2 >Prestamos (Activos)</h2>
    <div class="row justify-content-center pr-3 pb-3">
      <div class="p-2">
        <form action="<?php echo e(route('buscarPrestamo')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <input type="search" class="input-search col-md-8 col-sm-8" name="buscar" id="buscar" autocomplete="off" placeholder="Buscar por Titulo de libro o Clave de usuario" value="<?php echo e($buscar != ''?$buscar:''); ?>">
          <?php if($libros->count() == 0): ?>
            <button type="submit" class="button-search" disabled><i class="fas fa-search"></i> Buscar</button>
            <?php if($buscar != '' || $libros->count() == 0): ?>
            <a class=" button-search-cancelar" href="<?php echo e(route('prestamos')); ?>"><i class="fas fa-times"></i> Cancelar</a>
            <?php endif; ?>
            <?php else: ?>
            <button type="submit" class="button-search"><i class="fas fa-search"></i> Buscar</button>
            <?php if($buscar != ''): ?>
            <a class="button-search-cancelar" href="<?php echo e(route('prestamos')); ?>"><i class="fas fa-times"></i> Cancelar</a>
            <?php endif; ?>
          <?php endif; ?>
        </form>
      </div>
    </div>
    </div>
    <?php if($usuarios->count() == 0): ?>
    <div class="row text-center">
        <h1 class="display-4">No hay usuarios para hacer prestamos</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-usuario"  data-bs-toggle="modal" data-bs-target="#exampleModal">
            Presiona aqui para agregar uno nuevo
        </button>
    </div>
    <?php else: ?>
    <?php if($libros->count() == 0): ?>
    <div class="row text-center">
        <h1 class="display-4">No hay libros para hacer prestamos</h1>
    </div>
    <?php else: ?>
    <button class="btn-flotante" type="button" data-bs-toggle="modal" data-bs-target="#modalPrestamos">
        <i class="fas fa-plus"></i> Nuevo Prestamo
    </button>
    <div class="row table-responsive" >
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                  <th scope="col">Titulo</th>
                  <th scope="col">Autor</th>
                  <th scope="col">Usuario</th>
                  <th scope="col">prestamo</th>
                  <th scope="col">Entrega</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $prestamosA; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prestamo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(date('Y-m-d',strtotime("-1 days")) >= $prestamo->entrega ): ?>
              <tr class="table-danger">
              <?php else: ?>
              <tr>
              <?php endif; ?>
                    <?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($prestamo->idLibro == $libro->id): ?>
                    <td><?php echo e(ucwords($libro->titulo)); ?></td>
                    <td><?php echo e(ucwords($libro->autor)); ?></td>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                    <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <td><?php echo e($prestamo->idUsuario == $usuario->id?ucwords($usuario->nombre).' '.ucwords($usuario->apellidoP).' '.ucwords($usuario->apellidoM):''); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <td><?php echo e($prestamo->prestamo); ?></td>
                    <td><?php echo e($prestamo->entrega); ?></td>
                  <td>
                    <a href="<?php echo e(route('devuelve', ['id' => $prestamo->id])); ?>" style="color: RED;" title="Modificar">Devolver</a>
                  </form>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                
              </tbody>
        </table>
    </div>
    <div class="row justify-content-center">
      <div class="col-1">
        
      </div>
    </div>
    <?php endif; ?>
    <div class="row justify-content-center">
        <div class="col-1">
          <?php echo e($prestamosA->links()); ?>

        </div>
      </div>
    <?php endif; ?>
    
</div>

<div class="container p-4" >
  <div class="row text-center" >
  <h2 >Historico</h2>
  </div>
  <?php if($usuarios->count() == 0): ?>
  <div class="row text-center">
      <h1 class="display-4">No hay usuarios para hacer prestamos</h1>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-usuario"  data-bs-toggle="modal" data-bs-target="#exampleModal">
          Presiona aqui para agregar uno nuevo
      </button>
  </div>
  <?php else: ?>
  <?php if($libros->count() == 0): ?>
  <div class="row text-center">
      <h1 class="display-4">No hay libros para hacer prestamos</h1>
  </div>
  <?php else: ?>
  <button class="btn-flotante" type="button" data-bs-toggle="modal" data-bs-target="#modalPrestamos">
      <i class="fas fa-plus"></i> Nuevo Prestamo
  </button>
  <div class="row table-responsive" >
      <table class="table table-striped">
          <thead class="table-dark">
              <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Autor</th>
                <th scope="col">Usuario</th>
                <th scope="col">prestamo</th>
                <th scope="col">Entrega</th>
                <th>Devuelto</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $prestamos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prestamo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                  <?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($prestamo->idLibro == $libro->id): ?>
                  <td><?php echo e(ucwords($libro->titulo)); ?></td>
                  <td><?php echo e(ucwords($libro->autor)); ?></td>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                  <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                  <td><?php echo e($prestamo->idUsuario == $usuario->id?ucwords($usuario->nombre).' '.ucwords($usuario->apellidoP).' '.ucwords($usuario->apellidoM):''); ?></td>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <td><?php echo e($prestamo->prestamo); ?></td>
                  <td><?php echo e($prestamo->entrega); ?></td>
                  <td><?php echo e($prestamo->updated_at); ?></td>
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
              
            </tbody>
      </table>
  </div>
  <div class="row justify-content-center">
    <div class="col-1">
      
    </div>
  </div>
  <?php endif; ?>
  <div class="row justify-content-center">
      <div class="col-1">
        <?php echo e($prestamos->links()); ?>

      </div>
    </div>
  <?php endif; ?>
  
</div>

<!-- Modal prestamos -->
  <div class="modal fade" id="modalPrestamos" tabindex="-1" aria-labelledby="modalPrestamosLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalPrestamosLabel">Hacer Prestamo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?php echo e(route('prestamoPOST')); ?>" id="PrestamoPOST" method="post">
            <?php echo csrf_field(); ?>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Libro: </label>
                    <select name="idLibro" id="idLibro" class="form-select">
                        <?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($libro->id); ?>"><?php echo e($libro->titulo); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="apellidoP" class="form-label">Usuario: </label>
                    <select name="idUsuario" id="idUsuario" class="form-select">
                        <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($usuario->id); ?>"><?php echo e($usuario->nombre); ?> <?php echo e($usuario->apellidoP); ?> <?php echo e($usuario->apellidoM); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <button type="button" class="btn btn-usuario" title="Agregar Usuario" data-bs-toggle="modal" data-bs-target="#exampleModal" style="position: relative;left:10%;">
                      <i class="fas fa-user-plus"></i>
                    </button>
                
                  </div>
                  <div class="mb-3">
                    <label for="fechaPrestamo" class="form-label">Fecha Prestamo</label>
                    <input type="date" class="form-control" id="fechaPrestamo" value="<?php echo date('Y-m-d'); ?>" name="fechaPrestamo" required>
                  </div>        
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            
            <button type="button" onclick="confirmarPrestamo()" class="btn btn-primary">Guardar</button>

            </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal usuarios -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?php echo e(route('usuarioPOST')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="modal-body">
          
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="apellidoP" class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" id="apellidoP" name="apellidoP" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="apellidoM" class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" id="apellidoM" name="apellidoM" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <select name="tipo" id="tipo" class="form-select">
                        <option value="Alumno">Alumno</option>
                        <option value="Maestro">Maestro</option>
                    </select>
                  </div>
        
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Biblioteca\resources\views/prestamos.blade.php ENDPATH**/ ?>