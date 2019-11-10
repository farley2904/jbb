<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<tr>
			<td style="text-align: left;"><?php echo e($paddingLeft); ?> <?php echo Html::link(route('admin.menus.edit',['menus' => $item->id]),$item->title); ?></td>
			<td><?php echo e($item->url()); ?></td>

			<td>
			<?php echo Form::open(['url' => route('admin.menus.destroy',['menus'=> $item->id]),'class'=>'form-horizontal','method'=>'POST']); ?>

												    <?php echo e(method_field('DELETE')); ?>

												    <?php echo Form::button('Удалить', ['class' => 'btn btn-danger waves-effect waves-light','type'=>'submit']); ?>

												<?php echo Form::close(); ?>


			</td>
		</tr>		
		 <?php if($item->hasChildren()): ?>
		        
		        <?php echo $__env->make(config('settings.theme').'.admin.custom-menu-items', array('items' => $item->children(),'paddingLeft' => $paddingLeft.'--'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		 <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>