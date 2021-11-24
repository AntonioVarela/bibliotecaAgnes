

<?php $__env->startSection('content'); ?>
<div class="container" style="background-color: #00000085; padding:3% 7%;">
    <form action="guarda" method="post">
        <?php echo csrf_field(); ?>
    <div class="row justify-content-center text-center text-white">
        <h2>Nuevo Prestamos</h2>
        
    </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Biblioteca\resources\views/nuevoPrestamo.blade.php ENDPATH**/ ?>