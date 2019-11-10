<h2>Портфолио</h2>
<div class="row"> 
  <div class="col">
    
 <a href="<?php echo e(route('admin.portfolio.create')); ?>" role="button" class="btn btn-success waves-effect waves-light pull-right mb-4"><i class="fa fa-plus"></i></a>
  </div> 
</div>
<ol>
  <?php if($portfolios): ?>
  <?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li>
      <div class="list-group-item d-flex justify-content-between list-group-item-action">
        <div >
          <img src="<?php echo e(asset(env('THEME'))); ?>/images/portfolios/<?php echo e($portfolio->img->sm); ?>" width="120" height="120" alt="<?php echo e($portfolio->title); ?>" title="<?php echo e($portfolio->alias); ?>">
        </div>
        <!-- <div><select class="browser-default custom-select mb-4" name="filter"> -->
    
        
    
<!-- </select>    </div> -->
        <div >
          <a href="<?php echo e(route('admin.portfolio.edit','id')); ?>" class="btn btn-warning float-right" role="button"><i class="fa fa-edit"></i></a>

            <?php echo Form::open(['url' => route('admin.portfolio.destroy',['portfolio'=>$portfolio->id]),'method'=>'POST']); ?>


              <?php echo e(method_field('DELETE')); ?>


              <?php echo Form::button('<i class="fa fa-remove"></i>', ['class' => 'btn btn-danger float-right','type'=>'submit']); ?>


              <?php echo Form::close(); ?>

        </div>
      </div>
    </li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
</ol>