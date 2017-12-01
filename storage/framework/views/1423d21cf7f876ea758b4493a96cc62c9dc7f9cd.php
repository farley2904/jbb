
<form action="<?php echo e(route('admin.permissions.store')); ?>" method="POST">
		<?php echo e(csrf_field()); ?>

		
		<div class="short-table white">
		
			<table style="width:100%">
				
				<thead>
					
					<th>Привилегии</th>
					<?php if(!$roles->isEmpty()): ?>
					
						<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<th><?php echo e($item->name); ?></th>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
					<?php endif; ?>
					
				</thead>
				<tbody>
					
					<?php if(!$permissions->isEmpty()): ?>
					
						<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								
								<td><?php echo e($val->name); ?></td>
									<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<td>
											
										</td>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
					<?php endif; ?>

				</tbody>
				
				
			</table>
			
			
		</div>
		
		<input class="btn btn-the-salmon-dance-3" type="submit" value="Обновить" />

		
	</form>