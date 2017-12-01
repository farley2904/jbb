<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(isset($title) ? $title : config('app.name', 'JBB')); ?></title>


    <link rel="icon" href="<?php echo e(asset(env('THEME'))); ?>/images/favicon.ico" type="image/x-icon">

    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>

    <link href="<?php echo e(asset('css/fileinput.min.css')); ?>" rel="stylesheet" />
    <script src="<?php echo e(asset('js/fileinput.min.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('js/ckeditor/ckeditor.js')); ?>"></script>


    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;


        $(document).ready(function(){
            $("#file").fileinput({
                showCaption: false,
                showRemove: false,
                showUpload: false,
                showCancel: false,
                browseLabel: 'Выберите файл...',
                browseClass: 'btn btn-default'
            });
        });
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('admin')); ?>">
                        <?php echo e(config('app.name', 'Jbb')); ?>

                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    
                        
                    <?php echo $__env->yieldContent('navigation'); ?>
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
                            <!-- <li><a href="{-- { route('login') } --}">Login</a></li> -->
                            <!-- <li><a href="{-- { route('register') } --}">Register</a></li> -->
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>" 
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">

        <?php if(count($errors) > 0): ?>
            <div class="box error-box">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p style="color:red" ><?php echo e($error); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <?php if(session('status')): ?>
            <div class="box success-box">
                <p style="color:green" ><?php echo e(session('status')); ?></p>
            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="box error-box">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
        </div>
        <?php echo $__env->yieldContent('footer'); ?>
    </div>

    
</body>
</html>
