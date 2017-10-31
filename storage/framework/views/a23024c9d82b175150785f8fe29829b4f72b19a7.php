<?php if($articles): ?>

	<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<article style="margin-bottom:20px;background:#fff;">

		&nbsp; <?php echo e($article->id); ?> . &nbsp;
			
		<img src="<?php echo e(asset(env('THEME'))); ?>/images/articles/<?php echo e($article->img); ?>" alt="" width="100" height="100">
			

		&emsp; <?php echo e($article->title); ?> &emsp;

		<?php echo $article->desc; ?>


		</article>

	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

 
<?php endif; ?>
 
