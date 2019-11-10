<h3 >Услуги</h3>
<div class="row">
<div class="col">
<?php echo Html::decode(link_to_route('admin.services.create', '<i class="fa fa-plus"></i>', array(), ['class' => 'btn btn-success pull-right btn-add'])); ?>

</div>
</div>
<table class="table table-striped table-hover table-responsive-md">
<thead>
	
	<th>id</th>
	<th>Услуга</th>
	<th>Категория</th>
	<th>Цена</th>				

</thead>
<?php if($services): ?>
<tbody>
<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
	<th scope="row"><?php echo e($service->id); ?></th>
	<td><?php echo e($service->name); ?></td>
	<td><?php echo e($service->serviceCategory->name); ?></td>
	<td><?php echo e($service->price); ?> грн.</td>
	<td>
		<a href="<?php echo e(route('admin.services.edit',['services'=>$service->id])); ?>" class="btn btn-warning" id="btn-link" role="button"><i class="fa fa-edit"></i></a>
	</td>
	<td>
		<?php echo Form::open(['url' => route('admin.services.destroy',['services'=>$service->id]),'method'=>'POST']); ?>


		<?php echo e(method_field('DELETE')); ?>


		<?php echo Form::button('<i class="fa fa-remove"></i>', ['class' => 'btn btn-danger','type'=>'submit']); ?>


		<?php echo Form::close(); ?>

	</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php endif; ?>
</table>