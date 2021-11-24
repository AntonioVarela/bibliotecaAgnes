

<?php $__env->startSection('content'); ?>
<div class="container p-4">
    <div class="row text-center" >
    <h2 >Usuarios</h2>
    <div class="row justify-content-center pr-3 pb-3">
      <div class="p-2">
        <form action="<?php echo e(route('buscarPrestamo')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <input type="search" class="input-search col-md-8 col-sm-8" name="buscar" id="buscar" autocomplete="off" placeholder="Buscar por titulo, autor, editorial o tema" value="<?php echo e($buscar != ''?$buscar:''); ?>">
          <?php if($usuarios->count() == 0): ?>
            <button type="submit" class="button-search" disabled><i class="fas fa-search"></i> Buscar</button>
            <?php if($buscar != '' || $usuarios->count() == 0): ?>
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
    <div class="row table-responsive" >
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                  <th scope="col">Clave</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido Paterno</th>
                  <th scope="col">Apellido Materno</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <th scope="row"><?php echo e($usuario->clave); ?></th>
                  <td><?php echo e(ucwords($usuario->nombre)); ?></td>
                  <td><?php echo e(ucwords($usuario->apellidoP)); ?></td>
                  <td><?php echo e(ucwords($usuario->apellidoM)); ?></td>
                  <td>
                    <a href="modificarlibro/<?php echo e($usuario->id); ?>" class="link-primary" title="Modificar"><i class="fas fa-edit"></i></a>
                    <form action="<?php echo e(route('eliminaLibro',['id'=>$usuario->id])); ?>" name="eliminarLibro" method="post"><?php echo csrf_field(); ?><button type="button" onclick="eliminar()" class="link-primary" style="border:none; padding: 0; background: none;" title="Eliminar"><i class="fas fa-trash"></i></button></form>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                
              </tbody>
        </table>
    </div>
    <div class="row justify-content-center">
      <div class="col-1">
        <?php echo e($usuarios->links()); ?>

      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Biblioteca\resources\views/usuarios.blade.php ENDPATH**/ ?>