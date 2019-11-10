<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(isset($title) ? $title : config('app.name', 'JBB')); ?></title>


    <link rel="shortcut icon" href="<?php echo e(asset(env('THEME'))); ?>/images/favicon.ico" type="image/x-icon">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap core CSS -->
	<link href="<?php echo e(asset('mdb/css/bootstrap.min.css')); ?>" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="<?php echo e(asset('mdb/css/mdb.min.css')); ?>" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href="<?php echo e(asset('mdb/css/style.css')); ?>" rel="stylesheet">

	<link href="<?php echo e(asset('css/colorbox.css')); ?>" rel="stylesheet">

	<script type="text/javascript" src="<?php echo e(asset('mdb/js/jquery-3.3.1.min.js')); ?>"></script>

	<script type="text/javascript" src="<?php echo e(asset('js/ckeditor/ckeditor.js')); ?>"></script>

	<script type="text/javascript" src="<?php echo e(asset('js/jquery.colorbox-min.js')); ?>"></script>   

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script>
</head>
<body class="grey lighten-3">
	<header>
		<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
			<div class="container-fluid">
				<a href="<?php echo e(route('home')); ?>" class="navbar-brand waves-effect">
					<strong class="blue-text"><?php echo e(config('app.name', 'Jbb')); ?></strong>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expended="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarContent">
					<?php echo $__env->yieldContent('navigation'); ?>

					<?php if(Auth::user()): ?>
						<div class="dropdown">
							<!--Trigger-->
							<button class="btn btn-outline-info waves-effect dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
							  aria-haspopup="true" aria-expanded="false"><?php echo e(Auth::user()->name); ?></button>
							<!--Menu-->
							<div class="dropdown-menu dropdown-primary">
								<a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Выйти</a>
								<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
									<?php echo e(csrf_field()); ?>

								</form>
							</div>
						</div>
                    <?php endif; ?>
				</div> 
			</div>
		</nav>
	</header>

	<main class="pt-5 max-lg-5">
		<div class="container-fluid mt-5">

			<?php if(count($errors) > 0): ?>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="card mb-4 wow fadeIn">
						<div class="card-body">
			                <span style="color:red" ><?php echo e($error); ?></span>
			        	</div>
			        </div>
		        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    <?php endif; ?>

		    <?php if(session('status')): ?>
		     	<div class="card mb-4 wow fadeIn">
					<div class="card-body">
	            		<span style="color:green" ><?php echo e(session('status')); ?></span>
	        		</div>
	        	</div>
	    	<?php endif; ?>

		    <?php if(session('error')): ?>
		        <div class="card mb-4 wow fadeIn">
					<div class="card-body">
		            <?php echo e(session('error')); ?>

		        	</div>
		        </div>
		    <?php endif; ?>

			<section class="card mb-4 wow fadeIn">
				<div class="card-body">
					<?php echo $__env->yieldContent('content'); ?>
				</div>
			</section>
		</div>
	</main>

    <?php echo $__env->yieldContent('footer'); ?>

	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="<?php echo e(asset('mdb/js/popper.min.js')); ?>"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="<?php echo e(asset('mdb/js/bootstrap.min.js')); ?>"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="<?php echo e(asset('mdb/js/mdb.min.js')); ?>"></script>

	<script src="<?php echo e(asset('js/bootstrap-filestyle.min.js')); ?>"></script>

	<script type="text/javascript" src="/packages/barryvdh/elfinder/js/standalonepopup.min.js"></script>

</body>
</html>
