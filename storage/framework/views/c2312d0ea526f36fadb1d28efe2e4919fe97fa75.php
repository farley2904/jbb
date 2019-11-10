<form action="<?php echo e(route('admin.portfolio.store')); ?>" method="POST" enctype="multipart/form-data">
<?php echo e(csrf_field()); ?>          
<!-- <div class="form-group">
    <label for="title">Введите название</label>
    <input class="form-control" id="title" placeholder="Название" name="title">
</div>  -->
<label>Категория</label>
<select class="browser-default custom-select mb-4" name="filter">
		<?php $__currentLoopData = $filter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    		<option value="<?php echo e($item->alias); ?>"><?php echo e($item->title); ?></option>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>         
<div class="form-group">
    <label for="img">Выберите файл</label>
    <input id="img" type="file" name="image" class="form-control-file">
</div>
<button type="submit" class="btn btn-default">Добавить</button>
</form>