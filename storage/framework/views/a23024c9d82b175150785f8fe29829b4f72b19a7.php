
<?php echo Html::decode(link_to_route('admin.articles.create', '<i class="fa fa-plus"></i>', array(), ['class' => 'btn btn-success waves-effect waves-light pull-right mb-4'])); ?>


<table class="table table-hover table-responsive-sm">
	<thead class="blue lighten-4">
		<tr>
			<th>#</th>
			<th>Заголовок</th>
			<th>Описание</th>
			<th>Изображение</th>
			<th>Добавлен</th>
			<th>Категория</th>
			<th>Действие</th>
		</tr>
	</thead>
	<tbody>
		<?php if($articles): ?>
		<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr >
			<td scope="row"><?php echo e(count($articles)-$k); ?></td>
			<td>
				<?php echo Html::link(route('admin.articles.edit',['articles'=>$article->alias,]),$article->title,['class' => 'text-primary']); ?>

			</td>
			
			<td><?php echo $article->desc; ?></td>
			<td><?php echo Html::image(asset(env('THEME')).'/images/articles/'.$article->img,'alt',['width'=>'100','height'=>'100']); ?></td>
			<td><?php echo e($article->created_at); ?></td>
			<td><?php echo e($article->category->title); ?></td>
			<td>
				<?php echo Form::open(['url' => route('admin.articles.destroy',['articles'=>$article->alias]),'method'=>'POST']); ?>


				<?php echo e(method_field('DELETE')); ?>


				<?php echo Form::button('<i class="fa fa-remove"></i>', ['class' => 'btn btn-danger waves-effect waves-light','type'=>'submit']); ?>


				<?php echo Form::close(); ?>

			</td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>

	</tbody>
	
</table>

<?php echo e($articles->links()); ?>


 
