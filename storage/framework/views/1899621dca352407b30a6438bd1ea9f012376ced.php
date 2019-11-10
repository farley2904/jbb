<section class="pagination">
	        	<?php if($paginator->lastPage()>1): ?>
	        	<ul>

	        		<?php if($paginator->currentPage() !==1 ): ?>
	        		<li><a href="<?php echo e($paginator->url($paginator->currentPage()-1)); ?>" title="Назад" >&laquo;</a></li>
	        		<?php endif; ?>

	        		<?php for($i=1; $i <= $paginator->lastPage(); $i++): ?>
	        			<?php if( $paginator->currentPage() == $i ): ?>
	        			<li><a title="" class="pag-active" ><?php echo e($i); ?></a></li>
	        			<?php else: ?>
	        			<li><a href="<?php echo e($paginator->url($i)); ?>" title=""><?php echo e($i); ?></a></li>
	        			<?php endif; ?>
	        		<?php endfor; ?>

	        		<?php if($paginator->currentPage() !== $paginator->lastPage() ): ?>
	        		<li><a href="<?php echo e($paginator->url($paginator->currentPage()+1)); ?>" title="Вперед">&raquo;</a></li>
	        		<?php endif; ?>
                    
	        	</ul>
	        	<?php endif; ?>         
</section>