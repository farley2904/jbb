
<h3>Пользователи</h3>
<?php echo Html::link(route('admin.users.create'),'Добавить пользователя',['class' => 'btn btn-success btn-lg pull-right btn-add']); ?>

<table class="table table-striped table-hover table-responsive-sm">
<thead>
	<th>ID</th>
	<th>Имя</th>
	<th>Почта</th>
	<th>Логин</th>
	<th>Роль</th>
	<th>Удалить</th>
</thead>
<?php if($users): ?>	
	<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tbody>
			<tr>
				<td><?php echo e($user->id); ?></td>
				<td><?php echo Html::link(route('admin.users.edit',['users' => $user->id]),$user->name,['class' => 'text-primary']); ?></td>
				<td><?php echo e($user->email); ?></td>
				<td><?php echo e($user->login); ?></td>
				<td><?php echo e($user->roles->implode('name', ', ')); ?></td>
				<td>
					<?php echo Form::open(['url' => route('admin.users.destroy',['users'=> $user->id]),'class'=>'form-horizontal','method'=>'POST']); ?>

						<?php echo e(method_field('DELETE')); ?>

						<?php echo Form::button('Удалить', ['class' => 'btn btn-danger btn-block center-block','type'=>'submit']); ?>

					<?php echo Form::close(); ?>

				</td>
			</tr>
		</tbody>										
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
<?php endif; ?>
</table>
	