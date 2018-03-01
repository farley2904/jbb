<table class="table table-striped table-bordered table-hover">
	<thead class="thead-inverse">
		<tr>
			<th>ID</th>
			<th>Заголовок</th>
			<th>Описание</th>
			<th>Изображение</th>
			<th>Псевдоним</th>
			<th>Категория</th>
			<th>Действие</th>
		</tr>
	</thead>
	<tbody>
		<?php if($articles): ?>
		<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr >
			<td><?php echo e($k+1); ?></td>
			<td><?php echo e($article->title); ?></td>
			<td><?php echo $article->desc; ?></td>
			<td>
					<!-- <img src="<?php echo e(asset(env('THEME'))); ?>/images/articles/<?php echo e($article->img); ?>" alt="" width="100" height="100"> -->
					<?php echo Html::image(asset(env('THEME')).'/images/articles/'.$article->img,'alt',['width'=>'100','height'=>'100']); ?>

			</td>
			<td><?php echo e($article->alias); ?></td>
			<td><?php echo e($article->category->title); ?></td>
			<td>
				<!-- <button type="button" class="btn btn-warning btn-block center-block">Изменить</button> -->

				<?php echo Html::link(route('admin.articles.edit',['articles'=>$article->alias]),'Изменить',['class'=>'btn btn-warning btn-block center-block','type'=>'button']); ?>


				</br>

				<?php echo Form::open(['url' => route('admin.articles.destroy',['articles'=>$article->alias]),'method'=>'POST']); ?>


				<?php echo e(method_field('DELETE')); ?>


				<?php echo Form::button('Удалить', ['class' => 'btn btn-danger btn-block center-block','type'=>'submit']); ?>


				<?php echo Form::close(); ?>

		</td>

		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>

	</tbody>
	
</table>

<?php echo Html::link(route('admin.articles.create'),'Добавить новый материал',['class' => 'btn btn-success btn-lg','type'=>'button']); ?>


 
