<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	<?php if(!$item->trashed): ?>


	<li <?php echo e((URL::current() == $item->url()) ? "class=active" : ''); ?> >
		<a href="<?php echo e($item->url()); ?>"><?php echo e($item->title); ?></a>
		

		<?php if( $item->id == 1 && isset($services)): ?>
			<ul class="rd-navbar-megamenu">
			<li>
			<h4>Прайс-лист</h4>
			<div class="pricing-table">
			<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div><span><?php echo e($service->name); ?></span><span><?php echo e($service->price); ?></span></div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			</li>
			<li>
			<h4>Just Be Beautiful</h4>
			<p> Студия красоты и дизайна бровей Just Be Beautiful рада приветствовать Вас,our princesses! 
			Наша студия стремится к качественным услугам и исключительному обслуживанию клиентов в спокойной дружеской атмосфере.</p>
			<p> So, come and try! Убедитесь, что Вы находитесь в правильном месте. Не упустите свой шанс выглядеть лучше!</p>
			</li>
			<li>
			<div class="row">
			<div class="col-sm-4">
			<h4>Пн - Сб</h4>
			<p>9:00 - 21:00</p>
			<h4>Вс</h4>
			<p>10:00 - 20:00</p>
			</div>
			<div class="col-sm-6">
			<div class="image-wrap">
			<img src="<?php echo e(asset(env('THEME'))); ?>/images/logo_pink.png" alt="" width="570" height="570">
			</div>
			</div>
			<div class="col-sm-2 relative">
			<h1 class="section-head-right">График  работы</h1>
			</div>
			</div>
			</li>
			</ul>
		<?php endif; ?>


		<?php if($item->hasChildren()): ?>
			<ul class="rd-navbar-dropdown">
				<?php echo $__env->make(env('THEME').'.customMenuItems',['items'=>$item->children()], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			</ul>
		<?php endif; ?>

	</li>
	<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>