<?php $__env->startSection('navigation'); ?>
	<?php echo $navigation; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
	<?php echo $logo; ?>

	<?php echo $header; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php echo $content; ?>


	<?php echo $contact_form; ?>


	<?php if(!Auth::guest()): ?>
	
	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
	<?php echo $footer; ?>

<?php $__env->stopSection(); ?>




<?php echo $__env->make(env('THEME').'.layouts.site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>