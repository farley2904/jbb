<section class="well-md text-center">
	<div class="container">

		<h2 class="section-head wow fadeInUp"><?php echo e($title); ?></h2>

		<?php if($services_cat): ?>

			<div class="row" >
				<?php $__currentLoopData = $services_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<h3 ><?php echo e($cat->name); ?></h3>
					<div class="service-table col-lg-preffix-1 wow fadeInUp">
					<table>
					  <thead>
					    <tr>
					      <th>Услуга</th>
					      <th>Цена</th>
					    </tr>
					  </thead>
						<tbody>

						<?php if($cat->services): ?>
							<?php $__currentLoopData = $cat->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							    <tr>
							      <td data-label="Услуга"><?php echo e($service->name); ?></td>
							      <td data-label="Цена"><?php echo e($service->price); ?> грн.</td>
							    </tr>			
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
						</tbody>
		            </table>
		        </div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>

		<?php endif; ?>

	</div>	
</section>





