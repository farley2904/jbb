<section class="well-md text-center">
<div class="container">
<h1 class="section-head">Обучение</h1>
<!-- <h3 class="section-head-left">Брови</h3> -->

<?php if($school): ?>

    <?php $__currentLoopData = $school; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="row text-sm-left">

        <div class="col-sm-4 <?php echo e(($k%2==0) ? '' : 'col-md-preffix-1 col-sm-push-2'); ?> wow fadeInUp">

            <div class="image-wrap <?php echo e(($k%2==0) ? 'shadow-right' : 'shadow-left'); ?>">

                <img src="<?php echo e(asset(env('THEME')).Config::get('settings.path').$article->img); ?>">

            </div>
        </div>

        <div class="col-sm-preffix-1 col-sm-5 col-md-6 inset-1 <?php echo e(($k%2==0) ? '' : 'col-sm-push-1'); ?> wow fadeInRight">
            <div class="<?php echo e(($k%2==0) ? 'line-right' : 'line-left'); ?>">
                <h4><?php echo e($article->title); ?></h4>
                <?php echo $article->desc; ?>

                <a href="<?php echo e(route('school.show',['alias'=>$article->alias])); ?>" class="btn btn-lg btn-primary wow fadeInUp" data-hover="<?php echo e(trans('site.read_more')); ?>"><?php echo e(trans('site.read_more')); ?></a>
            </div>
        </div>

    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>