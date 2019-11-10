<?php if($menu): ?>
<div class="rd-navbar-wrap">
	<nav class="rd-navbar" data-rd-navbar-lg="rd-navbar-fullwidth">
		<div class="rd-navbar-inner">
		 
			<div class="rd-navbar-panel">
			 
				<button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar"><span></span></button>
				 
				 
				<div class="rd-navbar-brand wow fadeInUp">
					<a href="<?php echo e(url(Jbb\Http\Middleware\LocaleMiddleware::getLocale() . '/')); ?>" class="rd-navbar-brand__name heading-2"><?php echo e(config('app.name', 'Jbb')); ?></a>
				</div>
			 
			</div>
			 
			<div class="rd-navbar-nav-wrap">
				<ul class="rd-navbar-nav">
				<?php echo $__env->make(env('THEME').'.customMenuItems',['items'=>$menu->roots()], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			 	</ul>
			</div>
		</div>
	</nav>
</div>

<?php endif; ?>


