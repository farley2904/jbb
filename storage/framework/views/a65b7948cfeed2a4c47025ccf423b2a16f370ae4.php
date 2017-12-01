<?php $__env->startSection('navigation'); ?>
	<?php echo $navigation; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
	<?php echo $footer; ?>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make(env('THEME').'.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>