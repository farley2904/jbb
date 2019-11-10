<?php if($articles): ?>

	<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<article class="row text-sm-left news-post">
			<div class="col-sm-6 <?php echo e(($k%2==0) ? '' : 'col-md-preffix-1 col-sm-push-2'); ?> wow fadeInUp">
				<div class="content">
					<div class="content__head">
						<span class="line">
							<time datetime="<?php echo e($article->created_at->format('Y-m-d')); ?>"><?php echo e($article->created_at->format('F d, Y')); ?></time>
							<!-- <span class="icon icon-xs icon-primary material-icons-chat_bubble"></span> -->
							
						</span>
					</div>
					<div class="image-wrap <?php echo e(($k%2==0) ? 'shadow-right' : 'shadow-left'); ?>">
						<img src="<?php echo e(asset(env('THEME'))); ?>/images/articles/<?php echo e($article->img); ?>" alt="" width="570" height="570">
					</div>
				</div>
			</div>
			<div class="col-sm-preffix-1 col-sm-5 col-md-4 inset-1 wow 	<?php echo e(($k%2==0) ? 'fadeInRight' : 'col-sm-push-1 fadeInLeft'); ?>  ">
				<div class="<?php echo e(($k%2==0) ? 'line-right' : 'line-left'); ?>">
					<h4><!-- <a href=""> --><?php echo e($article->title); ?><!-- </a> --></h4>
					<?php echo $article->desc; ?>

					<!-- <a href="" class="link"></a> -->
				</div>
			</div>
		</article>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
<?php if($articles instanceof \Illuminate\Pagination\LengthAwarePaginator ): ?>			
	<?php echo e($articles->links(env('THEME').'.pagination')); ?>

<?php endif; ?>
 
<?php endif; ?>
 
