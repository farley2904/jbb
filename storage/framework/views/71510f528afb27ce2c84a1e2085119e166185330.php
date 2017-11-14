
<section class="well-md text-center">


<div class="container" data-lightbox="gallery">
 <div class="btn-group">

		<?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<a href="<?php echo e(route('portfoliosFilter',['filter_alias' => $filter->alias])); ?>">

			
				<div class="btn btn-sm btn-default<?php echo e((URL::current() == route('portfoliosFilter',['filter_alias' => $filter->alias])) ? "-active" : ''); ?>"><?php echo e($filter->title); ?></div>
			</a>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

<h1 class="section-head-left"><?php echo e($title); ?></h1>

<?php if($portfolios): ?>

<?php $__currentLoopData = $portfolios->chunk(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="row text-sm-left">

<?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="col-sm-6 wow <?php echo e(($k%2==0) ? 'fadeInRight' : 'fadeInLeft'); ?>">
<div class="image-wrap <?php echo e(($k%2==0) ? 'shadow-right postfix-1' : 'shadow-left preffix-1'); ?> ">

<a href="<?php echo e(asset(env('THEME'))); ?>/images/portfolios/<?php echo e($portfolio->img->path); ?>" class="thumb thumb--effect-apollo" data-lightbox="image">

<img src="<?php echo e(asset(env('THEME'))); ?>/images/portfolios/<?php echo e($portfolio->img->lg); ?>" data-srcset-base="<?php echo e(asset(env('THEME'))); ?>/images/portfolios/" data-srcset-ext="_<?php echo e($portfolio->img->path); ?>" data-srcset="sm 1101w, md 1369w, lg 1400w" alt="" width="540" height="540">

<div class="thumb__overlay"></div>
</a>
</div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>
</div>
</section>
