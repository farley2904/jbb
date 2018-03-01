<?php $__env->startSection('navigation'); ?>
	<?php echo $navigation; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<p style="color: purple;text-align: center" >Данной страницы не существует ;)</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
	<?php echo $__env->make(env('THEME').'.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(env('THEME').'.layouts.site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>