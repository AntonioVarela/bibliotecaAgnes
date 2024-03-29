

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($libros->count() == 0): ?>
<div class="alert alert-danger" role="alert">
  No hay libro registrados
</div>
<?php endif; ?>

<div class="container p-4" >
  <a href="captura" class="btn-flotante"><i class="fas fa-plus"></i> Nuevo Libro</a>
  <div class="row text-center" >
    <h2 >Libros en existencia</h2>
    <div class="row justify-content-center pr-3 pb-3">
      <div class="p-2">
        <form action="<?php echo e(route('buscar')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <input type="search" class="input-search col-md-8 col-sm-8" name="buscar" id="buscar" autocomplete="off" placeholder="Buscar por titulo, autor, editorial o tema" value="<?php echo e($buscar != ''?$buscar:''); ?>">
          <?php if($libros->count() == 0): ?>
            <button type="submit" class="button-search" disabled><i class="fas fa-search"></i> Buscar</button>
            <?php if($buscar != '' || $libros->count() == 0): ?>
            <a class=" button-search-cancelar" href="<?php echo e(route('home')); ?>"><i class="fas fa-times"></i> Cancelar</a>
            <?php endif; ?>
            <?php else: ?>
            <button type="submit" class="button-search"><i class="fas fa-search"></i> Buscar</button>
            <?php if($buscar != ''): ?>
            <a class="button-search-cancelar" href="<?php echo e(route('home')); ?>"><i class="fas fa-times"></i> Cancelar</a>
            <?php endif; ?>
          <?php endif; ?>
        </form>
      </div>
    </div>
  </div>    
    <div class="row table-responsive" >
        <table class="table table-striped ">
            <thead class="table-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Titulo</th>
                  <th scope="col">Autor</th>
                  <th scope="col">Editorial</th>
                  <th scope="col">N° Ed.</th>
                  <th scope="col">Tema</th>
                  <th scope="col">Tipo</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class=".shadow-drop-2-br">
                  <th  data-toggle="modal" data-target="#modelId<?php echo e($libro->id); ?>" scope="row"><?php echo e($libro->identificador); ?></th>
                  <td data-toggle="modal" data-target="#modelId<?php echo e($libro->id); ?>"><?php echo e(ucwords($libro->titulo)); ?></td>
                  <td data-toggle="modal" data-target="#modelId<?php echo e($libro->id); ?>"><?php echo e(ucwords($libro->autor)); ?></td>
                  <td data-toggle="modal" data-target="#modelId<?php echo e($libro->id); ?>"><?php echo e(ucwords($libro->editorial)); ?></td>
                  <td data-toggle="modal" data-target="#modelId<?php echo e($libro->id); ?>"><?php echo e(ucwords($libro->NEdicion)); ?></td>
                  <td data-toggle="modal" data-target="#modelId<?php echo e($libro->id); ?>"><?php echo e($libro->tema); ?></td>
                  <td data-toggle="modal" data-target="#modelId<?php echo e($libro->id); ?>"><?php echo e($libro->tipo); ?></td>
                  <td>
                    <a href="modificarlibro/<?php echo e($libro->id); ?>" style="color: #0f9fd6;" title="Modificar"><i class="fas fa-edit"></i></a>
                    <form action="<?php echo e(route('eliminaLibro',['id'=>$libro->id])); ?>" name="eliminarLibro" id="eliminarLibro<?php echo e($libro->id); ?>" method="post"><?php echo csrf_field(); ?><button type="button" onclick="eliminar(<?php echo e($libro->id); ?>)" style="border:none; padding: 0; background: none; color:#0f9fd6;" title="Eliminar"><i class="fas fa-trash"></i></button></form>
                  </td>
                </tr>


                <!-- Modal -->
                <div class="modal fade" id="modelId<?php echo e($libro->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <?php if($libro->categoria == "Bronce"): ?>
                      <div class="modal-header" style="background: linear-gradient(90deg, rgba(226,139,52,1) 0%, rgba(255,255,255,1) 100%);">
                      <?php else: ?>
                          <?php if($libro->categoria == "Plata"): ?>
                          <div class="modal-header" style="background: linear-gradient(90deg, rgba(138,149,151,1) 0%, rgba(255,255,255,1) 100%);">
                          <?php else: ?>
                              <?php if($libro->categoria == "Oro"): ?>
                              <div class="modal-header" style="background: linear-gradient(90deg, rgba(255,191,0,1) 0%, rgba(255,255,255,1) 100%);">
                              <?php else: ?>
                              <div class="modal-header" style="background: linear-gradient(90deg, rgba(4,189,205,1) 0%, rgba(255,255,255,1) 100%);">
                              <?php endif; ?>
                          <?php endif; ?>
                      <?php endif; ?>
                        
                            <h5 class="modal-title"><?php echo e(ucwords($libro->titulo)); ?> (Posicion: <?php echo e($libro->identificador); ?>)</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                      <div class="modal-body">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-6">
                              <span><strong style="color:#085a7a;">Autor:</strong> <?php echo e(ucwords($libro->autor)); ?></span><br>
                              <span><strong style="color:#085a7a;">Editorial:</strong> <?php echo e(ucwords($libro->editorial)); ?></span><br>
                              <span><strong style="color:#085a7a;">N° Edicion:</strong> <?php echo e($libro->NEdicion); ?></span><br>
                              <span><strong style="color:#085a7a;">ISBN:</strong> <?php echo e($libro->isbn); ?></span><br>
                              <span><strong style="color:#085a7a;">Barcode:</strong> <?php echo e($libro->codigobarras); ?></span><br>
                              <span>Busca tu libro en internet <strong style="color:#085a7a;"><a href="https://www.google.com/search?q=<?php echo e($libro->isbn); ?>" target="_blank">AQUI</a></strong></span><br>
                            </div>
                            <div class="col-6">
                              <span><strong style="color:#085a7a;">Autor2:</strong> <?php echo e(ucwords($libro->autor2)); ?></span><br>
                              <span><strong style="color:#085a7a;">Tema:</strong> <?php echo e($libro->tema); ?></span><br>
                              <span><strong style="color:#085a7a;">Tipo:</strong> <?php echo e($libro->tipo); ?></span><br>
                              <span><strong style="color:#085a7a;">Idioma:</strong> <?php echo e($libro->idioma); ?></span><br>
                              <span><strong style="color:#085a7a;">Tipo:</strong> <?php echo e($libro->tipo); ?></span><br>
                              <span><strong style="color:#085a7a;">Año:</strong> <?php echo e($libro->anio); ?></span><br>
                            </div>
                            <span><strong style="color:#085a7a;">Notas:</strong> <?php echo e($libro->notas); ?></span>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                
              </tbody>
        </table>
    </div>
    <div class="row justify-content-center">
      <div class="col-12">
        <?php echo e($libros->links()); ?>

      </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Biblioteca\resources\views/home.blade.php ENDPATH**/ ?>