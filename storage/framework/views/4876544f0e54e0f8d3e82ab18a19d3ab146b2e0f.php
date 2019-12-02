<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>" class="wide wow-animation">
<head>
<title><?php echo e(isset($title) ? $title : config('app.name', 'Jbb')); ?></title>
<meta name="format-detection" content="telephone=no"/>
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0"/>
<meta name="description" content="<?php echo e((config('configuration.meta_description'))); ?>"/>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<link rel="canonical" href="<?php echo e(URL::current()); ?>"/>
<link rel="shortcut icon" href="<?php echo e(asset(env('THEME'))); ?>/images/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="<?php echo e(asset(env('THEME'))); ?>/css/style.css" />
<link rel="stylesheet" href="<?php echo e(asset(env('THEME'))); ?>/css/slider.css" />
<script src="<?php echo e(asset(env('THEME'))); ?>/js/jquery.min.js"></script>

<style>
    .page-header:before {
        background:url("<?php echo e(asset(config('configuration.header_bg'))); ?>") no-repeat center/cover;
    }
</style>
</head>
    <body>
        <div class="page">
            
            <header class="page-header">

                <?php if(!Auth::guest()): ?>
                <div>

                    <a href="<?= route('setlocale', ['lang' => 'ru']) ?>"<?= \Jbb\Http\Middleware\LocaleMiddleware::getLocale() === null ? 'class="active-lang"' : '' ?>>RU</a>
                    <a href="<?= route('setlocale', ['lang' => 'ua']) ?>"<?= \Jbb\Http\Middleware\LocaleMiddleware::getLocale() === 'ua' ? 'class="active-lang"' : '' ?>>UA</a>
                    
                </div>

                 <a href="<?php echo e(route('admin.')); ?>"><?php echo app('translator')->getFromJson('site.in_admin'); ?></a>


                <?php endif; ?>

                <?php echo $__env->yieldContent('navigation'); ?>
                <?php if(isset($errors)): ?>
                <?php if(count($errors) > 0): ?>
                    <div class="box error-box">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p style="color:red" ><?php echo e($error); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
                <?php endif; ?>
                <?php if(session('status')): ?>
                    <div class="box success-box">
                        <p style="color:green" ><?php echo e(session('status')); ?></p>
                    </div>
                <?php endif; ?>
                
                <div class="container">
                    <?php echo $__env->yieldContent('header'); ?>      
                </div>
            </header>

 
            <main class="page-content">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
 
            <footer class="page-footer">
                <?php echo $__env->yieldContent('footer'); ?>
                
            </footer>
        </div>
            <script src="<?php echo e(asset(env('THEME'))); ?>/js/core.min.js"></script>
            <script src="<?php echo e(asset(env('THEME'))); ?>/js/script.js"></script>
            <script src="<?php echo e(asset(env('THEME'))); ?>/js/slider.js"></script>
            <script type="text/javascript">
             $(document).ready(function(){
                $("#m").on("click", function (event) {
                    event.preventDefault();
                    var id  = $(this).attr('href'),
                        top = $(id).offset().top;
                    $('body,html').animate({scrollTop: top}, 3000);
                });
            });
            </script>

    </body>
</html>
