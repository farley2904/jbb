<?php $__env->startSection('navigation'); ?>
	<?php echo $navigation; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
	<?php echo $logo; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php echo $content; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
	<?php echo $footer; ?>

<?php $__env->stopSection(); ?>




<?php echo $__env->make(env('THEME').'.layouts.site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>