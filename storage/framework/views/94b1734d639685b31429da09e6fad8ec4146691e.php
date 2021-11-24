

<?php $__env->startSection('content'); ?>
<div class="container" style="background-color: #00000085; padding:3% 7%; box-shadow: black 5px 7px 12px;">
    <form action="<?php echo e(route('modificaLibro', ['id' => $libro->id])); ?>" enctype="multipart/form-data" method="post">
        <?php echo csrf_field(); ?>
    <div class="row justify-content-center text-center text-white">
        <h2>Modificar Libro</h2>
        <div class="col-6">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Titulo</span>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo e($libro->titulo =! '' ? $libro->titulo : ''); ?>" aria-describedby="basic-addon3" required>
            </div>  
        </div>
              <div class="col-6">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">Identificador</span>
                    <input type="text" class="form-control" id="identificador" name="identificador" value="<?php echo e($libro->identificador =! '' ? $libro->identificador : ''); ?>" required aria-describedby="basic-addon3">
                </div>  
              </div>        
    </div>
    <div class="row">
        <div class="col-6">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Autor</span>
                <input type="text" class="form-control" id="autor" name="autor" value="<?php echo e($libro->autor =! '' ? $libro->autor:""); ?>" aria-describedby="basic-addon3">
                
            </div>
        </div>
        <div class="col-6">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Autor 2</span>
                <input type="text" class="form-control" id="autor2" name="autor2" value="<?php echo e($libro->autor2 =! '' ? $libro->autor2 : ""); ?>" aria-describedby="basic-addon3">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Editorial</span>
                <input type="text" class="form-control" id="editorial" name="editorial" value="<?php echo e($libro->editorial =! '' ? $libro->editorial : ""); ?>" aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="col-6">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">N° Edicion</span>
                <input type="text" class="form-control" id="NEdicion" name="NEdicion" value="<?php echo e($libro->NEdicion =! '' ? $libro->NEdicion : ""); ?>" aria-describedby="basic-addon3">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Codigo de Barras</span>
                <input type="text" class="form-control" id="codigobarras" name="codigobarras" value="<?php echo e($libro->codigobarras =! '' ? $libro->codigobarras : ""); ?>" aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="col-4">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">ISBN</span>
                <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo e($libro->isbn =! '' ? $libro->isbn : ""); ?>" aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="col-4">
            <div class="input-group  mb-3">
                <span class="input-group-text" id="basic-addon3">Categoria</span>
                <select class="form-select" id="idioma" name="categoria" aria-describedby="basic-addon3">
                    <option value="Bronce" <?php echo e($libro->categoria == "Bronce"?'selected': ''); ?>>Bronce</option>
                    <option value="Plata"  <?php echo e($libro->categoria == "Plata"?'selected': ''); ?>>Plata</option>
                    <option value="Oro"  <?php echo e($libro->categoria == "Oro"?'selected': ''); ?>>Oro</option>
                    <option value="Platino"  <?php echo e($libro->categoria == "Platino"?'selected': ''); ?>>Platino</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Tema</span>
                <select class="form-control" id="tema" name="tema" aria-describedby="basic-addon3">
                    <option value="Español" <?php echo e($libro->tema == "Español"?'selected': ''); ?>>Español</option>
                    <option value="Matematicas" <?php echo e($libro->tema == "Matematicas"?'selected': ''); ?>>Matematicas</option>
                    <option value="Geografia" <?php echo e($libro->tema == "Geografia"?'selected': ''); ?>>Geografia</option>
                    <option value="Historia" <?php echo e($libro->tema == "Historia"?'selected': ''); ?>>Historia</option>
                    <option value="Literatura" <?php echo e($libro->tema == "Literatura"?'selected': ''); ?>>Literatura</option>
                    <option value="Gramatica" <?php echo e($libro->tema == "Gramatica"?'selected': ''); ?>>Gramatica</option>
                    <option value="Biologia" <?php echo e($libro->tema == "Biologia"?'selected': ''); ?>>Biologia</option>
                    <option value="Quimica" <?php echo e($libro->tema == "Quimica"?'selected': ''); ?>>Quimica</option>
                    <option value="Fisica" <?php echo e($libro->tema == "Fisica"?'selected': ''); ?>>Fisica</option>
                    <option value="Otro" <?php echo e($libro->tema == "Otro"?'selected': ''); ?>>Otro</option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Idioma</span>
                <select class="form-control" id="idioma" name="idioma" aria-describedby="basic-addon3">
                    <option value="Español" <?php echo e($libro->idioma == "Español"?'selected': ''); ?>>Español</option>
                    <option value="Ingles"  <?php echo e($libro->idioma == "Ingles"?'selected': ''); ?>>Ingles</option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Tipo</span>
                <select class="form-control" id="tipo" name="tipo" aria-describedby="basic-addon3">
                    <option value="Libro" <?php echo e($libro->tipo == "Libro"?'selected': ''); ?>>Libro</option>
                    <option value="Comic" <?php echo e($libro->tipo == "Comic"?'selected': ''); ?>>Comic</option>
                    <option value="Revista" <?php echo e($libro->tipo == "Revista"?'selected': ''); ?>>Revista</option>
                    <option value="Diccionario" <?php echo e($libro->tipo == "Diccionario"?'selected': ''); ?>>Diccionario</option>
                    <option value="Monografías" <?php echo e($libro->tipo == "Monografías"?'selected': ''); ?>>Monografías</option>
                    <option value="Recreativos" <?php echo e($libro->tipo == "Recreativos"?'selected': ''); ?>>Recreativos</option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Año</span>
                <input type="text" class="form-control" id="anio" name="anio" value="<?php echo e($libro->anio =! '' ? $libro->anio : ""); ?>" aria-describedby="basic-addon3">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Notas</span>
                <textarea class="form-control" id="notas" name="notas" aria-describedby="basic-addon3"><?php echo e($libro->notas =! '' ? $libro->notas : ""); ?>

                </textarea>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-3">
            <button type="submit" class="button-search">Guardar</button>
            <a href="<?php echo e(route('home')); ?>" class="button-search-cancelar">Cancelar</a>
        </div>
    </div>
</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Biblioteca\resources\views/modificaLibro.blade.php ENDPATH**/ ?>