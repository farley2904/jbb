<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>" class="wide wow-animation">
<head>
 
<title><?php echo e(isset($title) ? $title : config('app.name', 'Jbb')); ?></title>
<meta name="format-detection" content="telephone=no"/>
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0"/>
 

<link rel="icon" href="<?php echo e(asset(env('THEME'))); ?>/images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="<?php echo e(asset(env('THEME'))); ?>/css/style.css" />

<!--[if lt IE 10]>
    <script src="js/html5shiv.min.js"></script>
    <![endif]--> 
</head>
    <body>
        <div class="page">
            
            <header class="page-header">

                <?php if(!Auth::guest()): ?>

                 <a href="<?php echo e(url('admin')); ?>">В админку --></a>

                <?php endif; ?>

                <?php echo $__env->yieldContent('navigation'); ?>
                
                <div class="container">
                <?php echo $__env->yieldContent('slider'); ?>

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
            <script src="<?php echo e(asset(env('THEME'))); ?>/js/jquery.min.js"></script>
            <script src="<?php echo e(asset(env('THEME'))); ?>/js/core.min.js"></script>
            <script src="<?php echo e(asset(env('THEME'))); ?>/js/script.js"></script>
    </body>
</html>