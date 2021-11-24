

<?php $__env->startSection('content'); ?>
<div class="container">
      <ul class="nav nav-tabs  nav-fill" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Libros mas prestados</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Niños con mas prestamos</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Libros no devueltos</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="download-tab" data-bs-toggle="tab" data-bs-target="#download" type="button" role="tab" aria-controls="download" aria-selected="false">Catalogos</button>
          </li>
      </ul>
      <div class="tab-content m-3" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <?php $__currentLoopData = $librosMasPrestados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->idLibro == $libro->id): ?>
                    El libro <span class="resalta"><?php echo e($libro->titulo); ?></span> presto <span class="resalta"><?php echo e($item->cuenta); ?></span> veces;<br>
                    0 <progress id="file" max="<?php echo e($librosMasPrestados[0]->cuenta); ?>" value="<?php echo e($item->cuenta); ?>"> <?php echo e($item->cuenta); ?> </progress> <?php echo e($librosMasPrestados[0]->cuenta); ?>

                    <hr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <?php $__currentLoopData = $usuariosConMasPrestamos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->idUsuario == $usuario->id): ?>
                    El usuario <span class="resalta"><?php echo e($usuario->nombre); ?> <?php echo e($usuario->apellidoP); ?> <?php echo e($usuario->apellidoM); ?></span> tiene un total de <span class="resalta"><?php echo e($item->cuenta); ?></span> libros prestados;<br>
                    0 <progress id="file" max="<?php echo e($usuariosConMasPrestamos[0]->cuenta); ?>" value="<?php echo e($item->cuenta); ?>"> <?php echo e($item->cuenta); ?> </progress> <?php echo e($usuariosConMasPrestamos[0]->cuenta); ?>

                    <hr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <?php $__currentLoopData = $noDevueltos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($item->idLibro == $libro->id): ?>
                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($item2->id == $item->idUsuario): ?>
                El libro <span class="resalta"><?php echo e($libro->titulo); ?> </span> tiene fecha de entrega del <span class="resalta"><?php echo e($item->entrega); ?></span> y no fue devuelto por <span class="resalta"><?php echo e($usuario->nombre); ?> <?php echo e($usuario->apellidoP); ?> <?php echo e($usuario->apellidoM); ?></span><br> <hr>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="tab-pane fade" id="download" role="tabpanel" aria-labelledby="download-tab">
            pdf <i class="fa fa-file-pdf" aria-hidden="true"></i>
            <br>
           <button class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i> Catalogo de libros</button>
           <button class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i> Catalogo de usuarios</button>
           <button class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i> usuarios Administradores</button>
           <hr>
           Excel <i class="fa fa-file-excel" aria-hidden="true"></i>
           <br>
           <button class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i> Catalogo de libros</button>
           <button class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i> Catalogo de usuarios</button>
           <button class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i> usuarios Administradores</button>
        </div>
      </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Biblioteca\resources\views/informes.blade.php ENDPATH**/ ?>