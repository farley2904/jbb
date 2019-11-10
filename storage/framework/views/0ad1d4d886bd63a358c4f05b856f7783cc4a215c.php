<?php if($article): ?>
<article>
	<div class="wow fadeInUp">
		<h4><?php echo e($article->title); ?></h4>
		
	</div>
	<div class="col-sm-preffix-1 wow fadeInRight">
		<?php echo $article->text; ?>

		
	</div>
</article>
<?php endif; ?>
				               