<?php if(count($slider)>0): ?>
<?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<span class="icon icon-md wow fadeInUp"><a href="<?php echo e(url('/')); ?>" class=""><img src="<?php echo e(asset(env('THEME'))); ?>/images/<?php echo e($slide->img); ?>" title="Jbb" alt="" /></a></span>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>



