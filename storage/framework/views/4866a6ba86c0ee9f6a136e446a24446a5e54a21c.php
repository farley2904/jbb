<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


<div class="row border border-info">
    <div class="col pt-3">
      <?php echo Html::link(route('admin.menus.edit',['menus' => $item->id]),$item->title); ?>

	</div>

	<div class="col-2 blue lighten-5">
	</div>
	<div class="text-center col-md-2">
		<?php if($item->trashed): ?>
		<?php echo Form::open(['url' => route('admin.menus.update',['menus'=> $item->id]),'class'=>'form-horizontal','method'=>'POST']); ?>

		<?php echo e(method_field('PUT')); ?>

		<?php echo Form::button('<i class="fa fa-plus"></i>', ['class' => 'btn btn-primary waves-effect waves-light','type'=>'submit']); ?>

		<?php echo Form::close(); ?>

		<?php else: ?>
		<?php echo Form::open(['url' => route('admin.menus.destroy',['menus'=> $item->id]),'class'=>'form-horizontal','method'=>'POST']); ?>

		<?php echo e(method_field('DELETE')); ?>

		<?php echo Form::button('<i class="fa fa-remove"></i>', ['class' => 'btn btn-danger waves-effect waves-light','type'=>'submit']); ?>

		<?php echo Form::close(); ?>

		<?php endif; ?>
	</div>
 </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!-- <div class="container">
  <div class="row">
    <div class="col-4">.col-4</div>
    <div class="col-4">.col-4</div>
    <div class="col-4">.col-4</div>
  </div>

  <div class="row">
    <div class="col-sm-4">.col-sm-4</div>
    <div class="col-sm-4">.col-sm-4</div>
    <div class="col-sm-4">.col-sm-4</div>
  </div>

  <div class="row">
    <div class="col-md-4">.col-md-4</div>
    <div class="col-md-4">.col-md-4</div>
    <div class="col-md-4">.col-md-4</div>
  </div>

  <div class="row">
    <div class="col-lg-4">.col-lg-4</div>
    <div class="col-lg-4">.col-lg-4</div>
    <div class="col-lg-4">.col-lg-4</div>
  </div>

  <div class="row">
    <div class="col-xl-4">.col-xl-4</div>
    <div class="col-xl-4">.col-xl-4</div>
    <div class="col-xl-4">.col-xl-4</div>
  </div>
</div> -->