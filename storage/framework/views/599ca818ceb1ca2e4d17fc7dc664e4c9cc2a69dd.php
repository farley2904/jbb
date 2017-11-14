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
				<h4><!-- <a href="<?php echo e(route('articles.show',['alias'=>$article->alias])); ?>"> --><?php echo e($article->title); ?><!-- </a> --></h4>
				<p><?php echo $article->desc; ?></p>
				<!-- <a href="<?php echo e(route('articles.show',['alias'=>$article->alias])); ?>" class="link"><?php echo e(trans('site.read_more')); ?></a> -->
			</div>
		</div>
	</article>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	        <section class="pagination">
	        	<?php if($articles->lastPage()>1): ?>
	        	<ul>

	        		<?php if($articles->currentPage() !==1 ): ?>
	        		<li><a href="<?php echo e($articles->url($articles->currentPage()-1)); ?>" title="Назад" >&laquo;</a></li>
	        		<?php endif; ?>

	        		<?php for($i=1; $i <= $articles->lastPage(); $i++): ?>
	        			<?php if( $articles->currentPage() == $i ): ?>
	        			<li><a title="" class="pag-active" ><?php echo e($i); ?></a></li>
	        			<?php else: ?>
	        			<li><a href="<?php echo e($articles->url($i)); ?>" title=""><?php echo e($i); ?></a></li>
	        			<?php endif; ?>
	        		<?php endfor; ?>

	        		<?php if($articles->currentPage() !== $articles->lastPage() ): ?>
	        		<li><a href="<?php echo e($articles->url($articles->currentPage()+1)); ?>" title="Вперед">&raquo;</a></li>
	        		<?php endif; ?>
                    
	        	</ul>
	        	<?php endif; ?>         
            </section>
 
<?php endif; ?>
 
